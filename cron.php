<?php

// watrbx cron job
// for now it just does renders but likely will have more

use watrbx\sitefunctions;
use watrbx\thumbnails;
use watrbx\gameserver;
use watrlabs\logging\discord;

echo "Starting Cron";

require('./init.php');
global $db;
global $isCron;

$isCron = true;

$thumbnail = new thumbnails();
$gameserver = new gameserver();
$func = new sitefunctions();
$discord = new discord();
$discord->set_webhook_url($_ENV["CRON_WEBHOOK"]);

ini_set('default_socket_timeout', 300);

$isRunning = $func->get_setting("CRON_RUNNING");

if($isRunning == "true"){
    die("\nCron is already running!");
}

$db->table("site_config")->where("thekey", "CRON_RUNNING")->update(["value"=>"true"]);

$serverinfo = $gameserver->get_server_info("ATLANTA-MID");
$url = $gameserver->get_server_url($serverinfo);

$Grid = new watrbx\Grid\Grid(null, "https://tjs-nut.pics/i/aj6uj.wsdl");
$Close = $Grid->Close($url);

$allofdem = $db->table('jobs')
    ->where(function($q) {
        $q->whereNotNull('assetid')
        ->orWhereNotNull('userid');
    })
    ->where("type", 2)
    ->orderBy("id", "DESC")
    ->get();


foreach ($allofdem as $job) {
    if($job->assetid !== null){
        $id = $job->assetid;
    }
    if($job->userid !== null){
        $id = $job->userid;
    }
    echo "\nRunning $job->jobid (ID: $id)";
    $discord->internal_log("Starting Job $job->jobid\nID: $id", "Starting Job");
    $result = $thumbnail->render_asset($job);
    if($result[0] == true){
        try {
            try {
                if(isset($result[1][0])){
                    $base64 = $result[1][0]->getValue();
                    $img = base64_decode($base64);
                    if($img){
                        $md5 = md5($img);

                        try {
                            global $s3_client;
                            $s3_client->putObject([
                                'Bucket' => $_ENV["R2_BUCKET"],
                                'Key' => $md5,
                                'Body' => $img,
                                'ContentType' => "image/png"
                            ]);

                            $insert = [
                                "dimensions"=>$job->dimensions,
                                "file"=>$md5
                            ];

                            if(isset($job->userid)){
                                $insert["userid"] = $job->userid;
                                $insert["mode"] = $job->jobtype;
                            }

                            if(isset($job->assetid)){
                                $insert["assetid"] = $job->assetid;
                            }

                            $insertid = $db->table("thumbnails")->insert($insert);
                            $db->table("jobs")->where("jobid", $job->jobid)->delete();
                            echo "\nJob $job->jobid done.";
                            $discord->internal_log("Job $job->jobid has finished.", "Job Done");

                        } catch(Exception $e){
                            echo "\nSomething went wrong with $job->jobid! $e";
                            $db->table("jobs")->where("jobid", $job->jobid)->delete();
                            $discord->internal_log("Something went wrong with $job->jobid\n\n$e", "Job Error");
                        }
                    } else {
                        echo "\nSomething went wrong with $job->jobid\n";
                        $db->table("jobs")->where("jobid", $job->jobid)->delete();
                        $discord->internal_log("Something went wrong with $job->jobid\n\n" . $result[1], "Job Error");
                    }
                } else {
                    echo "\nSomething went wrong with $job->jobid!\n";
                    $db->table("jobs")->where("jobid", $job->jobid)->delete();
                    $discord->internal_log("Something went wrong with $job->jobid\n\n" . $result[1], "Job Error");
                }
            } catch (ErrorException $e){
                $db->table("jobs")->where("jobid", $job->jobid)->delete();
                echo "\nSomething went wrong with $job->jobid!\n$e";
                
            }
        } catch(Error $e){
            $db->table("jobs")->where("jobid", $job->jobid)->delete();
            echo "\nSomething went wrong with $job->jobid!\n$e";
            $discord->internal_log("Something went wrong with $job->jobid\n\n$e", "Job Error");
        }
        
    } else {
        echo "\nSomething went wrong with $job->jobid\n";
        $db->table("jobs")->where("jobid", $job->jobid)->delete();
        $discord->internal_log("Something went wrong with $job->jobid\n\n" . $result[1], "Job Error");
    }

    try {
        $Close->CloseJob($job->jobid);
    } catch (ErrorException $e){
        echo "\nSomething went wrong with $job->jobid\n";
        $db->table("jobs")->where("jobid", $job->jobid)->delete();
        $discord->internal_log("Something went wrong with $job->jobid\n\n" . $result[1], "Job Error");
    }
    
}
echo "\nCron done.\n";
$db->table("site_config")->where("thekey", "CRON_RUNNING")->update(["value"=>"false"]);
$discord->internal_log("Queue has finished.", "Queue Finished");
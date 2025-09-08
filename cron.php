<?php

// watrbx cron job
// for now it just does renders but likely will have more

use watrbx\thumbnails;
use watrbx\gameserver;

require('./init.php');
global $db;

$thumbnail = new thumbnails();
$gameserver = new gameserver();

$serverinfo = $gameserver->get_closest_server();
$url = $gameserver->get_server_url($serverinfo);

$Grid = new watrbx\Grid\Grid();
$Close = $Grid->Close($url);

$allofdem = $db->table('jobs')
    ->where(function($q) {
        $q->whereNotNull('assetid')
        ->orWhereNotNull('userid');
    })
    ->where("type", 2)
    ->get();

foreach ($allofdem as $job) {
    sleep(15); // too many too quick overloads arbiter, especially with games running
    $result = $thumbnail->render_asset($job);
    if($result){
        try {
            if(isset($result[0])){
                $base64 = $result[0]->getValue();
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

                    } catch(Exception $e){
                        echo "\nSomething went wrong with $job->jobid! $e";
                        $db->table("jobs")->where("jobid", $job->jobid)->delete();
                    }
                }
            }
        } catch(Error $e){
            echo "\nSomething went wrong with $job->jobid!\n$e";
        }
        
    }

    $Close->CloseJob($job->jobid);
}
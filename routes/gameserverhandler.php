<?php
use watrlabs\router\Routing;
use watrlabs\logging\discord;
use watrbx\gameserver;
use watrlabs\authentication;

global $router; // IMPORTANT: KEEP THIS HERE!

function createerror($error, $otherstuff = array(), $code = 400){
    header("Content-type: application/json");
    http_response_code($code);
    $array = array(
        "success"=>false,
        "error"=>$error,
        "data"=>$otherstuff
    );
    
    return json_encode($array);
}

function createsuccess($msg, $otherstuff = array(), $code = 200){
    header("Content-type: application/json");
    http_response_code($code);
    $array = array(
        "success"=>true,
        "msg"=>$msg,
        "data"=>$otherstuff
    );
    
    return json_encode($array);
}

function validate_header(){
    header("Content-type: application/json");

    if(isset($_SERVER['HTTP_AUTHORIZATION'])){
        global $db;

        $accesskey = $_SERVER['HTTP_AUTHORIZATION'];
        $serverinfo = $db->table("servers")->where("access_key", $accesskey)->first();
        
        if($serverinfo == null){
            die(createerror("Gameserver is not authorized!", '', 401));
        }

    } else {
        die(createerror("Gameserver is not authorized!", '', 401)); // this was left commented wayyy too long. oops.
    }
}

$router->get('/api/v1/gameserver/laggy-server', function() {

    $log = new discord();
    
    $exploded = explode("=", $_GET["jobid"]);

    global $db;

    if(isset($exploded[0]) && isset($exploded[1])){
        $jobid = $exploded[0];
        $apikey = $exploded[1];
        $gameserver = new gameserver();

        if($gameserver->validate_api_key($apikey)){
            $gameinstance = $db->table("game_instances")->where("serverguid", $jobid)->first();

            if($gameinstance){
                $update = [
                    "laggy"=>1
                ];

                $db->table("game_instances")->where("serverguid", $jobid)->update($update);
            }

        } else {
            http_response_code(400);
            die();
        }
    } else {
        http_response_code(500);
        die();
    }

});

$router->get('/api/v1/gameserver/end-laggy-server', function() {

    $log = new discord();
    
    $exploded = explode("=", $_GET["jobid"]);

    global $db;

    if(isset($exploded[0]) && isset($exploded[1])){
        $jobid = $exploded[0];
        $apikey = $exploded[1];
        $gameserver = new gameserver();

        if($gameserver->validate_api_key($apikey)){
            $gameinstance = $db->table("game_instances")->where("serverguid", $jobid)->first();

            if($gameinstance){
                $update = [
                    "laggy"=>0
                ];

                $db->table("game_instances")->where("serverguid", $jobid)->update($update);
            }

        } else {
            http_response_code(400);
            die();
        }
    } else {
        http_response_code(500);
        die();
    }

});

$router->get('/api/v1/gameserver/pinger', function(){

    global $db;
    $gameserver = new gameserver();

    if(isset($_GET["jobId"]) && isset($_GET["apiKey"]) && isset($_GET["Players"])){

        $jobId = $_GET["jobId"];
        $apiKey = $_GET["apiKey"];
        $Players = (int)$_GET["Players"];

        $jobInfo = $db->table("jobs")->where("jobid", $jobId)->first();

        if($jobInfo){

            $serverInfo = $db->table("servers")->where("server_id", $jobInfo->server)->first();

            if($Players == 0){
                $gameserver->end_job($jobId);
                die(createsuccess("killed"));
            } else {
                $Grid = new watrbx\Grid\Grid;
                $Url = "http://" . $serverInfo->wireguard_ip . ":" . $serverInfo->port;

                $Renew = $Grid->Renew($Url);
                $Renew->RenewLease($jobId, 60); // 60 Seconds.
                // TODO: Track last ping time and predict server shutdown to prevent people from joining
                die(createsuccess("your life has been extended"));
            }
        } else {
            die(createerror("Oof."));
        }


    }

});

$router->get("/api/v1/gameserver/mark-active", function(){

    $log = new discord();
    
    $exploded = explode("=", $_GET["jobid"]);

    global $db;

    if(isset($exploded[0]) && isset($exploded[1])){
        $jobid = $exploded[0];
        $apikey = $exploded[1];
        $gameserver = new gameserver();

        if($gameserver->validate_api_key($apikey)){
            $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();
            if($jobinfo !== null){
                $placeid = $jobinfo->assetid;
                $insert = array(
                    "serverguid"=>$jobid,
                    "placeid"=>$placeid
                );

                $db->table("game_instances")->insert($insert);

                $update = ["type"=>1];
                
                //$db->table("jobs")->where("jobid", $jobid)->delete();
                $log->internal_log($placeid . "/" . $jobid . " has been marked active!", "Game marked active.");
                die("Success.");
            } else {
                http_response_code(401);
                die();
            }
        } else {
            http_response_code(400);
            die();
        }
    } else {
        http_response_code(500);
        die();
    }
});

$router->get('/api/v1/gameserver/end-server', function(){
    if(isset($_GET["jobid"])){
        $exploded = explode("=", $_GET["jobid"]);
    } else {
        http_response_code(400);
        die();
    }

    $gameserver = new gameserver();
    $log = new discord();

    if(isset($exploded[0]) && isset($exploded[1])){
        $jobid = $exploded[0];
        $apikey = $exploded[1];

        if($gameserver->validate_api_key($apikey)){
            global $db;
            $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();

            $db->table("game_instances")->where("serverguid", $jobid)->delete();
            $db->table("activeplayers")->where("jobid", $jobid)->delete();

            $update = array(
                "is_idle"=>1,
                "placeid"=>null,
                "type"=>4
            );

            $db->table("rccinstances")->where("guid", $jobinfo->rccinstance)->update($update);
            $gameserver->end_job($jobid);
            $pid = $jobinfo->assetid;
            $log->internal_log("Place ID $pid has closed. ($jobid)");
            die("Success.");

        } else {
            http_response_code(401);
            die();
        }
    } else {
        http_response_code(400);
        die();
    }
});

$router->get("/api/v1/gameserver/client-presence", function(){

    if(isset($_GET["jobid"])){
        $exploded = explode("=", $_GET["jobid"]);
    } else {
        http_response_code(400);
        die();
    }

    if(isset($exploded[0]) && isset($exploded[1]) && isset($exploded[2]) && isset($exploded[3])){
        $jobid = $exploded[0];
        $apikey = $exploded[1];
        $userid = $exploded[2];
        $action = $exploded[3];
        $gameserver = new gameserver();
        $auth = new authentication();

        global $db;

        if($gameserver->validate_api_key($apikey)){
            $log = new discord();
            $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();

            if($jobinfo !== null){
                if($action == "connect"){
                    $insert = array(
                        "userid"=>$userid,
                        "placeid"=>$jobinfo->assetid,
                        "jobid"=>$jobid
                    );

                    $visitsinsert = array(
                        "userid"=>$userid,
                        "universeid"=>$jobinfo->assetid // I need a better way of doing universes & assets
                    );

                    $update = [
                        "active_where"=>"Game"
                    ];

                    $userinfo = $auth->getuserbyid($userid);

                    if($userinfo == null){
                        die();
                    }


                    $db->table("users")->where("id", $userid)->update($update);
                    $db->table("visits")->insert($visitsinsert);
                    $db->table("activeplayers")->insert($insert);

                    

                    
                    $log->internal_log($userinfo->username . " has joined place " . $jobinfo->assetid);
                    die("Success.");
                } elseif($action == "disconnect"){
                    $update = [
                        "active_where"=>"Website"
                    ];


                    $db->table("users")->where("id", $userid)->update($update);
                    $db->table("activeplayers")->where("userid", $userid)->where("jobid", $jobid)->delete();
                    $userinfo = $auth->getuserbyid($userid);
                    $log->internal_log($userinfo->username . " has left place " . $jobinfo->assetid);
                    die("Success.");
                } else {
                    http_response_code(400);
                    die();
                }
            } else {
                http_response_code(400);
                die();
            }
        } else {
            http_response_code(401);
            die();
        }
    } else {
        http_response_code(400);
        die();
    }
});

$router->group('/api/v1/gameserver', function($router) {
    
    $router->get("/validate-info", function () {
        $accesskey = $_SERVER['HTTP_AUTHORIZATION']; // im not issetting it because as long as validate_header is working as it should then they should have it
        global $db;
        $query = $db->table("servers")->where("access_key", $accesskey);
        $serverinfo = $query->first();
        $serverinfoarray = array(
            "serverid"=>$serverinfo->server_id,
            "port"=>$serverinfo->port
        );
        die(json_encode($serverinfoarray));
    });

    $router->post('/register-rcc-instance', function(){
        if(isset($_POST["rccguid"]) && isset($_POST["port"]) && isset($_POST["type"])){
            $rccguid = $_POST["rccguid"];
            $port = (int)$_POST["port"];
            $type = (int)$_POST["type"];
            $accesskey = $_SERVER['HTTP_AUTHORIZATION'];

            global $db;

            $rccinfo = $db->table("rccinstances")->where("guid", $rccguid)->first();
            $serverinfo = $db->table("servers")->where("access_key", $accesskey)->first();

            if($serverinfo !== null){
                if($rccinfo == null){
                    $log = new discord();
                    $insert = array(
                        "guid"=>$rccguid,
                        "serverid"=>$serverinfo->server_id,
                        "port"=>$port,
                        "type"=>$type
                    );

                    $db->table("rccinstances")->insert($insert);
                    $log->internal_log("RCC Instance started with guid: " . $rccguid);
                    die(createsuccess("RCC Registered!", '', 200));
                } else {
                    die(createerror("RCC Instance already exists.", '', 400));
                }
            } else {
                die(createerror("Server does not exist.", '', 400));
            }


        } else {
            var_dump($_POST);
            die(createerror("Something wasn't posted.", '', 400));
        }
    });

    $router->post('/job-error', function(){
        global $db;

        if(isset($_POST["jobid"])){
            $jobid = $_POST["jobid"];
            $query = $db->table("jobs")->where("guid", $guid);
            $rcc = $query->first(); 
            if($rcc !== null){
                $log = new discord();
                $log->internal_log("Failed to execute job! (" . $jobid  . ")");
                $db->table("rccinstances")->where("jobid", $jobid)->delete();
            } else {
                die(createerror("Job is not found!", '', 404));
            }
        } else {
            die(createerror("Something wasn't posted.", '', 400));
        }
    });

    $router->post('/stop-rcc-instance', function(){
        global $db;

        if(isset($_POST["rccguid"])){
            $guid = $_POST["rccguid"];
            $query = $db->table("rccinstances")->where("guid", $guid);
            $rcc = $query->first(); 
            if($rcc !== null){
                $log = new discord();
                $log->internal_log("RCC Instance ($guid) has crashed!");
                $db->table("rccinstances")->where("guid", $guid)->delete();
            } else {
                die(createerror("RCC Instance never existed!", '', 400));
            }
        } else {
            die(createerror("Something wasn't posted.", '', 400));
        }
    });

    $router->get('/render-queue', function(){
        global $db;
        header("Content-type: application/json");
        $allofdem = $db->table('jobs')
            ->where(function($q) {
                $q->whereNotNull('assetid')
                ->orWhereNotNull('userid');
            })
            ->where("type", 2)
            //->where("status", 0)
            ->get(); // fuckass sql query bro...

        $success = [
            "success"=>true,
            "jobs"=>$allofdem
        ];

        die(json_encode($success));
    });

    $router->post('/add-render', function(){
        if(isset($_POST["jobid"]) && isset($_POST["response"])){
            $jobid = $_POST["jobid"];
            $response = $_POST["response"];

            global $db;
            $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();

            if($jobinfo !== null){
                $halfcleaned = str_replace('<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns2="http://watrbx.wtf/RCCServiceSoap" xmlns:ns1="http://watrbx.wtf/" xmlns:ns3="http://watrbx.wtf/RCCServiceSoap12"><SOAP-ENV:Body><ns1:OpenJobExResponse><ns1:OpenJobExResult><ns1:LuaValue><ns1:type>LUA_TSTRING</ns1:type><ns1:value>', '', $response);
                $cleaned = str_replace('</ns1:value></ns1:LuaValue></ns1:OpenJobExResult></ns1:OpenJobExResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>', '', $halfcleaned);

                $img = base64_decode($cleaned);
                if($img){

                    $md5 = md5($img);

                    try {
                        global $s3_client;
                        $cleaned = base64_decode($cleaned);
                        $s3_client->putObject([
                            'Bucket' => $_ENV["R2_BUCKET"],
                            'Key' => $md5,
                            'Body' => $cleaned,
                            'ContentType' => "image/png"
                        ]);
                    } catch(Exception $e){
                        http_response_code(500);
                        die(createerror("Something went wrong.", ["Error"=>$e->getMessage()]));
                    }

                    $insert = [
                        "dimensions"=>$jobinfo->dimensions,
                        "file"=>$md5
                    ];

                    if(isset($jobinfo->userid)){
                        $insert["userid"] = $jobinfo->userid;
                        $insert["mode"] = $jobinfo->jobtype;
                    }

                    if(isset($jobinfo->assetid)){
                        $insert["assetid"] = $jobinfo->assetid;
                    }

                    $insertid = $db->table("thumbnails")->insert($insert);
                    $db->table("jobs")->where("jobid", $jobinfo->jobid)->delete();
                    die(createsuccess('it worked.'));

                }

            } else {
                die(createerror("Failed to find job.", '', 404));    
            }

        } else {
            die(createerror("Bad Request!", '', 400));    
        }
    });

    $router->get('/fetch-job-lua', function(){
        if(isset($_GET["jobid"])){
            $jobid = $_GET["jobid"];

            global $db;
            $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();

            if($jobinfo !== null){

                if($jobinfo->type == 1){
                    # for gameservers
                    
                    $port = $jobinfo->port;
                    $place = $jobinfo->assetid;
                    $universeid = 1;
                    $apikey = $jobinfo->apikey;
                    $jobid = $jobinfo->jobid;
                    require("../storage/gameserver.php");
                    die();
                } elseif($jobinfo->type == 2) {

                    if($jobinfo->userid !== null){
                        if($jobinfo->jobtype == "full"){
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/user.lua");
                            $lua = str_replace("%userId%", $jobinfo->userid, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                        } elseif ($jobinfo->jobtype == "headshot"){
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/user_headshot.lua");
                            $lua = str_replace("%userId%", $jobinfo->userid, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                        } 
                    }

                    $assetinfo = $db->table("assets")->where("id", $jobinfo->assetid)->first();
                    switch ($assetinfo->prodcategory){
                        case "8":
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/hat.lua");
                            $lua = str_replace("%assetid%", $assetinfo->id, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                            break;
                        case "10":
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/model.lua");
                            $lua = str_replace("%assetid%", $assetinfo->id, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                            break;
                        case "18":
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/face.lua");
                            $lua = str_replace("%assetid%", $assetinfo->id, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                            break;
                        case "19":
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/gear.lua");
                            $lua = str_replace("%assetid%", $assetinfo->id, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                            break;
                        case "9":
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/place.lua");
                            $lua = str_replace("%assetid%", $assetinfo->id, $lua);
                            $lua = str_replace("%apikey%", $jobinfo->apikey, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                            break;
                        case "11":
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/shirt.lua");
                            $lua = str_replace("%assetid%", $assetinfo->id, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                            break;
                        case "12":
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/pant.lua");
                            $lua = str_replace("%assetid%", $assetinfo->id, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                            break;
                        case "17":
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/head.lua");
                            $lua = str_replace("%assetid%", $assetinfo->id, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                            break;
                        case "13":
                            header("Content-type: text/lua");
                            $lua = file_get_contents("../storage/lua/decal.lua");
                            $lua = str_replace("%assetid%", $assetinfo->id, $lua);
                            $dimensions = explode("x", $jobinfo->dimensions);
                            $lua = str_replace("%x%", $dimensions[0], $lua);
                            $lua = str_replace("%y%", $dimensions[1], $lua);
                            die($lua);
                            break;
                    }
                }

            } else {
                die(createerror("Failed to find job!", '', 404));    
            }
        } else {
            die(createerror("No job ID provided!", '', 400));
        }
    });

    $router->get('/load-job', function(){
        header("Content-type: application/json");
        if(isset($_GET["jobid"])){
            $jobid = $_GET["jobid"];

            global $db;
            $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();

            if($jobinfo !== null){
                $return_array = array(
                    "jobid"=>$jobinfo->jobid,
                    "type"=>$jobinfo->type,
                    "lua_url"=>"https://www.watrbx.wtf/api/v1/gameserver/fetch-job-lua?jobid=" . $jobinfo->jobid,
                );

                die(json_encode($return_array));
            } else {
                die(createerror("Request job does not exist!", "", 400));
            }

        } else {
            die(createerror("Job ID not specified.", "", 400));
        }
    });
    
}, 'validate_header');
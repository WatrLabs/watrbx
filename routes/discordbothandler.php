<?php
use watrlabs\router\Routing;
use watrbx\sitefunctions;
use watrlabs\api;
use watrlabs\authentication;
use watrbx\thumbnails;
use watrbx\gameserver;


function is_bot_authenticated() {
    header("Content-type: application/json");

    if(isset($_SERVER['HTTP_AUTHORIZATION'])){

        $auth = $_SERVER['HTTP_AUTHORIZATION'];

        if($auth !== $_ENV["DISCORD_BOT_AUTH"]){
            die(createerror("Discord Bot is not authorized!", '', 401));
        }

    } else {
        die(createerror("Discord Bot is not authorized!", '', 401));
    }
}

function isNolanAuthorized(){
    header("Content-type: application/json");

    if(isset($_SERVER['HTTP_AUTHORIZATION'])){

        $auth = $_SERVER['HTTP_AUTHORIZATION'];

        global $db;

        $apikey = $db->table("nolanapikeys")->where("apikey", $auth)->first();

        if(!$apikey){
            die(createerror("Discord Bot is not authorized!", [], 401));
        }

    } else {
        die(createerror("Discord Bot is not authorized!", '', 401));
    }
}



global $router; // IMPORTANT: KEEP THIS HERE!

$router->group('/api/v1/nolan-bot', function(){

    global $router;

    $router->get('/nodes', function(){
        global $db;
        $api = new api();

        $servers = $db->table("servers")->select(["server_id"])->get();

        $successjson = $api::create_success("Here is the grid.", $servers, 200);

        die($successjson);

    });

    $router->post('/execute', function(){
        if(isset($_POST["serverid"]) && isset($_POST["lua"])){

            $serverid = $_POST["serverid"];
            $lua = $_POST["lua"];

            $func = new sitefunctions();
            $gameserver = new gameserver();
            $Grid = new \watrbx\Grid\Grid();
            $api = new api();
            

            $jobid = $func->createjobid();

            $serverinfo = $gameserver->get_server_info($serverid);

            if($serverinfo){

                $url = $gameserver->get_server_url($serverinfo);
                $Close = $Grid->Close($url);

                $jobInfo = [
                    "Id"=>$jobid,
                    "Expiration"=>120, // I don't think it should take longer than this to execute 
                    "Category"=>1,
                    "Cores"=>2
                ];

                $ScriptInfo = [
                    "Name"=>"Custom Script",
                    "Script"=>$lua,
                    "Arguments"=>[]
                ];

                [$success, $thing] = $gameserver->execute_job($jobInfo, $ScriptInfo, $serverinfo);

                $Close->CloseJob($jobid);

                if($success){
                    die($api::create_success("Ran successfully!", ["success"=>$success, "result"=>$thing]));
                } else {
                    die($api::create_success("Ran successfully!", ["success"=>$success, "result"=>$thing]));                   
                }

            } else {
                die($api::create_error("Failed to find server.", [], 404));
            }

        } else {
            die($api::create_error("You didn't post something.", [], 400));
        }
    });

}, 'isNolanAuthorized');


$router->group('/api/v1/discord-bot', function($router) {

    $router->get('/get-userinfo', function(){
        if(isset($_GET["username"])){
            $username = (string)$_GET["username"];

            $api = new api();
            $thumbs = new thumbnails();

            global $db;
            $userinfo = $db->table("users")->where("username", $username)->first();

            if($userinfo !== null){
                $online = null;
                $auth = new authentication();
                $online = $auth->is_online($userinfo->id);
                $ingame = $auth->is_ingame($userinfo->id);

                $activity = "Offline";

                if($online){
                    $activity = "Online (Website)";
                }

                if($ingame){
                    $activity = "In-Game";
                }

                $render = "https:" . $thumbs->get_user_thumb($userinfo->id, "1024x1024", "full"); // have to do this so discord embeds dont complain (https:)
                $userdata = array(
                    "render"=>$render,
                    "id"=>$userinfo->id,
                    "username"=>$userinfo->username,
                    "regtime"=>$userinfo->regtime,
                    "membership"=>$userinfo->membership,
                    "blurb"=>$userinfo->blurb,
                    "activity"=>$activity,
                );
    
                $successjson = $api::create_success("Found userinfo!", $userdata, 200);
                die($successjson);
            } else {
                die($api::create_error("Couldn't find user!", '', 404));
            }
        }
    });
    
    $router->post("/gen-maint-link", function () {
        header("Content-type: application/json");

        $api = new watrlabs\api;
        $func = new sitefunctions();
        $userid = $_POST["userid"];
        $expires = time() + 5000000;
        $code = $func->genstring(25);
        $data = array(
            "url"=>"https://www.watrbx.wtf/?validate=$code",
            "expires"=>$expires
        );

        global $db;

        $insert = array(
            "code"=>$code,
            "discord_user"=>$userid,
            "expires"=>$expires
        );
        
        $db->table("maintcodes")->insert($insert);
        $successjson = $api::create_success("Maintenance code generated successfully!", $data, 200);

        die($successjson);
    });
    
}, 'is_bot_authenticated');
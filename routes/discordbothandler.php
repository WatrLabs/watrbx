<?php
use watrlabs\router\Routing;
use watrbx\sitefunctions;
use watrlabs\api;
use watrlabs\authentication;

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

global $router; // IMPORTANT: KEEP THIS HERE!

$router->group('/api/v1/discord-bot', function($router) {

    $router->get('/get-userinfo', function(){
        if(isset($_GET["username"])){
            $username = (string)$_GET["username"];

            $api = new api();

            global $db;
            $userinfo = $db->table("users")->where("username", $username)->first();

            if($userinfo !== null){
                $online = null;
                $auth = new authentication();
                $online = $auth->is_online($userinfo->id);
                $userdata = array(
                    "render"=>"https://www.watrbx.wtf/images/defaultimage.png",
                    "id"=>$userinfo->id,
                    "username"=>$userinfo->username,
                    "regtime"=>$userinfo->regtime,
                    "membership"=>$userinfo->membership,
                    "blurb"=>$userinfo->blurb,
                    "online"=>$online
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
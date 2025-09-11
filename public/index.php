<?php

use watrlabs\router\routing;
use watrlabs\authentication;
use watrlabs\users\getuserinfo;
use watrlabs\logging\discord;
use watrbx\sitefunctions;

require_once '../init.php';

try {

    try {

        
        global $db;
        global $router;

        $func = new sitefunctions();
        $ip = $func->getip(true);


        $ipbanned = $db->table("ipbans")->where("ip", $ip)->first();
        if($ipbanned == true){
            http_response_code(403);
            exit; // should I make this show the iis 403?
        }

        ob_start();

        $auth = new authentication();
        $router = new routing();
        
        if($_ENV["ACTUAL_MAINTENANCE"] == "true"){
            require("../views/maintenance.php");
            exit;
        }

        if($_ENV["MAINTENANCE"] == "true"){

            $canbypass = false;

            if(isset($_SERVER["HTTP_AUTHORIZATION"])){
                $authorization = $_SERVER["HTTP_AUTHORIZATION"];
                $discordbot = $_ENV["DISCORD_BOT_AUTH"]; // maybe move this to the database

                $canbypass = $discordbot == $authorization;
            }

            if(isset($_GET["validate"]) && !$canbypass){
                $maintcode = $_GET["validate"];
                $validmaintcode = $db->table("maintcodes")->where("code", $maintcode)->first();

                if($validmaintcode){
                    setcookie("maint_bypass", $maintcode, $validmaintcode->expires, "", ".watrbx.wtf");
                    $canbypass = true;
                }
            }

            if(isset($_COOKIE["maint_bypass"]) && !$canbypass){
                $maintcode = $_COOKIE["maint_bypass"];

                $validmaintcode = $db->table("maintcodes")->where("code", $maintcode)->first();

                if($validmaintcode){
                    $canbypass = true;
                }
            }

            // TODO: Check for gameservers and allow them

            if(!$canbypass){
                require("../views/maintenance.php");
                exit;
            }
            
        }

        $routers = [
            "webhandler",
            "apihandler",
            "studiohandler",
            "clienthandler",
            "gameserverhandler",
            "mobilehandler",
            "discordbothandler",
            "bootstraphandler",
            "forumhandler",
            "chathandler",
            "pbshandler",
            "datapershandler"
        ];

        foreach ($routers as $r) {
            $router->addrouter($r);
        }

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = strtolower($uri);
        $method = $_SERVER['REQUEST_METHOD'];
        $router->dispatch($uri, $method);

        ob_end_flush();

    } catch(PDOException $e){
        handle_error($e);
    }

    
} catch(ErrorException $e){
    handle_error($e);
}

function handle_error($e){
    $log = new discord();
    try {
        $log->internal_log($e, "Site Error!");
        ob_clean();
        file_put_contents("../storage/errorlog.log", $e . "\n\n", FILE_APPEND);
        http_response_code(500);
        require("../views/status_codes/500.php");
    } catch(ErrorException $e){
        $log->internal_log($e, "Site Error!");
        ob_clean();
        http_response_code(500);
        echo $e;
        file_put_contents("../storage/errorlog.log", $e . "\n\n", FILE_APPEND);
        require("../views/really_bad_500.php");
        die();
    }
}

// aaaaaaaaaaaaaaaa my brain hurts 
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
            die();
        }

        ob_start();

        $auth = new authentication();
        $router = new routing();
        
        if($_ENV["ACTUAL_MAINTENANCE"] == "true"){
            require("../views/really_bad_500.php");
            die();
        }

        if($_ENV["MAINTENANCE"] == "true"){
            if(isset($_COOKIE["maint_bypass"])){
                $maintcode = $_COOKIE["maint_bypass"];

                global $db;

                $validmaintcode = $db->table("maintcodes")->where("code", $maintcode)->first();

                if($validmaintcode == null){
                    require("../views/maintenance.php");
                    die();
                }
            } else {
                if(!isset($_SERVER['HTTP_AUTHORIZATION'])){
                    if(isset($_GET["validate"])){
                        $maintcode = $_GET["validate"];

                        $validmaintcode = $db->table("maintcodes")->where("code", $maintcode)->first();

                        if($validmaintcode == null){
                            require("../views/maintenance.php");
                            die();
                        } else {
                            setcookie("maint_bypass", $maintcode, $validmaintcode->expires, "", ".watrbx.wtf");
                        }
                    } else {
                        require("../views/maintenance.php");
                        die();
                    }
                } else {
                    if($_SERVER["HTTP_AUTHORIZATION"] !== $_ENV["DISCORD_BOT_AUTH"]){
                        require("../views/maintenance.php");
                        die();
                    }
                }
            }
        }

        $router->addrouter('webhandler');
        $router->addrouter('apihandler');
        $router->addrouter('studiohandler');
        $router->addrouter('clienthandler');
        $router->addrouter('gameserverhandler');
        $router->addrouter('mobilehandler');
        $router->addrouter('discordbothandler');
        $router->addrouter('bootstraphandler');
        $router->addrouter('forumhandler');
        $router->addrouter('chathandler');
        $router->addrouter('pbshandler');
        $router->addrouter('datapershandler');

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = strtolower($uri);
        $method = $_SERVER['REQUEST_METHOD'];
        $router->dispatch($uri, $method);

        ob_end_flush();

    } catch(PDOException $e){
        
        try {
            
        } catch(ErrorException $e){
            $log = new discord();
            $log->internal_log($e, "Site Error!");
            ob_clean();
            echo $e;
            file_put_contents("../storage/errorlog.log", $e . "\n\n", FILE_APPEND);
            require("../views/really_bad_500.php");
            die();
        }
    }

    
} catch(ErrorException $e){
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
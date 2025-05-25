<?php

use watrlabs\router\routing;
use watrlabs\authentication;
use watrlabs\users\getuserinfo;

require_once '../init.php';

try {

    try {
        
        global $db;
        global $router;

        ob_start();

        $auth = new authentication();
        $router = new routing();

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
                            setcookie("maint_bypass", $maintcode, $validmaintcode->expires, "", ".watrbx.xyz");
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

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $router->dispatch($uri, $method);

        ob_end_flush();

    } catch(PDOException $e){
        try {
            ob_clean();
            http_response_code(500);
            require("../views/status_codes/500.php");
        } catch(ErrorException $e){
            ob_clean();
            http_response_code(500);
            die("A fatal error occured.");
        }
    }

    
} catch(ErrorException $e){
    try {
        ob_clean();
        http_response_code(500);
        require("../views/status_codes/500.php");
    } catch(ErrorException $e){
        ob_clean();
        http_response_code(500);
        die("A fatal error occured.");
    }

}
// aaaaaaaaaaaaaaaa my brain hurts 
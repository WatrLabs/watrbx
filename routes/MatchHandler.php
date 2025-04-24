<?php
// ../routes/template.php
use swordrunning\gameserver;
use watrlabs\logging;
$gameserver = new gameserver();



// make sure you replace setup<PHP FILE NAME>Routes function

function setupMatchHandlerRoutes($router) {
    $router->group('/matchmake', function($router) {
        $router->get('/', function() {
            die(include("../templates/matchmake/games.php"));
        });
        
        $router->get('/serverstart', function() {
            if(isset($_GET["jobid"])){
                if(strpos($_GET['jobid'],'apikey')){
                    $geeet = $_GET["jobid"];
                    //die($apikey);
                    
                    $exploded = explode("apikey=", $geeet);
                    
                    $jobid = $exploded[0];
                    
                    //die($jobid);
                    
                    $apikey = $exploded[1];
                    
                    if($apikey == rccapikey){
                        include("../conn.php");
                        $markactive = $pdo->prepare("UPDATE games SET isactive = 1 WHERE jobid = ?");
                        $markactive->execute([$jobid]);
                        die("Marked Active."); 
                    } else {
                        die("An error occured.");
                        http_response_code(400);
                    }
                    
                } else {
                    die();
                }
                
                
                
            } else {
                die("Something went wrong.");
                http_response_code(400);
            }
        });
        
        $router->get('/serverend', function() {
            if(isset($_GET["jobid"])){
                if(strpos($_GET['jobid'],'apikey')){
                    $geeet = $_GET["jobid"];
                    //die($apikey);
                    
                    $exploded = explode("apikey=", $geeet);
                    
                    $jobid = $exploded[0];
                    
                    //die($jobid);
                    
                    $apikey = $exploded[1];
                    
                    if($apikey == rccapikey){
                        include("../conn.php");
                        
                        $killserver = $pdo->prepare("SELECT * FROM games WHERE jobid = ?");
                        $killserver->execute([$jobid]);
                        $killinfo = $killserver->fetch(PDO::FETCH_ASSOC);
                        
                        $markactive = $pdo->prepare("DELETE FROM games WHERE jobid = ?");
                        $markactive->execute([$jobid]);
                        $gameserver = new gameserver();
                        $gameserver->closeServer($jobid . "/".arbiterKey);
                        //$gameserver->closeServer($jobid . "/".arbiterKey);
                        //$gameserver->closeServer($jobid . "/".arbiterKey);

                        if(!$killinfo){
                            $logging = new logging();
                            $logging->logwebhook("Server was killed but **not** found in the database");
                        } else {
                            $logging = new logging();
                            $logging->logwebhook("Game ID " . $killinfo["place"] . " has automatically closed.");
                        }

                        die("Server Killed."); 
                    } else {
                        die("An error occured.");
                        http_response_code(400);
                    }
                    
                } else {
                    die();
                }
                
                
                
            } else {
                die("Something went wrong.");
                http_response_code(400);
            }
        });
        
        $router->get('/updatejob', function() {
            
            if (isset($_GET['key'])) {
                $key = $_GET['key'];
                if ($key == arbiterKeySite) {
                    
                    $jobid = $_GET["jobid"];
                    $status = $_GET["status"];
                    
                    include("../conn.php");
                    $insertplayer = $pdo->prepare("UPDATE jobs SET status = ? WHERE jobid = ?");
                    $insertplayer->execute([$playerid, $pid, $jobid]);
                } else {
                    die();
                }
            } else {
                die();
            }
            
        });
        
        $router->get('/clientupdate', function() {
            if(isset($_GET["action"])){
                $action = explode("=", $_GET["action"]);
                
                //include_once("../pagehandler/logging.php");
                //weblog($action, "Action");
                
                try {
                    $actn = $action[0];
                    $pid = $action[1];
                    $apikey = $action[2];
                    $playerid = $action[3];
                    $jobid = $action[4];
                } catch(ErrorException $e){
                    http_response_code(400);
                    die("Not all values provided. $e");
                }
                
                if($apikey == rccapikey){
                    
                    if($actn == "connect"){
                        include("../conn.php");
                        $insertplayer = $pdo->prepare("INSERT INTO activeplayers (playerid, pid, jobid) VALUES (?, ?, ?)");
                        $insertplayer->execute([$playerid, $pid, $jobid]);
                        
                        $time = time();

                        $getuniverse = $pdo->prepare("SELECT * FROM universes WHERE placeid = ?");
                        $getuniverse->execute([$pid]);
                        $universeinfo = $getuniverse->fetch(PDO::FETCH_ASSOC);

                        $insertvisit = $pdo->prepare("INSERT INTO visits (universeid, userid, time) VALUES (?, ?, ?)");
                        $insertvisit->execute([$universeinfo["id"], $playerid, $time]);


                        $logging = new logging();
                        $logging->logwebhook("Player $playerid has joined place id $pid");
                        die("Success!");
                        
                        
                    } elseif($actn == "disconnect"){
                        
                        include("../conn.php");
                        $insertplayer = $pdo->prepare("DELETE FROM activeplayers WHERE playerid = ? AND pid = ? AND jobid = ?");
                        $insertplayer->execute([$playerid, $pid, $jobid]);
                        $logging = new logging();
                        $logging->logwebhook("Player $playerid has left place id $pid");
                        die("Success!");
                        
                    } else {
                        http_response_code(400);
                        die("");
                    }
                    
                } else {
                    http_response_code(400);
                    die("");
                }
                
                
            }
        });
        
        $router->get('/closeall', function() {
            header('Content-Type:text/plain');
            if (isset($_GET['key'])) {
                $key = $_GET['key'];
                if ($key == arbiterKeySite) {
                    include("../conn.php");
                    $newThingy = $pdo->prepare("TRUNCATE `games`");
                    $newThingy->execute();
                    $logging = new logging();
                    $logging->logwebhook("RCC has crashed or is restarting!");
                    die("All games closed.");
                } else {
                    die();
                }
            } else {
                die();
            }
        });
        
        $router->get('/getopen', function() {
           header('Content-Type:text/json');
            if(isset($_GET['key'])) {
                $key = $_GET['key'];
                if($key == arbiterKeySite) {
                    $gameserver = new gameserver();
                    echo $gameserver::getRunning();
                }
                else {
                    die();
                }
            } else {
                die();
            }
        });
        
        $router->get('/getqueue', function() {
            //error_log("Entering /matchmake/getqueue route.");
            header('Content-Type: application/json');
            if(isset($_GET['key'])) {
                $gameserver = new gameserver();
                $key = $_GET['key'];
                if($key == arbiterKeySite) {
                    die($gameserver::getTopQueue());
                } else {
                    die();
                }
                
            } else {
                error_log("Key parameter missing.");
                die();
            }
        });

        
        $router->post('/deletetop', function(){
           header('Content-Type:text/json');
            if(isset($_GET['key'])) {
                $key = $_GET['key'];
                if($key == arbiterKeySite) {
                    $gameserver = new gameserver();
                    $gameserver::deleteTopQueue();
                } else {
                    die();
                }
            } else {
                die();
            }
        });
        
        $router->post('/open', function() {
           if(isset($_GET['key']) && isset($_GET['place']) && isset($_GET['port']) && isset($_GET["jobId"])) {
                $key = $_GET['key'];
                $place = $_GET['place'];
                $port = $_GET['port'];
                $jobId = $_GET['jobId'];
                if($key == arbiterKeySite) {
                    include(baseurl . "/conn.php");
                    
                    $checkifexists = $pdo->prepare("SELECT * FROM games WHERE place = ?");
                    $checkifexists->execute([$place]);
                    $doesitexist = $checkifexists->fetch(PDO::FETCH_ASSOC);
                    
                    if(!$doesitexist){
                        $gameserver = new gameserver();
                        $gameserver::openServer($place, $port, $jobId);
                        $logging = new logging();
                        $logging->logwebhook("Place ID: $place has opened!");
                    }
                    
                    
                    die();
                } else {
                    die();
                }
            } else {
                die();
            }
        });
        
        $router->get('/close', function() {
            if(isset($_GET['key']) && isset($_GET['jobId'])) {
                $key = $_GET['key'];
                $place = $_GET['jobId'];
                if($key == arbiterKeySite) {
                    $gameserver = new gameserver();
                    include(baseurl . '/conn.php');
                    $newThingy = $pdo->prepare("DELETE FROM games WHERE jobId = ?");
                    $newThingy->execute([$place]);
                    $gameserver::closeServer($place . "/".arbiterKey);
                    $logging = new logging();
                    $logging->logwebhook("Place ID: $place has been closed.");
                }
            } 
        });
        
        $router->get('/add', function() {
            header('Content-Type:text/json');
            if($loggedIn && isset($_GET['place'])) {
                gamegames::addToQueue($_GET['place']);
                die("added.");
            } else {
                die("please log in.");
            }

        });
        
    });
}
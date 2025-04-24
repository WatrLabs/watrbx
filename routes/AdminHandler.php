<?php
// ../routes/template.php
use watrlabs\authentication;
use watrbx\sitefunctions;
use watrlabs\logging;

// make sure you replace setup<PHP FILE NAME>Routes function

function checkperms() {
    // yea this is really lazy but it works so
    $auth = new authentication();
    
    if(isset($_COOKIE["watrbxcookie"])){
        $cookie = $_COOKIE["watrbxcookie"]; // putting it in a variable so I dont have to type a paragraph like I am now because im lazy but not but I am but im not afasdlgfjk;sdfgf;dlgshf g
        $userinf = $auth->getuserinfo($cookie);
        if(!$userinf["role"] == 1){
            die(require("../pagehandler/403.php")); // why tf do we not have a 403 file??? (i'm blaming czech for no reason)
            // ok I really lazily wrote one (I just copied and pasted the 404 one 🤪)
        }
    } else {
        header("Location: /login");
        die();
    }
    
}

function setupAdminHandlerRoutes($router) {
    $router->group('/api/admin', function($router) {
        $router->post('/makekey', function() {
                checkperms(); // again I told you this was lazy
                
                if(isset($_POST["uses"])){
                    if (!isset($_POST["uses"]) || !is_numeric($_POST["uses"]) || $_POST["uses"] > 50) {
                        die("Invalid input or too many uses! (limit is 50!)");
                    } else {
                        
                        if(isset($_COOKIE["watrbxcookie"])){
                            $cookie = $_COOKIE["watrbxcookie"]; // putting it in a variable so I dont have to type a paragraph like I am now because im lazy but not but I am but im not afasdlgfjk;sdfgf;dlgshf g
                            $auth = new authentication();
                            $userinf = $auth->getuserinfo($cookie);
                        } else {
                            header("Location: /login");
                            die();
                        }
                        
                        $funcs = new sitefunctions();
                        $uses = $_POST["uses"];
                        
                        $keypart1 = "watrbxkey-";
                        $keypart2 = $funcs->genstring(16);
                        
                        $key = $keypart1 . $keypart2;
                        
                        require(baseurl . "/conn.php");
                        
                        $owner = $userinf["id"];
                        
                        
                        
                        $query = 'INSERT INTO invitekeys (invkey, owner, usedamount, date) VALUES (?, ?, ?, ?)';
                        $stmt = $pdo->prepare($query);
                        $stmt->execute([$key, $owner, $uses, time()]);
                        
                        header("Location: /admin/invkeys");
                    }
                } else {
                    die("Not all forms were filled out!");
                }
                
        });
        
        $router->post('/siteconfig', function() {
                checkperms();
                
                if(isset($_POST["sitebanner"])){
                    require(baseurl . "/conn.php");
                    $sitebanner = $_POST["sitebanner"]; // im gonna allow html for now, just dont abuse it.
                    $siteupdate = $pdo->prepare("UPDATE config SET sitebanner = :sitebanner");
                    $siteupdate->bindParam(':sitebanner', $sitebanner, PDO::PARAM_STR);
                    $siteupdate->execute();
                    header("Location: /admin/site-config");
                }
                
                if(isset($_POST["regenabled"])){
                    require(baseurl . "/conn.php");
                    $regenabled = (int)$_POST["regenabled"];
                    $siteupdate = $pdo->prepare("UPDATE config SET register_enabled = :regenabled");
                    $siteupdate->bindParam(':regenabled', $regenabled, PDO::PARAM_STR);
                    $siteupdate->execute();
                    header("Location: /admin/site-config");
                }
                
    });

    $router->post('/ban', function() {
        checkperms();

        $sitefunc = new sitefunctions();

        if(isset($_POST["username"]) && isset($_POST["note"])){
            $baduser = $_POST["username"];
            $note = $_POST["note"];

            include(baseurl . "/conn.php");



            $banid = $sitefunc->createjobid();

            $checkuser = $pdo->prepare("SELECT id, username FROM users WHERE username = :username");
            $checkuser->bindParam(':username', $baduser, PDO::PARAM_STR);
            $checkuser->execute();
            $baduserinfo = $checkuser->fetch(PDO::FETCH_ASSOC);

            if($baduserinfo !== false){

                $userid = $baduserinfo["id"];
                
                $auth = new authentication();
                $modinfo = $auth->getuserinfo($_COOKIE["watrbxcookie"]);

                $modid = $modinfo["id"];
                $moderator = $modinfo["username"];

                $banuser = $pdo->prepare("INSERT INTO bans (id, userid, moderatorid, moderator, reason) VALUES (:banid, :userid, :modid, :moderator, :reason)");
                $banuser->bindParam(':banid', $banid, PDO::PARAM_STR);
                $banuser->bindParam(':userid', $userid, PDO::PARAM_INT);
                $banuser->bindParam(':modid', $modid, PDO::PARAM_INT);
                $banuser->bindParam(':moderator', $moderator, PDO::PARAM_STR);
                $banuser->bindParam(':reason', $note, PDO::PARAM_STR);
                $banuser->execute();
                $sitefunc->set_message("User ". $baduserinfo["username"] . " was banned.", "info");
                
                $logging = new logging();
                $logging->logwebhook("User " . $baduserinfo["username"] . " has been struck by the ban hammer!\n*". $note ."*");
                header("Location: /admin/banuser");

            } else {
                
                $sitefunc->set_message("Couldn't find user!", "error");
                header("Location: /admin/banuser");
            }

            

        } else {
            $sitefunc->set_message("Not all forms filled out correctly!", "error");
            header("Location: /admin/banuser");
        }

    });
        
    });
    
    
    
    $router->group('/admin', function($router) {
        $router->get('/', function() {
                checkperms(); // again I told you this was lazy
                die(require("../templates/admin/index.php"));
        });
        
        $router->get('/refers', function() {
                checkperms(); // again I told you this was lazy
                die(require("../templates/admin/refers.php"));
        });
        
        $router->get('/invkeys', function() {
                checkperms(); // again I told you this was lazy
                die(require("../templates/admin/invkey.php"));
        });
        
        $router->get('/site-config', function() {
                checkperms(); // again I told you this was lazy
                die(require("../templates/admin/siteconf.php"));
        });
        
        $router->get('/create-key', function() {
                checkperms(); // again I told you this was lazy
                die(require("../templates/admin/createinvkey.php"));
        });

        $router->get('/banuser', function() {
            checkperms(); // again I told you this was lazy
            die(require("../templates/admin/banuser.php"));
    });
        
        $router->get('/games', function() {
                checkperms(); // again I told you this was lazy
                die(require("../templates/admin/games.php"));
        });
    });
    
    
    
        
}

<?php
// ../routes/WebHandler.php
// written by WaterBoi
use watrlabs\authentication;
use watrlabs\logging;
use watrbx\sitefunctions;
$auth = new authentication();

global $router;
        
        $router->get('/', function() {
                include("../views/index.php");
        });

        $router->get('/game/{id}/update', function($id) {
            include("../views/update-game.php");
        });
        
        $router->get('/info/privacy', function() {
                include("../views/info/privacy.php");
        });
        
        $router->get('/info/tos', function() {
                include("../views/info/tos.php");
        });
        
        $router->get('/catalog', function() {
                include("../views/catalog.php");
        });
        
        $router->post("/api/joberror", function() {
            if(isset($_GET["jobid"])) {
                $jobid = $_GET["jobid"];
                
                include(baseurl . "/conn.php");
                $updatejob = $pdo->prepare("UPDATE jobs SET status = ? WHERE jobid = ?");
                $updatejob->execute(["2", $jobid]);
                
                echo "Success.";
                
            }  
        });
        
        $router->get('/api/get-thumb', function() {
            
                if(isset($_GET["error"])){
                    $err = file_get_contents("../storage/renders/error.png");
                    header("Content-type: image/png");
                    die($err);
                }
            
                if(isset($_GET["assetid"]) && isset($_GET["dimensions"])){
                    
                    $func = new sitefunctions();
                    
                    include(baseurl . "/conn.php");
                    
                    $assetid = (int)$_GET["assetid"];
                    $dimensions = $_GET["dimensions"];
                    
                    if(!preg_match('/^\d+x\d+$/', $dimensions)){
                        $err = file_get_contents("../storage/renders/error.png");
                        header("Content-type: image/png");
                        die($err);
                    }
                    
                    $tornapart = explode("x", $dimensions);
                    
                    $x = (int)$tornapart[0];
                    $y = (int)$tornapart[1];
                    
                    if($x >= 2000 || $y >= 2000){
                        $err = file_get_contents("../storage/renders/error.png");
                        header("Content-type: image/png");
                        die($err);
                    }
                    
                    if($x <= 50 || $y <= 50){
                        $err = file_get_contents("../storage/renders/error.png");
                        header("Content-type: image/png");
                        die($err);
                    }
                    
                    
                    $getthumbdata = $pdo->prepare("SELECT * FROM thumbnails WHERE assetid = ? AND dimensions = ?");
                    $getthumbdata->execute([$assetid, $dimensions]);
                    $thumbdata = $getthumbdata->fetch(PDO::FETCH_ASSOC);
                    
                    if($thumbdata !== false){
                        // the thumbnail exists!
                        
                        try {
                            header("Cache-Control: public, max-age=86400");
                            header("Expires: " . gmdate("D, d M Y H:i:s", time() + 86400) . " GMT");
                            $render = file_get_contents($thumbdata["file"]);
                            header("Content-type: image/png");
                            //imagepng($thumbdata["file"]);
                            die($render);
                            
                        } catch (ErrorException $e){
                            $err = file_get_contents("../storage/renders/error.png");
                            header("Content-type: image/png");
                            die($err);
                        }
                        
                        
                    } else {
                        // thumb does not exist!
                        
                        $getthumbdata = $pdo->prepare("SELECT * FROM jobs WHERE assetid = ? AND dimensions = ?");
                        $getthumbdata->execute([$assetid, $dimensions]);
                        $thumbdata = $getthumbdata->fetch(PDO::FETCH_ASSOC);
                        
                        
                        
                        if($thumbdata !== false){
                            
                            if($thumbdata["status"] == 2){
                                $err = file_get_contents("../storage/renders/error.png");
                                header("Content-type: image/png");
                                die($err);
                            }
                            
                            
                            $tornapart = explode("x", $dimensions);
                            
                            if(!isset($tornapart[1])){
                                header("Content-type: image/png");
                                die(file_get_contents("../storage/renders/pending.png")); // dimensions are invalid... just throw the pending at them
                            }
                            
                            
                            $x = (int)$tornapart[0];
                            $y = (int)$tornapart[1];
                            $resized = $func->resize_image("../storage/renders/pending.png", $x, $y);
                        
                            header("Content-type: image/png");
                            imagepng($resized);
                            die();
                            // its already in queue so dont add it again!
                        }
                        
                        
                        $jobid = $func->createjobid();
                        $jobtype = 2;
                        
                        $insertjob = $pdo->prepare("INSERT INTO jobs (jobid, jobtype, assetid, dimensions) VALUES (:jobid, :jobtype, :assetid, :dimensions)");
                        $insertjob->bindParam(':jobid', $jobid, PDO::PARAM_STR);
                        $insertjob->bindParam(':jobtype', $jobtype, PDO::PARAM_INT);
                        $insertjob->bindParam(':assetid', $assetid, PDO::PARAM_INT);
                        $insertjob->bindParam(':dimensions', $dimensions, PDO::PARAM_STR);
                        $insertjob->execute();
                        
                        try {
                            $tornapart = explode("x", $dimensions);
                            //var_dump($tornapart);
                            //die();
                            
                            if(!isset($tornapart[1])){
                                header("Content-type: image/png");
                                die(file_get_contents("../storage/renders/pending.png")); // dimensions are invalid... just throw the pending at them
                            }
                            $x = (int)$tornapart[0];
                            $y = (int)$tornapart[1];
                        
                            //$pending = file_get_contents();
                            $resized = $func->resize_image("../storage/renders/pending.png", $x, $y);
                        
                            header("Content-type: image/png");
                            die($resized);
                        } catch (ErroException $e){
                            $err = file_get_contents("../storage/renders/error.png");
                            header("Content-type: image/png");
                            die($err);
                        }
                        
                    }
                    
                } else {
                    http_response_code(400);
                    $errarray = array("error"=>"Bad Request");
                    die(json_encode($errarray));
                }
        });
        
        $router->get('/get-ticket', function() {
                
            if(isset($_COOKIE["watrbxsession"])){
                die($_COOKIE["watrbxsession"]);
            } else {
                header("Location: /login");
                die();
            }
        });

        $router->get("/login", function() {
            //
                include "../views/login.php";
        });
        
        $router->get("/games", function() {
                include "../views/games.php";
        });
        
        $router->get("/captcha", function() {
                include "../views/captcha.php";
        });
        
        $router->get("/game/{id}/", function($id) {
            // 
                include "../views/play.php";
        });
        
        $router->get("/logout", function() {
            
            setcookie("watrbxsession", "", time() - 99999999, "/", "", false, true);
            setcookie(".ROBLOSECURITY", "", time() - 86400, "/", "", false, true);
            header("Location: /");
            die();
        });
        
        $router->get("/game/logout.aspx", function() {
            
            setcookie("watrbxsession", "", time() - 99999999, '');
            setcookie(".ROBLOSECURITY", "", time() - 86400, "/", "", false, true);
        });
        
        $router->post("/login", function() {
            
            //$sitefunc = new sitefunctions();
            //$sitefunc->set_message("Login is currently disabled. Check back later!", "notice");
            //header("Location: /login");
            //die();

            if(isset($_POST["username"]) && isset($_POST["password"])){
                $auth = new authentication();
                $result = $auth->login($_POST["username"], $_POST["password"]);
                $decoded = json_decode($result, true);
                
                if($decoded["code"] == 200){
                    //$token = $decoded["token"];
                    //setcookie("watrbxsession", $token, time() + 864000, '');
                    //setcookie(".ROBLOSECURITY", $token, time() + 864000, "/", "", false, true);
                    header("Location: /home");
                } else {
                    //$sitefunc = new sitefunctions();
                    //$sitefunc->set_message($decoded["message"], "error");
                    header("Location: /login");
                    die();
                    //die($decoded["message"]);
                }

            } else {
                $sitefunc = new sitefunctions();
                $sitefunc->set_message("Something was empty!", "error");
                header("Location: /login");
                die();
            }
            
        });
        
        $router->get("/device/initialize", function() {
            header("Content-Type: application/json");
            die('{"browserTrackerId":0,"appDeviceIdentifier":null}');
        });
        
        $router->post("/mobileapi/login/", function(){
            
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $auth = new authentication();
                $result = $auth->login($_POST["username"], $_POST["password"]);
                $decoded = json_decode($result, true);
                
                if($decoded["code"] == 200){
                    include(baseurl . "/conn.php");
                    $getuserdata = $pdo->prepare("SELECT * FROM users WHERE username = ?");
                    $getuserdata->execute([$_POST["username"]]);
                    $userdata = $getuserdata->fetch(PDO::FETCH_ASSOC);
                    $token = $decoded["token"];
                    setcookie("watrbxsession", $token, time() + 864000, '');
                    setcookie(".ROBLOSECURITY", $token, time() + 864000, "/", "", false, true);
                    
                    if($userdata["builderclub"] == "None"){
                        $hasbuildersclub = false;
                    } else {
                        $hasbuildersclub = true;
                    }
                    
                    die(json_encode([
                        "Status" => "OK",
                        "UserInfo" => [
                            "UserID" => $userdata["id"],
                            "UserName" => $userdata["username"],
                            "RobuxBalance" => $userdata["robux"],
                            "TicketsBalance" => $userdata["tix"],
                            "IsAnyBuildersClubMember" => $hasbuildersclub,
                            "ThumbnailUrl" => ""
                        ]
                        ],JSON_UNESCAPED_SLASHES)); 
                        
                    header("Location: /home");
                } else {
                    die($decoded["message"]);
                }

            } else {
                die("A form is empty.");
            }
            
            header('Content-Type: application/json; charset=UTF-8; X-Robots-Tag: noindex'); 
            die(json_encode([
                "Status" => "OK",
                "UserInfo" => [
                    "UserID" => 1,
                    "UserName" => "UsernameHere",
                    "RobuxBalance" => 0,
                    "TicketsBalance" => 0,
                    "IsAnyBuildersClubMember" => false,
                    "ThumbnailUrl" => ""
                ]
            ],JSON_UNESCAPED_SLASHES)); 
        });
        
        $router->get("/register", function() {
            include "../views/register.php";
        });
        
        $router->get("/game/upload", function() {
            
            //ie("Not usable currently.");
            include "../views/creategame.php";
        });
        
        //$router->get("/games", function() {
        //    
        //    include "../views/games.php";
        //});

        $router->post("/api/update-game", function() {
            if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_GET["id"])) {

                $auth = new authentication();
                $csrfvalid = $auth->verifycsrf($_COOKIE["csrftoken"], "updategame");
                if(!$csrfvalid){
                    $sitefunc = new sitefunctions();
                    $sitefunc->set_message("An error occured updating your game! Please try again.", "error");
                    header("Location: /game/upload");
                    die();
                }

                $id = $_GET["id"];
                $title = $_POST["title"];
                $description = $_POST["description"];

                if(strlen($title) >= 50){
                    //die("Title is too long!");
                    $sitefunc = new sitefunctions();
                    $sitefunc->set_message("Title is too long.", "error");
                    header("Location: /game/upload");
                    die();
                }
                
                if(strlen($description) >= 150){
                    //die("Title is too long!");
                    $sitefunc = new sitefunctions();
                    $sitefunc->set_message("Description is too long.", "error");
                    die();
                }

                $sitefunc = new sitefunctions();
                $universe = $sitefunc->getuniverseinfo($id);
                $auth = new authentication();
                $userinfo = $auth->getuserinfo($_COOKIE["watrbxsession"]);

                if($userinfo == false){
                    header("Location: /login"); // please login.
                    die();
                } else {
                    $userid = $userinfo["id"];

                    if($universe["owner"] !== $userinfo["id"]){
                        http_response_code(403); // they dont have permissions to update it
                        $sitefunc = new sitefunctions();
                        $sitefunc->set_message("You do not have permission to update this game!", "error");
                        header("Location: /games");
                        die();
                    }

                }

                $title = htmlentities($title);
                $desc = htmlentities($description);

                // I think its good now
                // xss prevention
                // length check
                // perms check
                // csrf protection

                $time = time();

                include(baseurl . "/conn.php");
                $updateuniverse = $pdo->prepare("UPDATE `universes` SET `title` = :title, `description` = :description WHERE `id` = :id");
                $updateuniverse->bindParam(':title', $title, PDO::PARAM_STR);
                $updateuniverse->bindParam(':description', $description, PDO::PARAM_STR);
                $updateuniverse->bindParam(':id', $id, PDO::PARAM_INT);
                $updateuniverse->execute();

                $updateplace = $pdo->prepare("UPDATE `assets` SET `updated` = :time, name = :title WHERE `id` = :id");
                $updateplace->bindParam(':time', $time, PDO::PARAM_INT);
                $updateplace->bindParam(':title', $title, PDO::PARAM_STR);
                $updateplace->bindParam(':id', $universe["placeid"], PDO::PARAM_INT);
                $updateplace->execute();

                if (isset($_FILES["assetfile"]) && $_FILES["assetfile"]["size"] > 0) {
                    $sitefunc = new sitefunctions();
                    $name = $sitefunc->genstring(40);
                    $location = "../storage/assets/$name.asset";
                    $assetname = "$name.asset";
                    $handle = fopen($_FILES["assetfile"]["tmp_name"], "rb");
                    
                    $header = fread($handle, 7);
                    fclose($handle);
                    
                    if ($header !== "<roblox") {
                        $sitefunc = new sitefunctions();
                        $sitefunc->set_message("Failed to upload asset!", "error");
                        header("Location: /game/" . $universe["id"] . "/update");
                        die();
                    }
                    
                    if(move_uploaded_file($_FILES["assetfile"]["tmp_name"], $location)){
                        $placeinfo = $sitefunc->getplaceinfo($universe["placeid"]);
                        $oldasset = $placeinfo["assetfile"];

                        $addversion = $pdo->prepare("INSERT INTO `versionhistory` (placeid, file_id, datemodified) VALUES (:placeid, :file_id, :datemodified)");
                        $addversion->bindParam(':placeid', $universe["placeid"], PDO::PARAM_INT);
                        $addversion->bindParam(':file_id', $oldasset, PDO::PARAM_STR);
                        $addversion->bindParam(':datemodified', $time, PDO::PARAM_INT);
                        $addversion->execute();

                        $updateplace = $pdo->prepare("UPDATE `assets` SET `assetfile` = :file WHERE `id` = :id");
                        $updateplace->bindParam(':file', $assetname, PDO::PARAM_STR);
                        $updateplace->bindParam(':id', $universe["placeid"], PDO::PARAM_INT);
                        $updateplace->execute();

                        $stmt = $pdo->prepare("SELECT * FROM thumbnails WHERE assetid = :pid");
                        $stmt->bindParam(':pid', $universe["placeid"], PDO::PARAM_INT);
                        $stmt->execute();
                        $allthumbs = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach($allthumbs as $thumb){
                            try {
                                unlink($thumb["file"]);
                            } catch(ErrorException $e) {
                                // LOLLL!!! GET REKT PHP!! LOOSZER!!!
                            }
                        }

                        $stmt = $pdo->prepare("DELETE FROM thumbnails WHERE assetid = :pid");
                        $stmt->bindParam(':pid', $universe["placeid"], PDO::PARAM_INT);
                        $stmt->execute(); // pklease work or im finna crash
            

                        $sitefunc = new sitefunctions();
                        $sitefunc->set_message("Updated game.", "info");
                        header("Location: /game/" . $universe["id"] . "/update");
                        die();

                    } else {
                        http_response_code(500);
                        $sitefunc = new sitefunctions();
                        $sitefunc->set_message("Title & Description were updated but we failed to update the game file.", "info");
                        header("Location: /game/" . $universe["id"] . "/update");
                        die();
                    }
                } else {
                    $sitefunc = new sitefunctions();
                    $sitefunc->set_message("Updated game.", "info");
                    header("Location: /game/" . $universe["id"] . "/update");
                    die();
                }

            } else {
                http_response_code(400);
                $sitefunc = new sitefunctions();
                $sitefunc->set_message("A form was empty.", "error");
                header("Location: /games");
                die();
            }

        });
        
        
        $router->post("/api/create-game", function() {
           function genstring($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
             $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        
        if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_COOKIE["csrftoken"])){
            
            global $db;

            if(strlen($_POST["name"]) >= 50){
                //die("Title is too long!");
                $sitefunc = new sitefunctions();
                $sitefunc->set_message("Title is too long.", "error");
                header("Location: /game/upload");
                die();
            }
            
            if(strlen($_POST["description"]) >= 150){
                //die("Title is too long!");
                $sitefunc = new sitefunctions();
                $sitefunc->set_message("Description is too long.", "error");
                header("Location: /game/upload");
                die();
            }
            
            $auth = new authentication();
            if(!$_COOKIE["watrbxsession"]){
                die();
            } else {
                $userinfo = $auth->getuserinfo($_COOKIE["watrbxsession"]);
            }

            $query = $db->table('universes')->where('id', '=', $userinfo->id);
            $count = $query->count();
            
            if($userinfo->role !== 1 && $count >= $userinfo->placelimit){
                //die("You've reached the game limit!");
                $sitefunc = new sitefunctions();
                $sitefunc->set_message("You've hit the game limit! If you would like your limit to be upped, contact an admin.", "notice");
                header("Location: /game/upload");
                die();
            }
            
            $auth = new authentication();
            $csrfvalid = $auth->verifycsrf($_COOKIE["csrftoken"], "creategame");
            
            if(!$csrfvalid){
                //die("An error occured.");
                $sitefunc = new sitefunctions();
                $sitefunc->set_message("An error occured!", "error");
                header("Location: /game/upload");
                die();
            }
            
            if(isset($_FILES["assetfile"])){
                $name = genstring(40);
                $location = "../storage/assets/$name.asset";
                $assetname = "$name.asset";
                
                try {
                    $handle = fopen($_FILES["assetfile"]["tmp_name"], "rb");
                } catch(ValueError $e) {
                    $sitefunc = new sitefunctions();
                    $sitefunc->set_message("Failed to upload asset!", "error");
                    header("Location: /game/upload");
                    die();
                }
                
                
                $header = fread($handle, 7);
                fclose($handle);
                
                if ($header !== "<roblox") {
                    $sitefunc = new sitefunctions();
                    $sitefunc->set_message("Failed to upload asset!", "error");
                    header("Location: /game/upload");
                    die();
                }
                
                if(move_uploaded_file($_FILES["assetfile"]["tmp_name"], $location)){
                    
                    $assetid = 1;
                    $time = time();
                    $name = htmlentities($_POST["name"]);
                    $description = htmlentities($_POST["description"]);
                    $insert = array(
                        "prodid"=>9,
                        "name"=>$name,
                        "assetid"=>$assetid,
                        "owner"=>$userinfo->id,
                        "created"=>$time,
                        "updated"=>$time,
                        "assetfile"=>$assetname
                    );

                    global $db;
                    $insertid = $db->table("assets")->insert($insert);

                    
                    // 🤦️
                    
                    $userid = $userinfo->id;

                    $insert = array(
                        "title"=>$name,
                        "description"=>$description,
                        "placeid"=>$insertid,
                        "owner"=>$userid
                    );

                    $insertid = $db->table("universes")->insert($insert);
                    
                    //$logging = new logging();
                    //$logging->logwebhook("A new game (".html_entity_decode($name).") has been uploaded!");
                    $sitefunc = new sitefunctions();
                    $sitefunc->set_message("Game uploaded successfully!", "notice");
                    header("Location: /game/$insertid/");
                    die();
                } else {
                    $sitefunc = new sitefunctions();
                    $sitefunc->set_message("Failed to upload asset!", "error");
                    header("Location: /game/upload");
                    die();
                }
            }
        } else {
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($_COOKIE);
            $sitefunc = new sitefunctions();
            $sitefunc->set_message("Something was empty.", "error");
            header("Location: /game/upload");
            die();
        } 
        });
        
        $router->post("/register", function() {
            
            
            $sitefunc = new sitefunctions();
            $siteconf = $sitefunc->getsiteconf();
            if($siteconf->register_enabled == 0){
                http_response_code(401);
                die();
            }

            if(!isset($_COOKIE["botprotection"])){
                $sitefunc = new sitefunctions();
                $sitefunc->set_message("Register is currently closed!", "error");
                header("Location: /register");
                die();
            }
            
            $auth = new authentication();
            if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confpassword"]) && isset($_POST["cf-turnstile-response"]) && isset($_POST["js_check"])){
                
                $dontreg = false;
                
                $badlist = array_map('trim', array_filter(explode(",", file_get_contents("../storage/bad_words.txt"))));
                
                foreach ($badlist as $word) {
                    if (stripos($_POST["username"], $word) !== false) {
                        $sitefunc = new sitefunctions();
                        $sitefunc->set_message("Username is not appropriate!", "error");
                        header("Location: /register");
		                die();
                    }
                }
                $func = new sitefunctions();
	            $cfresponse = $_POST["cf-turnstile-response"];
	            
	            $url = "https://challenges.cloudflare.com/turnstile/v0/siteverify";
                $post_data = array('secret' => $_ENV["TurnStileKey"], "response"=>$cfresponse);

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
                $server_output = curl_exec($ch);
   
                $responseKeys = json_decode($server_output ,true);
	            if(intval($responseKeys["success"]) !== 1) {
	                $sitefunc = new sitefunctions();
                    $sitefunc->set_message("Captcha validation failed!", "error");
                    header("Location: /register");
		            die();
	            } 
                
                $keycheck = true;
                
                if($keycheck){

                    if($_POST["password"] !== $_POST["confpassword"]){
                        $sitefunc = new sitefunctions();
                        $sitefunc->set_message("Passwords do not match!", "error");
                        header("Location: /register");
		                die();
                    }
                    
                    $result = $auth->createuser($_POST["username"], $_POST["password"], $_POST["confpassword"]);
                    $decoded = json_decode($result, true);
                      
                    if($decoded["code"] == 200){
                        
                        if(isset($_COOKIE["referer"])){
                            
                            $referid = $_COOKIE["referer"]; 

                            global $db;

                            
                            $query = $db->table("refers")->where("refername", $referid);
                            $referdata = $query->first();
            
                            if($referdata !== null){
                                $newsignups = $referdata->signiups + 1;
                                $db->table("refers")->update(array("signups"=>$newsignups, "refername"=>$referid));

                            }
                        
                        }
                        
                        //$currentuses = $keycheck["uses"];
                        //$newuses = $currentuses + 1;
                    
                        //$stmt = $pdo->prepare("UPDATE invitekeys SET uses = ? WHERE invkey = ?");
                        //$stmt->execute([$newuses, $_POST["key"]]);
                
                        //$stmt = $pdo->prepare("UPDATE users SET signup_key = ? WHERE username = ?");
                        //$stmt->execute([$_POST["key"], $_POST["username"]]);
                        
                        //$token = $decoded["token"];
                        //setcookie("watrbxsession", $token, time() + 864000, '');
                        
                        //$emailhtml = file_get_contents("../storage/email-views/welcome.html");
                        //$emailhtml = str_replace("{username}",$_POST["username"], $emailhtml); // eventually make a parser for this
                        //sendmail("info@watrlabs.lol", $_POST["email"], "Welcome to watrbx!", $emailhtml, true);
                        
                        header("Location: /home");
                        die();
                    } else {
                        //die($decoded["message"]); // eventually have this use a better message system instead of just giving it to the user raw
                        
                        // ^^^^ who's gonna tell bro....
                        
                        $sitefunc = new sitefunctions();
                        $sitefunc->set_message($decoded["message"], "error");
                        header("Location: /register");
                        die();
                    }
                } else {
                    $sitefunc = new sitefunctions();
                    $sitefunc->set_message("Invite key is invalid or has too many uses!", "error");
                    header("Location: /register");
                    die();
                }
                
                
            } else {
                //echo var_dump($_POST);
                $sitefunc = new sitefunctions();
                $sitefunc->set_message("A form is empty!", "error");
                header("Location: /register");
                die();
            }

        });

        $router->get("/users/{id}/", function($id) {
                include "../views/users.php";
        });
        
        $router->get("/home", function() {
            //
                include "../views/home.php"; 
        });
        
        $router->get("/thickofit", function() {
            #thick of it doesnt need any maintenance
            #
            echo "40 smthing milly subs or so ive been told";
        });
        
        $router->get("/unapproved", function() {
            die(include "../views/unapprove.php");
        });
        
        $router->get("/message", function() {
            die(include "../views/message.php");
        });
        
        $router->post("/message", function() {
            die(include "../views/message.php");
        });
        
        $router->get("/messages", function() {
            die(include "../views/messages.php");
        });
        
        $router->get("/messages/{id}", function($id) {
            die(include "../views/viewmessage.php");
        });

<?php
// ../routes/template.php

// make sure you replace setup<PHP FILE NAME>Routes function

use watrlabs\authentication;
use watrlabs\watrkit\sanitize;
use watrbx\sitefunctions;

function compileerror($error = "Unknown"){
    $errorarray = array(
        "success"=>false,
        "error"=> $error
    );
    
    return json_encode($errorarray);
};

global $router;

        $router->get('/api/get-quote', function() {
                header("Content-type: application/json");

                global $db;
                $query = $db->table("quotes")->join("users", "users.id", "=", "quotes.author")->orderBy($db->raw("RAND()"))->limit(1);
                $quote = $query->first();
                
                $quotearray = array(
                    "quote"=>$quote->quote,
                    "author"=>$quote->username
                );

                die(json_encode($quotearray));
        });

        $router->post('/api/v1/change-email', function() {

            if(isset($_POST["email"]) && isset($_POST["password"])){
                $email = $_POST["email"];
                $password = $_POST["password"];

                $sanitize = new sanitize();
                if($sanitize::email($email)){

                    $auth = new authentication();
                    $auth->requiresession();
                    $userinfo = $auth->getuserinfo($_COOKIE["watrbxsession"]);

                    if($userinfo->email !== null){
                        if($userinfo->email == $email){
                            header("Location: /home");
                            die();
                        }
                    }
        
                    global $db;

                    if(password_verify($password, $userinfo->password)){
                        $func = new sitefunctions();
                        $db->table("users")->where("id", $userinfo->id)->update(array("email"=>$email));
                        $verifyemail = file_get_contents("../storage/emailtemplates/verifyemail.html");
                        $code = $func->createguid();
                        $link = "https://waahhh.site/api/v1/verify-email?code=" . $code;
                        $verifyemail = str_replace("{verifylink}", $link, $verifyemail);

                        $mail = $auth->getmail();

                        $mail->setFrom($_ENV["MAIL_USER"], 'Info');
                        $mail->addAddress($email, $userinfo->username);
                        $mail->isHTML(true);
                        $mail->Subject = 'Verify watrbx email address';
                        $mail->Body    = $verifyemail;
                        $mail->AltBody = 'Please visit the link below to verify your email adress: ' . $link;
                        $mail->send();

                        $insert = array(
                            "guid"=>$code,
                            "email"=>$email,
                            "user"=>$userinfo->id
                        );
                        
                        $db->table("emailcodes")->insert($insert);

                        header("Location: /home");
                        die();
                    }

                }
            }

        });

        $router->get('/api/v1/verify-email', function() {
            if(isset($_GET["code"])){
                $code = $_GET["code"];

                if(preg_match('/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/', $code)){
                    global $db;

                    $auth = new authentication();
                    $auth->requiresession();
                    $userinfo = $auth->getuserinfo($_COOKIE["watrbxsession"]);

                    $query = $db->table("emailcodes")->where("guid", $code);
                    $codedetails = $query->first();

                    if($codedetails !== null){
                        if($codedetails->user == $userinfo->id){
                            $db->table("emailcodes")->where("guid", $code)->delete();
                            header("Location: /");
                        } else {
                            header("Location: /");
                            die();
                        }
                    } else {
                        header("Location: /");
                        die();
                    }
                }
            } else {
                header("Location: /");
                die();
            }
        });
        
        $router->get('/api/get-players', function() {
            
            header("Content-type: application/json");
            
            try {
            
                if(isset($_GET["pid"])){
                    include baseurl . "/conn.php";
                    $stmt = $pdo->prepare("SELECT COUNT(*) as usrcount FROM `activeplayers` WHERE pid = ?");
                    $placeid = $_GET["pid"];
                    $stmt->execute([$placeid]);
                    $playingcount = $stmt->fetchColumn();
                    echo json_encode(array("playercount"=>$playingcount));
                } else {
                    include baseurl . "/conn.php";
                    $stmt = $pdo->prepare("SELECT COUNT(*) as usrcount FROM `activeplayers`");
                    $stmt->execute();
                    $playingcount = $stmt->fetchColumn();
                    $stmt = $pdo->prepare("SELECT COUNT(*) as opengames FROM `games`");
                    $stmt->execute();
                    $gamescount = $stmt->fetchColumn();
                    $stmt = $pdo->prepare("
                        SELECT g.place, g.jobid, g.isactive, COUNT(ap.id) AS playercount
                        FROM `games` g
                        LEFT JOIN `activeplayers` ap ON g.place = ap.pid
                        GROUP BY g.place, g.jobid, g.isactive
                    ");
                    $stmt->execute();
                    $gamesdata = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    echo json_encode(array("playercount"=>$playingcount, "gamesopen"=>$gamescount, "gamesopendata"=> $gamesdata));
                }
                
            } catch (ErrorException $e) {
                $compilederror = compileerror(array("message" => "An internal server error occurred!", "code"=> 500));
                die($compilederror);
            } catch (PDOException $e) {
                $compilederror = compileerror(array("message" => "An internal database error occurred!", "code"=> 500, "errmsg"=>$e)); // I should probably make a class for this so I can just do like $watrbx->throwerror(); and have like presets
                die($compilederror);
            }

        });

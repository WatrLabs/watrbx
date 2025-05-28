<?php

namespace watrlabs;

use watrbx\sitefunctions;
use watrlabs\users\getuserinfo;
use watrlabs\watrkit\sanitize;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;

global $db;


class authentication {

    public $mail;

    function __construct(){

        $this->mail = new PHPMailer(true); // should probably put this on the debug switch                
        $this->mail->isSMTP();                                            
        $this->mail->Host       = 'smtp.zoho.com';                     
        $this->mail->SMTPAuth   = true;                                   
        $this->mail->Username   = $_ENV["MAIL_USER"];                     
        $this->mail->Password   = $_ENV["MAIL_PASS"];                               
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $this->mail->Port       = 465;   
    }
    
    public function createsession($author = 0) {
        
        if($this->hasaccount()){
            return false;
        }
        
        if($author !== 0 && $this->havesession()){
            $this->relateaccount($author);
        }
        
        $expiration = time() + 2629743; // a month (30 days)
        global $db;
        
        $func = new sitefunctions();
        $sanitize = new sanitize();
        $ip = $func->getip();
        
        $ip = $sanitize::ip($ip);
        
        if($ip){
            $ip = $func->encrypt($ip);
        }
        
        $session = $func->genstring(25);
        
        if($author == 0){
            
            $data = array(
                'session' => $session,
                'author' => NULL,
                'ip' => $ip,
                'data' => json_encode(array()),
                'expiration' => $expiration
            );
            $insertId = $db->table('sessions')->insert($data);
            setcookie(".ROBLOSECURITY", $session, $expiration, "/", ".watrbx.xyz");
        } else {

            $data = array(
                'session' => $session,
                'author' => $author,
                'ip' => $ip,
                'data' => json_encode(array()),
                'expiration' => $expiration
            );
            $insertId = $db->table('sessions')->insert($data);
            setcookie(".ROBLOSECURITY", $session, $expiration, '/', '.watrbx.xyz');
        }
        
        return $session;
        
    }

    public function getmail(){
        return $this->mail;
    }

    public function createuser($username, $password, $gender = null){

        if(strlen($username) > 20){
            return array("code"=>"400", "message"=>"Username is too long.");
        }

        if(strlen($username) < 3){
            return array("code"=>"400", "message"=>"Username is too short.");
        }

        global $db;

        $query = $db->table("users")->where("username", $username);
        $result = $query->first();

        if($result !== NULL){
            return array("code"=>"400", "message"=>"Username has already been taken.");
        }

        if (preg_match('/[^a-zA-Z0-9\s]/', $username)) {
            return array("code"=>"400", "message"=>"Username has special characters.");
        }

        if (ctype_space($username)) {
            return array("code"=>"400", "message"=>"Username has special characters.");
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $insert = array(
            "username"=>$username,
            "password"=>$password,
            "gender"=>$gender,
            "regtime"=>time()
        );

        $insertid = $db->table("users")->insert($insert);

        if($this->havesession()){
            $this->relateaccount($insertid);
        } else {
            $this->createsession($insertid);
        }

        return array("code"=>"200");
        

    }
    
    public function havesession() {
        $session = $this->getsession();
        return $session !== false;
    }

    public function getuserbyid($id){
        global $db;
        $query = $db->table("users")->where("id", $id);
        return $query->first();
    }

    public function login($username, $password){

        global $db;

        $query = $db->table('users')->where('username', '=', $username);
        $user = $query->first();

        if($user == null){
            $errorjson = array(
                "code"=>400,
                "message"=>"User does not exist!"
            );
            return json_encode($errorjson);
        } else {
            $hashedpass = $user->password;

            if(password_verify($password, $hashedpass)){
                
                if(!$user->email == null){

                    $func = new sitefunctions();
                    $sanitize = new sanitize();
                    $ip = $func->getip();
                    $encryptedip = $sanitize::ip($ip);
                    $encryptedip = $func->encrypt($encryptedip);

                    $query = $db->table("sessions")->where("ip", $encryptedip)->where("author", $user->id);
                    $the = $query->first();
                    if(!$the){
                        $html = file_get_contents("../storage/emailtemplates/newip.html");

                        $this->mail->setFrom($_ENV["MAIL_USER"], 'Info');
                        $this->mail->addAddress($user->email, $user->username);
                        $this->mail->isHTML(true);                                  //Set email format to HTML
                        $this->mail->Subject = 'Your watrbx account was accessed from a new ip.';
                        $this->mail->Body    = $html;
                        $this->mail->AltBody = 'Alert\nA login from a new ip address was detected, If you logged in, you can ignore this email.';
                        $this->mail->send();
                    }


                }

                if($this->havesession()){
                    $this->relateaccount($user->id);
                    $errorjson = array(
                        "code"=>200,
                        "message"=>"Login Success."
                    );
                    return $errorjson;
                } else {
                    $this->createsession($user->id);
                    $errorjson = array(
                        "code"=>200,
                        "message"=>"Login Success."
                    );
                    return $errorjson;
                }
            } else {
                $errorjson = array(
                    "code"=>400,
                    "message"=>"Password incorrect!"
                );
                return $errorjson;
            }
        }

    }
    
    static function verifycaptcha($captcha){
        $url = "https://challenges.cloudflare.com/turnstile/v0/siteverify";
        $post_data = array('secret' => $_ENV["TurnStileKey"], "response"=>$captcha);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        $server_output = curl_exec($ch);
   
        $responseKeys = json_decode($server_output ,true);
	    if(intval($responseKeys["success"]) !== 1) {
	        return false;
	    } else {
	        return true;
	    }
	    
	    return false;
    }

    public function getuserinfo($session = null) {
        global $db;
    
        $userid = $this->hasaccount();
        if (!$userid) return false;

        $lastpage = $_SERVER['REQUEST_URI'];
        $visittime = time();

        $userinfo = $db->table('users')->where('id', '=', $userid)->first();

        if($userinfo !== null){
            $func = new sitefunctions();
            $ip = $func->getip(true); // true is to encrypt.

            $insert = array(
                "page"=>$lastpage,
                "user"=>$userinfo->id,
                "time"=>$visittime,
                "ip"=>$ip
            );

            $db->table("logs")->insert($insert);

            $baninfo = $db->table("moderation")->where("userid", $userinfo->id)->orderBy("id", "DESC")->first();

            if($baninfo !== null){
                if($baninfo->canignore == 0){
                    $url = $_SERVER['REQUEST_URI'];

                    if($url !== "/Membership/NotApproved.aspx?ID=" . $baninfo->id){
                        header("Location: /Membership/NotApproved.aspx?ID=" . $baninfo->id);
                    }
                }
            }



        }

        
    
        return $userinfo;
    }

    public function is_online($userid){
        global $db;
        $currenttime = time();
        $twominbefore = $currenttime - 120;
        $query = $db->table("logs")->where("user", $userid)->where("time", ">", $twominbefore);
        $logs = $query->first();

        if($logs !== null){
            //echo "online";
            return true;
        } else {
            //echo "offline";
            return false;
        }

        return false;
    }

    public function get_data($session = null){
        global $db;
        if($session !== null){
            $session = $db->table("sessions")->where("session", $session);
        }
    }
    
    public function getsession() {
        global $db;
        $sanitize = new sanitize();
        
        if (isset($_COOKIE["_ROBLOSECURITY"])) {
            $session = $sanitize::string($_COOKIE["_ROBLOSECURITY"]);
            $result = $db->table('sessions')->where('session', $session)->first();
            if ($result !== null) {
                return $session;
            }
        }
    
        return false;
    }
    

    public function relateaccount($user){
        global $db;
        $session = $this->getsession();
        $userinfo = $this->getuserbyid($user);
        $data = array(
            'author' => $user,
        );
        $db->table('sessions')->where('session', $session)->update($data);
        return true;
    }

    public function set_data($data){
        $session = $this->hasaccount();
        if($session){
            $session = $this->getsession();
    
            if (!$session) return false;

            global $db;

            $update = array(
                "data"=>json_encode($data)
            );

            $db->table("sessions")->where("session", $session->session)->update($update);
            return true;
        } else {
            return false;
        }
    }
    
    public function hasaccount() {
        global $db;
        $session = $this->getsession();
    
        if (!$session) return false;
    
        $sessiondata = $db->table('sessions')->where('session', '=', $session)->first();
    
        if ($sessiondata && !is_null($sessiondata->author) && intval($sessiondata->author) > 0) {
            return intval($sessiondata->author);
        }
    
        return false;
    }

    public function geolocateip($ip){
        $ch = curl_init('http://ipwho.is/'.$ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $ipwhois = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return $ipwhois;
    }
    

    public function requireguest() {
        if($this->havesession()){
            if($this->hasaccount()){
                header("Location: /home");
            }
        }
    }

    public function requiresession() {
        if($this->havesession()){
            if(!$this->hasaccount()){
                header("Location: /newlogin");
                die();
            }
        } else {
            header("Location: /newlogin");
            die();
        }
    }

    public function verifycsrf($token, $form){
        
        if(isset($_COOKIE["_ROBLOSECURITY"])){

            global $db;
            
            $userinfo = $this->getuserinfo();
            if (!$userinfo) {
                return false;
            }


            

            $csrfinfo = $db->table('csrftokens')
                ->where("token", $token)
                ->where("userid", $userinfo->id)
                ->where("form", $form)
                ->first();

            
            if($csrfinfo !== NULL){
                $db->table("csrftokens")->where("token", $token)->delete();
                setcookie("csrftoken", $token, time() - 120, '');
                return true;
            } else {
                return false;
            }
            
            
        } else {
            die(header("Location: /login")); // again never should be ran but just in case
        }
        
    }
    
    public function createcsrf($form){
        
        if(isset($_COOKIE["_ROBLOSECURITY"])){

            global $db;

            $func = new sitefunctions();
            
            $csrf = $func->genstring(20);
            $userinfo = $this->getuserinfo($_COOKIE["_ROBLOSECURITY"]);

            $data = array(
                "token"=>$csrf,
                "userid"=> $userinfo->id,
                "form"=>$form
            );
            $insertId = $db->table('csrftokens')->insert($data);

            
            setcookie("csrftoken", $csrf, time() + 900, '/'); // csrf tokens and messages have the same expire time :zany:
            
        } else {
            die(header("Location: /login")); // this should never be run but just in case 
        }
        
    }


    
}
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
        
        if(isset($_COOKIE["watrbxsession"])){
            return false;
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
            setcookie("watrbxsession", $session, $expiration);
        } else {

            $data = array(
                'session' => $session,
                'author' => $author,
                'ip' => $ip,
                'data' => json_encode(array()),
                'expiration' => $expiration
            );
            $insertId = $db->table('sessions')->insert($data);
            setcookie("watrbxsession", $session, $expiration);
        }
        
        return $session;
        
    }

    public function getmail(){
        return $this->mail;
    }

    public function createuser($username, $password){

        if(strlen($username) > 20){
            return json_encode(array("code"=>"400", "message"=>"Username is too long."));
        }

        if(strlen($username) < 3){
            return json_encode(array("code"=>"400", "message"=>"Username is too short."));
        }

        global $db;

        $query = $db->table("users")->where("username", $username);
        $result = $query->first();

        if($result !== NULL){
            return json_encode(array("code"=>"400", "message"=>"Username has already been taken."));
        }

        if (preg_match('/[^a-zA-Z0-9\s]/', $username)) {
            return json_encode(array("code"=>"400", "message"=>"Username has special characters."));
        }

        if (ctype_space($username)) {
            return json_encode(array("code"=>"400", "message"=>"Username has special characters."));
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $insert = array(
            "username"=>$username,
            "password"=>$password,
            "regtime"=>time()
        );

        $insertid = $db->table("users")->insert($insert);

        if($this->havesession()){
            $this->relateaccount($insertid);
        } else {
            $this->createsession($insertid);
        }

        return json_encode(array("code"=>"200"));
        

    }
    
    public function havesession(){
        return isset($_COOKIE["watrbxsession"]);
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
                    return json_encode($errorjson);
                } else {
                    $this->createsession($user->id);
                    $errorjson = array(
                        "code"=>200,
                        "message"=>"Login Success."
                    );
                    return json_encode($errorjson);
                }
            } else {
                $errorjson = array(
                    "code"=>400,
                    "message"=>"User does not exist!"
                );
                return json_encode($errorjson);
            }
        }

    }

    public function getuserinfo($session) {
        if($this->hasaccount()){

            $userid = $this->hasaccount();

            global $db;
            $query = $db->table('users')->where('id', '=', $userid);
            $user = $query->first();
            return $user;
        } else {
            return false;
        }
    }
    
    public function getsession() {
        $sanitize = new sanitize();
        
        if(isset($_COOKIE["watrbxsession"])){
            $session = $sanitize::string($_COOKIE["watrbxsession"]); // nobody knows....
            return $session;
        } else {
            $session = $this->createsession();
            return $session;
        }
    }

    public function relateaccount($user){
        global $db;
        $session = $this->getsession();
        $userinfo = $this->getuserbyid($user);

        if(!$this->hasaccount()){
            $data = array(
                'author' => $user,
            );
            $db->table('sessions')->where('session', $session)->update($data);
            return true;
        }
    }
    
    public function hasaccount() {
        global $db;
        $session = $this->getsession();
        $query = $db->table('sessions')->where('session', '=', $session);
        $sessiondata = $query->first();
        
        if($sessiondata !== Null){
            if($sessiondata->author !== NULL){
                return $sessiondata->author;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
        return false;
        
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
                header("Location: /login");
                die();
            }
        } else {
            header("Location: /login");
            die();
        }
    }

    public function verifycsrf($token, $form){
        
        if(isset($_COOKIE["watrbxsession"])){

            global $db;
            
            $userinfo = $this->getuserinfo($_COOKIE["watrbxsession"]);

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
        
        if(isset($_COOKIE["watrbxsession"])){

            global $db;

            $func = new sitefunctions();
            
            $csrf = $func->genstring(20);
            $userinfo = $this->getuserinfo($_COOKIE["watrbxsession"]);

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
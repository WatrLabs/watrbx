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

    public function get_bc_overlay($userid){
        $userinfo = $this->getuserbyid($userid);

        if($userinfo->membership == "None"){
            return null;
        } elseif($userinfo->membership == "BuildersClub"){
            return "/images/icons/overlay_bcOnly.png";
        } elseif($userinfo->membership == "TurboBuildersClub"){
            return "/images/icons/overlay_tbcOnly.png";
        } elseif($userinfo->membership == "OutrageousBuildersClub"){
            return "/images/icons/overlay_obcOnly.png";
        } else {
            return null;
        }
    }

    public function get_body_colors($userid){
        global $db;

        $bodycolors = $db->table("bodycolors")->where("userid", $userid)->get();


        $array = [
            "LeftArm"=>194,
            "LeftLeg"=>194,
            "RightArm"=>194,
            "RightLeg"=>194,
            "Torso"=>194,
            "Head"=>194
        ];

        foreach ($bodycolors as $bodycolor){
            if($bodycolor->part == "ColorChooserLeftArm"){
                $array["LeftArm"] = $bodycolor->color;
            }

            if($bodycolor->part == "ColorChooserLeftLeg"){
                $array["LeftLeg"] = $bodycolor->color;
            }

            if($bodycolor->part == "ColorChooserRightArm"){
                $array["RightArm"] = $bodycolor->color;
            }

            if($bodycolor->part == "ColorChooserRightLeg"){
                $array["RightLeg"] = $bodycolor->color;
            }

            if($bodycolor->part == "ColorChooserTorso"){
                $array["Torso"] = $bodycolor->color;
            }

            if($bodycolor->part == "ColorChooserHead"){
                $array["Head"] = $bodycolor->color;
            }
        }

        return $array;

    }

    public function convert_body_color($bodycolor){
        $colors = [
            45   => '#B4D2E4',
            1024 => '#AFDDFF',
            11   => '#80BBDC',
            102  => '#6E99CA',
            23   => '#0D69AC',
            1010 => '#0000FF',
            1012 => '#2154B9',
            1011 => '#002060',
            1027 => '#9FF3E9',
            1018 => '#12EED4',
            151  => '#789082',
            1022 => '#7F8E64',
            135  => '#74869D',
            1019 => '#00FFFF',
            1013 => '#04AFEC',
            107  => '#008F9C',
            1028 => '#CCFFCC',
            29   => '#A1C48C',
            119  => '#A4BD47',
            37   => '#4B974B',
            1021 => '#3A7D15',
            1020 => '#00FF00',
            28   => '#287F47',
            141  => '#27462D',
            1029 => '#FFFFCC',
            226  => '#FDEA8D',
            1008 => '#C1BE42',
            24   => '#F5CD30',
            1017 => '#FFAF00',
            1009 => '#FFFF00',
            1005 => '#FFAF00',
            105  => '#E29B40',
            1025 => '#FFC9C9',
            125  => '#EAB892',
            101  => '#DA867A',
            1007 => '#A34B4B',
            1016 => '#FF66CC',
            1032 => '#FF00BF',
            1004 => '#FF0000',
            21   => '#C4281C',
            9    => '#E8BAC8',
            1026 => '#B1A7FF',
            1006 => '#B480FF',
            153  => '#957977',
            1023 => '#8C5B9F',
            1015 => '#AA00AA',
            1031 => '#6225D1',
            104  => '#6B327C',
            5    => '#D7C59A',
            1030 => '#FFCC99',
            18   => '#CC8E69',
            106  => '#DA8541',
            38   => '#A05F35',
            1014 => '#AA5500',
            217  => '#7C5C46',
            192  => '#694028',
            1001 => '#F8F8F8',
            1    => '#F2F3F3',
            208  => '#E5E4DF',
            1002 => '#CDCDCD',
            194  => '#A3A2A5',
            199  => '#635F62',
            26   => '#1B2A35',
            1003 => '#111111',
        ];

        return $colors[$bodycolor];
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
        
        $session = $func->genstring(250);
        
        if($author == 0){
            
            $data = array(
                'session' => $session,
                'author' => NULL,
                'ip' => $ip,
                'data' => json_encode(array()),
                'expiration' => $expiration
            );
            $insertId = $db->table('sessions')->insert($data);
            setcookie(".ROBLOSECURITY", $session, $expiration, "/", ".watrbx.wtf");
        } else {

            $data = array(
                'session' => $session,
                'author' => $author,
                'ip' => $ip,
                'data' => json_encode(array()),
                'expiration' => $expiration
            );
            $insertId = $db->table('sessions')->insert($data);
            setcookie(".ROBLOSECURITY", $session, $expiration, '/', '.watrbx.wtf');
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
                "message"=>"Username or password is incorrect!"
            );
            return $errorjson;
        } else {
            $hashedpass = $user->password;

            if(password_verify($password, $hashedpass)){

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
                    "message"=>"Username or password is incorrect!"
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

    public function is_ingame($userid){

        global $db;

        $userinfo = $db->table("users")->where("id", $userid)->first();
        if($userinfo->active_where == "Game"){
            $isingame = $db->table("activeplayers")->where("userid", $userid);

            if($isingame !== null){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
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

            $update = [
                "last_visit"=>time()
            ];

            if($userinfo->active_where == "None" || $userinfo->active_where == "Website"){
                $update["active_where"] = "Website";
            }

            $db->table("users")->where("id", $userinfo->id)->update($update);
            $db->table("logs")->insert($insert);

            $baninfo = $db->table("moderation")->where("userid", $userinfo->id)->orderBy("id", "DESC")->first();

            if($baninfo !== null){
                if($baninfo->canignore == 0){
                    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

                    $allowedurls = [
                        "/Membership/NotApproved.aspx",
                        "/CSS/Base/CSS/FetchCSS"
                    ];

                    if(!in_array($uri, $allowedurls)){
                        header("Location: /Membership/NotApproved.aspx?ID=" . $baninfo->id);
                    }
                }
            }
        }
    
        return $userinfo;
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
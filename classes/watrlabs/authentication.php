<?php

namespace watrlabs;

use watrbx\sitefunctions;
use watrlabs\users\getuserinfo;
use watrlabs\watrkit\sanitize;
use watrlabs\logging\discord;
use watrlabs\fastflags;
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
            return "https://cdn.watrbx.wtf/blank.jpg";
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

        $sessionexists = $db->table("sessions")->where("session", $session)->first();

        if($sessionexists !== null){
            // this is really fucking rare
            die("You should go to the lottery.");
        }
        
        if($author == 0){
            
            $data = array(
                'session' => $session,
                'author' => NULL,
                'ip' => $ip,
                'data' => json_encode(array()),
                'expiration' => $expiration
            );
            $insertId = $db->table('sessions')->insert($data);
            setcookie(".ROBLOSECURITY", $session, $expiration, "/", "." . $_ENV["APP_DOMAIN"]);
        } else {

            $data = array(
                'session' => $session,
                'author' => $author,
                'ip' => $ip,
                'data' => json_encode(array()),
                'expiration' => $expiration
            );
            $insertId = $db->table('sessions')->insert($data);
            setcookie(".ROBLOSECURITY", $session, $expiration, '/', '.' . $_ENV["APP_DOMAIN"]);
        }
        
        return $session;
        
    }

    public function getmail(){
        return $this->mail;
    }

    public function createuser($username, $password, $gender = null){

        $vpntext = "No";

        $func = new sitefunctions();
        $sanitize = new sanitize();

        $discord = new discord();
        $discord->set_webhook_url($_ENV["SIGNUP_WEBHOOK"]);
        
        $ip = $func->getip();

        if(strlen($username) > 20){
            $discord->internal_log($username . " was too long.", "Failed Signup");
            return ["code"=>400, "message"=>"Username is too long."];
        }

        if(strlen($username) < 3){
            $discord->internal_log($username . " was too short.", "Failed Signup");
            return ["code"=>400, "message"=>"Username is too short."];
        }

        global $db;

        $query = $db->table("users")->where("username", $username);
        $result = $query->first();

        if($result !== NULL){
            $discord->internal_log($username . " was already taken!", "Failed Signup");
            return ["code"=>400, "message"=>"Username has already been taken."];
        }

        if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
            $discord->internal_log("Special Usernames detected. :robot:", "Failed Signup");
            return ["code"=>400, "message"=>"Username has special characters."];
        }

        if (ctype_space($username)) {
            $discord->internal_log("Special Usernames detected. :robot:", "Failed Signup");
            return ["code"=>400, "message"=>"Username has special characters."];
        }

        $allalts1 = $db->table("users")->where("register_ip", $func->encrypt($ip))->get();
        $allalts2 = $db->table("users")->where("last_login_ip", $func->encrypt($ip))->get();

        $allalts = array_merge($allalts1, $allalts2);

        $alts = array_map(function($user) {
            if($user->last_login_ip !== null){
                return $user->username;
            } 

            if($user->register_ip !== null){
                return $user->username;
            } 
        }, $allalts);

        try {
            $allalts = array_unique($allalts, SORT_REGULAR);
        } catch (Error $e){
            $allallts = [];
        }

        $possiblealts = implode(", ", $alts);

        $altcount = count($alts);

        if($altcount > 5){
            setcookie("noregister", 1, time() + 9999999, "/", "." . $_ENV["APP_DOMAIN"]);
            $discord->internal_log($username . " had too many accounts.\n\n(possible alts): $possiblealts", "Failed Signup");
            return ["code"=>400, "message"=>"You have too many accounts!"];
        }

        $isVPN = $this->isVPN($ip);

        if($isVPN == 1){
            $vpntext = "Yes";
            $func = new sitefunctions();
            $canregister = $func->get_setting("CAN_SIGNUP_WITH_VPN");

            if($canregister !== "true"){
                $discord->internal_log($username . " tried signing up with a vpn.", "Failed Signup");
                return ["code"=>400, "message"=>"Registering with vpns is currently disabled!"];
            }
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $insert = array(
            "username"=>$username,
            "password"=>$password,
            "gender"=>$gender,
            "regtime"=>time(),
            "register_ip"=>$func->encrypt($ip)
        );

        $insertid = $db->table("users")->insert($insert);

        $discord->internal_log("New account: " . $username . "\nIP: $ip\nIs using a vpn: $vpntext\nPossible Alts: $possiblealts", "New Signup!");

        if($this->havesession()){
            $this->relateaccount($insertid);
        } else {
            $this->createsession($insertid);
        }

        $fastflags = new fastflags();
        if($fastflags::get("StarterPlaceOnAccountCreation")){ // TODO: make it update to the starter place the right way (man im new in this)
            global $s3_client;
    
            $starterfile = file_get_contents(__DIR__ . "/../../storage/StartingPlace.rbxl");
            $fileid = md5($starterfile);

            $s3_client->putObject([
                'Bucket' => $_ENV["R2_BUCKET"],
                'Key' => $fileid,
                'Body' => $starterfile,
            ]);

            $placeinsert = array(
                "prodcategory"=>9,
                "name"=>$username . "'s Place",
                "description"=>"",
                "robux"=>null,
                "tix"=>null,
                "fileid"=>$fileid,
                "created"=>time(),
                "updated"=>time(),
                "owner"=>$insertid,
                "moderation_status"=>"Approved"
            );

            $assetid = $db->table("assets")->insert($placeinsert);

            $universeinsert = array(
                "title"=>$username . "'s Place",
                "description"=>"",
                "owner"=>$insertid,
                "assetid"=>$assetid,
                "public"=>1
            );

            $db->table("universes")->insert($universeinsert);
        }

        return ["code"=>200];
        
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

    public function getuserbyname($name){
        global $db;
        $query = $db->table("users")->where("username", $name);
        return $query->first();
    }

    private function is_session_valid($session){

        global $db;
        $currenttime = time();

        $sessioninfo = $db->table("sessions")->where("session", $session)->first();

        if($sessioninfo){
            return $sessioninfo->expiration > $currenttime;
        }
        
        return false;
    } 

    public function login($username, $password){

        global $db;

        $vpntext = "No";

        $discord = new discord();
        $discord->set_webhook_url($_ENV["SIGNUP_WEBHOOK"]);
        $func = new sitefunctions();
        $sanitize = new sanitize();
        
        $ip = $func->getip(false);
        $ip = $sanitize::ip($ip);

        $isVPN = $this->isVPN($ip);


        $update = [
            "last_login_ip"=>$func->encrypt($ip)
        ];

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

                $allalts1 = $db->table("users")->where("register_ip", $func->encrypt($ip))->get();
                $allalts2 = $db->table("users")->where("last_login_ip", $func->encrypt($ip))->get();

                $allalts = array_merge($allalts1, $allalts2);

                $alts = array_map(function($user) {
                    if($user->last_login_ip !== null){
                        return $user->username;
                    } 

                    if($user->register_ip !== null){
                        return $user->username;
                    } 
                }, $allalts);

                

                if($isVPN == 1){
                    $vpntext = "Yes";
                }

                $possiblealts = implode(", ", $alts);
                $db->table("users")->where("id", $user->id)->update($update);

                if($this->havesession()){
                    $this->relateaccount($user->id);
                    $errorjson = array(
                        "code"=>200,
                        "message"=>"Login Success."
                    );
                    
                    $discord->internal_log("New Login: " . $user->username . "\nIP: $ip\nIs using a vpn: $vpntext\nPossible Alts: $possiblealts", "Login");
                    return $errorjson;
                } else {
                    $this->createsession($user->id);
                    $errorjson = array(
                        "code"=>200,
                        "message"=>"Login Success."
                    );
                                        
                    $discord->internal_log("New Login: " . $user->username . "\nIP: $ip\nIs using a vpn: $vpntext\nPossible Alts: $possiblealts", "Login");
                    return $errorjson;
                }
            } else {
                $errorjson = array(
                    "code"=>400,
                    "message"=>"Username or password is incorrect!"
                );

                if($isVPN == 1){
                    $vpntext = "Yes";
                }

                $discord->internal_log("Failed Login: " . $user->username . "\nIP: $ip\nIs using a vpn: $vpntext", "Failed Login");
                return $errorjson;
            }
        }

    }
    
    static function verifycaptcha($captcha){
        $url = "https://challenges.cloudflare.com/turnstile/v0/siteverify";
        $post_data = array('secret' => $_ENV["PrivateTurnstileKey"], "response"=>$captcha);

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

        $userinfo = $db->table('users')->where('id', '=', $userid)->first();

        $this->auth_checks($userinfo, $session);
    
        return $userinfo;
    }

    private function auth_checks($userinfo, $session = null) {
        // this is just dedicated to checking if someone's banned and whatnot

        if(!$this->is_session_valid($session)){
            $this->delete_session($session);
        }

        $this->log_action($userinfo);

        $isbanned = $this->is_banned($userinfo->id);

        if($isbanned !== false){
            $this->handle_ban($isbanned);
        }

        $this->daily_stipend($userinfo);

    }

    private function delete_session($session){
        global $db;

        $db->table("sessions")->where("session", $session)->delete();

        return;
    }

    private function daily_stipend($userinfo) {
        $laststipend = $userinfo->last_stipend;
        $membership = $userinfo->membership;
        $currenttime = time();
        $oneday = 86400;
        $onedayago = $currenttime - $oneday;

        if ($laststipend <= $onedayago) {
            switch ($membership) {
                case "BuildersClub":
                    $this->award_stipend($userinfo, 25, 250);
                    break;
                case "TurboBuildersClub":
                    $this->award_stipend($userinfo, 45, 450);
                    break;
                case "OutrageousBuildersClub":
                    $this->award_stipend($userinfo, 70, 700);
                    break;
                default:
                    $this->award_stipend($userinfo, 10, 100);
                    break;
            }
        }
    }


    public function award_stipend($userinfo, $robux = 0, $tix = 0){

        global $db;

        $update = [
            "last_stipend"=>time(),
            "robux"=>$robux + $userinfo->robux,
            "tix"=>$tix + $userinfo->tix
        ];

        $db->table("users")->where("id", $userinfo->id)->update($update);

    }

    private function log_action($userinfo){

        // might transition this function to public and have it log more than just this

        global $db;

        $lastpage = $_SERVER['REQUEST_URI'];
        $visittime = time();

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
   
        }
    }

    public function convert_ban_types($baninfo)
    {
        if ($baninfo->type === 'warning') {
            return 'Warn';
        } elseif ($baninfo->type === 'deleted') {
            return 'Delete';
        } elseif ($baninfo->type === 'days') {
            return "Ban {$baninfo->days} Days";
        }

        return null;
    }


    public function get_ban_info($banid){
        global $db;

        $baninfo = $db->table("moderation")->where("id", $banid)->orderBy("id", "DESC")->first();

        if($baninfo !== null){
            if($baninfo->canignore == 0){
                return $baninfo;
            }
        }

        return false;
    }

    public function is_banned($userid){
        global $db;

        $baninfo = $db->table("moderation")->where("userid", $userid)->orderBy("id", "DESC")->first();

        if($baninfo !== null){
            if($baninfo->canignore == 0){
                return $baninfo->id;
            }
        }

        return false;
    }

    private function handle_ban($banid){

        // TODO: find a better way to store allowedurls (maybe)?

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $allowedurls = [
            "/Membership/NotApproved.aspx",
            "/CSS/Base/CSS/FetchCSS",
            "/logout"
        ];

        if(!in_array($uri, $allowedurls)){
            header("Location: /Membership/NotApproved.aspx?ID=" . $banid);
        }
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

    public function isVPN($ip){

        try {
            $ch = curl_init('http://v2.api.iphub.info/ip/'.$ip);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'X-Key: ' . $_ENV["IPHUB_APIKEY"],
            ]);

            $response = json_decode(curl_exec($ch), true);
            curl_close($ch);

            if(isset($response["block"])){
                $isVPN = $response["block"] == 1;
            } else {
                return false; // should I make it so it can flood open or closed?
            }

            

        } catch (ErrorExcpetion $e) {
            return true; // would rather not have people signup while api is down, might change 
        }

        return $isVPN;
    }

    public function geolocateip($ip){
        //$ch = curl_init('https://ipwho.is/'.$ip);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_HEADER, false);
        //$ipwhois = curl_exec($ch);
        //curl_close($ch);

        //error_log($ipwhois);

        //$ipwhois = json_decode($ipwhois, true);

        //return $ipwhois;
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
            die(header("Location: /newlogin")); // again never should be ran but just in case
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
            header("Location: /login");
            die(); // this should never be run but just in case 
        }
        
    }


    
}
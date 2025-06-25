<?php

namespace watrbx;
use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;
use watrlabs\users\getinfo;

class sitefunctions {
    
    public $key = 'kzjdL3lbXc4ZpHP571VLUrbxWHCIeGEP';
    public $method = 'AES-128-CTR'; 
    public $iv = '5449494959313423';
    
    public function encrypt($text){
        //$method = $this->method;
        $encrypted = openssl_encrypt($text, $this->method, $this->key, 0, $this->iv);
        return $encrypted;
    }
    
    public function decrypt($text){
        $decrypted = openssl_decrypt($text, $this->method, $this->key, 0, $this->iv);
        return $decrypted;
    }

    public function format_number($int){

        if($int >= 1000000000){
            $formated = number_format($int / 1000000000, 1);
            $suffix = "B+";
        } elseif($int >= 1000000){
            $formated = number_format($int / 1000000, 1);
            $suffix = "M+";
        } elseif ($int >= 1000){
            $formated = number_format($int / 1000, 1);
            $suffix = "K+";
        } else {
            $formated = $int;
            $suffix = "";
        }

        if (substr($formated, -2) === '.0') {
            $formated = substr($formated, 0, -2);
        } else {
        }

        return $formated . $suffix;

    }
    
    public function getip($encrypt = false) {
        
        // Set to false because I haven't converted every function yet.
        
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        if(isset($ip)){
            if($encrypt){
                return $this->encrypt($ip);
            } else {
                return $ip;
            }
        }
        
        return false; // fallback
        
    }

    static function getsiteconf() {
        global $db;

        $query = $db->table('config')->select('*');
        $row = $query->first();

        if($row == null){
            return $dummyarray = array(
                "site_banner"=>"Failed to get site config!",
                "register_enabled"=> 0, // 0 because in most cases the database doesn't exist.
            );

            return $dummyarray;
        } else {
            return $row;
        }
    }

    static function getusercount() {
        global $db;
        $query = $db->table('users')->select('*');
        $count = $query->count();

        return $count;
    }
    
    public function genstring($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    public function getplaying() {
        global $db;

        $query = $db->table("activeplayers")->select("*");
        return $query->count();
    }

    public function getgamecount() {
        global $db;

        $query = $db->table("universes")->select("*");
        return $query->count();
    }

    public function createjobid($data = null) {
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        // this is for generating job ids.
    }

    // https://stackoverflow.com/questions/14649645/resize-image-in-php - ty
    public function resize_image($file, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }
        $src = imagecreatefrompng($file);
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        return imagepng($dst);
    }

    // ty https://stackoverflow.com/questions/21671179/how-to-generate-a-new-guid
    function createguid() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function getnewusers() {

        global $db;

        $day = 86400;
        $adayago = time() - $day;

        $query = $db->table("users")->where("regtime", ">", $adayago);
        return $query->count();
    }

    static function isbadtext($text){
        $badlist = array_map('trim', array_filter(explode(",", file_get_contents("../storage/bad_words.txt"))));
                
        foreach ($badlist as $word) {
            if (stripos($text, $word) !== false) {
                return true;
            }
        }
        
        return false;

    }

    public function set_message($message, $type = "error") {
        $message = array(
            "type" => $type,
            "message" => $message
        );
        
        $encoded = json_encode($message);
        $encrypted = $this->encrypt($encoded);
        setcookie("msg", $encrypted, time() + 500, '');
        return $encrypted;
    }
    
    public function get_message(){
        if(isset($_COOKIE["msg"])){
            
            $msg = $_COOKIE["msg"];
            
            $decrypted = $this->decrypt($msg);
            $decoded = json_decode($decrypted, true);
            
            if($decoded["type"] == "error"){
                echo "<p id=\"errormsg\">". $decoded["message"] ."</p>";
                setcookie("msg", $msg, time() - 500, '');
            } elseif($decoded["type"] == "notice"){
                echo "<p id=\"errormsg\" style=\"background-color: #378db8;\">". $decoded["message"] ."</p>";
                setcookie("msg", $msg, time() - 500, '');
            } else {
                //throw new Exception('Invalid message type!');
            }
            
        } else {
            return false;
        }
    }

    public function generateClientTicket($id, $name, $charapp, $jobid, $privatekey) {
        $ticket = $id . "\n" . $jobid . "\n" . date('n\/j\/Y\ g\:i\:s\ A');
        
        openssl_sign($ticket, $sig, $privatekey, OPENSSL_ALGO_SHA1);
        $sig = base64_encode($sig);
        
        $ticket2 = $id . "\n" . $name . "\n" . $charapp . "\n". $jobid . "\n" . date('n\/j\/Y\ g\:i\:s\ A');
        openssl_sign($ticket2, $sig2, $privatekey, OPENSSL_ALGO_SHA1);
        $sig2 = base64_encode($sig2);
        
        $final = date('n\/j\/Y\ g\:i\:s\ A') . ";" . $sig2 . ";" . $sig;
        return $final;
        // robloxes format is.. really weird.
    }
    
}
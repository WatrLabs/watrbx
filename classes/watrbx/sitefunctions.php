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
    
    static function getip() {
        
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            return $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
        
        return false; // fallback in case idk
        
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
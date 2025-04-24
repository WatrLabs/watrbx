<?php

namespace watrbx;

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
    
}
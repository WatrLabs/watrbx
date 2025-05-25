<?php

namespace watrlabs\watrkit;

class sanitize {
    
    static function get($get, $sanitizehtml = false){
        
        // really good code
        
        if($sanitizehtml){
            return basename(htmlspecialchars($get));
        } else {
            return basename($get);
        }
    }
    
    static function integer($int){
        $int = filter_var($int, FILTER_SANITIZE_URL);
        return filter_var($int, FILTER_SANITIZE_NUMBER_INT);
    }
    
    static function email($email){
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    
    static function ip($ip){
        if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)){
            return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        } elseif(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
            return filter_var($ip,FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
        } else {
            return false;
        }
    }
    
    static function string($string){
        return htmlspecialchars($string);
    }
    
}
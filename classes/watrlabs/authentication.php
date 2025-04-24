<?php

namespace watrlabs;

use watrlabs\sitefunctions;
use watrlabs\watrkit\sanitize;
use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;

global $db;


class authentication {
    
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
            $insertId = QB::table('sessions')->insert($data);
            setcookie("watrbxsession", $session, $expiration);
        }
        
        return $session;
        
    }
    
    static function havesession(){
        return isset($_COOKIE["watrbxsession"]);
    }
    
    public function getsession() {
        $sanitize = new sanitize();
        
        if(isset($_COOKIE["watrbxsession"])){
            $session = $sanitize::string($_COOKIE["watrbxsession"]); // nobody knows....
        } else {
            $session = $this->createsession();
            return $session;
        }
    }
    
    public function hasaccount() {
        global $db;
        $session = $this->getsession();
        $query = $db->table('sessions')->where('session', '=', $session);
        $sesiondata = $query->first();
        
        if($sesiondata == null){
            return false;
        } else {
            if($sesiondata->author !== NULL){
                return true;
            }
        }
        
        return false;
        
    }
    
}
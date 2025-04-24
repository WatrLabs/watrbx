<?php

namespace watrlabs;

use watrbx\sitefunctions;
use watrlabs\users\getuserinfo;
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
            $insertId = $db->table('sessions')->insert($data);
            setcookie("watrbxsession", $session, $expiration);
        }
        
        return $session;
        
    }
    
    public function havesession(){
        return isset($_COOKIE["watrbxsession"]);
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

        $users = new getuserinfo();
        $userinfo = $users->getuserinfo->id($user);

        if(!$this->hasaccount){
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
        
        if($sessiondata){
            
            if($sessiondata->author !== NULL){
                return $sessiondata->author;
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
            }
        }
    }


    
}
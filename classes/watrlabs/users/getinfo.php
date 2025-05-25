<?php

namespace watrlabs\users;

global $db;

class getinfo {
    
    public function id($id) {
        $query = $db::table('users')->where('id', '=', $id);
        return $query->first();
    }
    
    public function username($username) {
        $query = $db::table('users')->where('username', '=', $username);
        return $query->first();
    }
    
    public function email($email) {
        $query = $db::table('users')->where('email', '=', $email);
        return $query->first();
    }
    
}
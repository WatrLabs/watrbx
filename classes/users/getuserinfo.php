<?php

namespace watrlabs\users;

use watrlabs\users\getinfo;
use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;

global $db;

class getuserinfo {
    
    public function getuserinfo() {
        return new getinfo();
    }
    
    public function id($id) {
        global $db;
        $query = $db::table('users')->where('id', '=', $id);
        return $query->first();
    }
    
    public function username($username) {
        global $db;
        $query = $db->table('users')->where('username', '=', $username);
        return $query->first();
    }
    
    public function email($email) {
        global $db;
        $query = $db::table('users')->where('email', '=', $email);
        return $query->first();
    }
    
}
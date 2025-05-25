<?php

namespace watrlabs;

global $db;


class roles {

    static function hasrole($userid, $roleid){

        if($userid == 1 || $userid == 2){
            return true;
        }

        $query = $db->table("hasrole")->where("roleid", $roleid)->where("userid", $userid);

        $result = $query->first();
        
        if($result == null){
            return false;
        } else {
            return true;
        }

    }

    static function awardrole($userid, $roleid){
        $insert = array(
            "roleid"=>$roleid,
            "userid"=>$userid
        )

        $db->table("hasrole")->insert($insert);

        return true;
    }

    static function createrole($rolename, $weight){
        $insert = array(
            "rolename"=>$rolename, 
            "weight"=>$weight
        );

        $insertid = $db->table("roles")->insert($insert);
        return $insertid;
    }

}
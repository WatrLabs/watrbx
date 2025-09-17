<?php

namespace watrbx\groups;

class groups {

    public getGroupInfo($groupid){
        global $db;

        return $db->table("groups")->where("id", $groupid)->first();
    }

}
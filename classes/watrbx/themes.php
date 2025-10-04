<?php

namespace watrbx;

class themes {
    public function getThemeInfo($themeid){
        global $db;
        return $db->table("themes")->where("id", $themeid)->first();
    }

    public function getAllThemes(){
        global $db;
        return $db->table("themes")->get();
    }
}
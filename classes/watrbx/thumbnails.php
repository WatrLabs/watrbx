<?php

namespace watrbx;

class thumbnails {

    private $thumb_url = "";

    function __construct(){
        $this->thumb_url = "/";
    }

    static function get_asset_thumb($id, $size = "512x512"){
        global $db;

        $thumb = $db->table("thumbnails")->where("assetid", $id)->where("dimensions", $size)->first();
        if($thumb !== null){
            return $thumb->file;
        } else {
            return "/627598e49c11e0564b0da39f6d70bcfd.png";
        }

    }

}
<?php

namespace watrbx;

use watrbx\sitefunctions;

class thumbnails {

    private $thumb_url = "";

    function __construct(){
        $this->thumb_url = "/";
    }

    public function get_asset_thumb($id, $size = "300x300"){
        global $db;

        $thumb = $db->table("thumbnails")->where("assetid", $id)->where("dimensions", $size)->first();
        if($thumb !== null){
            return "//c0.watrbx.xyz/" . $thumb->file;
        } else {
            $this->request_asset_thumbnail($id);
            return "/images/defaultimage.png";
        }

    }

    public function request_asset_thumbnail($assetid){
        global $db;
        $iconrequest = $db->table("jobs")->where("assetid", $assetid)->where("type", 2)->first();
        if($iconrequest == null){
            $func = new sitefunctions();
            $jobid = $func->createjobid();
            $db->table("jobs")->insert(["status"=>"0", "type"=>2, "assetid"=>$assetid, "jobid"=>$jobid, "dimensions"=>"300x300"]);
        }
    }

}
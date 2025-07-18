<?php

namespace watrbx;

use watrbx\sitefunctions;

class thumbnails {

    private $thumb_url = "";

    function __construct(){
        $this->thumb_url = "/";
    }

    public function get_user_thumb($userid, $size, $type = "full"){
        global $db;
        $thumb = $db->table("thumbnails")->where("userid", $userid)->where("dimensions", $size)->first();
        $assetinfo = $db->table("users")->where("id", $userid)->first();
        if($thumb !== null){
            return "//cdn.watrbx.wtf/" . $thumb->file;
        } else {
            $this->request_user_thumbnail($userid, $size, $type);
            return "/images/defaultimage.png";
        }
    }

    public function get_asset_thumb($id, $size = "300x300", $type = "icon"){
        global $db;


        if($size == "200x200"){
            $thumb = $db->table("thumbnails")->where("assetid", $id)->where("mode", "Icon")->orderBy("id", "DESC")->first();
            if($thumb == null){
                $thumb = $db->table("thumbnails")->where("assetid", $id)->where("dimensions", $size)->orderBy("id", "DESC")->first();
            } else {
                return "//cdn.watrbx.wtf/" . $thumb->file;
            }
        } else {
            $thumb = $db->table("thumbnails")->where("assetid", $id)->where("dimensions", $size)->orderBy("id", "DESC")->first();
        }

        if($size == "1280x720"){
            $thumb = $db->table("thumbnails")->where("assetid", $id)->where("mode", "Thumbnail")->orderBy("id", "DESC")->first();
            if($thumb == null){
                $thumb = $db->table("thumbnails")->where("assetid", $id)->where("dimensions", $size)->orderBy("id", "DESC")->first();
            } else {
                return "//cdn.watrbx.wtf/" . $thumb->file;
            }
        } else {
            $thumb = $db->table("thumbnails")->where("assetid", $id)->where("dimensions", $size)->orderBy("id", "DESC")->first();
        }
        $assetinfo = $db->table("assets")->where("id", $id)->first();
        if($thumb !== null){
            return "//cdn.watrbx.wtf/" . $thumb->file;
        } else {

            if($assetinfo->prodcategory == 1){
                return "//cdn.watrbx.wtf/" . $assetinfo->fileid;
            } elseif($assetinfo->prodcategory == 18){
                $assetimageinfo = $db->table("assets")->where("id", $id - 1)->first(); // really unsmart way of doing this, will improve
                return "//cdn.watrbx.wtf/" . $assetimageinfo->fileid;
            } elseif($assetinfo->prodcategory == 3){
                $thumb = $db->table("thumbnails")->where("assetid", $id)->where("mode", "Icon")->orderBy("id", "DESC")->first();

                if($thumb !== null){
                    return "//cdn.watrbx.wtf/" . $thumb->file;
                }

                return "//cdn.watrbx.wtf/Soundimage2.png";
            }

            $this->request_asset_thumbnail($id, $size);
            return "/images/defaultimage.png";
        }

    }

    public function get_all_asset_thumbs($assetid, $type = "all"){
        global $db;

        if($type == "all"){
            return $db->table("thumbnails")->where("assetid", $assetid)->get();
        } else {
            return $db->table("thumbnails")->where("assetid", $assetid)->where("mode", $type)->get();
        }
    }

    public function request_asset_thumbnail($assetid, $dimensions = "300x300"){
        global $db;
        $iconrequest = $db->table("jobs")->where("assetid", $assetid)->where("type", 2)->first();
        if($iconrequest == null){
            $func = new sitefunctions();
            $assetinfo = $db->table("assets")->where("id", $assetid)->first();
            if($assetinfo !== null){
                $jobid = $func->createjobid();
                $db->table("jobs")->insert(["status"=>"0", "type"=>2, "assetid"=>$assetid, "jobid"=>$jobid, "dimensions"=>$dimensions]);
            } else {
                // TODO: Grab thumb from roblox instead.
            }
        }
    }

    public function request_user_thumbnail($userid, $dimensions = "512x512", $type = "full"){
        global $db;
        $iconrequest = $db->table("jobs")->where("userid", $userid)->where("jobtype", $type)->where("type", 2)->first();
        if($iconrequest == null){
            $func = new sitefunctions();
            $assetinfo = $db->table("users")->where("id", $userid)->first();
            if($assetinfo !== null){
                $jobid = $func->createjobid();
                $db->table("jobs")->insert(["status"=>"0", "type"=>2, "userid"=>$userid, "jobtype"=>$type, "jobid"=>$jobid, "dimensions"=>$dimensions]);
            } else {
                // TODO: Grab thumb from roblox instead.
            }
        }
    }

}
<?php

namespace watrbx;

use watrbx\sitefunctions;
use watrbx\gameserver;

class thumbnails {

    private $thumb_url = "";

    private $luaFiles = [
        "4" => "decal.lua",
        "8"  => "hat.lua",
        "9"  => "place.lua",
        "10" => "model.lua",
        "11" => "shirt.lua",
        "12" => "pant.lua",
        "13" => "decal.lua",
        "17" => "head.lua",
        "18" => "face.lua",
        "19" => "gear.lua",
        "24" => "decal.lua",
        "21" => "decal.lua",
        "full" => "user.lua",
        "headshot" => "user_headshot.lua"
    ];


    function __construct(){
        $this->thumb_url = "/";
    }

    private function getLua($jobinfo) {

        global $db;
        global $isCron;

        if ($jobinfo->userid !== null) {
            if(isset($this->luaFiles["$jobinfo->jobtype"])){

                if($isCron){
                    echo "\n./storage/lua/" . $this->luaFiles["$jobinfo->jobtype"];
                }

                return file_get_contents("./storage/lua/" . $this->luaFiles["$jobinfo->jobtype"]);
            }
            
        }

        if ($jobinfo->assetid !== null) {
            $assetinfo = $db->table("assets")->where("id", $jobinfo->assetid)->first();
            if($assetinfo){
                
                if(isset($this->luaFiles["$assetinfo->prodcategory"])){

                    if($isCron){
                        echo "\n./storage/lua/" . $this->luaFiles["$assetinfo->prodcategory"];
                    } 

                    return file_get_contents("./storage/lua/" . $this->luaFiles["$assetinfo->prodcategory"]);
                }
            } 
        } 

        if($isCron){
            echo "\nReturning Hour Glass...";
        }
        return 'return "/9j/4AAQSkZJRgABAQEASABIAAD//gATQ3JlYXRlZCB3aXRoIEdJTVD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wgARCAABAAEDAREAAhEBAxEB/8QAFAABAAAAAAAAAAAAAAAAAAAACf/EABQBAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhADEAAAAX8P/8QAFBABAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQABBQJ//8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAgBAwEBPwF//8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAgBAgEBPwF//8QAFBABAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQAGPwJ//8QAFBABAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQABPyF//9oADAMBAAIAAwAAABAf/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAgBAwEBPxB//8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAgBAgEBPxB//8QAFBABAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQABPxB//9k="';
    }

    public function render_3d_user($userid){

        $func = new sitefunctions();
        $gameserver = new gameserver();
        $jobid = $func->createjobid();
        $lua = file_get_contents("../storage/lua/3duser.lua");

        $serverinfo = $gameserver->get_closest_server();
        $url = $gameserver->get_server_url($serverinfo);

        $Grid = new \watrbx\Grid\Grid();
        $Close = $Grid->Close($url);

        $jobInfo = [
            "Id"=>$jobid,
            "Expiration"=>60, // I don't think it should take longer than this to render 
            "Category"=>1,
            "Cores"=>1
        ];

        $ScriptInfo = [
            "Name"=>"3D Render Script",
            "Script"=>$lua,
            "Arguments"=>[
                "id"=>$userid,
                "dimensions"=>"1024x1024",
                "apikey"=>"",
                "x"=>"1024",
                "y"=>"1024"
            ]
        ];

        $thing = $gameserver->execute_job($jobInfo, $ScriptInfo);

        $Close->CloseJob($jobid);

        return $thing;
    }

    public function render_3d_item($assetid){

        $func = new sitefunctions();
        $gameserver = new gameserver();
        $jobid = $func->createjobid();
        $lua = file_get_contents("../storage/lua/3ditem.lua");

        $serverinfo = $gameserver->get_closest_server();
        $url = $gameserver->get_server_url($serverinfo);

        $Grid = new \watrbx\Grid\Grid();
        $Close = $Grid->Close($url);

        $jobInfo = [
            "Id"=>$jobid,
            "Expiration"=>60, // I don't think it should take longer than this to render 
            "Category"=>1,
            "Cores"=>1
        ];

        $ScriptInfo = [
            "Name"=>"3D Render Script",
            "Script"=>$lua,
            "Arguments"=>[
                "id"=>$assetid,
                "dimensions"=>"1024x1024",
                "apikey"=>"",
                "x"=>"1024",
                "y"=>"1024"
            ]
        ];

        $thing = $gameserver->execute_job($jobInfo, $ScriptInfo);

        $Close->CloseJob($jobid);

        return $thing;
    }

    public function render_asset($jobinfo){

        $gameserver = new gameserver();        
        $closeserver = $gameserver->get_closest_server(); 
        $serverUri = $gameserver->get_server_url($closeserver);

        $theid = null;
        $apikey = null;
        $lua = "";

        global $db;
        $Grid = new \watrbx\Grid\Grid;
        $Open = $Grid->Open($serverUri);

        $lua = $this->getLua($jobinfo);
        $exploded = explode("x", $jobinfo->dimensions);

        $x = $exploded[0];
        $y = $exploded[1];

        if(isset($jobinfo->userid)){
            $theid = $jobinfo->userid;
        }

        if(isset($jobinfo->assetid)){
            $theid = $jobinfo->assetid;
        }

        $jobInfo = [
            "Id"=>$jobinfo->jobid,
            "Expiration"=>300, // I don't think it should take longer than this to render 
            "Category"=>1,
            "Cores"=>1
        ];

        $ScriptInfo = [
            "Name"=>"Render Script",
            "Script"=>$lua,
            "Arguments"=>[
                "id"=>$theid,
                "dimensions"=>"1024x1024",
                "apikey"=>$jobinfo->apikey,
                "x"=>$x,
                "y"=>$y
            ]
        ];

        return $gameserver->execute_job($jobInfo, $ScriptInfo);
    }

    public function get_user_thumb($userid, $size, $type = "full"){
        global $db;
        $thumb = $db->table("thumbnails")->where("userid", $userid)->where("dimensions", $size)->first();
        $assetinfo = $db->table("users")->where("id", $userid)->first();
        if($thumb !== null){
            return "//cdn.watrbx.wtf/" . $thumb->file;
        } else {
            $this->request_user_thumbnail($userid, $size, $type);
            return "//cdn.watrbx.wtf/defaultimage.png?t=1";
        }
    }

    public function check_moderation_status($asset) {
        global $db;

        if (is_int($asset)) {
            $asset = $db->table("assets")->where("id", $asset)->first();
        }

        if(!$asset){
            return "/images/defaultimage.png?t=1";
        }

        return match ($asset->moderation_status) {
            "Pending" => "/images/defaultimage.png?t=1",
            "Deleted" => "//cdn/watrbx.wtf/94d99af3ba4bc501d80b51580ffa9b4a3031560c.png",
            "Approved" => null,
            default   => "/images/defaultimage.png?t=1",
        };
    }

    public function get_asset_thumb($id, $size = "300x300", $type = "icon"){
        global $db;

        (int) $id;

        if($this->check_moderation_status((int) $id)){
            return $this->check_moderation_status((int) $id);
        }


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
            } elseif($assetinfo->prodcategory == 3){
                $thumb = $db->table("thumbnails")->where("assetid", $id)->where("mode", "Icon")->orderBy("id", "DESC")->first();

                if($thumb !== null){
                    return "//cdn.watrbx.wtf/" . $thumb->file;
                }

                return "//cdn.watrbx.wtf/Soundimage2.png";
            }

            $this->request_asset_thumbnail($id, $size);
            return "//watrbx.wtf/images/defaultimage.png?t=1";
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
            $gameservers = new gameserver();
            $assetinfo = $db->table("assets")->where("id", $assetid)->first();
            if($assetinfo !== null){
                $jobid = $func->createjobid();
                $apikey = $gameservers->create_api_key();
                $db->table("jobs")->insert(["status"=>"0", "type"=>2, "apikey"=>$apikey, "assetid"=>$assetid, "jobid"=>$jobid, "dimensions"=>$dimensions]);
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
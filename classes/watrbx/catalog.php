<?php

namespace watrbx;
use watrlabs\authentication;
use watrlabs\watrkit\pagebuilder; // TODO: Allow to display items with this.. (maybe?)

class catalog {

    static function get_asset_info($assetid){
        global $db;
        $assetinfo = $db->table("assets")->where("id", $assetid)->first();

        if($assetinfo !== null){
            return $assetinfo;
        } else {
            return false;
        }
    }

    static function has_asset($userid, $itemid){
        global $db;

        $hasasset = $db->table("ownedassets")->where("userid", $userid)->where("assetid", $itemid)->first();

        if($hasasset == null){
            return false;
        } else {
            return true;
        }
    }

    static function purchase_item($userid, $itemid, $expectedcurrency){

        global $db;

        $asset = $db->table("assets")->where("id", $itemid)->first();
        $auth = new authentication();

        if($asset !== null){
            if($expectedcurrency == 1){
                // robux purchase
                $auth->requiresession();
                $userinfo = $auth->getuserbyid($userid);
                $creatorinfo = $auth->getuserbyid($asset->owner);
                $ownernewbalance = $creatorinfo->robux + $asset->robux;

                $userupdate = ["robux"=>$ownernewbalance];
                $db->table("users")->where("id", $creatorinfo->id)->update($userupdate);


                $newbalance = $userinfo->robux - $asset->robux;

                $update = array(
                    "robux"=>$newbalance
                );

                $db->table("users")->where("id", $userid)->update($update);

                $insert = array(
                    "userid"=>$userid,
                    "assetid"=>$itemid,
                    "time"=>time()
                );
                $db->table("ownedassets")->insert($insert);
                return true;
            } elseif($expectedcurrency == 2){
                // tix purchase
                $auth->requiresession();
                $userinfo = $auth->getuserbyid($userid);
                $creatorinfo = $auth->getuserbyid($asset->owner);
                $ownernewbalance = $creatorinfo->tix + $asset->tix;

                $userupdate = ["tix"=>$ownernewbalance];
                $db->table("users")->where("id", $creatorinfo->id)->update($userupdate);

                $newbalance = $userinfo->tix - $asset->tix;

                $update = array(
                    "tix"=>$newbalance
                );

                $db->table("users")->where("id", $userid)->update($update);

                $insert = array(
                    "userid"=>$userid,
                    "assetid"=>$itemid,
                    "time"=>time()
                );
                $db->table("ownedassets")->insert($insert);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        // TODO: Move functionality from item.ashx in apihandler to this function. (and rewrite because its really messy idk what 3 am me was thinking)
        
    }

}
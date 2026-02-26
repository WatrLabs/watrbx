<?php

namespace watrbx;

class refers {

    private $db = null;

    function __construct(){
        global $db;
        $this->db = $db;
    }

    public function getReferInfo($referName){
        return $this->db->table("refers")->where("refername", $referName)->first();
    }

    public function getReferInfoById($id){
        return $this->db->table("refers")->where("id", $id)->first();
    }

    public function incrementRefer($referName){
        $referInfo = $this->getReferInfo($referName);

        if($referInfo){
            $update = [
                "uses"=> $referInfo->uses + 1
            ];

            $this->db->table("refers")->where("id", $referInfo->id)->update($update);
            return true;
        }

        return false;

    }

    public function incrementReferSignup($referName){
        $referInfo = $this->getReferInfo($referName);

        if($referInfo){
            $update = [
                "signups"=> $referInfo->signups + 1
            ];

            $this->db->table("refers")->where("id", $referInfo->id)->update($update);
            return true;
        }

        return false;

    }

    public function assignReferCookie($referName){
        if(!isset($_COOKIE["refer"])){
            $referInfo = $this->getReferInfo($referName);

            if($referInfo){
                setcookie("refer", $referInfo->id, time() + 8600, '/', '.watrbx.wtf');
            }

            return true;

        }

        return false;
    }

    public function hasReferCookie(){
        if(isset($_COOKIE["refer"])){
            $referId = (int)$_COOKIE["refer"];

            $referInfo = $this->getReferInfoById($referId);

            if($referInfo){
                return $referInfo;
            }

        }

        return false;
    }

}
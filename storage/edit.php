<?php
    global $db;
    global $currentuser;

    ob_start();

    $script = "print(\"An error occured.\")";

    if(isset($_GET["placeId"]) && $currentuser !== null){
        $placeid = (int)$_GET["placeId"];

        $script = file_get_contents("../storage/lua/edit.lua");
        $script = str_replace("%placeid%", $placeid, $script);

        $assetinfo = $db->table("assets")->where("id", $placeid)->first();

        if($assetinfo !== null){
            if($assetinfo->owner !== $currentuser->id){
                $script = file_get_contents("../storage/lua/edit-error.lua");
            }
        } else {
            $script = file_get_contents("../storage/lua/edit-error.lua");
        }

    } else {

        $script = file_get_contents("../storage/lua/edit-error.lua");
        
    }
    
    echo $script;

    $data = "\r\n" . ob_get_clean();
    $key = file_get_contents("../storage/PrivateNut.pem");
    openssl_sign($data, $sig, $key, OPENSSL_ALGO_SHA1);
    echo "--rbxsig%" . base64_encode($sig) . "%" . $data;
?>
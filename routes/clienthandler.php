<?php
use watrlabs\router\Routing;
use watrlabs\authentication;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get('/Game/Join2014.ashx', function(){
    header("Content-type: text/lua");
    require("../storage/2014join.php");
    die();
});

$router->get('/Asset/', function() {
        
    if(isset($_GET["id"])){
        if(isset($_GET["version"])){
            $version = (int)$_GET["version"];
        } else {
            $version = 0;
        }

        $id = (int)$_GET["id"];

        global $db;

        $asset = $db->table("assets")->where("id", $id)->first();

        if($asset !== null){
            header("Location: http://c0.watrbx.xyz/" . $asset->fileid);
            die();
        } else {
            $ch = curl_init("https://assetdelivery.roblox.com/v2/asset/?id=" . urlencode($id) . "&version=" . $version);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Cookie:.ROBLOSECURITY=" . $_ENV["ROBLOSECURITY"],
                "User-Agent: Roblox/WinInet"
            ]);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_USERAGENT => "Roblox/WinInet",
            ]);

            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $data = json_decode($response, true);

            if($http_code == 200){
                if (isset($data['locations'][0]['location'])) {
                    header("Location: " . $data['locations'][0]['location'], true, 307);
                    exit;
                } else {
                    http_response_code(500);
                }
            } else {
                die(500);
            }
        }
    }
});

$router->get('/asset/', function() {
        
    if(isset($_GET["id"])){
        if(isset($_GET["version"])){
            $version = (int)$_GET["version"];
        } else {
            $version = 0;
        }

        $id = (int)$_GET["id"];

        global $db;

        $asset = $db->table("assets")->where("id", $id)->first();

        if($asset !== null){
            header("Location: http://c0.watrbx.xyz/" . $asset->fileid);
            die();
        } else {
            $ch = curl_init("https://assetdelivery.roblox.com/v2/asset/?id=" . urlencode($id) . "&version=" . $version);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Cookie:.ROBLOSECURITY=" . $_ENV["ROBLOSECURITY"],
                "User-Agent: Roblox/WinInet"
            ]);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_USERAGENT => "Roblox/WinInet",
            ]);

            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $data = json_decode($response, true);

            if($http_code == 200){
                if (isset($data['locations'][0]['location'])) {
                    header("Location: " . $data['locations'][0]['location'], true, 307); // or 307 for temporary redirect
                    exit;
                } else {
                    http_response_code(500);
                }
            } else {
                die(500);
            }
        }
    }
});

$router->get("/Asset/BodyColors.ashx", function(){
    header("Content-type: application/xml");
    die('<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.watrbx.xyz/roblox.xsd" version="4">
            <External>null</External>
            <External>nil</External>
            <Item class="BodyColors" referent="RBX2DC0258909A9441E8A72097F024F5FC7">
                <Properties>
                    <int name="HeadColor">1030</int>
                    <int name="LeftArmColor">1030</int>
                    <int name="LeftLegColor">1030</int>
                    <string name="Name">Body Colors</string>
                    <int name="RightArmColor">1030</int>
                    <int name="RightLegColor">1030</int>
                    <int name="TorsoColor">1030</int>
                </Properties>
            </Item>
        </roblox>');
});

$router->post('/game/validate-machine', function(){
    header("Content-type: application/json");
    echo json_encode(array("success"=>true));
    die();
});

$router->get('/marketplace/productinfo', function(){
    header("Content-type: application/json");
    if(isset($_GET["assetId"])){
        $auth = new authentication();
        $assetid = (int)$_GET["assetId"];
        global $db;
        $productinfo = [
            "Name"=>"",
            "Description"=>"",
            "Created"=>"",
            "Updated"=>"",
            "PriceInRobux"=>0,
            "PriceInTickets"=>0,
            "Creator"=>[
                "Id"=>0,
                "Name"=>"ROBLOX",
                "CreatorType"=>"User",
                "CreatorTargetId"=>1
            ],
        ];
        $assetinfo = $db->table("assets")->where("id", $assetid)->first();

        if($assetinfo !== null){

            $creatorinfo = $auth->getuserbyid($assetinfo->owner);

            $productinfo["Name"] = $assetinfo->name;
            $productinfo["Description"] = $assetinfo->description;
            $productinfo["Created"] = date('c', $assetinfo->created);
            $productinfo["Updated"] = date('c', $assetinfo->updated);
            $productinfo["PriceInRobux"] = $assetinfo->robux;
            $productinfo["PriceInTickets"] = $assetinfo->tix;

            $productinfo["Creator"]["Id"] = $creatorinfo->id;
            $productinfo["Creator"]["Name"] = $creatorinfo->username;
            $productinfo["Creator"]["CreatorTargetId"] = $creatorinfo->id;

            die(json_encode($productinfo));

        } else {
            http_response_code(404);
            echo json_encode(array("success"=>false));
            die();
        }
        

    } else {
        header("Content-type: application/json");
        echo json_encode(array("success"=>false));
        die();
    }
});

$router->get('/GetAllowedSecurityVersions/', function(){
    header("Content-type: application/json");
    die('{"data":["0.235.0pcplayer","0.1.0pcplayer","0.235.0pcplayer","INTERNALiosapp","0.450.0pcplayer","0.205.0pcplayer"]}');
});

$router->get('/GetAllowedMD5Hashes/', function(){
    //die("True");
    header("Content-type: application/json");
    die('{"data":["84c450b64d3cff3b3e100a93cd13a6ae", "d587ab8b913640c24c31af5f7af7a6e2", "67621ff6cb93314c9d82fe34ca5bf24c", "1cebbf37f3588c385d22eb1cfb780ecc"]}');
});

$router->get('/game/LoadPlaceInfo.ashx', function(){
    die('pcall(function() game:GetService("SocialService"):SetFriendUrl("http://localhost/Game/LuaWebService/HandleSocialRequest.ashx?method=IsFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetBestFriendUrl("http://localhost/Game/LuaWebService/HandleSocialRequest.ashx?method=IsBestFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupUrl("http://localhost/Game/LuaWebService/HandleSocialRequest.ashx?method=IsInGroup&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupRankUrl("http://localhost/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRank&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupRoleUrl("http://localhost/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRole&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("GamePassService"):SetPlayerHasPassUrl("http://localhost/Game/GamePass/GamePassHandler.ashx?Action=HasPass&UserID=%d&PassID=%d") end)
pcall(function() game:GetService("MarketplaceService"):SetProductInfoUrl("http://localhost/marketplace/productinfo?assetId=%d") end)
pcall(function() game:GetService("MarketplaceService"):SetDevProductInfoUrl("http://localhost/marketplace/productDetails?productId=%d") end)
pcall(function() game:GetService("MarketplaceService"):SetPlayerOwnsAssetUrl("http://localhost/ownership/hasasset?userId=%d&assetId=%d") end)
pcall(function() game:SetPlaceVersion(1) end)');
});

$router->get('/Setting/QuietGet/ClientAppSettings/', function(){
    header("Content-type: application/json");
    $json = file_get_contents("../storage/clientappsettings.json");
    die($json);
});

$router->get('/game/players/{userid}/', function($userid){
    header("Content-type: application/json");
    http_response_code(200);
    die('{"ChatFilter":"blacklist"}');
});

$router->get('/Setting/QuietGet/ClientSharedSettings/', function(){
    header("Content-type: application/json");
    $json = file_get_contents("../storage/clientappsettings.json");
    die($json);
});
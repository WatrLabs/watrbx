<?php
use watrlabs\router\Routing;

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

$router->get('/GetAllowedSecurityVersions/', function(){
    header("Content-type: application/json");
    die('{"data":[0.235.0pcplayer","0.235.0pcplayer","INTERNALiosapp","0.450.0pcplayer","0.205.0pcplayer"]}');
});

$router->get('/GetAllowedMD5Hashes/', function(){
    //die("True");
    header("Content-type: application/json");
    die('{"data":["f9fa78c9fc7dd435a3fa3b115732f65d", "39dbf64192e20ffc90c76934ccd6b797"]}');
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
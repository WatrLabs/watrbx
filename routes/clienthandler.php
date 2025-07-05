<?php
use watrlabs\router\Routing;
use watrlabs\authentication;

global $router; // IMPORTANT: KEEP THIS HERE!

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
            header("Location: http://cdn.watrbx.xyz/" . $asset->fileid);
            die();
        } else {
            $queryparams = http_build_query($_GET);
            header("Location: https://assetdelivery.ttblox.mom/v1/asset/?$queryparams");
            die();
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
            header("Location: http://cdn.watrbx.xyz/" . $asset->fileid);
            die();
        } else {
            $queryparams = http_build_query($_GET);
            header("Location: https://assetdelivery.ttblox.mom/v1/asset/?$queryparams");
            die();
        }
    }
});

$router->get('/Game/Tools/InsertAsset.ashx', function(){

    $queryparams = http_build_query($_GET);

    header("Location: https://sets.pizzaboxer.xyz/Game/Tools/InsertAsset.ashx?$queryparams");
    die();
});

$router->get('/Game/Tools/ThumbnailAsset.ashx', function(){

    //https://roblox.com/Game/Tools/ThumbnailAsset.ashx?fmt=png&wd=420&ht=420&aid=67572213

    $queryparams = http_build_query($_GET);

    $assetid = $_GET['aid'];
    if(isset($_GET['aid'])){
        $jsonstuff = @json_decode(file_get_contents('https://thumbnails.ttblox.mom/v1/assets?assetids='.$assetid.'&size=420x420&format=Png&isCircular=false'));
        if($jsonstuff){
            foreach ($jsonstuff->data as $jsonsthing) {
                header("Location: $jsonsthing->imageUrl");
            }
        } else {
            http_response_code(404);
            die();
        }
}

});

$router->get("/Asset/BodyColors.ashx", function(){
    header("Content-type: application/xml");

    $userid = 1;

    if(isset($_GET["Id"])){
        $userid = $_GET["Id"];
        
    }



    $auth = new authentication();
    $bodycolors = $auth->get_body_colors($userid);

    die('<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.watrbx.xyz/roblox.xsd" version="4">
<External>null</External>
<External>nil</External>
<Item class="BodyColors" referent="RBX2DC0258909A9441E8A72097F024F5FC7">
    <Properties>
        <string name="Name">Body Colors</string>
        <int name="HeadColor">'.$bodycolors["Head"].'</int>
        <int name="LeftArmColor">'.$bodycolors["LeftArm"].'</int>
        <int name="LeftLegColor">'.$bodycolors["LeftLeg"].'</int>
        <int name="RightArmColor">'.$bodycolors["RightArm"].'</int>
        <int name="RightLegColor">'.$bodycolors["RightLeg"].'</int>
        <int name="TorsoColor">'.$bodycolors["Torso"].'</int>
    </Properties>
</Item>
</roblox>');
});

$router->post('/game/validate-machine', function(){
    header("Content-type: application/json");
    echo json_encode(array("success"=>true));
    die();
});

$router->post('/marketplace/purchase', function() {
    $data = array('success' => 'true', 'status' => 'Bought', 'receipt' => "ye");
    header('Content-type: application/json');
    echo json_encode($data); 
});

$router->get('/marketplace/productinfo', function(){

    header("Content-type: application/json");
    
    if(isset($_GET["assetId"])){
        $auth = new authentication();
        $assetid = (int)$_GET["assetId"];
        
        $productinfo = [
            "TargetId" => $assetid,
            "ProductType" => "User Product",
            "AssetId" => $assetid,
            "ProductId" => $assetid,
            "Name" => "Unknown Asset",
            "AssetTypeId" => 9,
            "Creator" => [
                "Id" => 1,
                "Name" => "Unkown",
                "CreatorType" => "User",
                "CreatorTargetId" => 1
            ],
            "IconImageAssetId" => 607948062,
            "Created" => "2016-05-01T01:07:04.78Z",
            "Updated" => "2016-09-26T22:43:21.667Z",
            "PriceInRobux" => null,
            "PriceInTickets" => null,
            "Sales" => 0,
            "IsNew" => false,
            "IsForSale" => true,
            "IsPublicDomain" => true,
            "IsLimited" => false,
            "IsLimitedUnique" => false,
            "Remaining" => null,
            "MinimumMembershipLevel" => 0,
            "ContentRatingTypeId" => 0
        ];

        global $db;
        $assetinfo = $db->table("assets")->where("id", $assetid)->first();

        if($assetinfo !== null){
            $creatorinfo = $auth->getuserbyid($assetinfo->owner);

            $productinfo["Name"] = $assetinfo->name;
            $productinfo["AssetTypeId"] = $assetinfo->prodcategory;
            $productinfo["Created"] = date('c', $assetinfo->created);
            $productinfo["Updated"] = date('c', $assetinfo->updated);
            $productinfo["PriceInRobux"] = $assetinfo->robux;
            $productinfo["PriceInTickets"] = $assetinfo->tix;

            $productinfo["Creator"]["Id"] = $creatorinfo->id;
            $productinfo["Creator"]["Name"] = $creatorinfo->username;
            $productinfo["Creator"]["CreatorTargetId"] = $creatorinfo->id;
        }

        die(json_encode($productinfo, JSON_UNESCAPED_SLASHES));

    } else {
        header("Content-type: application/json");
        die(json_encode(array("success"=>false)));
        
    }
});

$router->get('/GetAllowedSecurityVersions/', function(){
    header("Content-type: application/json");
    die('{"data":["0.2.0pcplayer","INTERNALiosapp"]}');
});

$router->get('/GetAllowedMD5Hashes/', function(){
    //die("True");
    header("Content-type: application/json");
    die('{"data":["168ea82075bc5e6a66444bde46e45a23", "7aef3c686af2926663008eb836865fbf"]}');
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
    die('{"ChatFilter":"whitelist"}');
});

$router->get('/Setting/QuietGet/ClientSharedSettings/', function(){
    header("Content-type: application/json");
    $json = file_get_contents("../storage/clientappsettings.json");
    die($json);
});
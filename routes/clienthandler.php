<?php
use watrlabs\router\Routing;
use watrlabs\authentication;
use watrbx\gameserver;
use watrbx\sitefunctions;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get('/place/{id}/fetch', function($id){

    global $db;
    $gameserver = new gameserver();

    if(isset($_GET["apikey"])){
        $apikey = $_GET["apikey"];


        if($gameserver->validate_api_key($apikey)){
            $asset = $db->table("assets")->where("id", $id)->first();

            if($asset){
                header("Location: https://cdn.watrbx.wtf/" . $asset->fileid);
                die();
            } else {
                http_response_code(403);
                die();
            }

        } else {
            http_response_code(403);
            die();
        }

        http_response_code(403);
        die();

    }

    http_response_code(403);
    die();

});

$router->get('/asset/', function() {

    global $db;

    $id = basename(isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ID']) ? $_GET['ID'] : 0));
    $exploded = explode("=", $id);

    if($exploded){
        if(isset($exploded[0]) && isset($exploded[1])){
            (int)$id = $exploded[0];
            (string)$apikey = $exploded[1];

            $gameserver = new gameserver();
            if($gameserver->validate_api_key($apikey)){
                $asset = $db->table("assets")->where("id", $id)->first();

                if($asset){
                    header("Location: https://cdn.watrbx.wtf/" . $asset->fileid);
                    die();
                }

            }

        }
    }


        
    if($id){

        if(isset($_GET["version"])){
            $version = (int)$_GET["version"];
        } else {
            $version = 0;
        }

        global $db;
        global $currentuser;

        $asset = $db->table("assets")->where("id", $id)->first();

        if($asset !== null){
            if($asset->prodcategory == 9){

                if($currentuser){

                    if($asset->owner == $currentuser->id){
                        try {
                            header("Content-type: application/octet-stream");
                            $asset = file_get_contents("https://cdn.watrbx.wtf/" . $asset->fileid);
                            $asset = str_replace("roblox.com", "watrbx.wtf", $asset);
                            $asset = str_replace("watrbx.xyz", "watrbx.wtf", $asset);
                            die($asset);
                        } catch (ErrorException){
                            http_response_code(500);
                            die();
                        }

                    } 
                }

                http_response_code("403");
                die("You do not own this asset.");
                

            } else {
                header("Content-type: application/octet-stream");
                try {
                    $asset = file_get_contents("https://cdn.watrbx.wtf/" . $asset->fileid);
                    $asset = str_replace("roblox.com", "watrbx.wtf", $asset);
                    $asset = str_replace("watrbx.xyz", "watrbx.wtf", $asset);
                    die($asset);
                } catch (ErrorException){
                    http_response_code(500);
                    die();
                }
            }
        } else {

            header("Content-type: application/octet-stream");

            if(file_exists("../storage/asset_cache/$id")){
                die(file_get_contents("../storage/asset_cache/$id"));
            }

            $queryparams = http_build_query($_GET);
            
            try {
                $asset = @file_get_contents("https://assetdelivery.ttblox.mom/v1/asset/?$queryparams");

                if($asset){
                    
                    try {
                        $decoded = gzdecode($asset);
                    } catch (ErrorException $e){
                        die($asset);
                    }

                    file_put_contents("../storage/asset_cache/$id", $decoded); # THIS IS INSECURE!!!!!! (except for the fact I cast id to int & basename it)

                    $decoded = str_replace("roblox.com", "watrbx.wtf", $decoded);
                    header("Content-type: application/octet-stream");
                    die($decoded);
                    
                }

            } catch (ErrorException $e){
                http_response_code(500);
                die($e);
            }

            http_response_code(500);
            die();
        }
    }
});

$router->get('/universes/get-player-place-instance', function(){
    http_response_code(500);
    die('{}');
});

$router->get('/Game/Tools/InsertAsset.ashx', function(){

    $queryparams = http_build_query($_GET);

    header("Location: https://sets.pizzaboxer.xyz/Game/Tools/InsertAsset.ashx?$queryparams"); // * Pizzaboxer makes api * W Pizzaboxer
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

    die('<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="https://www.watrbx.wtf/roblox.xsd" version="4">
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

$router->post('/game/validate-machine', function(){ // TODO: Implement this if we even do want to
    header("Content-type: application/json");
    echo json_encode(array("success"=>true));
    die();
});

$router->post('/marketplace/purchase', function() { // TODO: Implement this
    $data = array('success' => 'true', 'status' => 'Bought', 'receipt' => "ye");
    header('Content-type: application/json');
    echo json_encode($data); 
});

$router->get('/Error/Grid.ashx', function(){
    die();
});

$router->post('/Error/Grid.ashx', function(){
    die();
});

$router->get('/Game/ReportSystats.ashx', function() {

    $gameserver = new gameserver();
    $auth = new authentication();
    $sitefunc = new sitefunctions();

    $ip = $sitefunc->getip();
    $isgameserver = $gameserver->is_gameserver_ip($ip);


    if(isset($_GET["UserID"]) && isset($_GET["Message"]) && $ip){
        
        $message = $_GET["Message"];
        $userid = $_GET["UserID"];

        $cheater = $auth->getuserbyid($userid);
        
        if($cheater){
            $discord = new discord();
            //$logging->logwebhook("Possible Cheater Detected!\nUser: " . $cheater["username"] . "\nCode: $message");
            $discord->send_webhook($_ENV["SYSTATS_WEBHOOK"], "Systats Reporter", $cheater->username . " - Code " . $message);
            http_response_code(200);
        } 
        
    } else {
        http_response_code(400);
        die();
    }
    
});

// TODO: Check api key
$router->get('/GetAllowedSecurityVersions/', function(){
    header("Content-type: application/json");
    die('{"data":["0.2.0pcplayer","INTERNALiosapp", "2.238.0x uwpapp"]}');
});

$router->get('/GetAllowedMD5Hashes/', function(){
    //die("True");
    header("Content-type: application/json");
    die('{"data":["3f5585ee49c5923e79a4332d005112e2","439d18dcc7f4b21b6e310608fec71a94", "8a10ba9868a05198863fbd6d579c0557"]}');
});

$router->get('/game/LoadPlaceInfo.ashx', function(){ //Todo: implement it (not important)
    die('');
});

$router->get('/Error/Dmp.ashx', function(){
    die("True");
});

$router->post('/Error/Dmp.ashx', function(){
    die("True");
});

$router->get('/gen-hash', function(){ // cool
    $prefix = "version-";
    $basething = time() . bin2hex(random_bytes(8));
    $hash = sha1($basething);
    $shortthing = substr($hash, 0, 16);
    $alltogether = $prefix . $shortthing;
    echo $alltogether;
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
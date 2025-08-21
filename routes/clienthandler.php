<?php
use watrlabs\router\Routing;
use watrlabs\authentication;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get('/asset/', function() {

    (int) $id = basename(isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ID']) ? $_GET['ID'] : 0));
        
    if($id){

        if(isset($_GET["version"])){
            $version = (int)$_GET["version"];
        } else {
            $version = 0;
        }

        global $db;

        $asset = $db->table("assets")->where("id", $id)->first();

        if($asset !== null){
            header("Location: http://cdn.watrbx.wtf/" . $asset->fileid);
            die();
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

    die('<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.watrbx.wtf/roblox.xsd" version="4">
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

$router->get('/GetAllowedSecurityVersions/', function(){
    header("Content-type: application/json");
    die('{"data":["0.2.0pcplayer","INTERNALiosapp"]}');
});

$router->get('/GetAllowedMD5Hashes/', function(){
    //die("True");
    header("Content-type: application/json");
    die('{"data":["c860515c87ac8a80ab7c72ab1cca68f5","359a1aad5833c3ac815949f35229ccbf","95e6226794c620ad6682ac2946b9e18c"]}');
});

$router->get('/game/LoadPlaceInfo.ashx', function(){
    die('');
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
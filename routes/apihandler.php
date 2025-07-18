<?php
use watrbx\thumbnails;
use watrlabs\router\Routing;
use watrlabs\watrkit\sanitize;
use watrlabs\authentication;
use watrbx\gameserver;
use watrbx\catalog;
use Cocur\Slugify\Slugify;
use watrbx\sitefunctions;
use watrbx\relationship\friends;
use Aws\S3\S3Client;
use Carbon\Carbon;
use watrlabs\logging\discord;
use watrlabs\watrkit\pagebuilder;

global $router; // IMPORTANT: KEEP THIS HERE!
global $db;

function create_error($error, $otherstuff = array(), $code = 400){
    header("Content-type: application/json");
    http_response_code($code);
    $array = array(
        "success"=>false,
        "error"=>$error,
        "data"=>$otherstuff
    );
    
    return json_encode($array);
}

function create_success($msg, $otherstuff = array(), $code = 200){
    header("Content-type: application/json");
    http_response_code($code);
    $array = array(
        "success"=>true,
        "msg"=>$msg,
        "data"=>$otherstuff
    );
    
    return json_encode($array);
}

function get_signature($script)
{
    $signature = "";
    openssl_sign($script, $signature, file_get_contents("../storage/PrivateNut.pem"), OPENSSL_ALGO_SHA1);
    return base64_encode($signature);
}

$router->get('/api/v1/get-players', function(){
    $func = new sitefunctions();
    global $db;

    $ip = $func->getip(true);
    $apireqcount = $db->table("apireq")->where("apiname", "getusers")->where("ip", $ip)->where("time", ">", time() - 60)->count();
    if($apireqcount >= 60){
        ob_clean();
        die(create_error("Too many requests!", [], 429));
    }
    $db->table("apireq")->insert(["apiname"=>"getusers", "ip"=>$ip, "time"=>time()]);

    header("Content-type: application/json");
    
    $playercount = $db->table("activeplayers")->count();
    ob_clean();
    die(create_success("Succesfully got players!", ["players"=>$playercount]));
});
 
$router->get('/Login/Negotiate.ashx', function() {
    $auth = $_GET["suggest"] ?? 0;
    
    header("Content-type: text/plain");
    
    global $db;

    $session = $db->table("sessions")->where("session", $auth)->first();

    if($session !== null){
        setcookie(".ROBLOSECURITY", $session->session, time() + 8600, "/", ".watrbx.wtf");
        echo "$session->session";
        die();
    } else {
        http_response_code(401);
        die("yeet");
    }

});

$router->get('/Setting/QuietGet/ClientAppSettings/', function() {

});

$router->get("/character-model", function(){
    header("Content-type: application/json");
    die(file_get_contents("../storage/character.json"));
});

$router->get("/avatar-thumbnail-3d/", function(){
    header("Content-type: application/json");
    
    die(file_get_contents("../storage/character.json"));
});

$router->get('/comments/get-json', function (){
    global $currentuser;
    global $db;

    $auth = new authentication();
    $thumbs = new thumbnails();

    if(isset($_GET{"assetId"})){
        $assetId = (int)$_GET["assetId"];
        $offset = 0;

        if(isset($_GET["startindex"])){
            $offset = (int)$_GET["startindex"];
        }

        header("Content-type: application/json");
        $ismoderator = $currentuser->is_admin == 1;
        $commentarray = [
            "IsUserModerator"=>$ismoderator,
            "Comments"=>[],
            "MaxRows"=>10
        ];

        $allcomments = $db->table("comments")->where("assetid", $assetId)->limit(10)->offset($offset)->orderBy("id", "desc")->get();
        $assetcreator = $db->table("assets")->where("id", $assetId)->first();

        foreach ($allcomments as $comment){
            $authorinfo = $auth->getuserbyid($comment->userid); 
            $commentarray["Comments"][] = [
                "Id"=>$comment->id,
                "PostedDate"=>Carbon::createFromTimestamp($comment->date)->diffForHumans(),
                "AuthorName"=>$authorinfo->username,
                "AuthorId"=>$authorinfo->id,
                "Text"=>$comment->content,
                "ShowAuthorOwnsAsset"=>$assetcreator->owner == $comment->userid,
                "AuthorThumbnail"=>[
                    "AssetId"=> $assetId,
                    "AssetHash"=>null,
                    "AssetTypeId"=> 0,
                    "Url"=>$thumbs->get_user_thumb($comment->userid, "250x250"),
                    "IsFinal"=>false
                ]
            ];
        }

        die(json_encode($commentarray));
    }

    die(file_get_contents("../storage/comments.json"));
});

$router->get('/avatar-thumbnail-3d/json', function(){
    // {"Url":"https://web.archive.org/web/20150801002803/http://t5.rbxcdn.com/682ceca48cd03e698aa5e0dc65c758b7","Final":true}

    header("Content-type: application/json");

    $json = array(
        "Url"=>"https://www.watrbx.wtf/avatar-thumbnail-3d/",
        "Final"=>true
    );

    die(json_encode($json));
});

$router->get('/thumbnail/resolve-hash/{the}', function($the){
    // {"Url":"https://web.archive.org/web/20150801002803/http://t5.rbxcdn.com/682ceca48cd03e698aa5e0dc65c758b7","Final":true}

    header("Content-type: application/json");

    $json = array(
        "Final"=>true,
        "Url"=>"https://www.watrbx.wtf/thumbnail/3dfiles/$the",
        "width"=>500,
        "height"=>500
    );

    die(json_encode($json));
});

$router->get('/Game/AreFriends', function() {
    header("Cache-Control: no-cache, no-store");
    header("Pragma: no-cache");
    header("Expires: -1");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

    $users = "";

    if (isset($_GET["userId"])) {
        $userId = (int)$_GET["userId"];

        $queryString = $_SERVER['QUERY_STRING'];
        preg_match_all('/otherUserIds=([^&]+)/', $queryString, $matches);
        $otherUserIds = array_map('intval', $matches[1]);

        $friends = new friends(); 
        $friendIds = [];

        foreach ($otherUserIds as $id) {
            if ($friends->are_friends($userId, $id)) {
                $friendIds[] = $id;
            }
        }

        $users = implode(",", $friendIds);
    }

    echo "," . $users . ",";
});

$router->get('/Thumbs/Avatar.ashx', function(){

        $thumbs = new thumbnails();
        global $db;

        if(isset($_GET["x"]) && isset($_GET["y"])){
            $x = (int)$_GET["x"];
            $y = (int)$_GET["y"];
            $mode = "full";

            if(isset($_GET["mode"])){
                $mode = "headshot";
            }

            if(isset($_GET["userId"])){
                $userid = (int)$_GET["userId"];
                $userinfo = $db->table("users")->where("id", $userid)->first();
            }

            if(isset($_GET["username"])){
                $username = $_GET["username"];
                $userinfo = $db->table("users")->where("username", $username)->first();
            }

            if(!isset($userinfo)){
                http_response_code(404);
                die();
            }

            $userid = $userinfo->id;
            
            $dimensions = $x . "x" . $y;

            if($x > 3000 || $y > 3000){
                http_response_code(400);
                die("We don't allow user thumbnails bigger than 3000x3000!");
            }   

            global $db;
            if($userinfo !== null){

                $thumb = $thumbs->get_user_thumb($userid, $dimensions, $mode);

                header("Location: $thumb");
                die($thumb);
            } else {
                http_response_code(400);
                die("User does not exist!"); 
            }
        } else {
            http_response_code(400);
            die("Something was empty!"); 
        }
});

$router->post('/api/item.ashx', function(){
    header("Content-type: application/json");
    global $db;
    $auth = new authentication();
    $catalog = new catalog();

    if($auth->hasaccount()){
        $success = false;
        global $currentuser;
        $userinfo = $currentuser;

        if(isset($_GET["rqtype"])){
            $type = $_GET["rqtype"];

            if($type == "purchase"){
                if( 
                    isset($_GET["productID"]) 
                    && isset($_GET["expectedCurrency"]) 
                    && isset($_GET["expectedPrice"]) 
                    && isset($_GET["expectedSellerID"])
                    ){
                        $prodid = (int)$_GET["productID"];
                        $expectedcurrency = (int)$_GET["expectedCurrency"];
                        $price = (int)$_GET["expectedPrice"];
                        $sellerid = (int)$_GET["expectedSellerID"];

                        if($_ENV["CAN_PURCHASE"] == "false"){
                            http_response_code(500);
                            $notforsale = array(
                                "statusCode"=>500,
                                "showDivID"=>"TransactionFailureView",
                                "title"=>"Purchasing Disabled",
                                "errorMsg"=>"You cannot purchase this item currently, please try again later."
                            );
                            die(json_encode($notforsale));
                        }

                        $asset = $db->table("assets")->where("id", $prodid)->first();

                        if($asset !== null){

                            if($asset->owner != $sellerid){
                                http_response_code(500);
                                $notforsale = array(
                                    "statusCode"=>500,
                                    "showDivID"=>"TransactionFailureView",
                                    "title"=>"Transaction Failed",
                                    "errorMsg"=>"The seller id is invalid."
                                );

                                die(json_encode($notforsale));
                            } else {
                                $sellerinfo = $auth->getuserbyid($asset->owner);
                            }

                            if($asset->publicdomain !== 1){
                                http_response_code(500);
                                $notforsale = array(
                                    "statusCode"=>500,
                                    "showDivID"=>"TransactionFailureView",
                                    "title"=>"Transaction Failed",
                                    "errorMsg"=>"The item is no longer for sale."
                                );

                                die(json_encode($notforsale));
                            }

                            if($expectedcurrency == 1){
                                if($asset->robux !== $price){
                                    // assume the price changed (might in the future store price changes)
                                    http_response_code(500); // best way to trigger this (idk if it does other status codes)
                                    $pricechange = array(
                                        "showDivID"=>"PriceChangedView",
                                        "expectedPrice"=>$price,
                                        "currentPrice"=>$asset->robux,
                                        "expectedCurrency"=>$expectedcurrency,
                                        "currentCurrency"=>1,
                                        "AssetID"=>$asset->id,
                                        "balanceAfterSale"=>$userinfo->robux - $asset->robux,
                                        "targetSelector"=> ".PurchaseButton[data-item-id='".$asset->id."']"
                                    );
                                    die(json_encode($pricechange));
                                } else {
                                    if($asset->robux > $userinfo->robux){
                                        http_response_code(500);
                                        $insufficient = array(
                                            "showDivId"=>"InsufficientFundsView",
                                            "shortfallPrice"=>$userinfo->robux - $asset->robux,
                                            "currentCurrency"=>1,
                                            "source"=>"item" // idek what this does
                                        );
                                        die(json_encode($insufficient));
                                    }

                                    // i think its safe to go through wit da purchase

                                    if($asset->limited == 1){
                                        $result = $catalog::purchase_item($userinfo->id, $asset->id, $expectedcurrency);

                                        if($result){
                                            $success = array(
                                                "Price"=>$asset->robux,
                                                "Currency"=>1,
                                                "AssetID"=>$asset->id,
                                                "AssetName"=>$asset->name,
                                                "AssetType"=>"Hat", // TODO: create a roblox class to handle stuff like this
                                                "SellerName"=>$sellerinfo->username,
                                                "TransactionVerb"=>"purchased",
                                                "IsMultiPrivateSale"=>false ,
                                                "AssetIsWearable"=>true // TODO: add onto the roblox class for this
                                            );
                                            die(json_encode($success));
                                        }
                                    } else {
                                        if(!$catalog::has_asset($userinfo->id, $asset->id)){
                                            $result = $catalog::purchase_item($userinfo->id, $asset->id, $expectedcurrency);

                                            if($result){
                                                $success = array(
                                                    "Price"=>$asset->robux,
                                                    "Currency"=>1,
                                                    "AssetID"=>$asset->id,
                                                    "AssetName"=>$asset->name,
                                                    "AssetType"=>"Hat", // TODO: create a roblox class to handle stuff like this
                                                    "SellerName"=>$sellerinfo->username,
                                                    "TransactionVerb"=>"purchased",
                                                    "IsMultiPrivateSale"=>false ,
                                                    "AssetIsWearable"=>true // TODO: add onto the roblox class for this
                                                );
                                                die(json_encode($success));
                                            }
                                        } else {
                                            http_response_code(500);
                                            $alreadyowned = array(
                                                "statusCode"=>500,
                                                "showDivID"=>"TransactionFailureView",
                                                "title"=>"Transaction Failed",
                                                "errorMsg"=>"You already own this item."
                                            );
                                            die(json_encode($alreadyowned));
                                        }
                                    }
                                }
                            }
                            if($expectedcurrency == 2){
                                if($asset->tix !== $price){
                                    // assume the price changed (might in the future store price changes)
                                    http_response_code(500); // best way to trigger this (idk if it does other status codes)
                                    $pricechange = array(
                                        "showDivID"=>"PriceChangedView",
                                        "expectedPrice"=>$price,
                                        "currentPrice"=>$asset->tix,
                                        "expectedCurrency"=>$expectedcurrency,
                                        "currentCurrency"=>2,
                                        "AssetID"=>$asset->id,
                                        "balanceAfterSale"=>$userinfo->tix - $asset->tix,
                                        "targetSelector"=> ".PurchaseButton[data-item-id='".$asset->id."']"
                                    );
                                    die(json_encode($pricechange));
                                } else {
                                    if($asset->tix > $userinfo->tix){
                                        http_response_code(500);
                                        $insufficient = array(
                                            "showDivId"=>"InsufficientFundsView",
                                            "shortfallPrice"=>$asset->tix - $userinfo->tix,
                                            "currentCurrency"=>2,
                                            "source"=>"item" // idek what this does
                                        );
                                        die(json_encode($insufficient));
                                    }

                                    // i think its safe to go through wit da purchase

                                    if($asset->limited == 1){
                                        $result = $catalog::purchase_item($userinfo->id, $asset->id, $expectedcurrency);

                                        if($result){
                                            $success = array(
                                                "Price"=>$asset->tix,
                                                "Currency"=>1,
                                                "AssetID"=>$asset->id,
                                                "AssetName"=>$asset->name,
                                                "AssetType"=>"Hat", // TODO: create a roblox class to handle stuff like this
                                                "SellerName"=>$sellerinfo->username,
                                                "TransactionVerb"=>"purchased",
                                                "IsMultiPrivateSale"=>false ,
                                                "AssetIsWearable"=>true // TODO: add onto the roblox class for this
                                            );
                                            die(json_encode($success));
                                        }
                                    } else {
                                        if(!$catalog::has_asset($userinfo->id, $asset->id)){
                                            $result = $catalog::purchase_item($userinfo->id, $asset->id, $expectedcurrency);

                                            if($result){
                                                $success = array(
                                                    "Price"=>$asset->tix,
                                                    "Currency"=>2,
                                                    "AssetID"=>$asset->id,
                                                    "AssetName"=>$asset->name,
                                                    "AssetType"=>"Hat", // TODO: create a roblox class to handle stuff like this
                                                    "SellerName"=>$sellerinfo->username,
                                                    "TransactionVerb"=>"purchased",
                                                    "IsMultiPrivateSale"=>false ,
                                                    "AssetIsWearable"=>true // TODO: add onto the roblox class for this
                                                );
                                                die(json_encode($success));
                                            }
                                        } else {
                                            http_response_code(500);
                                            $alreadyowned = array(
                                                "statusCode"=>500,
                                                "showDivID"=>"TransactionFailureView",
                                                "title"=>"Transaction Failed",
                                                "errorMsg"=>"You already own this item."
                                            );
                                            die(json_encode($alreadyowned));
                                        }
                                    }
                                }
                            }
                        } else {
                            http_response_code(500);
                            $notforsale = array(
                                "statusCode"=>500,
                                "showDivID"=>"TransactionFailureView",
                                "title"=>"Transaction Failed",
                                "errorMsg"=>"This asset does not exist."
                            );

                            die(json_encode($notforsale));
                        }

                    }
            } else {
                http_response_code(404);
            }
        }

    } else {
        http_response_code(401);
        die();
    }
});

$router->get('/container/info', function(){
    global $s3_client;
});

$router->post('/api/v1/shirt-creator', function(){

    $router = new Routing();
    global $currentuser;

    if($currentuser !== null){
        if($currentuser->is_admin !== 1){
            die($router->return_status(403));
        }
    } else {
        die($router->return_status(403));
    }

    if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["robux"]) && isset($_POST["tix"]) && isset($_FILES["shirt"])){
        
        global $db;

        $title = $_POST["title"];
        $description = $_POST["description"];
        $robux = (int)$_POST["robux"];
        $tix = (int)$_POST["tix"];
        $md5 = md5_file($_FILES["shirt"]["tmp_name"]);


        if($tix < 0 || $robux < 0){
            die("Price cannot be negative");
        }

        $insert = array(
            "prodcategory"=>1,
            "name"=>$title,
            "description"=>"Image",
            "robux"=>$robux,
            "tix"=>$tix,
            "fileid"=>$md5,
            "created"=>time(),
            "updated"=>time(),
            "owner"=>$currentuser->id
        );

        try {

            global $s3_client;

            $md5 = md5_file($_FILES["shirt"]["tmp_name"]);
            
            $s3_client->putObject([
                'Bucket' => $_ENV["R2_BUCKET"],
                'Key' => $md5,
                'SourceFile' => $_FILES["shirt"]["tmp_name"]
            ]);
            $insertid = $db->table("assets")->insert($insert);

            $shirtxml = '<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.roblox.com/roblox.xsd" version="4">
                        <External>null</External>
                        <External>nil</External>
                        <Item class="Shirt" referent="RBX0">
                            <Properties>
                            <Content name="ShirtTemplate">
                                <url>http://www.watrbx.wtf/asset/?id='.$insertid.'</url>
                            </Content>
                            <string name="Name">Shirt</string>
                            <bool name="archivable">true</bool>
                            </Properties>
                        </Item>
                    </roblox>';

            $shirtmd5 = md5($shirtxml);

            $s3_client->putObject([
                'Bucket' => $_ENV["R2_BUCKET"],
                'Key' => $shirtmd5,
                'Body' => $shirtxml,
            ]);
            
            $insert2 = array(
                "prodcategory"=>11,
                "name"=>$title,
                "description"=>$description,
                "robux"=>$robux,
                "tix"=>$tix,
                "fileid"=>$shirtmd5,
                "created"=>time(),
                "updated"=>time(),
                "publicdomain"=>1,
                "featured"=>1,
                "owner"=>$currentuser->id
            );

            $insertid = $db->table("assets")->insert($insert2);

            header("Location: /catalog");
            die("Shirt uploaded!");
        } catch (Exception $exception) {
            echo "Failed to upload with error: " . $exception->getMessage();
        }

    }
});

$router->post('/api/v1/pants-creator', function(){

    $router = new Routing();
    global $currentuser;

    if($currentuser !== null){
        if($currentuser->is_admin !== 1){
            die($router->return_status(403));
        }
    } else {
        die($router->return_status(403));
    }

    if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["robux"]) && isset($_POST["tix"]) && isset($_FILES["shirt"])){
        
        global $db;

        $title = $_POST["title"];
        $description = $_POST["description"];
        $robux = (int)$_POST["robux"];
        $tix = (int)$_POST["tix"];
        $md5 = md5_file($_FILES["shirt"]["tmp_name"]);


        if($tix < 0 || $robux < 0){
            die("Price cannot be negative");
        }

        $insert = array(
            "prodcategory"=>1,
            "name"=>$title,
            "description"=>"Image",
            "robux"=>$robux,
            "tix"=>$tix,
            "fileid"=>$md5,
            "created"=>time(),
            "updated"=>time(),
            "owner"=>$currentuser->id
        );

        try {

            global $s3_client;

            $md5 = md5_file($_FILES["shirt"]["tmp_name"]);
            
            $s3_client->putObject([
                'Bucket' => $_ENV["R2_BUCKET"],
                'Key' => $md5,
                'SourceFile' => $_FILES["shirt"]["tmp_name"]
            ]);
            $insertid = $db->table("assets")->insert($insert);

            $shirtxml = '<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.roblox.com/roblox.xsd" version="4">
                        <External>null</External>
                        <External>nil</External>
                        <Item class="Pants" referent="RBX0">
                            <Properties>
                            <Content name="PantsTemplate">
                                <url>http://www.watrbx.wtf/asset/?id='.$insertid.'</url>
                            </Content>
                            <string name="Name">Pants</string>
                            <bool name="archivable">true</bool>
                            </Properties>
                        </Item>
                        </roblox>';

            $shirtmd5 = md5($shirtxml);

            $s3_client->putObject([
                'Bucket' => $_ENV["R2_BUCKET"],
                'Key' => $shirtmd5,
                'Body' => $shirtxml,
            ]);
            
            $insert2 = array(
                "prodcategory"=>11,
                "name"=>$title,
                "description"=>$description,
                "robux"=>$robux,
                "tix"=>$tix,
                "fileid"=>$shirtmd5,
                "created"=>time(),
                "updated"=>time(),
                "publicdomain"=>1,
                "featured"=>1,
                "owner"=>$currentuser->id
            );

            $insertid = $db->table("assets")->insert($insert2);

            header("Location: /catalog");
            die("Shirt uploaded!");
        } catch (Exception $exception) {
            echo "Failed to upload with error: " . $exception->getMessage();
        }

    }
});

$router->post('/api/v1/asset-upload', function(){
    $router = new Routing();
    global $currentuser;

    $auth = new authentication();

    if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["product"]) && isset($_FILES["asset"]) && $auth->hasaccount()){

        $md5 = md5_file($_FILES["asset"]["tmp_name"]);
        global $db;

        $title = htmlspecialchars($_POST["title"]);
        $description = htmlspecialchars($_POST["description"]);
        $robux = null;
        $tix = null;
        $forsale = true;


        if(isset($_POST["robux"])){
            $robux = (int)$_POST["robux"];
            $forsale = true;
        }

        if(isset($_POST["tix"])){
            $tix = (int)$_POST["tix"];
            $forsale = true;
        }
        $prodcategory = $_POST["product"];

        global $currentuser;

        $info = $currentuser;

        $insert = array(
            "prodcategory"=>$prodcategory,
            "name"=>$title,
            "description"=>$description,
            "robux"=>$robux,
            "tix"=>$tix,
            "fileid"=>$md5,
            "created"=>time(),
            "updated"=>time(),
            "owner"=>$info->id
        );

        if($forsale == true){
            $insert["publicdomain"] = 1;
            $insert["featured"] = 1; // should make this an option but oh well
        }

        try {
            global $s3_client;

            $s3_client->putObject([
                'Bucket' => $_ENV["R2_BUCKET"],
                'Key' => $md5,
                'SourceFile' => $_FILES["asset"]["tmp_name"]
            ]);

            global $db; 

            $insertid = $db->table("assets")->insert($insert);

            die("Asset uploaded with id: " . $insertid);

        } catch(Exception $e){
            die("Failed to upload asset! $e");
        }


    } else {
        die("Something was empty.");
    }
});

$router->post('/moderation/filtertext/', function(){

    $auth = new authentication();
    $func = new sitefunctions();

    global $db;

    if (isset($_POST['text']) && isset($_POST["userId"])) {
        $text = $_POST['text'];
        $userid = $_POST["userId"];
        
        $textfiltered = $func->filter_text($text);
        
        $staterinfo = $auth->getuserbyid($userid);

        $insert = [
            "userid"=>$userid,
            "message"=>$text,
            "filtered"=>$textfiltered
        ];

        $db->table("chatlogs")->insert($insert);

        $return = json_encode([
            "success" => true,
            "data" => [
                "white" => $textfiltered,
                "black" => $textfiltered
            ]
        ], JSON_UNESCAPED_SLASHES);

        die($return);
    } else {
        die(create_error("Bad Request"));
    } 
});

$router->get('/Game/ChatFilter.ashx', function(){
    die("True");
});

$router->post('/home/updatestatus', function(){
    $auth = new authentication();
    if(isset($_POST["status"]) && $auth->hasaccount()){
        global $db;
        global $currentuser;
        $userinfo = $currentuser;

        if(empty($_POST["status"])){
            http_response_code(400);
            die(json_encode(["success" => false, "message" => "Invalid request."]));
        }

        $msgcount = $db->table("feed")->where("owner", $userinfo->id)->where("date", ">", time() - 60)->count();

        if($msgcount >= 3){
            http_response_code(429);
            die(json_encode(["success" => false, "message" => "You're updating your status too fast!"]));  
        }

        header("Content-type: application/json");
        $status = htmlspecialchars($_POST["status"]);
        $func = new sitefunctions();

        $status = $func::filter_text($status);

        $statusupdate = [
            "blurb"=>$status
        ];

        $newfeed = [
            "content"=>$status,
            "owner"=>$userinfo->id,
            "date"=>time()
        ];

        $db->table("users")->where("id", $userinfo->id)->update($statusupdate);
        $db->table("feed")->insert($newfeed);
        die(json_encode(["success"=>true, "message"=>$status]));

    } else {
        http_response_code(400);
        die(json_encode(["success" => false, "message" => "Invalid request."]));
    }
});

$router->get('/api/comments.ashx', function(){
    header("Content-Type: application/json");

    if(isset($_GET["rqtype"]) && isset($_GET["assetID"])){
        $assetid = (int)$_GET["assetID"];
        $rqtype = $_GET["rqtype"];

        if($rqtype == "getComments"){
            $commentarray = [
                "isMod"=>false,
                "totalCount"=>0,
                "data"=>[],
            ];

            global $db;

            $allcomments = $db->table("comments")->where("assetid", $assetid)->orderBy("id", "DESC")->get();
            $assetinfo = $db->table("assets")->where("id", $assetid)->first();

            foreach ($allcomments as $comment){

                $doesown = false;
                $auth = new authentication();
                $commentor = $auth->getuserbyid($comment->userid);
                if($assetinfo->owner == $comment->userid){
                    $doesown = true;
                } else {
                    $doesown = false;
                }
                $commentarray["data"][] = [
                    "ID"=>$comment->id,
                    "Date"=>Carbon::createFromTimestamp($comment->date)->diffForHumans(),
                    "Author"=>$commentor->username,
                    "AuthorID"=>$commentor->id,
                    "Content"=>$comment->content,
                    "AuthorOwnsAsset"=>$doesown
                ];
            }

            $commentarray["totalCount"] = count($allcomments);

            die(json_encode($commentarray));
        }
    }

    die('{"isMod":true,"totalCount":2,"data":[{"ID":1,"Date":"1 day","Author":"watrabi","AuthorID":2,"Content":"nice model","AuthorOwnsAsset":true},{"ID":1,"Date":"1 day","Author":"shedletsky","AuthorID":3,"Content":"im too poor","AuthorOwnsAsset":false}]}');
});

$router->post('/api/comments.ashx', function(){

    global $db;

    if(isset($_GET["rqtype"]) && isset($_GET["assetID"])){
        $assetid = (int)$_GET["assetID"];
        $rqtype = $_GET["rqtype"];

        global $currentuser;

        if($currentuser == null){
            header("Location: /newlogin");
            die("Please login.");
        }

        if($rqtype == "makeComment"){
            $comment = file_get_contents('php://input');

            if(!empty($comment)){
                $comment = htmlspecialchars($comment);
                $func = new sitefunctions();

                $comment = $func::filter_text($comment);

                $insert = [
                    "content"=>$comment,
                    "date"=>time(),
                    "userid"=>$currentuser->id,
                    "assetid"=>$assetid
                ];

                $insertid = $db->table("comments")->insert($insert);
                // {"ID":3712,"Date":"Just now","Content":"hi","Author":"watrabi","AuthorID":128}

                $returnjson = [
                    "ID"=>$insertid,
                    "Date"=>"Just Now",
                    "Content"=>$comment,
                    "Author"=>$currentuser->username,
                    "AuthorID"=>$currentuser->id
                ];
                header("Content-type: application/json");
                die(json_encode($returnjson));

            } else {
                http_response_code(400);
                die("Comment cannot be empty.");
            }
        }

    } else {
        http_response_code(400);
        die("Bad Request");
    }

});

$router->get('/item-thumbnails', function(){
    //var_dump($_GET);

    if(isset($_GET["jsoncallback"]) && isset($_GET["params"])){
        $jsoncallback = $_GET["jsoncallback"];
        $params = $_GET["params"];

        $decoded = @json_decode($params);

        if($decoded){
            global $db;
            $thumbs = new thumbnails();
            $allthumbs = [

            ];
            foreach ($decoded as $thumbnail){
                if(isset($thumbnail->assetId)){
                    $url = $thumbs->get_asset_thumb($thumbnail->assetId);
                    $assetinfo = $db->table("assets")->where("id", $thumbnail->assetId)->first();

                    $allthumbs[] = [
                        "id"=>$thumbnail->assetId,
                        "name"=>$assetinfo->name,
                        "url"=>"theitem-item?id=" . $thumbnail->assetId,
                        "thumbnailFinal"=>true,
                        "thumbnailUrl"=>$url,
                        "bcOverlayUrl"=>null,
                        "limitedOverlayUrl"=>null,
                        "deadlineOverlayUrl"=>null,
                        "limitedAltText"=>null,
                        "newOverlayUrl"=>null,
                        "imageSize"=>"large",
                        "saleOverlayUrl"=>null,
                        "iosOverlayUrl"=>null,
                        "transparentBackground"=>true
                    ];

                    die("$jsoncallback(".json_encode($allthumbs).")");
                }
            }
        } else {
            http_response_code(400);
            die();
        }
    } else {
        http_response_code(400);
        die();
    }

    die(); 
});

$router->get('/avatar-thumbnails', function(){
    //var_dump($_GET);

    if(isset($_GET["jsoncallback"]) && isset($_GET["params"])){
        $jsoncallback = $_GET["jsoncallback"];
        $params = $_GET["params"];

        $decoded = @json_decode($params);

        if($decoded){
            global $db;
            $thumbs = new thumbnails();
            $auth = new authentication();
            $allthumbs = [

            ];
            foreach ($decoded as $thumbnail) {
                if (isset($thumbnail->userId)) {
                    $url = $thumbs->get_user_thumb($thumbnail->userId, "100x100");
                    $assetinfo = $db->table("users")->where("id", $thumbnail->userId)->first();

                    $allthumbs[] = [
                        "id" => $thumbnail->userId,
                        "name" => $assetinfo->username,
                        "url" => "/users/$thumbnail->userId/profile",
                        "thumbnailFinal" => true,
                        "thumbnailUrl" => $url,
                        "bcOverlayUrl" => $auth->get_bc_overlay($thumbnail->userId),
                        "substitutionType" => 0
                    ];
                }
            }
            die("$jsoncallback(" . json_encode($allthumbs) . ")");

        } else {
            http_response_code(400);
            die();
        }
    } else {
        http_response_code(400);
        die();
    }

    die(); 
});


$router->get("/user/following-exists", function(){
    header("Content-type: application/json");
    die('{"success": true, "isFollowing": false}');
});

$router->post('/user/request-friendship', function(){
    if(isset($_GET["recipientUserId"])){
        global $currentuser;
        $recipient = (int)$_GET["recipientUserId"];
        if($currentuser !== null){
            $senderid = $currentuser->id;
            $friends = new friends();
            $result = $friends->add_friend($recipient, $senderid);

            if($result == 1){
                die('{"success":true}');
            } else {
                die('{"success":false}');
            }
        }
        
    } else {
        http_response_code(400);
        die('{"success": false}');
    }
});

$router->get('/sets/get-roblox-sets', function(){
    // TODO: Actually implement sets
    header("Content-type: application/json");
    die('[{"Id":464140,"Name":"Game Stuff"},{"Id":464138,"Name":"Baseplates"},{"Id":464131,"Name":"Weapons"},{"Id":463266,"Name":"Vehicles"},{"Id":458339,"Name":"Bricks"},{"Id":360380,"Name":"Basic Building"},{"Id":360378,"Name":"Advanced Building"},{"Id":360375,"Name":"House Kit"},{"Id":360372,"Name":"House Interior Kit"},{"Id":360371,"Name":"Landscape"},{"Id":360369,"Name":"Castle Kit"},{"Id":360365,"Name":"Castle Interior Kit"},{"Id":360363,"Name":"Space Kit"},{"Id":360362,"Name":"Fun Machines"},{"Id":360360,"Name":"Deadly Machines"}]');
});

$router->get('/universes/validate-place-join', function(){

    
    if(isset($_GET["destinationPlaceId"])){
        
        $destination = (int)$_GET["destinationPlaceId"];

        global $db;
        $assetinfo = $db->table("assets")->where("id", $destination)->where("prodcategory", 9)->first();

        die(var_export($assetinfo !== null, true));

    }

    die("false");

});

$router->get('/ide/toolbox/items', function(){
    // TODO: Actually implement sets
    header("Content-type: application/json");

    $return = [
        "TotalResults"=>0,
        "Results"=>[]
    ];
    
    if(isset($_GET["category"])){
        $category = $_GET["category"];
        if($category == "FreeModels"){
            global $db;
            $auth = new authentication;
            $thumbs = new thumbnails;
            $query = $db->table("assets")->where("prodcategory", 10)->where("publicdomain", 1);

            if(isset($_GET["keyword"])){
                $keyword = $_GET["keyword"];
                if($keyword !== ""){
                    $query->where("name", "LIKE", "%".$keyword."%");
                }
            }

            if(isset($_GET["creatorId"])){
                $creatorid = (int)$_GET["creatorId"];
                $query->where("owner", $creatorid);
            }

            $allassets = $query->orderBy("id", "DESC")->get();

            foreach ($allassets as $asset){
                $creatorinfo = $auth->getuserbyid($asset->owner);
                $return["Results"][] = [
                    "Asset"=>[
                        "Id"=>$asset->id,
                        "Name"=>$asset->name,
                        "TypeId"=>10,
                        "IsEndorsed"=>false, // todo
                    ],
                    "Creator"=>[
                        "Id"=>$creatorinfo->id,
                        "Name"=>$creatorinfo->username,
                        "Type"=>1 // todo
                    ],
                    "Thumbnail"=>[
                        "Final"=>true,
                        "Url"=>$thumbs->get_asset_thumb($asset->id),
                        "RetryUrl"=>null,
                        "UserId"=>0,
                        "EndpointType"=>"Avatar" // no idea what this means
                    ],
                    "Voting"=>[
                        "ShowVotes"=>false,
                    ]
                ];
            }

            $return["TotalResults"] = count($return["Results"]);

            die(json_encode($return));
        }

        if($category == "FreeDecals"){
            global $db;
            $auth = new authentication;
            $thumbs = new thumbnails;
            $allassets = $db->table("assets")->where("prodcategory", 13)->where("publicdomain", 1)->orderBy("id", "DESC")->get();
            foreach ($allassets as $asset){
                $creatorinfo = $auth->getuserbyid($asset->owner);
                $return["Results"][] = [
                    "Asset"=>[
                        "Id"=>$asset->id,
                        "Name"=>$asset->name,
                        "TypeId"=>13,
                        "IsEndorsed"=>false, // todo
                    ],
                    "Creator"=>[
                        "Id"=>$creatorinfo->id,
                        "Name"=>$creatorinfo->username,
                        "Type"=>1 // todo
                    ],
                    "Thumbnail"=>[
                        "Final"=>true,
                        "Url"=>$thumbs->get_asset_thumb($asset->id),
                        "RetryUrl"=>null,
                        "UserId"=>0,
                        "EndpointType"=>"Avatar" // no idea what this means
                    ],
                    "Voting"=>[
                        "ShowVotes"=>false,
                    ]
                ];
            }

            $return["TotalResults"] = count($return["Results"]);

            die(json_encode($return));
        }
    }

});

$router->get("/user/get-friendship-count", function(){
    header("Content-type: application/json");

    if(isset($_GET["userId"])){
        $friends = new friends();
        $userId = (int)$_GET["userId"];

        $friendcount = count($friends->get_friends($userId));

        $response = [
            "success"=>true,
            "count"=>$friendcount
        ];

        die(json_encode($response));

    } else {
        http_response_code(400);
        die('{"success": false}');
    }

    
});


$router->post('/user/multi-following-exists', function(){
    // TODO
    header("Content-type: application/json");
    die('{"followings": []}');
});

$router->post('/api/v1/cdn-upload', function(){
    $router = new Routing();
    global $currentuser;

    if($currentuser !== null){
        if($currentuser->is_admin !== 1){
            die($router->return_status(403));
        }
    } else {
        die($router->return_status(403));
    }
    if(isset($_POST["path"]) && isset($_FILES["file"])){

        $path = $_POST["path"];
        $file = $_FILES["file"];
        $path = $path . $file["name"];

        global $s3_client;

        try {

            $s3_client->putObject([
                'Bucket' => $_ENV["R2_BUCKET"],
                'Key' => $file["name"],
                'SourceFile' => $_FILES["file"]["tmp_name"]
            ]);

        } catch(Exception $e){
            die("Failed to upload to CDN!");
        }

        die("Uploaded at path: " . $path);
    }
});

$router->post('/api/v1/universe-creator', function(){

    $auth = new authentication();

    if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_FILES["asset"]) && $auth->hasaccount()){

        global $currentuser;

        $md5 = md5_file($_FILES["asset"]["tmp_name"]);
        global $db;

        $title = htmlspecialchars($_POST["title"]);
        $description = htmlspecialchars($_POST["description"]);
        $prodcategory = 9;

        $asset = $db->table("assets")->where("fileid", $md5)->first();
        $info = $currentuser;
        $slugify = new slugify();
        $slug = $slugify->slugify($title);
        
        $assetinsert = array(
            "prodcategory"=>$prodcategory,
            "name"=>$title,
            "description"=>$description,
            "robux"=>0,
            "tix"=>0,
            "fileid"=>$md5,
            "created"=>time(),
            "updated"=>time(),
            "owner"=>$info->id
        );

        $universeinsert = array(
            "title"=>$title,
            "description"=>$description,
            "owner"=>$info->id,
            "assetid"=>0,
            "public"=>1
        );

        try {
            global $s3_client;

            $s3_client->putObject([
                'Bucket' => $_ENV["R2_BUCKET"],
                'Key' => $md5,
                'SourceFile' => $_FILES["asset"]["tmp_name"]
            ]);

        } catch(ErrorException $e){
            die("Failed to create universe $e");
        }

        $insertid = $db->table("assets")->insert($assetinsert);
        $universeinsert["assetid"] = $insertid;
        $universeid = $db->table("universes")->insert($universeinsert);
        header("Location: /games/$universeid/$slug");
        die();

    } else {
        die("Something was empty.");
    }
});


$router->post('/messages/api/mark-messages-read', function(){
    $post = file_get_contents('php://input');
    $decoded = json_decode($post);

    if($decoded){

        if(isset($decoded->messageIds)){
            global $db;
            $update = array(
                "hasread"=>1,
            );
            foreach($decoded->messageIds as $messageid){
                $db->table("messages")->where("id", $messageid)->update($update);
            }
            die('{"success":true}');
        } else {
            http_response_code(400);
            die();
        }

    } else {
        http_response_code(400);
        die();
    }

});

$router->get('/messages/api/get-messages', function(){
    header("Content-type: application/json");

    $response = [
        "Collection"=>[],
        "TotalMessages"=>0,
        "Page"=>1,
        "PageSize"=>20,
    ];

    $auth = new authentication();
    $thumbs = new thumbnails();
    global $db;

    if(isset($_GET["messageTab"]) && isset($_GET["pageNumber"]) && isset($_GET["pageSize"]) && $auth->hasaccount()){
        $messagetab = (int)$_GET["messageTab"];
        $pagenum = (int)$_GET["pageNumber"];
        $pagesize = (int)$_GET["pageSize"];

        global $currentuser;

        $userinfo = $currentuser;
        switch ($messagetab){
            case 0:
                $allmessages = $db->table("messages")->where("userto", $userinfo->id)->orderBy("date", "DESC")->limit($pagesize)->get();
                $msgcount = count($allmessages);

                $response["PageSize"] = $pagesize;

                foreach ($allmessages as $message){
                    $isread = false;
                    $issystem = false;

                    if($message->hasread == 1){
                        $isread = true;
                    }

                    if($message->userfrom == 1){
                        $issystem = true;
                    } else {
                        $issystem = false;
                    }

                    $senderinfo = $auth->getuserbyid($message->userfrom);
                    $response["Collection"][] = [
                        "Id"=>$message->id,
                        "Sender"=>[
                            "UserId"=>$senderinfo->id,
                            "UserName"=>$senderinfo->username,
                        ],
                        "SenderThumbnail"=>[
                            "Url"=>$thumbs->get_user_thumb($senderinfo->id, "512x512", "headshot"),
                            "Final"=>true,
                        ],
                        "SenderAbsoluteUrl"=>"/users/$senderinfo->id/profile",
                        "IsReportAbuseDisplayed"=>True,
                        "AbuseReportAbsoluteUrl"=>"/abusereport/message?id=$message->id",
                        "Subject"=>$message->subject,
                        "Body"=>nl2br($message->body),
                        "IsRead"=>$isread,
                        "IsSystemMessage"=>$issystem,
                        "IsArchived"=>false,
                        "Created"=>gmdate("Y-m-d\TH:i:s\Z", $message->date),
                    ];
                }
                $response["TotalMessages"] = $msgcount;
                die(json_encode($response));
            case 1:
                $allmessages = $db->table("messages")->where("userfrom", $userinfo->id)->orderBy("date", "DESC")->get();
                $msgcount = count($allmessages);

                foreach ($allmessages as $message){
                    $isread = false;

                    if($message->hasread == 1){
                        $isread = true;
                    }

                    $senderinfo = $auth->getuserbyid($message->userfrom);
                    $recipientinfo = $auth->getuserbyid($message->userto);
                    $response["Collection"][] = [
                        "Id"=>$message->id,
                        "Sender"=>[
                            "UserId"=>$senderinfo->id,
                            "UserName"=>$senderinfo->username,
                        ],
                        "SenderThumbnail"=>[
                            "Url"=>$thumbs->get_user_thumb($senderinfo->id, "512x512", "headshot"),
                            "Final"=>true,
                        ],
                        "RecipientThumbnail"=>[
                            "Url"=>$thumbs->get_user_thumb($recipientinfo->id, "512x512", "headshot"),
                            "Final"=>true,
                        ],
                        "Recipient"=>[
                            "UserId"=>$recipientinfo->id,
                            "UserName"=>$recipientinfo->username,
                        ],
                        "SenderAbsoluteUrl"=>"/users/$senderinfo->id/profile",
                        "IsReportAbuseDisplayed"=>False,
                        "Subject"=>$message->subject,
                        "Body"=>nl2br($message->body),
                        "IsRead"=>$isread,
                        "IsSystemMessage"=>false,
                        "IsArchived"=>false,
                        "Created"=>gmdate("Y-m-d\TH:i:s\Z", $message->date),
                    ];
                }
                $response["TotalMessages"] = $msgcount;
                die(json_encode($response));

        }

    } else {
        http_response_code(400);
        die();
    }
});

$router->post('/api/friends/sendfriendrequest', function(){
    $auth = new authentication();
    global $currentuser;

    if($auth->hasaccount()){
        $friends = new friends();

        $post = file_get_contents('php://input');
        $decoded = json_decode($post);

        if($decoded){
            $targetUserID = $decoded->targetUserID;
            $currentuserid = $currentuser->id;

            //add_friend($to, $from)

            $result = $friends->add_friend($targetUserID, $currentuserid);

            if($result == 1){
                die('{"success":true}');
            } else {
                http_response_code(400);
                die('{"success":true}');
            }


        } else {
            http_response_code(400);
            die();
        }

    } else {
        http_response_code(401);
        die();
    }
});

$router->post('/api/friends/removefriend', function(){
    $auth = new authentication();

    global $currentuser;

    if($auth->hasaccount()){
        $friends = new friends();

        $post = file_get_contents('php://input');
        $decoded = json_decode($post);

        if($decoded){
            if(isset($decoded->targetUserID)){
                $targetUserID = $decoded->targetUserID;
                $currentuserid = $currentuser->id;

                global $db;

                $db->table("friends")->where("userid", $targetUserID)->where("friendid", $currentuserid)->delete();
                $db->table("friends")->where("friendid", $targetUserID)->where("userid", $currentuserid)->delete();
                die('{"success":true}');
            } else {
                http_response_code(400);
                die();
            }
        } else {
            http_response_code(400);
            die();
        }

    } else {
        http_response_code(401);
        die();
    }
});

$router->post('/api/friends/acceptfriendrequest', function(){
    $auth = new authentication();
    global $currentuser;

    if($auth->hasaccount()){
        global $db;
        $friends = new friends();

        $post = file_get_contents('php://input');
        $decoded = json_decode($post);

        if($decoded){
            if(isset($decoded->invitationID) && isset($decoded->targetUserID)){
                $invitationID = $decoded->invitationID;
                $targetUserID = $decoded->targetUserID;
                $currentuserid = $currentuser->id;

                $invitation = $db->table("friends")->where("id", $invitationID)->first();

                if($invitation !== null){
                    if($invitation->userid == $targetUserID){
                        if($invitation->friendid == $currentuserid){
                            $update = array(
                                "status"=>"accepted"
                            );
                            $db->table("friends")->where("userid", $targetUserID)->where("friendid", $currentuserid)->update($update);
                            die('{"success":true}');
                        } else {
                            http_response_code(400);
                            die();
                        }

                    } else {
                        http_response_code(400);
                        die();
                    }
                } else {
                    http_response_code(400);
                    die();
                }


            } else {
                http_response_code(400);
                die();
            }

        } else {
            http_response_code(400);
            die();
        }

    } else {
        http_response_code(401);
        die();
    }
});

$router->post('/api/v1/thumbnail-uploader', function(){

    global $db;
    global $currentuser;

    if(isset($_POST["type"]) && isset($_FILES["thumb"]) && isset($_POST["assetid"])){
        $type = $_POST["type"];
        $file = $_FILES["thumb"];
        $assetid = (int)$_POST["assetid"];

        if($type == "Thumbnail" || $type == "Icon"){
           
        } else {
             die("It can be only thumbnail <b>or</b> icon." . $type);
        }

        $md5 = md5_file($_FILES["thumb"]["tmp_name"]);
        global $s3_client;
        try {
            $s3_client->putObject([
                'Bucket' => $_ENV["R2_BUCKET"],
                'Key' => $md5,
                'SourceFile' => $_FILES["thumb"]["tmp_name"]
            ]);
        } catch (Exception $e){
            die("Failed to upload thumbnail! $e");
        }

        $insert = [
            "dimensions"=>"",
            "assetid"=>$assetid,
            "mode"=>$type,
            "file"=>$md5
        ];
        $db->table("thumbnails")->insert($insert);
        die("Thumbnail uploaded.");
    }
});

$router->get('/notifications/api/get-notifications', function(){
    header("Content-type: application/json");
    echo file_get_contents("../storage/faked.json");
    die();
});

$router->get('/users/friends/list-json', function(){

    header("Content-type: application/json");
    $auth = new authentication();
    $thumbs = new thumbnails();
    $friends = new friends();

    if($auth->hasaccount()){
        if(isset($_GET["userId"]) && isset($_GET["friendsType"])){

            $userid = (int)$_GET["userId"];
            $type = $_GET["friendsType"];

            $response = array(
                "UserId"=>$userid,
                "TotalFriends"=>0,
                "CurrentPage"=>1,
                "PageSize"=>18,
                "FriendsType"=>$type,
                "Friends"=>[],
            );

            
            
            switch ($type) {
                case "AllFriends":
                    $allfriends = $friends->get_friends($userid);
                    
                    foreach ($allfriends as $friend){
                        $is_ingame = $auth->is_ingame($friend->id);
                        $is_online = false;

                        if($is_ingame !== true){
                            $is_online ==$auth->is_online($friend->id);
                        }

                        $response["Friends"][] = [
                            "UserId" => $friend->id,
                            "AbsoluteURL" => "/users/$friend->id/profile/",
                            "Username" => $friend->username,
                            "AvatarUri" => $thumbs->get_user_thumb($friend->id, "512x512", "headshot"),
                            "AvatarFinal" => true,
                            "OnlineStatus" => [
                                "LocationOrLastSeen" => "Website",
                                "ImageUrl" => "~/images/online.png",
                                "AlternateText" => $friend->username . " is online."
                            ],
                            "Thumbnail" => [
                                "Final" => true,
                                "Url" => "https://watrbx.wtf/images/defaultimage.png",
                                "RetryUrl" => null
                            ],
                            "InvitationId" => 0,
                            "LastLocation" => "",
                            "PlaceId" => null,
                            "AbsolutePlaceURL" => null,
                            "IsOnline" => $is_online,
                            "InGame" => $is_ingame,
                            "InStudio" => false,
                            "ItemVisible" => false,
                            "FriendshipStatus" => 2,
                        ];
                    }
                    $response["TotalFriends"] = count($allfriends);
                    die(json_encode($response));
                    break;

                case "FriendRequests":
                    $allrequests = $friends->get_requests($userid);
                    foreach ($allrequests as $friend){
                        $is_ingame = $auth->is_ingame($friend->user_id);
                        $is_online = false;

                        if($is_ingame !== true){
                            $is_online ==$auth->is_online($friend->user_id);
                        }
                        $response["Friends"][] = [
                            "UserId" => $friend->user_id,
                            "AbsoluteURL" => "/users/$friend->user_id/profile/",
                            "Username" => $friend->username,
                            "AvatarUri" => $thumbs->get_user_thumb($friend->user_id, "512x512", "headshot"),
                            "AvatarFinal" => true,
                            "OnlineStatus" => [
                                "LocationOrLastSeen" => "Website",
                                "ImageUrl" => "~/images/online.png",
                                "AlternateText" => $friend->username . " is online."
                            ],
                            "Thumbnail" => [
                                "Final" => true,
                                "Url" => $thumbs->get_user_thumb($friend->user_id   , "512x512", "headshot"),
                                "RetryUrl" => null
                            ],
                            "incomingfriendrequestid" => $friend->invitation_id,
                            "invitationID"=>$friend->invitation_id,
                            "LastLocation" => "",
                            "PlaceId" => null,
                            "AbsolutePlaceURL" => null,
                            "IsOnline" => $is_online,
                            "InGame" => $is_ingame,
                            "InStudio" => false,
                            "ItemVisible" => true,
                            "FriendshipStatus" => 0,
                        ];
                    }
                    $response["TotalFriends"] = count($allrequests);
                    die(json_encode($response));
                    break;
            }
        }
        
    } else {
        
    }

    die('{"UserId":1,"TotalFriends":0,"CurrentPage":0,"PageSize":0,"TotalPages":0,"FriendsType":"AllFriends","Friends":[]}');
});

$router->get('/catalog/contents', function(){
    require("../storage/catalog.php");
    die();
});

$router->get('/messages/api/get-my-unread-messages-count', function(){
    header("Content-type: application/json");
    global $db;

    $auth = new authentication();

    global $currentuser;

    if($auth->hasaccount()){
        $userinfo = $currentuser;
        $count = $db->table("messages")->where("userto", $userinfo->id)->where("hasread", 0)->count();

        $thing = array(
            "count"=>$count
        );

        die(json_encode($thing));
    } else {
        die('{"count":0}');
    }

    
});



$router->get('/presence/users', function() {
    header("Content-type: application/jsom");
    json_encode(array());
    die();
});

$router->post('/game-instances/shutdown', function(){
    global $db;
    $auth = new authentication();
    $gameserver = new gameserver();

    if(isset($_POST["placeId"]) && isset($_POST["gameId"]) && $auth->hasaccount()){
        $placeid = $_POST["placeId"];
        $jobid = $_POST["gameId"];

        global $currentuser;

        $userinfo = $currentuser; // TODO: Check for group access as well ( Implement $auth->hasperm($userid, $assetid) )
        $assetinfo = $db->table("assets")->where("id", $placeid)->first();


        if($userinfo->id == $assetinfo->owner){
            if($gameserver->end_job($jobid)){
                die(create_success("Game shutdown requested.", '', 200));
            } else {
                die(create_error("Failed to shutdown game!", '', 500));
            }
        } else {
            die(create_error("You don't have the authorization to do this!", '', 403));
        }

    } else {
        die(create_error("You're not authenticated or something wasn't posted!", '', 400));
    }
});

$router->get('/api/v1/all-gameservers', function(){
    $gs = new gameserver();
    $allgameservers = $gs->get_gameservers();
    header("Content-type: application/json");
    
    if($allgameservers == null){
        die(create_error("Failed to get gameservers!", "", 500));
    } else {
        die(json_encode($allgameservers));
    }
});

$router->get('/games/getgameinstancesjson', function() {
    header("Content-type: Application/json");
    // stolen afterworld response
    //die('{"PlaceId":1,"ShowShutdownAllButton":true,"Collection":[{"Capacity":50,"ShowSlowGameMessage":false,"Guid":"17be-fb-ff-40-1efc148","PlaceId":1,"CurrentPlayers":[{"Id":290,"Username":"p2p","Thumbnail":{"rowId":0,"rowHash":null,"rowTypeId":0,"Url":"http:\/\/www.aftwld.xyz\/Thumbs\/Avatar.ashx?userId=128&x=75&y=75","IsFinal":true}}],"UserCanJoin":false,"ShowShutdownButton":true,"JoinScript":"Roblox.GameLauncher.joinGameInstance(1, \'17be-fb-ff-40-1efc148\');"}],"TotalCollectionSize":1}'); 
    if(isset($_GET["placeId"])){
        $placeid = (int)$_GET["placeId"];
        $auth = new authentication();
        $thumbs = new thumbnails();

        global $db;
        $allservers = $db->table("game_instances")->where("placeid", $placeid)->get();

        $json = array(
            "PlaceId" => "$placeid",
            "ShowShutdownAllButton" => true,
            "Collection" => array(),
            "TotalCollectionSize" => 0
        );

        foreach($allservers as $server){

            $playerlist = array();
            $allplayers = $db->table("activeplayers")->where("jobid", $server->serverguid)->where("placeid", $server->placeid)->get();

            $playerList = array();

            foreach ($allplayers as $playerthing) {
                $userinfo = $auth->getuserbyid($playerthing->userid);
                $playerList[] = array(
                    "Id" => $userinfo->id,
                    "Username" => $userinfo->username,
                    "Thumbnail" => array(
                        "rowId" => 0,
                        "rowHash" => null,
                        "rowTypeId" => 0,
                        "Url" => $thumbs->get_user_thumb($userinfo->id, "85x85", "full"),
                        "IsFinal" => false
                    )
                );
            }

            $json['Collection'][] = array(
                "Capacity"=>10,
                "ShowSlowGameMessage"=>false,
                "Guid"=>$server->serverguid,
                "PlaceId"=>$server->placeid,
                "CurrentPlayers"=>$playerList,
                "UserCanJoin"=>true,
                "ShowShutdownButton"=>false,
                "JoinScript"=>"",
            );
        }

        $json['TotalCollectionSize'] = count($json['Collection']);

        die(json_encode($json));
    }

});

$router->post('/voting/vote', function(){
    header("Content-type: application/json");

    global $db;

    $auth = new authentication();

    if(isset($_GET["assetId"]) && isset($_GET["vote"])){

        global $currentuser;

        $assetid = $_GET["assetId"];
        $vote = $_GET["vote"];

        $response = [
            "Success" => true,
            "Model" => [
                "UpVotes" => null,
                "DownVotes" => null,
                "UserVote" => null
            ]
        ];
            
        if($auth->hasaccount()){
            $userinfo = $currentuser;
            
            if($vote == "null"){
                $db->table("likes")->where("assetid", $assetid)->where("user", $userinfo->id)->delete();

                $upvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 1)->count();
                $downvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 0)->count();
                
                $response["Model"]["UpVotes"] = $upvotes;
                $response["Model"]["DownVotes"] = $downvotes;
                $response["Model"]["UserVote"] = null;

                die(json_encode($response));
            } else {
                $vote = filter_var($_GET['vote'] ?? null, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

                $hasvoted = $db->table("likes")->where("user", $userinfo->id)->where("assetid", $assetid)->first();

                if($hasvoted !== null){
                    if($hasvoted->vote == $vote){
                        $upvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 1)->count();
                        $downvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 0)->count();

                        $response["Model"]["UpVotes"] = $upvotes;
                        $response["Model"]["DownVotes"] = $downvotes;
                        $response["Model"]["UserVote"] = $vote;

                        die(json_encode($response));
                    } else {
                        $update = array(
                            "vote"=>$vote
                        );

                        $db->table("likes")->where("assetid", $assetid)->where("user", $userinfo->id)->update($update);

                        $upvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 1)->count();
                        $downvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 0)->count();

                        $response["Model"]["UpVotes"] = $upvotes;
                        $response["Model"]["DownVotes"] = $downvotes;
                        $response["Model"]["UserVote"] = $vote;

                        die(json_encode($response));

                    }
                }

                $insert = array(
                    "assetid"=>$assetid,
                    "vote"=>$vote,
                    "user"=>$userinfo->id
                );

                $db->table("likes")->insert($insert);

                $upvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 1)->count();
                $downvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 0)->count();

                $response["Model"]["UpVotes"] = $upvotes;
                $response["Model"]["DownVotes"] = $downvotes;
                $response["Model"]["UserVote"] = $vote;

                die(json_encode($response));
            }
        }

    } else {
        $error_array = array(
            "Success"=>false,
            "ModalType"=>"login"
        );

        die(json_encode($error_array));
    }
});

$router->get('/private-server/instance-list-json', function() {
    header("Content-type: Application/json");

    $instances = array(
        [
            "Name"=>"Test Server",
            "PlaceId"=>2,
            "PlaceCapacity"=>20,
            "PrivateServer" => array(
                "Id"=>67,
                "UniverseId"=>999999,
                "StatusType"=>1,
                "OwnerUserId"=>2
            ),
            "PrivateServerOwnerName"=>"watrabi",
            "DoesBelongToUser"=>true,
            "UserCanConfigure"=>true,
            "UserCanShutdown"=>true,
            "JoinScript"=>"code",
            "IsPrivateServerSubscriptionActive"=>true,
            "CanRenew"=>true,
            "MostRecentPrivateServerStatusChangeReasonType"=>0
        ]
    );

    $priavte = array(
        "Instances"=>$instances,
        "CurrentPage"=>1,
        "TotalPages"=>1,
    );

    die(json_encode($priavte));

    //die('{"Instances": [], "CurrentPage": 1, "TotalPages": 0 }'); 
});

$router->get('/game/getauthticket', function() {
   die($_COOKIE["_ROBLOSECURITY"]); 
});

$router->post('/client-status/set', function(){
    
});

$router->post('/AbuseReport/InGameChatHandler.ashx', function(){
    die();
    $post = file_get_contents('php://input');

    if(!empty($post)){

        $xml = simplexml_load_string($post);

        if($xml !== false){

            $report = [
                'reportinguser' => $xml['userID'],
                'placeid' => $xml['placeID'],
                'comment' => $xml->comment,
                'messages' => []
            ];

            $allmessages = [];

            foreach ($xml->messages->message as $message) {
                $allmessages[] = [
                    'userID' => (string) $message['userID'],
                    'guid' => (string) $message['guid'],
                    'text' => (string) $message
                ];
            }

            $report["messages"] = json_encode($allmessages);

            global $db;

            $db->table("abuse-reports")->insert($report);
            $log = new discord();
            $log->set_webhook_url($_ENV["MODERATION_WEB_HOOK"]);
            $auth = new authentication;
            $reportinguser = $auth->getuserbyid($xml['userID']);

            $exploded = explode(";", $xml->comment);

            $log->abuse_report($reportinguser->username . " has made an abuse report!\n\n".$exploded[0]."\nPlaceID: ".$xml['placeID']."\nRule Broken: ".$exploded[1]."\nAdditional Details: ".$exploded[2]."");
            die();
        } else {
            http_response_code(400);
            die();
        }

    }

});




$router->get('/marketplace/productDetails', function(){

    header("Content-type: application/json");
    
    if(isset($_GET["productId"])){
        $auth = new authentication();
        $assetid = (int)$_GET["productId"];
        
        $productinfo = [
            "TargetId" => $assetid,
            "ProductType" => "User Product",
            "AssetId" => $assetid,
            "ProductId" => $assetid,
            "Name" => "Unknown Asset",
            "Description"=>"This is a discription.",
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
            "PriceInRobux" => 0,
            "PriceInTickets" => 0,
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
        die(file_get_contents("https://economy.ttblox.mom/v2/assets/$assetid/details"));
        
    }
});

$router->post('/Game/PlaceLauncher.ashx', function() {
    header("Content-type: application/json");
   $placelauncher = array(
        "jobid"=>"null",
        "status"=>0,
        "joinScriptUrl"=>"null",
        "authenticationUrl"=>"http://www.watrbx.wtf/Login/Negotiate.ashx",
        "authenticationTicket"=>"null",
        "message"=>"Hi!"
    ); 
    
    //$placelauncher["jobid"] = "Test";
    //$placelauncher["status"] = 2;
    //$placelauncher["joinScriptUrl"] = "http://www.watrbx.wtf/Game/Join.ashx?user=watrabi&ip=127.0.0.1&id=420&port=7894&capp=1&mship=BuildersClub&PlaceId=1";
    
    $gameserver = new gameserver();

    global $db;

    if(!$gameserver->get_closest_server()){
        http_response_code(503);
        $placelauncher["status"] = -1;
    }else {
        if(isset($_GET["placeId"])){
            global $db;
            $auth = new authentication();

            if($auth->hasaccount()){

                $placeid = (int)$_GET["placeId"];

                $gameinstance = $db->table("game_instances")->where("placeid", $placeid)->first();

                if($gameinstance !== null){

                    $func = new sitefunctions();
                    $placelauncher["status"] = 2;

                    $jobid = $gameinstance->serverguid;

                    $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();
                    $server_info = $db->table("servers")->where("server_id", $jobinfo->server)->first();

                    $port = $jobinfo->port;
                    $ip = $server_info->ip;
                    $joincode = $func->genstring(25);

                    $joinarray = array(
                        "code"=>$joincode,
                        "ip"=>$ip,
                        "port"=>$port,
                        "jobid"=>$jobid,
                        "placeid"=>$placeid
                    );
                    
                    $db->table("join_codes")->insert($joinarray);

                    $placelauncher["jobid"] = $jobid;

                    $placelauncher["joinScriptUrl"] = "http://www.watrbx.wtf/Game/Join.ashx?joincode=" . $joincode;
                    
                } else {

                    $job = $db->table("jobs")->where("assetid", $placeid)->where("type", 1)->first();

                    if($job !== null){
                        //$gameserver->request_game($placeid);
                        $placelauncher["status"] = 1;
                    } else {
                        if($gameserver->request_game($placeid) !== false){
                                $placelauncher["status"] = 0;
                            } else {
                                var_dump($gameserver->request_game($placeid));
                            http_response_code(503);
                            $placelauncher["status"] = 0;
                            die("No gameservers available");
                        }
                        
                    } 
                }

            } else {
                $placelauncher["status"] = 12;
                http_response_code(401);
                die(json_encode($placelauncher));
            }
        } else {
            http_response_code(400);
            die(json_encode($placelauncher));
        }
    }

    die(json_encode($placelauncher));
});

$router->get('/Game/PlaceLauncher.ashx', function() {
    header("Content-type: application/json");
   $placelauncher = array(
        "jobid"=>"null",
        "status"=>0,
        "joinScriptUrl"=>"null",
        "authenticationUrl"=>"http://www.watrbx.wtf/Login/Negotiate.ashx",
        "authenticationTicket"=>"null",
        "message"=>"Hi!"
    ); 
    
    //$placelauncher["jobid"] = "Test";
    //$placelauncher["status"] = 2;
    //$placelauncher["joinScriptUrl"] = "http://www.watrbx.wtf/Game/Join.ashx?user=watrabi&ip=127.0.0.1&id=420&port=7894&capp=1&mship=BuildersClub&PlaceId=1";
    
    $gameserver = new gameserver();

    global $db;
    $request = "";

    if(!$gameserver->get_closest_server()){
        http_response_code(503);
        $placelauncher["status"] = -1;
    }else {
        if(isset($_GET["placeId"])){
            global $db;
            $auth = new authentication();

            if($auth->hasaccount()){

                $placeid = (int)$_GET["placeId"];

                if(isset($_GET["request"])){
                    $request = $_GET["request"];
                }

                $gameinstance = $db->table("game_instances")->where("placeid", $placeid)->first();

                if($gameinstance !== null){

                    $func = new sitefunctions();
                    $placelauncher["status"] = 2;

                    $jobid = $gameinstance->serverguid;

                    $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();
                    $server_info = $db->table("servers")->where("server_id", $jobinfo->server)->first();

                    $port = $jobinfo->port;
                    $ip = $server_info->ip;
                    $joincode = $func->genstring(25);

                    $joinarray = array(
                        "code"=>$joincode,
                        "ip"=>$ip,
                        "port"=>$port,
                        "jobid"=>$jobid,
                        "placeid"=>$placeid
                    );
                    
                    $db->table("join_codes")->insert($joinarray);

                    $placelauncher["jobid"] = $jobid;

                    $placelauncher["joinScriptUrl"] = "http://www.watrbx.wtf/Game/Join.ashx?joincode=" . $joincode;
                    
                } else {

                    $job = $db->table("jobs")->where("assetid", $placeid)->first();

                    if($job !== null){
                        //$gameserver->request_game($placeid);
                        $placelauncher["status"] = 1;
                    } else {
                        if($gameserver->request_game($placeid) !== false){
                                $placelauncher["status"] = 0;
                                $placelauncher["jobid"] = $job->jobid;
                            } else {
                            http_response_code(503);
                            $placelauncher["status"] = 0;
                            die(json_encode($placelauncher));
                            //die("No gameservers available");
                        }
                        
                    } 
                }

            } else {
                $placelauncher["status"] = 12;
                http_response_code(401);
                die(json_encode($placelauncher));
            }
        } else {
            http_response_code(400);
            die(json_encode($placelauncher));
        }
    }

    die(json_encode($placelauncher));
});

$router->get('/users/{id}', function($id){
    $id = (int)$id; // forcefulyl cast to int

    $auth = new authentication;
    $thumb = new thumbnails;
    global $currentuser;

    

    $returnarray = [
        "Id"=> 1,
        "Username"=> "ROBLOX",
        "AvatarUri"=> null,
        "AvatarFinal"=> false,
        "IsOnline"=> false
    ];

     $userinfo = $auth->getuserbyid($id);

     if($userinfo !== null){
        $thumb = $thumb->get_user_thumb($userinfo->id, "250x250", "full");
        $returnarray["Id"] = $userinfo->id;
        $returnarray["Username"] = $userinfo->username;
        $returnarray["AvatarUri"] = $thumb;
        $returnarray["IsOnline"] = $auth->is_online($userinfo->id);
     } else {
        $userinfo = $auth->getuserbyid(2);
        $thumb = $thumb->get_user_thumb($userinfo->id, "250x250", "full");
        $returnarray["Id"] = $userinfo->id;
        $returnarray["Username"] = $userinfo->username;
        $returnarray["AvatarUri"] = $thumb;
        $returnarray["IsOnline"] = $auth->is_online($userinfo->id);
     }

     header("Content-type: application/json");
     die(json_encode($returnarray, JSON_UNESCAPED_SLASHES));


});

$router->get('/leaderboards/rank/json', function(){
    header("Content-type: application/json");
    die("[]");
});

$router->get('/Game/GamePass/GamePassHandler.ashx', function(){
    die("<Value Type=\"boolean\">true</Value> ");
});

$router->get('/ownership/hasAsset', function(){
    die("true");
});

$router->get('/ownership/hasasset', function(){
    die("true");
});

$router->get('/currency/balance', function(){
        header("Content-type: application/json");
        global $currentuser;

        $array = [
            "robux"=>$currentuser->robux,
            "tix"=>$currentuser->tix
        ];

        die(json_encode($array));
    
});

$router->get("/universes/{id}/cloudeditenabled", function(){
    header("Content-type: application/json");
    die(json_encode(["enabled"=>false]));
});

$router->get('/Game/Badge/HasBadge.ashx', function(){
    if(isset($_GET["UserID"]) && isset($_GET["BadgeID"])){
        $userid = (int)$_GET["UserID"];
        $badgeid = $_GET["BadgeID"];

        global $db;

        $badgeinfo = $db->table("assets")->where("id", $badgeid)->where("prodcategory", 21)->first();

        if($badgeinfo !== null){
            $isawarded = $db->table("awardedbadges")->where("badgeid", $badgeid)->where("userid", $userid);

            if($isawarded !== null){
                die("1");
            } else {
                die("0");
            }

        } else {
            http_response_code(404);
            die("");
        }

    }
});

$router->get('/Game/Badge/IsBadgeDisabled.ashx', function(){
    if(isset($_GET["BadgeID"]) && isset($_GET["PlaceID"])){
        $placeid = (int)$_GET["PlaceID"];
        $badgeid = $_GET["BadgeID"];

        global $db;

        $badgeinfo = $db->table("assets")->where("id", $badgeid)->where("prodcategory", 21)->first();

        if($badgeinfo !== null){
           die("0");
        } else {
            die("1");
        }

    }
});

$router->post('/Game/Badge/AwardBadge.ashx', function(){
    if(isset($_GET["BadgeID"]) && isset($_GET["UserID"])){
        $userid = (int)$_GET["UserID"];
        $badgeid = $_GET["BadgeID"];

        global $db;

        $badgeinfo = $db->table("assets")->where("id", $badgeid)->where("prodcategory", 21)->first();

        if($badgeinfo !== null){
           $alreadyhas = $db->table("awardedbadges")->where("badgeid", $badgeid)->where("userid", $userid);
           if($alreadyhas == null){
                die("1");
           } else {
                die("0");
           }
        } else {
            die("1");
        }

    }
});


$router->get('/points/get-point-balance', function(){
    if(isset($_GET["placeId"]) && isset($_GET["userId"])){
        $placeid = (int)$_GET["placeId"];
        $userid = (int)$_GET["userId"];

        $currentbalance = $db->table("playerpoints")->where("userid", $userid)->where("placeid", $placeid)->first();

        $array = [
            "userId"=>$userid,
            "pointBalance"=>0
        ];

        if($currentbalance == null){
            die(json_encode($array));
        }else {
            $array["pointBalance"] == $currentbalance->balance;
            die(json_encode($array));
        }

        die(json_encode($array));

    } else {
        die(create_error("Missing Input"));
    }
});

$router->post('/points/award-points', function(){
    if(isset($_GET["placeId"]) && isset($_GET["userId"]) && isset($_GET["amount"])){
        $placeid = (int)$_GET["placeId"];
        $userid = (int)$_GET["userId"];
        $amount = (int)$_GET["amount"];

        if($userid <= 0){
            die(create_error("userid has to be more than 1"));
        }

        global $db;

        $currentbalance = $db->table("playerpoints")->where("userid", $userid)->where("placeid", $placeid)->first();

        if($currentbalance == null){
            $insert = [
                "userid"=>$userid,
                "balance"=>$amount,
                "placeid"=>$placeid
            ];

            $db->table("playerpoints")->insert($insert);

            $returnjson = [
                "success"=>true,
                "userId"=>$userid,
                "userGameBalance"=>$amount,
                "userBalance"=>$amount,
                "pointsAwarded"=>$amount
            ];

            die(json_encode($returnjson));
        } else {
            $newamount = $currentbalance->balance + $amount;
            $returnjson = [
                "success"=>true,
                "userId"=>$userid,
                "userGameBalance"=>$newamount,
                "userBalance"=>$newamount,
                "pointsAwarded"=>$amount
            ];

            $update = [
                "balance"=>$newamount
            ];

            $db->table("playerpoints")->where("userid", $userid)->where("placeid", $placeid)->update($update);
            die(json_encode($returnjson));
        }

    } else {
        die(create_error("Missing Input"));
    }
});

$router->get('/Game/LuaWebService/HandleSocialRequest.ashx', function(){
    die("<Error>Unknown method</Error>");
});

$router->get('/leaderboards/game/json', function(){
    header("Content-type: application/json");
    die('[]');
}); 

$router->get('/CharacterFetch.aspx', function(){

    $charapp = "";
    $placeid = 0;

    if(isset($_GET["placeid"])){
        $placeid = (int)$_GET["placeid"];
    }

    if(isset($_GET["Id"])){
        global $db;
        $id = (int)$_GET["Id"];

        $allitems = $db->table("wearingitems")->where("userid", $id)->get();

        if(!empty($allitems)){
            $charapp = "http://www.watrbx.wtf/Asset/BodyColors.ashx?Id=$id;";
        }

        foreach ($allitems as $item){
            $assetinfo = $db->table("assets")->where("id", $item->itemid)->first();

            //if($assetinfo !== null){
            //    if($assetinfo->prodcategory !== 19){
            //        $charapp .= "http://www.watrbx.wtf/asset/?id=". $item->itemid .";";
            //    }
            //}

            $charapp .= "http://www.watrbx.wtf/asset/?id=". $item->itemid .";";
            
            
        }
    }

    die($charapp);
});

$router->post('/api/v1/create-place', function(){
    
    $sitefunc = new sitefunctions();

    global $currentuser;
    global $db;

    if($currentuser == null){
        http_response_code(401);
        die("Unauthorized");
    }

    if(isset($_POST["title"]) && isset($_POST["info"])){
        $title = $_POST["title"];
        $description = $_POST["info"];

        $title = $sitefunc->filter_text($title);
        $description = $sitefunc->filter_text($description);

        $currenttime = time();

        $threemins = $currenttime - 60*3;

        $created = $db->table("assets")->where("owner", $currentuser->id)->where("updated", ">", $threemins)->count();

        if($created > 1){
            die("You are updating/creating places too quickly!");
        }

        $insert = array(
            "prodcategory"=>9,
            "name"=>$title,
            "description"=>$description,
            "robux"=>null,
            "tix"=>null,
            "fileid"=>"None",
            "created"=>time(),
            "updated"=>time(),
            "owner"=>$currentuser->id
        );

        $universeinsert = array(
            "title"=>$title,
            "description"=>$description,
            "owner"=>$currentuser->id,
            "assetid"=>0,
            "public"=>1
        );

        $assetinsertid = $db->table("assets")->insert($insert);

        $universeinsert["assetid"] = $assetinsertid;

        $db->table("universes")->insert($universeinsert);

        $page = new pagebuilder;
        $page::get_template("ide/createdplace", ["assetinsertid"=>$assetinsertid]);

    }
});

$router->get('/users/{$userid}/canmanage/{$assetid}', function($userid, $assetid){
    $userid = (int)$userid;
    $assetid = (int)$assetid;

    $return = [
        "Success"=>true,
        "CanManage"=>false
    ];

    global $db;

    $assetinfo = $db->table("assets")->where("id", $assetid)->first();

    if($assetinfo !== null){
        if($assetinfo->owner == $userid){
            $return["CanManage"] = true;
        }
    }

    die(json_encode($return));

});

$router->post('/api/v1/upload-place', function(){
    global $db;
    global $currentuser;
    global $s3_client;

    if($currentuser == null){
        http_response_code(401);
        die();
    }
    
    if(isset($_GET["placeId"])){
        $placeid = (int)$_GET["placeId"];

        $assetinfo = $db->table("assets")->where("id", $placeid)->first();

        if($assetinfo !== null){
            if($assetinfo->owner == $currentuser->id){
                $file = gzdecode(file_get_contents('php://input'));

                $md5 = md5($file);

                $s3_client->putObject([
                    'Bucket' => $_ENV["R2_BUCKET"],
                    'Key' => $md5,
                    'Body' => $file,
                ]);

                $update = [
                    "fileid"=>$md5,
                    "updated"=>time()
                ];

                $db->table("assets")->where("id", $placeid)->update($update);
                $db->table("thumbnails")->where("assetid", $placeid)->delete();

                die("Place Updated");

            } else {
                http_response_code(403);
            }
        } else {
            http_response_code(400);
            die();
        }
    } else {
        http_response_code(400);
    }
});

$router->get('/users/inventory/list-json', function(){
    header("Content-type: application/json");
    die(file_get_contents("../storage/thing.json"));
});

$router->get('/users/inventory/recommended-json', function(){
    header("Content-type: application/json");
    die(file_get_contents("../storage/recomended.json"));
});

$router->get('/Game/Join.ashx', function() {

    $auth = new authentication();
    $func = new sitefunctions();
    global $db;
    global $currentuser;
    
    if(isset($_GET["joincode"]) && $auth->hasaccount()){

        $code = $_GET["joincode"];
        $joincode = $db->table("join_codes")->where("code", $code)->first();

        $userinfo = $currentuser;

        $ip = $joincode->ip;
        if($ip == "192.168.1.221"){
            $ip = "70.228.127.12";
        }
        $port = $joincode->port;
        $pid = $joincode->placeid;
        $placeinfo = $db->table("assets")->where("id", $joincode->placeid)->first();
        $charappurl = "http://www.watrbx.wtf/CharacterFetch.aspx?Id=" . $currentuser->id . "&placeId=" . $pid;
        
        $clientticket = $func->generateClientTicket($currentuser->id, $currentuser->username,$charappurl, $joincode->jobid, file_get_contents("../storage/PrivateNut.pem"));

        header("Content-Type: application/json");
        // Construct joinscript
        $joinscript = [
            "ClientPort" => 0,
            "MachineAddress" => $ip,
            "ServerPort" => $port,
            "PingUrl" => "",
            "PingInterval" => 20,
            "UserName" => $userinfo->username,
            "SeleniumTestMode" => false,
            "UserId" => $userinfo->id,
            "SuperSafeChat" => true,
            "CharacterAppearance" => $charappurl,
            "ClientTicket" => $clientticket,
            "GameId" => $pid,
            "PlaceId" => $pid,
            "MeasurementUrl" => "", // No telemetry here :)
            "WaitingForCharacterGuid" => "26eb3e21-aa80-475b-a777-b43c3ea5f7d2",
            "BaseUrl" => "http://www.watrbx.wtf/",
            "ChatStyle" => "ClassicAndBubble",
            "VendorId" => "0",
            "ScreenShotInfo" => "",
            "VideoInfo" => "",
            "CreatorId" => $placeinfo->owner,
            "CreatorTypeEnum" => "User",
            "MembershipType" => "$userinfo->membership",
            "AccountAge" => "3000000",
            "CookieStoreFirstTimePlayKey" => "rbx_evt_ftp",
            "CookieStoreFiveMinutePlayKey" => "rbx_evt_fmp",
            "CookieStoreEnabled" => true,
            "IsRobloxPlace" => false,
            "GenerateTeleportJoin" => false,
            "IsUnknownOrUnder13" => false,
            "SessionId" => "39412c34-2f9b-436f-b19d-b8db90c2e186|00000000-0000-0000-0000-000000000000|0|190.23.103.228|8|2021-03-03T17:04:47+01:00|0|null|null",
            "DataCenterId" => 0,
            "UniverseId" => 3,
            "BrowserTrackerId" => 0,
            "UsePortraitMode" => false,
            "FollowUserId" => 1416,
            "characterAppearanceId" => 1
        ];

        // Encode it!
        $data = json_encode($joinscript, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);

        // Sign joinscript
        $signature = get_signature("\r\n" . $data);

        // exit
        exit("--rbxsig%". $signature . "%\r\n" . $data);
    } else {
        http_response_code(400);
        die();
    }
    
});

$router->get("/UserCheck/checkifinvalidusernameforsignup", function() {
    header("Content-type: application/json");
    
    // 0 = All Good
    // 1 = Already Taken
    // 2 = Can't Be Used
    // 3 + All Good
    
    if(isset($_GET["username"])){
        
        $sanitize = new sanitize;
        
        $username = $sanitize::get($_GET["username"]);
        
        $func = new sitefunctions();
        if($func::isbadtext($username)){
            echo json_encode(array("data"=>2));
            die();
        }

        global $db;
        $query = $db->table('users')->where('username', '=', $username);
        $row = $query->first();
    
        if($row == null){
            $data = 0;
        } else {
            $data = 1;
        }
        
        
        echo json_encode(array("data"=>$data));
    } else {
        echo json_encode(array("data"=>2));
    }
});

$router->post('/api/v1/login', function() {

    if($_ENV["CAN_LOGIN"] == "false"){
        die(create_error("Login is currently disabled."));
    }

    if(isset($_POST["username"]) && isset($_POST["password"]) || isset($_POST["Username"]) && isset($_POST["Password"])){
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
        } elseif(isset($_POST["Username"]) && isset($_POST["Password"])){
            $username = $_POST["Username"];
            $password = $_POST["Password"];
        } else {
            die(create_error("Something wasn't posted!"));
        }
        
        // why not just change the post values? 
        
        // I'm Crazy.
        
        $auth = new authentication();
        
        $result = $auth->login($username, $password);
        
        if(isset($result["code"])){
            if($result["code"] == 200){
                create_success("Succesfully Logged In!");
                header("Location: /home");
                die();
            } else {
                if(isset($result["message"])){
                    die(create_error($result["message"]));        
                } else {
                    die("Something went wrong.");
                }
            }
        } else {
            if(isset($result["message"])){
                die(create_error($result["message"]));        
            } else {
                die("Something went wrong.");
            }
        }
        
    } else {
        die(create_error("Something wasn't posted!"));
    }
});

$router->post('/api/v1/verify-captcha', function(){
    if(isset($_POST["captcha"])){
        
        $auth = new authentication();
        $func = new sitefunctions();
        $captchatoken = $_POST["captcha"];
        
        if($auth::verifycaptcha($captchatoken)){
            global $db;
            
            $ip = $func->getip(true);
            $token = $func->genstring(25);
            $expiration = time() + 8600;
            
            $insert = array(
                "token"=>$token,
                "time"=>$expiration,
                "ip"=>$ip
            );
            
            $db->table("captchaverified")->insert($insert);
            
            die(create_success("Captcha Verified!", array("token"=>$token)));
            
        } else {
            die(create_error("The captcha provided is invalid!"));
        }
        
    } else {
        die(create_error("No captcha was provided!"));
    }
});

$router->post('/Membership/NotApproved.aspx', function(){
    $auth = new authentication();
    global $currentuser;
    if(isset($_GET["ID"]) && $auth->hasaccount()){
        $banid = (int)$_GET["ID"];
        global $db;

        $baninfo = $db->table("moderation")->where("id", $banid)->first();

        if($baninfo !== null){
            $userinfo = $currentuser;
            if($baninfo->userid == $userinfo->id){
                if($baninfo->banneduntil < time()){
                    $db->table("moderation")->where("id", $baninfo->id)->update(array("canignore"=>1));
                    header("Location: /home");
                    die();
                } else {
                    header("Location: /home");
                    die();
                }
            } else {
                header("Location: /home");
                die();
            }
        } else {
            header("Location: /home");
            die();
        }

    } else {
        header("Location: /home");
        die();
    } 
});

$router->post('/api/v1/signup', function() {

    if($_ENV["CAN_REGISTER"] == "false"){
        http_response_code(403);
        header("Location: /Membership/CreationDisabled.aspx");
        die();
    }
    
    if(isset($_POST["username"]) && isset($_POST["password"])){
        
        global $db;
        
        // gender 0 = didn't specify
        // gender 1 = female
        // gender 2 = male
        
        $token = $_COOKIE["token"];
        $username = $_POST["username"];
        $pass = $_POST["password"];
        $gender = null;

        $func = new sitefunctions();
        if($func::isbadtext($username)){
            http_response_code(400);
            die("Username has innapropriate words in it.");
        }
        
        if(isset($_POST["gender"])){
            $gender = (int)$_POST["gender"];
        }
        
        $query = $db->table("captchaverified")->where("token", $token);
        $token = $query->first();
        
        if($token !== null){
            
            if(!$token->time < time()){
                $auth = new authentication();
                $result = $auth->createuser($username, $pass, $gender);
                
                if($result["code"] == 200){
                    die(create_success("Account Created!"));
                } else {
                    die(create_error($result["message"], "", $result["code"]));
                }
            } else {
                $db->table("captchaverified")->where("token", $token)->delete();
                die(create_error("Captcha session provided is invalid."));
            }
            
            
        } else {
            die(create_error("Captcha session provided is invalid."));
        }
        
    } else {
        die(create_error("Something wasn't provided."));
    }
    
});
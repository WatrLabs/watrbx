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
use asteroid\containers;

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
 
$router->get('/Login/Negotiate.ashx', function() {
    $auth = $_GET["suggest"] ?? 0;
    setcookie(".ROBLOSECURITY", $auth, time() + 8600, "/", ".watrbx.xyz");
    //setcookie(".ROBLOSECURITY", $session, $expiration, "/", ".watrbx.xyz");
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
    header("Content-type: application/json");
    die(file_get_contents("../storage/comments.json"));
});

$router->get('/avatar-thumbnail-3d/json', function(){
    // {"Url":"https://web.archive.org/web/20150801002803/http://t5.rbxcdn.com/682ceca48cd03e698aa5e0dc65c758b7","Final":true}

    header("Content-type: application/json");

    $json = array(
        "Url"=>"https://www.watrbx.xyz/avatar-thumbnail-3d/",
        "Final"=>true
    );

    die(json_encode($json));
});

$router->get('/thumbnail/resolve-hash/{the}', function($the){
    // {"Url":"https://web.archive.org/web/20150801002803/http://t5.rbxcdn.com/682ceca48cd03e698aa5e0dc65c758b7","Final":true}

    header("Content-type: application/json");

    $json = array(
        "Final"=>true,
        "Url"=>"https://www.watrbx.xyz/thumbnail/3dfiles/$the",
        "width"=>500,
        "height"=>500
    );

    die(json_encode($json));
});

$router->post('/api/item.ashx', function(){
    header("Content-type: application/json");
    global $db;
    $auth = new authentication();
    $catalog = new catalog();

    if($auth->hasaccount()){
        $success = false;
        $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);

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
                                            "shortfallPrice"=>$asset->robux = $userinfo->robux,
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
                                        "currentCurrency"=>1,
                                        "AssetID"=>$asset->id,
                                        "balanceAfterSale"=>$userinfo->tix - $asset->tix,
                                        "targetSelector"=> ".PurchaseButton[data-item-id='".$asset->id."']"
                                    );
                                    die(json_encode($pricechange));
                                } else {
                                    if($asset->robux > $userinfo->robux){
                                        http_response_code(500);
                                        $insufficient = array(
                                            "showDivId"=>"InsufficientFundsView",
                                            "shortfallPrice"=>$asset->tix = $userinfo->tix,
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
    $containers = new containers();
    $container = $_ENV["CONTAINERID"];
    $key = $_ENV["ASSETCONTAINERKEY"];
    if(isset($_GET["container"])){
        $container = $_GET["container"];
    }
    if(isset($_GET["key"])){
        $key = $_GET["key"];
    }
    $containerinfo = $containers->get_container_files($container, $key);

    $dataArray = (array) $containerinfo;

    echo "<table border='1' cellpadding='5'><tr><th>Key</th><th>Value</th></tr>";
    foreach ($dataArray as $key => $value) {
        echo "<tr><td>{$key}</td><td>" . (is_array($value) ? json_encode($value) : $value) . "</td></tr>";
    }
    echo "</table>";
});

$router->post('/api/v1/asset-upload', function(){

    $auth = new authentication();
    $containers = new containers();

    if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["product"]) && isset($_POST["robux"]) && isset($_POST["robux"]) && isset($_FILES["asset"]) && $auth->hasaccount()){

        $md5 = md5_file($_FILES["asset"]["tmp_name"]);
        global $db;

        $title = htmlspecialchars($_POST["title"]);
        $description = htmlspecialchars($_POST["description"]);
        $robux = (int)$_POST["robux"];
        $tix = (int)$_POST["tix"];
        $prodcategory = $_POST["product"];

        $asset = $db->table("assets")->where("fileid", $md5)->first();

        if($asset == null){

            $info = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);

            $insert = array(
                "prodcategory"=>$prodcategory,
                "name"=>$title,
                "description"=>$description,
                "robux"=>$robux,
                "tix"=>$robux,
                "fileid"=>$md5,
                "created"=>time(),
                "updated"=>time(),
                "owner"=>$info->id
            );

            try {
                $response = $containers->upload_file($_FILES["asset"]["tmp_name"], '', $md5,'');

                if($response !== false){
                    if(isset($response->success)){
                        if($response->success == true){
                            $insertid = $db->table("assets")->insert($insert);
                            die("Asset uploaded with asset id: " . $insertid);
                        } else {
                            die("Failed to upload asset!");
                        }
                    }
                } else {
                    die("Failed to upload asset!");
                }

            } catch(ErrorException $e){
                die("Failed to upload asset! $e");
            }

        } else {
            die("Asset already exists with ID: " . $asset->id);
        }

    } else {
        die("Something was empty.");
    }
});

$router->post('/home/updatestatus', function(){
    $auth = new authentication();
    if(isset($_POST["status"]) && $auth->hasaccount()){
        global $db;
        $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);

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
    die('{"isMod":true,"totalCount":2,"data":[{"ID":1,"Date":"1 day","Author":"watrabi","AuthorID":2,"Content":"nice model","AuthorOwnsAsset":true},{"ID":1,"Date":"1 day","Author":"shedletsky","AuthorID":3,"Content":"im too poor","AuthorOwnsAsset":false}]}');
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

$router->post('/api/v1/cdn-upload', function () {
    $auth = new authentication();
    if (!$auth->hasaccount()) {
        http_response_code(401);
        die("Unauthorized.");
    }

    if (isset($_POST["path"], $_FILES["file"])) {
        $containers = new containers();

        $filename = basename($_FILES["file"]["name"]);
        $filepath = $_POST["path"] . $filename;

        $allowedMimeTypes = ['application/xml', 'application/octet-stream'];
        $maxFileSize = 10 * 1024 * 1024;

        if (!in_array($_FILES["file"]["type"], $allowedMimeTypes)) {
            die("File type not allowed.");
        }

        if ($_FILES["file"]["size"] > $maxFileSize) {
            die("File too large.");
        }

        $safeFilename = preg_replace("/[^a-zA-Z0-9\._-]/", "", $filename);

        $response = $containers->upload_file(
            $_FILES["file"]["tmp_name"],
            '',
            $safeFilename,
            '',
            ''
        );

        if ($response !== false) {
            if (isset($response->error)) {
                die("Upload error: " . htmlspecialchars($response->error));
            } else {
                die("Uploaded at path: " . htmlspecialchars($filepath));
            }
        } else {
            die("Failed to upload file.");
        }
    } else {
        die("Missing required fields.");
    }
});

$router->post('/api/v1/universe-creator', function(){

    $auth = new authentication();
    $containers = new containers();

    if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_FILES["asset"]) && $auth->hasaccount()){

        $md5 = md5_file($_FILES["asset"]["tmp_name"]);
        global $db;

        $title = htmlspecialchars($_POST["title"]);
        $description = htmlspecialchars($_POST["description"]);
        $prodcategory = 9;

        $asset = $db->table("assets")->where("fileid", $md5)->first();
        $info = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);
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

        if($asset == null){
            try {
                $response = $containers->upload_file($_FILES["asset"]["tmp_name"], '', $md5, '');

                if($response !== false){
                    if(isset($response->error)){
                        die($response->error);
                    } else {
                        $insertid = $db->table("assets")->insert($assetinsert);
                        $universeinsert["assetid"] = $insertid;
                        $universeid = $db->table("universes")->insert($universeinsert);
                        header("Location: /games/$universeid/$slug");
                        die();
                    }
                } else {
                    die("Failed to create universe!");
                }

            } catch(ErrorException $e){
                die("Failed to create universe $e");
            }

        } else {
            $insertid = $db->table("assets")->insert($assetinsert);
            $universeinsert["assetid"] = $insertid;
            $universeid = $db->table("universes")->insert($universeinsert);
            header("Location: /games/$universeid/$slug");
            die();
        }

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
    global $db;

    if(isset($_GET["messageTab"]) && isset($_GET["pageNumber"]) && isset($_GET["pageSize"]) && $auth->hasaccount()){
        $messagetab = (int)$_GET["messageTab"];
        $pagenum = (int)$_GET["pageNumber"];
        $pagesize = (int)$_GET["pageSize"];

        $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);
        switch ($messagetab){
            case 0:
                $allmessages = $db->table("messages")->where("userto", $userinfo->id)->orderBy("date", "DESC")->get();
                $msgcount = count($allmessages);

                foreach ($allmessages as $message){
                    $isread = false;

                    if($message->hasread == 1){
                        $isread = true;
                    }

                    $senderinfo = $auth->getuserbyid($message->userfrom);
                    $response["Collection"][] = [
                        "Id"=>$message->id,
                        "Sender"=>[
                            "UserId"=>$senderinfo->id,
                            "UserName"=>$senderinfo->username,
                        ],
                        "SenderThumbnail"=>[
                            "Url"=>"/images/defaultimage.png",
                            "Final"=>true,
                        ],
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
            case 1:
                $allmessages = $db->table("messages")->where("userfrom", $userinfo->id)->orderBy("date", "DESC")->get();
                $msgcount = count($allmessages);

                foreach ($allmessages as $message){
                    $isread = false;

                    if($message->hasread == 1){
                        $isread = true;
                    }

                    $senderinfo = $auth->getuserbyid($message->userfrom);
                    $response["Collection"][] = [
                        "id"=>$message->id,
                        "Sender"=>[
                            "UserId"=>$senderinfo->id,
                            "UserName"=>$senderinfo->username,
                        ],
                        "SenderThumbnail"=>[
                            "Url"=>"/images/defaultimage.png",
                            "Final"=>true,
                        ],
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

    if($auth->hasaccount()){
        $friends = new friends();

        $post = file_get_contents('php://input');
        $decoded = json_decode($post);

        if($decoded){
            $targetUserID = $decoded->targetUserID;
            $currentuserid = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"])->id;

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

    if($auth->hasaccount()){
        $friends = new friends();

        $post = file_get_contents('php://input');
        $decoded = json_decode($post);

        if($decoded){
            if(isset($decoded->targetUserID)){
                $targetUserID = $decoded->targetUserID;
                $currentuserid = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"])->id;

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

    if($auth->hasaccount()){
        global $db;
        $friends = new friends();

        $post = file_get_contents('php://input');
        $decoded = json_decode($post);

        if($decoded){
            if(isset($decoded->invitationID) && isset($decoded->targetUserID)){
                $invitationID = $decoded->invitationID;
                $targetUserID = $decoded->targetUserID;
                $currentuserid = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"])->id;

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


$router->get('/notifications/api/get-notifications', function(){
    header("Content-type: application/json");
    echo file_get_contents("../storage/faked.json");
    die();
});

$router->get('/users/friends/list-json', function(){

    header("Content-type: application/json");
    $auth = new authentication();
    $friends = new friends();

    if($auth->hasaccount()){
        if(isset($_GET["userId"]) && isset($_GET["friendsType"])){

            $userid = (int)$_GET["userId"];
            $type = $_GET["friendsType"];

            $response = array(
                "UserId"=>$userid,
                "TotalFriends"=>0,
                "CurrentPage"=>0,
                "PageSize"=>0,
                "FriendsType"=>$type,
                "Friends"=>[],
            );
            
            switch ($type) {
                case "AllFriends":
                    $allfriends = $friends->get_friends($userid);
                    foreach ($allfriends as $friend){
                        $response["Friends"][] = [
                            "UserId" => $friend->id,
                            "AbsoluteURL" => "/users/$friend->id/profile/",
                            "Username" => $friend->username,
                            "AvatarUri" => "https://watrbx.xyz/images/defaultimage.png",
                            "AvatarFinal" => true,
                            "OnlineStatus" => [
                                "LocationOrLastSeen" => "Website",
                                "ImageUrl" => "~/images/online.png",
                                "AlternateText" => $friend->username . " is online."
                            ],
                            "Thumbnail" => [
                                "Final" => true,
                                "Url" => "https://watrbx.xyz/images/defaultimage.png",
                                "RetryUrl" => null
                            ],
                            "InvitationId" => 0,
                            "LastLocation" => "",
                            "PlaceId" => null,
                            "AbsolutePlaceURL" => null,
                            "IsOnline" => true,
                            "InGame" => false,
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
                        $response["Friends"][] = [
                            "UserId" => $friend->user_id,
                            "AbsoluteURL" => "/users/$friend->user_id/profile/",
                            "Username" => $friend->username,
                            "AvatarUri" => "https://watrbx.xyz/images/defaultimage.png",
                            "AvatarFinal" => true,
                            "OnlineStatus" => [
                                "LocationOrLastSeen" => "Website",
                                "ImageUrl" => "~/images/online.png",
                                "AlternateText" => $friend->username . " is online."
                            ],
                            "Thumbnail" => [
                                "Final" => true,
                                "Url" => "https://watrbx.xyz/images/defaultimage.png",
                                "RetryUrl" => null
                            ],
                            "InvitationId" => $friend->invitation_id,
                            "LastLocation" => "",
                            "PlaceId" => null,
                            "AbsolutePlaceURL" => null,
                            "IsOnline" => true,
                            "InGame" => false,
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
    die(file_get_contents("../storage/library.html"));
});

$router->get('/messages/api/get-my-unread-messages-count', function(){
    header("Content-type: application/json");
    global $db;

    $auth = new authentication();

    if($auth->hasaccount()){
        $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);
        $count = $db->table("messages")->where("userto", $userinfo->id)->where("hasread", 0)->count();

        $thing = array(
            "count"=>$count
        );

        die(json_encode($thing));
    } else {
        die('{"count":0}');
    }

    
});

$router->get('/friends/list', function() {
    header("Content-type: application/jsom");
    die('{"UserId":25044220,"TotalFriends":55,"StartIndex":0,"PageSize":50,"TotalPages":2,"Friends":[{"Id":426672159,"Username":"Fluxta","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/426672159/profile"},{"Id":358014716,"Username":"Alathry","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/358014716/profile"},{"Id":109448917,"Username":"TheHero6965","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/109448917/profile"},{"Id":679992669,"Username":"JReaperzTTV","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/679992669/profile"},{"Id":322351834,"Username":"drdnhs","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/322351834/profile"},{"Id":676791560,"Username":"beardotheweirdz","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/676791560/profile"},{"Id":667131446,"Username":"HackManWatch","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/667131446/profile"},{"Id":263240293,"Username":"hamburgerdude0","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/263240293/profile"},{"Id":252740159,"Username":"Seb123rock","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/252740159/profile"},{"Id":24752210,"Username":"jadynashley","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/24752210/profile"},{"Id":59398409,"Username":"IIPastel_RoseII","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/59398409/profile"},{"Id":83290061,"Username":"yummypopcorn54321","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/83290061/profile"},{"Id":271208335,"Username":"SMOKERgramps","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/271208335/profile"},{"Id":209100560,"Username":"MelonMoose2","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/209100560/profile"},{"Id":67028283,"Username":"ImperialCarnage","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/67028283/profile"},{"Id":98099622,"Username":"JamProYT","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/98099622/profile"},{"Id":121165009,"Username":"TrustyXIV","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/121165009/profile"},{"Id":87501651,"Username":"CrazyJay07","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/87501651/profile"},{"Id":273218673,"Username":"comeatmebro1234510","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/273218673/profile"},{"Id":296037216,"Username":"africantomato","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/296037216/profile"},{"Id":102625626,"Username":"xTechComputerXTechyy","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/102625626/profile"},{"Id":42627082,"Username":"Mitchcactus","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/42627082/profile"},{"Id":107764294,"Username":"poncok","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/107764294/profile"},{"Id":73859257,"Username":"flopness","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/73859257/profile"},{"Id":38106669,"Username":"xxEmilyyx","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/38106669/profile"},{"Id":36677371,"Username":"Forgotten_Doodlez","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/36677371/profile"},{"Id":94203733,"Username":"Tamyaki","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/94203733/profile"},{"Id":45228602,"Username":"mamakse","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/45228602/profile"},{"Id":58017047,"Username":"foggy6699","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/58017047/profile"},{"Id":43948391,"Username":"qdav","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/43948391/profile"},{"Id":82148828,"Username":"kalil2908","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/82148828/profile"},{"Id":126876155,"Username":"Mediums","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/126876155/profile"},{"Id":8403307,"Username":"railworks2","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/8403307/profile"},{"Id":86922446,"Username":"xxSTARSxx123","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/86922446/profile"},{"Id":96627390,"Username":"Tonayee","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/96627390/profile"},{"Id":64433413,"Username":"truker8","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/64433413/profile"},{"Id":16928186,"Username":"HttpTrish","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/16928186/profile"},{"Id":5596064,"Username":"will_ie","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/5596064/profile"},{"Id":17505355,"Username":"fancysallyrocks","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/17505355/profile"},{"Id":97782784,"Username":"XFriez","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/97782784/profile"},{"Id":105311303,"Username":"ResetMyLife","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/105311303/profile"},{"Id":31074913,"Username":"CirthonBeans","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/31074913/profile"},{"Id":73306558,"Username":"i_CodexLaw","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/73306558/profile"},{"Id":29584378,"Username":"iiDev_Waffle","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/29584378/profile"},{"Id":55876546,"Username":"pranav119","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/55876546/profile"},{"Id":57747013,"Username":"kitty17music","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/57747013/profile"},{"Id":48405917,"Username":"GraphicsSettings","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/48405917/profile"},{"Id":97121949,"Username":"iiLizzieIsHereii","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/97121949/profile"},{"Id":76451709,"Username":"xX9maryse9Xx","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/76451709/profile"},{"Id":85250556,"Username":"robloxgirl213085","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/85250556/profile"}]}');
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

        $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]); // TODO: Check for group access as well ( Implement $auth->hasperm($userid, $assetid) )
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
                        "Url" => "http://www.watrbx.xyz/usersmall.png",
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
            $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);
            
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

$router->post('/Game/PlaceLauncher.ashx', function() {
    header("Content-type: application/json");
   $placelauncher = array(
        "jobid"=>"null",
        "status"=>0,
        "joinScriptUrl"=>"null",
        "authenticationUrl"=>"http://www.roblox.icu/Login/Negotiate.ashx",
        "authenticationTicket"=>"null",
        "message"=>"Hi!"
    ); 
    
    //$placelauncher["jobid"] = "Test";
    //$placelauncher["status"] = 2;
    //$placelauncher["joinScriptUrl"] = "http://www.watrbx.xyz/Game/Join.ashx?user=watrabi&ip=127.0.0.1&id=420&port=7894&capp=1&mship=BuildersClub&PlaceId=1";
    
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
                        "placeid"=>$placeid
                    );
                    
                    $db->table("join_codes")->insert($joinarray);

                    $placelauncher["jobid"] = $jobid;

                    $placelauncher["joinScriptUrl"] = "http://www.watrbx.xyz/Game/Join.ashx?joincode=" . $joincode;
                    
                } else {

                    $job = $db->table("jobs")->where("assetid", $placeid)->first();

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
        "authenticationUrl"=>"http://www.roblox.icu/Login/Negotiate.ashx",
        "authenticationTicket"=>"null",
        "message"=>"Hi!"
    ); 
    
    //$placelauncher["jobid"] = "Test";
    //$placelauncher["status"] = 2;
    //$placelauncher["joinScriptUrl"] = "http://www.watrbx.xyz/Game/Join.ashx?user=watrabi&ip=127.0.0.1&id=420&port=7894&capp=1&mship=BuildersClub&PlaceId=1";
    
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
                        "placeid"=>$placeid
                    );
                    
                    $db->table("join_codes")->insert($joinarray);

                    $placelauncher["jobid"] = $jobid;

                    $placelauncher["joinScriptUrl"] = "http://www.watrbx.xyz/Game/Join.ashx?joincode=" . $joincode;
                    
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
                                var_dump($gameserver->request_game($placeid));
                            http_response_code(503);
                            $placelauncher["status"] = 0;
                            $placelauncher["jobid"] = $job->jobid;
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

$router->get('/leaderboards/rank/json', function(){
    header("Content-type: application/json");
    die("[]");
});

$router->get('/leaderboards/game/json', function(){
    header("Content-type: application/json");
    die('[]');
}); 

$router->get('/Character.aspx', function(){
    if(isset($_GET["ID"])){
        if($_GET["ID"] == 2){
            die("http://www.watrbx.xyz/Asset/BodyColors.ashx?userid=1;http://www.watrbx.xyz/asset/?id=5;http://www.watrbx.xyz/asset/?id=7;http://www.watrbx.xyz/asset/?id=10;http://www.watrbx.xyz/asset/?id=25;");
        } else {
            die("http://www.watrbx.xyz/Asset/BodyColors.ashx?userid=1;http://www.watrbx.xyz/asset/?id=5;http://www.watrbx.xyz/asset/?id=7;http://www.watrbx.xyz/asset/?id=10;");
        }
    } else {
        die("http://www.watrbx.xyz/Asset/BodyColors.ashx?userid=1;http://www.watrbx.xyz/asset/?id=5;http://www.watrbx.xyz/asset/?id=7;http://www.watrbx.xyz/asset/?id=10;");
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
    global $db;
    
    if(isset($_GET["joincode"]) && $auth->hasaccount()){

        $code = $_GET["joincode"];
        $joincode = $db->table("join_codes")->where("code", $code)->first();

        $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);

        $ip = $joincode->ip;
        if($ip == "192.168.1.221"){
            $ip = "70.228.127.12";
        }
        $port = $joincode->port;
        $pid = $joincode->placeid;

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
            "SuperSafeChat" => false,
            "CharacterAppearance" => "https://www.watrbx.xyz/Character.aspx?ID=" . $userinfo->id,
            "ClientTicket" => "",
            "GameId" => $pid,
            "PlaceId" => $pid,
            "MeasurementUrl" => "", // No telemetry here :)
            "WaitingForCharacterGuid" => "26eb3e21-aa80-475b-a777-b43c3ea5f7d2",
            "BaseUrl" => "http://www.watrbx.xyz/",
            "ChatStyle" => "ClassicAndBubble",
            "VendorId" => "0",
            "ScreenShotInfo" => "",
            "VideoInfo" => "",
            "CreatorId" => "3333",
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
            "FollowUserId" => 0,
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
        
        
        echo json_encode(array("data"=>0));
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
    if(isset($_GET["ID"]) && $auth->hasaccount()){
        $banid = (int)$_GET["ID"];
        global $db;

        $baninfo = $db->table("moderation")->where("id", $banid)->first();

        if($baninfo !== null){
            $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);
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
        header("Location: /MEMBERSHIP/CREATIONDISABLED.aspx");
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

<?php
use watrlabs\router\Routing;
use watrlabs\authentication;
use watrlabs\watrkit\pagebuilder;
use watrbx\thumbnails;
use watrlabs\watrkit\sanitize;
use watrbx\sitefunctions;
use watrbx\RBX;
use watrbx\Grid\Grid;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get('/stats', function(){
    $page = new pagebuilder;
    $page::get_template("stats");
});

$router->get('/game/GetAllowedExperimentalFeatures', function(){
    die("{}");
});

// TODO: Make this less messier
$router->get('/marketplace/productinfo', function(){
    header("Content-type: application/json");

    ob_clean();

    if(isset($_GET["assetId"])){
        $auth = new authentication();
        $assetid = (int)$_GET["assetId"];
        /* 2025
        {"TargetId":1818,"ProductType":"User Product","AssetId":1818,"ProductId":1305046,"Name":"Classic: Crossroads","Description":"The classic ROBLOX level is back!","AssetTypeId":9,"Creator":{"Id":1,"Name":"Roblox","CreatorType":"User","CreatorTargetId":1,"HasVerifiedBadge":true},"IconImageAssetId":607948062,"Created":"2007-05-01T01:07:04.78Z","Updated":"2024-01-29T22:05:10.417Z","PriceInRobux":null,"PriceInTickets":null,"Sales":0,"IsNew":false,"IsForSale":false,"IsPublicDomain":false,"IsLimited":false,"IsLimitedUnique":false,"Remaining":null,"MinimumMembershipLevel":0,"ContentRatingTypeId":0,"SaleAvailabilityLocations":null,"SaleLocation":null,"CollectibleItemId":null,"CollectibleProductId":null,"CollectiblesItemDetails":null}
        */
        $productinfo = array(
            "Name" => "Unknown",
            "Description" => "[\r\n[52, 57, 57, 52, 56, 49, 57, 51],\r\n[50, 52, 57, 53, 55, 50, 55, 58],\r\n[56, 56, 52, 51, 52, 58, 57, 53],\r\n[52, 56, 54, 55, 53, 50, 52, 51],\r\n[52, 53, 58, 53, 55, 53, 54, 57],\r\n[55, 49, 51, 53, 51, 53, 57, 57],\r\n[54, 58, 57, 51, 58, 55, 54, 56],\r\n[53, 52, 51, 57, 51, 49, 50, 58]\r\n]",
            "Created" => "0",
            "Updated" => "0",
            "PriceInRobux" => 0,
            "PriceInTickets" => 0,
            "AssetId" => $assetid,
            "ProductId" => $assetid,
            "AssetTypeId" => 0,
            "Creator" => [
                "Id" => "0",
                "Name" => "Unknown",
                "CreatorType" => "User",
            ],
            "MinimumMembershipLevel" => 0,
            "IsForSale" => True,
        );

        global $db;
        $assetinfo = $db->table("assets")->where("id", $assetid)->first();

        if($assetinfo !== null){
            $creatorinfo = $auth->getuserbyid($assetinfo->owner);

            $productinfo["Name"] = $assetinfo->name;
            $productinfo["Description"] = $assetinfo->description;
            $productinfo["AssetTypeId"] = $assetinfo->prodcategory;
            $productinfo["Created"] = date('c', $assetinfo->created);
            $productinfo["Updated"] = date('c', $assetinfo->updated);
            $productinfo["PriceInRobux"] = $assetinfo->robux;
            $productinfo["PriceInTickets"] = $assetinfo->tix;

            $productinfo["Creator"]["Id"] = $creatorinfo->id;
            $productinfo["Creator"]["Name"] = $creatorinfo->username;
            $productinfo["Creator"]["CreatorType"] = "User";
        } else {
            try {
                die(file_get_contents("https://economy.ttblox.mom/v2/assets/$assetid/details"));
            } catch (ErrorException $e){
                die(json_encode($productinfo, JSON_UNESCAPED_SLASHES));
            }
        }

        http_response_code(200);
        die(json_encode($productinfo, JSON_UNESCAPED_SLASHES));

    } else {
        
        http_response_code(200);
        die(json_encode($productinfo, JSON_UNESCAPED_SLASHES));
        
    }
});

$router->get("/", function() {
    $page = new pagebuilder;
    if(isset($_COOKIE["has_read"])){
        $page::get_template("index");
    } else {
        $page::get_template("notrobloxindex");
    }
});

$router->get('/agree', function(){
    setcookie('has_read', 1, time() + 999999999, '', '.watrbx.wtf');
    header("Location: /");
});

$router->get("/temp/cdn-upload", function(){
    die();
    $page = new pagebuilder;
    $page::get_template("temp/cdn-upload");
});

$router->get("/temp/decal-creator", function(){
    $page = new pagebuilder;
    $page::get_template("temp/decal-creator");
});

$router->get('/messages/compose', function(){
    $page = new pagebuilder;
    $auth = new authentication;
    $auth->createcsrf("compose");
    $page::get_template("compose");
    
});

$router->get('/download/thankyou', function(){
    $page = new pagebuilder;
    $page::get_template("download/thankyou");
});

$router->get('/Thumbs/Asset.ashx', function(){

    $sitefunc = new sitefunctions();
    
    if(isset($_GET["AssetID"]) && isset($_GET["dimensions"])){

        $dimensions = $_GET["dimensions"];
        $assetid = (int)$_GET["AssetID"];

        $dimensions = explode("x", $dimensions);
        global $db;

        $thumb = $db->table("thumbnails")->where("assetid", $assetid)->first();

        if($thumb !== null && isset($dimensions[0]) && isset($dimensions[1])){
            $thumbs = new thumbnails();

            $x = (int)$dimensions[0];
            $y = (int)$dimensions[1];

            $thumb = $thumbs->get_asset_thumb($assetid, "1024x1024");

            $image = file_get_contents("https:" . $thumb);
            $tempDir = sys_get_temp_dir();
            $tempName = $sitefunc->genstring(5);

            $File = $tempDir . "/" . $tempName;
            
            file_put_contents($tempDir . "/" . $tempName, $image);

            header("Content-type: image/png");
            die($sitefunc->resize_image($File, $x, $y, true));
        } else {
            $url = "https://thumbnails.roblox.com/v1/assets?assetIds=$assetid&format=PNG&size=512x512";
            $robloxapi = file_get_contents($url);

            if($robloxapi){
                $decoded = json_decode($robloxapi, true);
                $robloxthumb = $decoded["data"][0]["imageUrl"];
                header("Location: $robloxthumb");
                die();
            } else {
                die($robloxapi);
            }
        }
    }

    echo "hi";
});


$router->post('/messages/compose', function(){
    if(isset($_POST["subject"]) && isset($_POST["body"]) && isset($_POST["__EVENTTARGET"])){
        $subject = $_POST["subject"];
        $body = $_POST["body"];
        $userid = $_POST["__EVENTTARGET"];

        $auth = new authentication();
        $func = new sitefunctions();
        $page = new pagebuilder;
        global $currentuser;


        if(isset($_COOKIE["csrftoken"])){
            if(!$auth->verifycsrf($_COOKIE["csrftoken"], "compose")){
                $page::get_template("compose", ["error"=>"An unexpected error occured!"]);
                die();
            }
        } else {
            $page::get_template("compose", ["error"=>"An unexpected error occured!"]);
            die();
        }

        $recipient = $auth->getuserbyid($userid);

        if($auth->hasaccount()){
            if($recipient !== null){

                global $db;

                

                $msgcount = $db->table("messages")->where("userfrom", $currentuser->id)->where("date", ">", time() - 60)->count();

                if($msgcount >= 3){
                    $page = new pagebuilder;
                    $page::get_template("compose", ["error"=>"You're sending messages too fast!"]);
                } else {
                    $subject = htmlspecialchars($subject, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $body = htmlspecialchars($body, ENT_QUOTES | ENT_HTML5, 'UTF-8');

                    $subject = $func::filter_text($subject);
                    $body = $func::filter_text($body);

                    $insert = array(
                        "userfrom"=>$currentuser->id,
                        "userto"=>$recipient->id,
                        "subject"=>$subject,
                        "body"=>$body,
                        "date"=>time()
                    );
                    $db->table("messages")->insert($insert);
                    $page = new pagebuilder;
                    $page::get_template("compose", ["success"=>"Message sent to " . $recipient->username . "!"]);
                }
                
            } else {
                $page = new pagebuilder;
                $page::get_template("compose", ["error"=>"Failed to send message."]);
            }
        } else {
            header("Location: /");
            die();
        }

    } else {
        $page = new pagebuilder;
        $page::get_template("compose", ["error"=>"Failed to send message. Are you sure you filled in everything?"]);
    }
});

$router->get("/users/{userid}/friends", function($userid) {
    $page = new pagebuilder;
    $page::get_template("user/friends", ["userid"=>$userid]);
});

$router->get("/Games.aspx", function(){
    header("Location: /games");
    die();
});

$router->get("/temp/create-asset", function(){
    $page = new pagebuilder;
    $page::get_template("temp/uploadasset");
});

$router->get("/temp/upload-thumbnail", function(){
    $page = new pagebuilder;
    $page::get_template("temp/upload-thumbnail");
});

$router->get("/temp/universe-creator", function(){
    $page = new pagebuilder;
    $page::get_template("temp/universe-creator");
});

$router->get("/users/{userid}/profile", function($userid) {
    $page = new pagebuilder;
    $page::get_template("user/profile", array("userid"=>$userid));
});

$router->get("/users/{userid}/inventory", function($userid) {
    $page = new pagebuilder;
    $page::get_template("user/inventory", ["userid"=>$userid]);
});

$router->get("/my/messages", function() {
    $page = new pagebuilder;
    $page::get_template("my/messages");
});

$router->get('/MEMBERSHIP/CREATIONDISABLED.aspx', function(){
    $page = new pagebuilder;
    $page::get_template("membership/creationdisabled");
});

$router->get('/Membership/NotApproved.aspx', function(){
    $page = new pagebuilder;
    $page::get_template("membership/notapproved");
});

$router->get('/{slug}-item', function($thing){
    $router = new Routing();

    if(isset($_GET["id"])){
        $id = (int)$_GET["id"];
        global $db;

        $asset = $db->table("assets")->where("id", $id)->first();

        if($asset !== null){
            $page = new pagebuilder;
            $page::get_template("item", array("asset"=>$asset));
        } else {
            die($router->return_status(404));
        }

    } else {
        die($router->return_status(404));
    }

});

$router->get('/Upgrades/BuildersClubMemberships.aspx', function() {
    $page = new pagebuilder;
    $page::get_template("bc");
});

$router->get("/games", function() {
    $page = new pagebuilder;
    $page::get_template("games");
});

$router->get('/newlogin', function() {
   $page = new pagebuilder;
   $page::get_template("login/newlogin");
});

$router->get('/login123', function() {
   $page = new pagebuilder;
   $page::get_template("login/newlogin");
});


$router->get("/catalog", function() {
   $page = new pagebuilder;
   $page::get_template("catalog");
});

$router->get("/catalogbrowse.aspx", function() {
   $page = new pagebuilder;
   $page::get_template("catalogbrowse");
});

$router->get("/catalog/browse.aspx", function() {
   $page = new pagebuilder;
   $page::get_template("catalogbrowse");
});

$router->get("/Login/iFrameLogin.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("login/iframelogin");
});

$router->get('/games/{id}/{urlfriendly}', function($id, $urlfriendly){
    $page = new pagebuilder;
    $page::get_template("universe", ["id"=>$id]);
});

$router->get("/upgrades/robux", function() {
    $page = new pagebuilder;
    $page::get_template("upgrades/robux");
});

$router->get("/develop", function() {
    $page = new pagebuilder;
    $page::get_template("develop");
});

$router->get("/games/moreresultscached", function() {
    $page = new pagebuilder;
    $page::get_template("results");
});

$router->get("/logout", function() {
    setcookie(".ROBLOSECURITY", "", time() - 9999999, "/", ".watrbx.wtf");
    header("Location: /newlogin");
});

$router->get("/home", function() {
    $page = new pagebuilder;
    $page::get_template("new_home");
});

$router->get("/UploadMedia/UploadVideo.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("UploadMedia/uploadvideo");
});

$router->get('/thumbnail/user-avatar', function(){ 
    http_response_code(500);
    die();
});

$router->get('/groupadmin', function(){ 
    $page = new pagebuilder;
    $page::get_template("groups/groupadmin");
});


$router->get('/EmailVerify.aspx', function(){

    $page = new pagebuilder;

    global $db;
    global $currentuser;
    
    if(isset($_GET["Ticket"])){
        $token = $_GET["Ticket"];

        $codeinfo = $db->table("email_codes")->where("code", $token)->first();

        if($codeinfo){
            if($codeinfo->userid == $currentuser->id){
                $update = [
                    "email_verified"=>1,
                ];

                $db->table("users")->where("id", $currentuser->id)->update($update);
                
                $hasitem = $db->table("ownedassets")->where("userid", $currentuser->id)->where("assetid", 554)->first();

                if($hasitem == null){
                    $insert = [
                        "userid"=>$currentuser->id,
                        "assetid"=>554,
                        "time"=>time()
                    ];

                    $db->table("ownedassets")->insert($insert);
                }

                $page::get_template("verifiedemail");
                die();
            }
        }

    }

    http_response_code(404);
    $page::get_template("status_codes/404");
});

$router->post("/my/account", function() {

    global $currentuser;
    global $db;
    $func = new sitefunctions();
    $page = new pagebuilder;
    $auth = new authentication();

    if(isset($_POST["PersonalBlurb"]) && $currentuser){

        $blurb = $_POST["PersonalBlurb"];
        $blurb =  $func::filter_text($blurb);
        $blurb = htmlspecialchars($blurb);

        $update = [
            "about"=>$blurb
        ];

        $db->table("users")->where("id", $currentuser->id)->update($update);
        $currentuser = $auth->getuserbyid($currentuser->id);

        
    }

    if(isset($_POST["currenttheme"]) && $currentuser){

        $newtheme = (int)$_POST["currenttheme"];

        $themes = new \watrbx\themes();
        $themeinfo = $themes->getThemeInfo($newtheme);

        $update = [
            "currenttheme"=>$newtheme
        ];

        if($themeinfo){
            $db->table("users")->where("id", $currentuser->id)->update($update);
        } else {
            $db->table("users")->where("id", $currentuser->id)->update(["currenttheme"=>NULL]);
        }

        $currentuser = $auth->getuserbyid($currentuser->id);
    }


    if(isset($blurb)){
        $page::get_template("my/account", ["newblurb"=>$blurb]);
    } else {
        $page::get_template("my/account");
    }

});

$router->get('/Help/Builderman.aspx', function(){
    
    $page = new pagebuilder;

    $fastflags = new fastflags();
    
    if($fastflags::get("RedirectHelpToSubdomain")){
        header('Location: https://help.watrbx.wtf');
        die();
    }
    
    http_response_code(404);
    $page::get_template("status_codes/404");
});

$router->get("/download", function() {
    $page = new pagebuilder;
    $page::get_template("download");
});

$router->get("/my/account", function() {
    $page = new pagebuilder;
    $page::get_template("my/account");
});

$router->get('/places/update', function(){
    $page = new pagebuilder;
    $page::get_template("places/update");
});

$router->get('/temp/shirt-uploader', function(){
    $page = new pagebuilder;
    $page::get_template("temp/shirt-creator");
});

$router->get('/temp/pants-uploader', function(){
    $page = new pagebuilder;
    $page::get_template("temp/pants-uploader");
});

$router->get('/places/create', function(){
    $page = new pagebuilder;
    $page::get_template("places/create");
});

$router->get('/login/Default.aspx', function(){
    header("Location: /newlogin");
    die();
});

$router->get("/my/character.aspx", function() {

    // TODO: Improve this. A LOT.

    $page = new pagebuilder;

    $lastcategory = "7";

    $allowedevents = [
        "17",
        "18",
        "8",
        "2",
        "11",
        "12",
        "19"
    ];
    

    if(isset($_COOKIE["lastcategory"])){
        $lastcategory = $_COOKIE["lastcategory"];

        if(!in_array($lastcategory, $allowedevents)){
            $lastcategory = "7";
        } 

    }

    $page::get_template("avatar", ["currentcategory"=>$lastcategory]);
});

$router->post('/my/character.aspx', function() {
    $page = new pagebuilder;

    $lastcategory = "7";

    $allowedevents = [
        "17",
        "18",
        "8",
        "2",
        "11",
        "12",
        "19"
    ];
    

    if(isset($_COOKIE["lastcategory"])){
        $lastcategory = $_COOKIE["lastcategory"];

        if(!in_array($lastcategory, $allowedevents)){
            $lastcategory = "7";
        } 

    }

    global $db;
    global $currentuser;

    if(isset($_POST["__EVENTTARGET"])){
        $event = $_POST["__EVENTTARGET"];

        if(str_contains($event, "page")){
            $exploded = explode("-", $event);

            if(isset($exploded[1])){

                if($exploded[1] == "+1"){
                    if(isset($_COOKIE["page"])){
                        $currentpage = (int)$_COOKIE["page"];
                        
                        $nextpage = $currentpage +1;

                        setcookie("page", $nextpage,  time() + 9999999, "/", ".watrbx.wtf");
                    } else {
                        setcookie("page", "1",  time() + 9999999, "/", ".watrbx.wtf");
                    }
                } else {
                    $newpage = (int)$exploded[1];
                    setcookie("page", $newpage,  time() + 9999999, "/", ".watrbx.wtf");
                }

            }

        }
        
        switch ($event){
            case "viewheads":

                $page::get_template("avatar", ["currentcategory"=>17]);
                setcookie("lastcategory", 17, time() + 9999999, "/", ".watrbx.wtf");
                die();
            case "viewfaces":
                $page::get_template("avatar", ["currentcategory"=>18]);
                setcookie("lastcategory", 18, time() + 9999999, "/", ".watrbx.wtf");
                die();
            case "viewhats":
                $page::get_template("avatar", ["currentcategory"=>8]);
                setcookie("lastcategory", 8, time() + 9999999, "/", ".watrbx.wtf");
                die();
            case "viewtshirts":
                $page::get_template("avatar", ["currentcategory"=>2]);
                setcookie("lastcategory", 2, time() + 2, "/", ".watrbx.wtf");
                die();
            case "viewshirts":
                $page::get_template("avatar", ["currentcategory"=>11]);
                setcookie("lastcategory", 11, time() + 9999999, "/", ".watrbx.wtf");
                die();
            case "viewpants":
                setcookie("lastcategory", 12, time() + 9999999, "/", ".watrbx.wtf");
                $page::get_template("avatar", ["currentcategory"=>12]);
                die();
            case "viewgear":
                setcookie("lastcategory", 19, time() + 9999999, "/", ".watrbx.wtf");
                $page::get_template("avatar", ["currentcategory"=>19]);
                die();
            default:
                if(str_contains($event, "Wear")){
                    $exploded = explode("|", $event);

                    if(isset($exploded[1])){
                        $db->table("thumbnails")->where("userid", $currentuser->id)->delete();
                        $db->table("3dthumnails")->where("userid", $currentuser->id)->delete();
                        $assetid = (int)$exploded[1];
                        
                        $iswearing = $db->table("wearingitems")->where("itemid", $assetid)->where("userid", $currentuser->id)->first();

                        if($iswearing == null){

                            $asset = $db->table("assets")->where("id", $assetid)->first();

                            if($asset !== null){

                                $hasasset = $db->table("ownedassets")->where("assetid", $assetid)->where("userid", $currentuser->id)->first();

                                if($hasasset !== null){
                                    $db->table("wearingitems")->insert(["itemid"=>$assetid, "userid"=>$currentuser->id]);
                                }
                                
                                
                            }
                        }
                        $page::get_template("avatar", ["currentcategory"=>$lastcategory]);
                        die();
                    }
                }

                if(str_contains($event, "Remove")){
                    $exploded = explode("|", $event);
                    if(isset($exploded[1])){
                        $db->table("thumbnails")->where("userid", $currentuser->id)->delete();
                        $assetid = (int)$exploded[1];
                        $db->table("wearingitems")->where("userid", $currentuser->id)->where("itemid", $assetid)->delete();
                        $db->table("3dthumnails")->where("userid", $currentuser->id)->delete();
                        $page::get_template("avatar", ["currentcategory"=>$lastcategory]);
                        die();
                    }
                }

                if(str_contains($event, 'ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooser')){
                    $exploded = explode("$", $event);

                    if(isset($exploded[4]) && isset($_POST["__EVENTARGUMENT"])){
                        $color = (int)$_POST["__EVENTARGUMENT"];
                        $bodypart = $exploded[4];

                        $bodycolor = $db->table("bodycolors")->where("userid", $currentuser->id)->where("part", $bodypart)->first();

                        if($bodycolor !== null){
                            $update = [
                                "color"=>$color
                            ];
                            $db->table("bodycolors")->where("userid", $currentuser->id)->where("part", $bodypart)->update($update);
                            $db->table("thumbnails")->where("userid", $currentuser->id)->delete();
                            $db->table("3dthumnails")->where("userid", $currentuser->id)->delete();
                        } else {
                            $insert = [
                                "part"=>$bodypart,
                                "color"=>$color,
                                "userid"=>$currentuser->id
                            ];

                            $db->table("bodycolors")->insert($insert);
                            $db->table("thumbnails")->where("userid", $currentuser->id)->delete();
                            $db->table("3dthumnails")->where("userid", $currentuser->id)->delete();
                        }
                    }
                }
                
        }

    }
    
    $page::get_template("avatar", ["currentcategory"=>$lastcategory]);
    die();
});

$router->get("/my/groups.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("groups/default");
});

$router->get("/search/users", function() {
    $page = new pagebuilder;
    $page::get_template("search/users");
});

$router->get("/my/money.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("my/money");
});

$router->get("/userads/{num}", function($num) {
    $sanitize = new sanitize();
    $num = sanitize::integer($num);
    
    if($num > 3 || $num < 1){
        global $router;
        $router->return_status(404);
    } else {
        $page = new pagebuilder;
        $page::get_template("userads/$num");
    }
    
});

$router->get('/grid-test', function(){

    $useService = new watrbx\Grid\Grid;
    $gameserver = new watrbx\gameserver();

    $serverinfo = $gameserver->get_closest_server();
    $url = $gameserver->get_server_url($serverinfo);

    $Close = $useService->Close($url);

    echo $Close->CloseExpiredJobs();

    //$RobloxGrid = new Grid("https://group-she.gl.at.ply.gg:49837");
    //$grid = $RobloxGrid->useGet();

    //$script = new \StructType\ScriptExecution("print(\"hi\")");

    //$execute = $grid->GetVersion(new \StructType\GetVersion());

    //if ($execute !== false) {
    //    $result = $grid->getResult();
    //    echo $result->getGetVersionResult();
    //} else {
    //    $result = $grid->getLastError();
    //    echo $result['ServiceType\GetVersion']->getMessage();
    //}

});

$router->get("/CSS/Base/CSS/FetchCSS", function() {
    // var_dump($_GET);
    if(!isset($_GET["path"])){
        global $router;
        $router->return_status(404);
    } else {
        $path = $_GET["path"];
    }
    
    $sanitize = new sanitize();
    $path = $sanitize::get($path);
    
    if(file_exists("../storage/css/" . $path)){
        $css = file_get_contents("../storage/css/" . $path);
        header("Content-type: text/css");
        echo $css;
        die();
        
    } else {
        global $router;
        $router->return_status(404);
    }
    
});
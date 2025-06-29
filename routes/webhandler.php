<?php
use watrlabs\router\Routing;
use watrlabs\authentication;
use watrlabs\watrkit\pagebuilder;
use watrbx\thumbnails;
use watrlabs\watrkit\sanitize;
use watrbx\sitefunctions;



function checkhelp() {
    echo "hi";
}

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/", function() {
    $page = new pagebuilder;
    if(isset($_COOKIE["has_read"])){
        $page::get_template("index");
    } else {
        $page::get_template("notrobloxindex");
    }
});

$router->get('/agree', function(){
    setcookie('has_read', 1, time() + 999999999, '', '.watrbx.xyz');
    header("Location: /");
});

$router->get("/temp/cdn-upload", function(){
    $page = new pagebuilder;
    $page::get_template("temp/cdn-upload");
});

$router->get('/messages/compose', function(){
    $page = new pagebuilder;
    $page::get_template("compose");
});

$router->get('/download/thankyou', function(){
    $page = new pagebuilder;
    $page::get_template("download/thankyou");
});

$router->get('/Thumbs/Asset.ashx', function(){
    if(isset($_GET["AssetID"])){

        $assetid = (int)$_GET["AssetID"];

        global $db;

        $thumb = $db->table("thumbnails")->where("assetid", $assetid)->first();

        if($thumb !== null){
            $thumbs = new thumbnails();

            $thumbnailurl = $thumbs->get_asset_thumb($assetid);

            Header("Location: $thumbnailurl");
            die();
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
});


$router->post('/messages/compose', function(){
    if(isset($_POST["subject"]) && isset($_POST["body"]) && isset($_POST["__EVENTTARGET"])){
        $subject = $_POST["subject"];
        $body = $_POST["body"];
        $userid = $_POST["__EVENTTARGET"];

        $auth = new authentication();
        $func = new sitefunctions();
        global $currentuser;
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
    $page::get_template("user/inventory");
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

$router->get("/catalog", function() {
   $page = new pagebuilder;
   $page::get_template("catalog");
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

$router->get("/home", function() {
    $page = new pagebuilder;
    $page::get_template("new_home");
});

$router->get('/thumbnail/user-avatar', function(){ 
    http_response_code(500);
    die();
});

$router->get("/my/account", function() {
    $page = new pagebuilder;
    $page::get_template("my/account");
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
    $page = new pagebuilder;
    $page::get_template("avatar", ["currentcategory"=>2]);
});

$router->post('/my/character.aspx', function() {
    $page = new pagebuilder;

    global $db;
    global $currentuser;

    if(isset($_POST["__EVENTTARGET"])){
        $event = $_POST["__EVENTTARGET"];

        switch ($event){
            case "viewheads":
                $page::get_template("avatar", ["currentcategory"=>17]);
                die();
            case "viewfaces":
                $page::get_template("avatar", ["currentcategory"=>18]);
                die();
            case "viewhats":
                $page::get_template("avatar", ["currentcategory"=>8]);
                die();
            case "viewhats":
                $page::get_template("avatar", ["currentcategory"=>8]);
                die();
            case "viewtshirts":
                $page::get_template("avatar", ["currentcategory"=>2]);
                die();
            case "viewshirts":
                $page::get_template("avatar", ["currentcategory"=>11]);
                die();
            case "viewpants":
                die($page::get_template("avatar", ["currentcategory"=>12]));
            case "viewgear":
                die($page::get_template("avatar", ["currentcategory"=>19]));
            default:
                if(str_contains($event, "Wear")){
                    $exploded = explode("|", $event);

                    if(isset($exploded[1])){
                        $db->table("thumbnails")->where("userid", $currentuser->id)->delete();
                        $assetid = (int)$exploded[1];
                        $db->table("wearingitems")->insert(["itemid"=>$assetid, "userid"=>$currentuser->id]);
                        $page::get_template("avatar", ["currentcategory"=>2]);
                        die();
                    }
                }

                if(str_contains($event, "Remove")){
                    $exploded = explode("|", $event);
                    if(isset($exploded[1])){
                        $db->table("thumbnails")->where("userid", $currentuser->id)->delete();
                        $assetid = (int)$exploded[1];
                        $db->table("wearingitems")->where("userid", $currentuser->id)->where("itemid", $assetid)->delete();
                        $page::get_template("avatar", ["currentcategory"=>2]);
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
                        } else {
                            $insert = [
                                "part"=>$bodypart,
                                "color"=>$color,
                                "userid"=>$currentuser->id
                            ];

                            $db->table("bodycolors")->insert($insert);
                            $db->table("thumbnails")->where("userid", $currentuser->id)->delete();
                        }
                    }
                }
                
        }

    }
    
    $page::get_template("avatar", ["currentcategory"=>2]);
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

$router->get("/My/Groups.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("groups/default");
});

$router->post("/My/Groups.aspx", function() {
    var_dump($_POST);
});

$router->get("/my/money.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("my/money");
});

$router->get('/Thumbs/Place.aspx', function(){
    header("Location: /images/9a4a5d6f14dd9785c0af4175e7aff706.png");
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

$router->group('/group', function($router) {
    
    $router->get("/hi", function () {
        echo "test<br>";
    });
    
}, 'checkhelp');
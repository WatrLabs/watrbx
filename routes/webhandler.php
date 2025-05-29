<?php
use watrlabs\router\Routing;
use watrlabs\watrkit\pagebuilder;
use watrlabs\watrkit\sanitize;



function checkhelp() {
    echo "hi";
}

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/", function() {
    $page = new pagebuilder;
    $page::get_template("index");
});

$router->get("/users/{userid}/friends", function($userid) {
    $page = new pagebuilder;
    $page::get_template("user/friends");
});

$router->get("/Games.aspx", function(){
    header("Location: /games");
    die();
});

$router->get("/temp/create-asset", function(){
    $page = new pagebuilder;
    $page::get_template("temp/uploadasset");
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

$router->post('/my/character.aspx', function(){
    $pagebuilder = new pagebuilder();
    $pagebuilder->build_component("avatar_item", ["assetid"=>5, "action"=>"Wear"]);
});

$router->get('/thumbnail/user-avatar', function(){ 
    http_response_code(500);
    die();
});

$router->get("/my/account", function() {
    $page = new pagebuilder;
    $page::get_template("my/account");
});

$router->get("/my/character.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("avatar");
});

$router->get("/my/groups.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("groups/default");
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
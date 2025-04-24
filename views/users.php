<?php
use watrlabs\watrkit\pagebuilder;
use watrlabs\router\routing;
$router = new routing();
$pagebuilder = new pagebuilder();
$pagebuilder->addresource('cssfiles', '/assets/css/profile.css?t=' . time());

$id = (int)$id;

global $db;

if(is_int($id)){
    $query = $db->table("users")->where("id", $id);
    $userinfo = $query->first();

    if($userinfo == null){
        $router->return_status(404);
    }

    $query = $db->table("bans")->where("userid", $id);
    $ban = $query->first();

    if($ban !== NULL){
        die();
        $router->return_status(404); // roblox does this so like why not also do it ¯\_(ツ)_/¯
    }

} else {
    $router->return_status(404);
}

$pagebuilder->set_page_name($userinfo->username . "'s Profile");
$pagebuilder->buildheader();
?>

<div id="main">

    <div class="container" id="userinfo">
        <div id="text">
            <img id="pfp" src="/images/headshot.png">
            <div id="othertext">
            <h1><?= $userinfo->username; ?></h1>
            <p id="bio">This is an example bio.</p>
            </div>
        </div>
    </div>

</div>

<? $pagebuilder->get_snippet("footer"); ?>
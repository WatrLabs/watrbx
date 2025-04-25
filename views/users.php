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
       <div id="thething">
            <div id="text">
                <img id="pfp" src="/images/headshot.png">
                <div id="othertext">
                <h1><?= $userinfo->username; ?></h1>
                <p id="bio">This is an example bio.</p>
                </div>
            </div>
            <div id="buttons">
                <button>Add Friend</button>
                <button>Message</button>
            </div>
       </div>
    </div>

    <div class="container" id="tabs">
        <div id="tabbutton"><a href="javascript:showabout();" id="aboutbutton" class="selected">About</a></div>
        <div id="tabbutton"><a href="javascript:showcreations();" id="createbutton">Creations</a></div>
    </div>
    <div class="container" id="tabcontent">
        <div id="about" class="card">
            <h2>About Me</h2>
            <p>This user has not written an about me.</p>
        </div>

        <div id="creations" class="hidden card">
            <h2>Creations</h2>
            <p>This user has no games.</p>
        </div>
    </div>

</div>

<script>

    const aboutbutton = document.getElementById("aboutbutton");
    const createbutton = document.getElementById("createbutton");
    const abouttab = document.getElementById("about");
    const creationstab = document.getElementById("creations");

    function showabout() {
        creationstab.classList.add("hidden");
        createbutton.classList.remove("selected");
        aboutbutton.classList.add("selected");
        abouttab.classList.remove("hidden");
    }

    function showcreations() {
        creationstab.classList.remove("hidden");
        createbutton.classList.add("selected");
        aboutbutton.classList.remove("selected");
        abouttab.classList.add("hidden");
    }
</script>


<? $pagebuilder->get_snippet("footer"); ?>
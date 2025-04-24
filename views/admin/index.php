<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;
$func = new sitefunctions();
$auth = new authentication();
$auth->requiresession();
$userinfo = $auth->getuserinfo($_COOKIE["watrbxcookie"]);
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Index");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/index.css?t='. time());
$pagebuilder->buildheader();
?>

<div id="main" style="text-align: center;">
<div id="welcome-text">
        <img id="pfp" src="/images/headshot.png">
        <div id="other-text">
            <h2>Welcome, <?= $userinfo["username"] ?></h2>
            <p><?=$func->getplaying();?> currently in game<br>Current php version: <?=phpversion();?><br><?=$func->getgamecount();?> games have been created<br><?=$func->getnewusers();?> new user(s) today<br>Running on <?=gethostname()
            ?></p>
        </div>

</div>
    <p style="color: lightgrey; margin: 30px;">Choose an action below:</p>
    <a href="invkeys" class="button">Manage invite keys</a>
    <a href="games" class="button">Manage Games</a>
    <a href="site-config" class="button">Configure Site</a>
    <a href="banuser" class="button">Ban a user</a>
    <a href="refers" class="button">refers</a>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
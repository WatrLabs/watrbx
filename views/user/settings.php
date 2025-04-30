<?php
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;

$pagebuilder = new pagebuilder;
$auth = new authentication();
$auth->requiresession();
$userinfo = $auth->getuserinfo($_COOKIE["watrbxsession"]);
$pagebuilder->set_page_name("Settings");
$pagebuilder->addresource('cssfiles', '/assets/css/settings.css?t=' . time());
$pagebuilder->buildheader();
?>

<div id="main">
    <div id="center">
        <div id="settings" class="container">
            <h1>Account Settings</h1>
            <form action="/api/v1/changeusername" method="post" style="width: 100%;">
                <p>Change Username</p>
                <input type="username" name="username" placeholder="New Username">
                <input type="submit" value="Change">
                <br>
                <small>100 Robux is required to change your username.</small>
            </form>
            <form action="/api/v1/changeusername" method="post" style="width: 100%;">
                <p>Change Password</p>
                <input type="password" name="oldpassword" placeholder="Old Password">
                <input type="password" name="newpassword" placeholder="New Password">
                <input type="submit" value="Change">
            </form>
        </div>
    </div>
</div>

<?php $pagebuilder->get_snippet("footer"); ?>

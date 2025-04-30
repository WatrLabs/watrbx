<?php
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions; 

// this will be merged to the settings page once it's complete

$pagebuilder = new pagebuilder;
$auth = new authentication();
$auth->requiresession();
$userinfo = $auth->getuserinfo($_COOKIE["watrbxsession"]);
$pagebuilder->set_page_name("Change Email");
$pagebuilder->addresource('cssfiles', '/assets/css/settings.css?t=' . time());
$pagebuilder->buildheader();
?>

<div id="main">
    <div id="center">
        <div id="settings">
            <h1>Change Email</h1>
            <form action="/api/v1/change-email" method="post" style="width: 100%;">
                <p>Add Email</p>
                <input type="email" name="email" placeholder="New E-Mail">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Change">
                <br>
            </form>
        </div>
    </div>
</div>

<?php $pagebuilder->get_snippet("footer"); ?>

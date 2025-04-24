<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;
$sitefunc = new sitefunctions();
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Ban a user");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/index.css?t='. time());
$pagebuilder->buildheader();
?>

<div id="main" style="text-align: center;">
    <h1>Ban an offending user</h1>
    <?=$sitefunc->get_message();?>
    <form method="POST" id="loginform" action="/api/admin/ban">
			<input type="username" name="username" placeholder="Username">
            <input type="note" name="note" placeholder="Moderator Note">
            <input type="submit" value="ban">
            <p>Make sure to make the moderator note professional!<br>(e.g. *bad thing* is not allowed on watrbx per our Terms of Service.<br>and then <i>This ban is appealable</i> or not)</p>
    </form>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
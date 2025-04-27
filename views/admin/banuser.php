<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;
$sitefunc = new sitefunctions();
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Ban a user");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/index.css');
$pagebuilder->buildheader();
?>

<div id="main" style="text-align: center;">
    <h1>Ban an offending user</h1>
    <?=$sitefunc->get_message();?>
    <form method="POST" id="loginform" action="/api/admin/ban">
			<input type="username" name="username" placeholder="Username">
            <input type="note" name="note" placeholder="Moderator Note">
            <select name="bantype" id="bantype">
                <option value="warning">Warning</option>
                <option value="1day">1 Day Ban</option>
                <option value="3day">3 Day Ban</option>
                <option value="7day">7 Day Ban</option>
                <option value="permban">Perm Ban</option>
            </select>
            <input type="submit" value="ban">
            <p>Make sure to make the moderator note professional!<br>(e.g. *bad thing* is not allowed on watrbx per our Terms of Service.<br>and then <i>This ban is appealable</i> or not)</p>
    </form>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
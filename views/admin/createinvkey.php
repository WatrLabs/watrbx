<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Create Invite Key");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/index.css?t='. time());
$pagebuilder->buildheader();
?>

<div id="main" style="text-align: center;">
    <form method="POST" id="loginform" action="/api/admin/makekey">
			<span> How many uses: </span><br><br>
            <input align="right" name="uses" placeholder="How many uses the invite key supports" style="width: 20%; text-align: center;"><br><br>
        <button class="button"> Create </button>
    </form>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
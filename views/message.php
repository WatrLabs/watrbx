<?php
include baseurl . "/conn.php";
use watergames\pagebuilder;
$pagebuilder = new pagebuilder;
use watrlabs\authentication;
$auth = new authentication();

$auth->requiresession();

$pagebuilder->buildheader();
?>

<div id="main">
    Messages have been discontinued.
</div>

<? $pagebuilder->get_snippet("footer"); ?>
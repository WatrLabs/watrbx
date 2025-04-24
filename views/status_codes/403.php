<?php
use watrlabs\watrkit\pagebuilder;
$pagebuilder = new pagebuilder();
$pagebuilder->set_page_name("404");
$pagebuilder->buildheader();
?>

<div id="main" style="text-align: center;">
    <div style="position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
        <div class="container" style="padding: 25px;">
            <img src="/assets/images/blobs/blobhyperthinkfast.png">
            <h1>403 - Access Forbidden!</h1>
            <p>You do not have access to the requested page!</p>
        </div>
    </div>
</div>

<? $pagebuilder->get_snippet("footer"); ?>
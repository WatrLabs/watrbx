<?php
use watrlabs\watrkit\pagebuilder;
$pagebuilder = new pagebuilder();
$pagebuilder->set_page_name("500");
$pagebuilder->buildheader();
?>

<div id="main" style="text-align: center;">
    <div style="position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
        <p style="text-align: center;">
            <?=$e?>
        </p>
        <div class="container" style="padding: 25px;">
            <img src="/assets/images/blobs/bloboutage.png">
            <h1>500 - Internal Server Error!</h1>
            <p>An error has occured!</p>
        </div>
    </div>
</div>

<? $pagebuilder->get_snippet("footer"); ?>
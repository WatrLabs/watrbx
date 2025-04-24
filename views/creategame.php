<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
$auth->requiresession();
$auth->createcsrf("creategame");
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Create a game");
$pagebuilder->buildheader();
?>

<div id="main" style="text-align: center;">
    <div class="container" style="width: 30em; margin-left: auto; margin-right: auto;">
        <h1>Upload a watrbx game</h1>
        <form method="POST" action="/api/create-game" enctype="multipart/form-data">
            <input type="text" style="width: 95%;" name="name" placeholder="Game Name"><br><br>
            <input type="text" style="width: 95%;" name="description" placeholder="Game Description"><br><br>
            <input type="file" style="width: 95%;" name="assetfile"><br><br>
            <input type="submit">
        </form>
        <!-- I'm a goat 1/16/25 8:37 PM (czech) !-->
        <p><small>hint: this is not temporary probably</small></p>
    </div>
</div>

<? $pagebuilder->get_snippet("footer"); ?>
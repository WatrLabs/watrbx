<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;
$auth = new authentication();
$auth->requiresession();
$auth->createcsrf("updategame");
$func = new sitefunctions();
$universeinfo = $func->getuniverseinfo($id);
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Update a game");
$pagebuilder->buildheader();

?>

<div id="main" style="text-align: center;">
    <div class="container" style="width: 30em; margin-left: auto; margin-right: auto;">
        <h1>Update "<?=$universeinfo["title"]?>"</h1>
        <form method="POST" action="/api/update-game?id=<?=$universeinfo["id"]?>" enctype="multipart/form-data">
            <input type="text" style="width: 95%;" name="title" placeholder="Game Name" value="<?=$universeinfo["title"]?>"><br><br>
            <textarea type="text" style="width: 95%;" name="description" placeholder="Game Description"><?=$universeinfo["description"]?></textarea><br><br>
            <input type="file" style="width: 95%;" name="assetfile"><br><br>
            <input type="submit">
            <p>(p.s. custom thumbnails soon probably)</p>
        </form>
    </div>
</div>

<? $pagebuilder->get_snippet("footer"); ?>
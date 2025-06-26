<?php
    use watrlabs\router\Routing;
    $router = new Routing();
    global $currentuser;

    if($currentuser !== null){
        if($currentuser->is_admin !== 1){
            die($router->return_status(403));
        }
    } else {
        die($router->return_status(403));
    }

    if(isset($_GET["assetid"])){
        $assetid = (int)$_GET["assetid"];
    } else {
        die($router->return_status(405));
    }

    global $db;

    $assetinfo = $db->table("assets")->where("id", $assetid)->first();

    if($assetinfo == null){
        die($router->return_status(404));
    }

    
?>

<style>
    * {
        font-family: Tahoma;
    }

    #main {
        width: 50%;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div id="main">
    <h1>Upload Place Thumbnail</h1>
    <small>this is temporary till the develop page is done</small>
    <br><br>

    <form method="post" action="/api/v1/thumbnail-uploader" enctype="multipart/form-data">
        <p>Upload a thumbnail for <?=$assetinfo->name?></p>
        <input type="text" name="assetid" style="display: none;" value="<?=$assetinfo->id?>">
        <select name="type" id="type">
            <option value="Thumbnail" selected>Thumbnail</option>
            <option value="Icon">Icon</option>
        </select><br><br>
        <input type="file" name="thumb" /><br><br>

        <button>Upload</button>
    </form>
</div>
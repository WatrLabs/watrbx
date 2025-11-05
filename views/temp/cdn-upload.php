<?php
    die();
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
    <h1>upload to the cdn</h1>
    <br><br>

    <form method="post" action="/api/v1/cdn-upload" enctype="multipart/form-data">
        <input type="text" name="path" placeholder="path"/><br><br>
        <input type="file" name="file" /><br><br>
        <button>Upload</button>
    </form>
</div>
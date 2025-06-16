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
    <h1>Temporary asset creator</h1>
    <small>this is temporary till the develop page is done</small>
    <br><br>

    <form method="post" action="/api/v1/universe-creator" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="universe title" required/><br><br>
        <textarea type="text" name="description" placeholder="universe description" required></textarea><br><br>
        <input type="file" name="asset" /><br><br>
        <button>Create Asset</button>
    </form>
</div>
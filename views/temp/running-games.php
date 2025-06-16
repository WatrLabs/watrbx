
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
    <h1>Running Games</h1>
</div>
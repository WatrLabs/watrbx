<?php
    use watrlabs\router\Routing;
    use watrlabs\authentication;
    $router = new Routing();
    $auth = new authentication();
    $auth->requiresession();
    global $currentuser;

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
    <h1>Temporary decal creator</h1>
    <small>this is temporary till the develop page is done</small>
    <br><br>

    <form method="post" action="/api/v1/decal-creator" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Decal Name" required/><br><br>
        <textarea type="text" name="description" placeholder="Decal description" required></textarea><br><br>
        <input type="int" name="robux" placeholder="robux, put 0 for free" /><br><br>
        <input type="int" name="tix" placeholder="tix, put 0 for free" /><br><br>
        <input type="checkbox" name="forsale" value="yes">For Sale <br><br>
        <input type="file" name="shirt" /><br><br>

        <button>Create Asset</button>
    </form>
</div>
<?php
    use watrlabs\router\Routing;
    use watrlabs\authentication;
    $auth = new authentication();
    $auth->requiresession();
    $router = new Routing();
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
    <h1>Temporary pants creator</h1>
    <small>this is temporary till the develop page is done</small>
    <br>
    <small><a href="https://cdn.watrbx.wtf/PantsTemplate_02222016.png">Need the template?</a></small>
    <br><br>

    <form method="post" action="/api/v1/pants-creator" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="pants Name" required/><br><br>
        <textarea type="text" name="description" placeholder="pants description" required></textarea><br><br>
        <input type="int" name="robux" placeholder="robux, put 0 for free" /><br><br>
        <input type="int" name="tix" placeholder="tix, put 0 for free" /><br><br>
        <input type="file" name="shirt" /><br><br>

        <button>Create Asset</button>
    </form>
</div>
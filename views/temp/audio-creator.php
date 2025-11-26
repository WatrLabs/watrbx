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
    <h1>Temporary audio creator</h1>
    <small>this is temporary till the develop page is done (never)</small>
    <br>
    <p><i>Only .mp3 files are supported. Please make sure the audio file is under 20 MB.</i></p>

    <form method="post" action="/api/v1/audio-creator" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Audio Name" required/><br><br>
        <textarea type="text" name="description" placeholder="Audio description" required></textarea><br><br>
        <input type="file" name="audio" /><br><br>

        <button>Create Asset</button>
    </form>
</div>
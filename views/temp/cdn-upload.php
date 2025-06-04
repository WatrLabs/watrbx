<?php
    use watrlabs\authentication;
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
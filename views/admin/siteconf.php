<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;
$sitefunc = new sitefunctions();
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Site Config");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/index.css');
$pagebuilder->buildheader();
$siteconf = $sitefunc->getsiteconf();

if($siteconf->register_enabled == "1"){
    $regenabled = true;
} else {
    $regenabled = false;
}
?>

<div id="main" style="text-align: left; width: 50%; margin-left: auto; margin-right: auto;">
    <form method="POST" action="/api/admin/siteconfig">
        <h2>Change site banner.</h2>
        <br>
        <small>(please keep it professional)</small>
        <br>
        <input type="text" name="sitebanner" placeholder="Site Banner" value="<?=$siteconf->sitebanner?>" style="width: 300px; text-align: center; margin-top: 15px;"><br>
        <br><br>
        <h2>Enable/Disable register</h2>
        <div style="margin-top: 10px;">
            <input type="radio" value="1" name="regenabled" <?if($regenabled){ echo "checked"; } ?>>Enabled<br>
            <input type="radio" value="0" name="regenabled" <?if(!$regenabled){ echo "checked"; } ?>>Disabled<br><br>
            <input type="submit" value="update site"><br><br>
        </div>
        
    </form>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
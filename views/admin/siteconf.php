<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;
$sitefunc = new sitefunctions();
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Site Config");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/index.css?t='. time());
$pagebuilder->buildheader();
$siteconf = $sitefunc->getsiteconf();

if($siteconf["register_enabled"] == "1"){
    $regenabled = true;
} else {
    $regenabled = false;
}
?>

<div id="main" style="text-align: center;">
    <h1>Change site config</h1>
    <form method="POST" action="/api/admin/siteconfig">
        <input type="text" name="sitebanner" placeholder="Site Banner" value="<?=$siteconf["sitebanner"]?>" style="width: 550px; text-align: center;"><br>
        <br><br>
        <p>is register enabled?</p>
        <input type="radio" value="1" name="regenabled" <?if($regenabled){ echo "checked"; } ?>>yes<br>
        <input type="radio" value="0" name="regenabled" <?if(!$regenabled){ echo "checked"; } ?>>no<br><br>
        <input type="submit" value="update site"><br><br>
        
    </form>
    <p>I'll add the option for guests when its not broken 🤪</p>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
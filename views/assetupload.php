<?php
use watrlabs\authentication;
use watergames\pagebuilder;
use watrbx\sitefunctions;
$sitefunc = new sitefunctions();
$pagebuilder = new pagebuilder;
$auth = new authentication();
$auth->requiresession();
$auth->createcsrf("assetupload");
$pagebuilder->set_page_name("Asset Uploader");
$pagebuilder->addresource('cssfiles', '/assets/css/games.css?t='. time());
$pagebuilder->buildheader();
$userinfo = $auth->getuserinfo($_COOKIE["watrbxcookie"]);

$assetTypes = array(
    'Image' => 1,
    'TShirt' => 2,
    'Audio' => 3,
    'Mesh' => 4,
    'Lua' => 5,
    'Hat' => 8,
    'Place' => 9,
    'Model' => 10,
    'Shirt' => 11,
    'Pants' => 12,
    'Decal' => 13,
    'Head' => 17,
    'Face' => 18,
    'Gear' => 19,
    'Badge' => 21,
    'Animation' => 24,
    'Torso' => 27,
    'RightArm' => 28,
    'LeftArm' => 29,
    'LeftLeg' => 30,
    'RightLeg' => 31,
    'Package' => 32,
    'GamePass' => 34,
    'Plugin' => 38,
    'MeshPart' => 40,
    'HairAccessory' => 41,
    'FaceAccessory' => 42,
    'NeckAccessory' => 43,
    'ShoulderAccessory' => 44,
    'FrontAccessory' => 45,
    'BackAccessory' => 46,
    'WaistAccessory' => 47,
    'ClimbAnimation' => 48,
    'DeathAnimation' => 49,
    'FallAnimation' => 50,
    'IdleAnimation' => 51,
    'JumpAnimation' => 52,
    'RunAnimation' => 53,
    'SwimAnimation' => 54,
    'WalkAnimation' => 55
);

?>    
    <div id="main">
<style>
    * {
        text-align: center;
        font-family: Sans-Serif;
    }
</style>
<?=$sitefunc->get_message();?>
<h1>watrbx asset uploader</h1>
<p>uploading as: <?=$userinfo["username"]?></p>
<form method="POST" action="#" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="asset name"><br><br>
    <select name="product">
        
    <?php
    
        foreach($assetTypes as $name => $id){ ?>
        
        <option value="<?=$id?>"><?=$name?></option>
             
        <? } ?>
    
    </select><br><br>
    
    <input type="number" name="robux" min="0" max="100000" placeholder="robux"><br><br>
    <input type="number" name="tix" min="0" max="100000" placeholder="tix"><br><br>
    <input type="file" name="assetfile">
    <input type="submit">
</form>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
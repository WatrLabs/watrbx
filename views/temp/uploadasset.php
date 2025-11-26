
<?php

use watrlabs\router\Routing;
    $router = new Routing();
    global $currentuser;

    if($currentuser !== null){
        if($currentuser->is_admin !== 1){
            die();
            $router->return_status(403);
        }
    } else {
        die();
        $router->return_status(403);
    }

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
    <small>it's because im too lazy to get the develop page working</small>
    <br><br>

    <form method="post" action="/api/v1/asset-upload" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="asset title" required/><br><br>
        <textarea type="text" name="description" placeholder="description" required></textarea><br><br>
        <select name="product">
        <?php
    
        foreach($assetTypes as $name => $id){ ?>
        
        <option value="<?=$id?>"><?=$name?></option>
             
        <? } ?>
        </select><br><br>
        <input name="robux" placeholder="robux, put 0 for free" /><br><br>
        <input name="tix" placeholder="tix, put 0 for free" /><br><br>
        <input type="checkbox" name="featured" value="yes"> Featured <br><br>
        <input type="checkbox" name="forsale" value="yes"> For Sale <br><br>
        <input type="file" name="asset" /><br><br>
        <button>Create Asset</button>
    </form>
    <small>Note: to make off-sale, don't provide a value for robux and tix, putting them to 0 or more will put onsale</small>
</div>
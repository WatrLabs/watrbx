<?php
namespace watrbx;

class RBX {

    private $assetTypes = array(
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

    public function get_friendly_asset_type($assetid){
        global $db;
        $assetinfo = $db->table("assets")->where("id", $assetid)->first();
        return array_search($assetinfo->prodcategory, $this->assetTypes);
    }

    public function get_asset_type_with_id($assetid){
        return array_search($assetid, $this->assetTypes);
    }
}
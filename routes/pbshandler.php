<?php
use watrlabs\router\Routing;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/RoleSets/GetRoleSetForUser", function () {
    if(isset($_GET["userId"]) && isset($_GET["placeId"])){
        // TODO
        $userid = (int)$_GET["userId"];
        $placeid = (int)$_GET["placeId"];

        header("Content-type: application/json");

        $dataarray = [
            "data"=>[
                "Rank"=>255, // by default assume visitor.
            ]
        ];

        if($userid == 2){
            $dataarray["data"]["Rank"] = 255; // owner perms
        }

        die(json_encode($dataarray));
    }
});
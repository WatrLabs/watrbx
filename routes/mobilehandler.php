<?php
use watrlabs\router\Routing;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/mobileapi/check-app-version", function() {
    header("Content-type: applcation/json");
    die('{"data":{"UpgradeAction":"None"}}');
});

$router->get("/device/initialize", function() {
    header("Content-type: applcation/json");
    die('{"browserTrackerId":1234567890,"appDeviceIdentifier":null}'); 
});

$router->get('/sponsoredpage/list-json', function(){
    header("Content-type: application/json");
    die('{"success":true}');
});
<?php
use watrlabs\router\Routing;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get('/version-2niqaerqcb6351zx7-RobloxVersion.txt', function(){
    echo "1, 6, 3, 61076";
});

$router->get('/version-witnessescouldnt-BootstrapperQTStudioVersion.txt', function(){
    echo "1, 6, 3, 172";
});

$router->get('/install/setup.ashx', function(){
    header("Location: /RobloxPlayerLauncher.exe");
});

$router->get('/cdn.txt', function(){
    echo "setup.watrbx.wtf";
});

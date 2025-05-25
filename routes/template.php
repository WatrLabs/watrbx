<?php
use watrlabs\router\Routing;

function checkhelp() {
    echo "hi";
}

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/", function() {
    echo "hello world";
});

$router->group('/group', function($router) {
    
    $router->get("/hi", function () {
        echo "test<br>";
    });
    
}, 'checkhelp');
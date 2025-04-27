<?php
// ../routes/template.php

// make sure you replace setup<PHP FILE NAME>Routes function
global $router;

        $router->get('/version.txt', function() {
                echo "15";
        });
        
        $router->get('/hi-RobloxVersion.txt', function() {
                echo "hi";
        });
        
        
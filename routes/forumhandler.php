<?php
use watrlabs\router\Routing;
use watrlabs\authentication;
use watrlabs\watrkit\pagebuilder;
use watrlabs\watrkit\sanitize;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/forum", function() {
    $page = new pagebuilder;
    $page::get_template("forum/index");
});

$router->get("/Forum/Default.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("forum/index");
});

$router->get("/Forum/ShowForum.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("forum/showforum");
});

$router->get("/Forum/ShowPost.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("forum/showpost");
});

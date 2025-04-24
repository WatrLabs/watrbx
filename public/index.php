
<?php
use watrlabs\router\routing;

global $router;
require_once '../init.php';

$router = new routing();

$router->addrouter('webhandler');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$router->dispatch($uri, $method);

// aaaaaaaaaaaaaaaa my brain hurts 
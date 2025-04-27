
<?php
use watrlabs\router\routing;

global $router;
require_once '../init.php';

$router = new routing();

$router->addrouter('webhandler');
$router->addrouter('AdminHandler');
$router->addrouter('ApiHandler');
$router->addrouter('BootstrapHandler');
$router->addrouter('ClientHandler');
$router->addrouter('DataPersHandler');
$router->addrouter('MatchHandler');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$router->dispatch($uri, $method);

// aaaaaaaaaaaaaaaa my brain hurts 
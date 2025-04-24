<?php
use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;
use watrlabs\router\routing;

global $dotenv;
global $db;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    if($_ENV["APP_ENV"] == "debug" || $_ENV["APP_ENV"] == "dev"){
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    } else {
        $e = array(
            "e"=>"$errno + $errstr + $errfile + $errline"
        );
        $router = new routing();
        $router->return_status(500, $e);
    }
});

spl_autoload_register(function ($class_name) {
    $directory = '../classes/';
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    $file = $directory . $class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
    else {
        if($_ENV["APP_ENV"] == "debug" || $_ENV["APP_ENV"] == "dev"){
            throw new ErrorException("Failed to include class $class_name");
        } else {

            throw new ErrorException("Failed to include class $class_name");
            die();

            $e = array(
                "e"=>"Failed to include class $class_name",
            );
            $router = new routing();
            $router->return_status(500, $e);
        }
    }
});

try {

    $config = [
        'driver'    => 'mysql',
        'host'      => $_ENV["DB_HOST"],
        'database'  => $_ENV["DB_NAME"],
        'username'  => $_ENV["DB_USER"],
        'password'  => $_ENV["DB_PASS"],
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '', // if you have a prefix for all your tables.
    ];

    $connection = new Connection('mysql', $config);
    $db = $connection->getQueryBuilder(); 
} catch (PDOException $e){
    die("Failed to connect to the database.");
}
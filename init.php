<?php
use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;
use watrlabs\authentication;
global $dotenv;
global $db;
global $currentuser;

spl_autoload_register(function ($class_name) {
    $directory = '../classes/';
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    $file = $directory . $class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
    else {
        throw new ErrorException("Failed to include class $class_name");
    }
});

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {

    $config = [
        'driver'    => 'mysql',
        'host'      => $_ENV["DB_HOST"],
        'database'  => $_ENV["DB_NAME"],
        'username'  => $_ENV["DB_USER"],
        'password'  => $_ENV["DB_PASS"],
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix'    => '', // if you have a prefix for all your tables.
    ];

    $connection = new Connection('mysql', $config);
    $db = $connection->getQueryBuilder(); 

    $auth = new authentication();
    if($auth->hasaccount()){
        $currentuser = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);
    } else {
        $currentuser = null;
    }
    
} catch (PDOException $e){
    require("../views/really_bad_500.php");
    die();
}
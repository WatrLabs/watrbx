<?php
use watrlabs\watrkit\pagebuilder;
$pagebuilder = new pagebuilder();

$startrows = 0;
$genre = 0;
$sort = 0;

if(isset($_GET["SortFilter"])){
    $sort = (int)$_GET["SortFilter"];
}

if(isset($_GET["GenreID"])){
    $genre = (int)$_GET["GenreID"];
}

if(isset($_GET["StartRows"])){
    $startrows = (int)$_GET["StartRows"];
}

if(isset($_GET["MaxRows"])){
    $maxrows = (int)$_GET["MaxRows"];
}

if($sort !== 1){
    die();
}


global $db;

$query = $db->table("universes")->where("public", 1)->offset($startrows)->limit($maxrows);

$allgames = $query->get();

foreach($allgames as $game){ 
    $pagebuilder->build_component("game", ["game"=>$game]);
}



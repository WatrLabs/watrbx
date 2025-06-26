<?php
use watrlabs\watrkit\pagebuilder;
use watrbx\gameserver;
$pagebuilder = new pagebuilder();
$gameserver = new gameserver();

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

$query = $db->table("universes")->where("public", 1);
$allgames = $query->get();

foreach ($allgames as &$game) {
    $game->visits = count($db->table("visits")->where("universeid",$game->assetid)->get());
    $game->active_players = $gameserver->get_active_players($game->assetid);
}

unset($game);

usort($allgames, function ($a, $b) {
    return $b->visits <=> $a->visits;
});

usort($allgames, function ($a, $b) {
    return $b->active_players <=> $a->active_players;
});



$paginated = array_slice($allgames, $startrows, $maxrows);


foreach ($paginated as $game) {
    $pagebuilder->build_component("game", ["game" => $game]);
}



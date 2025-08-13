<?php
use watrlabs\watrkit\pagebuilder;
use watrbx\gameserver;
$pagebuilder = new pagebuilder();
$gameserver = new gameserver();


global $db;

$startrows = 0;
$genre = 0;
$sort = 0;

if(isset($_GET["SortFilter"])){
    $sort = (int)$_GET["SortFilter"];
}

if(isset($_GET["GenreID"])){
    $genre = (int)$_GET["GenreID"];
}

if(isset($_GET["Keyword"])){
    $keyword = $_GET["Keyword"];
}

if(isset($_GET["StartRows"])){
    $startrows = (int)$_GET["StartRows"];
}

if(isset($_GET["MaxRows"])){
    $maxrows = (int)$_GET["MaxRows"];
}

if($sort == "3"){

    // featured games

    $featuredgames = $db->table("featuredgames")->get();

    $universeids = [];

    foreach ($featuredgames as $featured){
        $universeids[] = $featured->universeid;
    }

    $allgames = $db->table("universes")->where("public", 1)->whereIn('id', $universeids)->get();

    $paginated = array_slice($allgames, $startrows, $maxrows);

    foreach ($paginated as $game) {
        $pagebuilder->build_component("game", ["game" => $game]);
    }

    die();
}

if($sort !== 1){
    $query = $db->table("universes")->where("public", 1);

    if (isset($keyword)) {
        $query->where("title", 'LIKE', '%' . strtolower($keyword) . '%');
    }

    $allgames = $query->get();

    $paginated = array_slice($allgames, $startrows, $maxrows);

    foreach ($paginated as $game) {
        $pagebuilder->build_component("game", ["game" => $game]);
    }

    die();
}





$query = $db->table("universes")->where("public", 1);

if(isset($keyword)){
    $query->where("title", "LIKE", "%".$keyword."%");
}

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



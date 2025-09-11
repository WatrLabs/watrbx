<?php
use watrlabs\watrkit\pagebuilder;
use watrbx\gameserver;
use Cocur\Slugify\Slugify;
use watrlabs\authentication;
use watrbx\thumbnails;
$thumbs = new thumbnails();
$slugify = new Slugify();
$auth = new authentication();
$gameserver = new gameserver();
$pagebuilder = new pagebuilder();

global $db;

$sort = isset($_GET["SortFilter"]) ? (int)$_GET["SortFilter"] : 0;
$genre = isset($_GET["GenreID"]) ? (int)$_GET["GenreID"] : 0;
$keyword = isset($_GET["Keyword"]) ? trim($_GET["Keyword"]) : null;
$startrows = isset($_GET["StartRows"]) ? (int)$_GET["StartRows"] : 0;
$maxrows = isset($_GET["MaxRows"]) ? (int)$_GET["MaxRows"] : 20;

if($sort === 3){
    $featuredgames = $db->table("featuredgames")->get();
    $universeids = [];
    foreach ($featuredgames as $featured){
        $universeids[] = $featured->universeid;
    }
    $allgames = $db->table("universes")->where("public", 1)->whereIn("id", $universeids)->offset($startrows)->limit($maxrows)->get();
    foreach ($allgames as $game) {
        $pagebuilder->build_component("game", ["game" => $game, "thumbs"=>$thumbs, "slugify"=>$slugify, "auth"=>$auth, "gameserver"=>$gameserver]);
    }
    die();
}

if($sort !== 1){
    $query = $db->table("universes")->where("public", 1);
    if(!empty($keyword)){
        $query->where("title", "LIKE", "%" . strtolower($keyword) . "%");
    }
    $allgames = $query->offset($startrows)->limit($maxrows)->get();
    foreach ($allgames as $game) {
        $pagebuilder->build_component("game", ["game" => $game, "thumbs"=>$thumbs, "slugify"=>$slugify, "auth"=>$auth, "gameserver"=>$gameserver]);
    }
    die();
}

$query = $db->table("universes")->where("public", 1);
if(!empty($keyword)){
    $query->where("title", "LIKE", "%" . strtolower($keyword) . "%");
}
$allgames = $query->get();

foreach ($allgames as &$game) {
    $game->visits = $db->table("visits")->where("universeid", $game->assetid)->count();
    $game->active_players = $gameserver->get_active_players($game->assetid);
}
unset($game);

usort($allgames, function ($a, $b) {
    return [$b->active_players, $b->visits] <=> [$a->active_players, $a->visits];
});

$paginated = array_slice($allgames, $startrows, $maxrows);

foreach ($paginated as $game) {
    $pagebuilder->build_component("game", ["game" => $game, "thumbs"=>$thumbs, "slugify"=>$slugify, "auth"=>$auth, "gameserver"=>$gameserver]);
}

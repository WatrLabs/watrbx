<?php
use watrlabs\watrkit\pagebuilder;
use watrbx\gameserver;
use Cocur\Slugify\Slugify;
use watrlabs\authentication;
use watrbx\thumbnails;
use watrlabs\fastflags;
use watrbx\gamealgorithm;
$thumbs = new thumbnails();
$slugify = new Slugify();
$auth = new authentication();
$pagebuilder = new pagebuilder();
$gameserver = new gameserver();

global $db;

$sort = isset($_GET["SortFilter"]) ? (int)$_GET["SortFilter"] : 0;
$genre = isset($_GET["GenreID"]) ? (int)$_GET["GenreID"] : 0;
$keyword = isset($_GET["Keyword"]) ? trim($_GET["Keyword"]) : null;
$startrows = isset($_GET["StartRows"]) ? (int)$_GET["StartRows"] : 0;
$maxrows = isset($_GET["MaxRows"]) ? (int)$_GET["MaxRows"] : 20;

$usealgorithm = fastflags::get("UseAlgorithmForGames");
$usenewsearch = fastflags::get("UseNewSearch");
// look how tuff my crap is

// featured games
if($sort === 3){
    $featuredgames = $db->table("featuredgames")->get(); // hardcoded be like
    shuffle($featuredgames);
    $universeids = [];
    foreach ($featuredgames as $featured){
        $universeids[] = $featured->universeid;
    }
    $allgames = $db->table("universes")->where("public", 1)->whereIn("id", $universeids)->offset($startrows)->limit($maxrows)->get();
    shuffle($allgames); // how is this a built in php function
    foreach ($allgames as $game) {
      $pagebuilder->build_component("game", ["game" => $game, "thumbs"=>$thumbs, "slugify"=>$slugify, "auth"=>$auth, "gameserver"=>$gameserver]);
    }
    die();
}

/*if($sort !== 1){
    $query = $db->table("universes")->where("public", 1);
    if(!empty($keyword)){
        $query->where("title", "LIKE", "%" . strtolower($keyword) . "%");
    }
    $allgames = $query->offset($startrows)->limit($maxrows)->get();
    foreach ($allgames as $game) {
      $pagebuilder->build_component("game", ["game" => $game, "thumbs"=>$thumbs, "slugify"=>$slugify, "auth"=>$auth, "gameserver"=>$gameserver]);
    }
    die();
}*/

// popular

if($sort === 1){
    $query = $db->table("universes")->where("public", 1);
    if(!empty($keyword)){
        $safeKeyword = '%' . str_replace(['%', '_'], ['\%', '\_'], strtolower($keyword)) . '%';
        $query->where("title", "LIKE", $safeKeyword);
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
    die();
}
/*

if(!empty($keyword)){
    $fuzzyPattern = '%' . implode('%', str_split(strtolower($keyword))) . '%';
    
    $query->where(function($q) use ($keyword, $fuzzyPattern) {
        $q->where("title", "LIKE", "%" . strtolower($keyword) . "%")
          ->orWhere("description", "LIKE", "%" . strtolower($keyword) . "%")
          //"mm2" -> "Murder Mystery 2"
          ->orWhere("title", "LIKE", $fuzzyPattern);
    });
}

*/
$query = $db->table("universes");


$query->where("public", 1);
if($usenewsearch){
if (!empty($keyword)) {
    $query->where(function($q) use ($keyword) {
        $q->where('title', 'LIKE', "%{$keyword}%")
        ->orWhere('description', 'LIKE', "%{$keyword}%");
    });
}
} else {
if(!empty($keyword)){
    $safeKeyword = '%' . str_replace(['%', '_'], ['\%', '\_'], strtolower($keyword)) . '%';
    $query->where("title", "LIKE", $safeKeyword);
}
}
$query->orderBy($db->raw("RAND()"));

$allgames = $query->offset($startrows)->limit($maxrows)->get();

foreach ($allgames as $game) {
    $pagebuilder->build_component("game", ["game" => $game, "thumbs"=>$thumbs, "slugify"=>$slugify, "auth"=>$auth, "gameserver"=>$gameserver]);
}
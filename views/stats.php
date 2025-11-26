<?php

global $db;

$usercount = $db->table('users')->count();
$assetcount = $db->table("assets")->count();
$thumbnailcount = $db->table("thumbnails")->count();
$friendshipcount = $db->table("friends")->where("status", "accepted")->count();
$commentcount = $db->table("comments")->count();
$renderjobcount = $db->table("jobs")->where("type", "2")->count();

$deletedcount = $db->table("moderation")->where("type", "deleted")->count();

$usercount = $usercount - $deletedcount;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/base.css?t=<?=time()?>">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600,700" rel="stylesheet" type="text/css">
    <title>watrbx - stats</title>
</head>
<body>
    <div id="main">
        <div id="welcome">
            <h1>stats</h1> 
            <p>watrbx stats (these do not update in realtime)</p>
            <ul>
                <li><?=number_format($usercount)?> Users</li>
                <li><?=number_format($assetcount)?> Assets</li>
                <li><?=number_format($thumbnailcount)?> Thumbnails</li>
                <li><?=number_format($friendshipcount)?> Friends</li>
                <li><?=number_format($commentcount)?> Comments</li>
                <li><?=number_format($renderjobcount)?> Items/Users waiting to be rendered.</li>
            </ul>
            <button onclick="location.reload()">Refresh</button><button style="margin-left: 5px;" onclick="location.href='/'">Home</button>
        </div>
    </div>   
</body>
</html>
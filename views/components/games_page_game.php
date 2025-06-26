<?php
use Cocur\Slugify\Slugify;
use watrbx\gameserver;
use watrlabs\authentication;
use watrbx\thumbnails;
$thumbs = new thumbnails();
$slugify = new Slugify();
$auth = new authentication();
$gameserver = new gameserver();
global $db;
$asseinfo = $db->table("assets")->where("id", $game->assetid);
$upvotes = $db->table("likes")->where("assetid", $game->assetid)->where("vote", 1)->count();
$downvotes = $db->table("likes")->where("assetid", $game->assetid)->where("vote", 0)->count();

$url = $thumbs->get_asset_thumb($game->assetid, "200x200");
$owner = $auth->getuserbyid($game->owner);

$bad = false;

?>
<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/<?=$game->id?>/<?=$slugify->slugify($game->title);?>" class="game-card-link">
        <div class="game-card-thumb-container">
<img class="game-card-thumb" src="<?=$url?>" alt="<?=$game->title?>"
                     thumbnail='{"Final":true,"Url":"<?=$url?>","RetryUrl":null}' image-retry />        </div>
        <div class="text-overflow game-card-name" title="Life in Paradise" ng-non-bindable>
            <?=$game->title?>
        </div>
        <div class="game-card-name-secondary">
            <?=$gameserver->get_active_players($game->assetid)?> Players Online
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="voting-container"
                     data-upvotes="<?=$upvotes?>"
                     data-downvotes="<?=$downvotes?>"
                     data-voting-processed="false">
                    <div class="vote-background "></div>
                    <div class="vote-percentage"></div>
                    <div class="vote-mask">
                        <div class="segment seg-1"></div>
                        <div class="segment seg-2"></div>
                        <div class="segment seg-3"></div>
                        <div class="segment seg-4"></div>
                    </div>
                </div>
                <div class="vote-thumbs-down">
                    <span class="icon-thumbs-down"></span>
                </div>
            </div>
            <div class="vote-counts">
                <div class="vote-down-count"><?=$upvotes?></div>
                <div class="vote-up-count"><?=$downvotes?></div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/<?=$owner->id?>/profile"><?=$owner->username?></a>
    </span>
    </div>
</li>
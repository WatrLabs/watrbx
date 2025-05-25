<?php
use Cocur\Slugify\Slugify;
$slugify = new Slugify();


global $db;

$query = $db->table("universes")->where("public", 1);

$allgames = $query->get();

foreach($allgames as $game){ 
    $upvotes = $db->table("likes")->where("assetid", $game->id)->where("vote", 1)->count();
    $downvotes = $db->table("likes")->where("assetid", $game->id)->where("vote", 0)->count();

    $bad = "false";
    ?>

<li class="list-item card game">
    <a href="/games/<?=$game->id?>/<?=$slugify->slugify($game->title);?>" class="card-item game-item">
        <span class="card-thumb-content game-thumb-content">
            <span class="card-thumb-wrapper game-thumb-wrapper"
                  >
                <img class="card-thumb game-thumb" src="/place.png" alt="Survival The PHP The Killers"
                     thumbnail='{"Final":true,"Url":"/place.png","RetryUrl":null}' image-retry />
            </span>
        </span>
        <span class="rbx-text-overflow rbx-game-title card-title" title="Survival The PHP The Killers" ng-non-bindable>
            <?=$game->title?>
        </span>
        <span class="rbx-game-text-notes rbx-font-xs card-text-notes">
            0 Players Online
        </span>
        <span class="rbx-votes">
            <div class="vote-bar">
                <div class="thumbs-up">
                    <span class="rbx-icon-thumbs-up"></span>
                </div>
                <div class="voting-container"
                     data-upvotes="<?=$upvotes?>"
                     data-downvotes="<?=$downvotes?>"
                     data-voting-processed="<?=$bad?>">
                    <div class="background "></div>
                    <div class="votes"></div>
                    <div class="mask">
                        <div class="segment seg-one"></div>
                        <div class="segment seg-two"></div>
                        <div class="segment seg-three"></div>
                        <div class="segment seg-four"></div>
                    </div>
                </div>
                <div class="thumbs-down">
                    <span class="rbx-icon-thumbs-down"></span>
                </div>
            </div>
            <div class="vote-counts">
                <div class="down-votes-count rbx-font-xs"><?=$downvotes?></div>
                <div class="up-votes-count rbx-font-xs"><?=$upvotes?></div>
            </div>
        </span>
        <span class="rbx-developer rbx-font-xs">
            by <cite class="rbx-link-sm" data-href="/User.aspx?ID=2">watrabi</cite>
        </span>
    </a>
</li>

<? } ?>

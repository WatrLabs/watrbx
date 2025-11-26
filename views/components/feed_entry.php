<?php

$poster = $auth->getuserbyid($feedentry->owner);
$headshot = $thumbs->get_user_thumb($feedentry->owner, "512x512", "headshot");
$feedentry->content = preg_replace('#\bhttps?://[^\s<]+#i','<a href="$0" target="_blank" rel="noopener">$0</a>',$feedentry->content);
?>

<li class="list-item">
    <a href="/users/<?=$poster->id?>/profile" class="list-header">
        <img class='header-thumb' src='<?=$headshot?>' />
    </a>
    <div class="list-body">
        <p class="list-content">
            <a href='/users/<?=$poster->id?>/profile'><?=$poster->username?></a>
            <div class='feedtext linkify'>"<?=$feedentry->content?>"</div>
        </p>
        <span class="rbx-text-notes rbx-font-sm"><?=date("n/j/Y \a\\t g:i A", $feedentry->date);?></span>
        <a href="/abusereport/Feed?id=<?=$feedentry->id?>">
            <span class="rbx-icon-report"></span>
        </a>
    </div>
</li>

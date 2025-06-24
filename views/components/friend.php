<?php
    use watrbx\thumbnails;
    $thumbs = new thumbnails();
    $character = $thumbs->get_user_thumb($friend->id, "250x250", "full");
?>
<li class="list-item friend">
    <a href="/users/<?=$friend->id?>/profile" class="friend-link" title="<?=$friend->username?>">
        <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=<?=$friend->id?>" data-js-files='/js/47e6e85800c4ed3c4eef848c077575a9.js.gzip'>
            <img alt='<?=$friend->username?>' class='' src='<?=$character?>' />
        </span>
        <span class="friend-name rbx-text-overflow"><?=$friend->username?></span>
    </a>
</li>
<!-- TODO: Friend Status (kinda implemented, kinda not it's weird.) -->
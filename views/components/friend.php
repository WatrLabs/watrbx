<?php
    $status = "";

    if($auth->is_online($friend->id)){
        $status = '<span class="friend-status rbx-icon-online" title="Website"></span>';
    }

    if($auth->is_ingame($friend->id)){
        $status = '<span class="friend-status rbx-icon-ingame" title="In-Game"></span>';
    }

    
    $character = $thumbs->get_user_thumb($friend->id, "250x250", "full");
?>
<li class="list-item friend">
    <a href="/users/<?=$friend->id?>/profile" class="friend-link" title="<?=$friend->username?>">
        <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=<?=$friend->id?>" data-js-files='/js/47e6e85800c4ed3c4eef848c077575a9.js.gzip'>
            <img alt='<?=$friend->username?>' class='' src='<?=$character?>' />
        </span>
        <span class="friend-name rbx-text-overflow"><?=$friend->username?></span>
        <?= $status?>
    </a>
</li>
<!-- TODO: Friend Status (kinda implemented, kinda not it's weird.) -->
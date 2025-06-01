<?php

use watrlabs\authentication;
$auth = new authentication();
$poster = $auth->getuserbyid($feedentry->owner);
?>

<li class="list-item">
    <a href="/users/<?=$poster->id?>/profile" class="list-header">
        <img class='header-thumb' src='/images/user.png' />
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

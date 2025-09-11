<?php
    use watrbx\relationship\friends;
    use watrlabs\watrkit\pagebuilder;
    use watrlabs\authentication;
    use watrbx\thumbnails;


    $auth = new authentication();
    $friends = new friends();
    $pagebuilder = new pagebuilder();
    $thumbs = new thumbnails();

    $allfriends = $friends->get_friends($userid, 9);
    $friendcount = $friends->get_friend_count($userid);

?>
<div class="<? if(isset($ishome)){if($ishome){echo 'col-xs-12'; }}?> section home-friends">
  <div class="container-header">
    <h3>Friends (<?=$friendcount?>)</h3>
    <a href="/users/<?=$userid?>/friends" class="rbx-btn-secondary-xs btn-more">See All</a>
  </div>
  <ul class="hlist friend-list">
    <?php
        foreach ($allfriends as $friend){
            $pagebuilder->build_component("friend", ["friend"=>$friend, "thumbs"=>$thumbs, "auth"=>$auth]);
        }
    ?>
  </ul>
</div>
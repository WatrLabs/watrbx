<?php
    use watrbx\relationship\friends;
    use watrlabs\watrkit\pagebuilder;
    use watrlabs\authentication;

    $auth = new authentication();
    $friends = new friends();
    $pagebuilder = new pagebuilder();

    $allfriends = $friends->get_friends($userid);
    $friendcount = count($allfriends);
?>
<div class="<? if(isset($ishome)){if($ishome){echo 'col-xs-12'; }}?> section home-friends">
  <div class="container-header">
    <h3>Friends (<?=$friendcount?>)</h3>
    <a href="/friends.aspx#FriendsTab" class="rbx-btn-secondary-xs btn-more">See All</a>
  </div>
  <ul class="hlist friend-list">
    <?php
        foreach ($allfriends as $friend){
            $pagebuilder->build_component("friend", ["friend"=>$friend]);
        }
    ?>
  </ul>
</div>
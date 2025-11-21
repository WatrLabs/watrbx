<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\router\Routing;
use watrbx\gameserver;
use Cocur\Slugify\Slugify;
use watrlabs\authentication;
use watrbx\thumbnails;
use watrlabs\fastflags;
use watrbx\gamealgorithm;
use watrbx\relationship\friends;
$friends = new friends();
$thumbs = new thumbnails();
$slugify = new Slugify();
$auth = new authentication();
$pagebuilder = new pagebuilder();
$gameserver = new gameserver();
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=leanbase___213b3e760be9513b17fafaa821f394bf_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___5c81dac2107fac0cca40ea7d6cfd0c89_m.css');
$pagebuilder->addresource('jsfiles', '/js/2580e8485e871856bb8abe4d0d297bd2.js.gzip');
$router = new Routing();

global $db;
global $currentuser;

$arefriends = false;
$pendingrequest = 'false';
$incomingfriendrequestid = 0;
$userinfo = $db->table("users")->where("id", $userid)->first();

if($userinfo == null){
    $router->return_status(404);
    die();
}

$is_deleted = $db->table("moderation")->where("userid", $userinfo->id)->where("type", "deleted")->first();

if($is_deleted !== null){
    die();
    $router->return_status(404);
}

$status = "";

    if($auth->is_online($userinfo->id)){
        $status = '<span class="profile-avatar-status rbx-icon-online" title="Website"></span>';
    }

    if($auth->is_ingame($userinfo->id)){
        $status = '<span class="profile-avatar-status rbx-icon-ingame" title="In-Game"></span>';
    }

if($auth->hasaccount()){
    $loggedininfo = $currentuser;

    //$userid, $friendid

    $arefriends = $friends->are_friends($loggedininfo->id, $userinfo->id);

    if(!$arefriends){
        $pending = $friends->get_pending_request($loggedininfo->id, $userinfo->id);
        if($pending !== null){
            $incomingfriendrequestid = $pending->id;
        } else {
            $sendpendingrequest = $friends->get_pending_request($userinfo->id, $loggedininfo->id);
            if($sendpendingrequest !== null){
                $pendingrequest = "true";
            }
        }
    }

    if($loggedininfo->id == $userinfo->id){
        $self = true;
    } else {
        $self = false;
    }

} else {
    $self = false;
}

if ($userinfo->membership !== "None") {
    if ($userinfo->membership == "OutrageousBuildersClub") {
        $bc = '<span class="rbx-icon-obc"></span>';
    } elseif ($userinfo->membership == "TurboBuildersClub") {
        $bc = '<span class="rbx-icon-tbc"></span>';
    } else {
        $bc = '<span class="rbx-icon-bc"></span>';
    }
} else {
    $bc = null;
}

$headshot = $thumbs->get_user_thumb($userinfo->id, "512x512", "headshot");
$full = $thumbs->get_user_thumb($userinfo->id, "1024x1024", "full");

$currentlywearing = $db->table("wearingitems")->where("userid", $userinfo->id);


$wearingitems = [];


//$currentlywearing = $db->table("assets")->where("featured", 1)->whereIn("prodcategory", [2, 8, 11, 12, 17, 18, 19, 32])->orderBy("created", "DESC")->get();

//STATS BACKEND

$allfriends = $friends->get_friends($userid);

$allplaces = $db->table("assets")
    ->where("prodcategory", 9)
    ->where("owner", $userinfo->id);

$totalvisits = 0;
foreach($allplaces as $placeid){
    $totalvisits += $db->table("visits")->where("universeid", $placeid)->count();
}
$forumposts = $db->table("forum_posts")->where("userid", $userinfo->id)->count();

$pagebuilder->set_page_name($userinfo->username);
$pagebuilder->buildheader();

?>
<div class="content  ">

                                        <div id="Leaderboard-Abp" class="abp leaderboard-abp">
                    

    <iframe allowtransparency="true"
            frameborder="0"
            height="110"
            scrolling="no"
            src="/userads/1"
            width="728"
            data-js-adtype="iframead"></iframe>

                </div>
            


<script type="text/javascript">
    var Roblox = Roblox || {};
</script>

<div class="profile-container" ng-modules="robloxApp, profile, robloxApp.helpers">


<div class="section profile-header">

<div class="profile-header-content" ng-controller="profileHeaderController">


<div data-userid="<?=$userinfo->id?>"
     data-profileuserid="<?=$userinfo->id?>"
     data-profileusername="<?=$userinfo->username?>"
     data-friendscount="<?=count($allfriends)?>"
     data-followerscount="0"
     data-followingscount="0"
     data-acceptfriendrequesturl="/api/friends/acceptfriendrequest"
     data-incomingfriendrequestid="<? if($incomingfriendrequestid !== 0 && $pendingrequest == 'true'){ echo $sendpendingrequest->id; } else { echo $incomingfriendrequestid; }?>"
     data-arefriends=<?php if($arefriends){ echo "true"; } else { echo "false"; } ?>

     data-friendurl="/users/<?=$userinfo->id?>/friends"
     data-incomingfriendrequestpending=<?if($incomingfriendrequestid !== 0){ echo "true"; } else { echo "false"; }?>

     data-maysendfriendinvitation=<?if($incomingfriendrequestid == 0 && $pendingrequest == 'false' && $currentuser !== null){ echo "true"; } else { echo "false"; }?>

     data-friendrequestpending=<?=$pendingrequest?>

     data-sendfriendrequesturl="/api/friends/sendfriendrequest"
     data-removefriendrequesturl="/api/friends/removefriend"
     data-mayfollow=<?if($self || $currentuser == null){ echo "false"; } else { echo "true"; }?>
     data-isfollowing=false
     data-followurl="/user/follow"
     data-unfollowurl="/api/user/unfollow"
     data-canmessage=<?if($self || $currentuser == null){ echo "false"; } else { echo "true"; }?>

     data-messageurl="/messages/compose?recipientId=<?=$userinfo->id?>"
     data-canbefollowed=<?if($self || $currentuser == null){ echo "false"; } else { echo "true"; }?>

     data-cantrade=<?if($self || $currentuser == null){ echo "false"; } else { echo "true"; }?>

     data-isblockbuttonvisible=<?if($self || $currentuser == null){ echo "false"; } else { echo "true"; }?>

     data-getfollowscript="Roblox.GameLauncher.followPlayerIntoGame(<?=$userinfo->id?>);"
     data-ismorebtnvisible="true"
     data-isvieweeblocked=true
     data-mayimpersonate=false
     data-impersonateurl=""
     data-mayupdatestatus="<?if($self && $currentuser !== null){ echo "true"; } else { echo "false"; }?>"
     data-updatestatusurl="/home/updatestatus"
     data-statustext='<?=$userinfo->blurb?>'
     data-editstatusmaxlength="254"
     profile-header-data
     profile-header-layout="profileHeaderLayout"
     class="hidden"></div>
    <div class="profile-header-top">
        <div class="profile-avatar-image" ng-non-bindable>
            <span class="avatar-image-link">
                    <img alt="<?=$userinfo->username?>" class="profile-avatar-thumb" src="<?=$headshot?>">
                </span>
            <script type="text/javascript">
                $("img.profile-avatar-thumb").on('load', function() {
                    if (Roblox && Roblox.Performance) {
                        Roblox.Performance.setPerformanceMark("head_avatar");
                    }
                });
            </script>
                     <?=$status?>
        </div>
        <div class="header-title">
            <h1><?=$userinfo->username?></h1>
            <?=$bc?>
        </div>
<div class="header-userstatus">
    <div class="header-userstatus-text"
         ng-hide="profileHeaderLayout.statusFormShown">
        <span id="userStatusText"
              ng-class="{'userstatus-editable' : profileHeaderLayout.mayUpdateStatus}"
              ng-bind="profileHeaderLayout.statusText | statusfilter"
              ng-click="revealStatusForm()"
              ng-cloak></span>
    </div>
        <div class="rbx-form-horizontal"
             id="statusForm"
             role="form"
             ng-cloak
             ng-show="profileHeaderLayout.statusFormShown"
             ng-class="{'rbx-form-has-error': profileHeaderLayout.hasError }">
            <div class="rbx-form-group">
                <input class="form-control rbx-input-field"
                       id="txtStatusMessage"
                       maxlength="{{profileHeaderLayout.editStatusMaxLength}}"
                       ng-cloak
                       placeholder="What are you up to?"
                       ng-model="profileHeaderLayout.statusTextInput"
                       status-input-element
                       key-press-enter="updateStatus(true)"
                       key-press-escape="blurStatusForm($event)" />
            </div>
            <button class="rbx-btn-control-sm header-userstatus-share-button"
                    ng-click="updateStatus(true)"
                    ng-hide="profileHeaderLayout.statusFormSending">
                Save
            </button>
            <img id="loadingImage"
                 class="header-userstatus-share-progress"
                 ng-show="profileHeaderLayout.statusFormSending"
                 alt="Sharing..."
                 src="/images/ec4e85b0c4396cf753a06fade0a8d8af.gif" />
        </div>
</div>        <div class="header-details">
            <ul class="details-info">
                <li>
                    <div>Friends</div>
                    <div class="rbx-lead">
                        <a class="rbx-link" href="/users/<?=$userinfo->id?>/friends#!/friends" ng-cloak>{{profileHeaderLayout.friendsCount | number }}</a>
                    </div>
                </li>
                <li>
                    <div>Followers</div>
                    <div class="rbx-lead">
                        <a class="rbx-link" href="/users/<?=$userinfo->id?>/friends#!/followers" ng-cloak>{{profileHeaderLayout.followersCount}}</a>
                    </div>
                </li>
                <li>
                    <div>Following</div>
                    <div class="rbx-lead">
                        <a class="rbx-link" href="/users/<?=$userinfo->id?>/friends#!/following" ng-cloak>{{profileHeaderLayout.followingsCount}}</a>
                    </div>
                </li>
                
            </ul>
            <ul class="details-actions hidden-xs">
                <? if(!$self) {?>
                    <li class="btn-friends" ng-if="!profileHeaderLayout.areFriends" ng-cloak>
                        <button ng-if="profileHeaderLayout.incomingFriendRequestPending"
                                ng-cloak
                                class="rbx-btn-control-sm"
                                data-target-url="/api/friends/acceptfriendrequest"
                                data-friend-request-id="0"
                                data-target-user-id="<?=$userid?>"
                                data-friends-url="/friends.aspx"
                                ng-click="acceptFriendRequest()">
                            Accept
                        </button>
                        <button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                            && profileHeaderLayout.maySendFriendInvitation"
                                ng-cloak
                                class="rbx-btn-control-sm"
                                ng-click="sendFriendRequest()">
                            Add Friend
                        </button>
                        <button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                        && !profileHeaderLayout.maySendFriendInvitation
                                        && profileHeaderLayout.friendRequestPending"
                                ng-cloak
                                class="rbx-btn-control-sm disabled">
                            Pending
                        </button>
                        <button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                        && !profileHeaderLayout.maySendFriendInvitation
                                        && !profileHeaderLayout.friendRequestPending"
                                ng-cloak
                                class="rbx-btn-control-sm disabled">
                            Add Friend
                        </button>

                    </li>
                    <li class="btn-friends" ng-if="profileHeaderLayout.areFriends" ng-cloak>
                        <button class="rbx-btn-control-sm"
                                data-target-url="/api/friends/removefriend"
                                data-target-user-id="<?=$userid?>"
                                ng-mouseenter="hover = true"
                                ng-mouseleave="hover =false"
                                ng-class="{'btn-unfollow': hover}"
                                ng-click="removeFriend()">
                            Unfriend
                        </button>
                    </li>
                    <li class="btn-messages">
                        <button class="rbx-btn-control-sm"
                                ng-disabled="!profileHeaderLayout.canMessage || profileHeaderLayout.userId == 0"
                                ng-click="sendMessage()"
                                ng-cloak>
                            Message
                        </button>
                    </li>
                    <li class="btn-follow" ng-if="profileHeaderLayout.mayFollow" ng-cloak>
                        <button class="rbx-btn-control-sm"
                                ng-click="unFollow()"
                                ng-cloak
                                ng-if="profileHeaderLayout.isFollowing"
                                ng-mouseenter="hover = true"
                                ng-mouseleave="hover =false"
                                ng-class="{'btn-unfollow': hover}">
                            <span ng-show="!hover">Following</span>
                            <span ng-show="hover">Unfollow</span>
                        </button>

                        <button class="rbx-btn-control-sm"
                                ng-click="follow()"
                                ng-cloak
                                ng-if="!profileHeaderLayout.isFollowing">
                            Follow
                        </button>
                    </li>
                    <? } ?>
            </ul>
            
        </div><!--header-details-->
    </div>

        <p ng-show="profileHeaderLayout.hasError" ng-cloak class="rbx-font-sm rbx-text-danger header-details-error">{{profileHeaderLayout.errorMsg}}</p>
        <div id="profile-header-more" class="profile-header-more" ng-show="profileHeaderLayout.isMoreBtnVisible"
             ng-cloak>
            <a id="popover-link" class="rbx-menu-item" data-toggle="popover" data-bind="profile-header-popover-content">
                <span class="rbx-icon-more"></span>
            </a>
            <div id="popover-content" class="rbx-popover-content" data-toggle="profile-header-popover-content">
                <ul class="rbx-dropdown-menu" role="menu">
                    <li ng-show="profileHeaderLayout.canBeFollowed" ng-cloak><a id="profile-join-game">Join Game</a></li>
                        <li ng-show="profileHeaderLayout.canTrade" ng-cloak><a ng-click="tradeItems()" id="profile-trade-items">Trade Items</a></li>
                    <li ng-show="profileHeaderLayout.isBlockButtonVisible" ng-cloak>
                        <a ng-bind="!profileHeaderLayout.isVieweeBlocked ? 'Block User' : 'Unblock User'"
                           ng-click="blockUser()"
                           id="profile-block-user"
                           ng-cloak></a>
                    </li>
                                            <li ng-show="profileHeaderLayout.mayUpdateStatus">
                            <a ng-click="revealStatusForm()" id="profile-header-update-status">Update Status</a>
                        </li>

                </ul>
            </div>
            <script type="text/javascript">
                $(function() {
                    $("#profile-header-more").on("click touchstart", "#profile-join-game", function() {
                        // NOTE: global var set due to legacy game launch code.
                        play_placeId = 0;
                        Roblox.GameLauncher.followPlayerIntoGame(<?=$userinfo->id?>);
                    });
                });
            </script>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-block-user-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="rbx-icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h4>Warning</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to unblock this user?
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="rbx-btn-control-xs" ng-click="submit()">
                        Unblock
                    </button>

                    <button type="button" class="rbx-btn-secondary-xs" ng-click="close()">
                        Cancel
                    </button>
            </div>
            </div><!-- /.modal-content -->
    </script>
</div>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-unblock-user-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="rbx-icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h4>Warning</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to block this user?
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="rbx-btn-control-xs" ng-click="submit()">
                        Block
                    </button>

                    <button type="button" class="rbx-btn-secondary-xs" ng-click="close()">
                        Cancel
                    </button>
            </div>
                <p class="rbx-font-sm modal-footer-note">When you&#39;ve blocked a user, neither of you can directly contact the other.</p>
            </div><!-- /.modal-content -->
    </script>
</div>
        </div>
    </div><!--profile-header-content-->
</div><!-- profile-header -->
    <div class="rbx-tabs-horizontal">
        <ul id="horizontal-tabs" class="nav nav-tabs" role="tablist">
            <li class="rbx-tab active">
                <a class="rbx-tab-heading" href="#about" id="tab-about">
                    <span class="rbx-lead">About</span>
                    <span class="rbx-tab-subtitle"></span>
                </a>
            </li>
            <li class="rbx-tab">
                <a class="rbx-tab-heading" href="#creations" id="tab-creations">
                    <span class="rbx-lead">Creations</span>
                    <span class="rbx-tab-subtitle"></span>
                </a>
            </li>
        </ul>
        <div class="tab-content rbx-tab-content">
            <div class="tab-pane active" id="about">
                <div class="section profile-about" ng-controller="profileUtilitiesController">
    <div class="container-header">
        <h3>ABOUT</h3>
    </div>
    <div class="profile-about-content">
        <p class="rbx-para-overflow"
           ng-class="{'profile-blurb-more': !layoutContent.showMore}"
           truncate
           layout-content="layoutContent">
           
            <span class="profile-about-content-text" ng-non-bindable><? if($userinfo->about) { echo $userinfo->about; }?></span>
        </p>
        <span class="rbx-font-bold show-more-link"
              ng-show="layoutContent.hasMoreContent"
              ng-click="toggleContent(layoutContent.showMore)"
              ng-cloak>Read {{layoutContent.linkName}}</span>
    </div>
    <div class="rbx-font-sm profile-about-footer">
            <a href="/abusereport/UserProfile?id=<?=$userinfo->id?>&amp;redirectUrl=http%3A%2F%2Fwww.roblox.com%2Fusers%2F<?=$userinfo->id?>%2Fprofile" class="abuse-report-link">
                <span class="rbx-text-danger">Report Abuse</span>
            </a>

            <span class="profile-name-history">
                This user has changed names
                <span data-toggle="tooltip" title="" data-original-title="username1">
                    <span class="rbx-icon-moreinfo"></span>
                </span>
            </span>
    </div>
</div>
<div class="container-list profile-avatar">
    <h3>CURRENTLY WEARING</h3>
    <div class="col-sm-6 profile-avatar-left">


<div id="UserAvatar" class="thumbnail-holder" data-reset-enabled-every-page data-3d-thumbs-enabled 
     data-url="/thumbnail/user-avatar?userId=<?=$userinfo->id?>&amp;thumbnailFormatId=124&amp;width=300&amp;height=300" style="width:300px; height:300px;">
    <span class="thumbnail-span" data-3d-url="/avatar-thumbnail-3d/json?userId=<?=$userinfo->id?>"  data-js-files='/js/47e6e85800c4ed3c4eef848c077575a9.js.gzip' ><img alt='<?=$userinfo->username?>' class='' src='<?=$full?>' /></span>
    <span class="enable-three-dee btn-control btn-control-small"></span>
</div>


    </div>
        <div class="col-sm-6 profile-avatar-right">
            <div class="profile-avatar-mask">

<div class="profile-accoutrements-container" ng-controller="profileAccoutrementsController">
<div data-numberofaccoutrements="8"
     data-accoutrementsperpage="8"
     data-intouchscreen=false
     profile-accoutrements-data
     profile-accoutrements-layout="profileAccoutrementsLayout"
     class="hidden"></div>
    <div id="accoutrements-slider" class="profile-accoutrements-slider"
         profile-accoutrements-slider
         profile-accoutrements-layout="profileAccoutrementsLayout">
                    <ul class="accoutrement-items-container">
                <li class="accoutrement-item" ng-non-bindable>
                    <a href="/roblox-039-r-039-baseball-cap-item?id=8">
                        <img title="Roblox 'R' Baseball Cap" alt="Roblox 'R' Baseball Cap" class="accoutrement-image" src="/images/defaultimage.png" style="width: 100px; height: 100px;" width="100" height="100" />
                    </a>
                </li>

                <?php
                    
                    foreach ($wearingitems as $item){
                        $itemthumb = $thumbs->get_asset_thumb($item->id);
                        ?>

                     <li class="accoutrement-item" ng-non-bindable>
                        <a href="/item-item?id=<?=$item->id?>">
                            <img title="<?=$item->name?>" alt="<?=$item->name?>" class="accoutrement-image" src="<?=$itemthumb?>" style="width: 100px; height: 100px;" width="100" height="100" />
                        </a>
                    </li>

                    <? } ?>

                

                    </ul>

    </div><!--profile-accoutrement-slider-->
    <div id="accoutrements-page" class="profile-accoutrements-page-container"
         profile-accoutrements-page
         profile-accoutrements-layout="profileAccoutrementsLayout">
        <span class="profile-accoutrements-page hidden" 
              ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 0}" 
              ng-click="getAccoutrementsPage(0)"></span>
        <span class="profile-accoutrements-page hidden"
              ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 1}"
              ng-click="getAccoutrementsPage(1)"></span>
    </div>
</div>
            </div>
        </div>
</div>

    <?php
        if(count($allfriends) !== 0){
            $pagebuilder->build_component("friend_container", ["userid"=>$userinfo->id]);
        }
    ?>
    <!--
    <div class="section profile-collections" ng-controller="profileCollectionsController">
        <div class="container-header">
            <h3>Collections</h3>
            <div class="collection-btns">
                    <a href="/users/<?=$userinfo->id?>/inventory/" class="rbx-btn-secondary-xs btn-more inventory-link">Inventory</a>
                            </div>
        </div>
                <ul class="hlist collections-list item-list">
                    <li class="list-item asset-item collections-item">
                        <a href="/Festive-DJ-item?id=329806124" class="collections-link" title="Festive DJ">
                            <img src="/images/defaultimage.png" alt="Festive DJ" thumbnail='{"Final":true,"Url":"/images/defaultimage.png","RetryUrl":null}' image-retry />
                            <span class="item-name rbx-text-overflow">Festive DJ</span>
                        </a>
            
                    </li>
        </ul>

    </div>
    -->

    
    <div class="container-list" ng-controller="profileGridController" ng-init="init('group-list','group-container')">
    <div class="group-header">
        <h3>GROUPS</h3>
        <div ng-cloak class="container-buttons">
            <button class="profile-view-selector" title="Slideshow View" type="button" ng-click="updateDisplay(false)" ng-class="{'rbx-btn-secondary-xs': !isGridOn, 'rbx-btn-control-xs': isGridOn}">
                <span class="rbx-icon-slideshow" ng-class="{'selected': !isGridOn}"></span>
            </button>
            <button class="profile-view-selector" title="Grid View" type="button" ng-click="updateDisplay(true)" ng-class="{'rbx-btn-secondary-xs': isGridOn, 'rbx-btn-control-xs': !isGridOn}">
                <span class="rbx-icon-grid" ng-class="{'selected': isGridOn}"></span>
            </button>
        </div>
    </div>
<div class="profile-slide-container">
            <div ng-show="isGridOn">
                <ul class="hlist group-list" style="max-height: {{containerHeight}}px" horizontal-scroll-bar="loadMore()">
                                <div class="group-container" data-index="0" ng-class="{'shown': 0 < visibleItems}">


<li class="list-item card group">
    <a href="/groups/group.aspx?gid=1" class="card-item group-item">
        <span class="card-thumb-content">
            <span class="card-thumb-wrapper">
                <img class="card-thumb group-thumb" data-src="<?=$full = $thumbs->get_user_thumb(1, "1024x1024", "full");?>" alt="watrbx fan club" />
            </span>
        </span>
        <span class="rbx-text-overflow card-title" title="watrbx fan club" ng-non-bindable>
        watrbx fan club
        </span>
        <span class="rbx-font-xs card-text-notes">
            2 Members
        </span>
        <span class="rbx-font-xs card-text-notes" ng-non-bindable>
            Member
        </span>
    </a>
</li>

                                </div>
                                <div class="group-container" data-index="1" ng-class="{'shown': 1 < visibleItems}">
                                </div>

                </ul>

                <a ng-cloak ng-click="loadMore()" class="btn rbx-btn-control-xs load-more-button" ng-show="5 > 6 * NumberOfVisibleRows">Load More</a>
            </div>

            <div id="groups-switcher" class="rbx-switcher slide-switcher groups" switcher itemscount="switcher.groups.itemsCount" currpage="switcher.groups.currPage" ng-hide="isGridOn">
                                <ul class="slide-items-container rbx-switcher-items hlist">
                    <li class="rbx-switcher-item profile-slide-item active" ng-class="{'active': switcher.groups.currPage == 0}" data-index="0">
                        <div class="col-sm-6 profile-slide-item-left">
                            <div class="slide-item-emblem-container">
                                <a href="/groups/group.aspx?gid=1">
                                        <img class="group-item-image" src="<?=$full = $thumbs->get_user_thumb(1, "1024x1024", "full");?>" data-src="<?=$full = $thumbs->get_user_thumb(1, "1024x1024", "full");?>" data-emblem-id="1" />


                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 profile-slide-item-right groups">
                            <div class="slide-item-info">
                                <h2 class="slide-item-name groups" ng-non-bindable>watrbx fan club</h2>
                                <p class="slide-item-description groups" ng-non-bindable>watrbx fan club
</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <p class="slide-item-stat-title rbx-font-bold">Members</p>
                                        <p class="slide-item-members-count rbx-font-bold">2</p>
                                    </li>
                                    <li class="list-item">
                                        <p class="slide-item-stat-title rbx-font-bold">Rank</p>
                                        <p class="slide-item-my-rank rbx-font-bold groups" ng-non-bindable>Member</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>

                    <a class="rbx-switcher-control left" data-switch="prev"><span class="glyphicon glyphicon-chevron-left rbx-icon-carousel-left"></span></a>
                    <a class="rbx-switcher-control right" data-switch="next"><span class="glyphicon glyphicon-chevron-left rbx-icon-carousel-right"></span></a>

    </div>


    
</div>

</div>


<!--

        <div class="section" ng-controller="profileUtilitiesController">
            <div class="container-header">
                <h3>Roblox Badges <span class="assets-count">(4)</span></h3>

                <a ng-click="toggleContent(layoutContent.showMore)"
                   class="rbx-btn-secondary-xs btn-more see-more-roblox-badges-button"
                   ng-show="layoutContent.hasMoreContent"
                   ng-cloak>See{{layoutContent.linkName}}</a>
            </div>

            <ul class="hlist badge-list" truncate layout-content="layoutContent" ng-class="{'badge-list-more': !layoutContent.showMore}">
                <li class="list-item badge-item asset-item" ng-non-bindable>
                    <a href="/Badges.aspx#Badge3" class="badge-link" title="Combat Initiation">
                        <span class="rbx-icon-combat-initiation" title="Combat Initiation"></span>
                        <span class="item-name rbx-text-overflow">Combat Initiation</span>
                    </a>
                </li>
                <li class="list-item badge-item asset-item" ng-non-bindable>
                    <a href="/Badges.aspx#Badge4" class="badge-link" title="Warrior">
                        <span class="rbx-icon-warrior" title="Warrior"></span>
                        <span class="item-name rbx-text-overflow">Warrior</span>
                    </a>
                </li>
                <li class="list-item badge-item asset-item" ng-non-bindable>
                    <a href="/Badges.aspx#Badge2" class="badge-link" title="Friendship">
                        <span class="rbx-icon-friendship" title="Friendship"></span>
                        <span class="item-name rbx-text-overflow">Friendship</span>
                    </a>
                </li>
                <li class="list-item badge-item asset-item" ng-non-bindable>
                    <a href="/Badges.aspx#Badge12" class="badge-link" title="Veteran">
                        <span class="rbx-icon-veteran" title="Veteran"></span>
                        <span class="item-name rbx-text-overflow">Veteran</span>
                    </a>
                </li>
        </ul>
        <a ng-click="loadMore()" class="btn rbx-btn-control-xs load-more-badges" ng-show="layoutContent.hasMoreContent && layoutContent.showMore" ng-cloak>Load More</a>

</div>

        <div class="section" ng-controller="profileUtilitiesController">
            <div class="container-header">
                <h3>Player Badges <span class="assets-count">(1)</span></h3>
                        <a href="/users/<?=$userinfo->id?>/inventory/#!/badges" class="btn rbx-btn-secondary-xs btn-more">See All</a>
           
            </div>

            <ul class="hlist badge-list">
                <li class="list-item badge-item asset-item">
                    <a href="/#" class="badge-link" title="AAAUUUUGHHHHH">
                        <img src="/temp/07b49d720238e3b83c9c058536e212ed.png" alt="AAAUUUUGHHHHH" thumbnail='{"Final":true,"Url":"https://t1.rbxcdn.com/07b49d720238e3b83c9c058536e212ed","RetryUrl":null}' image-retry>
                        <span class="item-name rbx-text-overflow" ng-non-bindable>AAAUUUUGHHHHH</span>
                    </a>
                </li>
        </ul>

</div>

    -->
        

<div class="section profile-statistics">
    <h3>STATISTICS</h3>

    <ul class="profile-stats-container">
        <li class="profile-stat">
            <p class="stat-title">Join Date</p>
            <p class="rbx-lead"><?=date("n/j/Y", $userinfo->regtime);?></p>
        </li>
        <li class="profile-stat">
            <p class="stat-title">Place Visits</p>
            <p class="rbx-lead"><?=number_format($totalvisits)?></p>
        </li>
        <li class="profile-stat">
            <p class="stat-title">Forum Posts</p>
            <p class="rbx-lead"><?=number_format($forumposts)?></p>
        </li>
    </ul>
</div>


            </div>
            <div class="tab-pane" id="creations">
                
    <div class="profile-game" ng-controller="profileGridController" ng-init="init('game-list','game-container')">
        <div class="container-header">
            <h3 ng-non-bindable>Games</h3>
            <div class="container-buttons">
                <button class="profile-view-selector" title="Slideshow View" type="button" ng-click="updateDisplay(false)" ng-class="{'rbx-btn-secondary-xs': !isGridOn, 'rbx-btn-control-xs': isGridOn}">
                    <span class="rbx-icon-slideshow" ng-class="{'selected': !isGridOn}"></span>
                </button>
                <button class="profile-view-selector" title="Grid View" type="button" ng-click="updateDisplay(true)" ng-class="{'rbx-btn-secondary-xs': isGridOn, 'rbx-btn-control-xs': !isGridOn}">
                    <span class="rbx-icon-grid" ng-class="{'selected': isGridOn}"></span>
                </button>
            </div>
        </div>
        <div ng-show="isGridOn" class="game-grid">
            <ul class="hlist game-list" style="max-height: {{containerHeight}}px" horizontal-scroll-bar="loadMore()">
                        <div class="game-container" data-index="0" ng-class="{'shown': 0 < visibleItems}">

<?php
$usergames = $db->table("universes")
    ->where("owner", $userinfo->id)
    ->limit(6)
    ->get();

if(count($usergames) > 0){
    foreach($usergames as $game){
        $pagebuilder->build_component("game", ["game" => $game, "thumbs"=>$thumbs, "slugify"=>$slugify, "auth"=>$auth, "gameserver"=>$gameserver]);
    }
} else {
    echo '<p class="section-content-off">This user has no public creations.</p>';
}
?>


                        </div>

            </ul>

            <a ng-click="loadMore()" class="btn rbx-btn-control-xs load-more-button" ng-show="1 > 6 * NumberOfVisibleRows">Load More</a>
        </div>
        <div id="games-switcher" class="rbx-switcher slide-switcher games" ng-hide="isGridOn" switcher itemscount="switcher.games.itemsCount" currpage="switcher.games.currPage">
                        <ul class="slide-items-container rbx-switcher-items hlist">
                    <li class="rbx-switcher-item profile-slide-item active" ng-class="{'active': switcher.games.currPage == 0}" data-index="0">
                        <div class="col-sm-6 profile-slide-item-left">
                            <div class="slide-item-emblem-container">
                                <a href="/games/239335015/Place-7">
                            <img class="game-item-image"
                                 src="https://watrbx.wtf/place.png"
                                 data-src="https://watrbx.wtf/place.png"
                                 data-emblem-id="239335015" thumbnail='{"Final":true,"Url":"https://watrbx.wtf/place.png","RetryUrl":null}' image-retry />

                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 profile-slide-item-right games">
                            <div class="slide-item-info">
                                <h2 class="slide-item-name games" ng-non-bindable>Work At A Pizza Place!</h2>
                                <p class="slide-item-description games" ng-non-bindable></p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <p class="slide-item-stat-title rbx-font-bold">Players Online</p>
                                        <p class="slide-item-members-count rbx-font-bold">0</p>
                                    </li>
                                    <li class="list-item">
                                        <p class="slide-item-stat-title rbx-font-bold">Visits</p>
                                        <p class="slide-item-my-rank rbx-font-bold games">0</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                        </ul>


        </div>
    </div>






            </div>
        </div>
    </div>
</div>
<div>
    <div class="profile-ads-container">
        <div id="ProfilePageAdDiv1" class="profile-ad">


    <iframe allowtransparency="true"
            frameborder="0"
            height="270"
            scrolling="no"
            src="/userads/3"
            width="300"
            data-js-adtype="iframead"></iframe>

        </div>
        <div id="ProfilePageAdDiv2" class="profile-ad">


    <iframe allowtransparency="true"
            frameborder="0"
            height="270"
            scrolling="no"
            src="/userads/3"
            width="300"
            data-js-adtype="iframead"></iframe>

        </div>
    </div>
</div>

            
        </div>
            </div> 

<footer class="container-footer">
    <div class="footer">
        <ul class="row footer-links">
                <li class="col-xs-4 col-sm-2 footer-link">
                    <a href="https://corp.roblox.com" class="roblox-interstitial" target="_blank">
                        <h2>About Us</h2>
                    </a>
                </li>
                <li class="col-xs-4 col-sm-2 footer-link">
                    <a href="https://corp.roblox.com/jobs" class="roblox-interstitial" target="_blank">
                        <h2>Jobs</h2>
                    </a>
                </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="https://blog.roblox.com" target="_blank">
                    <h2>Blog</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="/Info/Privacy.aspx" target="_blank">
                    <h2>Privacy</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="https://corp.roblox.com/parents" class="roblox-interstitial" target="_blank">
                    <h2>Parents</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="https://en.help.roblox.com/" class="roblox-interstitial" target="_blank">
                    <h2>Help</h2>
                </a>
            </li>
        </ul>
        <p class="footer-note">
            ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a target="_blank" href="https://corp.roblox.com" class="rbx-link roblox-interstitial">ROBLOX Corporation</a>, ©2015.
            Patents pending. ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
            Use of this site signifies your acceptance of the <a href="/info/terms-of-service" target="_blank" class="rbx-link">Terms and Conditions</a>.
        </p>
    </div>
</footer>


</div> 



<div id="usernotifications-data-model"
     class="hidden"
     data-notificationsdomain="https://www.watrbx.wtf/"
     data-notificationstestinterval="5000"
     data-notificationsmaxconnectiontime="43200000">
</div>    <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.ChatTemplates = {
            ChatBarTemplate: "chat-bar",
            AbuseReportTemplate: "chat-abuse-report",
            DialogTemplate: "chat-dialog",
            FriendsSelectionTemplate: "chat-friends-selection",
            GroupDialogTemplate: "chat-group-dialog",
            NewGroupTemplate: "chat-new-group",
            DialogMinimizeTemplate: "chat-dialog-minimize"
        };
        Roblox.Chat = {
            SoundFile: "/Chat/sound/chatsound.mp3"
        };
        Roblox.Party = {};
        Roblox.Party.SetGoogleAnalyticsCallback = function () {
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
        };

    </script>


<div id="chat-container" class="chat chat-container"
     ng-modules="robloxApp, chat"
     ng-controller="chatController"
     ng-class="{'collapsed': chatLibrary.chatLayout.collapsed}"
     ng-cloak>
    <!--chatLibrary.deviceType === deviceType.TABLET && ,
                'tablet-inapp': chatLibrary.tabletInApp-->
<div id="chat-data-model"
     class="hidden"
     chat-data
     chat-view-model="chatViewModel"
     chat-library="chatLibrary"
     data-userid="<?=$userinfo->id?>"
     data-domain="<?=$_ENV["APP_DOMAIN"]?>"
     data-gamespagelink="/games"
     data-chatdomain="/"
     data-numberofmembersforpartychrome="6"
     data-avatarheadshotsmultigetlimit="100"
     data-userpresencemultigetlimit="100"
     data-intervalofchangetitleforpartychrome="500"
     data-spinner="https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif"
     data-notificationsdomain="https://www.watrbx.wtf/"
     data-devicetype="Computer"
     data-inapp=false
     data-smallerchatenabled=true
     data-cleanpartyfromconversationenabled=false>
</div>
    <div chat-bar></div>
    <script type="text/ng-template" id="chat-bar">
    <div id="chat-main" class="chat-main"
         ng-class="{'chat-main-empty': chatLibrary.chatLayout.chatLandingEnabled}" ng-cloak>
        <div id="chat-header"
             class="chat-windows-header chat-header">
            <div class="chat-header-label"
                 ng-click="toggleChatContainer()">
                <span class="rbx-font-bold chat-header-title">Chat & Party</span>
            </div>
            <div class="chat-header-action">
                <span class="rbx-notification-red"
                      ng-show="chatLibrary.chatLayout.collapsed && chatViewModel.conversationCount > 0"
                      ng-cloak>{{chatViewModel.conversationCount}}</span>
                <span id="chat-group-create"
                      class="rbx-icon-chat-group-create"
                      ng-hide="chatLibrary.chatLayout.collapsed || chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.chatLandingEnabled || chatLibrary.chatLayout.pageDataLoading"
                      ng-click="launchDialog(newGroup.layoutId)"
                      data-toggle="tooltip"
                      title="Add at least 2 people to create chat group"
                      ng-cloak></span>
            </div>
        </div>
        <div id="chat-body"
             class="chat-body"
             ng-hide="chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.pageDataLoading"
             ng-if="!chatLibrary.chatLayout.chatLandingEnabled">
            <div class="chat-search"
                 ng-class="{'chat-search-focus': chatLibrary.chatLayout.searchFocus}">
                <input type="text"
                       placeholder="Search"
                       class="chat-search-input"
                       ng-model="chatViewModel.searchTerm"
                       ng-focus="chatLibrary.chatLayout.searchFocus = true" />
                <span class="rbx-icon-chat-search"></span>
                <span class="rbx-icon-chat-cancel-search"
                      ng-click="cancelSearch()"></span>
            </div>
            <button id="chat-group-create-btn"
                    type="button"
                    class="btn rbx-btn-control-xs"
                    ng-click="launchDialog(newGroup.layoutId)"
                    title="Add at least 2 people to create chat group"
                    ng-cloak>
                <span>Create Chat Group</span>
            </button>
            <div id="chat-friend-list" class="rbx-scrollbar chat-friend-list" lazy-load>
                <ul id="chat-friends" class="chat-friends">
                    <li ng-repeat="chatUser in chatUserDict | orderList: chatLibrary.chatLayoutIds | filter : {name: chatViewModel.searchTerm}"
                        class="chat-friend">
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.CHAT && chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatLibrary.friendsDict[chatUser.displayUserId].AvatarThumb.Url}}"
                                     class="chat-avatar"
                                     thumbnail="chatLibrary.friendsDict[chatUser.displayUserId].AvatarThumb"
                                     image-retry
                                     ng-if="chatUser.isConversation">
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatLibrary.friendsDict[chatUser.displayUserId].UserPresenceType]['className']"></div>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name" ng-if="chatUser.isConversation">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>

                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.GROUPCHAT && chatUser.isConversation"
                             class="chat-friend-container chat-friend-groups">
                            <div class="chat-friend-avatar">
                                <ul class="chat-avatar-groups">
                                    <li ng-repeat="userId in chatUser.userIds | limitTo : 4"
                                        class="chat-avatar">
                                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                             image-retry>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>

                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.PARTY && chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar chat-party-avatar">
                                <span class="rbx-icon-chat-party-avatar"></span>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.PENDINGPARTY  && chatUser.isConversation"
                             class="chat-friend-container chat-pending-party">
                            <div class="chat-friend-avatar">
                                <ul class="chat-avatar-groups">
                                    <li ng-repeat="userId in chatUser.userIds | limitTo : 3"
                                        class="chat-avatar">
                                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                             image-retry>
                                    </li>
                                    <li class="chat-avatar-party-icon">
                                        <span class="rbx-icon-chat-party-avatar"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message party-pending-msg"
                                      ng-if="chatUser.incomingPartyInvite">{{chatUser.pendingPartyMsg}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage && !chatUser.incomingPartyInvite"></span>
                            </div>
                        </div>
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="!chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatUser.AvatarThumb.Url}}" class="chat-avatar"
                                     thumbnail="chatUser.AvatarThumb"
                                     image-retry>
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatUser.UserPresenceType]['className']"></div>

                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-xs chat-friend-message">{{userPresenceTypes[chatUser.UserPresenceType].title}}</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="chat-loading loading-bottom"
                     ng-show="chatLibrary.chatLayout.isChatLoading">
                    <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
                </div>
            </div>
        </div>
        <div id="chat-disconnect"
             class="chat-disconnect"
             ng-show="chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.pageDataLoading"
             ng-cloak>
            <p ng-show="chatLibrary.chatLayout.errorMaskEnable">Trying to connect ...</p>
            <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
        </div>
        <div id="chat-empty-list"
             class="chat-disconnect"
             ng-hide="chatLibrary.chatLayout.errorMaskEnable"
             ng-if="chatLibrary.chatLayout.chatLandingEnabled">
            <span class="rbx-icon-chat-friends"></span>
            <p class="rbx-lead">Make friends to start chatting and partying!</p>
        </div>
    </div>
</script>
    <div id="dialogs"
         class="dialogs"
         ng-controller="dialogsController">
        <div dialog
             id="{{chatLayoutId}}"
             dialog-data="chatUserDict[chatLayoutId]"
             chat-library="chatLibrary"
             close-dialog="closeDialog(chatLayoutId)"
             send-invite="sendInvite(chatLayoutId)"
             ng-repeat="chatLayoutId in chatLibrary.layoutIdList"></div>
        <script type="text/ng-template" id="chat-abuse-report">
    <div class="dialog-report-container"
         ng-show="dialogLayout.isConfirmationOn">
        <div class="dialog-report-content">
            <h4>Continue to report?</h4>
            <button id="chat-abuse-report-btn"
                    class="rbx-btn-primary-xs"
                    ng-click="abuseReport(null, true)">
                Report
            </button>

            <button class="rbx-btn-control-xs"
                    ng-click="dialogLayout.isConfirmationOn = false">
                Cancel
            </button>
        </div>
    </div>
</script>

        <script type="text/ng-template" id="chat-friends-selection">
    <div class="chat-friends-container">
        <div class="chat-search"
             ng-class="{'group-select-container' : dialogData.selectedUserIds.length > 0}"
             group-select>
            <div class="group-select">
                <ul class="group-select-friends">
                    <li class="rbx-font-sm group-select-friend"
                        ng-repeat="userId in dialogData.selectedUserIds">
                        {{dialogData.selectedUsersDict[userId].Username}}
                        <span class="rbx-icon-chat-cancel-search group-select-cancel" ng-click="selectFriends(userId)"></span>
                    </li>
                </ul>
                <input type="text"
                       placeholder="Search"
                       class="chat-search-input"
                       focus-me="chatLibrary.inApp ? false: true"
                       ng-model="dialogData.searchTerm" />
            </div>
            <button id="friends-selection-btn"
                    class="rbx-btn-secondary-xs friends-invite-btn"
                    ng-disabled="dialogLayout.inviteBtnDisabled"
                    ng-click="sendInvite()">
                Invite
            </button>
        </div>

        <div id="scrollbar_friend_{{dialogData.dialogType}}_{{dialogData.layoutId}}" class="rbx-scrollbar chat-friend-list"
             friends-lazy-load>
            <ul class="chat-friends">
                <li ng-repeat="friend in chatLibrary.friendsDict | orderList: dialogData.friendIds  | filter: {Username: dialogData.searchTerm}"
                    class="chat-friend">
                    <div class="chat-friend-container chat-friend-select"
                         ng-click="selectFriends(friend.Id)">
                        <div class="chat-friend-avatar">
                            <img ng-src="{{friend.AvatarThumb.Url}}"
                                 thumbnail="friend.AvatarThumb"
                                 image-retry
                                 class="chat-avatar">
                            <div class="chat-friend-status" ng-class="userPresenceTypes[friend.UserPresenceType]['className']"></div>
                        </div>
                        <div class="chat-friend-info">
                            <span class="chat-friend-name">{{friend.Username}}</span>
                            <span class="rbx-font-sm chat-friend-message">{{userPresenceTypes[friend.UserPresenceType].title}}</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</script>
        <script type="text/ng-template" id="chat-dialog">
    <div id="dialog-container" class="dialog-container"
         ng-class="{'group-has-banner': dialogData.isPartyExisted || dialogData.partyInGame,
                    'dialog-party': dialogData.dialogType == dialogType.PARTY,
                    'collapsed': dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER,
                    'active': dialogLayout.active && !dialogLayout.hasFocus}"
         ng-controller="dialogController"
         ng-focus="focusDialog()">
        <div class="dialog-main">
            <div class="chat-windows-header dialog-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-party-label"
                          ng-show="dialogData.dialogType == dialogType.PARTY"
                          title="Party"
                          ng-cloak></span>
                    <span id="chat-title"
                          class="rbx-font-bold chat-header-title dialog-header-title" 
                          ng-click="toggleDialogContainer()" 
                          ng-if="dialogData.dialogType != dialogType.PARTY">
                        <a class="rbx-font-bold"
                           ng-click="linkToProfile($event)"
                           ng-href="{{dialogData.nameLink}}">{{dialogData.name}}</a>
                    </span>
                    <span id="party-title"
                          class="rbx-font-bold chat-header-title dialog-header-title"
                          ng-click="toggleDialogContainer()" 
                          ng-if="dialogData.dialogType == dialogType.PARTY">{{dialogData.name}}
                    </span>
                </div>
                <div class="chat-header-action"
                     chat-setting>
                    <span class="rbx-icon-chat-close"
                          ng-click="closeDialog(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Close"></span>
                    <span class="rbx-icon-chat-setting"
                          data-toggle="popover"
                          data-bind="group-settings-{{dialogData.Id}}"
                          ng-hide="(dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                    <div class="rbx-popover-content" data-toggle="group-settings-{{dialogData.Id}}">
                        <ul class="rbx-dropdown-menu" role="menu">
                            <li>
                                <a id="abuse-report"
                                   ng-click="abuseReport(dialogData.userIds[0], false)">Report Abuse</a>
                            </li>
                            <li>
                                <a id="leave-group"
                                   ng-click="leaveGroup()"
                                   ng-if="dialogData.dialogType === dialogType.PARTY">Leave Party</a>
                            </li>
                        </ul>
                    </div>
                    <span id="create-party"
                          class="rbx-icon-chat-party-label"
                          ng-click="sendInvite(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Play Together"
                          ng-hide="dialogData.party || (dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER)  || chatLibrary.chatLayout.errorMaskEnable"></span>
                </div>
            </div>

            <div id="dialog-member-header"
                 class="dialog-member-header"
                 ng-show="dialogData.isPartyExisted && !dialogData.partyInGame">
                <ul class="group-members">
                    <li class="group-member"
                        title="{{chatLibrary.friendsDict[userId].Username}}{{dialogData.membersDict[userId].statusTooltip}}"
                        ng-repeat="userId in dialogData.userIds">
                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[userId].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-leader': dialogData.membersDict[userId].memberStatus === memberStatus.LEADER,
                                        'group-pending':dialogData.membersDict[userId].memberStatus === memberStatus.PENDING}">
                    </li>
                </ul>
                <a id="find-game"
                   class="rbx-btn-primary-xs"
                   ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.party.LeaderUser.Id === chatLibrary.userId"
                   ng-href="{{chatLibrary.gamesPageLink}}">Find Game</a>
                <a id="join-party"
                   class="rbx-btn-control-xs"
                   ng-hide="dialogData.dialogType === dialogType.PARTY || !dialogData.party"
                   ng-click="joinParty()">
                    Join Party
                </a>
            </div>

            <div id="party-ingame-header"
                 class="party-ingame-header"
                 ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.isPartyExisted && dialogData.partyInGame">
                <img ng-src="{{dialogData.placeThumbnail.Url}}"
                     thumbnail="dialogData.placeThumbnail" image-retry
                     class="party-ingame-thumbnail">
                <div class="party-ingame-label"
                     ng-class="{'party-ingame-member': chatLibrary.userId !== dialogData.party.LeaderUser.Id}">
                    <span class="rbx-font-sm">Playing</span>
                    <span class="rbx-font-sm rbx-font-bold party-ingame-name">{{dialogData.party.GameName}}</span>
                </div>
                <a id="join-game"
                   class="rbx-btn-control-xs"
                   ng-hide="chatLibrary.userId === dialogData.party.LeaderUser.Id"
                   ng-click="joinGame()">
                    Join Game
                </a>
            </div>
            <div id="scrollbar_{{dialogData.dialogType}}_{{dialogData.layoutId}}"
                 class="rbx-scrollbar dialog-body"
                 dialog-lazy-load>
                <ul class="dialog-messages">
                    <li class="dialog-message-container"
                        ng-repeat="message in dialogData.ChatMessages | reverse"
                        ng-class="{'message-inbound': message.SenderUserId != chatLibrary.userId && !message.isSystemMessage,
                                    'system-message': message.isSystemMessage}">
                        <div class="rbx-font-sm dialog-message dialog-triangle dialog-message-content"
                             ng-bind-html="message.Content" 
                             ng-hide="message.isSystemMessage"></div>
                        <div class="rbx-font-xs dialog-sending" ng-show="message.sendingMessage">Sending...</div>
                        <div class="rbx-font-xs rbx-text-danger dialog-sending" ng-show="message.sendMessageHasError"
                             ng-bind="message.error || 'Error'"></div>
                        <span class="system-message-content"
                              ng-show="message.isSystemMessage"
                              ng-bind-html="message.Content"></span>
                    </li>
                </ul>
            </div>
            <div class="chat-loading loading-top"
                 ng-show="dialogLayout.isChatLoading">
                <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
            </div>
            <div class="dialog-input-container">
                <textarea id="dialog-input"
                          msd-elastic
                          focus-me="{{dialogLayout.focusMeEnabled}}"
                          ng-focus="toggleDialogFocusStatus(true)"
                          ng-blur="toggleDialogFocusStatus(false)"
                          placeholder="Send a message ..."
                          ng-model="dialogData.messageForSend"
                          key-press-enter="sendMessage()"
                          class="dialog-input"
                          maxlength="{{dialogLayout.limitCharacterCount}}"
                          ng-disabled="chatLibrary.chatLayout.errorMaskEnable"></textarea>
            </div>

            <div abuse-report></div>
        </div>
    </div>
</script>
        <script type="text/ng-template" id="chat-group-dialog">
    <div class="dialog-container group-dialog"
         ng-class="{'group-has-banner': dialogData.isPartyExisted || dialogData.partyInGame,
                    'dialog-party': dialogData.dialogType == dialogType.PARTY,
                    'collapsed': dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER,
                    'active': dialogLayout.active && !dialogLayout.hasFocus}"
         ng-controller="dialogController">
        <div class="dialog-main" 
             ng-hide="dialogLayout.isConfirmationOn || dialogLayout.lookUpMembers || dialogData.addMoreFriends">
            <div class="chat-windows-header dialog-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-party-label"
                          ng-show="dialogData.dialogType == dialogType.PARTY"
                          title="Party"
                          ng-cloak></span>
                    <span class="rbx-icon-chat-group-label"
                          ng-show="dialogData.dialogType != dialogType.PARTY"
                          title="Group Chat"
                          ng-cloak></span>
                    <span id="party-title"
                          class="rbx-font-bold dialog-header-title"
                          title="{{dialogData.partyName}}"
                          ng-click="toggleDialogContainer()" ng-if="dialogData.dialogType == dialogType.PARTY">{{dialogData.partyName}}</span>
                    <span id="group-chat-title"
                          class="rbx-font-bold dialog-header-title"
                          title="{{dialogData.groupName}}"
                          ng-click="toggleDialogContainer()" ng-if="dialogData.dialogType != dialogType.PARTY">{{dialogData.groupName}}</span>
                </div>
                <div class="chat-header-action"
                     chat-setting>
                    <span class="rbx-icon-chat-close"
                          ng-click="closeDialog(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Close"></span>
                    <span class="rbx-icon-chat-setting"
                          data-toggle="popover"
                          data-bind="group-settings-{{dialogData.Id}}"
                          ng-hide="(dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                    <div class="rbx-popover-content" data-toggle="group-settings-{{dialogData.Id}}">
                        <ul class="rbx-dropdown-menu" role="menu">
                            <li><a id="add-friends" ng-click="addFriends()">Add Friends</a></li>
                            <li><a id="view-participants" ng-click="viewParticipants()">View Participants</a></li>
                            <li>
                                <a id="leave-group" ng-click="leaveGroup()" ng-bind="dialogData.dialogType === dialogType.PARTY ? 'Leave Party' : 'Leave Group'"></a>
                            </li>
                        </ul>
                    </div>
                    <span id="create-party"
                          class="rbx-icon-chat-party-label"
                          ng-click="sendInvite(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Play Together"
                          ng-hide="dialogData.party || (dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                </div>
            </div>
            <div id="dialog-member-header"
                 class="dialog-member-header"
                 ng-show="dialogData.isPartyExisted && (!dialogData.partyInGame || dialogData.dialogType === dialogType.PENDINGPARTY)">
                <ul class="group-members">
                    <li class="group-member"
                        title="{{chatLibrary.friendsDict[userId].Username}}{{dialogData.membersDict[userId].statusTooltip}}"
                        ng-repeat="userId in dialogData.userIds | limitTo: dialogLayout.limitMemberDisplay">
                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[userId].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-leader': dialogData.membersDict[userId].memberStatus === memberStatus.LEADER,
                                        'group-pending':dialogData.membersDict[userId].memberStatus === memberStatus.PENDING}">
                    </li>
                    <li ng-show="dialogData.userIds.length === (dialogLayout.limitMemberDisplay + 1)"
                        title="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].Username}}{{dialogData.membersDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].statusTooltip}}"
                        class="group-member">
                        <img ng-src="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-pending': dialogData.membersDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].memberStatus === memberStatus.PENDING}">
                    </li>
                    <li ng-show="dialogData.userIds.length > (dialogLayout.limitMemberDisplay + 1)"
                        ng-click="dialogLayout.lookUpMembers = !dialogLayout.lookUpMembers"
                        class="group-member group-member-plus"
                        ng-cloak>+{{dialogData.userIds.length - dialogLayout.limitMemberDisplay}}</li>
                </ul>
                <a id="find-game"
                   class="rbx-btn-primary-xs"
                   ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.party.LeaderUser.Id === chatLibrary.userId && !chatLibrary.inApp"
                   ng-href="{{chatLibrary.gamesPageLink}}">Find Game</a>
                <a id="join-party"
                   class="rbx-btn-control-xs"
                   ng-hide="dialogData.dialogType === dialogType.PARTY || !dialogData.party"
                   ng-click="joinParty()">
                    Join Party
                </a>
            </div>

            <div id="party-ingame-header"
                 class="party-ingame-header"
                 ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.isPartyExisted && dialogData.partyInGame">
                <img ng-src="{{dialogData.placeThumbnail.Url}}"
                     thumbnail="dialogData.placeThumbnail" image-retry
                     class="party-ingame-thumbnail">
                <div class="party-ingame-label"
                     ng-class="{'party-ingame-member': chatLibrary.userId !== dialogData.party.LeaderUser.Id}">
                    <span class="rbx-font-sm">Playing</span>
                    <span class="rbx-font-sm rbx-font-bold party-ingame-name">{{dialogData.party.GameName}}</span>
                </div>
                <a id="join-game"
                   class="rbx-btn-control-xs"
                   ng-hide="chatLibrary.userId === dialogData.party.LeaderUser.Id"
                   ng-click="joinGame()">
                    Join Game
                </a>
            </div>
            <div id="scrollbar_{{dialogData.dialogType}}_{{dialogData.layoutId}}"
                 class="rbx-scrollbar dialog-body"
                 dialog-lazy-load>
                <ul class="dialog-messages">
                    <li class="dialog-message-container"
                        ng-repeat="message in dialogData.ChatMessages | reverse"
                        ng-class="{'message-inbound': message.SenderUserId != chatLibrary.userId && !message.isSystemMessage,
                                    'system-message': message.isSystemMessage}">
                        <a ng-href="{{chatLibrary.friendsDict[message.SenderUserId].UserProfileLink}}"
                           ng-hide="message.isSystemMessage">
                            <img ng-if="message.SenderUserId != chatLibrary.userId"
                                 ng-src="{{chatLibrary.friendsDict[message.SenderUserId].AvatarThumb.Url}}"
                                 thumbnail="chatLibrary.friendsDict[message.SenderUserId].AvatarThumb"
                                 image-retry
                                 class="dialog-message-avatar">
                        </a>
                        <div class="dialog-message dialog-triangle" 
                             ng-hide="message.isSystemMessage">
                            <span ng-if="chatLibrary.friendsDict[message.SenderUserId] && message.SenderUserId != chatLibrary.userId"
                                  class="rbx-font-xs dialog-message-author">{{chatLibrary.friendsDict[message.SenderUserId].Username}}</span>
                            <span class="rbx-font-sm dialog-message-content" ng-bind-html="message.Content"></span>
                        </div>
                        <div class="rbx-font-xs dialog-sending" ng-show="message.sendingMessage">Sending...</div>
                        <div class="rbx-font-xs rbx-text-danger dialog-sending" ng-show="message.sendMessageHasError"
                             ng-bind="message.error || 'Error'"></div>
                        <span class="system-message-content"
                              ng-show="message.isSystemMessage"
                              ng-bind-html="message.Content"></span>
                    </li>
                </ul>
            </div>
            <div class="chat-loading loading-top"
                 ng-show="dialogLayout.isChatLoading">
                <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
            </div>
            <div class="dialog-input-container">
                <textarea msd-elastic
                          focus-me="{{dialogLayout.focusMeEnabled}}"
                          ng-focus="toggleDialogFocusStatus(true)"
                          ng-blur="toggleDialogFocusStatus(false)"
                          placeholder="Send a message ..."
                          ng-model="dialogData.messageForSend"
                          key-press-enter="sendMessage()"
                          class="dialog-input"
                          maxlength="{{dialogLayout.limitCharacterCount}}"
                          ng-disabled="chatLibrary.chatLayout.errorMaskEnable"></textarea>
            </div>
        </div>
        <div class="group-members-container"
             ng-show="dialogLayout.lookUpMembers">
            <div class="chat-windows-header">
                <span class="rbx-icon-chat-arrow-left"
                      ng-click="viewParticipants()"></span>
                <span class="rbx-font-bold">Participants</span>
            </div>
            <div id="group-members" class="rbx-scrollbar chat-friend-list"
                <ul class="chat-friends">
                    <li ng-repeat="userId in dialogData.userIds"
                        class="chat-friend">
                        <div class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                     thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                     image-retry
                                     class="chat-avatar">
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatLibrary.friendsDict[userId].UserPresenceType]['className']"></div>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatLibrary.friendsDict[userId].Username}}</span>
                                <span class="rbx-font-sm rbx-text-notes" ng-show="dialogData.party && dialogData.membersDict[userId].memberStatus == memberStatus.LEADER">Leader</span>
                                <span class="rbx-font-sm rbx-text-notes" ng-show="dialogData.party && dialogData.membersDict[userId].memberStatus == memberStatus.MEMBER">In party</span>
                            </div>
                            <div class="group-member-action">
                                <span ng-if="chatLibrary.userId != userId && chatLibrary.userId === dialogData.party.LeaderUser.Id && dialogData.dialogType == dialogType.PARTY"
                                      class="rbx-icon-chat-remove"
                                      ng-click="removeMember(userId)"></span>
                                <span ng-if="chatLibrary.userId != userId && chatLibrary.userId === dialogData.InitiatorUser.Id && dialogData.dialogType != dialogType.PARTY"
                                      class="rbx-icon-chat-remove"
                                      ng-click="removeMember(userId)"></span>
                                <span class="rbx-icon-chat-report-person"
                                      ng-if="chatLibrary.userId != userId"
                                      ng-click="abuseReport(userId, false)"></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div abuse-report></div>
        <div class="group-friends-container"
             ng-show="dialogData.addMoreFriends">
            <div class="chat-windows-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-arrow-left"
                          ng-click="dialogData.addMoreFriends = false"></span>
                    <span class="rbx-font-bold">Add Friends</span>
                    <span class="rbx-font-bold"
                          ng-class="{'group-overload': dialogLayout.isMembersOverloaded}">
                        ({{(dialogData.numberOfSelected)}}/{{chatLibrary.quotaOfPartyMembers}})
                    </span>
                </div>
            </div>
            <div friends-selection></div>
        </div>
    </div>
</script>

        <div dialog
             id="{{newGroup.layoutId}}"
             dialog-data="newGroup"
             chat-library="chatLibrary"
             close-dialog="closeDialog('newGroup')"
             send-invite="sendInvite(newGroup.layoutId)"
             ng-if="newGroup"></div>
        <script type="text/ng-template" id="chat-new-group">
    <div class="dialog-container group-create-container"
         ng-controller="friendsController">
        <div class="chat-windows-header">
            <div class="chat-header-title">
                <span class="rbx-font-bold">{{dialogLayout.title}}</span>
                <span class="rbx-font-bold"
                      ng-class="{'group-overload': dialogLayout.isMembersOverloaded}">
                    ({{(dialogData.numberOfSelected)}}/{{chatLibrary.quotaOfPartyMembers}})
                </span>
            </div>
            <div class="chat-header-action">
                <span class="rbx-icon-chat-close"
                      ng-click="closeDialog(dialogData.layoutId)"
                      data-toggle="tooltip"
                      title="Close"></span>
            </div>
        </div>
        <div friends-selection></div>
    </div>
</script>
        <script type="text/ng-template" id="chat-dialog-minimize">
    <div id="dialogs-minimize-container"
         class="dialogs-minimize-container"
         ng-show="hasMinimizedDialogs"
         data-toggle="popover"
         data-bind="dialogs">
        <span class="rbx-icon-chat-minimize"></span>
        <span class="minimize-count">{{chatLibrary.minimizedDialogIdList.length}}</span>
        <div class="rbx-popover-content" data-toggle="dialogs">
            <ul class="rbx-dropdown-menu minimize-list" role="menu">
                <li ng-repeat="dialogLayoutId in chatLibrary.minimizedDialogIdList"
                    class="minimize-item"
                    id="{{dialogLayoutId}}"
                    minimize-item>
                    <a class="rbx-text-overflow minimize-title">
                        <span>
                            {{chatLibrary.minimizedDialogData[dialogLayoutId].name}}
                        </span>
                    </a>
                    <span class="rbx-icon-chat-cancel-search minimize-close"></span>
                </li>
            </ul>
        </div>
    </div>
</script>


        <div id="dialogs-minimize"
             class="dialogs-minimize"
             dialog-minimize
             chat-library="chatLibrary">
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            // Because of placeLauncher.js, has to add this stupid global "play_placeId"
            $(document).on('Roblox.Chat.PartyInGame', function (event, args) {
                play_placeId = args.placeId;
            });
        });
    </script>

</div>


<div id="page-heartbeat-event-data-model"
     class="hidden"
     data-page-heartbeat-event-intervals="[2,8,20,60]">
</div>

    <script type="text/javascript">function urchinTracker() {}</script>


<div id="PlaceLauncherStatusPanel" style="display:none;width:300px"
     data-new-plugin-events-enabled="True"
     data-event-stream-for-plugin-enabled="True"
     data-event-stream-for-protocol-enabled="True"
     data-is-protocol-handler-launch-enabled="True"
     data-is-user-logged-in="True"
     data-os-name="Windows"
     data-protocol-name-for-client="roblox-player"
     data-protocol-name-for-studio="watrbx-studio"
     data-protocol-url-includes-launchtime="true"
     data-protocol-detection-enabled="true">
    <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
        <div id="Spinner" class="Spinner" style="padding:20px 0;">
            <img src="https://images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress" />
        </div>
        <div id="status" style="min-height:40px;text-align:center;margin:5px 20px">
            <div id="Starting" class="PlaceLauncherStatus MadStatusStarting" style="display:block">
                Starting Roblox...
            </div>
            <div id="Waiting" class="PlaceLauncherStatus MadStatusField">Connecting to Players...</div>
            <div id="StatusBackBuffer" class="PlaceLauncherStatus PlaceLauncherStatusBackBuffer MadStatusBackBuffer"></div>
        </div>
        <div style="text-align:center;margin-top:1em">
            <input type="button" class="Button CancelPlaceLauncherButton translate" value="Cancel" />
        </div>
    </div>
</div>
<div id="ProtocolHandlerStartingDialog" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">

        </div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_R.svg" width="90" height="90" alt="R" />
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                ROBLOX is now loading. Get ready to play!
            </p>
            <div class="ph-startingdialog-spinner-row">
                <img src="https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24" />
            </div>
        </div>
    </div>
</div>
<div id="ProtocolHandlerAreYouInstalled" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">
            <span class="rbx-icon-close simplemodal-close"></span>
        </div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_R.svg" width="90" height="90" alt="R" />
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                You're moments away from getting into the game!
            </p>
            <div>
                <button type="button" class="btn rbx-btn-primary-sm" id="ProtocolHandlerInstallButton">
                    Download and Install ROBLOX
                </button>
            </div>
            <div class="rbx-small rbx-text-notes">
                <a href="https://en.help.roblox.com/hc/en-us/articles/204473560" class="rbx-link" target="_blank">Click here for help</a>
            </div>

        </div>
    </div>
</div>
<div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
    <p class="larger-font-size">
        <span class="rbx-icon-moreinfo"></span>
        Check <b>Remember my choice</b> and click <img src="https://images.rbxcdn.com/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application" />  in the dialog box above to join games faster in the future!
    </p>
</div>


    <div id="videoPrerollPanel" style="display:none">
        <div id="videoPrerollTitleDiv">
            Gameplay sponsored by:
        </div>
        <div id="content">
            <video id="contentElement" style="width:0; height:0;" />
        </div>
        <div id="videoPrerollMainDiv"></div>
        <div id="videoPrerollCompanionAd">
            
                <script type="text/javascript">
                    googletag.cmd.push(function () {
                        googletag.defineSlot('/1015347/VideoPrerollUnder13', [300, 250], 'videoPrerollCompanionAd')
                            .addService(googletag.companionAds());
                        googletag.enableServices();
                        googletag.display('videoPrerollCompanionAd');
                    });
                </script>
        </div>
        <div id="videoPrerollLoadingDiv">
            Loading <span id="videoPrerollLoadingPercent">0%</span> - <span id="videoPrerollMadStatus" class="MadStatusField">Starting game...</span><span id="videoPrerollMadStatusBackBuffer" class="MadStatusBackBuffer"></span>
            <div id="videoPrerollLoadingBar">
                <div id="videoPrerollLoadingBarCompleted">
                </div>
            </div>
        </div>
        <div id="videoPrerollJoinBC">
            <span>Get more with Builders Club!</span>
            <a href="/premium/membership?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
        </div>
    </div>   
        <script type="text/javascript" src="//imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
    <script type="text/javascript">
        $(function () {
            var videoPreRollDFP = Roblox.VideoPreRollDFP;
            if (videoPreRollDFP) {
                var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
                videoPreRollDFP.showVideoPreRoll = true;
                videoPreRollDFP.loadingBarMaxTime = 33000;
                videoPreRollDFP.videoLoadingTimeout = 11000;
                videoPreRollDFP.videoPlayingTimeout = 41000;
                videoPreRollDFP.videoLogNote = "";
                videoPreRollDFP.logsEnabled = true;
                videoPreRollDFP.excludedPlaceIds = "32373412";
                videoPreRollDFP.adUnit = "/1015347/VideoPrerollUnder13";
                videoPreRollDFP.adTime = 15;
                videoPreRollDFP.isSwfPreloaderEnabled = true;
                videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
                customTargeting.userAge = "9";
                customTargeting.userGender = "Male";
                customTargeting.gameGenres = "";
                customTargeting.environment = "Production";
                customTargeting.adTime = "15";
                customTargeting.PLVU = false;
                $(videoPreRollDFP.checkEligibility);
            }
        });
    </script>                                                     


<div id="GuestModePrompt_BoyGirl" class="Revised GuestModePromptModal" style="display:none;">
    <div class="simplemodal-close">
        <a class="ImageButton closeBtnCircle_20h" style="cursor: pointer; margin-left:455px;top:7px; position:absolute;"></a>
    </div>
    <div class="Title">
        Choose Your Character
    </div>
    <div style="min-height: 275px; background-color: white;">
        <div style="clear:both; height:25px;"></div>

        <div style="text-align: center;">
            <div class="VisitButtonsGuestCharacter VisitButtonBoyGuest" style="float:left; margin-left:45px;"></div>
            <div class="VisitButtonsGuestCharacter VisitButtonGirlGuest" style="float:right; margin-right:45px;"></div>
        </div>
        <div style="clear:both; height:25px;"></div>
        <div class="RevisedFooter">
            <div style="width:200px;margin:10px auto 0 auto;">
                <a href="/?returnUrl=http%3A%2F%2Fwww.roblox.com%2Fusers%2F<?=$userinfo->id?>%2Fprofile"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="/newlogin?returnUrl=http%3A%2F%2Fwww.roblox.com%2Fusers%2F<?=$userinfo->id?>%2Fprofile">I have an account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkRobloxInstall() {
             return RobloxLaunch.CheckRobloxInstall('/install/download.aspx');
    }

</script>

    <div id="InstallationInstructions" style="display:none;">
        <div class="ph-installinstructions">
            <div class="ph-modal-header">
                <span class="rbx-icon-close simplemodal-close"></span>
                <h3>Thanks for playing ROBLOX</h3>
            </div>
            <div class="ph-installinstructions-body">
                    <div class="ph-install-step ph-installinstructions-step1-of4">
                        <h1>1</h1>
                        <p class="larger-font-size">Click RobloxPlayerLauncher.exe to run the ROBLOX installer, which just downloaded via your web browser.</p>
                        <img width="230" height="180" src="https://images.rbxcdn.com/8b0052e4ff81d8e14f19faff2a22fcf7.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step2-of4">
                        <h1>2</h1>
                        <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process.</p>
                        <img width="230" height="180" src="https://images.rbxcdn.com/4a3f96d30df0f7879abde4ed837446c6.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step3-of4">
                        <h1>3</h1>
                        <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX.</p>
                        <img width="230" height="180" src="https://images.rbxcdn.com/6e23e4971ee146e719fb1abcb1d67d59.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step4-of4">
                        <h1>4</h1>
                        <p class="larger-font-size">After installation, click <strong>Play</strong> below to join the action!</p>
                        <div class="VisitButton VisitButtonContinuePH">
                            <a class="btn rbx-btn-primary-lg disabled">Play</a>
                        </div>
                    </div>
            </div>
            <div class="rbx-font-sm rbx-text-notes">
                The ROBLOX installer should download shortly. If it doesn’t, <a href="#" onclick="Roblox.ProtocolHandlerClientInterface.startDownload(); return false;">start the download now.</a>
            </div>
        </div>
    </div>
    <div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>



<div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
<iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>

<script type='text/javascript' src='/js/6b9fed5e91a508780b95c302464d62ef.js.gzip'></script>

<script type="text/javascript">
    Roblox.Client._skip = null;
    Roblox.Client._CLSID = '76D50904-6780-4c8b-8986-1A7EE0B1716D';
    Roblox.Client._installHost = 'setup.roblox.com';
    Roblox.Client.ImplementsProxy = true;
    Roblox.Client._silentModeEnabled = true;
    Roblox.Client._bringAppToFrontEnabled = false;
    Roblox.Client._currentPluginVersion = '';
    Roblox.Client._eventStreamLoggingEnabled = true;

        
        Roblox.Client._installSuccess = function() {
            if(GoogleAnalyticsEvents){
                GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
                GoogleAnalyticsEvents.FireEvent(['Plugin','Install Success']);
                if (Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
                    Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
                }
            }
        }
        
            
        if ((window.chrome || window.safari) && window.location.hash == '#chromeInstall') {
            window.location.hash = '';
            var continuation = '(' + $.cookie('chromeInstall') + ')';
            play_placeId = $.cookie('chromeInstallPlaceId');
            Roblox.GamePlayEvents.lastContext = $.cookie('chromeInstallLaunchMode');
            $.cookie('chromeInstallPlaceId', null);
            $.cookie('chromeInstallLaunchMode', null);
            $.cookie('chromeInstall', null);
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
            Roblox.Client.ResumeTimer(eval(continuation));
        }
        
</script>


<div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle="confirmation" style="display:none;">
    <a class="genericmodal-close ImageButton closeBtnCircle_20h"></a>
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div class="TopBody">
            <div class="ImageContainer roblox-item-image" data-image-size="small" data-no-overlays data-no-click>
                <img class="GenericModalImage" alt="generic image" />
            </div>
            <div class="Message"></div>
        </div>
        <div class="ConfirmationModalButtonContainer GenericModalButtonContainer">
            <a href id="roblox-confirm-btn"><span></span></a>
            <a href id="roblox-decline-btn"><span></span></a>
        </div>
        <div class="ConfirmationModalFooter">
        
        </div>  
    </div>  
    <script type="text/javascript">
        Roblox = Roblox || {};
        Roblox.Resources = Roblox.Resources || {};
        
        //<sl:translate>
        Roblox.Resources.GenericConfirmation = {
            yes: "Yes",
            No: "No",
            Confirm: "Confirm",
            Cancel: "Cancel"
        };
        //</sl:translate>
    </script>
</div>




<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.jsConsoleEnabled = false;
</script>



    <script type="text/javascript">
        $(function () {
            Roblox.CookieUpgrader.domain = 'roblox.com';
            Roblox.CookieUpgrader.upgrade("GuestData", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
            Roblox.CookieUpgrader.upgrade("RBXSource", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("rbx_acquisition_time", cookie); } });
            Roblox.CookieUpgrader.upgrade("RBXViralAcquisition", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("time", cookie); } });
                
                Roblox.CookieUpgrader.upgrade("RBXMarketing", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
                
                            
                Roblox.CookieUpgrader.upgrade("RBXSessionTracker", { expires: Roblox.CookieUpgrader.fourHoursFromNow });
                
                    });
    </script>


    
    <script type='text/javascript' src='/js/22f5b93b0e23b69d9c48f68ea3c65fe3.js.gzip'></script>


    
<script type='text/javascript' src='/js/6385cae49dc708a8f2f93167ad17466d.js.gzip'></script>
    <script type='text/javascript' src='/js/59e30cf6dc89b69db06bd17fbf8ca97c.js.gzip'></script>
    <script type='text/javascript' src='/js/f3251ed8271ce1271b831073a47b65e3.js.gzip'></script>
    <script type='text/javascript' src='/js/045483c002abdefee9f2e9598ac48d08.js.gzip'></script>


    
    <script type='text/javascript'>Roblox.config.externalResources = [];Roblox.config.paths['Pages.Catalog'] = '/js/c1d70e1b98c87fcdb85e894b5881f60c.js.gzip';Roblox.config.paths['Pages.CatalogShared'] = '/js/bd76a582ffb966eb0af3f16d61defa7f.js.gzip';Roblox.config.paths['Pages.Messages'] = '/js/b123274ceba7c65d8415d28132bb2220.js.gzip';Roblox.config.paths['Resources.Messages'] = '/js/6307f9bd9c09fa9d88c76291f3b68fda.js.gzip';Roblox.config.paths['Widgets.AvatarImage'] = '/js/64f4ed4d4cf1c0480690bc39cbb05b73.js.gzip';Roblox.config.paths['Widgets.DropdownMenu'] = '/js/5cf0eb71249768c86649bbf0c98591b0.js.gzip';Roblox.config.paths['Widgets.GroupImage'] = '/js/556af22c86bce192fb12defcd4d2121c.js.gzip';Roblox.config.paths['Widgets.HierarchicalDropdown'] = '/js/7689b2fd3f7467640cda2d19e5968409.js.gzip';Roblox.config.paths['Widgets.ItemImage'] = '/js/d689e41830fba6bc49155b15a6acd020.js.gzip';Roblox.config.paths['Widgets.PlaceImage'] = '/js/45d46dd8e2bd7f10c17b42f76795150d.js.gzip';Roblox.config.paths['Widgets.SurveyModal'] = '/js/56ad7af86ee4f8bc82af94269ed50148.js.gzip';</script>

    
    <script>
        Roblox.XsrfToken.setToken('iDKvVSYKWtjg');
    </script>

        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>
    <script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>
    

<script type="text/javascript">
    $(function(){
        function trackReturns() {
            function dayDiff(d1, d2) {
                return Math.floor((d1-d2)/86400000);
            }
            if (!localStorage) {
                return false;
            }

            var cookieName = 'RBXReturn';
            var cookieOptions = {expires:9001};
            var cookieStr = localStorage.getItem(cookieName) || "";
            var cookie = {};

            try {
                cookie = JSON.parse(cookieStr);
            } catch (ex) {
                // busted cookie string from old previous version of the code
            }

            try {
                if (typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
                    localStorage.setItem(cookieName, JSON.stringify({ ts: new Date().toDateString() }));
                    return false;
                }
            } catch (ex) {
                return false;
            }

            var daysSinceFirstVisit = dayDiff(new Date(), new Date(cookie.ts));
            if (daysSinceFirstVisit == 1 && typeof cookie.odr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_odr', {});
                cookie.odr = 1;
            }
            if (daysSinceFirstVisit >= 1 && daysSinceFirstVisit <= 7 && typeof cookie.sdr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_sdr', {});
                cookie.sdr = 1;
            }
            try {
                localStorage.setItem(cookieName, JSON.stringify(cookie));
            } catch (ex) {
                return false;
            }
        }

        GoogleListener.init();


    
        RobloxEventManager.initialize(true);
        RobloxEventManager.triggerEvent('rbx_evt_pageview');
        trackReturns();
        

    
        RobloxEventManager._idleInterval = 450000;
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_start');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_ftp');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_success');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_fmp');
        RobloxEventManager.startMonitor();
        

    });

</script>


    
    

<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};

    Roblox.UpsellAdModal.Resources = {
        //<sl:translate>
        title: "Remove Ads Like This",
        body: "Builders Club members do not see external ads like these.",
        accept: "Upgrade Now",
        decline: "No, thanks"
        //</sl:translate>
    };
</script>

    
    <script type='text/javascript' src='/js/6c9ecbea8e5e55ba752b42ca57433608.js.gzip'></script>



<div id="page-heartbeat-event-data-model"
     class="hidden"
     data-page-heartbeat-event-intervals="[2,8,20,60]">
</div>        <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "" });

        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "https://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <noscript>
        <img src="https://b.scorecardresearch.com/p?c1=2&c2=&c3=&c4=&c5=&c6=&c15=&cv=2.0&cj=1"/>
    </noscript>
</body>
</html>
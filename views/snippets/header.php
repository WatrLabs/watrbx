<?php
use watrlabs\authentication;
use watrbx\relationship\friends;
use watrbx\sitefunctions;

$friends = new friends();
$auth = new authentication();
$sitefunctions = new sitefunctions();
global $currentuser, $db;

$userinfo = $currentuser;
$pendingfq = count($friends->get_requests($userinfo->id));
$msgcount = $db->table("messages")
    ->where("userto", $userinfo->id)
    ->where("hasread", 0)
    ->count();
$count = $pendingfq + $msgcount;

$ismobile = false;

if(isset($_SERVER['HTTP_USER_AGENT'])){
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    if(strpos($useragent, "ROBLOX iOS App")){
        $ismobile = true;
    }

    if(strpos($useragent, "WebView")){
        $ismobile = true;
    }

    if(strpos($useragent, "ROBLOX Android App")){
        $ismobile = true;
    }
}
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <!-- MachineID: WEB102 -->
    <title><?=$config["title"] ?? "Untitled Page" ?> - <?=$_ENV["APP_NAME"]?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600,700" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    
    <style>
        body {
                font-family: 'Source Sans Pro', Arial, Helvetica, sans-serif;
        }
    </style>
    
    <script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'></script>
    <script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'></script>
    <script type='text/javascript' src='/js/jquery/MicrosoftAjax.js'></script>
    

    <meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY" />
    
    <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico" />

    <?php if(isset($metatags)) { foreach ($metatags as $property => $content) { ?>
    <meta <?= substr($property, 0, 2) == "og" ? "property" : "name" ?>="<?= $property ?>" content="<?= $content ?>">
    <?php } } ?>	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($cssfiles)) { foreach ($cssfiles as $url) { ?>
    <link rel="stylesheet" href="<?= $url ?>">
    <?php }}  if(isset($jsfiles)) { foreach ($jsfiles as $url) { ?>
    <script type="text/javascript" src="<?= $url ?>"></script>
    <?php }} ?>

    <style>
        .original-image {
            height: 100px;
            width: 100px;
        }

        .player-avatar a img {
            height: 85px;
            width: 85px;
        }

        .avatarcomment {
            height: 100px;
            width: 100px;
        }
    </style>
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.AdsHelper = Roblox.AdsHelper || {};

    Roblox.AdsHelper.toggleAdsSlot = function (slotId, GPTRandomSlotIdentifier) {
        var gutterAdsEnabled = false;
        if (gutterAdsEnabled) {
            googletag.display(GPTRandomSlotIdentifier);
            return;
        }
        
        if (typeof slotId !== 'undefined' && slotId && slotId.length > 0) {
            var slotElm = $("#"+slotId);
            if (slotElm.is(":visible")) {
                googletag.display(GPTRandomSlotIdentifier);
            }else {
                switch(slotId) {
                    case "Skyscraper-Adp-Left":
                        Roblox.AdsHelper.adLeftTemplate = slotElm.html();
                        slotElm.empty();
                        break;
                    case "Skyscraper-Adp-Right":
                        Roblox.AdsHelper.adRightTemplate = slotElm.html();
                        slotElm.empty();
                        break;
                    case "Leaderboard-Abp":
                        Roblox.AdsHelper.adLeaderboardTemplate = slotElm.html();
                        slotElm.empty();
                        break;
                    case "GamePageAdDiv1":
                        Roblox.AdsHelper.adGamePageAdDiv1Template = slotElm.html();
                        slotElm.empty();
                        break;
                    case "GamePageAdDiv2":
                        Roblox.AdsHelper.adGamePageAdDiv2Template = slotElm.html();
                        slotElm.empty();
                        break;
                    case "GamePageAdDiv3":
                        Roblox.AdsHelper.adGamePageAdDiv3Template = slotElm.html();
                        slotElm.empty();
                        break;
                    case "ProfilePageAdDiv1":
                        Roblox.AdsHelper.adProfilePageAdDiv1Template = slotElm.html();
                        slotElm.empty();
                        break;
                    case "ProfilePageAdDiv2":
                        Roblox.AdsHelper.adProfilePageAdDiv2Template = slotElm.html();
                        slotElm.empty();
                        break;
                    default:
                        return;
                } 
            }
        }
    }
</script><script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>


        <link rel="canonical" href="/games/192800/Work-at-a-Pizza-Place" />
       
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    	<script type="text/javascript">

        var _gaq = _gaq || [];

		    _gaq.push(['_setAccount', 'UA-11419793-1']);
		    _gaq.push(['_setCampSourceKey', 'rbx_source']);
		    _gaq.push(['_setCampMediumKey', 'rbx_medium']);
		    _gaq.push(['_setCampContentKey', 'rbx_campaign']);
		        _gaq.push(['_setDomainName', 'roblox.com']);
		_gaq.push(['b._setAccount', 'UA-486632-1']);
		_gaq.push(['b._setCampSourceKey', 'rbx_source']);
		_gaq.push(['b._setCampMediumKey', 'rbx_medium']);
		_gaq.push(['b._setCampContentKey', 'rbx_campaign']);

		_gaq.push(['b._setDomainName', 'roblox.com']);
        
            _gaq.push(['b._setCustomVar', 1, 'Visitor', 'Member', 2]);
            _gaq.push(['b._trackPageview']);    
        
        
        

		_gaq.push(['c._setAccount', 'UA-26810151-2']);
		_gaq.push(['c._setDomainName', 'roblox.com']);

		(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();

	</script>

            <div id="EventStreamData"
             data-default-url="//ecsv2.roblox.com/www/e.png"
             data-www-url="//ecsv2.roblox.com/www/e.png"
             data-studio-url="//ecsv2.roblox.com/pe?t=studio"></div>


<script type="text/javascript">
    // IMPORTANT! If the user is logged in, set to user_id; else, set to ''
    var _user_id = '<?=$userinfo->id?>';

    // IMPORTANT! Set to a unique session ID for the visitor's current browsing session.
    var _session_id = '<?=$userinfo->id?>';

    var _sift = window._sift = window._sift || [];

    // IMPORTANT! Insert your JavaScript snippet key here!
    _sift.push(['_setAccount', '5238aa5d58']);

    _sift.push(['_setUserId', _user_id]);
    _sift.push(['_setSessionId', _session_id]);
    _sift.push(['_trackPageview']);

    (function () {
        function ls() {
            var e = document.createElement('script');
            e.type = 'text/javascript';
            e.async = true;
            e.src = ('https:' === document.location.protocol ? 'https://' : 'https://') + 'cdn.siftscience.com/s.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(e, s);
        }
        if (window.attachEvent) {
            window.attachEvent('onload', ls);
        } else {
            window.addEventListener('load', ls, false);
        }
    }());
</script>    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/asset/'] = '/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = '/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = '/client-status';
Roblox.Endpoints.Urls['/game/'] = '/game/';
Roblox.Endpoints.Urls['/game/edit.ashx'] = '/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = '/game/getauthticket';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = '/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/report-stats'] = '/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = '/game/report-event';
Roblox.Endpoints.Urls['/chat/chat'] = '/chat/chat';
Roblox.Endpoints.Urls['/presence/users'] = '/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = '/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = '/friends/list';
Roblox.Endpoints.Urls['/navigation/getCount'] = '/navigation/getCount';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = '/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = '/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = '/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = '/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = '/catalog/lists.aspx';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = '/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = '/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = '/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = '/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = '/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = '/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = '/asset/request-thumbnail-fix';
Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = '/avatar-thumbnail-3d/json';
Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = '/avatar-thumbnail/image';
Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = '/avatar-thumbnail/json';
Roblox.Endpoints.Urls['/avatar-thumbnails'] = '/avatar-thumbnails';
Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = '/avatar/request-thumbnail-fix';
Roblox.Endpoints.Urls['/bust-thumbnail/json'] = '/bust-thumbnail/json';
Roblox.Endpoints.Urls['/group-thumbnails'] = '/group-thumbnails';
Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = '/groups/getprimarygroupinfo.ashx';
Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = '/headshot-thumbnail/json';
Roblox.Endpoints.Urls['/item-thumbnails'] = '/item-thumbnails';
Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = '/outfit-thumbnail/json';
Roblox.Endpoints.Urls['/place-thumbnails'] = '/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/asset/'] = '/thumbnail/asset/';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = '/thumbnail/avatar-headshot';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = '/thumbnail/avatar-headshots';
Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = '/thumbnail/user-avatar';
Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = '/thumbnail/resolve-hash';
Roblox.Endpoints.Urls['/thumbnail/place'] = '/thumbnail/place';
Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = '/thumbnail/get-asset-media';
Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = '/thumbnail/remove-asset-media';
Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = '/thumbnail/set-asset-media-sort-order';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = '/thumbnail/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = '/thumbnail/place-thumbnails-partial';
Roblox.Endpoints.Urls['/thumbnail_holder/g'] = '/thumbnail_holder/g';
Roblox.Endpoints.Urls['/users/{id}/profile'] = '/users/{id}/profile';
Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
</script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
</script>

</head>
<body id="rbx-body"
      data-performance-relative-value="0.5"
      data-internal-page-name="GameDetail">
      <div class="snowflakes" aria-hidden="true">
  
</div>
    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm"></div>

    
    


<div id="fb-root"></div>

<div id="wrap" class="wrap no-gutter-ads logged-in"
     data-gutter-ads-enabled="false">


<div class="modalPopup unifiedModal smallModal shop-modal shop-modal-item" data-modal-handle="shop-confirmation" style="display: none;">
    <div class="shop-modal-item-right">

    </div>
    <div class="shop-modal-item-left">
        <h2>
            You are about to visit<br />our shopping site
        </h2>
        <div class="body-text">
            You will be redirected to the shopping<br />site. Please note that you must be 18<br /> or over to buy online.
        </div>
        <div class="controls">
            <a id="rbx-shopping-close-btn" class="btn-shopping-close">Close</a>
            <div id="rbx-continue-shopping-btn" class="btn btn-medium btn-neutral rbx-btn-secondary-xs btn-more btn-continue-shopping">Continue to Shop</div>
        </div>
        <div class="fine-print">
            The shop is not part of ROBLOX.com and is governed by a separate <a href="https://www.myplay.com/direct/cookie-policy?origin=desktop&permalink=shoproblox">privacy policy</a>.
        </div>
    </div>
</div>

<?php if($ismobile == false){ ?>



<div id="header"
     class="navbar-fixed-top rbx-header"
     role="navigation">
    <div class="container-fluid">
        <div class="rbx-navbar-header">
            <div data-behavior="nav-notification" class="rbx-nav-collapse" onselectstart="return false;">
                    <span class="rbx-icon-nav-menu"></span>

                    <?php
                            if($count > 0){
                                echo '<div class="rbx-nav-notification  rbx-font-xs" title="'.$count.'">'.$count.'</div>';
                            }
                        ?>

            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><span class="logo logo-transitional"></span></a>
            </div>
        </div>
        <ul class="nav rbx-navbar hidden-xs hidden-sm col-md-4 col-lg-3">
            <li>
                <a href="/games">Games</a>
            </li>
            <li>
                <a href="/catalog">Catalog</a>
            </li>
            <li>
                <a href="/develop">Develop</a>
            </li>
            <li>
                <a class="buy-robux" href="/upgrades/robux?ctx=nav">ROBUX</a>
            </li>
        </ul><!--rbx-navbar-->
        <div id="navbar-universal-search" class="navbar-left rbx-navbar-search col-xs-5 col-sm-6 col-md-3" data-behavior="univeral-search" role="search">
            <div class="input-group rbx-input-group">

                <input id="navbar-search-input" class="form-control rbx-input-field" type="text" placeholder="Search" maxlength="120" />
                <div class="input-group-btn rbx-input-group-btn">
                    <button id="navbar-search-btn" class="rbx-input-addon-btn" type="submit">
                        <span class="rbx-icon-nav-search"></span>
                    </button>
                </div>
            </div>
            <ul data-toggle="dropdown-menu" class="rbx-dropdown-menu" role="menu">
                <li class="rbx-navbar-search-option selected" data-searchurl="/games/?Keyword=">
                    <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Games</span>
                </li>
                        <li class="rbx-navbar-search-option" data-searchurl="/search/users?keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in People</span>
                        </li>
                        <li class="rbx-navbar-search-option" data-searchurl="/catalog/browse.aspx?CatalogContext=1&amp;Keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Catalog</span>
                        </li>
                        <li class="rbx-navbar-search-option" data-searchurl="/groups/search.aspx?val=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Groups</span>
                        </li>
                        <li class="rbx-navbar-search-option" data-searchurl="/develop/library?CatalogContext=2&amp;Category=6&amp;Keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Library</span>
                        </li>
            </ul>
        </div><!--rbx-navbar-search-->
        <div class="navbar-right rbx-navbar-right col-xs-4 col-sm-3">

<ul class="nav navbar-right rbx-navbar-icon-group">
    <li>
        <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-setting" data-viewport="#header">
            <span class="rbx-icon-nav-settings" id="nav-settings"></span>
            <? if($userinfo->email == null){ echo '<span class="rbx-font-xs nav-setting-highlight ">1</span>'; } else {echo '<span class="rbx-font-xs nav-setting-highlight hidden">0</span>'; } ?>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-setting">
            <ul class="rbx-dropdown-menu" role="menu">
                <li>
                    <a class="rbx-menu-item" href="/my/account">
                        Settings
                        <? if($userinfo->email == null){ echo '<span class="rbx-font-xs nav-setting-highlight ">1</span>'; } else {echo '<span class="rbx-font-xs nav-setting-highlight hidden">0</span>'; } ?>
                    </a>
                </li>
                <li><a href="/Help/Builderman.aspx" target="_blank">Help</a></li>
                <li><a data-behavior="logout" href="/logout" data-bind="/logout">Logout</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-tix" data-viewport="#header">
            <span class="rbx-icon-nav-tix" id="nav-tix"></span>
            <span class="rbx-text-navbar-right" id="nav-tix-amount"><?=$sitefunctions->format_number($userinfo->tix)?></span>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-tix">
            <ul class="rbx-dropdown-menu" role="menu">
                <li><a href="/My/Money.aspx#/#Summary_tab" id="nav-tix-balance"><?=number_format($userinfo->tix)?> Tickets</a></li>
                <li><a href="/my/money.aspx?tab=TradeCurrency">Trade Currency</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a id="nav-robux-icon" class="rbx-menu-item" data-toggle="popover" data-bind="popover-robux">
            <span class="rbx-icon-nav-robux" id="nav-robux"></span>
            <span class="rbx-text-navbar-right" id="nav-robux-amount"><?=$sitefunctions->format_number($userinfo->robux)?></span>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-robux">
            <ul class="rbx-dropdown-menu" role="menu">
                <li><a href="/My/Money.aspx#/#Summary_tab" id="nav-robux-balance"><?=number_format($userinfo->robux)?> ROBUX</a></li>
                <li><a href="/upgrades/robux?ctx=navpopover">Buy ROBUX</a></li>
            </ul>
        </div>
    </li>
    <li class="rbx-navbar-right-search" data-toggle="toggle-search">
        <a class="rbx-menu-icon">
            <span class="rbx-icon-nav-search-white"></span>
        </a>
    </li>
</ul>        </div><!-- navbar right-->
        <ul class="nav rbx-navbar hidden-md hidden-lg col-xs-12">
            <li>
                <a href="/games">Games</a>
            </li>
            <li>
                <a href="/catalog/">Catalog</a>
            </li>
            <li>
                <a href="/develop">Develop</a>
            </li>
            <li>
                <a class="buy-robux" href="/upgrades/robux?ctx=nav">ROBUX</a>
            </li>
        </ul><!--rbx-navbar-->
    </div>
</div>


<!-- LEFT NAV MENU -->
    <div id="navigation" class="rbx-left-col" data-behavior="left-col">
        <ul>
            <li class="rbx-lead">
                <a href="/users/<?= $userinfo->id ?>/profile"><?=$userinfo->username?></a>
            </li>
            <li class="rbx-divider"></li>
        </ul>

        <div class="rbx-scrollbar" data-toggle="scrollbar" onselectstart="return false;">
            <ul>
                <li><a href="/home" id="nav-home"><span class="rbx-icon-nav-home"></span><span>Home</span></a></li>
                <li><a href="/users/<?=$userinfo->id?>/profile" id="nav-profile"><span class="rbx-icon-nav-profile"></span><span>Profile</span></a></li>
                <li>
                    <a href="/my/messages/#!/inbox" id="nav-message" data-count="<?=$count?>">
                        <span class="rbx-icon-nav-message"></span><span>Messages</span>
                        <span class="rbx-highlight" title="<?=$msgcount?>"><? if($msgcount > 0){ echo $msgcount; } ?></span>
                    </a>
                </li>
                <li>
                    <a href="/users/<?=$userinfo->id?>/friends" id="nav-friends" data-count="<?=$pendingfq?>">
                        <span class="rbx-icon-nav-friends"></span><span>Friends</span>
                        <span class="rbx-highlight" title="<?=$pendingfq?>"><? if($pendingfq > 0){ echo $pendingfq; } ?></span>
                    </a>
                </li>
                <li>
                    <a href="/my/character.aspx" id="nav-character">
                        <span class="rbx-icon-nav-charactercustomizer"></span><span>Character</span>
                    </a>
                </li>
                <li>
                    <a href="/users/<?=$userinfo->id?>/inventory" id="nav-inventory">
                        <span class="rbx-icon-nav-inventory"></span><span>Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="/my/money.aspx#/#TradeItems_tab" id="nav-trade">
                        <span class="rbx-icon-nav-trade"></span><span class="disabled">Trade</span>
                    </a>
                </li>
                <li>
                    <a href="/my/groups.aspx" id="nav-group">
                        <span class="rbx-icon-nav-group"></span><span class="disabled">Groups</span>
                    </a>
                </li>
                <li>
                    <a href="/forum/" id="nav-forum">
                        <span class="rbx-icon-nav-forum"></span><span>Forum</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="nav-blog">
                        <span class="rbx-icon-nav-blog"></span><span class="disabled">Blog</span>
                    </a>
                </li>
                <li class="rbx-upgrade-now">
                    <a href="/Upgrades/BuildersClubMemberships.aspx?ctx=leftnav" class="rbx-btn-secondary-xs" id="upgrade-now-button">Upgrade Now</a>
                </li>
                    <li class="rbx-text-notes rbx-font-bold rbx-font-sm">
                        Events
                    </li>
                    
                        
            </ul>
        </div>
    </div>
    <? } else { ?>

    <style>
        body, #wrap, .container-main {
            margin: 0px;
            height: 100% !important;
        }
    </style>

    <? } ?>
    <div class="container-main    ">
            <script type="text/javascript">
                if (top.location != self.location) {
                    top.location = self.location.href;
                }
            </script>
        <noscript><div class="SystemAlert"><div class="rbx-alert-info" role="alert">Please enable Javascript to use all the features on this site.</div></div></noscript>
        
<?php
if($currentuser->email_verified == 0){
	echo '<div class="SystemAlert"><div class="rbx-alert-info" role="alert">Your email currently isn\'t verified. To play games, <a href="/my/account">please verify your email</a></div></div>';
}

$sitebanner = $sitefunctions->get_setting("SITE_BANNER");

if(!$sitebanner == "" || !$sitebanner == null){ echo '<div class="SystemAlert" style="background-color: red;"><div class="rbx-alert-info" role="alert">'.preg_replace('#\bhttps?://[^\s<]+#i','<a href="$0" target="_blank" rel="noopener">$0</a>',$sitebanner).'</div></div>'; }
?>
<?php
use watrlabs\authentication;
$auth = new authentication();


if($auth->hasaccount()){
    $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);
}

$obc = '';

if($userinfo->membership == "OutrageousBuildersClub"){
    $obc = '<link rel="stylesheet" href="/CSS/Base/CSS/FetchCSS?path=OBC.css">';
} else {
    $obc = '';
}

?>

<!DOCTYPE html>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<!-- MachineID: WEB109 -->
<head id="ctl00_ctl00_Head1">
    <title><?=$config["title"] ?? "Untitled Page" ?> - <?=$_ENV["APP_NAME"]?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600,700" rel="stylesheet" type="text/css">
    
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
    <script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
    <script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/4.0/1/MicrosoftAjax.js'></script>
    <script type='text/javascript'>window.Sys || document.write("<script type='text/javascript' src='/js/Microsoft/MicrosoftAjax.js'><\/script>")</script>
    
    <?php if(isset($metatags)) { foreach ($metatags as $property => $content) { ?>
    <meta <?= substr($property, 0, 2) == "og" ? "property" : "name" ?>="<?= $property ?>" content="<?= $content ?>">
    <?php } } ?>	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($cssfiles)) { foreach ($cssfiles as $url) { ?>
    <link rel="stylesheet" href="<?= $url ?>">
    <?php }}  if(isset($jsfiles)) { foreach ($jsfiles as $url) { ?>
    <script type="text/javascript" src="<?= $url ?>"></script>
    <?php }} ?>
    <?=$obc?>
    
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


<div id="page-heartbeat-event-data-model"
     class="hidden"
     data-page-heartbeat-event-intervals="[2,8,20,60]">
</div><script type='text/javascript' src='/js/f49d858ef181e7cd401d8fcb4245e6e8.js.gzip'></script>
<script type='text/javascript'>Roblox.config.externalResources = [];Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/46776eac503b939a2fd9146d77d735a3.js';Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/da18f3da914691fb825e5ae9f00c9e49.js';Roblox.config.paths['Pages.Messages'] = 'https://js.rbxcdn.com/e8cbac58ab4f0d8d4c707700c9f97630.js';Roblox.config.paths['Resources.Messages'] = 'https://js.rbxcdn.com/fb9cb43a34372a004b06425a1c69c9c4.js';Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/bbaeb48f3312bad4626e00c90746ffc0.js';Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/7b436bae917789c0b84f40fdebd25d97.js';Roblox.config.paths['Widgets.GroupImage'] = 'https://js.rbxcdn.com/33d82b98045d49ec5a1f635d14cc7010.js';Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/3368571372da9b2e1713bb54ca42a65a.js';Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/8babd891cf420dfe3999b3824a0154cb.js';Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/f2697119678d0851cfaa6c2270a727ed.js';Roblox.config.paths['Widgets.SurveyModal'] = 'https://js.rbxcdn.com/d6e979598c460090eafb6d38231159f6.js';</script>
<script>$(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>

    <script type="text/javascript">


    googletag.cmd.push(function() {
        Roblox = Roblox || {};
        Roblox.AdsHelper = Roblox.AdsHelper || {};
        Roblox.AdsHelper.slots = [];
        Roblox.AdsHelper.slots = Roblox.AdsHelper.slots || []; Roblox.AdsHelper.slots.push({slot:googletag.defineSlot("/1015347/Roblox_MyCharacter_Top_728x90", [728, 90], "34323331303032").addService(googletag.pubads()), id: "34323331303032", path: "/1015347/Roblox_MyCharacter_Top_728x90"});

        for (var key in Roblox.AdsHelper.slots) {
            var slot = Roblox.AdsHelper.slots[key].slot;
            var id = Roblox.AdsHelper.slots[key].id;
            var path = Roblox.AdsHelper.slots[key].path;

            if (slot.renderEnded != "undefined") {
                (function(slot, id)
                {
                    slot.renderEndedOld = slot.renderEnded;
                    slot.renderEnded = function() {
                        slot.renderEndedOld();
                        if ($('#' + id + '.gutter').css('display') == "none") {
                            $(document).trigger("GuttersHidden");
                        }
                        if ($('#' + id + '.filmstrip').css('display') == "none") {
                            $(document).trigger("FilmStripHidden");
                        }
                    };
                }(slot, id));
            }
        }

        googletag.pubads().setTargeting("Age", ["36", "18AndOver" ]);
                        googletag.pubads().setTargeting("Env",  "Production");
                                                googletag.pubads().setTargeting("Gender", "Male");
                        googletag.pubads().setTargeting("PLVU", "False");
        googletag.pubads().enableSingleRequest();
        googletag.pubads().collapseEmptyDivs();
        googletag.enableServices();
    });
    </script>  
<script type="text/javascript">
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
Roblox.Endpoints.Urls['/authentication/is-logged-in'] = '/authentication/is-logged-in';
</script>

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
</script></head>
<body id="rbx-body"
    class=""
    data-performance-relative-value="0.5"
    data-internal-page-name="Avatar">
    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm"></div>
    <script type="text/javascript">Roblox.XsrfToken.setToken('u256v2GAyfHL');</script>
 
    <script type="text/javascript">
        if (top.location != self.location) {
            top.location = self.location.href;
        }
    </script>
  
<style type="text/css">
    
</style>
<form name="aspnetForm" method="post" action="<?=$_SERVER['REQUEST_URI']?>" id="aspnetForm" class="nav-container no-gutter-ads">
<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="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" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="1ECBBB27" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="xOmPvfndnEm3JMiMV5tCLHSfECUjMeyrWbkDTol1fEjdGdIazwksiz4E8v4maKOhxOXSQ21c4mu4yJTQwPXma9zrKeQZDgZFsBIhQZIKGq7fU1CFET8X5bcn33zxXubqgrDR7ZyO8gpC8Wv7ZexAg9ePWKD9DC/ukw3frh9hClTGrtPF/J/5+e1lfgPrjF4htDe6AC3B7IyLEar/38lcG4tZFAMtlmlHvfPeGveASm+Zw5bK+8thZDazeVhuhwtdyNrnMRpuHPk/l1MXKjgmCb6na7HcZH6qqi4t+GlU/ZzOWKvEO1JM5F51rpz8wCGCwzcl5bK3zn1pISl5ZOaOMV9G04IbHbZ1DzEoEuy8I8u1RDLkByd4uycgZz1hY/jy4jdb7TlQFp1r0jyYaoWgo9P82wqBWy7wCGavMaUn10xb5c8XRU6Em4m9KsGQ+whk8m6mahmViIseMHSz3pGfK+mtJv2O/HdeS5bD/RTo1/bzoT7Ki+ZbL0q7J2txHcKzRvtXlh7kf5Us1JjRL6aLXqLH3+2v00t2NyWisGflPdqYOvYXyGTapFJSxq0ygt/CbcqiHsP3ZWgne8+HNF7Wfgzv0lEbkSdTMl9L4jo6gOn6LTXISG8vvVCzN6fnJOQMTFK2fSKV6PX/PlBtk5oKhd0XRuo=" />
</div>
    <div id="fb-root">
    </div>
    <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ctl00$ScriptManager', 'aspnetForm', ['tctl00$ctl00$cphRoblox$cphMyRobloxContent$CustomizeCharacterUpdatePanelAvatar','','tctl00$ctl00$cphRoblox$cphMyRobloxContent$UpdatePanelBodyColors','','tctl00$ctl00$cphRoblox$cphMyRobloxContent$UpdatePanelWardrobe','','tctl00$ctl00$cphRoblox$cphMyRobloxContent$UpdatePanelAccoutrements',''], [], [], 90, 'ctl00$ctl00');
//]]>
</script>

    
         
    
    
    

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

<div id="header"
     class="navbar-fixed-top rbx-header"
     role="navigation">
    <div class="container-fluid">
        <div class="rbx-navbar-header">
            <div data-behavior="nav-notification" class="rbx-nav-collapse" onselectstart="return false;">
                    <span class="rbx-icon-nav-menu"></span>
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
                <li class="rbx-navbar-search-option selected" data-searchurl="/search/users?keyword=">
                    <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in People</span>
                </li>
                        <li class="rbx-navbar-search-option" data-searchurl="/games/?Keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Games</span>
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
                <li><a data-behavior="logout" data-bind="/authentication/logout">Logout</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-tix" data-viewport="#header">
            <span class="rbx-icon-nav-tix" id="nav-tix"></span>
            <span class="rbx-text-navbar-right" id="nav-tix-amount"><?=$userinfo->tix?></span>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-tix">
            <ul class="rbx-dropdown-menu" role="menu">
                <li><a href="/My/Money.aspx#/#Summary_tab" id="nav-tix-balance"><?=$userinfo->tix?> Tickets</a></li>
                <li><a href="/my/money.aspx?tab=TradeCurrency">Trade Currency</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a id="nav-robux-icon" class="rbx-menu-item" data-toggle="popover" data-bind="popover-robux">
            <span class="rbx-icon-nav-robux" id="nav-robux"></span>
            <span class="rbx-text-navbar-right" id="nav-robux-amount"><?=$userinfo->robux?></span>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-robux">
            <ul class="rbx-dropdown-menu" role="menu">
                <li><a href="/My/Money.aspx#/#Summary_tab" id="nav-robux-balance"><?=$userinfo->robux?> ROBUX</a></li>
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
                <a href="/User.aspx"><?=$userinfo->username?></a>
            </li>
            <li class="rbx-divider"></li>
        </ul>

        <div class="rbx-scrollbar" data-toggle="scrollbar" onselectstart="return false;">
            <ul>
                <li><a href="/home" id="nav-home"><span class="rbx-icon-nav-home"></span><span>Home</span></a></li>
                <li><a href="/users/<?=$userinfo->id?>/profile" id="nav-profile"><span class="rbx-icon-nav-profile"></span><span>Profile</span></a></li>
                <li>
                    <a href="/my/messages/#!/inbox" id="nav-message" data-count="0">
                        <span class="rbx-icon-nav-message"></span><span>Messages</span>
                    </a>
                </li>
                <li>
                    <a href="/users/<?=$userinfo->id?>/friends" id="nav-friends" data-count="0">
                        <span class="rbx-icon-nav-friends"></span><span>Friends</span>
                        <span class="rbx-highlight" title="0"></span>
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
                        <span class="rbx-icon-nav-trade"></span><span>Trade</span>
                    </a>
                </li>
                <li>
                    <a href="/My/Groups.aspx" id="nav-group">
                        <span class="rbx-icon-nav-group"></span><span>Groups</span>
                    </a>
                </li>
                <li>
                    <a href="https://forum.roblox.com/forum/" id="nav-forum">
                        <span class="rbx-icon-nav-forum"></span><span>Forum</span>
                    </a>
                </li>
                <li>
                    <a href="https://blog.roblox.com" id="nav-blog">
                        <span class="rbx-icon-nav-blog"></span><span>Blog</span>
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

        <div id="navContent" class="nav-content"><div class="nav-content-inner">
    <div id="MasterContainer" >
        

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



        <script type="text/javascript">Roblox.FixedUI.gutterAdsEnabled=false;</script>

        

        <div id="Container">
            
            
        </div>
        
        
        <noscript><div class="SystemAlert"><div class="SystemAlertText">Please enable Javascript to use all the features on this site.</div></div></noscript>
        <div class="SystemAlert"><div class="rbx-alert-info" role="alert">Gameservers are back! Please excuse any issues, we're still testing!</div></div>
<?php
use watrbx\sitefunctions;
$func = new sitefunctions();
$ismobile = false;

if(isset($_SERVER['HTTP_USER_AGENT'])){
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    if(strpos($useragent, "Android")){
        $ismobile = true;
    }
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <!-- MachineID: WEB114 -->
    <title><?=$config["title"] ?? "Untitled Page" ?> - <?=$_ENV["APP_NAME"]?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600,700" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="en-us" />
    
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


	<script type="text/javascript">

        var _gaq = _gaq || [];

		    _gaq.push(['_setAccount', 'UA-11419793-1']);
		    _gaq.push(['_setCampSourceKey', 'rbx_source']);
		    _gaq.push(['_setCampMediumKey', 'rbx_medium']);
		    _gaq.push(['_setCampContentKey', 'rbx_campaign']);
		        _gaq.push(['_setDomainName', 'watrbx.wtf']);
		_gaq.push(['b._setAccount', 'UA-486632-1']);
		_gaq.push(['b._setCampSourceKey', 'rbx_source']);
		_gaq.push(['b._setCampMediumKey', 'rbx_medium']);
		_gaq.push(['b._setCampContentKey', 'rbx_campaign']);

		_gaq.push(['b._setDomainName', 'watrbx.wtf']);
        
            _gaq.push(['b._setCustomVar', 1, 'Visitor', 'Anonymous', 2]);
            _gaq.push(['b._trackPageview']);    
        
        
        

		_gaq.push(['c._setAccount', 'UA-26810151-2']);
		_gaq.push(['c._setDomainName', 'watrbx.wtf']);

		(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();

	</script>

    <script type='text/javascript'>Roblox.config.externalResources = [];Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/46776eac503b939a2fd9146d77d735a3.js';Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/da18f3da914691fb825e5ae9f00c9e49.js';Roblox.config.paths['Pages.Messages'] = 'https://js.rbxcdn.com/e8cbac58ab4f0d8d4c707700c9f97630.js';Roblox.config.paths['Resources.Messages'] = 'https://js.rbxcdn.com/fb9cb43a34372a004b06425a1c69c9c4.js';Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/bbaeb48f3312bad4626e00c90746ffc0.js';Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/7b436bae917789c0b84f40fdebd25d97.js';Roblox.config.paths['Widgets.GroupImage'] = 'https://js.rbxcdn.com/33d82b98045d49ec5a1f635d14cc7010.js';Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/3368571372da9b2e1713bb54ca42a65a.js';Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/8babd891cf420dfe3999b3824a0154cb.js';Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/f2697119678d0851cfaa6c2270a727ed.js';Roblox.config.paths['Widgets.SurveyModal'] = 'https://js.rbxcdn.com/d6e979598c460090eafb6d38231159f6.js';</script>


<script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
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
        <script type="text/javascript">
        Roblox.FixedUI.gutterAdsEnabled = false;
    </script>
    

    <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.jsConsoleEnabled = false;
    </script>

        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>
            <div id="EventStreamData"
             data-default-url="//ecsv2.watrbx.wtf/www/e.png"
             data-www-url="//ecsv2.watrbx.wtf/www/e.png"
             data-studio-url="//ecsv2.watrbx.wtf/pe?t=studio"></div>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.watrbx.wtf/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = '/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = '/client-status';
Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.watrbx.wtf/game/';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.watrbx.wtf/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.watrbx.wtf/game/getauthticket';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.watrbx.wtf/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.watrbx.wtf/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.watrbx.wtf/game/report-event';
Roblox.Endpoints.Urls['/chat/chat'] = 'http://misc.watrbx.wtf/chat/chat';
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
      class=""
      data-performance-relative-value="0.5"
      data-internal-page-name="NewLogin">
<div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm"></div>
    




<div id="fb-root"></div>

<div class="nav-container no-gutter-ads">


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
            The shop is not part of watrbx.wtf and is governed by a separate <a href="http://www.myplay.com/direct/cookie-policy?origin=desktop&permalink=shoproblox">privacy policy</a>.
        </div>
    </div>
</div>

<?php 

if($ismobile == false){ ?>

<div id="header"
     class="navbar-fixed-top rbx-header"
     role="navigation">
    <div class="container-fluid">
        <div class="rbx-navbar-header">
            <div data-behavior="nav-notification" class="rbx-nav-collapse" onselectstart="return false;">

                <div class="rbx-nav-notification hide rbx-font-xs"
                     title="0">
                    
                </div>

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
                <ul class="nav navbar-right rbx-navbar-right-nav" data-display-opened="False">
                    <li>
                        <a id="header-login" class="rbx-navbar-login" data-behavior="login" data-toggle="popover" data-bind="popover-login" data-viewport="#header">Log In</a>
                    </li>
                    <div id="iFrameLogin" class="rbx-popover-content" data-toggle="popover-login" role="menu">
                        <iframe id="iframe-login" class="rbx-navbar-login-iframe" src="/Login/iFrameLogin.aspx?loginRedirect=False&amp;parentUrl=https%3a%2f%2fwww.watrbx.wtf%2fNewLogin" scrolling="no" frameborder="0" width="320"></iframe>
                    </div>
                    <li>
                        <a class="rbx-navbar-signup" href="/">Sign Up</a>
                    </li>
                    <li class="rbx-navbar-right-search" data-toggle="toggle-search">
                        <a class="rbx-menu-icon">
                            <span class="rbx-icon-nav-search-white"></span>
                        </a>
                    </li>
                </ul>
        </div><!-- navbar right-->
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
<? } else { ?>

    <style>
        body, #rbx-body, #navContent {
            margin: 0px;
            height: 100% !important;
        }
    </style>

    <? } ?>

<!-- LEFT NAV MENU -->
    <div id="navContent" class="nav-content  ">
        <div class="nav-content-inner">
            <div id="MasterContainer">
                    <script type="text/javascript">
                        if (top.location != self.location) {
                            top.location = self.location.href;
                        }
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
<div>
<noscript><div class="SystemAlert"><div class="SystemAlertText">Please enable Javascript to use all the features on this site.</div></div></noscript>
<?php
$sitebanner = $func->get_setting("SITE_BANNER");

if(!$sitebanner == "" || !$sitebanner == null){ echo '<div class="SystemAlert" style="background-color: red;"><div class="SystemAlertText">'.preg_replace('#\bhttps?://[^\s<]+#i','<a href="$0" target="_blank" rel="noopener">$0</a>',$sitebanner).'</div></div>'; }
?>
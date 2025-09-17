


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    
<link rel='stylesheet' href='/CSS/Base/CSS/FetchCSS?path=page___8a730e47589c1982bfc3765f8bfb8669_m.css' />

    <script type='text/javascript' src='/js/10187297c8cf0775450cf3effcb06699.js'></script>

        <script type="text/javascript">

        var _gaq = _gaq || [];

        
		_gaq.push(['_setAccount', 'UA-43420590-3']);
		_gaq.push(['_setDomainName', 'roblox.com']);
       (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>
</head>
<body ng-app="clientToolbox">
    <script type='text/javascript'>
        var Roblox = Roblox || {};
        Roblox.ClientToolboxLinks =
        {
            HeaderTemplateLink: "/viewapp/studio/toolbox/header.html",
            SubnavTemplateLink: "/viewapp/studio/toolbox/subnav.html",
            PaginationTemplateLink: "/viewapp/studio/toolbox/pagination.html",
            AssetsTemplateLink: "/viewapp/studio/toolbox/assets.html",
            ThumbnailTemplateLink: "/viewapp/studio/toolbox/thumbnail.html",
            GetSetsByCreatorLink: "/sets/get-by-creator",
            GetRobloxSetsLink: "/sets/get-roblox-sets",
            GetSubscribedSetsLink: "/sets/get-subscribed",
            GetAssetsLink: "/ide/toolbox/items",
            GetSetItemsLink: "/sets/0/items",
            VoteStudioLink: "/voting/studio/vote",
            UnvoteStudioLink: "/voting/studio/unvote",
            InsertAssetLink: "/ide/insertasset",
            GetGroupsCanManageGamesInLink: "/groups/can-manage-games"
        };
        Roblox.AssetType = {
            "10": "FreeModels",
            "13": "FreeDecals",
        };
        Roblox.ClientToolboxModel = {
            // type cast to boolean for javascript
            IsUserAuthenticated: false,
            ContentUrl: "https://www.watrbx.xz/asset/",
            UserId: "-1",
            ShowGroupCategories: false
        };
        Roblox.jsConsoleEnabled = false;
        Roblox.EnableNewToolboxSearch = true;
    </script>
    <input name="__RequestVerificationToken" type="hidden" value="iNs1O7ZTEBMv02AupqRQk5RASY8tqrlrgCvea5pWGOxrZ_QR8yPC678Qv0jYKDWyU02YrceHTKwDNVZjZFU19nXda2I1" />
    <div roblox-toolbox>
        <div roblox-toolbox-header class="client-toolbox-header">
        </div>
        <div ng-controller="RobloxReferralLink" ng-show="showReferralLinks()" class="client-toolbox-referral-links">
            Try searching for:
            <a href ng-click="refer('NPC')">NPC</a>
            <a href ng-click="refer('Vehicle')">Vehicle</a>
            <a href ng-click="refer('Weapon')">Weapon</a>
            <a href ng-click="refer('Building')">Building</a>
            <a href ng-click="refer('Light')">Light</a>
        </div>
        <div roblox-toolbox-subnav class="client-toolbox-subnav">

        </div>
        <div roblox-toolbox-assets class="client-toolbox-content">
        </div>

        <div roblox-toolbox-pagination class="client-toolbox-subnav">

        </div>

    </div>

</body>

</html>

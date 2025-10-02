<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\thumbnails;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
$slugify = new Slugify();
$Carbon = new Carbon();
$pagebuilder = new pagebuilder();
$auth = new authentication();
$thumbs = new thumbnails();

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___693f28640f335d1c8bc50c5a11d7ad3d_m.css');
$pagebuilder->addresource('jsfiles', '/js/f49d858ef181e7cd401d8fcb4245e6e8.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6d2c5d08317da59677c25876e4f7f6a0.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6385cae49dc708a8f2f93167ad17466d.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->set_page_name("Catalog");

$pagebuilder->setlegacy(true);

$pagebuilder->buildheader();

global $db;


?>
<style>
        .original-image {
            height: 100px;
            width: 100px;
        }
    </style>
        
<div id="BodyWrapper">
            
            <div id="RepositionBody">
                <div id="Body" style='width:970px;'>
                    
    
<style type="text/css">
    #Body {
        padding: 5px;
    }
</style>

    <? require("../storage/catalog.php"); ?>

<script type="text/javascript">
        $(function(){
            if(true) {
                Roblox.AdsHelper.AdRefresher.globalCreateNewAdEnabled = true;
                Roblox.AdsHelper.AdRefresher.adRefreshRateInMilliseconds = 3000;
            
                Roblox.CatalogValues.CatalogContentsUrl = "/catalog/contents";
                Roblox.CatalogValues.ContainerID = "catalog";
            
                Roblox.require(['Pages.CatalogShared'], function () {
                    History.Adapter.bind(window, "statechange", function () {
                        Roblox.CatalogShared.handleURLChange(History.getState().data);
                    });
                });
                History.replaceState({ clickTargetID: "catalog", url: window.location.href }, document.title, window.location.href);
            }
        });
    </script>

</div>
</div>
</div>
        
        <? $pagebuilder->build_footer(); ?>
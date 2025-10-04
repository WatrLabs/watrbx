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

$assets = $db->table("assets")->where("featured", 1)->whereIn("prodcategory", [2, 8, 11, 12, 17, 18, 19, 32])->orderBy("created", "DESC")->limit(35)->get();

$assetIds = array_column($assets, 'id');
$idsCsv = implode(',', $assetIds);
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



<div id="catalog" data-empty-search-enabled="true">
<div class="header" style="height:60px;">
        <div style="float:left;">
            <h1><a href="/catalog" id="CatalogLink">Catalog</a></h1>
        </div>
    <div class="CatalogSearchBar">
        <input id="keywordTextbox" name="name" type="text" class="translate text-box text-box-small" />
        <div style="height:23px;border:1px solid #a7a7a7;padding:2px 2px 0px 2px;margin-right:6px;float:left;position:relative">
            <!--[if IE7]>
                <div style="height:19px;width:131px;position:absolute;top:2px;left:2px;border:1px solid white"></div>
                <div style="height:19px;width:15px;position:absolute;top:2px;right:2px;border:1px solid #aaa"></div>
            <![endif]-->
            <select id="categoriesForKeyword" style="">
                    <option value="1">All Categories</option>
                    <option value="0">Featured</option>
                    <option value="2">Collectibles</option>
                    <option value="3">Clothing</option>
                    <option value="4">Body Parts</option>
                    <option value="5">Gear</option>
            </select>
        </div>
        <a id="submitSearchButton" href="#" class="btn-control btn-control-large top-level">Search</a>
    </div>
</div>


    <div class="left-nav-menu divider-right">



    <div class="browseDropdownHeader"></div>

<div id="dropdown" class="splashdropdownsplashdropdown roblox-hierarchicaldropdown">
    <ul id="dropdownUl" class="clearfix">

            <li class="subcategories" data-delay="never">
                <a href="#category=featured" class="assetTypeFilter" data-category="0">Featured</a>
                <ul class="slideOut" style="top:-1px;">
                    <li class="slideHeader"><span>Featured Types</span></li>
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="0" data-category="0">All Featured Items</a></li>    
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="9" data-category="0">Featured Hats</a></li>    
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="5" data-category="0">Featured Gear</a></li>    
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="10" data-category="0">Featured Faces</a></li>    
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="11" data-category="0">Featured Packages</a></li>    
                </ul>
            </li>
        
            <li class="subcategories"><a href="#category=collectibles" class="assetTypeFilter collectiblesLink" data-category="2">Collectibles</a>
                <ul class="slideOut" style="top:-32px;">
                    <li class="slideHeader"><span>Collectible Types</span></li>
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="2" data-category="2">All Collectibles</a></li>    
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="10" data-category="2">Collectible Faces</a></li>    
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="9" data-category="2">Collectible Hats</a></li>    
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="5" data-category="2">Collectible Gear</a></li>    
                </ul>
            </li>

            <li class="slideHeader DropdownDivider divider-bottom" data-delay="ignore"></li>

            <li data-delay="always">
                <a href="#category=all" class="assetTypeFilter" data-category="1">All Categories</a>
            </li>
        
            <li class="subcategories">
                <a href="#category=clothing" class="assetTypeFilter" data-category="3">Clothing</a>
                <ul class="slideOut" style="top:-97px;">
                    <li class="slideHeader"><span>Clothing Types</span></li>
                        <li><a href="#" class="assetTypeFilter" data-types="3" data-category="3">All Clothing</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="9" data-category="3">Hats</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="12" data-category="3">Shirts</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="13" data-category="3">T-Shirts</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="14" data-category="3">Pants</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="11" data-category="3">Packages</a></li>    
                </ul>
            </li>
        
            <li class="subcategories"><a href="#category=bodyparts" class="assetTypeFilter" data-category="4">Body Parts</a>
                <ul class="slideOut" style="top:-128px;">
                    <li class="slideHeader"><span>Body Part Types</span></li>
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="4" data-category="4">All Body Parts</a></li>    
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="15" data-category="4">Heads</a></li>    
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="10" data-category="4">Faces</a></li>    
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="11" data-category="4">Packages</a></li>    
                </ul>
            </li>
        
            <li class="subcategories"><a href="#category=gear" class="assetTypeFilter" data-category="5">Gear</a>
                <ul class="slideOut" style="top:-159px; width:auto;" style="border-right:0px;">
                    <div>
                        <li class="slideHeader"><span>Gear Categories</span></li>
                            <li><a href="#geartype=All Gear" class="gearFilter" data-category="5" data-types="All">All Gear</a></li>
                            <li><a href="#geartype=Melee Weapon" class="gearFilter" data-category="5" data-types="1">Melee Weapon</a></li>
                            <li><a href="#geartype=Ranged Weapon" class="gearFilter" data-category="5" data-types="2">Ranged Weapon</a></li>
                            <li><a href="#geartype=Explosive" class="gearFilter" data-category="5" data-types="3">Explosive</a></li>
                            <li><a href="#geartype=Power Up" class="gearFilter" data-category="5" data-types="4">Power Up</a></li>
                            <li><a href="#geartype=Navigation Enhancer" class="gearFilter" data-category="5" data-types="5">Navigation Enhancer</a></li>
                            <li><a href="#geartype=Musical Instrument" class="gearFilter" data-category="5" data-types="6">Musical Instrument</a></li>
                            <li><a href="#geartype=Social Item" class="gearFilter" data-category="5" data-types="7">Social Item</a></li>
                            <li><a href="#geartype=Building Tool" class="gearFilter" data-category="5" data-types="8">Building Tool</a></li>
                            <li><a href="#geartype=Personal Transport" class="gearFilter" data-category="5" data-types="9">Personal Transport</a></li>
                    </div>

                </ul>
            </li>
        
                            </ul>
</div>
<div id="legend" class="">
    <div class="header expanded" id="legendheader">
        <h3>Legend</h3>
    </div>
    <div id="legendcontent" style="overflow: hidden; ">
        <img src="/images/4fc3a98692c7ea4d17207f1630885f68.png" style="margin-left: -13px" />
        <div class="legendText"><b>Builders Club Only</b><br/>
        Only purchasable by Builders Club members.</div>

        <img src="/images/793dc1fd7562307165231ca2b960b19a.png" style="margin-left: -13px" />
        <div class="legendText"><b>Limited Items</b><br/>
        Owners of these discontinued items can re-sell them to other users at any price.</div>
        
        <img src="/images/d649b9c54a08dcfa76131d123e7d8acc.png" style="margin-left: -13px" />
        <div class="legendText"><b>Limited Unique Items</b><br/>
        A limited supply originally sold by ROBLOX. Each unit is labeled with a serial number. Once sold out, owners can re-sell them to other users.
        </div>
    </div>
</div>                           
    </div>
    <div class="right-content divider-left">
        <a  href="https://www.roblox.com/upgrades/robux?ctx=catalog" class="btn-medium btn-primary">Buy Robux</a>

        <h2>Featured Items on ROBLOX</h2>
        <div style="clear:both;"></div>
        
        <?php
            foreach ($assets as $asset){
                $pagebuilder->build_component("catalog_item", ["asset"=>$asset, "slugify"=>$slugify, "thumbs"=>$thumbs, "auth"=>$auth, "Carbon"=>$Carbon]);
            }
        ?>


        <div style="clear:both;padding-top: 50px;text-align:center;font-weight: bold;">
                <a href="#featured=all" class="assetTypeFilter" data-category="Featured">See all featured items</a>            
        </div>
    </div>
    <div style="clear:both" style="padding-top:20px"></div>
</div>

<script type="text/javascript">
    $(function () {
        Roblox.require(['Pages.Catalog', 'Pages.CatalogShared', 'Widgets.HierarchicalDropdown'], function (catalog) {
            var pagestate = { "Category": 1, "CurrencyType": 0, "SortType": 0, "SortAggregation": 3, "SortCurrency": 0, "AssetTypes": null, "Gears": null, "Genres": null, "Keyword": null, "PageNumber": 1, "Creator": null, "PxMin": 0, "PxMax": 0 };
            catalog.init(pagestate, 1);
            Roblox.Widgets.HierarchicalDropdown.init();
            if(Roblox.CatalogValues.ContainerID)
            {
                $('#' + Roblox.CatalogValues.ContainerID).on(Roblox.CatalogShared.CatalogLoadedViaAjaxEventName, null, null, Roblox.CatalogShared.handleCatalogLoadedViaAjaxEvent);
            }
        });

            Roblox.CatalogValues = Roblox.CatalogValues || {};
            Roblox.CatalogValues.CatalogContext = 1;
        
        
            var idsCsv = '<?= $idsCsv; ?>';
            var url =  '/catalog/impression';
            Roblox.Catalog.ImpressionCounter.fireImpression(idsCsv, url);
    });

</script>
<!--[if IE]>
    <script type="text/javascript">
        $(function () {
            $('.BigInner').live('mouseenter', function () {                
                $(this).parents('.BigView').css('z-index', '6');
                $('.SmallView').css('z-index', '1');
            });
            $('.BigInner').live('mouseleave', function () {                
                $(this).parents('.BigView').css('z-index', '1');
                $('.SmallView').css('z-index', '6');
            });
            $('.SmallInner').live('mouseenter', function () {
                $('.SmallView').css('z-index', '1');
                $(this).parents('.SmallCatalogItemView').css('z-index', '6');
            });
            $('.SmallInner').live('mouseleave', function () {
                $('.SmallView').css('z-index', '1');
                $(this).parents('.SmallCatalogItemView').css('z-index', '1');
            });
        });
    </script>
<![endif]-->

   
    
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

                    <div style="clear:both"></div>
                </div>
            </div>
        </div> 
        </div>
        
        <? $pagebuilder->build_footer(); ?>
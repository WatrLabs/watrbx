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
$category = 1;
    global $db;

    $limit = 42;
    $keyword = null;

    $assetTypes = array(
    'Image' => 1,
    'TShirt' => 2,
    'Audio' => 3,
    'Mesh' => 4,
    'Lua' => 5,
    'Hat' => 8,
    'Place' => 9,
    'Model' => 10,
    'Shirt' => 11,
    'Pants' => 12,
    'Decal' => 13,
    'Head' => 17,
    'Face' => 18,
    'Gear' => 19,
    'Badge' => 21,
    'Animation' => 24,
    'Torso' => 27,
    'RightArm' => 28,
    'LeftArm' => 29,
    'LeftLeg' => 30,
    'RightLeg' => 31,
    'Package' => 32,
    'GamePass' => 34,
    'Plugin' => 38,
    'MeshPart' => 40,
    'HairAccessory' => 41,
    'FaceAccessory' => 42,
    'NeckAccessory' => 43,
    'ShoulderAccessory' => 44,
    'FrontAccessory' => 45,
    'BackAccessory' => 46,
    'WaistAccessory' => 47,
    'ClimbAnimation' => 48,
    'DeathAnimation' => 49,
    'FallAnimation' => 50,
    'IdleAnimation' => 51,
    'JumpAnimation' => 52,
    'RunAnimation' => 53,
    'SwimAnimation' => 54,
    'WalkAnimation' => 55
);
    $alltext = "ALL CATEGORIES";
    $assets = $db->table("assets")->where("featured", 1)->whereIn("prodcategory", [2, 8, 11, 12, 17, 18, 19, 32])->orderBy("created", "DESC")->get();

    $page = 1;
    $limit = 35;

    if(isset($_GET["Keyword"])){
        $keyword = $_GET["Keyword"];
    }

    function getCatalogQuery($db, $prodCategories, $featured = false, $publicdomain = false) {

        $keyword = null;

        if(isset($_GET["Keyword"])){
            $keyword = $_GET["Keyword"];
        }

        $query = $db->table("assets")->whereIn("prodcategory", $prodCategories)->orderBy("created", "DESC");
        if ($featured) $query = $query->where("featured", 1);
        if ($publicdomain) $query = $query->where("publicdomain", 1);
        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%");
            });
        }
        return $query->get();
    }

    if(isset($_GET["Category"])) {
        $category = (int)$_GET["Category"];
        $subcategory = 0;

        if(isset($_GET["Subcategory"])) {
            $subcategory = (int)$_GET["Subcategory"];
        }

        if(isset($_GET["PageNumber"])) {
            $page = (int)$_GET["PageNumber"];
        }

        if($category == 1){
            // All Categories
            $alltext = "ALL CATEGORIES";
            $assets = getCatalogQuery($db, [2, 8, 11, 12, 17, 18, 19, 32]);
        } elseif($category == 4){
            // Body Parts
            $alltext = "All Body Parts";
            $prodCategories = [17, 18, 32];

            if($subcategory == 15){
                $alltext = "All Heads";
                $prodCategories = [17];
            } elseif($subcategory == 10){
                $alltext = "All Faces";
                $prodCategories = [18];
            } elseif($subcategory == 11){
                $alltext = "All Packages";
                $prodCategories = [32];
            }

            $assets = getCatalogQuery($db, $prodCategories);
        } elseif($category == 3){
            // All Clothing
            $alltext = "All Clothing";
            $prodCategories = [2, 8, 11, 12, 32];

            if($subcategory == 9){
                $alltext = "All Hats";
                $prodCategories = [8];
            } elseif($subcategory == 11){
                $alltext = "All Packages";
                $prodCategories = [32];
            } elseif($subcategory == 12){
                $alltext = "All Shirts";
                $prodCategories = [11];
            } elseif($subcategory == 13){
                $alltext = "All T-Shirts";
                $prodCategories = [2];
            } elseif($subcategory == 14){
                $alltext = "All Pants";
                $prodCategories = [12];
            }

            $assets = getCatalogQuery($db, $prodCategories);
        } elseif($category == 5){
            $alltext = "All Gears";
            $assets = getCatalogQuery($db, [19]);
        } elseif($category == 6){
            $alltext = "All Models";
            $assets = getCatalogQuery($db, [10]);
        } elseif($category == 8){
            $alltext = "All Decals";
            $assets = getCatalogQuery($db, [13], false, true);
        } elseif($category == 9){
            $alltext = "All Audios";
            $assets = getCatalogQuery($db, [3]);
        }
    }

    $count = count($assets);

    $currentpage = $page - 1;
    $displaypage = $currentpage + 1;

    $allpages = ceil($count / $limit);
    $offset = $currentpage * $limit;

    $assets = array_splice($assets, $offset, $limit);
    

?>

<script type='text/javascript'>Roblox.config.externalResources = [];Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/46776eac503b939a2fd9146d77d735a3.js';Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/da18f3da914691fb825e5ae9f00c9e49.js';Roblox.config.paths['Pages.Messages'] = 'https://js.rbxcdn.com/e8cbac58ab4f0d8d4c707700c9f97630.js';Roblox.config.paths['Resources.Messages'] = 'https://js.rbxcdn.com/fb9cb43a34372a004b06425a1c69c9c4.js';Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/bbaeb48f3312bad4626e00c90746ffc0.js';Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/7b436bae917789c0b84f40fdebd25d97.js';Roblox.config.paths['Widgets.GroupImage'] = 'https://js.rbxcdn.com/33d82b98045d49ec5a1f635d14cc7010.js';Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/3368571372da9b2e1713bb54ca42a65a.js';Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/8babd891cf420dfe3999b3824a0154cb.js';Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/f2697119678d0851cfaa6c2270a727ed.js';Roblox.config.paths['Widgets.SurveyModal'] = 'https://js.rbxcdn.com/d6e979598c460090eafb6d38231159f6.js';</script>

<style type="text/css">
    #Body {
        padding: 5px;
    }
</style>
<div id="catalog" data-empty-search-enabled="true" style="font-size: 12px;">
<div class="header" style="height:60px;">
        <div style="float:left;">
            <h1><a href="/catalog" id="CatalogLink">Catalog</a></h1>
        </div>
    <div class="CatalogSearchBar">
        <input id="keywordTextbox" name="name" type="text" class="translate text-box text-box-small" <?php if(isset($keyword)){ echo "value=\"" .  htmlspecialchars($keyword) . "\"";  } ?> />
        <div style="height:23px;border:1px solid #a7a7a7;padding:2px 2px 0px 2px;margin-right:6px;float:left;position:relative">
            <!--[if IE7]>
                <div style="height:19px;width:131px;position:absolute;top:2px;left:2px;border:1px solid white"></div>
                <div style="height:19px;width:15px;position:absolute;top:2px;right:2px;border:1px solid #aaa"></div>
            <![endif]-->
            <select id="categoriesForKeyword" style="">
                    <option value="1"selected=selected>All Categories</option>
                    <option value="0">Featured</option>
                    <option value="2">Collectibles</option>
                    <option value="3">Clothing</option>
                    <option value="4">Body Parts</option>
                    <option value="5">Gear</option>
                    <option value="6">Models</option>
                    <option value="8">Decals</option>
                    <option value="9">Audio</option>
                    <option value="7">Plugins</option>
            </select>
        </div>
        <a id="submitSearchButton" href="#" class="btn-control btn-control-large top-level">Search</a>
    </div>
</div>


    <div class="left-nav-menu divider-right">



    <div class="browseDropdownHeader"></div>

<div id="dropdown" class="browsedropdownbrowsedropdown roblox-hierarchicaldropdown">
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
                    </div>
                    <div id="gearSecondColumn">
                            <li><a href="#geartype=Social Item" class="gearFilter" data-category="5" data-types="7">Social Item</a></li>
                            <li><a href="#geartype=Building Tool" class="gearFilter" data-category="5" data-types="8">Building Tool</a></li>
                            <li><a href="#geartype=Personal Transport" class="gearFilter" data-category="5" data-types="9">Personal Transport</a></li>

                    </div>
                </ul>
            </li>
        
            <li>
                <a href="#category=models" class="assetTypeFilter " data-category="6">Models</a>
            </li>
                    <li>
                <a href="#category=decals" class="assetTypeFilter " data-category="8">Decals</a>
            </li>
                    <li>
                <a href="#category=audio" class="assetTypeFilter " data-category="9">Audio</a>
            </li>
                    <li>
                <a href="#category=plugins" class="assetTypeFilter " data-category="7">Plugins</a>
            </li>
    </ul>
</div>
            <div style="padding-top:20px;">
                <h2>Filters</h2>
            </div>
            <div style="margin-left:5px">
                <div class="filter-title">Category</div>
                <ul>
                        <li><a href="#category=All Categories" class="assetTypeFilter selected" data-keepfilters="true" data-category="1">All Categories</a></li>
                        <li><a href="#category=Featured" class="assetTypeFilter" data-keepfilters="true" data-category="0">Featured</a></li>
                        <li><a href="#category=Collectibles" class="assetTypeFilter" data-keepfilters="true" data-category="2">Collectibles</a></li>
                        <li><a href="#category=Clothing" class="assetTypeFilter" data-keepfilters="true" data-category="3">Clothing</a></li>
                        <li><a href="#category=Body Parts" class="assetTypeFilter" data-keepfilters="true" data-category="4">Body Parts</a></li>
                        <li><a href="#category=Gear" class="assetTypeFilter" data-keepfilters="true" data-category="5">Gear</a></li>
                        <li><a href="#category=Models" class="assetTypeFilter" data-keepfilters="true" data-category="6">Models</a></li>
                        <li><a href="#category=Decals" class="assetTypeFilter" data-keepfilters="true" data-category="8">Decals</a></li>
                        <li><a href="#category=Audio" class="assetTypeFilter" data-keepfilters="true" data-category="9">Audio</a></li>
                        <li><a href="#category=Plugins" class="assetTypeFilter" data-keepfilters="true" data-category="7">Plugins</a></li>
                </ul>

        
        
                <div class="filter-title">Genre</div>
                <ul id="genresUl">
                    <li><a href="#" id="AllGenresLink" onclick="Roblox.Pages.Catalog.ClearGenres();" class="selected">All Genres</a></li>
                        <li>
                            <input type="checkbox" id="genre-13" class="genreFilter" data-genreId="13" />
                            <label for="genre-13">Building</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-5" class="genreFilter" data-genreId="5" />
                            <label for="genre-5">Horror</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-1" class="genreFilter" data-genreId="1" />
                            <label for="genre-1">Town and City</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-11" class="genreFilter" data-genreId="11" />
                            <label for="genre-11">Military</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-9" class="genreFilter" data-genreId="9" />
                            <label for="genre-9">Comedy</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-2" class="genreFilter" data-genreId="2" />
                            <label for="genre-2">Medieval</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-7" class="genreFilter" data-genreId="7" />
                            <label for="genre-7">Adventure</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-3" class="genreFilter" data-genreId="3" />
                            <label for="genre-3">Sci-Fi</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-6" class="genreFilter" data-genreId="6" />
                            <label for="genre-6">Naval</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-14" class="genreFilter" data-genreId="14" />
                            <label for="genre-14">FPS</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-15" class="genreFilter" data-genreId="15" />
                            <label for="genre-15">RPG</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-8" class="genreFilter" data-genreId="8" />
                            <label for="genre-8">Sports</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-4" class="genreFilter" data-genreId="4" />
                            <label for="genre-4">Fighting</label>
                        </li>
                        <li>
                            <input type="checkbox" id="genre-10" class="genreFilter" data-genreId="10" />
                            <label for="genre-10">Western</label>
                        </li>
                </ul>

                <div class="filter-title">Creators</div>
                <ul>
                        <li><a href="#creator=0" class="creatorFilter selected" data-creatorId="0">All Creators</a></li>
                        <li><a href="#creator=1" class="creatorFilter" data-creatorId="1">ROBLOX</a></li>
                    <li><input id="creatorTextbox" name="name" type="text" value="Name" class="Watermark translate text-box text-box-small" /> <a href="#" id="submitCreatorButton" class="btn-control btn-control-small">Go</a></li>
                </ul>
        
        
                <div class="filter-title">Currency / Price</div>
                <ul class="separatorForLegend" style="border:0">
                    <li><a href="#price=0" class="priceFilter selected" data-currencytype="0">All Currency</a></li>
                    <li><a href="#price=1" class="priceFilter" data-currencytype="1">Robux</a></li>
                    <li><a href="#price=2" class="priceFilter" data-currencytype="2">Tickets</a></li>
                    <li><a href="#price=5" class="priceFilter" data-currencytype="5">Free</a></li>
                                    <li class="NotForSale">
                        <input type="checkbox" id="includeNotForSaleCheckbox" value="true" />
                        <label for="includeNotForSaleCheckbox">Show unavailable items</label>
                    </li>
                </ul>
            </div>
<div id="legend" class="divider-top">
    <div class="header" id="legendheader">
        <h3>Legend</h3>
    </div>
    <div id="legendcontent" style="overflow: hidden;display:none">
        <img src="https://images.rbxcdn.com/4fc3a98692c7ea4d17207f1630885f68.png" style="margin-left: -13px" />
        <div class="legendText"><b>Builders Club Only</b><br/>
        Only purchasable by Builders Club members.</div>

        <img src="https://images.rbxcdn.com/793dc1fd7562307165231ca2b960b19a.png" style="margin-left: -13px" />
        <div class="legendText"><b>Limited Items</b><br/>
        Owners of these discontinued items can re-sell them to other users at any price.</div>
        
        <img src="https://images.rbxcdn.com/d649b9c54a08dcfa76131d123e7d8acc.png" style="margin-left: -13px" />
        <div class="legendText"><b>Limited Unique Items</b><br/>
        A limited supply originally sold by ROBLOX. Each unit is labeled with a serial number. Once sold out, owners can re-sell them to other users.
        </div>
    </div>
</div>                               </div>

    <div class="right-content divider-left">
<a href="#breadcrumbs=category" class="breadCrumbFilter bolded selected" data-filter="category"><?=$alltext?> <?php if(isset($keyword)){ echo " » " . htmlspecialchars($keyword); } ?></a>
        <div id="secondRow">
            <div style="float:left;padding-top:5px">

                    <span>Showing <span class="notranslate"><?=$offset?></span> - <span class="notranslate"><?=$offset + $limit?></span> of <span class="notranslate"><?=$count?></span> results</span>
            </div>

            <div id="SortOptions">
                Sort by: 
                    <select id="SortMain">
                            <option value="0" selected=selected >Relevance</option>
                            <option value="1">Most Favorited</option>
                            <option value="2">Bestselling</option>
                            <option value="3">Recently updated</option>
                            <option value="5">Price (High to Low)</option>
                            <option value="4">Price (Low to High)</option>
                    </select>
                    <select id="SortAggregation" style=display:none >
                            <option value="3" selected=selected >All Time</option>
                            <option value="1">Past week</option>
                            <option value="0">Past day</option>
                    </select>
                    <select id="SortCurrency" style=display:none >
                            <option value="0" selected=selected >in Robux</option>
                            <option value="1">in Tickets</option>
                    </select>
            </div>

            <div style="clear:both"></div>
        </div>



        <?php
            foreach ($assets as $asset){
                $pagebuilder->build_component("catalog_item", ["asset"=>$asset, "slugify"=>$slugify, "thumbs"=>$thumbs, "auth"=>$auth, "Carbon"=>$Carbon]);
            }
        ?>

            <div class="PagingContainerDivTop">
                <span class="pager previous" id="pagingprevious"></span>
                <span class="page text">
                    Page <input class="Paging_Input translate" type="text" value="<?=$page?>"/> of <?=$allpages?>
                    <span class="paging_pagenums_container"></span>
                </span>
                <span class="pager next" id="pagingnext"></span>
            </div>
        
    
    </div>
    <div style="clear:both;padding-top:20px"></div>
</div>

<div id="AddToGearInstructionsPanel" class="PurchaseModal">
    <div id="simplemodal-close" class="simplemodal-close">
        <a></a>
    </div>
    <div class="titleBar" style="text-align: center">
        Add Gear to Your Game
    </div>
    <div class="PurchaseModalBody">
        <div class="PurchaseModalMessage">
            <div class="PromoteModalErrorMessage errorStatusBar"></div>
            <div class="PurchaseModalMessageText">
                <span>
                    <img src="/images/img-addgear-screenshot.jpg"/>
                </span>
                <br/>
                To add gear to your game, find an item in the catalog and click the "Add to Game" button. The item will automatically be allowed in game, and you'll receive a commission on every copy sold from your game page. (You can only add gear that's for sale.)
            </div>
        </div>
        <div class="PurchaseModalButtonContainer">
            <div class="ImageButton btn-blue-ok-sharp simplemodal-close" ></div>
        </div>
        <div class="PurchaseModalFooter footnote"></div>
    </div>
</div>


<script type="text/javascript">
    $(function () {
        Roblox.require(['Pages.Catalog', 'Pages.CatalogShared', 'Widgets.HierarchicalDropdown'], function (catalog) {
            var pagestate = { "Category": <?=$category?>, <? if(isset($subcategory)) { echo '"Subcategory": ' . $subcategory . ","; }  ?> "CurrencyType": 0, "SortType": 0, "SortAggregation": 3, "SortCurrency": 0, "AssetTypes": null, "Gears": null, "Genres": null, "Keyword": <?php if(isset($keyword)){ echo "'" . htmlspecialchars($keyword) . "'"; } else { echo "null"; }?>, "PageNumber": <?=$page?>, "Creator": null, "PxMin": 0, "PxMax": 0 };
            catalog.init(pagestate, 1);
            Roblox.Widgets.HierarchicalDropdown.init();
            if(Roblox.CatalogValues.ContainerID)
            {
                $('#' + Roblox.CatalogValues.ContainerID).on(Roblox.CatalogShared.CatalogLoadedViaAjaxEventName, null, null, Roblox.CatalogShared.handleCatalogLoadedViaAjaxEvent);
            }
        });

            Roblox.CatalogValues = Roblox.CatalogValues || {};
            Roblox.CatalogValues.CatalogContext = 1;
        
        
            var idsCsv = '332747438,315618053,332744676,332744443,332748371,287039152,330296924,20573086,63043890,1073690,1029025,11297708,188703010,330295337,78730532,106690045,16630147,1028859,192557913,27847645,151784320,19380685';
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

   
<?php
use watrlabs\watrkit\pagebuilder;
$pagebuilder = new pagebuilder();
    global $db;
    $assets = $db->table("assets")->where("featured", 1)->whereIn("prodcategory", [2, 8, 11, 12, 17, 18, 19, 32])->orderBy("created", "DESC")->get();
?>


<style type="text/css">
    #Body {
        padding: 5px;
    }
</style>
<div id="catalog" data-empty-search-enabled="true" style="font-size: 12px;">
<div class="header" style="height:60px;">
        <div style="float:left;">
            <h1><a href="http://www.roblox.com/catalog" id="CatalogLink">Catalog</a></h1>
        </div>
    <div class="CatalogSearchBar">
        <input id="keywordTextbox" name="name" type="text" class="translate text-box text-box-small" />
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
        <img src="http://images.rbxcdn.com/4fc3a98692c7ea4d17207f1630885f68.png" style="margin-left: -13px" />
        <div class="legendText"><b>Builders Club Only</b><br/>
        Only purchasable by Builders Club members.</div>

        <img src="http://images.rbxcdn.com/793dc1fd7562307165231ca2b960b19a.png" style="margin-left: -13px" />
        <div class="legendText"><b>Limited Items</b><br/>
        Owners of these discontinued items can re-sell them to other users at any price.</div>
        
        <img src="http://images.rbxcdn.com/d649b9c54a08dcfa76131d123e7d8acc.png" style="margin-left: -13px" />
        <div class="legendText"><b>Limited Unique Items</b><br/>
        A limited supply originally sold by ROBLOX. Each unit is labeled with a serial number. Once sold out, owners can re-sell them to other users.
        </div>
    </div>
</div>                               </div>

    <div class="right-content divider-left">
<a href="#breadcrumbs=category" class="breadCrumbFilter bolded selected" data-filter="category">All Categories</a>
        <div id="secondRow">
            <div style="float:left;padding-top:5px">

                    <span>Showing <span class="notranslate">1</span> - <span class="notranslate">42</span> of <span class="notranslate">12,420,445</span> results</span>
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
                $pagebuilder->build_component("catalog_item", ["asset"=>$asset]);
            }
        ?>

            <div class="PagingContainerDivTop">
                <span class="pager previous" id="pagingprevious"></span>
                <span class="page text">
                    Page <input class="Paging_Input translate" type="text" value="1"/> of 295,725
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
        Roblox.require('Pages.Catalog', function (catalog) {
            catalog.init({"Subcategory":1,"Category":1,"CurrencyType":0,"SortType":0,"SortAggregation":3,"SortCurrency":0,"Gears":null,"Genres":null,"CatalogContext":0,"Keyword":null,"PageNumber":1,"CreatorID":0,"PxMin":0,"PxMax":0,"IncludeNotForSale":false,"LegendExpanded":false,"ResultsPerPage":42}, 295725, true);
        });

        $('.Paging_Input').val('1'); /* what?! party.js overwrites paging_input on any pageback */

        $(function () {
            if (window.location.search.indexOf('&showInstructions=true') > -1) {
                var modalProperties = { escClose: true, opacity: 80, overlayCss: { backgroundColor: "#000"} };
                $('#AddToGearInstructionsPanel').modal(modalProperties);
            }
        });


    });
</script>

<!--[if IE]>
    <script type="text/javascript">
        $(function () {
            $('.CatalogItemInner').live('mouseenter', function () {
                $(this).parents('.SmallCatalogItemView').css('z-index', '6');
            });
            $('.CatalogItemInner').live('mouseleave', function () {
                $(this).parents('.SmallCatalogItemView').css('z-index', '1');
            });
        });
    </script>
<![endif]-->

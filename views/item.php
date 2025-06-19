<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\thumbnails;
$thumbs = new thumbnails();
$auth = new authentication();
$pagebuilder = new pagebuilder();

if($auth->hasaccount()){
    global $currentuser;
    $userinfo = $currentuser;
} else {
    header("Location: /newlogin");
    die();
}

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

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___21c026f129b626345b81a3a4d6882c7d_m.css');
$pagebuilder->addresource('jsfiles', '/js/4eedc3a9c944bd9a29f80c2e9668dfdb.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/8220b4ecd0fe4da790391da3fd0b442c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/59e30cf6dc89b69db06bd17fbf8ca97c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/43936b3386e6514e97f2b3ae23f53404.js.gzip');
$pagebuilder->addresource('jsfiles', '/ScriptResource.axd');
$pagebuilder->set_page_name("Item");
$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();



if($asset->prodcategory == 1)
{
    $thumb = "//c0.watrbx.xyz/" . $asset->fileid;
} else {
    $thumb = $thumbs->get_asset_thumb($asset->id);
}
?>
        <div id="BodyWrapper">
            
            <div id="RepositionBody">
                <div id="Body" style='width:970px;'>
                
    <div id="ItemContainer" class="text ">
        <div>
            <div id="ctl00_cphRoblox_GearDropDown" class="SetList ItemOptions invisible" data-isdropdownhidden="False" data-isitemlimited="True" data-isitemresellable="True">
                <a href="#" class="btn-dropdown">
                    
                    <img src="/images/ea51d75440715fc531fc3ad281c722f3.png" />
                </a>
                <div class="clear"></div>
                <div class="SetListDropDown">
                    <div class="SetListDropDownList invisible">
                        <div class="menu invisible">
                            <div id="ctl00_cphRoblox_WearItemPanel">
	
                                <a id="ctl00_cphRoblox_btnWear" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$btnWear&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Wear Item</a>
                            
</div>
                            
                            
                            
                            <div id="ctl00_cphRoblox_ItemOwnershipPanel">
	
                                <a id="ctl00_cphRoblox_btnDelete" class="invisible" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$btnDelete&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Delete from My Stuff</a>
                            
</div>
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="notranslate" data-se="item-name">
                <?=$asset->name?>
            </h1>
            <h3>
                ROBLOX <?=array_search($asset->prodcategory, $assetTypes)?>
                
            </h3>
        </div>
        <div id="Item">
            <div id="Details">
                
                        <div id="assetContainer">
                            <div id="Thumbnail">
                                <div id="AssetThumbnail" class="thumbnail-holder" data-reset-enabled-every-page  data-url="/thumbnail/asset?assetId=20418658&amp;thumbnailFormatId=254&amp;width=320&amp;height=320" style="width:320px; height:320px;">
                                    <span class="thumbnail-span" ><img  class='' src='<?=$thumb?>' /></span>
                                    <span class="enable-three-dee btn-control btn-control-small"></span>
                                </div>
                            </div>
                            <span id="ThumbnailText"></span>
                        </div>
                    
                <div id="Summary">
                    <div class="SummaryDetails">
                        <div id="Creator" class="Creator">
                            <div class="Avatar">
                                
                                <a id="ctl00_cphRoblox_AvatarImage" class=" notranslate" class=" notranslate" title="ROBLOX" href="/users/1/profile" style="display:inline-block;height:70px;width:70px;cursor:pointer;"><img src="https://watrbx.xyz/images/defaultimage.png" height="70" width="70" border="0" alt="ROBLOX" class=" notranslate" /><img src="/images/icons/overlay_obcOnly.png" class="bcOverlay" align="left" style="position:relative;top:-19px;" /></a>
                            </div>
                        </div>
                        <div class="item-detail">
                            <span class="stat-label notranslate">Creator:</span>
                            <a id="ctl00_cphRoblox_CreatorHyperLink" class="stat notranslate" href="/users/1/profile">ROBLOX</a>
                            
                            <div>
                                <span class="stat-label">Created:</span>
                                <span class="stat">
                                    1/8/2010
                                </span>
                            </div>
                            <div id="LastUpdate">
                                <span class="stat-label">Updated:</span>
                                <span class="stat">
                                    5 years ago
                                </span>
                                </div>
                                
                                 
                        </div>
                        <div id="ctl00_cphRoblox_DescriptionPanel" class="DescriptionPanel notranslate">
	
                            <pre class="Description Full text"> <?=$asset->description?> </pre>
                            <pre class="Description body text"><span class="description-content"><?=$asset->description?></span><span class="description-more-container"></span></pre>
                        
</div>
                        <div class="ReportAbuse">
                            <div id="ctl00_cphRoblox_AbuseReportButton1_AbuseReportPanel" class="ReportAbuse">
	
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseIconHyperLink" href="/abusereport/asset?id=20418658&amp;RedirectUrl=http%3a%2f%2fwww.roblox.com%2fitem.aspx%3fseoname%3dErr%26id%3d20418658"><img src="images/abuse.PNG?v=2" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseTextHyperLink" href="/abusereport/asset?id=20418658&amp;RedirectUrl=http%3a%2f%2fwww.roblox.com%2fitem.aspx%3fseoname%3dErr%26id%3d20418658">Report Abuse</a></span>

</div>
                        </div>
                        
                        
                        
                        
                        
                        <div class="GearGenreContainer divider-top">
                            <div id="GenresDiv">
                                <div id="ctl00_cphRoblox_Genres">
	
                                    <div class="stat-label">
                                        Genres:</div>
                                    <div class="GenreInfo stat">
                                        

<div>
    
            <div id="ctl00_cphRoblox_GenresDisplayTest_AssetGenreRepeater_ctl00_AssetGenreRepeaterPanel" class="AssetGenreRepeater_Container">
		
                <div class="GamesInfoIcon All"></div>
                <div><a href="/all-catalog">All</a></div>
            
	</div>  
        
    <div style="clear:both;"></div>
</div>
                                    </div>
                                
</div>
                            </div>
                            
                            <div class="clear"></div>
                        </div>
                        <div class="PluginMessageContainer" style="display: none;">
                            <p>
                                <span class="status-confirm">A newer version is available.</span>
                            </p>
                        </div>
                    </div>
                    <div class="BuyPriceBoxContainer">
                        
                        <div class="BuyPriceBox">
                            <div id="ctl00_cphRoblox_RobuxPurchasePanel">
                                <div id="RobuxPurchase">
                                    <div class="calloutParent">
                                        Price: <span class="robux " data-se="item-priceinrobux">
                                        <?=$asset->robux?>
                                        </span>
                                        
                                    </div>
                                    <div id="BuyWithRobux">
                                        <div data-expected-currency="1" data-asset-type="<?=array_search($asset->prodcategory, $assetTypes)?>" class="btn-primary btn-medium PurchaseButton " data-se="item-buyforrobux" data-item-name="<?=$asset->name?>" data-item-id="<?=$asset->id?>" data-expected-price="<?=$asset->robux?>" data-product-id="<?=$asset->id?>" data-expected-seller-id="<?=$asset->owner?>" data-bc-requirement="0" data-seller-name="ROBLOX">
                                             Buy with R$
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php
                                if($asset->tix !== 0){ ?>
                                    <div id="ctl00_cphRoblox_RobuxAndTicketsPurchasePanel" class="RobuxAndTicketsPurchasePanel">
                            </div>
                            <div id="ctl00_cphRoblox_TicketsPurchasePanel">
                                <div id="TicketsPurchase">
                                    <div class="calloutParent">
                                        Price: 
                                        <span class="tickets" data-se="item-priceintickets">
                                            <?=$asset->tix?>
                                        </span>
                                        
                                    </div>
                                    <div id="BuyWithTickets">
                                        <div data-expected-currency="2" data-asset-type="Shirt" class="btn-primary btn-medium PurchaseButton " data-se="item-buyfortickets" data-item-name="[RHS] Smart Shirt" data-item-id="<?=$asset->id?>" data-expected-price="<?=$asset->tix?>" data-product-id="<?=$asset->id?>" data-expected-seller-id="<?=$asset->owner?>" data-bc-requirement="0" data-seller-name="Wonuf">
                                             Buy with Tx
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                                 <? } ?>
                            
                            
                            
                            
                            <div class="clear">
                            </div>
                            <div class="footnote">
	                            
                                
                                <div id="ctl00_cphRoblox_Sold">
                                    (<span data-se="item-numbersold"><?=0?></span> 
                                    Sold)
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <span>
                                <span class="FavoriteStar" data-se="item-numberfavorited">
                                    0
                                </span>
                                <span id="ctl00_cphRoblox_AddRemoveFavoriteLinkContainer">
                                    · <a id="ctl00_cphRoblox_AddRemoveFavoriteLink" title="Add to Favorites" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$AddRemoveFavoriteLink&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Favorite</a>
                                </span>
                        </span>
                        
                    </div>
                    <div class="clear"></div>
                    <div class="SocialMediaContainer">
                        
                            
                    </div>
                </div>
                
                
                <div class="clear"></div>
            </div>
            
            <div class="PrivateSales divider-top invisible" >
                <h2>Private Sales</h2>
                <div id="UserSalesTab" >
                    
                    
                            <div class="empty">
                                Sorry, no one is privately selling this item at the moment.
                            </div>
                        
                    <div class="pgItemsForResale">
                        <span id="ctl00_cphRoblox_pgItemsForResale"><a disabled="disabled">First</a>&nbsp;<a disabled="disabled">Previous</a>&nbsp;<a disabled="disabled">Next</a>&nbsp;<a disabled="disabled">Last</a>&nbsp;</span>
                    </div>
                </div>
                
                
                <div class="clear"></div>
            </div>
            <div id="Tabs">
                <ul id="TabHeader" class="WhiteSquareTabsContainer">
                      
                            <li id="RecommendationsTabHeader" contentid="RecommendationsTab" class="SquareTabGray ItemTabs selected">
                                                <span><a id="RecommendationsLink" href="#RecommendationsTab">
                                                    Recommendations</a></span></li>
                      
                      <li id="CommentaryTabHeader" contentid="CommentaryTab" class="SquareTabGray ItemTabs ">
                                                <span><a id="CommentaryLink" href="#CommentaryTab">
                                                    Commentary</a></span></li>
                </ul>
                <div class="StandardPanelContainer">
                    <div id="RecommendationsTab" class="StandardPanelWhite TabContent selected">
                        

    <div class="AssetRecommenderContainer">
    <table id="ctl00_cphRoblox_AssetRec_dlAssets" cellspacing="0" align="Center" border="0" style="height:175px;width:800px;border-collapse:collapse;">
	<tr>
		<td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-0">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl00_AssetThumbnailHyperLink" class=" notranslate" title="¬_¬" class=" notranslate" href="/unnamed-item?id=13038375" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://web.archive.org/web/20160910081545if_/https://t1.rbxcdn.com/326082be65ef7104c8e4bf8d48811888" height="110" width="110" border="0" alt="¬_¬" class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl00_AssetNameHyperLinkPortrait" href="/unnamed-item?id=13038375">&#172;_&#172;</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl00_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td><td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-1">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl01_AssetThumbnailHyperLink" class=" notranslate" title="Uh Oh" class=" notranslate" href="/Uh-Oh-item?id=7074944" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t2.rbxcdn.com/660b2bc80ced47bd2309d35908d6b743" height="110" width="110" border="0" alt="Uh Oh" class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl01_AssetNameHyperLinkPortrait" href="/Uh-Oh-item?id=7074944">Uh Oh</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl01_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td><td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-2">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl02_AssetThumbnailHyperLink" class=" notranslate" title="Awkward...." class=" notranslate" href="/Awkward-item?id=23932048" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t7.rbxcdn.com/ea66e1a193b92c317b31b7e050d7788d" height="110" width="110" border="0" alt="Awkward...." class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl02_AssetNameHyperLinkPortrait" href="/Awkward-item?id=23932048">Awkward....</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl02_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td><td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-3">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl03_AssetThumbnailHyperLink" class=" notranslate" title="Silence" class=" notranslate" href="/Silence-item?id=10860397" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t6.rbxcdn.com/7e2ce7acb952e67ed0ccc56b990a0fec" height="110" width="110" border="0" alt="Silence" class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl03_AssetNameHyperLinkPortrait" href="/Silence-item?id=10860397">Silence</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl03_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td><td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-4">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl04_AssetThumbnailHyperLink" class=" notranslate" title="Tango" class=" notranslate" href="/Tango-item?id=16101765" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t2.rbxcdn.com/30adb85f64bb829a87a8bb0cd29d9151" height="110" width="110" border="0" alt="Tango" class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl04_AssetNameHyperLinkPortrait" href="/Tango-item?id=16101765">Tango</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl04_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td>
	</tr><tr>
		<td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-5">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl05_AssetThumbnailHyperLink" class=" notranslate" title="I Hate Noobs" class=" notranslate" href="/I-Hate-Noobs-item?id=14030577" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t6.rbxcdn.com/8a7be72a515d6ee5eae495dd23495ed3" height="110" width="110" border="0" alt="I Hate Noobs" class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl05_AssetNameHyperLinkPortrait" href="/I-Hate-Noobs-item?id=14030577">I Hate Noobs</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl05_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td><td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-6">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl06_AssetThumbnailHyperLink" class=" notranslate" title="Know-It-All Grin" class=" notranslate" href="/Know-It-All-Grin-item?id=26424808" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t6.rbxcdn.com/6a2ac71eb95ecfd31805646e7a4661f4" height="110" width="110" border="0" alt="Know-It-All Grin" class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl06_AssetNameHyperLinkPortrait" href="/Know-It-All-Grin-item?id=26424808">Know-It-All Grin</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl06_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td><td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-7">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl07_AssetThumbnailHyperLink" class=" notranslate" title="Heeeeeey..." class=" notranslate" href="/Heeeeeey-item?id=21635565" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t5.rbxcdn.com/fa80912767f6eb4c931dc793dbeee223" height="110" width="110" border="0" alt="Heeeeeey..." class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl07_AssetNameHyperLinkPortrait" href="/Heeeeeey-item?id=21635565">Heeeeeey...</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl07_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td><td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-8">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl08_AssetThumbnailHyperLink" class=" notranslate" title=":3" class=" notranslate" href="/3-item?id=15432080" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t5.rbxcdn.com/f8c9fbb06fbeb1fe723ab31c2f970acc" height="110" width="110" border="0" alt=":3" class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl08_AssetNameHyperLinkPortrait" href="/3-item?id=15432080">:3</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl08_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td><td>
            <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-9">
                <div class="AssetThumbnail">
                    <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl09_AssetThumbnailHyperLink" class=" notranslate" title=":P" class=" notranslate" href="/P-item?id=14861743" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t2.rbxcdn.com/879dca5951cdd65572523d009136fce8" height="110" width="110" border="0" alt=":P" class=" notranslate" /></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName noTranslate">
                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl09_AssetNameHyperLinkPortrait" href="/P-item?id=14861743">:P</a>
                    </div>
                    <div class="AssetCreator">
                        <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl09_CreatorHyperLinkPortrait" class="notranslate" href="/users/1/profile">ROBLOX</a></span>
                    </div>
                </div>
            </div>
        </td>
	</tr>
</table>
    
</div>

<script type="text/javascript">
    $(function () {
        var itemNames = $('.PortraitDiv .AssetDetails .AssetName a');
        $.each(itemNames, function (index) {
            var elem = $(itemNames[index]);
            elem.html(fitStringToWidthSafe(elem.html(), 200));
        });
        var userNames = $('.PortraitDiv .AssetDetails .AssetCreator .Detail a');
        $.each(userNames, function (index) {
            var elem = $(userNames[index]);
            elem.html(fitStringToWidthSafe(elem.html(), 70));
        });
    });
</script>

                    </div>
                    <div id="CommentaryTab" class="StandardPanelWhite TabContent " >
                        <div id="ctl00_cphRoblox_CommentsPane_CommentsUpdatePanel">
	
        <div id="AjaxCommentsPaneData"></div>

        <div class="AjaxCommentsContainer">
            <div id="ctl00_cphRoblox_CommentsPane_Div1" class="PostACommentContainer divider-bottom">
                <div class="Commenter">
                    <div class="Avatar">
                        <a id="ctl00_cphRoblox_CommentsPane_AvatarImage" class=" notranslate" title="ConnerMurphy07" class=" notranslate" href="/User.aspx?ID=62402235" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="https://t6.rbxcdn.com/dd7d4b07fbbb207b723b0daaf817a72d" height="100" width="100" border="0" alt="ConnerMurphy07" class=" notranslate" /></a>
                    </div>
                </div>
                <div class="centered-error-container">
                    <span id="commentPaneErrorMessage" class="status-error" style="display:none;"></span>
                </div>
                <div id="ctl00_cphRoblox_CommentsPane_PostAComment" class="PostAComment">
                
                    <div class="CommentText">
                        <textarea name="ctl00$cphRoblox$CommentsPane$NewCommentTextBox" id="ctl00_cphRoblox_CommentsPane_NewCommentTextBox" class="MultilineTextBox hint-text text" rows="5" style="margin-bottom: 0px">Write a comment!</textarea>
                        
                        <div class="Buttons">
                            <div id="ctl00_cphRoblox_CommentsPane_BlueCommentBtn" class="BlueCommentBtn btn-neutral btn-small roblox-comment-button">Comment</div>
                            <p id="CharsRemaining" class="hint-text"></p>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="Comments" data-asset-id="20418658"></div>
            
            <div class="CommentsItemTemplate">
                    <div class="Comment text">
                        <div class="Commenter">
                            <div class="Avatar" data-user-id="%CommentAuthorID" data-image-size="small">
                            </div>
                        </div>
                        <div class="PostContainer">
                            <div class="Post">
                                <div class="Audit">
                                    <span class="ByLine footnote"><div class="UserOwnsAsset" title="User has this item" alt="User has this item" style="display:none;"></div>Posted %CommentCreated ago by <a href="/user.aspx?id=%CommentAuthorID">%CommentAuthor</a></span>
                                    <div class="ReportAbuse">
                                        <span class="AbuseButton">
                                            <a href="/abusereport/comment?id=%CommentID&amp;redirectUrl=%PageURL">Report Abuse</a>
                                        </span>
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                                <div class="Content">
                                    %CommentContent
                                </div>
                                <div id="Actions" class="Actions" >
                                    <a data-comment-id="%CommentID" class="DeleteCommentButton">Delete Comment</a>
                                </div>
                            </div>
                            <div class="PostBottom"></div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
        </div>

</div>

<script type="text/javascript">
    Roblox.CommentsPane.Resources = {
        //<sl:translate>
        defaultMessage:         'Write a comment!',
        noCommentsFound:		'No comments found.',
        moreComments:			'More comments',
        sorrySomethingWentWrong:'Sorry, something went wrong.',
        charactersRemaining:	' characters remaining',
        emailVerifiedABTitle:	'Verify Your Email',
        emailVerifiedABMessage: "You must verify your email before you can comment. You can verify your email on the <a href='/my/account?confirmemail=1'>Account</a> page.",
        linksNotAllowedTitle:   'Links Not Allowed',
        linksNotAllowedMessage: 'Comments should be about the item or place on which you are commenting. Links are not permitted.',
        accept:					'Verify',
        decline:				'Cancel',
        tooManyCharacters:		'Too many characters!',
        tooManyNewlines:		'Too many newlines!'
        //</sl:translate>
       };

       Roblox.CommentsPane.Limits =
       [	{ limit: '10'
            , character: "\n"
            , message: Roblox.CommentsPane.Resources.tooManyNewlines
            }
       ,	{ limit: '200'
            , character: undefined
            , message: Roblox.CommentsPane.Resources.tooManyCharacters
            }
       ];

       Roblox.CommentsPane.FilterIsEnabled = true;
       Roblox.CommentsPane.FilterRegex = "(([a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}[:\\#/\?]+)|([a-zA-Z0-9]\\.[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}))";
       Roblox.CommentsPane.FilterCleanExistingComments = false;

    Roblox.CommentsPane.initialize();
</script>

                    </div>
                </div>
            </div>
            
            <div id="FreeGames">
                </div>
        </div>
        <div class="Ads_WideSkyscraper">
            

    <iframe allowtransparency="true"
            frameborder="0"
            height="612"
            scrolling="no"
            src="/userads/2"
            width="160"
            data-js-adtype="iframead"></iframe>

        </div>
        <div class="clear">
        </div>
    </div>
    
    
    

<div id="ItemPurchaseAjaxData"
        data-authenticateduser-isnull="False"
        data-user-balance-robux="<?=$userinfo->robux?>"
        data-user-balance-tickets="<?=$userinfo->tix?>"
        data-user-bc="0"
        data-continueshopping-url="/catalog"
        data-imageurl="<?=$thumbs->get_asset_thumb($asset->id);?>" 
        data-alerturl="/images/cbb24e0c0f1fb97381a065bd1e056fcb.png"
        data-builderscluburl="/images/ae345c0d59b00329758518edc104d573.png"
        data-has-currency-service-error="False"
        data-currency-service-error-message=""></div>

    <div id="ProcessingView" style="display:none">
        <div class="ProcessingModalBody">
            <p style="margin:0px"><img src='/images/ec4e85b0c4396cf753a06fade0a8d8af.gif' alt="Processing..." /></p>
            <p style="margin:7px 0px">Processing Transaction</p>
        </div>
    </div>
    
    <script type="text/javascript">
        //<sl:translate>
        Roblox.ItemPurchase.strings = {
            insufficientFundsTitle : "Insufficient Funds",
            insufficientFundsText : "You need {0} more to purchase this item.",
            cancelText : "Cancel",
            okText : "OK",
            buyText : "Buy",
            buyTextLower : "buy",
            tradeCurrencyText : "Trade Currency",
            priceChangeTitle : "Item Price Has Changed",
            priceChangeText : "While you were shopping, the price of this item changed from {0} to {1}.",
            buyNowText : "Buy Now",
            buyAccessText: "Buy Access",
            buildersClubOnlyTitle : "{0} Only",
            buildersClubOnlyText : "You need {0} to buy this item!",
            buyItemTitle : "Buy Item",
            buyItemText : "Would you like to {0} {5}the {1} {2} from {3} for {4}?",
            balanceText : "Your balance after this transaction will be {0}",
            freeText : "Free",
            purchaseCompleteTitle : "Purchase Complete!",
            purchaseCompleteText : "You have successfully {0} {5}the {1} {2} from {3} for {4}.",
            continueShoppingText : "Continue Shopping",
            customizeCharacterText : "Customize Character",
            orText : "or",
            rentText : "rent",
            accessText: "access to "
        }
        //</sl:translate>
    </script>


    

    

    <div id="ctl00_cphRoblox_CreateSetPanelDiv" class="createSetPanelPopup">
	
        

<div>
    <div id="CreateSetPopupContainerDiv" class="SetsPagePopupContainer PurchaseModal">
        <div id="simplemodal-close" class="simplemodal-close">
            <a></a>
        </div>
        <div class="titleBar" style="text-align: center">
            Create Set
        </div>
        <div id="create-set-dialog" class="PurchaseModalBody">
            <div class="PurchaseModalMessage">
                <div id="ctl00_cphRoblox_CreateSetPanel1_CreateSetInnerDIV">
                    <div>
                        <p>
                            <span class="form-label">Name:  </span>
                            <span id="NameDisplay"></span>
                        </p>
                        <div id="ctl00_cphRoblox_CreateSetPanel1_NameDiv">
                            <input name="ctl00$cphRoblox$CreateSetPanel1$Name" type="text" maxlength="100" id="ctl00_cphRoblox_CreateSetPanel1_Name" onkeydown="enableButton();" onkeyup="ismaxlength(this); updateRegularNameDisplay(this);" style="width:410px;" />
                        </div>
                        
                        
                        
                        
                        <span id="ctl00_cphRoblox_CreateSetPanel1_CustomValidatorSetNameProfanity" style="color:Red;display:none;">This set name contains some improper words.</span>
                        <p style="margin-bottom: 0px" class="form-label">Description:</p>
                        <div style="position: relative">
                            <textarea name="ctl00$cphRoblox$CreateSetPanel1$Description" rows="2" cols="20" id="ctl00_cphRoblox_CreateSetPanel1_Description" onkeyup="return ismaxlength(this);" style="width: 410px;height: 100px;">
</textarea>
                        </div>
                        <p style="width: 40px; margin-bottom: 0px" class="form-label">Image:</p>
                        <input type="file" name="ctl00$cphRoblox$CreateSetPanel1$Uploader" id="ctl00_cphRoblox_CreateSetPanel1_Uploader" onchange="fileUploadIsReady = true; enableButton();" style="width:350px;" />
                        <div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="PurchaseModalButtonContainer">
                <a onclick="return enableButton();" id="ctl00_cphRoblox_CreateSetPanel1_CreateSet" class="btn-medium btn-neutral translate" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$CreateSetPanel1$CreateSet&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Create Set</a>
            </div>
            <div class="PurchaseModalFooter footnote"></div>
        </div>

        <script type="text/javascript" language="javascript">
            var userName = 'ConnerMurphy07';
            var maxAdjectives = '2';
            var maxCategories = '2';
            var superSafeAdjectiveListClientId = 'ctl00_cphRoblox_CreateSetPanel1_SuperSafeAdjectiveChoices';
            var superSafeCategoryListClientId = 'ctl00_cphRoblox_CreateSetPanel1_SuperSafeCategoryChoices';
            var superSafeNameListClientId = 'ctl00_cphRoblox_CreateSetPanel1_SuperSafeNameChoice';
            var fileUploadIsReady = false;
            var nameClientID = 'ctl00_cphRoblox_CreateSetPanel1_Name';
            var createSetClientID = 'ctl00_cphRoblox_CreateSetPanel1_CreateSet';
            var errorOnPage = false;
            var prevSelected = [];
            
            if (typeof Roblox === "undefined") {
                Roblox = {};
            }
            if (typeof Roblox.CreateSetPanel === "undefined") {
                Roblox.CreateSetPanel = {};
            }
            Roblox.CreateSetPanel.Resources = {
                //<sl:translate>
                youMaySelect: "You may select a maximum of ",
                elementsInList: " elements from this list!"
                //</sl:translate>
            };
            if(typeof Roblox.FileUploadUnsupported === "undefined"){
                Roblox.FileUploadUnsupported = {};
            }
            Roblox.FileUploadUnsupported.Resources = {
                //<sl:translate>
                notSupported: " This device does not support file upload."
                //</sl:translate>
            };
            $(function () {
                if (errorOnPage == "True") {
                     $('#CreateSetPopupContainerDiv').modal({ appendTo: 'form', escClose: true, opacity: 80, overlayCss: { backgroundColor: '#000' }, position: [120, 0] });
                }
            });
        </script>
    </div>
</div>
    
</div>
    
     

<div class="GenericModal modalPopup unifiedModal smallModal" style="display:none;">
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div>
            <div class="ImageContainer roblox-item-image"  data-image-size="small" data-no-overlays data-no-click>
                <img class="GenericModalImage" alt="generic image" />
            </div>
            <div class="Message"></div>  
            <div style="clear:both"></div>
        </div>
        <div class="GenericModalButtonContainer">
            <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a> 
        </div>  
    </div>
</div>

    

<div id="BCOnlyModal" class="modalPopup unifiedModal smallModal" style="display:none;">
 	<div style="margin:4px 0px;">
        <span>Builders Club Only</span>
    </div>
    <div class="simplemodal-close">
        <a class="ImageButton closeBtnCircle_20h" style="margin-left:400px;"></a>
    </div>
    <div class="unifiedModalContent" style="padding-top:5px; margin-bottom: 3px; margin-left: 3px; margin-right: 3px">
        <div class="ImageContainer" >
            <img class="GenericModalImage BCModalImage" alt="Builder's Club" src="https://images.rbxcdn.com/ae345c0d59b00329758518edc104d573.png" />
            <div id="BCMessageDiv" class="BCMessage Message">
                You need  to buy this item!
            </div>
        </div>
        <div style="clear:both;"></div>
        <div style="clear:both;"></div>
        <div class="GenericModalButtonContainer" style="padding-bottom: 13px">
            <div style="text-align:center">
                <a id="BClink" href="/premium/membership?ctx=bc-only-item" class="btn-primary btn-large">Upgrade Now</a>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>

<script type="text/javascript">
    function showBCOnlyModal(modalId) {
        var modalProperties = { overlayClose: true, escClose: true, opacity: 80, overlayCss: { backgroundColor: "#000" } };
        if (typeof modalId === "undefined")
            $("#BCOnlyModal").modal(modalProperties);
        else
            $("#" + modalId).modal(modalProperties);
    }
    $(document).ready(function () {
        $('#NULL').click(function () {
            showBCOnlyModal("BCOnlyModal");
            return false;
        });
    });
</script>
 

<div class="GenericModal modalPopup unifiedModal smallModal" style="display:none;">
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div>
            <div class="ImageContainer roblox-item-image"  data-image-size="small" data-no-overlays data-no-click>
                <img class="GenericModalImage" alt="generic image" />
            </div>
            <div class="Message"></div>  
            <div style="clear:both"></div>
        </div>
        <div class="GenericModalButtonContainer">
            <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a> 
        </div>  
    </div>
</div>


    <div id="InstallingPluginView" class="processing-view" style="display:none">
        <div class="ProcessingModalBody">
            <p style="margin:0px"><img src='https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif' alt="Installing Plugin..." /></p>
            <p class="processing-text" style="margin:7px 0px">Installing Plugin...</p>
        </div>
    </div>
    <div id="UpdatingPluginView" class="processing-view" style="display:none">
        <div class="ProcessingModalBody">
            <p style="margin:0px"><img src='https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif' alt="Updating Plugin..." /></p>
            <p class="processing-text" style="margin:7px 0px">Updating Plugin...</p>
        </div>
    </div>
    
    <script type="text/javascript">
    Roblox.Item = Roblox.Item || {};

    Roblox.Item.Resources = {
        //<sl:translate>
        DisableBadgeTitle: 'Disable Badge'
        , DisableBadgeMessage: 'Are you sure you want to disable this Badge?'
        , assetGrantedModalTitle: "This item is now yours"
        , assetGrantedModalMessage: "You just got this item courtesy of our sponsor."
        //</sl:translate>
    };
</script><script type="text/javascript">
    Roblox.Plugins = Roblox.Plugins || {};

    Roblox.Plugins.Resources = {
        //<sl:translate>
        errorTitle: "Error Installing Plugin",
        errorBody: "There was a problem installing this plugin. Please try again later.",
        successTitle: "Plugin Installed",
        successBody: " has been successfully installed! Please open a new window to begin using this plugin.",
        ok: "OK",
        reinstall: "Reinstall",
        updateErrorTitle: "Error Updating Plugin",
        updateErrorBody: "There was a problem updating this plugin. Please try again later.",
        updateSuccessTitle: "Plugin Update",
        updateSuccessBody: " has been successfully updated! Please open a new window for the changes to take effect.",
        updateText: "Update",
        //</sl:translate>
        alertImageUrl: '/images/Icons/img-alert.png'
    };
</script>

    <script type="text/javascript">
        Roblox.Item = Roblox.Item || {};
        
        Roblox.Item.ShowAssetGrantedModal = false;
        Roblox.Item.ForwardToUrl = "";
        

        $(function() {
            var commentsLoaded = false;

            //Tabs
            function SwitchTabs(nextTabElem) {
                $('.WhiteSquareTabsContainer .selected,  .TabContent.selected').removeClass('selected');
                nextTabElem.addClass('selected');
                $('#' + nextTabElem.attr('contentid')).addClass('selected');

                var label = $.trim(nextTabElem.attr('contentid'));
                if(label == "CommentaryTab" && !commentsLoaded) {
                    Roblox.CommentsPane.getComments(0);
                    commentsLoaded = true;
                    if(Roblox.SuperSafePrivacyMode != undefined) {
                        Roblox.SuperSafePrivacyMode.initModals();
                    }
                    return false;
                }
            }
            
            $('.WhiteSquareTabsContainer li').bind('click', function (event) {
                event.preventDefault();
                SwitchTabs($(this));
            });
        
            
            function confirmDelete() {
                Roblox.GenericConfirmation.open({
                    //<sl:translate>
                    titleText: "Delete Item",
                    bodyContent: "Are you sure you want to permanently DELETE this item from your inventory?",
                    //</sl:translate>
                    onAccept: function () {
                        javascript: __doPostBack('ctl00$cphRoblox$btnDelete', '');
                    },
                    acceptColor: Roblox.GenericConfirmation.blue,
                    //<sl:translate>
                    acceptText: "OK"
                    //</sl:translate>
                });
            }

            function confirmSubmit() {
                Roblox.GenericConfirmation.open({
                    //<sl:translate>
                    titleText: "Create New Badge Giver",
                    bodyContent: "This will add a new badge giver model to your inventory. Are you sure you want to do this?",
                    //</sl:translate>
                    onAccept: function () {
                        window.location.href = $('#ctl00_cphRoblox_btnSubmit').attr('href');
                    },
                    acceptColor: Roblox.GenericConfirmation.blue,
                    //<sl:translate>
                    acceptText: "OK"
                    //</sl:translate>
                });
            }

            $('#ctl00_cphRoblox_btnDelete').click(function() {
                confirmDelete();
                return false;
            });

            $('div.Ownership input').click(function() {
                confirmSubmit();
                return false;
            });

            modalProperties = { escClose: true, opacity: 80, overlayCss: { backgroundColor: "#000"} };
        
            // Code for Modal Popups and Plugin initialization
            
            $(".btn-disabled-primary").removeClass("Button").tipsy({ gravity: 's' }).attr("href", "javascript: return false;");
        });
        function ModalClose(popup) {
            $.modal.close('.' + popup);
        }
    </script>

                    <div style="clear:both"></div>
                </div>
            </div>
        </div> 
        </div>
        
        <? $pagebuilder->build_footer(); ?>
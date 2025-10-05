<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\thumbnails;
use Carbon\Carbon;
global $currentuser;
$thumbs = new thumbnails();
$auth = new authentication();
$pagebuilder = new pagebuilder();

global $db;

if($currentuser !== null){
    $doesown = $db->table("ownedassets")->where("assetid", $asset->id)->where("userid", $currentuser->id)->first();
} else {
    $doesown = null;
}

$boughtamount = $db->table("ownedassets")->where("assetid", $asset->id)->count();

$assetidbackup = $asset->id;

$query = $db->table("assets")->where("publicdomain", 1)->where("featured", 1)->whereIn("prodcategory", [2, 8, 11, 12, 17, 18, 19, 32])->limit(10)->orderBy($db->Raw("RAND()"));
$randomitems = $query->get();

$recommendationQuery = $db->table("assets")->where("publicdomain", 1)->where("featured", 1)->where("id", "!=", $asset->id);

$sameCategoryItems = (clone $recommendationQuery)->where("prodcategory", $asset->prodcategory)->orderBy($db->Raw("RAND()"))->limit(10)->get();

$recommendations = [];
// TODO: recommend also stuff the user has mostly bought and is related with it.
if(count($sameCategoryItems) >= 10){
    $recommendations = $sameCategoryItems;
} else {
    $recommendations = $sameCategoryItems;
    $needed = 10 - count($recommendations);
    
    $titleWords = array_filter(explode(' ', strtolower($asset->name)), function($word){
        return strlen($word) > 3 && !in_array($word, ['roblox', 'free', 'item', 'the', 'and', 'for']);
    });
    
    if(count($titleWords) > 0 && $needed > 0){
        $titleQuery = (clone $recommendationQuery)->whereNotIn("id", array_column($recommendations, 'id'));
        
        foreach($titleWords as $word){
            $titleQuery->orWhere("name", "LIKE", "%{$word}%");
        }
        
        $titleMatches = $titleQuery->orderBy($db->Raw("RAND()"))->limit($needed)->get();
        
        $recommendations = array_merge($recommendations, $titleMatches);
        $needed = 10 - count($recommendations);
    }
    
    if($needed > 0){
        $creatorItems = (clone $recommendationQuery)->where("owner", $asset->owner)->whereNotIn("id", array_column($recommendations, 'id'))->orderBy($db->Raw("RAND()"))->limit($needed)->get();
        
        $recommendations = array_merge($recommendations, $creatorItems);
        $needed = 10 - count($recommendations);
    }
    
    if($needed > 0){
        $relatedCategories = [2, 8, 11, 12, 17, 18, 19, 32];
        
        $fillerItems = (clone $recommendationQuery)->whereIn("prodcategory", $relatedCategories)->whereNotIn("id", array_column($recommendations, 'id'))->orderBy($db->Raw("RAND()"))->limit($needed)->get();
        
        $recommendations = array_merge($recommendations, $fillerItems);
    }
}

// REAL experience
$recommendations = array_slice($recommendations, 0, 10);

$randomitems1 = array_slice($recommendations, 0, 5);
$randomitems2 = array_slice($recommendations, 5);

$highlighteddesc = $asset->description;
$highlighteddesc = preg_replace('#\bhttps?://[^\s<]+#i','<a href="$0" target="_blank" rel="noopener">$0</a>',$highlighteddesc);


if($auth->hasaccount()){

    $userinfo = $currentuser;
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

if($asset->prodcategory == 1)
{
    $thumb = "//cdn.watrbx.wtf/" . $asset->fileid;
} else {
    $thumb = $thumbs->get_asset_thumb($asset->id);
}

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___21c026f129b626345b81a3a4d6882c7d_m.css');
$pagebuilder->addresource('jsfiles', '/js/4eedc3a9c944bd9a29f80c2e9668dfdb.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/8220b4ecd0fe4da790391da3fd0b442c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/59e30cf6dc89b69db06bd17fbf8ca97c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/43936b3386e6514e97f2b3ae23f53404.js.gzip');
$pagebuilder->addresource('jsfiles', '/ScriptResource.axd');
$pagebuilder->set_page_name($asset->name);
$pagebuilder->addmetatag("og:image", $thumb);
$pagebuilder->addmetatag("og:title", $asset->name);
$pagebuilder->addmetatag("og:description", $asset->description);
$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();




$creatorinfo = $auth->getuserbyid($asset->owner);

$overlay = $auth->get_bc_overlay($creatorinfo->id);

$ownerthumb = $thumbs->get_user_thumb($asset->owner, "250x250");
if($currentuser !== null){
    $currentthumb = $thumbs->get_user_thumb($currentuser->id, "250x250");
} else {
    $currentthumb = "";
}

?>
        <div id="BodyWrapper">
            
            <div id="RepositionBody">
                <div id="Body" style='width:970px;'>
                
    <div id="ItemContainer" class="text ">
        <div>
            <div id="ctl00_cphRoblox_GearDropDown" class="SetList ItemOptions" data-isdropdownhidden="False" data-isitemlimited="True" data-isitemresellable="True">
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
                                <div id="AssetThumbnail" class="thumbnail-holder"  <? if($asset->prodcategory == 8) { echo "data-3d-thumbs-enabled"; } ?> data-url="/thumbnail/asset?assetId=<?=$asset->id?>&amp;thumbnailFormatId=254&amp;width=320&amp;height=320" style="width:320px; height:320px;">
                                    <span class="thumbnail-span" data-3d-url="/asset-thumbnail-3d/json?assetId=<?=$asset->id?>"  data-js-files='https://js.rbxcdn.com/2cdabe2b5b7eb87399a8e9f18dd7ea05.js' ><img  class='' src='<?=$thumb?>' /></span>
                                    <span class="enable-three-dee btn-control btn-control-small"></span>
                                </div>
                            </div>
                            <span id="ThumbnailText"></span>
                        </div>
                    
                <div id="Summary">
                    <div class="SummaryDetails">
                        <div id="Creator" class="Creator">
                            <div class="Avatar">
                                
                                <a id="ctl00_cphRoblox_AvatarImage" class=" notranslate" class=" notranslate" title="<?=$creatorinfo->username?>" href="/users/<?=$creatorinfo->id?>/profile" style="display:inline-block;height:70px;width:70px;cursor:pointer;"><img src="<?=$ownerthumb?>" height="70" width="70" border="0" alt="<?=$creatorinfo->username?>" class=" notranslate" />
                                    <? if($overlay !== null){
                                        echo '<img src="'.$overlay.'" class="bcOverlay" align="left" style="position:relative;top:-19px;" />';
                                    } ?>
                                </a>
                            </div>
                        </div>
                        <div class="item-detail">
                            <span class="stat-label notranslate">Creator:</span>
                            <a id="ctl00_cphRoblox_CreatorHyperLink" class="stat notranslate" href="/users/<?=$creatorinfo->id?>/profile"><?=$creatorinfo->username?></a>
                            
                            <div>
                                <span class="stat-label">Created:</span>
                                <span class="stat">
                                    <?=Carbon::createFromTimestamp($asset->created)->diffForHumans();?>
                                </span>
                            </div>
                            <div id="LastUpdate">
                                <span class="stat-label">Updated:</span>
                                <span class="stat">
                                    <?=Carbon::createFromTimestamp($asset->updated)->diffForHumans();?>
                                </span>
                                </div>
                                
                                 
                        </div>
                        <div id="ctl00_cphRoblox_DescriptionPanel" class="DescriptionPanel notranslate">
	
                            <pre class="Description Full text"> <?=$highlighteddesc?> </pre>
                            <pre class="Description body text"><span class="description-content"><?=$highlighteddesc?></span><span class="description-more-container"></span></pre>
                        
</div>
                        <div class="ReportAbuse">
                            <div id="ctl00_cphRoblox_AbuseReportButton1_AbuseReportPanel" class="ReportAbuse">
	
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseIconHyperLink" href="/abusereport/asset?id=<?=$assetidbackup?>&amp;RedirectUrl=http%3a%2f%2fwww.roblox.com%2fitem.aspx%3fseoname%3dErr%26id%3d<?=$assetidbackup?>"><img src="images/abuse.PNG?v=2" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseTextHyperLink" href="/abusereport/asset?id=<?=$assetidbackup?>&amp;RedirectUrl=http%3a%2f%2fwww.roblox.com%2fitem.aspx%3fseoname%3dErr%26id%3d<?=$assetidbackup?>">Report Abuse</a></span>

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
                                        <?php
                                            if($asset->robux == 0){
                                                echo "FREE";
                                            } else {
                                                echo $asset->robux;
                                            }
                                             ?>
                                        </span>
                                        
                                    </div>
                                    <div id="BuyWithRobux">
                                        <div data-expected-currency="1" data-asset-type="<?=array_search($asset->prodcategory, $assetTypes)?>" class="btn-primary btn-medium PurchaseButton <? if($doesown !== null || $asset->publicdomain == 0){ echo 'btn-disabled-primary'; } ?>" <? if($asset->publicdomain == 0){ echo 'original-title="This item is not for sale."'; } ?> <? if($doesown !== null){ echo 'original-title="You already own this item."'; } ?> data-se="item-buyforrobux" data-item-name="<?=$asset->name?>" data-item-id="<?=$assetidbackup?>" data-expected-price="<?=$asset->robux?>" data-product-id="<?=$assetidbackup?>" data-expected-seller-id="<?=$asset->owner?>" data-bc-requirement="0" data-seller-name="<?=$creatorinfo->username?>">
                                             <?php
                                                if($asset->robux == 0){
                                                    echo "Buy for FREE";
                                                } else {
                                                    echo "Buy with R$";
                                                }
                                             ?>
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
                                        <div data-expected-currency="2" data-asset-type="<?=array_search($asset->prodcategory, $assetTypes)?>" class="btn-primary btn-medium PurchaseButton <? if($doesown !== null || $asset->publicdomain == 0){ echo 'btn-disabled-primary'; } ?>" <? if($asset->publicdomain == 0){ echo 'original-title="This item is not for sale."'; } ?> <? if($doesown !== null){ echo 'original-title="You already own this item."'; } ?> data-se="item-buyfortix" data-item-name="<?=$asset->name?>" data-item-id="<?=$assetidbackup?>" data-expected-price="<?=$asset->tix?>" data-product-id="<?=$assetidbackup?>" data-expected-seller-id="<?=$asset->owner?>" data-bc-requirement="0" data-seller-name="<?=$creatorinfo->username?>">
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
                                    (<span data-se="item-numbersold"><?=$boughtamount?></span> 
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

		<? foreach ($randomitems1 as $asset) {
            echo $pagebuilder->build_component("asset_recommend", ["asset" => $asset]);
        } ?>
	</tr><tr>
		<? foreach ($randomitems2 as $asset) {
            echo $pagebuilder->build_component("asset_recommend", ["asset" => $asset]);
        } ?>
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
            <?php 
                if($currentuser !== null){ ?>
                <div id="ctl00_cphRoblox_CommentsPane_Div1" class="PostACommentContainer divider-bottom">
                <div class="Commenter">
                    <div class="Avatar">
                        <a id="ctl00_cphRoblox_CommentsPane_AvatarImage" class=" notranslate" title="<?=$currentuser->username?>" class=" notranslate" href="/users/<?=$currentuser->id?>/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="<?=$currentthumb?>" height="100" width="100" border="0" alt="<?=$currentuser->username?>" class=" notranslate" /></a>
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
                <? } ?>
            <div class="Comments" data-asset-id="<?=$assetidbackup?>"></div>
            
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
    
    
    

<?php
    if($currentuser !== null){ ?>

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
        
    <? } else {?>

        <div id="ItemPurchaseAjaxData"
        data-authenticateduser-isnull="True"
        data-continueshopping-url="/catalog"
        data-imageurl="<?=$thumbs->get_asset_thumb($asset->id);?>" 
        data-alerturl="/images/cbb24e0c0f1fb97381a065bd1e056fcb.png"
        data-builderscluburl="/images/ae345c0d59b00329758518edc104d573.png"
        data-has-currency-service-error="False"
        data-currency-service-error-message=""></div>

        <? } ?>
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
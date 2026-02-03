<?php 
use watrlabs\watrkit\pagebuilder;
use watrbx\forums;
$pagebuilder = new pagebuilder();

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___52c69b42777a376ab8c76204ed8e75e2_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___c7d63abcc3de510b8a7b8ab6d435f9b6_m.css');
$pagebuilder->addresource('cssfiles', '/Forum/skins/default/style/default.css');
$pagebuilder->addresource('jsfiles', '/js/92d454a11b2b7266829922801d327151.js');
$pagebuilder->addresource('jsfiles', '/js/16994b0cbe9c1d943e0de0fade860343.js');
$pagebuilder->set_page_name("Forum");
$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();

$forums = new forums();

$headers = $forums->getHeaders();

?>      
        <noscript><div class="SystemAlert"><div class="SystemAlertText">Please enable Javascript to use all the features on this site.</div></div></noscript>
        

        
        
        
        <div id="BodyWrapper">
            
            <div id="RepositionBody">
                <div id="Body" style='width:970px;'>
                    

	<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			
            <!-- left column -->
			<td class="LeftColumn">&nbsp;&nbsp;&nbsp;</td>
			
            <!-- center column -->
			<td id="ctl00_cphRoblox_CenterColumn" width="95%" class="CenterColumn">
				<br>
            	<span id="ctl00_cphRoblox_NavigationMenu2">

<div id="forum-nav" style="text-align: right">
	<a id="ctl00_cphRoblox_NavigationMenu2_ctl00_HomeMenu" class="menuTextLink first" href="/Forum/Default.aspx">Home</a>
	<a id="ctl00_cphRoblox_NavigationMenu2_ctl00_SearchMenu" class="menuTextLink" href="/Forum/Search/default.aspx">Search</a>
	
	
	
	
	
	
	
</div>
</span>
				<br>
				<table Cellpadding="0" Cellspacing="2" width="100%">
					<Tr>
						<td align="left">
							<span class="normalTextSmallBold">Current time: </span><span class="normalTextSmall"><?=date("M j, g:i A");?>
</span>
						</td>
						<td align="right">
						    <span id="ctl00_cphRoblox_SearchRedirect">

<span>
    <span class="normalTextSmallBold">Search Roblox Forums:</span>
    <input name="ctl00$cphRoblox$SearchRedirect$ctl00$SearchText" type="text" maxlength="50" id="ctl00_cphRoblox_SearchRedirect_ctl00_SearchText" class="notranslate" size="20" />
    <input type="submit" name="ctl00$cphRoblox$SearchRedirect$ctl00$SearchButton" value="Go" id="ctl00_cphRoblox_SearchRedirect_ctl00_SearchButton" class="translate btn-control btn-control-medium forum-btn-control-medium" />
</span></span>
							
						</td>
					</Tr>
				</table>
                <div style="height:7px;"></div>
				<table cellpadding="2" cellspacing="1" border="0" width="100%" class="table">
					<?php foreach($headers as $header){
						$pagebuilder->build_component("forum/header", ["title"=>$header->name, "id"=>$header->id, "priority"=>$header->priority]);
						$categories = $forums->getCategories($header->id);

						foreach($categories as $category){
							$threadcount = $forums->getPostCount($category->id);
							$replycount = $forums->getCategoryReplyCount($category->id);
							[$lastposter, $date] = $forums->getLastCategoryPoster($category->id);
							$pagebuilder->build_component("forum/category", ["category"=>$category, "threadcount"=>$threadcount, "postcount"=>$replycount, "lastposter"=>$lastposter, "lastposterdate"=>$date]);
						}

					}	?>
				</table>
				<P></P>
			</td>

			<td class="CenterColumn">&nbsp;&nbsp;&nbsp;</td>
			
            <!-- right column -->
			<td id="ctl00_cphRoblox_RightColumn" nowrap="nowrap" width="160" class="RightColumn" style="padding-top:88px;">
			    

    <iframe allowtransparency="true"
            frameborder="0"
            height="612"
            scrolling="no"
            src="/userads/2"
            width="160"
            data-js-adtype="iframead"></iframe>

			</td>

            <td class="RightColumn">&nbsp;&nbsp;&nbsp;</td>
		</tr>
	</table>


                    <div style="clear:both"></div>
                </div>
            </div>
        </div> 
        </div>
        
        <? $pagebuilder->build_footer(); ?>
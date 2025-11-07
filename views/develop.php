<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\thumbnails;
use Cocur\Slugify\Slugify;
$slugify = new slugify();
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder();
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___52c69b42777a376ab8c76204ed8e75e2_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___cda0cc7c6f454f40a6342985b7a289e6_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___693f28640f335d1c8bc50c5a11d7ad3d_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Pages/Build/BuildPage.css');
$pagebuilder->addresource('cssfiles', '/CSS/Pages/Build/Develop.css');
$pagebuilder->addresource('cssfiles', '/CSS/Pages/Build/DropDownMenus.css');
$pagebuilder->addresource('cssfiles', '/CSS/Pages/Build/Navigation.css');
$pagebuilder->addresource('cssfiles', '/CSS/Pages/Build/StudioWidget.css');
$pagebuilder->addresource('cssfiles', '/CSS/Pages/Build/Upload.css');
$pagebuilder->addresource('jsfiles', '/js/c5827143734572fa7bd8fcc79c3c126b.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/22f5b93b0e23b69d9c48f68ea3c65fe3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6385cae49dc708a8f2f93167ad17466d.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/2580e8485e871856bb8abe4d0d297bd2.js.gzip');
$pagebuilder->set_page_name("Develop");

$allowedcategories = [
  "Places"=>9,
  "Games"=>"universes",
  "Models"=>10,
  "Decals"=>13,
  "Badges"=>21,
  "Game Passes"=>34,
  "Audio"=>3,
  "Animations"=>24,
  "Meshes"=>40,
  "Ads"=>"ads",
  "Sponsored Games"=>"sponsored-games",
  "Shirts"=>11,
  "T-Shirts"=>2,
  "Pants"=>12,
  "Plugins"=>38,
  "Sets"=>"sets"
];

global $currentpage;

$currentpage = 9;

if(isset($_GET["View"])){
  $view = $_GET["View"];

  if(in_array($view, $allowedcategories)){
    $currentpage = $view;
  }
}


function is_tab_selected($tab) {

  global $currentpage;

  if($tab == $currentpage){
    echo "tab-item-selected";
  }

}



$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();

?>

<div id="AdvertisingLeaderboard">
                

<iframe allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>


            </div>

<div id="BodyWrapper">
  <div id="RepositionBody">
    <div id="Body" class="body-width">
      <div id="TosAgreementInfo" data-terms-check-needed="True"></div>
      <input name="__RequestVerificationToken" type="hidden" value="rQ57VVwNzAj59r0z2KBgvenSrbofWLuPjPrTbigBEII0IQa8IpoWZMf_syHK6asrZotO2sz6fecSVT24pxgcWOUXbSM1">
      <div id="DevelopTabs" class="tab-container">
        <div id="MyCreationsTabLink" class="tab-active" data-url="/develop">My Creations</div>
        <div id="GroupCreationsTabLink" data-url="/develop/groups" data-default-get-url="/build/buildview" style="display:none">Group Creations</div>
        <div id="LibraryTabLink" data-url="/develop/library" data-library-get-url="/catalog/contents?CatalogContext=DevelopOnly&amp;Category=Models">Library</div>
        <div id="DevExTabLink" data-url="/develop/developer-exchange">Developer Exchange</div>
      </div>
      <div>
        <div id="MyCreationsTab" class="tab-active">
          <div class="BuildPageContent" data-groupid="">
            <input id="assetTypeId" name="assetTypeId" type="hidden" value="9">
            <input data-val="true" data-val-required="The IsTgaUploadEnabled field is required." id="isTgaUploadEnabled" name="isTgaUploadEnabled" type="hidden" value="True">
            <table id="build-page" data-asset-type-id="9" data-showcases-enabled="true" data-edit-opens-studio="True">
              <tbody>
                <tr>
                  <td class="menu-area divider-right">
                    <a href="/develop?View=9" class="tab-item <?=is_tab_selected(9)?>">Places</a>
                    <a href="/develop?View=universes" class="tab-item <?=is_tab_selected("universes")?>">Games</a>
                    <a href="/develop?View=10" class="tab-item <?=is_tab_selected(10)?>">Models</a>
                    <a href="/develop?View=13" class="tab-item <?=is_tab_selected(13)?>">Decals</a>
                    <a href="/develop?View=21" class="tab-item <?=is_tab_selected(21)?>">Badges</a>
                    <a href="/develop?View=34" class="tab-item <?=is_tab_selected(34)?>">Game Passes</a>
                    <a href="/develop?View=3" class="tab-item <?=is_tab_selected(3)?>">Audio</a>
                    <a href="/develop?View=24" class="tab-item <?=is_tab_selected(24)?>">Animations</a>
                    <a href="/develop?View=40" class="tab-item <?=is_tab_selected(40)?>">Meshes</a>
                    <a href="/develop?View=ads" class="tab-item <?=is_tab_selected("ads")?>">User Ads</a>
                    <a href="/develop?View=sponsored-games" class="tab-item <?=is_tab_selected("sponsored-games")?>">Sponsored Games</a>
                    <a href="/develop?View=11" class="tab-item <?=is_tab_selected(11)?>">Shirts</a>
                    <a href="/develop?View=2" class="tab-item <?=is_tab_selected(2)?>">T-Shirts</a>
                    <a href="/develop?View=12" class="tab-item <?=is_tab_selected(12)?>">Pants</a>
                    <a href="/develop?View=38" class="tab-item <?=is_tab_selected(38)?>">Plugins</a>
                    <a href="/My/Sets.aspx" class="tab-item">Sets</a>
                    <div id="StudioWidget">
											<div class="widget-name">
												<h3>ROBLOX Studio</h3>
											</div>
											<div class="content">
												<div id="LeftColumn">
													<div class="studio-icon"><img src="/images/RobloxStudio.png"></div>
												</div>
												<div id="RightColumn">
													<ul>
														<li><a href="//setup.watrbx.wtf/RobloxStudioLauncherBeta.exe" class="studio-launch" download="//setup.watrbx.wtf/RobloxStudioLauncherBeta.exe">Download</a></li>
														<li><a href="#">Forum</a></li>
														<li><a href="#">Wiki</a></li>
													</ul>
												</div>
											</div>
										</div>
                  </td>
                  <td class="content-area">
                    <a href="/places/create" id="CreatePlace" class="create-new-button btn-medium btn-primary">Create New Place</a>
                    <table class="section-header">
                      <tbody>
                        <tr>
                          <td class="content-title">
                            <div>
                              <h2 class="header-text">Places</h2>
                            </div>
                          </td>
                          <td>
                            <div class="creation-context-filters-and-sorts" data-fetchplaceurl="/build/gamesbycontext?groupId=">
                              <div class="option">
                                <label class="sort-label">Created by:</label>
                                <select class="place-creationcontext-drop-down" size="1">
                                  <option value="NonGameCreation"> Me </option>
                                  <option value="GameAuthorsCreation">My Games</option>
                                  <option value="NonGameAuthorsCreation">Other Games</option>
                                </select>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="creation-context-breadcrumb" style="display:none">
                          <td style="height:21px">
                            <div class="breadCrumb creation-context-breadcrumb">
                              <a href="#breadcrumbs=gamecontext" class="breadCrumbContext">Context</a>
                              <span class="context-game-separator" style="display:none"> » </span>
                              <a href="#breadcrumbs=game" class="breadCrumbGame notranslate" style="display:none">Game</a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="items-container games-container">
                      <script>
                        function editGameInStudio(play_placeId) {
                          RobloxLaunch._GoogleAnalyticsCallback = function() {
                            var isInsideRobloxIDE = 'website';
                            if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                              isInsideRobloxIDE = 'Studio';
                            };
                            GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
                            GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Edit']);
                            EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin');
                            if (typeof Roblox.GamePlayEvents != 'undefined') {
                              Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
                            }
                          };
                          Roblox.Client.WaitForRoblox(function() {
                            if (Roblox.VideoPreRollDFP) {
                              Roblox.VideoPreRollDFP.showVideoPreRoll = false;
                            }
                            RobloxLaunch.StartGame('/Game/edit.ashx?PlaceID=' + play_placeId + '&upload=' + play_placeId, 'edit.ashx', '/Login/Negotiate.ashx', 'FETCH', true);
                          });
                        }
                      </script>
                      <span id="verifiedEmail" style="display:none"></span>
                      <span id="assetLinks" style="display:none" data-asset-links-enabled="True"></span>
                      <?php
                        global $db;
                        global $currentuser;

                        $thumbs = new thumbnails();

                        $allgames = $db->table("assets")->where("owner", $currentuser->id)->where("prodcategory", 9)->get();

                        foreach ($allgames as $game){ 
                          $thumbnail = $thumbs->get_asset_thumb($game->id, "200x200");
                          $universeinfo = $db->table("universes")->where("assetid", $game->id)->first();
                          $universeid = $universeinfo ? $universeinfo->id : 0; // pls dont fail
                          $placeid = $game ? $game->id : 0; // pls dont fail

                          $totalvisits = $db->table("visits")->where("universeid", $game->id)->count();
                          // pls watrabi, store multiple visits rows so i can track 7 days and much more features
                          
                        ?>

                        <table class="item-table" data-item-id="<?=$placeid?>" data-type="game" data-universeid="<?=$universeid?>">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/<?=$universeid?>/<?=$slugify->slugify($game->name)?>" class="game-image">
                                <img src="<?=$thumbnail?>" alt="<?=htmlspecialchars($game->name)?>" width="70" height="70">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/<?=$universeid?>/<?=$slugify->slugify($game->name)?>"><?=htmlspecialchars($game->name)?></a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="activate-cell">
                                      <a class="place-active" href="/universes/configure?id=<?=$game->id ?>">
                                          Active
                                      </a>
                                    </td>
                                    <td class="item-date">
                                      <span>Updated:</span><?=date("n/j/Y", $game->updated)?>
                                    </td>
                                    
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span><?=$totalvisits?></span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
<div class="separator"></div>
                        <? } ?>
                      
                      
                      
                    </div>
                    <div class="build-loading-container" style="display:none">
                      <div class="buildpage-loading-container">
                        <img alt="^_^" src="https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div id="build-dropdown-menu">
              <a href="#" data-href-template="/places/0/update">Configure Place</a>
              <a href="#" data-gameonly-link="true" data-href-template="/places/0/stats">Developer Stats</a>
              <a class="shutdown-all-servers-button" href="#">Shut Down All Servers</a>
            </div>
            <div class="PlaceSelectorModal modalPopup unifiedModal" style="display:none">
              <div class="Title">Select Place</div>
              <div class="GenericModalBody text">
                <div class="place-selector-modal" data-place-loader-url="/universes/get-places-by-context?creationContext=NonGameCreation&amp;universeId=0&amp;groupId=">
                  <div class="place-selector-container">
                    <div id="PlaceSelectorItemContainer" class="place-selector-item-container"></div>
                    <div id="PlaceSelectorPagerContainer" class="place-selector-pager-container"></div>
                  </div>
                  <div class="place-selector template" title="Place" style="display:none">
                    <div class="place-image" data-retry-url-template="/asset-thumbnail/json?height=100&amp;width=160&amp;format=jpeg&amp;returnAutoGenerated=True">
                      <img alt="^_^" class="item-image" src="https://images.rbxcdn.com/ec5c01d220bf1b73403fa51519267742.gif">
                    </div>
                    <div class="InfoContainer">
                      <div class="place-name"></div>
                      <div class="game-name">
                        <span class="form-label">Game: </span>
                        <span class="game-name-text"></span>
                      </div>
                    </div>
                    <div style="clear:both"></div>
                  </div>
                </div>
              </div>
            </div>
            <script>
              $(function() {
                Roblox.PlaceSelector.Init();
                Roblox.PlaceSelector.Resources = {
                  anErrorOccurred: 'An error occurred, please try again.'
                };
              });
            </script>
            <div class="GenericModal modalPopup unifiedModal smallModal" style="display:none">
              <div class="Title"></div>
              <div class="GenericModalBody">
                <div>
                  <div class="ImageContainer">
                    <img class="GenericModalImage" alt="generic image">
                  </div>
                  <div class="Message"></div>
                </div>
                <div class="GenericModalButtonContainer">
                  <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a>
                </div>
              </div>
            </div>
            <script>
              Roblox = Roblox || {};
              Roblox.BuildPage = Roblox.BuildPage || {};
              Roblox.BuildPage.AlertURL = "https://images.rbxcdn.com/43ac54175f3f3cd403536fedd9170c10.png";
            </script>
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
          <script>
            if (typeof Roblox === "undefined") {
              Roblox = {};
            }
            if (typeof Roblox.BuildPage === "undefined") {
              Roblox.BuildPage = {};
            }
            Roblox.BuildPage.Resources = {
                active: "Active",
                inactive: "Inactive",
                activatePlace: "Activate Place",
                editGame: "Edit Game",
                ok: "OK",
                robloxStudio: "ROBLOX Studio",
                openIn: "To edit this game, open to this page in ",
                placeInactive: "Place Inactive",
                toBuileHere: "To build here, please activate this place by clicking the ",
                inactiveButton: "inactive button. ",
                createModel: "Create Model",
                toCreate: "To create models, please use ",
                makeActive: "Make Active",
                makeInactive: "Make Inactive",
                purchaseComplete: "Purchase Complete!",
                youHaveBid: "You have successfully bid ",
                confirmBid: "Confirm the Bid",
                placeBid: "Place Bid",
                cancel: "Cancel",
                errorOccurred: "Error Occurred",
                adDeleted: "Ad Deleted",
                theAdWasDeleted: "The Ad has been deleted.",
                confirmDelete: "Confirm Deletion",
                areYouSureDelete: "Are you sure you want to delete this Ad?",
                bidRejected: "Your bid was Rejected",
                bidRange: "Bid value must be a number between ",
                bidRange2: "Bid value must be a number greater than ",
                and: " and ",
                yourRejected: "Your bid was Rejected",
                estimatorExplanation: "This estimator uses data from ads run yesterday to guess how many impressions your ad will recieve.",
                estimatedImpressions: "Estimated Impressions ",
                makeAdBid: "Make Ad Bid",
                wouldYouLikeToBid: "Would you like to bid ",
                verify: "Verify",
                emailVerifiedTitle: "Verify Your Email",
                emailVerifiedMessage: "You must verify your email before you can work on your place. You can verify your email on the  < a href = '/my/account?confirmemail=1' > Account < /a> page.",continueText:"Continue",profileRemoveTitle:"Remove from profile?",profileRemoveMessage:"This game is inactive and listed on your profile, do you wish to remove it?",profileAddTitle:"Add to profile?",profileAddMessage:"This game is active, but not listed on your profile, do you wish to add it?",deactivateTitle:"Deactivate Place",deactivateBody:"This will shut down any running games; VIP subscriptions will also be cancelled. < br / > < br / > Do you still want to deactivate ? ",deactivateButton:"
                Deactivate ",questionmarkImgUrl:"
                https: //static.rbxcdn.com/images/Buttons/questionmark-12x12.png",activationRequestFailed:"Request to activate game failed. Please retry in a few minutes!",deactivationRequestFailed:"Request to deactivate game failed. Please retry in a few minutes!",tooManyActiveMessage:"You have reached the maximum number of active places for your membership level. Deactivate one of your existing active places before making this place active.",activeSlotsMessage:"{0} of {1} active slots used"};
          </script>
        </div>
        <div id="GroupCreationsTab" style="display:none">
          <div class="BuildPageContent" data-groupid="">
            <input id="assetTypeId" name="assetTypeId" type="hidden" value="9">
            <input data-val="true" data-val-required="The IsTgaUploadEnabled field is required." id="isTgaUploadEnabled" name="isTgaUploadEnabled" type="hidden" value="True">
            <table id="build-page" data-asset-type-id="9" data-showcases-enabled="true" data-edit-opens-studio="True">
              <tbody>
                <tr>
                  <td class="menu-area divider-right">
                    <a href="/develop?View=9" class="tab-item tab-item-selected">Places</a>
                    <a href="/develop?Page=universes" class="tab-item">Games</a>
                    <a href="/develop?View=10" class="tab-item">Models</a>
                    <a href="/develop?View=13" class="tab-item">Decals</a>
                    <a href="/develop?View=21" class="tab-item">Badges</a>
                    <a href="/develop?View=34" class="tab-item">Game Passes</a>
                    <a href="/develop?View=3" class="tab-item">Audio</a>
                    <a href="/develop?View=24" class="tab-item">Animations</a>
                    <a href="/develop?View=40" class="tab-item">Meshes</a>
                    <a href="/develop?Page=ads" class="tab-item">User Ads</a>
                    <a href="/develop?Page=sponsored-games" class="tab-item">Sponsored Games</a>
                    <a href="/develop?View=11" class="tab-item">Shirts</a>
                    <a href="/develop?View=2" class="tab-item">T-Shirts</a>
                    <a href="/develop?View=12" class="tab-item">Pants</a>
                    <a href="/develop?View=38" class="tab-item">Plugins</a>
                    <a href="/My/Sets.aspx" class="tab-item">Sets</a>
                    <div id="StudioWidget">
                      <div class="widget-name">
                        <h3>
                          <span class="brand-name">Roblox</span> Studio
                        </h3>
                      </div>
                      <div class="content">
                        <div id="LeftColumn">
                          <div class="studio-icon">
                            <img src="https://images.rbxcdn.com/33a10b486241d85e46df442eb2134371.svg">
                          </div>
                        </div>
                        <div id="RightColumn">
                          <ul>
                            <li>
                              <a href="//setup.watrbx.wtf/RobloxStudioLauncherBeta.exe" class="studio-launch" download="">Download</a>
                            </li>
                            <li>
                              <a href="https://wiki.roblox.com/index.php/Studio">Visit Wiki</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div id="CommunityWidget">
                      <div class="widget-name">
                        <h3>Creator Community</h3>
                      </div>
                      <div class="content">
                        <div id="LeftColumn">
                          <div class="dev-logo">
                            <img src="https://images.rbxcdn.com/b60ffe48e37a1168fe65c94a55830de2.png">
                          </div>
                        </div>
                        <div id="RightColumn">
                          <ul>
                            <li>
                              <a href="https://devforum.roblox.com">Visit Forum</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="content-area">
                    <a href="/places/create" id="CreatePlace" class="create-new-button btn-medium btn-primary">Create New Place</a>
                    <div id="AlertMessage" class="status-confirm">We've moved several configuration options from the places tab to the games tab. Click on the "Games" tab and then the gear icon next to a game to see where the options moved to. <div>&nbsp;</div>Please read <a href="https://devforum.roblox.com/t/the-future-of-filtering-enabled-experimental-mode/43613" target="_blank">this post</a> for an important update on Filtering Enabled and game discovery on Roblox </div>
                    <table class="section-header">
                      <tbody>
                        <tr>
                          <td class="content-title">
                            <div>
                              <h2 class="header-text">Places</h2>
                            </div>
                          </td>
                          <td>
                            <div class="creation-context-filters-and-sorts" data-fetchplaceurl="/build/gamesbycontext?groupId=">
                              <div class="option">
                                <label class="sort-label">Created by:</label>
                                <select class="place-creationcontext-drop-down" size="1">
                                  <option value="NonGameCreation"> Me </option>
                                  <option value="GameAuthorsCreation">My Games</option>
                                  <option value="NonGameAuthorsCreation">Other Games</option>
                                </select>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="creation-context-breadcrumb" style="display:none">
                          <td style="height:21px">
                            <div class="breadCrumb creation-context-breadcrumb">
                              <a href="#breadcrumbs=gamecontext" class="breadCrumbContext">Context</a>
                              <span class="context-game-separator" style="display:none"> » </span>
                              <a href="#breadcrumbs=game" class="breadCrumbGame notranslate" style="display:none">Game</a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="items-container games-container">
                      <script>
                        function editGameInStudio(play_placeId) {
                          RobloxLaunch._GoogleAnalyticsCallback = function() {
                            var isInsideRobloxIDE = 'website';
                            if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                              isInsideRobloxIDE = 'Studio';
                            };
                            GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
                            GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Edit']);
                            EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin');
                            if (typeof Roblox.GamePlayEvents != 'undefined') {
                              Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
                            }
                          };
                          Roblox.Client.WaitForRoblox(function() {
                            if (Roblox.VideoPreRollDFP) {
                              Roblox.VideoPreRollDFP.showVideoPreRoll = false;
                            }
                            RobloxLaunch.StartGame('/Game/edit.ashx?PlaceID=' + play_placeId + '&upload=' + play_placeId, 'edit.ashx', '/Login/Negotiate.ashx', 'FETCH', true);
                          });
                        }
                      </script>
                      <span id="verifiedEmail" style="display:none"></span>
                      <span id="assetLinks" style="display:none" data-asset-links-enabled="True"></span>
                      <table class="item-table" data-item-id="995100333" data-type="game" data-universeid="413094703">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/995100333/New-Robloxia-City-v1-00-ALPHA" class="game-image">
                                <img src="https://t0.rbxcdn.com/98786c298dcd5cfb085e34fee04ae531" alt="New Robloxia City v1.00 ALPHA">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/995100333/New-Robloxia-City-v1-00-ALPHA">New Robloxia City v1.00 ALPHA</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>8/21/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>0</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col"><div class="gear-button-wrapper" style="background-color: rgb(239, 239, 239); border-color: gray; z-index: 999;"><a href="#" class="gear-button gear-open"></a></div></td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="979727704" data-type="game" data-universeid="407123433">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/979727704/Arcania-Swordfight-2" class="game-image">
                                <img src="https://t3.rbxcdn.com/0aee95f0ae72d6944697456d6daff74f" alt="Arcania Swordfight 2">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/979727704/Arcania-Swordfight-2">Arcania Swordfight 2</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>8/14/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>0</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="838987823" data-type="game" data-universeid="347235445">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/838987823/Prison" class="game-image">
                                <img src="https://t5.rbxcdn.com/0bf435b488874d7996e4734ea15acdfe" alt="Prison ">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/838987823/Prison">Prison </a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>7/10/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>1</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="673172113" data-type="game" data-universeid="286083028">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/673172113/Black-White" class="game-image">
                                <img src="https://t3.rbxcdn.com/394b8ac08e5894817f3cc63638e540d4" alt="Black &amp; White">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/673172113/Black-White">Black &amp; White</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>2/27/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>0</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="613567057" data-type="game" data-universeid="249899474">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/613567057/Aurora-High" class="game-image">
                                <img src="https://t0.rbxcdn.com/32abe587642a953d618231128d3c3ee3" alt="Aurora High">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/613567057/Aurora-High">Aurora High</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>2/5/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>4</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="598074910" data-type="game" data-universeid="240619260">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/598074910/idk-OT-PARTY" class="game-image">
                                <img src="https://t7.rbxcdn.com/95919077db0364e353dd0649c699ac8f" alt="idk (OT PARTY)">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/598074910/idk-OT-PARTY">idk (OT PARTY)</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>1/2/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>17</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="596804232" data-type="game" data-universeid="239873823">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/596804232/Le-Short-Obby-10" class="game-image">
                                <img src="https://t5.rbxcdn.com/1266290278c66006a28c1110cbab17e2" alt="Le Short Obby [10]">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/596804232/Le-Short-Obby-10">Le Short Obby [10]</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>1/1/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>0</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="585092012" data-type="game" data-universeid="233882659">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/585092012/Arcania-Swordfight-2-0-PRE-ALPHA-Testing-Done" class="game-image">
                                <img src="https://t3.rbxcdn.com/76f248db9f00fdc45d9f804f974eea79" alt="Arcania Swordfight 2.0 [PRE-ALPHA] [Testing Done]">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/585092012/Arcania-Swordfight-2-0-PRE-ALPHA-Testing-Done">Arcania Swordfight 2.0 [PRE-ALPHA] [Testing Done]</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>5/27/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>21</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="571648876" data-type="game" data-universeid="227142461">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/571648876/Urbex-City-PRE-ALPHA-NOT-OPEN-YET" class="game-image">
                                <img src="https://t0.rbxcdn.com/a7c7058175d7f36a1a0ddcf684725c0f" alt="Urbex City [PRE-ALPHA] [NOT OPEN YET]">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/571648876/Urbex-City-PRE-ALPHA-NOT-OPEN-YET">Urbex City [PRE-ALPHA] [NOT OPEN YET]</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>12/26/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>8</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="424326659" data-type="game" data-universeid="160988811">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/424326659/Arcania-Swordfight-v1-6" class="game-image">
                                <img src="https://t3.rbxcdn.com/a2810fbbc8ad2f89239b8d24eafff49d" alt="Arcania Swordfight [v1.6]">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/424326659/Arcania-Swordfight-v1-6">Arcania Swordfight [v1.6]</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>8/17/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>204</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="244305937" data-type="game" data-universeid="102566519">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/244305937/True-Combat-NEXT-v4-3" class="game-image">
                                <img src="https://t0.rbxcdn.com/99aea99a339ecdcef9f5e959e035e343" alt="True Combat: NEXT (v4.3)">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/244305937/True-Combat-NEXT-v4-3">True Combat: NEXT (v4.3)</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>7/16/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>32</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="447040755" data-type="game" data-universeid="170859658">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/447040755/temmie-create" class="game-image">
                                <img src="https://t7.rbxcdn.com/4ab6711dcdcc66e38a33c77082f10b0f" alt="temmie create">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/447040755/temmie-create">temmie create</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>7/3/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>6</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="442041356" data-type="game" data-universeid="168757341">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/442041356/TEAM-CREATE-YEA" class="game-image">
                                <img src="https://t1.rbxcdn.com/40a7b35ec0b6226808e7c26115a5cd3d" alt="TEAM CREATE YEA!!!!!!!!">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/442041356/TEAM-CREATE-YEA">TEAM CREATE YEA!!!!!!!!</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>6/26/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>4</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="426455725" data-type="game" data-universeid="161893632">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/426455725/ultracollab7" class="game-image">
                                <img src="https://t5.rbxcdn.com/c411f67e0315c9d8e283f0ea2e51b771" alt="ultracollab7">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/426455725/ultracollab7">ultracollab7</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>6/5/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>5</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="426208377" data-type="game" data-universeid="161798167">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/426208377/axiom-flight-sim" class="game-image">
                                <img src="https://t4.rbxcdn.com/74600d1c323558f4c87047f2fb03f9a2" alt="axiom flight sim">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/426208377/axiom-flight-sim">axiom flight sim</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>12/11/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>15</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="425420636" data-type="game" data-universeid="161471611">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/425420636/every-free-model-ever" class="game-image">
                                <img src="https://t0.rbxcdn.com/8d72170a29274abcd2f92b2df6bc7ba1" alt="every free model ever">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/425420636/every-free-model-ever">every free model ever</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>6/3/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>6</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="413044827" data-type="game" data-universeid="156259739">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/413044827/Collab" class="game-image">
                                <img src="https://t2.rbxcdn.com/0d691ce7f4342771796ffcad64f0e2f3" alt="Collab">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/413044827/Collab">Collab</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>5/21/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>6</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="411152389" data-type="game" data-universeid="155413311">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/411152389/TC6" class="game-image">
                                <img src="https://t1.rbxcdn.com/b5d91c9c625994dde3aed566bdd040a5" alt="TC6">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/411152389/TC6">TC6</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>5/8/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>9</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="410602550" data-type="game" data-universeid="155181953">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/410602550/Team-Create-5" class="game-image">
                                <img src="https://t1.rbxcdn.com/63a63609b4afd6db919c547b9b9f39da" alt="Team Create 5">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/410602550/Team-Create-5">Team Create 5</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>5/8/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>11</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="401673831" data-type="game" data-universeid="151441515">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/401673831/BUILD-Aurora-Tower" class="game-image">
                                <img src="https://t1.rbxcdn.com/eaa0703a4e294f35b4d48b4c210f6e0e" alt="[BUILD] Aurora Tower">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/401673831/BUILD-Aurora-Tower">[BUILD] Aurora Tower</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>5/8/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>0</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="401247497" data-type="game" data-universeid="151280104">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/401247497/Team-Create-3" class="game-image">
                                <img src="https://t7.rbxcdn.com/eee827fa06e458c5d6411f08c291fe45" alt="Team Create 3">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/401247497/Team-Create-3">Team Create 3</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>4/20/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>5</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="400810871" data-type="game" data-universeid="151110235">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/400810871/Team-Create-Squared" class="game-image">
                                <img src="https://t6.rbxcdn.com/7e38051399308deb3a9393905f311ca6" alt="Team Create Squared">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/400810871/Team-Create-Squared">Team Create Squared</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>5/29/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>6</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="400778164" data-type="game" data-universeid="151096769">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/400778164/Team-Create-Universality" class="game-image">
                                <img src="https://t6.rbxcdn.com/8992044ceb9f24898956840b772ef875" alt="Team Create Universality">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/400778164/Team-Create-Universality">Team Create Universality</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>4/18/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>45</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="399002983" data-type="game" data-universeid="150405786">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/399002983/XENON-HANGOUT-PRE-ALPHA-NOT-DONE-PLZ-PLZ-DONT-PLAY" class="game-image">
                                <img src="https://t5.rbxcdn.com/2a814e07399020aeb79c31c83e7306e4" alt="XENON HANGOUT PRE ALPHA NOT DONE PLZ PLZ DONT PLAY">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/399002983/XENON-HANGOUT-PRE-ALPHA-NOT-DONE-PLZ-PLZ-DONT-PLAY">XENON HANGOUT PRE ALPHA NOT DONE PLZ PLZ DONT PLAY</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>4/15/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>0</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="382301897" data-type="game" data-universeid="143621538">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/382301897/Neoport-NOWHERE-NEAR-DONE-v2-320" class="game-image">
                                <img src="https://t6.rbxcdn.com/6ba559e9f8bae8b82f03514f6d28c119" alt="Neoport - NOWHERE NEAR DONE (v2.320)">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/382301897/Neoport-NOWHERE-NEAR-DONE-v2-320">Neoport - NOWHERE NEAR DONE (v2.320)</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>3/14/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>2</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="367109934" data-type="game" data-universeid="139353085">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/367109934/Arena-Fighters-NEO-v0-78-051" class="game-image">
                                <img src="https://t6.rbxcdn.com/6df215e99c16b7236e58428de9d48622" alt="Arena Fighters NEO v0.78.051">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/367109934/Arena-Fighters-NEO-v0-78-051">Arena Fighters NEO v0.78.051</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>3/8/2016
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>2</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="289571647" data-type="game" data-universeid="112820831">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/289571647/Insanity-High-Zombie-Survival-v0-51" class="game-image">
                                <img src="https://t1.rbxcdn.com/b63d7b7cadb99008772f363ca5a3e83b" alt="Insanity High: Zombie Survival (v0.51)">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/289571647/Insanity-High-Zombie-Survival-v0-51">Insanity High: Zombie Survival (v0.51)</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>11/27/2015
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>3</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="284355240" data-type="game" data-universeid="111593491">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/284355240/True-Combat-2-Carmageddon-v3" class="game-image">
                                <img src="https://t3.rbxcdn.com/ecc3b61fa2ecc15854519ebe48dc4288" alt="True Combat 2: Carmageddon (v3)">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/284355240/True-Combat-2-Carmageddon-v3">True Combat 2: Carmageddon (v3)</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>8/17/2015
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>13</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="277696433" data-type="game" data-universeid="110168342">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/277696433/True-Combat-5" class="game-image">
                                <img src="https://t2.rbxcdn.com/de64a77ecffda3e44659f1bfc2bc4b3f" alt="True Combat^5">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/277696433/True-Combat-5">True Combat^5</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>7/31/2015
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>5</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="159675892" data-type="game" data-universeid="76131508">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/159675892/Waycity-v2-1-1" class="game-image">
                                <img src="https://t6.rbxcdn.com/d3efd602de46a81876412f8c601868ae" alt="Waycity (v2.1.1)">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/159675892/Waycity-v2-1-1">Waycity (v2.1.1)</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>6/16/2015
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>14</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="234431775" data-type="game" data-universeid="100311833">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/234431775/Avanta-Garage-V1" class="game-image">
                                <img src="https://t5.rbxcdn.com/a1902064ffd2a151db8638074fb41329" alt="Avanta Garage (V1)">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/234431775/Avanta-Garage-V1">Avanta Garage (V1)</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>4/9/2015
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>4</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="229877549" data-type="game" data-universeid="99240738">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/229877549/Chicas-Adventure-alpha-version-build-6-64" class="game-image">
                                <img src="https://t0.rbxcdn.com/ae915dabe1791758bdefe3736d355b6b" alt="Chica's Adventure (alpha version, build 6.64">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/229877549/Chicas-Adventure-alpha-version-build-6-64">Chica's Adventure (alpha version, build 6.64</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>3/29/2015
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>3</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                      <table class="item-table" data-item-id="165824285" data-type="game" data-universeid="79195147">
                        <tbody>
                          <tr>
                            <td class="image-col">
                              <a href="/games/165824285/Capture-the-Flag-Arena-Dual-Interim-Build-1-Ve" class="game-image">
                                <img src="https://t5.rbxcdn.com/9efe7c1f065e755fb88a373813a25188" alt="Capture the Flag: Arena Dual (Interim Build 1) (Ve">
                              </a>
                            </td>
                            <td class="name-col">
                              <a class="title notranslate" href="/games/165824285/Capture-the-Flag-Arena-Dual-Interim-Build-1-Ve">Capture the Flag: Arena Dual (Interim Build 1) (Ve</a>
                              <table class="details-table">
                                <tbody>
                                  <tr>
                                    <td class="item-date">
                                      <span>Updated:</span>1/8/2017
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                            <td class="stats-col-games">
                              <div class="totals-label">Total Visitors: <span>55</span>
                              </div>
                              <div class="totals-label">Last 7 days: <span>0</span>
                              </div>
                            </td>
                            <td class="edit-col">
                              <a class="roblox-edit-button btn-control btn-control-large" href="javascript:">Edit</a>
                            </td>
                            <td class="menu-col">
                              <div class="gear-button-wrapper">
                                <a href="#" class="gear-button"></a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="separator"></div>
                    </div>
                    <div class="build-loading-container" style="display:none">
                      <div class="buildpage-loading-container">
                        <img alt="^_^" src="https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div id="build-dropdown-menu">
              <a href="#" data-href-template="/places/0/update">Configure Place</a>
              <a href="#" data-gameonly-link="true" data-href-template="/places/0/stats">Developer Stats</a>
              <a class="shutdown-all-servers-button" href="#">Shut Down All Servers</a>
            </div>
            <div class="PlaceSelectorModal modalPopup unifiedModal" style="display:none">
              <div class="Title">Select Place</div>
              <div class="GenericModalBody text">
                <div class="place-selector-modal" data-place-loader-url="/universes/get-places-by-context?creationContext=NonGameCreation&amp;universeId=0&amp;groupId=">
                  <div class="place-selector-container">
                    <div id="PlaceSelectorItemContainer" class="place-selector-item-container"></div>
                    <div id="PlaceSelectorPagerContainer" class="place-selector-pager-container"></div>
                  </div>
                  <div class="place-selector template" title="Place" style="display:none">
                    <div class="place-image" data-retry-url-template="/asset-thumbnail/json?height=100&amp;width=160&amp;format=jpeg&amp;returnAutoGenerated=True">
                      <img alt="^_^" class="item-image" src="https://images.rbxcdn.com/ec5c01d220bf1b73403fa51519267742.gif">
                    </div>
                    <div class="InfoContainer">
                      <div class="place-name"></div>
                      <div class="game-name">
                        <span class="form-label">Game: </span>
                        <span class="game-name-text"></span>
                      </div>
                    </div>
                    <div style="clear:both"></div>
                  </div>
                </div>
              </div>
            </div>
            <script>
              $(function() {
                Roblox.PlaceSelector.Init();
                Roblox.PlaceSelector.Resources = {
                  anErrorOccurred: 'An error occurred, please try again.'
                };
              });
            </script>
            <div class="GenericModal modalPopup unifiedModal smallModal" style="display:none">
              <div class="Title"></div>
              <div class="GenericModalBody">
                <div>
                  <div class="ImageContainer">
                    <img class="GenericModalImage" alt="generic image">
                  </div>
                  <div class="Message"></div>
                </div>
                <div class="GenericModalButtonContainer">
                  <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a>
                </div>
              </div>
            </div>
            <script>
              Roblox = Roblox || {};
              Roblox.BuildPage = Roblox.BuildPage || {};
              Roblox.BuildPage.AlertURL = "https://images.rbxcdn.com/43ac54175f3f3cd403536fedd9170c10.png";
            </script>
          </div>
          <div class="Ads_WideSkyscraper">
            <div id="Skyscraper-Adp-Right" class="abp abp-container right-abp">
                    

    <iframe allowtransparency="true"
            frameborder="0"
            height="612"
            scrolling="no"
            src="/userads/2"
            width="160"
            data-js-adtype="iframead"></iframe>

                </div>
          </div>
          <script>
            if (typeof Roblox === "undefined") {
              Roblox = {};
            }
            if (typeof Roblox.BuildPage === "undefined") {
              Roblox.BuildPage = {};
            }
            Roblox.BuildPage.Resources = {
                active: "Active",
                inactive: "Inactive",
                activatePlace: "Activate Place",
                editGame: "Edit Game",
                ok: "OK",
                robloxStudio: "ROBLOX Studio",
                openIn: "To edit this game, open to this page in ",
                placeInactive: "Place Inactive",
                toBuileHere: "To build here, please activate this place by clicking the ",
                inactiveButton: "inactive button. ",
                createModel: "Create Model",
                toCreate: "To create models, please use ",
                makeActive: "Make Active",
                makeInactive: "Make Inactive",
                purchaseComplete: "Purchase Complete!",
                youHaveBid: "You have successfully bid ",
                confirmBid: "Confirm the Bid",
                placeBid: "Place Bid",
                cancel: "Cancel",
                errorOccurred: "Error Occurred",
                adDeleted: "Ad Deleted",
                theAdWasDeleted: "The Ad has been deleted.",
                confirmDelete: "Confirm Deletion",
                areYouSureDelete: "Are you sure you want to delete this Ad?",
                bidRejected: "Your bid was Rejected",
                bidRange: "Bid value must be a number between ",
                bidRange2: "Bid value must be a number greater than ",
                and: " and ",
                yourRejected: "Your bid was Rejected",
                estimatorExplanation: "This estimator uses data from ads run yesterday to guess how many impressions your ad will recieve.",
                estimatedImpressions: "Estimated Impressions ",
                makeAdBid: "Make Ad Bid",
                wouldYouLikeToBid: "Would you like to bid ",
                verify: "Verify",
                emailVerifiedTitle: "Verify Your Email",
                emailVerifiedMessage: "You must verify your email before you can work on your place. You can verify your email on the  < a href = '/my/account?confirmemail=1' > Account < /a> page.",continueText:"Continue",profileRemoveTitle:"Remove from profile?",profileRemoveMessage:"This game is inactive and listed on your profile, do you wish to remove it?",profileAddTitle:"Add to profile?",profileAddMessage:"This game is active, but not listed on your profile, do you wish to add it?",deactivateTitle:"Deactivate Place",deactivateBody:"This will shut down any running games; VIP subscriptions will also be cancelled. < br / > < br / > Do you still want to deactivate ? ",deactivateButton:"
                Deactivate ",questionmarkImgUrl:"
                https: //static.rbxcdn.com/images/Buttons/questionmark-12x12.png",activationRequestFailed:"Request to activate game failed. Please retry in a few minutes!",deactivationRequestFailed:"Request to deactivate game failed. Please retry in a few minutes!",tooManyActiveMessage:"You have reached the maximum number of active places for your membership level. Deactivate one of your existing active places before making this place active.",activeSlotsMessage:"{0} of {1} active slots used"};
          </script>
        </div>
        <div id="LibraryTab">
          <div class="loading" id="LibraryLoadingIndicatorContainer">
            <img id="LibraryLoadingIndicator" src="https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif" alt="Progress">
          </div>
        </div>
        <div id="DeveloperExchangeTab">
          <div id="TosAgreementInfo" data-terms-check-needed="True"></div>
          <div id="DevExLeftColumn" class="columnar-container">
              <h1 style="text-align: center;">This page is intentionally left blank.</h1>
            </div>
            <script>
              var Roblox = Roblox || {};
              Roblox.CashOut = {};
              Roblox.CashOut.Resources = {};
              Roblox.CashOut.Resources.cancel = "Cancel";
              Roblox.CashOut.Resources.EmailVerifiedTitle = "Verify Email";
              Roblox.CashOut.Resources.EmailVerifiedMessage = "You must verify your email before you can cash out.";
              Roblox.CashOut.Resources.Verify = "Verify";
              Roblox.CashOut.Resources.NeedOBCTitle = "Upgrade Membership";
              Roblox.CashOut.Resources.NeedOBCMessage = "You need Outrageous Builders Club to Cash Out.";
              Roblox.CashOut.Resources.NeedRobuxTitle = "ROBUX";
              Roblox.CashOut.Resources.NeedRobuxMessage = "You don't have enough ROBUX to Cash Out.";
              Roblox.CashOut.EmailIsVerifiedModal = function() {
                Roblox.GenericModal.open(Roblox.CashOut.Resources.EmailVerifiedTitle, null, Roblox.CashOut.Resources.EmailVerifiedMessage);
              };
              Roblox.CashOut.NeedOBCModal = function() {
                Roblox.GenericModal.open(Roblox.CashOut.Resources.NeedOBCTitle, null, Roblox.CashOut.Resources.NeedOBCMessage);
              };
              Roblox.CashOut.NeedRobuxModal = function() {
                Roblox.GenericModal.open(Roblox.CashOut.Resources.NeedRobuxTitle, null, Roblox.CashOut.Resources.NeedRobuxMessage);
              };
              $(function() {
                var modal = $('#CashOutWidget').attr('data-modal');
                if (modal === "obc") {
                  Roblox.CashOut.NeedOBCModal();
                } else if (modal === "robux") {
                  Roblox.CashOut.NeedRobuxModal();
                } else if (modal === "email") {
                  Roblox.CashOut.EmailIsVerifiedModal();
                }
              });
            </script>
          </div>
        </div>
      </div>
      <div id="AdPreviewModal" class="simplemodal-data" style="display:none">
        <div id="ConfirmationDialog" style="overflow:hidden">
          <div id="AdPreviewContainer" style="overflow:hidden"></div>
        </div>
      </div>
      <script>
        Roblox.CatalogValues = Roblox.CatalogValues || {};
        Roblox.CatalogValues.CatalogContentsUrl = "/catalog/contents";
        Roblox.CatalogValues.CatalogContext = 2;
        Roblox.CatalogValues.CatalogContextDevelopOnly = 2;
        Roblox.CatalogValues.ContainerID = "LibraryTab";
        $(function() {
          if (Roblox && Roblox.AdsHelper && Roblox.AdsHelper.AdRefresher) {
            Roblox.AdsHelper.AdRefresher.globalCreateNewAdEnabled = true;
            Roblox.AdsHelper.AdRefresher.adRefreshRateInMilliseconds = 3000;
          }
        });
      </script>
      <div style="clear:both"></div>
    </div>
  </div>
</div>

<? $pagebuilder->build_footer(); ?>
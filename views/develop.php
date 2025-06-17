<?php 
use watrlabs\watrkit\pagebuilder;
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
$pagebuilder->set_page_name("Develop");

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
												<h3>ROBLOX Studio</h3>
											</div>
											<div class="content">
												<div id="LeftColumn">
													<div class="studio-icon"><img src="/images/RobloxStudio.png"></div>
												</div>
												<div id="RightColumn">
													<ul>
														<li><a href="#" class="studio-launch" download="">Download</a></li>
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
            <div style="width:160px" class="abp adp-gpt-container">
              <span id="3134373334333238" class="GPTAd skyscraper" data-js-adtype="gptAd" data-ad-slot="Roblox_Build_Right_160x600"></span>
              <div class="ad-annotations" style="width:160px">
                <span class="ad-identification">
                  <span class="ad-identification-text">
                    <span class="ad-identification-text">Advertisement</span>
                  </span>
                </span>
                <a class="BadAdButton" href="/Ads/ReportAd.aspx" title="click to report an offensive ad">Report</a>
              </div>
              <script>
                $(function() {
                  googletag.cmd.push(function() {
                    if (typeof Roblox.AdsHelper !== "undefined" && typeof Roblox.AdsHelper.toggleAdsSlot !== "undefined") {
                      Roblox.AdsHelper.toggleAdsSlot("", "3134373334333238");
                    } else {
                      googletag.display("3134373334333238");
                    }
                  });
                });
              </script>
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
                              <a href="https://s3.amazonaws.com/setup.roblox.com/RobloxStudioLauncherBeta.exe" class="studio-launch" download="">Download</a>
                            </li>
                            <li>
                              <a href="http://wiki.roblox.com/index.php/Studio">Visit Wiki</a>
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
                    <div id="AlertMessage" class="status-confirm">We've moved several configuration options from the places tab to the games tab. Click on the "Games" tab and then the gear icon next to a game to see where the options moved to. <div>&nbsp;</div>Please read <a href="http://devforum.roblox.com/t/the-future-of-filtering-enabled-experimental-mode/43613" target="_blank">this post</a> for an important update on Filtering Enabled and game discovery on Roblox </div>
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
            <div style="width:160px" class="abp adp-gpt-container">
              <span id="32353430393432" class="GPTAd skyscraper" data-js-adtype="gptAd" data-ad-slot="Roblox_Build_Right_160x600"></span>
              <div class="ad-annotations" style="width:160px">
                <span class="ad-identification">
                  <span class="ad-identification-text">
                    <span class="ad-identification-text">Advertisement</span>
                  </span>
                </span>
                <a class="BadAdButton" href="/Ads/ReportAd.aspx" title="click to report an offensive ad">Report</a>
              </div>
              <script>
                $(function() {
                  googletag.cmd.push(function() {
                    if (typeof Roblox.AdsHelper !== "undefined" && typeof Roblox.AdsHelper.toggleAdsSlot !== "undefined") {
                      Roblox.AdsHelper.toggleAdsSlot("", "32353430393432");
                    } else {
                      googletag.display("32353430393432");
                    }
                  });
                });
              </script>
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

<div id="Footer" class="footer-container">
    <div class="FooterNav">
        <a href="https://www.roblox.com/info/Privacy.aspx">Privacy Policy</a>
        &nbsp;|&nbsp;
        <a href="https://corp.roblox.com/advertise-on-roblox" class="roblox-interstitial">Advertise with Us</a>
        &nbsp;|&nbsp;
        <a href="https://corp.roblox.com/press" class="roblox-interstitial">Press</a>
        &nbsp;|&nbsp;
        <a href="https://corp.roblox.com/contact-us" class="roblox-interstitial">Contact Us</a>
        &nbsp;|&nbsp;
            <a href="https://corp.roblox.com/about" class="roblox-interstitial">About Us</a>
&nbsp;|&nbsp;        <a href="https://blog.roblox.com">Blog</a>
        &nbsp;|&nbsp;
            <a href="https://corp.roblox.com/careers" class="roblox-interstitial">Jobs</a>
&nbsp;|&nbsp;        <a href="https://corp.roblox.com/parents" class="roblox-interstitial">Parents</a>
    </div>
    <div class="legal">
            <div class="left">
                <div id="a15b1695-1a5a-49a9-94f0-9cd25ae6c3b2">
    <a href="//privacy.truste.com/privacy-seal/Roblox-Corporation/validation?rid=2428aa2a-f278-4b6d-9095-98c4a2954215" title="TRUSTe Children privacy certification" target="_blank">
        <img style="border: none" src="/images/seal.png" width="133" height="45" alt="TRUSTe Children privacy certification"/>
    </a>
</div>
            </div>
            <div class="right">
                <p class="Legalese">
    ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a href="https://corp.roblox.com/" ref="footer-smallabout" class="roblox-interstitial">ROBLOX Corporation</a>, ©2015. Patents pending.
    ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
    Use of this site signifies your acceptance of the <a href="https://www.roblox.com/info/terms-of-service" ref="footer-terms">Terms and Conditions</a>.
</p>
            </div>
        <div class="clear"></div>
    </div>

</div>
        
        </div></div>
    </div>
    
        <script type="text/javascript">
            function urchinTracker() { };
            GoogleAnalyticsReplaceUrchinWithGAJS = true;
        </script>
    

    </form>


        <div id="dialogs-minimize"
             class="dialogs-minimize"
             dialog-minimize
             chat-library="chatLibrary">
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            // Because of placeLauncher.js, has to add this stupid global "play_placeId"
            $(document).on('Roblox.Chat.PartyInGame', function (event, args) {
                play_placeId = args.placeId;
            });
        });
    </script>

</div>
    
    

    <div id="InstallationInstructions" style="display:none;">
        <div class="ph-installinstructions">
            <div class="ph-modal-header">
                <span class="rbx-icon-close simplemodal-close"></span>
                <h3>Thanks for playing ROBLOX</h3>
            </div>
            <div class="ph-installinstructions-body">
                    <div class="ph-install-step ph-installinstructions-step1-of4">
                        <h1>1</h1>
                        <p class="larger-font-size">Click RobloxPlayerLauncher.exe to run the ROBLOX installer, which just downloaded via your web browser.</p>
                        <img width="230" height="180" src="https://images.rbxcdn.com/8b0052e4ff81d8e14f19faff2a22fcf7.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step2-of4">
                        <h1>2</h1>
                        <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process.</p>
                        <img width="230" height="180" src="https://images.rbxcdn.com/4a3f96d30df0f7879abde4ed837446c6.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step3-of4">
                        <h1>3</h1>
                        <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX.</p>
                        <img width="230" height="180" src="https://images.rbxcdn.com/6e23e4971ee146e719fb1abcb1d67d59.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step4-of4">
                        <h1>4</h1>
                        <p class="larger-font-size">After installation, click <strong>Play</strong> below to join the action!</p>
                        <div class="VisitButton VisitButtonContinuePH">
                            <a class="btn rbx-btn-primary-lg disabled">Play</a>
                        </div>
                    </div>
            </div>
            <div class="rbx-font-sm rbx-text-notes">
                The ROBLOX installer should download shortly. If it doesn’t, <a href="#" onclick="Roblox.ProtocolHandlerClientInterface.startDownload(); return false;">start the download now.</a>
            </div>
        </div>
    </div>
    <div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>



<div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
<iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>

<script type='text/javascript' src='/js/6b9fed5e91a508780b95c302464d62ef.js.gzip'></script>

<script type="text/javascript">
    Roblox.Client._skip = null;
    Roblox.Client._CLSID = '76D50904-6780-4c8b-8986-1A7EE0B1716D';
    Roblox.Client._installHost = 'setup.roblox.com';
    Roblox.Client.ImplementsProxy = true;
    Roblox.Client._silentModeEnabled = true;
    Roblox.Client._bringAppToFrontEnabled = false;
    Roblox.Client._currentPluginVersion = '';
    Roblox.Client._eventStreamLoggingEnabled = true;

        
        Roblox.Client._installSuccess = function() {
            if(GoogleAnalyticsEvents){
                GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
                GoogleAnalyticsEvents.FireEvent(['Plugin','Install Success']);
                if (Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
                    Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
                }
            }
        }
        
            
        if ((window.chrome || window.safari) && window.location.hash == '#chromeInstall') {
            window.location.hash = '';
            var continuation = '(' + $.cookie('chromeInstall') + ')';
            play_placeId = $.cookie('chromeInstallPlaceId');
            Roblox.GamePlayEvents.lastContext = $.cookie('chromeInstallLaunchMode');
            $.cookie('chromeInstallPlaceId', null);
            $.cookie('chromeInstallLaunchMode', null);
            $.cookie('chromeInstall', null);
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
            Roblox.Client.ResumeTimer(eval(continuation));
        }
        
</script>


<div id="PlaceLauncherStatusPanel" style="display:none;width:300px"
     data-new-plugin-events-enabled="True"
     data-event-stream-for-plugin-enabled="True"
     data-event-stream-for-protocol-enabled="True"
     data-is-protocol-handler-launch-enabled="True"
     data-is-user-logged-in="True"
     data-os-name="Windows"
     data-protocol-name-for-client="roblox-player"
     data-protocol-name-for-studio="roblox-studio"
     data-protocol-url-includes-launchtime="true"
     data-protocol-detection-enabled="true">
    <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
        <div id="Spinner" class="Spinner" style="padding:20px 0;">
            <img src="https://images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress" />
        </div>
        <div id="status" style="min-height:40px;text-align:center;margin:5px 20px">
            <div id="Starting" class="PlaceLauncherStatus MadStatusStarting" style="display:block">
                Starting Roblox...
            </div>
            <div id="Waiting" class="PlaceLauncherStatus MadStatusField">Connecting to Players...</div>
            <div id="StatusBackBuffer" class="PlaceLauncherStatus PlaceLauncherStatusBackBuffer MadStatusBackBuffer"></div>
        </div>
        <div style="text-align:center;margin-top:1em">
            <input type="button" class="Button CancelPlaceLauncherButton translate" value="Cancel" />
        </div>
    </div>
</div>
<div id="ProtocolHandlerStartingDialog" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">

        </div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_R.svg" width="90" height="90" alt="R" />
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                ROBLOX is now loading. Get ready to play!
            </p>
            <div class="ph-startingdialog-spinner-row">
                <img src="https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24" />
            </div>
        </div>
    </div>
</div>
<div id="ProtocolHandlerAreYouInstalled" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">
            <span class="rbx-icon-close simplemodal-close"></span>
        </div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_R.svg" width="90" height="90" alt="R" />
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                You're moments away from getting into the game!
            </p>
            <div>
                <button type="button" class="btn rbx-btn-primary-sm" id="ProtocolHandlerInstallButton">
                    Download and Install ROBLOX
                </button>
            </div>
            <div class="rbx-small rbx-text-notes">
                <a href="https://en.help.roblox.com/hc/en-us/articles/204473560" class="rbx-link" target="_blank">Click here for help</a>
            </div>

        </div>
    </div>
</div>
<div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
    <p class="larger-font-size">
        <span class="rbx-icon-moreinfo"></span>
        Check <b>Remember my choice</b> and click <img src="https://images.rbxcdn.com/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application" />  in the dialog box above to join games faster in the future!
    </p>
</div>


    <div id="videoPrerollPanel" style="display:none">
        <div id="videoPrerollTitleDiv">
            Gameplay sponsored by:
        </div>
        <div id="content">
            <video id="contentElement" style="width:0; height:0;" />
        </div>
        <div id="videoPrerollMainDiv"></div>
        <div id="videoPrerollCompanionAd">
            
                <script type="text/javascript">
                    googletag.cmd.push(function () {
                        googletag.defineSlot('/1015347/VideoPreroll', [300, 250], 'videoPrerollCompanionAd')
                            .addService(googletag.companionAds());
                        googletag.enableServices();
                        googletag.display('videoPrerollCompanionAd');
                    });
                </script>
        </div>
        <div id="videoPrerollLoadingDiv">
            Loading <span id="videoPrerollLoadingPercent">0%</span> - <span id="videoPrerollMadStatus" class="MadStatusField">Starting game...</span><span id="videoPrerollMadStatusBackBuffer" class="MadStatusBackBuffer"></span>
            <div id="videoPrerollLoadingBar">
                <div id="videoPrerollLoadingBarCompleted">
                </div>
            </div>
        </div>
        <div id="videoPrerollJoinBC">
            <span>Get more with Builders Club!</span>
            <a href="https://www.roblox.com/premium/membership?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
        </div>
    </div>   
        <script type="text/javascript" src="//imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
    <script type="text/javascript">
        $(function () {
            var videoPreRollDFP = Roblox.VideoPreRollDFP;
            if (videoPreRollDFP) {
                var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
                videoPreRollDFP.showVideoPreRoll = true;
                videoPreRollDFP.loadingBarMaxTime = 33000;
                videoPreRollDFP.videoLoadingTimeout = 11000;
                videoPreRollDFP.videoPlayingTimeout = 41000;
                videoPreRollDFP.videoLogNote = "";
                videoPreRollDFP.logsEnabled = true;
                videoPreRollDFP.excludedPlaceIds = "32373412";
                videoPreRollDFP.adUnit = "/1015347/VideoPreroll";
                videoPreRollDFP.adTime = 15;
                videoPreRollDFP.isSwfPreloaderEnabled = true;
                videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
                customTargeting.userAge = "36";
                customTargeting.userGender = "Male";
                customTargeting.gameGenres = "";
                customTargeting.environment = "Production";
                customTargeting.adTime = "15";
                customTargeting.PLVU = false;
                $(videoPreRollDFP.checkEligibility);
            }
        });
    </script>                                                     


<div id="GuestModePrompt_BoyGirl" class="Revised GuestModePromptModal" style="display:none;">
    <div class="simplemodal-close">
        <a class="ImageButton closeBtnCircle_20h" style="cursor: pointer; margin-left:455px;top:7px; position:absolute;"></a>
    </div>
    <div class="Title">
        Choose Your Character
    </div>
    <div style="min-height: 275px; background-color: white;">
        <div style="clear:both; height:25px;"></div>

        <div style="text-align: center;">
            <div class="VisitButtonsGuestCharacter VisitButtonBoyGuest" style="float:left; margin-left:45px;"></div>
            <div class="VisitButtonsGuestCharacter VisitButtonGirlGuest" style="float:right; margin-right:45px;"></div>
        </div>
        <div style="clear:both; height:25px;"></div>
        <div class="RevisedFooter">
            <div style="width:200px;margin:10px auto 0 auto;">
                <a href="https://www.roblox.com/?returnUrl=http%3A%2F%2Fwww.roblox.com%2Fcatalog%2FDefault.aspx"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="https://www.roblox.com/newlogin?returnUrl=http%3A%2F%2Fwww.roblox.com%2Fcatalog%2FDefault.aspx">I have an account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkRobloxInstall() {
             return RobloxLaunch.CheckRobloxInstall('/install/download.aspx');
    }

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

<div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle="confirmation" style="display:none;">
    <a class="genericmodal-close ImageButton closeBtnCircle_20h"></a>
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div class="TopBody">
            <div class="ImageContainer roblox-item-image"  data-image-size="small" data-no-overlays data-no-click>
                <img class="GenericModalImage" alt="generic image" />
            </div>
            <div class="Message"></div>
        </div>
        <div class="ConfirmationModalButtonContainer">
            <a href id="roblox-confirm-btn"><span></span></a>
            <a href id="roblox-decline-btn"><span></span></a>
        </div>
        <div class="ConfirmationModalFooter">
        
        </div>  
    </div>   
    <script type="text/javascript">
        Roblox = Roblox || {};
        Roblox.Resources = Roblox.Resources || {};

        //<sl:translate>
        Roblox.Resources.GenericConfirmation = {
            yes: "Yes",
            No: "No",
            Confirm: "Confirm",
            Cancel: "Cancel"
        };
        //</sl:translate>
    </script>
</div>


    
        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>
    

    <script type="text/javascript">
        $(function () {
            Roblox.CookieUpgrader.domain = 'roblox.com';
            Roblox.CookieUpgrader.upgrade("GuestData", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
            Roblox.CookieUpgrader.upgrade("RBXSource", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("rbx_acquisition_time", cookie); } });
            Roblox.CookieUpgrader.upgrade("RBXViralAcquisition", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("time", cookie); } });
                
                Roblox.CookieUpgrader.upgrade("RBXMarketing", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
                
                            
                Roblox.CookieUpgrader.upgrade("RBXSessionTracker", { expires: Roblox.CookieUpgrader.fourHoursFromNow });
                
                    });
    </script>
    <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "Over13" });

        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "https://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <noscript>
        <img src="https://b.scorecardresearch.com/p?c1=2&c2=&c3=&c4=&c5=&c6=&c15=&cv=2.0&cj=1"/>
    </noscript>

</body>                
</html>
<div class="Ads_WideSkyscraper">
            <div style="width:160px" class="abp adp-gpt-container">
              <span id="3134373334333238" class="GPTAd skyscraper" data-js-adtype="gptAd" data-ad-slot="Roblox_Build_Right_160x600"></span>
              <div class="ad-annotations" style="width:160px">
                <span class="ad-identification">
                  <span class="ad-identification-text">
                    <span class="ad-identification-text">Advertisement</span>
                  </span>
                </span>
                <a class="BadAdButton" href="/Ads/ReportAd.aspx" title="click to report an offensive ad">Report</a>
              </div>
              <script>
                $(function() {
                  googletag.cmd.push(function() {
                    if (typeof Roblox.AdsHelper !== "undefined" && typeof Roblox.AdsHelper.toggleAdsSlot !== "undefined") {
                      Roblox.AdsHelper.toggleAdsSlot("", "3134373334333238");
                    } else {
                      googletag.display("3134373334333238");
                    }
                  });
                });
              </script>
            </div>
          </div>
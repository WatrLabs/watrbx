<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$pagebuilder = new pagebuilder();
$auth = new authentication();

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___9c1e54da57df8e3a4497013dd394ae64_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=leanbase___fda3e1484c646a2dacdc1d4f7238b091_m.css');
$pagebuilder->addresource('jsfiles', '/js/35442da4b07e6a0ed6b085424d1a52cb.js');
$pagebuilder->set_page_name("Games");

$loggedin = $auth->hasaccount();

$pagebuilder->buildheader();

?>
        <div class="content  ">

                                    




<div id="ResponsiveWrapper" class="games-responsive-wrapper"
     data-gamessearchonpage="true"
     data-adsingamesearchresultsenabled="true">
    
    <div id="GamesPageRightColumn" class="games-page-right">
        <div id="GamesPageRightColumnSidebar" class="sidebar-no-ad games-page-right-sidebar">
                    <div id="GamePageAdDiv1" class="ads-container">


    <iframe allowtransparency="true"
            frameborder="0"
            height="270"
            scrolling="no"
            src="/userads/3"
            width="300"
            data-js-adtype="iframead"></iframe>

                    </div>
                        <div id="GamePageAdDiv2" class="ads-container">


    <iframe allowtransparency="true"
            frameborder="0"
            height="270"
            scrolling="no"
            src="/userads/3"
            width="300"
            data-js-adtype="iframead"></iframe>

                        </div>

        </div>
    </div>

    <div id="GamesPageLeftColumn" class="games-page-left ">

        <!-- New Filters and sort -->
        
           

<div class="col-xs-12 games-page-filters loading" id="FiltersAndSort"
     data-defaulttoppaidtoweekly="true"
     data-defaultweeklyratings="true"
    >
    
        <div class="input-group-btn rbx-input-group-btn" id="SortFilter">
            <button type="button" class="rbx-input-dropdown-btn" data-toggle="dropdown">
                <span class="rbx-selection-label" data-bind="label" data-value="default" data-default="default">Filter by</span>
                <span class="rbx-icon-down-16x16"></span>
            </button>
            <ul data-toggle="dropdown-menu" class="rbx-dropdown-menu" role="menu">
                <li data-hidetimefilter data-value="default"><a href="#">Default</a></li>
                        <li data-hidetimefilter
                            
                            data-value="1">
                            <a href="#">Popular</a>
                        </li>
                        <li data-hidetimefilter
                            
                            data-value="8">
                            <a href="#">Top Earning</a>
                        </li>
                        <li 
                            
                            data-value="11">
                            <a href="#">Top Rated</a>
                        </li>
                        <li data-hidetimefilter
                            
                            data-value="16">
                            <a href="#">Recommended</a>
                        </li>
                        <li data-hidetimefilter
                            data-hidegenrefilter
                            data-value="3">
                            <a href="#">Featured</a>
                        </li>
                        <li 
                            
                            data-value="2">
                            <a href="#">Top Favorite</a>
                        </li>
                        <li 
                            
                            data-value="9">
                            <a href="#">Top Paid</a>
                        </li>
                        <li 
                            
                            data-value="14">
                            <a href="#">Builders Club</a>
                        </li>

            </ul>

        </div>

    <div class="input-group-btn rbx-input-group-btn" id="TimeFilter">
        <button type="button" class="rbx-input-dropdown-btn" data-toggle="dropdown">
            <span class="rbx-selection-label" data-bind="label" data-value="0" data-default="0">Time</span>
            <span class="rbx-icon-down-16x16"></span>
        </button>
        <ul data-toggle="dropdown-menu" class="rbx-dropdown-menu" role="menu">
            <li data-value="0" class="hidden"><a href="#">Now</a></li>
            <li data-value="1"><a href="#">Past Day</a></li>
            <li data-value="2"><a href="#">Past Week</a></li>
            <li data-value="4"><a href="#">All Time</a></li>
        </ul>
    </div>

    <div class="input-group-btn rbx-input-group-btn" id="GenreFilter">
        <button type="button" class="rbx-input-dropdown-btn" data-toggle="dropdown">
            <span class="rbx-selection-label" data-bind="label" data-value="1" data-default="1">Genre</span>
            <span class="rbx-icon-down-16x16"></span>
        </button>
        <ul data-toggle="dropdown-menu" class="rbx-dropdown-menu" role="menu">
                <li data-value="1"><a href="#">All</a></li>
                <li data-value="13"><a href="#">Adventure</a></li>
                <li data-value="19"><a href="#">Building</a></li>
                <li data-value="15"><a href="#">Comedy</a></li>
                <li data-value="10"><a href="#">Fighting</a></li>
                <li data-value="20"><a href="#">FPS</a></li>
                <li data-value="11"><a href="#">Horror</a></li>
                <li data-value="8"><a href="#">Medieval</a></li>
                <li data-value="17"><a href="#">Military</a></li>
                <li data-value="12"><a href="#">Naval</a></li>
                <li data-value="21"><a href="#">RPG</a></li>
                <li data-value="9"><a href="#">Sci-Fi</a></li>
                <li data-value="14"><a href="#">Sports</a></li>
                <li data-value="7"><a href="#">Town and City</a></li>
                <li data-value="16"><a href="#">Western</a></li>
        </ul>
    </div>

</div>

        <div id="GamesPageSearch" class="hidden" data-keyword="">
            <a name="CancelSearch" class="cancel-search">Cancel</a>
            <input data-default="" id="searchbox" class="translate" type="text" name="search" />
            <div class="SearchIconButton" title="Search"></div>
        </div>

        <div id="GamesListsContainer" class="games-page-lists-container">



<div class="games-list-container hidden container-0" id="GamesListContainer1"
     data-sortfilter="1"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1">
    <div class="games-list-header games-filter-changer">
            <h3>Popular</h3>

    </div>
    <div class="show-in-multiview-mode-only">
        <div class="see-all-button games-filter-changer btn-medium btn-neutral rbx-btn-secondary-xs btn-more">
            See All
        </div>
    </div>

    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                    <ul class="hlist games"></ul>
            </div>

            <div class="scroller prev hidden">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-left"></span>
                    
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-right"></span>
                </div>
            </div>
        </div>

        <ul class="hlist games">            
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-1" id="GamesListContainer8"
     data-sortfilter="8"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1">
    <div class="games-list-header games-filter-changer">
            <h3>Top Earning</h3>

    </div>
    <div class="show-in-multiview-mode-only">
        <div class="see-all-button games-filter-changer btn-medium btn-neutral rbx-btn-secondary-xs btn-more">
            See All
        </div>
    </div>

    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                    <ul class="hlist games"></ul>
            </div>

            <div class="scroller prev hidden">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-left"></span>
                    
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-right"></span>
                </div>
            </div>
        </div>

        <ul class="hlist games">            
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-2" id="GamesListContainer11"
     data-sortfilter="11"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1">
    <div class="games-list-header games-filter-changer">
            <h3>Top Rated</h3>

    </div>
    <div class="show-in-multiview-mode-only">
        <div class="see-all-button games-filter-changer btn-medium btn-neutral rbx-btn-secondary-xs btn-more">
            See All
        </div>
    </div>

    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                    <ul class="hlist games"></ul>
            </div>

            <div class="scroller prev hidden">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-left"></span>
                    
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-right"></span>
                </div>
            </div>
        </div>

        <ul class="hlist games">            
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-3" id="GamesListContainer16"
     data-sortfilter="16"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1">
    <div class="games-list-header games-filter-changer">
            <h3>Recommended</h3>

    </div>
    <div class="show-in-multiview-mode-only">
        <div class="see-all-button games-filter-changer btn-medium btn-neutral rbx-btn-secondary-xs btn-more">
            See All
        </div>
    </div>

    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                    <ul class="hlist games"></ul>
            </div>

            <div class="scroller prev hidden">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-left"></span>
                    
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-right"></span>
                </div>
            </div>
        </div>

        <ul class="hlist games">            
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-4" id="GamesListContainer3"
     data-sortfilter="3"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1">
    <div class="games-list-header games-filter-changer">
            <h3>Featured</h3>

    </div>
    <div class="show-in-multiview-mode-only">
        <div class="see-all-button games-filter-changer btn-medium btn-neutral rbx-btn-secondary-xs btn-more">
            See All
        </div>
    </div>

    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                    <ul class="hlist games"></ul>
            </div>

            <div class="scroller prev hidden">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-left"></span>
                    
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-right"></span>
                </div>
            </div>
        </div>

        <ul class="hlist games">            
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-5" id="GamesListContainer2"
     data-sortfilter="2"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1">
    <div class="games-list-header games-filter-changer">
            <h3>Top Favorite</h3>

    </div>
    <div class="show-in-multiview-mode-only">
        <div class="see-all-button games-filter-changer btn-medium btn-neutral rbx-btn-secondary-xs btn-more">
            See All
        </div>
    </div>

    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                    <ul class="hlist games"></ul>
            </div>

            <div class="scroller prev hidden">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-left"></span>
                    
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-right"></span>
                </div>
            </div>
        </div>

        <ul class="hlist games">            
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-6" id="GamesListContainer9"
     data-sortfilter="9"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1">
    <div class="games-list-header games-filter-changer">
            <h3>Top Paid</h3>

    </div>
    <div class="show-in-multiview-mode-only">
        <div class="see-all-button games-filter-changer btn-medium btn-neutral rbx-btn-secondary-xs btn-more">
            See All
        </div>
    </div>

    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                    <ul class="hlist games"></ul>
            </div>

            <div class="scroller prev hidden">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-left"></span>
                    
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-right"></span>
                </div>
            </div>
        </div>

        <ul class="hlist games">            
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-7" id="GamesListContainer14"
     data-sortfilter="14"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1">
    <div class="games-list-header games-filter-changer">
            <h3>Builders Club</h3>

    </div>
    <div class="show-in-multiview-mode-only">
        <div class="see-all-button games-filter-changer btn-medium btn-neutral rbx-btn-secondary-xs btn-more">
            See All
        </div>
    </div>

    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                    <ul class="hlist games"></ul>
            </div>

            <div class="scroller prev hidden">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-left"></span>
                    
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                        <span class="rbx-icon-games-carousel-right"></span>
                </div>
            </div>
        </div>

        <ul class="hlist games">            
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>


            <!-- on page search results container-->
            <div class="games-list-container hidden search-results-container" id="SearchResultsContainer">
                <div class="games-list-header">
                    <h3>Results for <span class="search-query-text"></span></h3>
                </div>
                <div class="games-list">
                    <ul class="list-item games"></ul>
                    <div class="abp-spacer "></div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {

        Roblox.SearchBox = {};
        Roblox.SearchBox.Resources = {
            //<sl:translate>
            search: "Search",
            zeroResults: "No Search Results Found"
            //</sl:translate>
        };
        Roblox.GamesPageContainerBehavior.Resources = {
            //<sl:translate>
            pageTitle: "Games - ROBLOX"
            //</sl:translate>
        };

        var defaultGamesListsCsv = "1,8,11,16,3";
        Roblox.GamesPageContainerBehavior.FilterValueToGamesListsIdSuffixMapping = {"default": defaultGamesListsCsv.split(',')};

        Roblox.GamesPageContainerBehavior.IsUserLoggedIn = <?=$loggedin?>;
        Roblox.GamesPageContainerBehavior.adRefreshRateMilliSeconds = 3000;
        Roblox.GamesPageContainerBehavior.DeviceTypeId = 1;
        Roblox.GamesPageContainerBehavior.isCreateNewAd = true;
        Roblox.GamesPageContainerBehavior.setIntervalId = null;
        Roblox.GamesListBehavior.RefreshAdsInGamesPageEnabled = true;
        Roblox.GamesListBehavior.isUserEligibleForMultirowFirstSort = false;

    })

</script>

            
        </div>
            </div> 




<footer class="container-footer">
    <div class="footer">
        <ul class="row footer-links">
                <li class="col-xs-4 col-sm-2 footer-link">
                    <a href="//corp.roblox.com" class="roblox-interstitial" target="_blank">
                        <h2>About Us</h2>
                    </a>
                </li>
                <li class="col-xs-4 col-sm-2 footer-link">
                    <a href="//corp.roblox.com/jobs" class="roblox-interstitial" target="_blank">
                        <h2>Jobs</h2>
                    </a>
                </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="//blog.roblox.com" target="_blank">
                    <h2>Blog</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="/Info/Privacy.aspx" target="_blank">
                    <h2>Privacy</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="//corp.roblox.com/parents" class="roblox-interstitial" target="_blank">
                    <h2>Parents</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="//en.help.roblox.com/" class="roblox-interstitial" target="_blank">
                    <h2>Help</h2>
                </a>
            </li>
        </ul>
        <p class="footer-note">
            ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a target="_blank" href="//corp.roblox.com" class="rbx-link roblox-interstitial">ROBLOX Corporation</a>, ©2015.
            Patents pending. ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
            Use of this site signifies your acceptance of the <a href="/info/terms-of-service" target="_blank" class="rbx-link">Terms and Conditions</a>.
        </p>
        
    </div>
</footer>


</div> 



    <script type="text/javascript">function urchinTracker() {}</script>


<div id="PlaceLauncherStatusPanel" style="display:none;width:300px"
     data-new-plugin-events-enabled="True"
     data-event-stream-for-plugin-enabled="True"
     data-event-stream-for-protocol-enabled="True"
     data-is-protocol-handler-launch-enabled="False"
     data-is-user-logged-in="<?=$loggedin?>"
     data-os-name="Unknown"
     data-protocol-name-for-client="roblox-player"
     data-protocol-name-for-studio="watrbx-studio"
     data-protocol-url-includes-launchtime="true"
     data-protocol-detection-enabled="true">
    <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
        <div id="Spinner" class="Spinner" style="padding:20px 0;">
            <img src="/images/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress" />
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
            <img src="/images/Logo/logo_meatball.svg" width="90" height="90" alt="R" />
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                ROBLOX is now loading. Get ready to play!
            </p>
            <div class="ph-startingdialog-spinner-row">
                <img src="/images/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24" />
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
            <img src="/images/Logo/logo_meatball.svg" width="90" height="90" alt="R" />
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
        Check <b>Remember my choice</b> and click <img src="/images/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application" />  in the dialog box above to join games faster in the future!
    </p>
</div>


    <div id="videoPrerollPanel" style="display:none">
        <div id="videoPrerollTitleDiv">
            Gameplay sponsored by:
        </div>
        <div id="videoPrerollMainDiv"></div>
        <div id="videoPrerollCompanionAd"></div>
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
    <script type="text/javascript">
        $(function () {
            if (Roblox.VideoPreRoll) {
                Roblox.VideoPreRoll.showVideoPreRoll = false;
                Roblox.VideoPreRoll.isPrerollShownEveryXMinutesEnabled = true;
                Roblox.VideoPreRoll.loadingBarMaxTime = 33000;
                Roblox.VideoPreRoll.videoOptions.key = "robloxcorporation"; 
                    Roblox.VideoPreRoll.videoOptions.categories = "AgeUnknown,GenderUnknown";
                                     Roblox.VideoPreRoll.videoOptions.id = "games";
                Roblox.VideoPreRoll.videoLoadingTimeout = 11000;
                Roblox.VideoPreRoll.videoPlayingTimeout = 41000;
                Roblox.VideoPreRoll.videoLogNote = "NotWindows";
                Roblox.VideoPreRoll.logsEnabled = true;
                Roblox.VideoPreRoll.excludedPlaceIds = "32373412";
                Roblox.VideoPreRoll.adTime = 15;
                    
                Roblox.VideoPreRoll.specificAdOnPlacePageEnabled = true;
                Roblox.VideoPreRoll.specificAdOnPlacePageId = 192800;
                Roblox.VideoPreRoll.specificAdOnPlacePageCategory = "stooges";
                
                                    
                Roblox.VideoPreRoll.specificAdOnPlacePage2Enabled = true;
                Roblox.VideoPreRoll.specificAdOnPlacePage2Id = 2370766;
                Roblox.VideoPreRoll.specificAdOnPlacePage2Category = "lego";
                
                $(Roblox.VideoPreRoll.checkEligibility);
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
                <a href="/?returnUrl=http%3A%2F%2Fwww.roblox.com%2Fgames"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="https://www.roblox.com/newlogin?returnUrl=http%3A%2F%2Fwww.roblox.com%2Fgames">I have an account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkRobloxInstall() {
                 window.location = '/install/unsupported.aspx'; return false;
    }

</script>

<style>
    #win_firefox_install_img .activation {
    }

    #win_firefox_install_img .installation {
        width: 869px;
        height: 331px;
    }

    #mac_firefox_install_img .activation {
    }

    #mac_firefox_install_img .installation {
        width: 250px;
    }

    #win_chrome_install_img .activation {
    }

    #win_chrome_install_img .installation {
    }

    #mac_chrome_install_img .activation {
        width: 250px;
    }

    #mac_chrome_install_img .installation {
    }
</style>
<div id="InstallationInstructions" class="modalPopup blueAndWhite" style="display:none;overflow:hidden">
    <a id="CancelButton2" onclick="return Roblox.Client._onCancel();" class="ImageButton closeBtnCircle_35h ABCloseCircle"></a>
    <div style="padding-bottom:10px;text-align:center">
        <br /><br />
    </div>
</div>



<div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
<iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>

<script type='text/javascript' src='/js/6077529ce969aded942c2ec9b40c91c0.js'></script>

<script type="text/javascript">
    Roblox.Client._skip = '/install/unsupported.aspx';
    Roblox.Client._CLSID = '';
    Roblox.Client._installHost = '';
    Roblox.Client.ImplementsProxy = false;
    Roblox.Client._silentModeEnabled = false;
    Roblox.Client._bringAppToFrontEnabled = false;
    Roblox.Client._currentPluginVersion = '';
    Roblox.Client._eventStreamLoggingEnabled = false;

        
        Roblox.Client._installSuccess = function() {
            if(GoogleAnalyticsEvents){
                GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
                GoogleAnalyticsEvents.FireEvent(['Plugin','Install Success']);
                if (Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
                    Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
                }
            }
        }
        
    </script>


<div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle="confirmation" style="display:none;">
    <a class="genericmodal-close ImageButton closeBtnCircle_20h"></a>
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div class="TopBody">
            <div class="ImageContainer roblox-item-image" data-image-size="small" data-no-overlays data-no-click>
                <img class="GenericModalImage" alt="generic image" />
            </div>
            <div class="Message"></div>
        </div>
        <div class="ConfirmationModalButtonContainer GenericModalButtonContainer">
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



<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.jsConsoleEnabled = false;
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


    
    <script type='text/javascript' src='/js/c88a84ec42b8c3034db5c52aec9320cb.js'></script>


    
            <script type='text/javascript' src='/js/822491cace41a2d39fd76db6cfd17800.js'></script>


    
    <script type='text/javascript'>
        Roblox.config.externalResources = [];
        Roblox.config.paths['Pages.Catalog'] = '/js/1612c57544c7977e19cd15c824f7ecc3.js';
        Roblox.config.paths['Pages.CatalogShared'] = '/js/209f2b781ea84e8d0332648ddf547d57.js';
        Roblox.config.paths['Pages.Messages'] = '/js/e8cbac58ab4f0d8d4c707700c9f97630.js';
        Roblox.config.paths['Resources.Messages'] = '/js/fb9cb43a34372a004b06425a1c69c9c4.js';
        Roblox.config.paths['Widgets.AvatarImage'] = '/js/bbaeb48f3312bad4626e00c90746ffc0.js';
        Roblox.config.paths['Widgets.DropdownMenu'] = '/js/7b436bae917789c0b84f40fdebd25d97.js';
        Roblox.config.paths['Widgets.GroupImage'] = '/js/33d82b98045d49ec5a1f635d14cc7010.js';
        Roblox.config.paths['Widgets.HierarchicalDropdown'] = '/js/fbb86cf0752d23f389f983419d3085b4.js';
        Roblox.config.paths['Widgets.ItemImage'] = '/js/8babd891cf420dfe3999b3824a0154cb.js';
        Roblox.config.paths['Widgets.PlaceImage'] = '/js/f2697119678d0851cfaa6c2270a727ed.js';
        Roblox.config.paths['Widgets.SurveyModal'] = '/js/d6e979598c460090eafb6d38231159f6.js';
        </script>

    
    <script>
        Roblox.XsrfToken.setToken('9n2NSXwdEIba');
    </script>

        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>
    <script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>
    

<script type="text/javascript">
    $(function(){
        function trackReturns() {
            function dayDiff(d1, d2) {
                return Math.floor((d1-d2)/86400000);
            }
            if (!localStorage) {
                return false;
            }

            var cookieName = 'RBXReturn';
            var cookieOptions = {expires:9001};
            var cookieStr = localStorage.getItem(cookieName) || "";
            var cookie = {};

            try {
                cookie = JSON.parse(cookieStr);
            } catch (ex) {
                // busted cookie string from old previous version of the code
            }

            try {
                if (typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
                    localStorage.setItem(cookieName, JSON.stringify({ ts: new Date().toDateString() }));
                    return false;
                }
            } catch (ex) {
                return false;
            }

            var daysSinceFirstVisit = dayDiff(new Date(), new Date(cookie.ts));
            if (daysSinceFirstVisit == 1 && typeof cookie.odr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_odr', {});
                cookie.odr = 1;
            }
            if (daysSinceFirstVisit >= 1 && daysSinceFirstVisit <= 7 && typeof cookie.sdr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_sdr', {});
                cookie.sdr = 1;
            }
            try {
                localStorage.setItem(cookieName, JSON.stringify(cookie));
            } catch (ex) {
                return false;
            }
        }

        GoogleListener.init();


    
        RobloxEventManager.initialize(true);
        RobloxEventManager.triggerEvent('rbx_evt_pageview');
        trackReturns();
        

    
        RobloxEventManager._idleInterval = 450000;
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_start');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_ftp');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_success');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_fmp');
        RobloxEventManager.startMonitor();
        

    });

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

    
    <script type='text/javascript' src='/js/6d4970669ca462f1dd461457bb03d614.js'></script>

</body>
</html>
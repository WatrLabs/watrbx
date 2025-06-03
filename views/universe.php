<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\router\Routing;
use watrlabs\authentication;

$router = new Routing();
$auth = new authentication();
$pagebuilder = new pagebuilder();

$ismobile = false;

$useragent = $_SERVER['HTTP_USER_AGENT'];

if(strpos($useragent, "Android")){
    $ismobile = true;
}

$auth->requiresession();

global $db;

$query = $db->table("universes")->where("id", $id);
$gameinfo = $query->first();

if($gameinfo == null){
    die($router->return_status(404));

} else {
    $query = $db->table("assets")->where("id", $id);
    $assetinfo = $query->first();

    if($assetinfo == null){
        die("Failed to find asset!");
    }
    $creator = $auth->getuserbyid($gameinfo->owner);

    $upvotes = $db->table("likes")->where("assetid", $id)->where("vote", 1)->count();
    $downvotes = $db->table("likes")->where("assetid", $id)->where("vote", 0)->count();
}

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=leanbase___213b3e760be9513b17fafaa821f394bf_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___d4017b16ecf1d5724f4f7fadc30e304b_m.css');
$pagebuilder->addresource('jsfiles', '/js/2580e8485e871856bb8abe4d0d297bd2.js.gzip');
$pagebuilder->set_page_name($gameinfo->title);

if(isset($_COOKIE["_ROBLOSECURITY"]) && $auth->hasaccount()){
    $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);
}

$pagebuilder->buildheader();

?>


<div class="content  ">

                                        <div id="Leaderboard-Abp" class="abp leaderboard-abp">
                    

    <iframe allowtransparency="true"
            frameborder="0"
            height="110"
            scrolling="no"
            src="/userads/1"
            width="728"
            data-js-adtype="iframead"></iframe>

                </div>
            
<div class="row page-content  ">
    <div class="col-xs-12 section game-main-content">
        <div class="game-thumb-container">
            <script>
    var Roblox = Roblox || {};
    Roblox.Carousel = function () {
        var carouselId = "#rbx-carousel";
        var checkedForVideo = false;
        var isMobile = true;

        var initialize = function () {
            // acquire isMobile setting from DOM
            isMobile = $('#rbx-carousel').data('is-mobile');

            // set up carousel
            if(!isMobile) {
                $(carouselId).carousel({
                    interval: 5000,
                    pause: "hover"
                });
            } else {
                // do not cycle automatically on mobile because user might be playing video
                $(carouselId).carousel({
                    interval: false,
                    pause: "hover"
                });
            }


            // bindings
            $(carouselId)
                .on("slide.bs.carousel", function () {
                    // pause ALL the videos
                    Roblox.Carousel.pauseAllVideos();
                    // restart the carousel sliding
                    $(carouselId).carousel('cycle');
                })
                .hover(
                    function () {
                        $(this).addClass("hover");
                    },
                    function () {
                        $(this).removeClass("hover");
                    }
                );

            // hide controls when there's only one slide
            if ($(carouselId+ " .carousel-indicators li").length < 2) {
                $(carouselId).find(".carousel-control, .carousel-indicators").css("display", "none");
            }

            $(document).on("playButton:gamePlayIntent", function () {
                // we pressed the play button - stop playing the video
                Roblox.Carousel.pauseAllVideos();
            });

            Roblox.Carousel.setUpYouTubeAPI();

            // retry thumbnails in carousel
            $(function () {
                $("#rbx-carousel .item span").loadRobloxThumbnails();
            });
        }

        var setUpYouTubeAPI = function () {
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


        }

        var toggleVideo = function (state) {
            var div = $('.flex-video');
            if(div.length > 0){
                var iframe = div.find('iframe')[0].contentWindow;
                var func = state == 'hide' ? 'pauseVideo' : 'playVideo';
                iframe.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
            }
        }

        var pauseVideoAtIndex = function (idx) {
            if (rbxplayer && rbxplayer.length > 0 && !isMobile) {
                try {
                    rbxplayer[idx].pauseVideo();
                } catch (e) {
                    // tried to pause before player was ready
                }

            } else {
                return false;
            }
        }

        var playVideoAtIndex = function (idx) {
            if(rbxplayer && rbxplayer.length > 0 && rbxplayer[idx] && !isMobile) {
                rbxplayer[idx].playVideo();
                return true;
            } else {
                return false;
            }
        }

        var pauseAllVideos = function () {
            // pause ALL the videos
            if (rbxplayer && rbxplayer.length > 0) {
                var rbxplayerlen = rbxplayer.length;
                for (var i = 0; i < rbxplayerlen; i++) {
                    Roblox.Carousel.pauseVideoAtIndex(i);
                }
            }
        }

        var checkForVideo = function () {
            if(checkedForVideo) {
                return false;
            }
            var carousel = $(carouselId);
            carousel.find('.item').each(function (idx, val) {
                if ($(val).find('.flex-video').length > 0) {
                    carousel.carousel(idx);
                    carousel.carousel("pause");
                    var successfulPlay = Roblox.Carousel.playVideoAtIndex(0);
                    checkedForVideo = successfulPlay;
                    return false; // stop
                } else {
                    return true; // keep going
                }
            });
        }
        var onPlayerReady = function () {
            // This first moment get the video and auto-play it
            var autoplay = $('#rbx-carousel').data('is-video-autoplayed-on-ready');
            if (autoplay && !isMobile) {
                Roblox.Carousel.checkForVideo();
            }
        }
        var onPlayerPlaying = function () {
            // We are playing the video. Stop the carousel.
            var carousel = $(carouselId);
            carousel.carousel("pause");
        }


        return {
            initialize: initialize,
            toggleVideo: toggleVideo,
            checkForVideo: checkForVideo,
            setUpYouTubeAPI: setUpYouTubeAPI,
            onPlayerReady: onPlayerReady,
            onPlayerPlaying: onPlayerPlaying,
            pauseVideoAtIndex: pauseVideoAtIndex,
            playVideoAtIndex: playVideoAtIndex,
            pauseAllVideos: pauseAllVideos
        }

    }();

    // For YouTube API. Must be global.

    var rbxplayer = [];
    function onYouTubeIframeAPIReady() {
        var carouselId = "#rbx-carousel";
        $(carouselId).find(".flex-video").each(function (idx, el) {
            youTubeId = $(el).find("iframe").attr("id");
            rbxplayer[rbxplayer.length] = new YT.Player(youTubeId, {});
        });

        // listen for postMessage from YouTube
        $(window).on("message", function (e) {
            var originalData = e.originalEvent.data;

            // data is not JSON
            if (originalData.charAt(0) != "{") {
                return ;
            }
            var data = $.parseJSON(originalData);

            if (data.event == "onReady") {
                Roblox.Carousel.onPlayerReady();
            }
            if(data.event == "infoDelivery" && data.info.playerState && data.info.playerState == 1) {
                Roblox.Carousel.onPlayerPlaying();
            }
        });
    }


    $(document).ready(function () {
        Roblox.Carousel.initialize();
    });
</script>



<div id="rbx-carousel" class="rbx-carousel carousel slide" data-ride="carousel"
     data-is-video-autoplayed-on-ready="true"
     data-is-mobile="true">
    <!-- Indicators -->
    <ol class="carousel-indicators">

            <li data-target="#rbx-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#rbx-carousel" data-slide-to="1" class=""></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">


            <div class="item active">
<span ><img  class='CarouselThumb' src='/images/defaultwide.png' /></span>                    <div class="carousel-caption">
                    </div>


            </div>

    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#rbx-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left rbx-icon-carousel-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#rbx-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right rbx-icon-carousel-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>


        </div>
        <div class="game-calls-to-action">


            <h1 class="rbx-para-overflow game-name" title="<?=$gameinfo->title?>"><?=$gameinfo->title?></h1>
            <h4 class="game-creator"><span>By</span> <a class="rbx-link" href="/users/<?=$creator->id?>/profile"><?=$creator->username?></a></h4>
            <div class="game-play-buttons" data-autoplay="false">



            
                
            <?php
                if($ismobile){
                    echo '<a class="rbx-btn-primary-lg" onclick="location.href=\'games/start?placeid='.$id.'\'">Play</a>';
                } else {
                    echo '<div id="MultiplayerVisitButton" class="VisitButton VisitButtonPlayPH" placeid="'.$id.'" data-action="play" data-is-membership-level-ok="true"><a class="rbx-btn-primary-lg">Play</a> </div>';        
                }
            ?>
           



<script type="text/javascript">
    Roblox = Roblox || {};

    Roblox.BCUpsellModal = function () {
        var resources = {
            //<sl:translate>
            title: "Builders Club Only",
            body: "This is a premium feature only available to our Builders Club members.",
            accept: "Upgrade Now"
            //</sl:translate>
        };

        var open = function () {
            var options = {
                titleText: Roblox.BCUpsellModal.Resources.title,
                bodyContent: Roblox.BCUpsellModal.Resources.body,
                footerText: "",
                acceptText: Roblox.BCUpsellModal.Resources.accept,
                declineText: Roblox.Resources.GenericConfirmation.No,
                acceptColor: Roblox.GenericConfirmation.green,
                onAccept: function () { window.location.href = '/premium/membership?ctx=bc-only-game'; },
                imageUrl: '/images/43ac54175f3f3cd403536fedd9170c10.png'
            };

            Roblox.GenericConfirmation.open(
                options
            );
        };

        return {
            open: open,
            Resources:resources
        };
    } ();
</script>
<script type="text/javascript">
    $(function() {
        Roblox.PlaceItemPurchase = new Roblox.ItemPurchase(function (obj) {
            $(".PurchaseButton[data-item-id="+ obj.AssetID +"]").each(function (index, htmlElem) {
                $("#rbx-place-purchase-required").hide();
                $("#MultiplayerVisitButton").show();
            });
        });

        if("False".toLowerCase() == "true") {
            $(function () {
                $("#rbx-place-purchase-required").on("click", function(e) {
                    Roblox.PlaceItemPurchase.openPurchaseVerificationView(this);
                    return false;
                });
            });
        }
    });
</script>
            </div>


            <ul class="share-rate-favorite">
                

        <li class="favorite-button-container rbx-tooltip" data-toggle="tooltip" title="" data-original-title="Add this game to favorites">
            <a>
                
                <span class="rbx-icon-favorite " data-toggle-url="/favorite/toggle" data-assetid="<?=$id?>" data-isguest="False"
                      data-signin-url="/newlogin?returnUrl=%2Fgames%2F<?=$id?>%2FWork-at-a-Pizza-Place">
                    
                </span>
                <span title="0" class="favoriteCount 0" id="result">0</span>
            </a>
        </li>
 
                
        <li class="voting-panel body"
             data-asset-id="<?=$id?>"
             data-total-up-votes="<?=$upvotes?>"
             data-total-down-votes="<?=$downvotes?>"
             data-vote-modal=""
             data-user-authenticated="<? if($auth->hasaccount()){ echo "true"; } else { echo "false"; }?>">
            <div class="loading"></div>
                <div class="vote-summary">
                    <div class="voting-details">
                        <div class="users-vote ">
                            <div class="upvote">
                                <span class="rbx-icon-like "></span>
                                <span id="vote-up-text" title="<?=$upvotes?>" class="vote-text"><?=$upvotes?></span>
                            </div>
                            <div class="downvote">
                                <span id="vote-down-text" title="<?=$downvotes?>" class="vote-text"><?=$downvotes?></span>
                                <span class="rbx-icon-dislike "></span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="visual-container">
                        <div class="background"></div>
                        <div class="percent"></div>
                    </div>
                </div>
        </li>




<script>
    $(function () {
        Roblox.Voting.Initialize();

        Roblox.Voting.Resources = {
            //<sl:translate>
            emailVerifiedTitle: "Verify Your Email",
            emailVerifiedMessage: "You must verify your email before you can vote. You can verify your email on the <a href='/my/account?confirmemail=1'>Account</a> page.",

            playGameTitle: "Play Game",
            playGameMessage: "You must play the game before you can vote on it.",

            useModelTitle: "Use Model",
            useModelMessage: "You must use this model before you can vote on it.",

            installPluginTitle: "Install Plugin",
            installPluginMessage: "You must install this plugin before you can vote on it.",

            buyGamePassTitle: "Buy Game Pass",
            buyGamePassMessage: "You must own this game pass before you can vote on it.",

            floodCheckThresholdMetTitle: "Slow Down",
            floodCheckThresholdMetMessage: "You're voting too quickly. Come back later and try again.",

            unknownProblemTitle: "Something Broke",
            unknownProblemMessage: "There was an unknown problem voting. Please try again.",

            guestUserTitle: "Login to Vote",
            guestUserMessage: "<div>You must login to vote.</div> <div>Please <a href='/newlogin?returnUrl=%2Fgames%2F<?=$id?>%2FWork-at-a-Pizza-Place'>login or register</a> to continue.</div>",
            returnUrl: '/newlogin?returnUrl=%2Fgames%2F<?=$id?>%2FWork-at-a-Pizza-Place',

            accountUnderOneDayTitle: "Voter Feedback",
            accountUnderOneDayMessage: "You will be able to vote on Games and Studio Models later, after you've had a chance to experience ROBLOX a bit more. Come back to this page in a couple days.",

            accept: "Verify",
            decline: "Cancel",
            login: "Login"
            //<sl:translate>
        };
    });
</script>

                
                <li class="social-media-share">

                </li><!-- .social-media-share -->
            </ul><!-- .share-rate-favorite-->
        </div>
    </div>

    <div class="col-xs-12 rbx-tabs-horizontal"
         data-place-id="<?=$id?>">
        <ul id="horizontal-tabs" class="nav nav-tabs" role="tablist">
            <li id="tab-about" class="rbx-tab tab-about active">
                <a class="rbx-tab-heading" href="#about">
                    <span class="rbx-lead">About</span>
                </a>
            </li>
            <li id="tab-store" class="rbx-tab tab-store">
                <a class="rbx-tab-heading" href="#store">
                    <span class="rbx-lead">Store</span>
                </a>
            </li>
                <li id="tab-leaderboards" class="rbx-tab tab-leaderboards">
                    <a class="rbx-tab-heading" href="#leaderboards">
                        <span class="rbx-lead">Leaderboards</span>
                    </a>
                </li>

            <li id="tab-game-instances" class="rbx-tab tab-game-instances">
                <a class="rbx-tab-heading" href="#game-instances">
                    <span class="rbx-lead">Servers</span>
                </a>
            </li>
        </ul>
        <div class="tab-content rbx-tab-content">
            <div class="tab-pane active" id="about">
                <div class="section game-about-container">
                    <h3>Description</h3>
                    <p class="game-description linkify"><?=$gameinfo->description?></p>

                    <ul class="game-stats-container">
                        <li class="game-stat">
                            <p class="stat-title">Visits</p>
                            <p class="rbx-lead" title="0">0</p>
                        </li>
                        <li class="game-stat">
                            <p class="stat-title">Created</p>
                            <p class="rbx-lead"><?=date("n/j/Y", $assetinfo->created);?></p>
                        </li>
                        <li class="game-stat">
                            <p class="stat-title">Updated</p>
                            <p class="rbx-lead"><?=date("n/j/Y", $assetinfo->updated);?></p>
                        </li>
                        <li class="game-stat">
                            <p class="stat-title">Max Players</p>
                            <p class="rbx-lead"><?=$gameinfo->maxplayers?></p>
                        </li>
                        <li class="game-stat">
                            <p class="stat-title">Genre</p>
                                <p class="rbx-lead">
                                    <a class="rbx-link" href="/games?GenreFilter=7">Town and City</a>
                                </p>
                        </li>
                        <li class="game-stat">
                            <p class="stat-title">Allowed Gear types</p>
                            <p class="rbx-lead stat-gears">
        <span class="rbx-icon-nogear" data-toggle="tooltip" data-original-title="No Gear Allowed"></span>


                            </p>
                        </li>
                    </ul>
                    <div class="game-stat-footer">
                                <span class="game-copylocked-footnote">This game is copylocked</span>

                        <span class="game-report-abuse"><a class="rbx-text-danger" href="/abusereport/asset?id=<?=$id?>&amp;RedirectUrl=%2fgames%2f<?=$id?>%2fWork-at-a-Pizza-Place">Report Abuse</a></span>
                    </div>
                </div>

    

<?php
    if($gameinfo->privateserverenabled == 1){
        $pagebuilder->get_snippet("can_vipserver", array("gameinfo"=>$gameinfo));
    } else {
        $pagebuilder->get_snippet("cannot_vipserver");
    }
?>
<script>
    var Roblox = Roblox || {};

    Roblox.PrivateServers = Roblox.PrivateServers || {};
    //<sl:translate>
    Roblox.PrivateServers.RenewRecurringTitle = "Renew Private Server";
    Roblox.PrivateServers.RenewRecurringBody = "Are you sure you want to enable future payments for your private VIP version of "
    + "<?=$gameinfo->title?> by <?=$creator->username?>?<br><br>This VIP Server will start renewing every month at "
    + "<span class=\"currency CurrencyColor1\"><?=$gameinfo->privateserverprice?></span> until you cancel.";
    Roblox.PrivateServers.RenewRecurringAcceptText = "Renew Private Server";
    Roblox.PrivateServers.RenewRecurringDeclineText = "Back";
    Roblox.PrivateServers.UserProfileAbsoluteUrlPattern = "/users/0/profile";
    //<sl:translate>
</script>


    <div class="container-list badge-container">
        <div class="container-header">
            <h3>Game Badges</h3>
        </div>
        <ul class="badge-list">
                <li class="section-row badge-row ">
                    <div class="badge-image">
                        <a href="/Supplier-item?id=176685667"><img src="/temp/c6c2aa2e0cd9fa44f9c9bb39c0d3cabc.png" alt="Supplier"></a>
                    </div>
                    <div class="badge-data-container">
                        <strong>Supplier</strong>
                        <p>
                            placeholder badge (stolen from work at a pizza place)
                        </p>
                    </div>
                    <ul class="badge-stats-container">
                        <li>
                             Rarity: 0.00% (Impossible)
                        </li>
                        <li>
                            Won Yesterday: 0
                        </li>
                        <li>
                            Won Ever: 0
                        </li>
                    </ul>
                </li>
            <!-- <li>
                <button type="button" class="btn-full-width rbx-btn-control-sm" id="badges-see-more">See More</button>

            </li> -->
        </ul>

    </div>

                
<div class="section">
    <div id="AjaxCommentsContainer" class="comments-container"
         data-asset-id="<?=$id?>"
         data-total-collection-size=""
         data-is-user-authenticated="True"
         data-signin-url="https://www.watrbx.xyz/newlogin?returnUrl=%2Fgames%2F<?=$id?>%2FWork-at-a-Pizza-Place">
        <h3>Comments</h3>
        <div class="AddAComment">
            <div class="comment-form">
                <div class="Avatar roblox-avatar-image" data-user-id="<?=$userinfo->id?>" data-image-size="small"></div>

                <form class="rbx-form-horizontal ng-pristine ng-valid" role="form">
                    <div class="rbx-form-group">
                        <textarea class="form-control rbx-input-field rbx-comment-input blur" placeholder="Write a comment!" rows="1"></textarea>
                        <div class="rbx-comment-msgs">
                            <span class="rbx-comment-error rbx-text-danger"></span>
                            <span class="rbx-comment-count rbx-text-notes"></span>
                        </div>
                    </div>
                    <button type="button" class="rbx-btn-secondary-sm rbx-post-comment">Post Comment</button>
                </form>
            </div>
            <div class="comments vlist">

            </div>
            <div class="comments-item-template">
                <div class="comment-item list-item">
                    <div class="comment-user list-header">
                        <div class="Avatar" data-user-id="comment-author-id" data-image-size="small"></div>
                    </div>
                    <div class="comment-body list-body">
                        <strong>username</strong>
                        <p class="comment-content list-content"> text </p>
                        <span class="rbx-text-notes">4 hours ago</span>
                    </div>
                    <div class="comment-controls">
                        <a class="rbx-comment-report-link" href="/abusereport/comment?id=%CommentID&amp;redirectUrl=%PageURL" title="Report Abuse"><span class="rbx-icon-flag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="AjaxCommentsMoreButtonContainer">
        <button type="button" class="rbx-btn-control-sm rbx-comments-see-more hidden">See More</button>
    </div>
</div>
<script>
    $(document).ready(function () {
        Roblox.Comments.Resources = {
            //<sl:translate>
            defaultMessage: 'Write a comment!',
            noCommentsFound: 'No comments found.',
            moreComments: 'More comments',
            sorrySomethingWentWrong: 'Sorry, something went wrong.',
            charactersRemaining: ' characters remaining',
            emailVerifiedABTitle: 'Verify Your Email',
            emailVerifiedABMessage: "You must verify your email before you can comment. You can verify your email on the <a href='/my/account?confirmemail=1'>Account</a> page.",
            linksNotAllowedTitle: 'Links Not Allowed',
            linksNotAllowedMessage: 'Comments should be about the item or place on which you are commenting. Links are not permitted.',
            accept: 'Verify',
            decline: 'Cancel',
            tooManyCharacters: 'Too many characters!',
            tooManyNewlines: 'Too many newlines!'
            //</sl:translate>
        };
    
        Roblox.Comments.Limits =
        [
            {
                limit: '10',
                character: "\n",
                message: Roblox.Comments.Resources.tooManyNewlines
            },
            {
                limit: '200',
                character: undefined,
                message: Roblox.Comments.Resources.tooManyCharacters
            }
        ];

        Roblox.Comments.FilterIsEnabled = true;
        Roblox.Comments.FilterRegex = "(([a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}[:\\#/\?]+)|([a-zA-Z0-9]\\.[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}))";
        Roblox.Comments.FilterCleanExistingComments = false ;


    
    Roblox.Comments.initialize();
    });
</script>

                
                    <div id="my-recommended-games" class="col-xs-12 container-list games-detail">
                        <div class="container-header">
                            <h3>Recommended Games</h3>
                        </div>
                        
                        

<ul class="hlist game-list">

<?php
                    global $db;

                    $query = $db
                        ->table("universes")
                        ->where("public", 1)
                        ->whereNot("id", $id)
                        ->limit(6)
                        ->orderBy($db->Raw("RAND()"));

                    $allgames = $query->get();

                    foreach ($allgames as $game) {
                        echo $pagebuilder->build_component("game", [
                            "game" => $game,
                        ]);
                    }
                    ?>
</ul>
                    </div>
            </div>

            <div class="tab-pane store" id="store">


                

<div id="rbx-game-passes" class="container-list game-dev-store game-passes">
    <div class="container-header">
        <h3>Passes for this game</h3>
    </div>
    <ul id="rbx-passes-container" class="hlist gear-passes-container">
            <li class="list-item">
                <div class="rbx-item-card">
                    <a href="/item/0/pontoon-boat" class="gear-passes-asset" ><img  class='' src='/temp/7e5cc4a7be93dd107e22ceaa3d193dcc.png' /></a>
                    <div class="rbx-caption">
                        <p>
                            <strong title="Pontoon Boat">Pontoon Boat</strong>
                        </p>

                        <div class="rbx-item-price">
                            <span class="rbx-icon-robux"></span>
                            <h4 class="rbx-price-robux">50</h4>
                        </div>

                        <div class="rbx-item-buy">
                                <button class="PurchaseButton rbx-btn-buy-xs rbx-gear-passes-purchase"
                                        data-item-id="282349566"
                                        data-item-name="Pontoon Boat"
                                        data-product-id="25614652"
                                        data-expected-price="5"
                                        data-asset-type="Game Pass"
                                        data-bc-requirement="2"
                                        data-expected-seller-id="<?=$creator->id?>"
                                        data-seller-name="<?=$creator->username?>"
                                        data-expected-currency="1">
                                    <span>Buy</span>
                                </button>
                        </div>

                    </div>

                </div>
            </li>
            </ul>



</div>

<script>
    $(function () {
        Roblox.GamePassJSData = { };
        Roblox.GamePassJSData.PlaceID = <?=$id?>;

        var purchaseConfirmationCallback = function (obj) {
            var originalContainer = $('.PurchaseButton[data-item-id=' + obj.AssetID + ']').parent('.rbx-caption');
            originalContainer.find('.rbx-purchased').hide();
            originalContainer.find('.rbx-item-buy').show();

        };
        Roblox.GamePassItemPurchase = new Roblox.ItemPurchase(purchaseConfirmationCallback);

        $("#store #rbx-game-passes").on("click", ".PurchaseButton", function (e) {
            Roblox.PlaceProductPromotionItemPurchase.openPurchaseVerificationView($(this), 'game-pass');
        });

        $("#store #rbx-game-passes .btn-more").on("click", function (e) {
            $("#rbx-game-passes #rbx-passes-container").toggleClass("collapsed");
        });
    });
</script>


                


<input name="__RequestVerificationToken" type="hidden" value="hDNkld2EruvRVXqDEQNaFPzGItX81IUfYanv9O6L4RHE3s1dyoGfa0hhJjLKEKDaz5IZ8cHvFLyp8CLXSbIKJDuUo4ytRPoLg39gHFDpT7GtJ4H40" />

<script>
    // From DisplayProductPromotions
    $(function() {
        Roblox.PlaceProductPromotion.Resources = {
            //<sl:translate>
            anErrorOccurred: 'An error occurred, please try again.'
            , youhaveAdded: "You have added "
            , toYourGame: " to your game, "
            , youhaveRemoved: "You have removed "
            , fromYourGame: " from your game."
            , ok: "OK"
            , success: "Success!"
            , error: "Error"
            , sorryWeCouldnt: "Sorry, we couldn't remove the item from your game. Please try again."
            , notForSale: "This item is not for sale."
            , rent: "Rent"
            //<sl:translate>
        };

        var purchaseConfirmationCallback = function (obj) {
            var originalContainer = $('.PurchaseButton[data-item-id=' + obj.AssetID + ']').parent('.rbx-caption');
            originalContainer.find('.rbx-purchased').hide();
            originalContainer.find('.rbx-item-buy').show();
            
        };
        Roblox.PlaceProductPromotionItemPurchase = new Roblox.ItemPurchase(purchaseConfirmationCallback);
        Roblox.PlaceProductPromotion.PlaceID = <?=$id?>;

        $("#store").on("click", ".rbx-icon-delete", function(e) {
            var promoId = $(this).data('delete-promotion-id');
            Roblox.PlaceProductPromotion.DeleteGear(promoId);
        });

        $("#store #rbx-game-gear").on("click", ".PurchaseButton", function (e) {
            Roblox.PlaceProductPromotionItemPurchase.openPurchaseVerificationView($(this), 'game-gear');
        });

        $("#store #rbx-game-gear .btn-more").on("click", function (e) {
            $("#rbx-game-gear .rbx-gear-container").toggleClass("collapsed");
        });

    });

</script>

<div id="DeleteProductPromotionModal" class="PurchaseModal">
    <div id="simplemodal-close" class="simplemodal-close">
        <a></a>
    </div>
    <div class="titleBar" style="text-align: center">
    </div>
    <div class="PurchaseModalBody">
        <div class="PurchaseModalMessage">
            <div class="PurchaseModalMessageImage">
                <div class="thumbs-up-green">
                </div>
            </div>
            <div class="PurchaseModalMessageText">
            </div>
        </div>
        <div class="PurchaseModalButtonContainer">
            <div class="ImageButton btn-blue-ok-sharp simplemodal-close"></div>
        </div>
        <div class="PurchaseModalFooter"></div>
    </div>
</div>




            </div>

            <div class="tab-pane" id="leaderboards">
                
                    <div class="col-md-6">
                        

<div id="rbx-leaderboard-container-player" class="section rbx-leaderboard-container rbx-leaderboard-player" data-associated-leaderboard-more="rbx-leaderboard-btn-player">
    <div class="rbx-leaderboard-data"
         data-distributor-target-id="47545"
         data-max="20"
         data-rank-max="4"
         data-target-type="0"
         data-time-filter="1"
         data-player-id="<?=$userinfo->id?>"
         data-clan-id="-1"></div>
    <div class="rbx-leaderboard-item-template hidden">
        <div class="rbx-leaderboard-item">
            <div class="rank"></div>
            <div class="avatar"></div>
            <div class="name-and-group"></div>
            <div class="points"></div>
        </div>
    </div>
    <div class="rbx-popover-content" data-toggle="popover-leaderboard-player">
        <ul class="rbx-dropdown-menu" role="menu">
            <li>
                <a data-time-filter="0">Today</a>
            </li>
            <li>
                <a data-time-filter="1">Past Week</a>
            </li>
            <li>
                <a data-time-filter="2">Past Month</a>
            </li>
            <li>
                <a data-time-filter="3">All Time</a>
            </li>
        </ul>
    </div>
    <div class="rbx-leaderboard-header">
        <h3>Players</h3>
        <div class="rbx-leaderboard-controls">
            <div class="rbx-leaderboard-filter">
                <span class="rbx-leaderboard-filtername">Past Week</span>
                <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-leaderboard-player"
                   data-original-title="" title=""
                   data-viewport=".rbx-leaderboard-player"
                   data-placement="left"><span class="rbx-icon-sorting" id="rbx-leaderboard-popover-player"></span></a>
            </div>
        </div>

    </div>
    <div class="rbx-leaderboard-my"></div>
    <div class="rbx-leaderboard-items"></div>

</div>

<div class="rbx-leaderboard-more-container rbx-leaderboard-btn-player" data-associated-leaderboard="rbx-leaderboard-player">
    <button type=" button" class="rbx-btn-control-sm rbx-leaderboard-see-more hidden">
    See More</button>
</div>
    <script>
        var Roblox = Roblox || {};
        Roblox.Leaderboard = Roblox.Leaderboard || {};
        Roblox.Leaderboard.Resources = {};
        //<sl:translate>
        Roblox.Leaderboard.Resources.ErrorLoading = "Error loading rows.";
        Roblox.Leaderboard.Resources.Loading = "Loading...";
        Roblox.Leaderboard.Resources.GoGetPoints = "You are not yet ranked for this time period. Go earn some Points!";
        //</sl:translate>
    </script>

                    </div>
                    <div class="col-md-6">
                        

<div id="rbx-leaderboard-container-clan" class="section rbx-leaderboard-container rbx-leaderboard-clan" data-associated-leaderboard-more="rbx-leaderboard-btn-clan">
    <div class="rbx-leaderboard-data"
         data-distributor-target-id="47545"
         data-max="20"
         data-rank-max="4"
         data-target-type="1"
         data-time-filter="1"
         data-player-id="<?=$userinfo->id?>"
         data-clan-id="-1"></div>
    <div class="rbx-leaderboard-item-template hidden">
        <div class="rbx-leaderboard-item">
            <div class="rank"></div>
            <div class="avatar"></div>
            <div class="name-and-group"></div>
            <div class="points"></div>
        </div>
    </div>
    <div class="rbx-popover-content" data-toggle="popover-leaderboard-clan">
        <ul class="rbx-dropdown-menu" role="menu">
            <li>
                <a data-time-filter="0">Today</a>
            </li>
            <li>
                <a data-time-filter="1">Past Week</a>
            </li>
            <li>
                <a data-time-filter="2">Past Month</a>
            </li>
            <li>
                <a data-time-filter="3">All Time</a>
            </li>
        </ul>
    </div>
    <div class="rbx-leaderboard-header">
        <h3>Clans</h3>
        <div class="rbx-leaderboard-controls">
            <div class="rbx-leaderboard-filter">
                <span class="rbx-leaderboard-filtername">Past Week</span>
                <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-leaderboard-clan"
                   data-original-title="" title=""
                   data-viewport=".rbx-leaderboard-clan"
                   data-placement="left"><span class="rbx-icon-sorting" id="rbx-leaderboard-popover-clan"></span></a>
            </div>
        </div>

    </div>
    <div class="rbx-leaderboard-my"></div>
    <div class="rbx-leaderboard-items"></div>

</div>

<div class="rbx-leaderboard-more-container rbx-leaderboard-btn-clan" data-associated-leaderboard="rbx-leaderboard-clan">
    <button type=" button" class="rbx-btn-control-sm rbx-leaderboard-see-more hidden">
    See More</button>
</div>
    <script>
        var Roblox = Roblox || {};
        Roblox.Leaderboard = Roblox.Leaderboard || {};
        Roblox.Leaderboard.Resources = {};
        //<sl:translate>
        Roblox.Leaderboard.Resources.ErrorLoading = "Error loading rows.";
        Roblox.Leaderboard.Resources.Loading = "Loading...";
        Roblox.Leaderboard.Resources.GoGetPoints = "You are not yet ranked for this time period. Go earn some Points!";
        //</sl:translate>
    </script>

                    </div>

                <script>

                    // lazy load
                    $(".rbx-tab a[href='#leaderboards']").on('shown.bs.tab', function(e) {
                        // e.target newly activated tab
                        // e.relatedTarget previous active tab
                        Roblox.Leaderboard.init();
                    });
                </script>
            </div>

            <div class="tab-pane game-instances" id="game-instances">
                

    <?php
    if($gameinfo->privateserverenabled == 1){
        $pagebuilder->get_snippet("can_vipserver_instances", array("gameinfo"=>$gameinfo, "id"=>$id));
    } else {
        $pagebuilder->get_snippet("cannot_vipserver");
    }
?>

<script>
    var Roblox = Roblox || {};

    Roblox.PrivateServers = Roblox.PrivateServers || {};
    //<sl:translate>
    Roblox.PrivateServers.RenewRecurringTitle = "Renew Private Server";
    Roblox.PrivateServers.RenewRecurringBody = "Are you sure you want to enable future payments for your private VIP version of "
    + "<?=$gameinfo->title?> by <?=$creator->username?>?<br><br>This VIP Server will start renewing every month at "
    + "<span class=\"currency CurrencyColor1\"><?=$gameinfo->privateserverprice?></span> until you cancel.";
    Roblox.PrivateServers.RenewRecurringAcceptText = "Renew Private Server";
    Roblox.PrivateServers.RenewRecurringDeclineText = "Back";
    Roblox.PrivateServers.UserProfileAbsoluteUrlPattern = "/users/0/profile";
    //<sl:translate>
</script>

    
    <div id="rbx-running-games" class="container-list" data-placeid="<?=$id?>" data-showshutdown>
        <div class="container-header">
            <h3>Running Games</h3>
            <span class="rbx-btn-secondary-xs btn-more rbx-running-games-refresh">Refresh</span>
        </div>
        <ul id="rbx-game-server-item-container" class="rbx-game-server-item-container">
            
        </ul>
        <div class="rbx-running-games-footer">
                <button type="button" class="rbx-btn-control-xs btn-full-width rbx-running-games-load-more hidden">Load More</button>

        </div>
        <div class="rbx-game-server-template">
            <li class="section rbx-game-server-item">
                <div class="section-header">
                    <div class="link-menu rbx-game-server-menu"></div>
                </div>
                <div class="section-left rbx-game-server-details">
                    <div class="rbx-game-status rbx-game-server-status">x of y players max</div>
                    <div class="rbx-game-server-alert">
                        <span class="rbx-icon-remove"></span>Slow Game
                    </div>
                    <a class="btn-full-width rbx-btn-control-xs rbx-game-server-join"
                       href="#"
                       data-placeid>Join</a>

                </div>
                <div class="section-right rbx-game-server-players">
                </div>
            </li>
        </div>
    </div>



            </div>
        </div>
    </div>
</div>



<div class="GenericModal modalPopup unifiedModal smallModal" style="display:none;">
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div>
            <div class="ImageContainer">
                <img class="GenericModalImage" alt="generic image"/>
            </div>
            <div class="Message"></div>
        </div>
        <div class="clear"></div>
        <div id="GenericModalButtonContainer" class="GenericModalButtonContainer">
            <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a>
        </div>
    </div>
</div>



<div id="ItemPurchaseAjaxData"
     data-has-currency-service-error="False"
     data-currency-service-error-message=""
     data-authenticateduser-isnull="False"
     data-user-balance-robux="<?=$userinfo->robux?>"
     data-user-balance-tickets="<?=$userinfo->tix?>"
     data-user-bc="0"
     data-continueshopping-url="/games/<?=$id?>/Work-at-a-Pizza-Place"
     data-imageurl ="/temp/6142862bec7e76846e1affab21bff7a6.png"
     data-alerturl ="/images/cbb24e0c0f1fb97381a065bd1e056fcb.png"
     data-builderscluburl ="/images/ae345c0d59b00329758518edc104d573.png"
     >
    
</div>


<div id="ProcessingView" style="display:none">
    <div class="ProcessingModalBody">
        <p style="margin:0px"><img src='https://images.rbxcdn.com/116db03ed7027c242f773e70a4ed2e68.png' alt="Processing..." /></p>
        <p style="margin:7px 0px">Processing Transaction</p>
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
        <div class="ImageContainer">
            <img class="GenericModalImage BCModalImage" alt="Builder's Club" src="/images/ae345c0d59b00329758518edc104d573.png" />
            <div id="BCMessageDiv" class="BCMessage Message">
                Builders Club membership is required to play in this place.
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
        $('#VOID').click(function () {
            showBCOnlyModal("BCOnlyModal");
            return false;
        });
    });
</script>


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
            </div> 

<footer class="container-footer">
    <div class="footer">
        <ul class="row footer-links">
                <li class="col-xs-4 col-sm-2 footer-link">
                    <a href="https://corp.watrbx.xyz" class="roblox-interstitial" target="_blank">
                        <h2>About Us</h2>
                    </a>
                </li>
                <li class="col-xs-4 col-sm-2 footer-link">
                    <a href="https://corp.watrbx.xyz/jobs" class="roblox-interstitial" target="_blank">
                        <h2>Jobs</h2>
                    </a>
                </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="https://blog.watrbx.xyz" target="_blank">
                    <h2>Blog</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="/Info/Privacy.aspx" target="_blank">
                    <h2>Privacy</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="https://corp.watrbx.xyz/parents" class="roblox-interstitial" target="_blank">
                    <h2>Parents</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="https://en.help.watrbx.xyz/" class="roblox-interstitial" target="_blank">
                    <h2>Help</h2>
                </a>
            </li>
        </ul>
        <p class="footer-note">
            ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a target="_blank" href="https://corp.watrbx.xyz" class="rbx-link roblox-interstitial">ROBLOX Corporation</a>, ©2015.
            Patents pending. ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
            Use of this site signifies your acceptance of the <a href="/info/terms-of-service" target="_blank" class="rbx-link">Terms and Conditions</a>.
        </p>
    </div>
</footer>


</div> 


<div class="modal faded signup-or-log-in-modal">
        <h3 class="title">Sign up or log in to play</h3>
    <div class="close-button">&times;</div>
    <style type="text/css">
    .male {
        background-image: url('https://images.rbxcdn.com/856241927a2ac609e3033feada3ef9f9.png');
        background-repeat: no-repeat;
    }
    .female {
        background-image: url('https://images.rbxcdn.com/a0afd0556163477e1023c5aa55d1b9f6.png');
        background-repeat: no-repeat;
    }
</style>

<div class="signup-or-log-in" ng-modules="SignupOrLogin"
     data-metadata-params="{&quot;isEligibleForHideAdsAbTest&quot;:&quot;False&quot;}"
     data-v2-username-password-rules-enabled="0"
     data-is-login-default-section="false">

    

    <div class="signup-container" ng-controller="SignupController"  ng-show="isSectionShown">
        <div class="signup-input-area" ng-form name="signupForm" rbx-form-context context="PlayButton">
             

<img src="/timg/rbx" style="position: absolute"/>
            <div class="rbx-form-group" ng-class="{'has-error' : (badSubmit || signupForm.username.$dirty) && signupForm.username.$invalid, 'has-success': (signupForm.username.$dirty && signupForm.username.$valid) }">
                <input id="Username" focus-me=&#39;{{isSectionShown}}&#39; ng-trim="false" ng-change="onChange()" name="username" class="form-control rbx-input-field" type="text" tabindex="1" rbx-valid-username rbx-form-interaction rbx-form-validation placeholder="Username (3-20 characters, no spaces)" ng-model="signup.username" />
                <p id="UsernameInputValidation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="(badSubmit || signupForm.username.$dirty) ? signupForm.username.$validationMessage : ''"></p>
            </div>
            <div class="rbx-form-group" ng-class="{'has-error' : (badSubmit || signupForm.password.$dirty) && signupForm.password.$invalid, 'has-success': (signupForm.password.$dirty && signupForm.password.$valid) }">
                <input id="Password" ng-trim="false" name="password" class="form-control rbx-input-field" type="password" tabindex="2" rbx-valid-password rbx-form-interaction rbx-form-validation rbx-form-validation-redact-input placeholder="Password (4 letters, 2 numbers minimum)" ng-model="signup.password">
                <p id="PasswordInputValidation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="(badSubmit || signupForm.password.$dirty) ? signupForm.password.$validationMessage : ''"></p>
            </div>
            <div class="rbx-form-group" ng-class="{'has-error' : (badSubmit || signupForm.passwordConfirm.$dirty) && signupForm.passwordConfirm.$invalid, 'has-success': (signupForm.passwordConfirm.$dirty && signupForm.passwordConfirm.$valid) }">
                <input id="PasswordConfirm" ng-trim="false" name="passwordConfirm" class="form-control rbx-input-field" match="signup.password" rbx-valid-password-confirm rbx-form-interaction rbx-form-validation rbx-form-validation-redact-input type="password" tabindex="3" placeholder="Confirm Password" ng-model="signup.passwordConfirm" />
                <p id="PasswordConfirmInputValidation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="(badSubmit || signupForm.passwordConfirm.$dirty) ? signupForm.passwordConfirm.$validationMessage : ''"></p>
            </div>
            <div class="birthday-container">
                <div class="rbx-form-group" ng-class="{'has-error' : showBirthdayValidation(), 'has-success' : signupForm.birthdayMonth.$dirty && signupForm.birthdayDay.$dirty && signupForm.birthdayYear.$dirty && !showBirthdayValidation() }">
                    <div class="form-control fake-input-lg">
                        <label class="birthday-label">Birthday</label>
                        <div class="rbx-select-group month">
                            <select class="rbx-input-field rbx-select" id="MonthDropdown" tabindex="4" rbx-valid-birthday rbx-form-interaction rbx-form-validation name="birthdayMonth" ng-model="signup.birthdayMonth">
                                <option value="" disabled selected>Month</option>
                                <option value="Jan">January</option>
                                <option value="Feb">February</option>
                                <option value="Mar">March</option>
                                <option value="Apr">April</option>
                                <option value="May">May</option>
                                <option value="Jun">June</option>
                                <option value="Jul">July</option>
                                <option value="Aug">August</option>
                                <option value="Sep">September</option>
                                <option value="Oct">October</option>
                                <option value="Nov">November</option>
                                <option value="Dec">December</option>
                            </select>
                        </div>
                        <div class="rbx-select-group day">
                            <select class="rbx-input-field rbx-select" id="DayDropdown" tabindex="5" rbx-valid-birthday rbx-form-interaction rbx-form-validation name="birthdayDay" ng-model="signup.birthdayDay">
                                <option value="" disabled selected>Day</option>
                                    <option value="1"
                                            >
                                        1
                                    </option>
                                    <option value="2"
                                            >
                                        2
                                    </option>
                                    <option value="3"
                                            >
                                        3
                                    </option>
                                    <option value="4"
                                            >
                                        4
                                    </option>
                                    <option value="5"
                                            >
                                        5
                                    </option>
                                    <option value="6"
                                            >
                                        6
                                    </option>
                                    <option value="7"
                                            >
                                        7
                                    </option>
                                    <option value="8"
                                            >
                                        8
                                    </option>
                                    <option value="9"
                                            >
                                        9
                                    </option>
                                    <option value="10"
                                            >
                                        10
                                    </option>
                                    <option value="11"
                                            >
                                        11
                                    </option>
                                    <option value="12"
                                            >
                                        12
                                    </option>
                                    <option value="13"
                                            >
                                        13
                                    </option>
                                    <option value="14"
                                            >
                                        14
                                    </option>
                                    <option value="15"
                                            >
                                        15
                                    </option>
                                    <option value="16"
                                            >
                                        16
                                    </option>
                                    <option value="17"
                                            >
                                        17
                                    </option>
                                    <option value="18"
                                            >
                                        18
                                    </option>
                                    <option value="19"
                                            >
                                        19
                                    </option>
                                    <option value="20"
                                            >
                                        20
                                    </option>
                                    <option value="21"
                                            >
                                        21
                                    </option>
                                    <option value="22"
                                            >
                                        22
                                    </option>
                                    <option value="23"
                                            >
                                        23
                                    </option>
                                    <option value="24"
                                            >
                                        24
                                    </option>
                                    <option value="25"
                                            >
                                        25
                                    </option>
                                    <option value="26"
                                            >
                                        26
                                    </option>
                                    <option value="27"
                                            >
                                        27
                                    </option>
                                    <option value="28"
                                            >
                                        28
                                    </option>
                                    <option value="29"
                                            >
                                        29
                                    </option>
                                    <option value="30"
                                            ng-show=isValidBirthday(30)>
                                        30
                                    </option>
                                    <option value="31"
                                            ng-show=isValidBirthday(31)>
                                        31
                                    </option>
                            </select>
                        </div>
                        <div class="rbx-select-group year">
                            <select class="rbx-input-field rbx-select" id="YearDropdown" rbx-valid-birthday rbx-form-interaction rbx-form-validation tabindex="6" name="birthdayYear" ng-model="signup.birthdayYear">
                                <option value="" disabled selected>Year</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                            </select>
                        </div>
                    </div>
                    <p id="BirthdayInputValidation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="showBirthdayValidation() ? 'Invalid birthday' : ''"></p>
                </div>

            </div>
            <div class="gender-container">
                <div class="rbx-form-group" ng-class="{'has-error' : (badSubmit && !(signup.gender == 2 || signup.gender == 3)), 'has-success': signup.gender == 2 || signup.gender == 3 }">
                    <div class="form-control fake-input-lg">
                        <label>Gender</label>
                        <div id="FemaleButton" class="gender-circle" tabindex="7" rbx-form-interaction name="genderFemale" ng-class="{ 'selected-gender': signup.gender == 3 }" ng-click="setGender($event, 3)" ng-keypress="setGender($event, 3)">
                            <div class="cover-sprite gender female"></div>
                        </div>
                        <div id="MaleButton" class="gender-circle" tabindex="8" rbx-form-interaction name="genderMale" ng-class="{ 'selected-gender': signup.gender == 2 }" ng-click="setGender($event, 2)" ng-keypress="setGender($event, 2)">
                            <div class="cover-sprite gender male"></div>
                        </div>
                    </div>
                    <p id="GenderInputValidation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="(badSubmit && !(signup.gender == 2 || signup.gender == 3)) ? 'Gender is required' : ''"></p>
                </div>
            </div>
            <button id="SignupButton" type="button" tabindex="9" class="rbx-btn-primary-md" rbx-form-interaction name="signupSubmit" ng-disabled="isSubmitting" data-signup-api-url="https://api.watrbx.xyz/signup/v1" ng-click="submitSignup($event)" ng-keypress="submitSignup($event)">Sign Up and Play!</button>
            <noscript>
                <div class="text-danger">
                    <strong>JavaScript is required to submit this form.</strong>
                </div>
            </noscript>
            <div id="GeneralErrorText" class="input-validation-large rbx-alert-warning rbx-font-bold" ng-cloak ng-show="signupForm.$generalError" ng-bind="signupForm.$generalErrorText" ng-click="signupForm.$generalError=false"></div>
        </div>
            <div class="switch-to-login-section">
                Already have an account?
                        <button id="switch-to-login" type="button" tabindex="10" rbx-show-section section-type="1" class="rbx-btn-secondary-sm">
                            Log In
                        </button>
            </div>
    </div>
        <div class="login-container" ng-controller="LoginController">
            <div class="login-input-area" ng-form name="loginForm" rbx-form-context context="PlayButton" ng-cloak ng-show="isSectionShown">
                <div class="rbx-form-group" ng-class="{'has-error': ((loginForm.username.$dirty || badSubmit) && loginForm.username.$invalid || loginForm.username.showValidation), 'has-success': loginForm.username.$dirty && loginForm.username.$valid}">
                    <input id="login-username" focus-me=&#39;{{isSectionShown}}&#39; class=" form-control rbx-input-field" type="text" tabindex="1" placeholder="Username" name="username" rbx-form-interaction rbx-form-validation ng-required="true" ng-model="login.username" />
                    <p id="login-username-input-validation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="((loginForm.username.$dirty || badSubmit) && loginForm.username.$invalid || loginForm.username.showValidation) ? loginForm.username.$validationMessage : ''"></p>
                </div>
                <div class="rbx-form-group" ng-class="{'has-error': ((loginForm.password.$dirty || badSubmit) && loginForm.password.$invalid || loginForm.password.showValidation), 'has-success': loginForm.password.$dirty && loginForm.password.$valid}">
                    <input id="login-password" class="form-control rbx-input-field" type="password" tabindex="2" placeholder="Password" name="password" rbx-form-interaction rbx-form-validation rbx-form-validation-redact-input ng-required="true" ng-model="login.password" ng-keypress="enterLogin($event)">
                    <a href="https://www.watrbx.xyz/login/resetpasswordrequest.aspx" target="_top" class="rbx-link rbx-font-sm forgot-password-link">Forgot password?</a>
                    <p id="login-password-input-validation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="((loginForm.password.$dirty || badSubmit) && loginForm.password.$invalid || loginForm.password.showValidation) ? loginForm.password.$validationMessage : ''"></p>
                </div>
                <button id="login-button" type="button" ng-disabled="isSubmitting || isTwoStepSectionShown" rbx-form-interaction name="loginSubmit" tabindex="3" class="rbx-btn-primary-md login-button" data-login-api-url="https://api.watrbx.xyz/login/v1" data-two-step-code-request-url="https://api.watrbx.xyz/twostepverification/request-unauthenticated" data-two-step-verification-api-url="https://api.watrbx.xyz/twostepverification/verify-unauthenticated" ng-click="submitLogin($event)">Log In</button>
                <div id="general-login-error-text" class="input-validation-large rbx-alert-warning rbx-font-bold" ng-show="$generalError" ng-bind="$generalErrorText" ng-click="$generalError=false" ng-cloak></div>
                <div class="switch-to-signup-section">
                    Need an account?
                            <button id="switch-to-signup" type="button" tabindex="4" class="rbx-btn-secondary-sm" rbx-show-section section-type="0">
                                Sign Up
                            </button>
                </div>
            </div>
                <div class="two-step-verification-container" ng-cloak ng-show="isTwoStepSectionShown">
                    <div class="two-step-verification-input-area" ng-form name="twoStepVerificationForm" rbx-form-context context="PlayButton">
                        <div class="rbx-form-group" ng-class="{ 'has-error': twoStepVerificationForm.twoStepCode.$dirty && twoStepVerificationForm.twoStepCode.$invalid, 'has-success': twoStepVerificationForm.twoStepCode.$dirty && twoStepVerificationForm.twoStepCode.$valid }">
                            <input id="two-step-verification-code" focus-me="{{isTwoStepSectionShown}}" class="form-control rbx-input-field" type="text" tabindex="1" placeholder="Enter verification code here" rbx-form-interaction rbx-form-validation rbx-form-validation-redact-input name="twoStepCode" ng-required="true" ng-keypress="enterTwoStepCode($event)" ng-model="twoStepVerification.twoStepCode" />
                            <p id="two-step-verification-code-validation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="twoStepVerificationForm.twoStepCode.$invalid ? twoStepVerificationForm.twoStepCode.$validationMessage : '' "></p>
                        </div>
                        <button id="two-step-button" ng-disabled="isSubmitting" type="button" tabindex="2" class="rbx-btn-primary-md two-step-button" rbx-form-interaction name="twoStepSubmit" ng-click="submitTwoStepCode($event)" data-login-api-url="https://api.watrbx.xyz/login/v1">Submit</button>
                        <button id="two-step-back-button" type="button" tabindex="3" rbx-show-section section-type="1" class="rbx-btn-secondary-md two-step-back-button">Back</button>
                        <a href="" target="_top" class="rbx-link rbx-font-sm" ng-click="requestTwoStepCode($event)">Resend code</a>
                    </div>
                </div>
        </div>

    <div class="captcha-container" ng-controller="CaptchaController" ng-form name="captchaForm" rbx-form-context context="PlayButton" ng-cloak ng-show="isSectionShown">
        <div class="captcha-response-message rbx-text-danger" ng-bind="$validationMessage"></div>
        <script type="text/javascript">
		var RecaptchaOptions = {
			theme : 'white',
			tabindex : 0
		};

</script><script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=6Le88gcTAAAAALG04IFgQDENWlQmc_hy_3tdF1yY">

</script><noscript>
		<iframe src="https://www.google.com/recaptcha/api/noscript?k=6Le88gcTAAAAALG04IFgQDENWlQmc_hy_3tdF1yY" width="500" height="300" frameborder="0">

		</iframe><br /><textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea><input name="recaptcha_response_field" value="manual_challenge" type="hidden" />
</noscript>
        <button id="CaptchaSubmitButton" class="rbx-btn-primary-md captcha-submit-button"
                data-signup-captcha-api-url="https://api.watrbx.xyz/captcha/validate/signup"
                data-log-in-captcha-api-url="https://api.watrbx.xyz/captcha/validate/login"
                ng-click="submitCaptcha($event)"
                ng-disabled="isSubmitting"
                rbx-form-interaction name="captchaSubmit">
            Submit
        </button>
        <button id="captcha-back-button" type="button" tabindex="3" rbx-show-section section-type="1" class="rbx-btn-secondary-md captcha-back-button">Back</button>
    </div>
</div>



</div>


<div id="usernotifications-data-model"
     class="hidden"
     data-notificationsdomain="https://notifications.watrbx.xyz/"
     data-notificationstestinterval="5000"
     data-notificationsmaxconnectiontime="43200000">
</div>    <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.ChatTemplates = {
            ChatBarTemplate: "chat-bar",
            AbuseReportTemplate: "chat-abuse-report",
            DialogTemplate: "chat-dialog",
            FriendsSelectionTemplate: "chat-friends-selection",
            GroupDialogTemplate: "chat-group-dialog",
            NewGroupTemplate: "chat-new-group",
            DialogMinimizeTemplate: "chat-dialog-minimize"
        };
        Roblox.Chat = {
            SoundFile: "/Chat/sound/chatsound.mp3"
        };
        Roblox.Party = {};
        Roblox.Party.SetGoogleAnalyticsCallback = function () {
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
        };

    </script>


<div id="chat-container" class="chat chat-container"
     ng-modules="robloxApp, chat"
     ng-controller="chatController"
     ng-class="{'collapsed': chatLibrary.chatLayout.collapsed}"
     ng-cloak>
    <!--chatLibrary.deviceType === deviceType.TABLET && ,
                'tablet-inapp': chatLibrary.tabletInApp-->
<div id="chat-data-model"
     class="hidden"
     chat-data
     chat-view-model="chatViewModel"
     chat-library="chatLibrary"
     data-userid="<?=$userinfo->id?>"
     data-domain="watrbx.xyz"
     data-gamespagelink="/games"
     data-chatdomain="https://chat.watrbx.xyz"
     data-numberofmembersforpartychrome="6"
     data-avatarheadshotsmultigetlimit="100"
     data-userpresencemultigetlimit="100"
     data-intervalofchangetitleforpartychrome="500"
     data-spinner="https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif"
     data-notificationsdomain="https://notifications.watrbx.xyz/"
     data-devicetype="Computer"
     data-inapp=false
     data-smallerchatenabled=true
     data-cleanpartyfromconversationenabled=false>
</div>
    <div chat-bar></div>
    <script type="text/ng-template" id="chat-bar">
    <div id="chat-main" class="chat-main"
         ng-class="{'chat-main-empty': chatLibrary.chatLayout.chatLandingEnabled}" ng-cloak>
        <div id="chat-header"
             class="chat-windows-header chat-header">
            <div class="chat-header-label"
                 ng-click="toggleChatContainer()">
                <span class="rbx-font-bold chat-header-title">Chat & Party</span>
            </div>
            <div class="chat-header-action">
                <span class="rbx-notification-red"
                      ng-show="chatLibrary.chatLayout.collapsed && chatViewModel.conversationCount > 0"
                      ng-cloak>{{chatViewModel.conversationCount}}</span>
                <span id="chat-group-create"
                      class="rbx-icon-chat-group-create"
                      ng-hide="chatLibrary.chatLayout.collapsed || chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.chatLandingEnabled || chatLibrary.chatLayout.pageDataLoading"
                      ng-click="launchDialog(newGroup.layoutId)"
                      data-toggle="tooltip"
                      title="Add at least 2 people to create chat group"
                      ng-cloak></span>
            </div>
        </div>
        <div id="chat-body"
             class="chat-body"
             ng-hide="chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.pageDataLoading"
             ng-if="!chatLibrary.chatLayout.chatLandingEnabled">
            <div class="chat-search"
                 ng-class="{'chat-search-focus': chatLibrary.chatLayout.searchFocus}">
                <input type="text"
                       placeholder="Search"
                       class="chat-search-input"
                       ng-model="chatViewModel.searchTerm"
                       ng-focus="chatLibrary.chatLayout.searchFocus = true" />
                <span class="rbx-icon-chat-search"></span>
                <span class="rbx-icon-chat-cancel-search"
                      ng-click="cancelSearch()"></span>
            </div>
            <button id="chat-group-create-btn"
                    type="button"
                    class="btn rbx-btn-control-xs"
                    ng-click="launchDialog(newGroup.layoutId)"
                    title="Add at least 2 people to create chat group"
                    ng-cloak>
                <span>Create Chat Group</span>
            </button>
            <div id="chat-friend-list" class="rbx-scrollbar chat-friend-list" lazy-load>
                <ul id="chat-friends" class="chat-friends">
                    <li ng-repeat="chatUser in chatUserDict | orderList: chatLibrary.chatLayoutIds | filter : {name: chatViewModel.searchTerm}"
                        class="chat-friend">
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.CHAT && chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatLibrary.friendsDict[chatUser.displayUserId].AvatarThumb.Url}}"
                                     class="chat-avatar"
                                     thumbnail="chatLibrary.friendsDict[chatUser.displayUserId].AvatarThumb"
                                     image-retry
                                     ng-if="chatUser.isConversation">
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatLibrary.friendsDict[chatUser.displayUserId].UserPresenceType]['className']"></div>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name" ng-if="chatUser.isConversation">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>

                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.GROUPCHAT && chatUser.isConversation"
                             class="chat-friend-container chat-friend-groups">
                            <div class="chat-friend-avatar">
                                <ul class="chat-avatar-groups">
                                    <li ng-repeat="userId in chatUser.userIds | limitTo : 4"
                                        class="chat-avatar">
                                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                             image-retry>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>

                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.PARTY && chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar chat-party-avatar">
                                <span class="rbx-icon-chat-party-avatar"></span>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.PENDINGPARTY  && chatUser.isConversation"
                             class="chat-friend-container chat-pending-party">
                            <div class="chat-friend-avatar">
                                <ul class="chat-avatar-groups">
                                    <li ng-repeat="userId in chatUser.userIds | limitTo : 3"
                                        class="chat-avatar">
                                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                             image-retry>
                                    </li>
                                    <li class="chat-avatar-party-icon">
                                        <span class="rbx-icon-chat-party-avatar"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message party-pending-msg"
                                      ng-if="chatUser.incomingPartyInvite">{{chatUser.pendingPartyMsg}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage && !chatUser.incomingPartyInvite"></span>
                            </div>
                        </div>
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="!chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatUser.AvatarThumb.Url}}" class="chat-avatar"
                                     thumbnail="chatUser.AvatarThumb"
                                     image-retry>
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatUser.UserPresenceType]['className']"></div>

                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-xs chat-friend-message">{{userPresenceTypes[chatUser.UserPresenceType].title}}</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="chat-loading loading-bottom"
                     ng-show="chatLibrary.chatLayout.isChatLoading">
                    <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
                </div>
            </div>
        </div>
        <div id="chat-disconnect"
             class="chat-disconnect"
             ng-show="chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.pageDataLoading"
             ng-cloak>
            <p ng-show="chatLibrary.chatLayout.errorMaskEnable">Trying to connect ...</p>
            <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
        </div>
        <div id="chat-empty-list"
             class="chat-disconnect"
             ng-hide="chatLibrary.chatLayout.errorMaskEnable"
             ng-if="chatLibrary.chatLayout.chatLandingEnabled">
            <span class="rbx-icon-chat-friends"></span>
            <p class="rbx-lead">Make friends to start chatting and partying!</p>
        </div>
    </div>
</script>
    <div id="dialogs"
         class="dialogs"
         ng-controller="dialogsController">
        <div dialog
             id="{{chatLayoutId}}"
             dialog-data="chatUserDict[chatLayoutId]"
             chat-library="chatLibrary"
             close-dialog="closeDialog(chatLayoutId)"
             send-invite="sendInvite(chatLayoutId)"
             ng-repeat="chatLayoutId in chatLibrary.layoutIdList"></div>
        <script type="text/ng-template" id="chat-abuse-report">
    <div class="dialog-report-container"
         ng-show="dialogLayout.isConfirmationOn">
        <div class="dialog-report-content">
            <h4>Continue to report?</h4>
            <button id="chat-abuse-report-btn"
                    class="rbx-btn-primary-xs"
                    ng-click="abuseReport(null, true)">
                Report
            </button>

            <button class="rbx-btn-control-xs"
                    ng-click="dialogLayout.isConfirmationOn = false">
                Cancel
            </button>
        </div>
    </div>
</script>

        <script type="text/ng-template" id="chat-friends-selection">
    <div class="chat-friends-container">
        <div class="chat-search"
             ng-class="{'group-select-container' : dialogData.selectedUserIds.length > 0}"
             group-select>
            <div class="group-select">
                <ul class="group-select-friends">
                    <li class="rbx-font-sm group-select-friend"
                        ng-repeat="userId in dialogData.selectedUserIds">
                        {{dialogData.selectedUsersDict[userId].Username}}
                        <span class="rbx-icon-chat-cancel-search group-select-cancel" ng-click="selectFriends(userId)"></span>
                    </li>
                </ul>
                <input type="text"
                       placeholder="Search"
                       class="chat-search-input"
                       focus-me="chatLibrary.inApp ? false: true"
                       ng-model="dialogData.searchTerm" />
            </div>
            <button id="friends-selection-btn"
                    class="rbx-btn-secondary-xs friends-invite-btn"
                    ng-disabled="dialogLayout.inviteBtnDisabled"
                    ng-click="sendInvite()">
                Invite
            </button>
        </div>

        <div id="scrollbar_friend_{{dialogData.dialogType}}_{{dialogData.layoutId}}" class="rbx-scrollbar chat-friend-list"
             friends-lazy-load>
            <ul class="chat-friends">
                <li ng-repeat="friend in chatLibrary.friendsDict | orderList: dialogData.friendIds  | filter: {Username: dialogData.searchTerm}"
                    class="chat-friend">
                    <div class="chat-friend-container chat-friend-select"
                         ng-click="selectFriends(friend.Id)">
                        <div class="chat-friend-avatar">
                            <img ng-src="{{friend.AvatarThumb.Url}}"
                                 thumbnail="friend.AvatarThumb"
                                 image-retry
                                 class="chat-avatar">
                            <div class="chat-friend-status" ng-class="userPresenceTypes[friend.UserPresenceType]['className']"></div>
                        </div>
                        <div class="chat-friend-info">
                            <span class="chat-friend-name">{{friend.Username}}</span>
                            <span class="rbx-font-sm chat-friend-message">{{userPresenceTypes[friend.UserPresenceType].title}}</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</script>
        <script type="text/ng-template" id="chat-dialog">
    <div id="dialog-container" class="dialog-container"
         ng-class="{'group-has-banner': dialogData.isPartyExisted || dialogData.partyInGame,
                    'dialog-party': dialogData.dialogType == dialogType.PARTY,
                    'collapsed': dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER,
                    'active': dialogLayout.active && !dialogLayout.hasFocus}"
         ng-controller="dialogController"
         ng-focus="focusDialog()">
        <div class="dialog-main">
            <div class="chat-windows-header dialog-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-party-label"
                          ng-show="dialogData.dialogType == dialogType.PARTY"
                          title="Party"
                          ng-cloak></span>
                    <span id="chat-title"
                          class="rbx-font-bold chat-header-title dialog-header-title" 
                          ng-click="toggleDialogContainer()" 
                          ng-if="dialogData.dialogType != dialogType.PARTY">
                        <a class="rbx-font-bold"
                           ng-click="linkToProfile($event)"
                           ng-href="{{dialogData.nameLink}}">{{dialogData.name}}</a>
                    </span>
                    <span id="party-title"
                          class="rbx-font-bold chat-header-title dialog-header-title"
                          ng-click="toggleDialogContainer()" 
                          ng-if="dialogData.dialogType == dialogType.PARTY">{{dialogData.name}}
                    </span>
                </div>
                <div class="chat-header-action"
                     chat-setting>
                    <span class="rbx-icon-chat-close"
                          ng-click="closeDialog(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Close"></span>
                    <span class="rbx-icon-chat-setting"
                          data-toggle="popover"
                          data-bind="group-settings-{{dialogData.Id}}"
                          ng-hide="(dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                    <div class="rbx-popover-content" data-toggle="group-settings-{{dialogData.Id}}">
                        <ul class="rbx-dropdown-menu" role="menu">
                            <li>
                                <a id="abuse-report"
                                   ng-click="abuseReport(dialogData.userIds[0], false)">Report Abuse</a>
                            </li>
                            <li>
                                <a id="leave-group"
                                   ng-click="leaveGroup()"
                                   ng-if="dialogData.dialogType === dialogType.PARTY">Leave Party</a>
                            </li>
                        </ul>
                    </div>
                    <span id="create-party"
                          class="rbx-icon-chat-party-label"
                          ng-click="sendInvite(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Play Together"
                          ng-hide="dialogData.party || (dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER)  || chatLibrary.chatLayout.errorMaskEnable"></span>
                </div>
            </div>

            <div id="dialog-member-header"
                 class="dialog-member-header"
                 ng-show="dialogData.isPartyExisted && !dialogData.partyInGame">
                <ul class="group-members">
                    <li class="group-member"
                        title="{{chatLibrary.friendsDict[userId].Username}}{{dialogData.membersDict[userId].statusTooltip}}"
                        ng-repeat="userId in dialogData.userIds">
                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[userId].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-leader': dialogData.membersDict[userId].memberStatus === memberStatus.LEADER,
                                        'group-pending':dialogData.membersDict[userId].memberStatus === memberStatus.PENDING}">
                    </li>
                </ul>
                <a id="find-game"
                   class="rbx-btn-primary-xs"
                   ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.party.LeaderUser.Id === chatLibrary.userId"
                   ng-href="{{chatLibrary.gamesPageLink}}">Find Game</a>
                <a id="join-party"
                   class="rbx-btn-control-xs"
                   ng-hide="dialogData.dialogType === dialogType.PARTY || !dialogData.party"
                   ng-click="joinParty()">
                    Join Party
                </a>
            </div>

            <div id="party-ingame-header"
                 class="party-ingame-header"
                 ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.isPartyExisted && dialogData.partyInGame">
                <img ng-src="{{dialogData.placeThumbnail.Url}}"
                     thumbnail="dialogData.placeThumbnail" image-retry
                     class="party-ingame-thumbnail">
                <div class="party-ingame-label"
                     ng-class="{'party-ingame-member': chatLibrary.userId !== dialogData.party.LeaderUser.Id}">
                    <span class="rbx-font-sm">Playing</span>
                    <span class="rbx-font-sm rbx-font-bold party-ingame-name">{{dialogData.party.GameName}}</span>
                </div>
                <a id="join-game"
                   class="rbx-btn-control-xs"
                   ng-hide="chatLibrary.userId === dialogData.party.LeaderUser.Id"
                   ng-click="joinGame()">
                    Join Game
                </a>
            </div>
            <div id="scrollbar_{{dialogData.dialogType}}_{{dialogData.layoutId}}"
                 class="rbx-scrollbar dialog-body"
                 dialog-lazy-load>
                <ul class="dialog-messages">
                    <li class="dialog-message-container"
                        ng-repeat="message in dialogData.ChatMessages | reverse"
                        ng-class="{'message-inbound': message.SenderUserId != chatLibrary.userId && !message.isSystemMessage,
                                    'system-message': message.isSystemMessage}">
                        <div class="rbx-font-sm dialog-message dialog-triangle dialog-message-content"
                             ng-bind-html="message.Content" 
                             ng-hide="message.isSystemMessage"></div>
                        <div class="rbx-font-xs dialog-sending" ng-show="message.sendingMessage">Sending...</div>
                        <div class="rbx-font-xs rbx-text-danger dialog-sending" ng-show="message.sendMessageHasError"
                             ng-bind="message.error || 'Error'"></div>
                        <span class="system-message-content"
                              ng-show="message.isSystemMessage"
                              ng-bind-html="message.Content"></span>
                    </li>
                </ul>
            </div>
            <div class="chat-loading loading-top"
                 ng-show="dialogLayout.isChatLoading">
                <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
            </div>
            <div class="dialog-input-container">
                <textarea id="dialog-input"
                          msd-elastic
                          focus-me="{{dialogLayout.focusMeEnabled}}"
                          ng-focus="toggleDialogFocusStatus(true)"
                          ng-blur="toggleDialogFocusStatus(false)"
                          placeholder="Send a message ..."
                          ng-model="dialogData.messageForSend"
                          key-press-enter="sendMessage()"
                          class="dialog-input"
                          maxlength="{{dialogLayout.limitCharacterCount}}"
                          ng-disabled="chatLibrary.chatLayout.errorMaskEnable"></textarea>
            </div>

            <div abuse-report></div>
        </div>
    </div>
</script>
        <script type="text/ng-template" id="chat-group-dialog">
    <div class="dialog-container group-dialog"
         ng-class="{'group-has-banner': dialogData.isPartyExisted || dialogData.partyInGame,
                    'dialog-party': dialogData.dialogType == dialogType.PARTY,
                    'collapsed': dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER,
                    'active': dialogLayout.active && !dialogLayout.hasFocus}"
         ng-controller="dialogController">
        <div class="dialog-main" 
             ng-hide="dialogLayout.isConfirmationOn || dialogLayout.lookUpMembers || dialogData.addMoreFriends">
            <div class="chat-windows-header dialog-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-party-label"
                          ng-show="dialogData.dialogType == dialogType.PARTY"
                          title="Party"
                          ng-cloak></span>
                    <span class="rbx-icon-chat-group-label"
                          ng-show="dialogData.dialogType != dialogType.PARTY"
                          title="Group Chat"
                          ng-cloak></span>
                    <span id="party-title"
                          class="rbx-font-bold dialog-header-title"
                          title="{{dialogData.partyName}}"
                          ng-click="toggleDialogContainer()" ng-if="dialogData.dialogType == dialogType.PARTY">{{dialogData.partyName}}</span>
                    <span id="group-chat-title"
                          class="rbx-font-bold dialog-header-title"
                          title="{{dialogData.groupName}}"
                          ng-click="toggleDialogContainer()" ng-if="dialogData.dialogType != dialogType.PARTY">{{dialogData.groupName}}</span>
                </div>
                <div class="chat-header-action"
                     chat-setting>
                    <span class="rbx-icon-chat-close"
                          ng-click="closeDialog(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Close"></span>
                    <span class="rbx-icon-chat-setting"
                          data-toggle="popover"
                          data-bind="group-settings-{{dialogData.Id}}"
                          ng-hide="(dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                    <div class="rbx-popover-content" data-toggle="group-settings-{{dialogData.Id}}">
                        <ul class="rbx-dropdown-menu" role="menu">
                            <li><a id="add-friends" ng-click="addFriends()">Add Friends</a></li>
                            <li><a id="view-participants" ng-click="viewParticipants()">View Participants</a></li>
                            <li>
                                <a id="leave-group" ng-click="leaveGroup()" ng-bind="dialogData.dialogType === dialogType.PARTY ? 'Leave Party' : 'Leave Group'"></a>
                            </li>
                        </ul>
                    </div>
                    <span id="create-party"
                          class="rbx-icon-chat-party-label"
                          ng-click="sendInvite(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Play Together"
                          ng-hide="dialogData.party || (dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                </div>
            </div>
            <div id="dialog-member-header"
                 class="dialog-member-header"
                 ng-show="dialogData.isPartyExisted && (!dialogData.partyInGame || dialogData.dialogType === dialogType.PENDINGPARTY)">
                <ul class="group-members">
                    <li class="group-member"
                        title="{{chatLibrary.friendsDict[userId].Username}}{{dialogData.membersDict[userId].statusTooltip}}"
                        ng-repeat="userId in dialogData.userIds | limitTo: dialogLayout.limitMemberDisplay">
                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[userId].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-leader': dialogData.membersDict[userId].memberStatus === memberStatus.LEADER,
                                        'group-pending':dialogData.membersDict[userId].memberStatus === memberStatus.PENDING}">
                    </li>
                    <li ng-show="dialogData.userIds.length === (dialogLayout.limitMemberDisplay + 1)"
                        title="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].Username}}{{dialogData.membersDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].statusTooltip}}"
                        class="group-member">
                        <img ng-src="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-pending': dialogData.membersDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].memberStatus === memberStatus.PENDING}">
                    </li>
                    <li ng-show="dialogData.userIds.length > (dialogLayout.limitMemberDisplay + 1)"
                        ng-click="dialogLayout.lookUpMembers = !dialogLayout.lookUpMembers"
                        class="group-member group-member-plus"
                        ng-cloak>+{{dialogData.userIds.length - dialogLayout.limitMemberDisplay}}</li>
                </ul>
                <a id="find-game"
                   class="rbx-btn-primary-xs"
                   ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.party.LeaderUser.Id === chatLibrary.userId && !chatLibrary.inApp"
                   ng-href="{{chatLibrary.gamesPageLink}}">Find Game</a>
                <a id="join-party"
                   class="rbx-btn-control-xs"
                   ng-hide="dialogData.dialogType === dialogType.PARTY || !dialogData.party"
                   ng-click="joinParty()">
                    Join Party
                </a>
            </div>

            <div id="party-ingame-header"
                 class="party-ingame-header"
                 ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.isPartyExisted && dialogData.partyInGame">
                <img ng-src="{{dialogData.placeThumbnail.Url}}"
                     thumbnail="dialogData.placeThumbnail" image-retry
                     class="party-ingame-thumbnail">
                <div class="party-ingame-label"
                     ng-class="{'party-ingame-member': chatLibrary.userId !== dialogData.party.LeaderUser.Id}">
                    <span class="rbx-font-sm">Playing</span>
                    <span class="rbx-font-sm rbx-font-bold party-ingame-name">{{dialogData.party.GameName}}</span>
                </div>
                <a id="join-game"
                   class="rbx-btn-control-xs"
                   ng-hide="chatLibrary.userId === dialogData.party.LeaderUser.Id"
                   ng-click="joinGame()">
                    Join Game
                </a>
            </div>
            <div id="scrollbar_{{dialogData.dialogType}}_{{dialogData.layoutId}}"
                 class="rbx-scrollbar dialog-body"
                 dialog-lazy-load>
                <ul class="dialog-messages">
                    <li class="dialog-message-container"
                        ng-repeat="message in dialogData.ChatMessages | reverse"
                        ng-class="{'message-inbound': message.SenderUserId != chatLibrary.userId && !message.isSystemMessage,
                                    'system-message': message.isSystemMessage}">
                        <a ng-href="{{chatLibrary.friendsDict[message.SenderUserId].UserProfileLink}}"
                           ng-hide="message.isSystemMessage">
                            <img ng-if="message.SenderUserId != chatLibrary.userId"
                                 ng-src="{{chatLibrary.friendsDict[message.SenderUserId].AvatarThumb.Url}}"
                                 thumbnail="chatLibrary.friendsDict[message.SenderUserId].AvatarThumb"
                                 image-retry
                                 class="dialog-message-avatar">
                        </a>
                        <div class="dialog-message dialog-triangle" 
                             ng-hide="message.isSystemMessage">
                            <span ng-if="chatLibrary.friendsDict[message.SenderUserId] && message.SenderUserId != chatLibrary.userId"
                                  class="rbx-font-xs dialog-message-author">{{chatLibrary.friendsDict[message.SenderUserId].Username}}</span>
                            <span class="rbx-font-sm dialog-message-content" ng-bind-html="message.Content"></span>
                        </div>
                        <div class="rbx-font-xs dialog-sending" ng-show="message.sendingMessage">Sending...</div>
                        <div class="rbx-font-xs rbx-text-danger dialog-sending" ng-show="message.sendMessageHasError"
                             ng-bind="message.error || 'Error'"></div>
                        <span class="system-message-content"
                              ng-show="message.isSystemMessage"
                              ng-bind-html="message.Content"></span>
                    </li>
                </ul>
            </div>
            <div class="chat-loading loading-top"
                 ng-show="dialogLayout.isChatLoading">
                <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
            </div>
            <div class="dialog-input-container">
                <textarea msd-elastic
                          focus-me="{{dialogLayout.focusMeEnabled}}"
                          ng-focus="toggleDialogFocusStatus(true)"
                          ng-blur="toggleDialogFocusStatus(false)"
                          placeholder="Send a message ..."
                          ng-model="dialogData.messageForSend"
                          key-press-enter="sendMessage()"
                          class="dialog-input"
                          maxlength="{{dialogLayout.limitCharacterCount}}"
                          ng-disabled="chatLibrary.chatLayout.errorMaskEnable"></textarea>
            </div>
        </div>
        <div class="group-members-container"
             ng-show="dialogLayout.lookUpMembers">
            <div class="chat-windows-header">
                <span class="rbx-icon-chat-arrow-left"
                      ng-click="viewParticipants()"></span>
                <span class="rbx-font-bold">Participants</span>
            </div>
            <div id="group-members" class="rbx-scrollbar chat-friend-list"
                <ul class="chat-friends">
                    <li ng-repeat="userId in dialogData.userIds"
                        class="chat-friend">
                        <div class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                     thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                     image-retry
                                     class="chat-avatar">
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatLibrary.friendsDict[userId].UserPresenceType]['className']"></div>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatLibrary.friendsDict[userId].Username}}</span>
                                <span class="rbx-font-sm rbx-text-notes" ng-show="dialogData.party && dialogData.membersDict[userId].memberStatus == memberStatus.LEADER">Leader</span>
                                <span class="rbx-font-sm rbx-text-notes" ng-show="dialogData.party && dialogData.membersDict[userId].memberStatus == memberStatus.MEMBER">In party</span>
                            </div>
                            <div class="group-member-action">
                                <span ng-if="chatLibrary.userId != userId && chatLibrary.userId === dialogData.party.LeaderUser.Id && dialogData.dialogType == dialogType.PARTY"
                                      class="rbx-icon-chat-remove"
                                      ng-click="removeMember(userId)"></span>
                                <span ng-if="chatLibrary.userId != userId && chatLibrary.userId === dialogData.InitiatorUser.Id && dialogData.dialogType != dialogType.PARTY"
                                      class="rbx-icon-chat-remove"
                                      ng-click="removeMember(userId)"></span>
                                <span class="rbx-icon-chat-report-person"
                                      ng-if="chatLibrary.userId != userId"
                                      ng-click="abuseReport(userId, false)"></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div abuse-report></div>
        <div class="group-friends-container"
             ng-show="dialogData.addMoreFriends">
            <div class="chat-windows-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-arrow-left"
                          ng-click="dialogData.addMoreFriends = false"></span>
                    <span class="rbx-font-bold">Add Friends</span>
                    <span class="rbx-font-bold"
                          ng-class="{'group-overload': dialogLayout.isMembersOverloaded}">
                        ({{(dialogData.numberOfSelected)}}/{{chatLibrary.quotaOfPartyMembers}})
                    </span>
                </div>
            </div>
            <div friends-selection></div>
        </div>
    </div>
</script>

        <div dialog
             id="{{newGroup.layoutId}}"
             dialog-data="newGroup"
             chat-library="chatLibrary"
             close-dialog="closeDialog('newGroup')"
             send-invite="sendInvite(newGroup.layoutId)"
             ng-if="newGroup"></div>
        <script type="text/ng-template" id="chat-new-group">
    <div class="dialog-container group-create-container"
         ng-controller="friendsController">
        <div class="chat-windows-header">
            <div class="chat-header-title">
                <span class="rbx-font-bold">{{dialogLayout.title}}</span>
                <span class="rbx-font-bold"
                      ng-class="{'group-overload': dialogLayout.isMembersOverloaded}">
                    ({{(dialogData.numberOfSelected)}}/{{chatLibrary.quotaOfPartyMembers}})
                </span>
            </div>
            <div class="chat-header-action">
                <span class="rbx-icon-chat-close"
                      ng-click="closeDialog(dialogData.layoutId)"
                      data-toggle="tooltip"
                      title="Close"></span>
            </div>
        </div>
        <div friends-selection></div>
    </div>
</script>
        <script type="text/ng-template" id="chat-dialog-minimize">
    <div id="dialogs-minimize-container"
         class="dialogs-minimize-container"
         ng-show="hasMinimizedDialogs"
         data-toggle="popover"
         data-bind="dialogs">
        <span class="rbx-icon-chat-minimize"></span>
        <span class="minimize-count">{{chatLibrary.minimizedDialogIdList.length}}</span>
        <div class="rbx-popover-content" data-toggle="dialogs">
            <ul class="rbx-dropdown-menu minimize-list" role="menu">
                <li ng-repeat="dialogLayoutId in chatLibrary.minimizedDialogIdList"
                    class="minimize-item"
                    id="{{dialogLayoutId}}"
                    minimize-item>
                    <a class="rbx-text-overflow minimize-title">
                        <span>
                            {{chatLibrary.minimizedDialogData[dialogLayoutId].name}}
                        </span>
                    </a>
                    <span class="rbx-icon-chat-cancel-search minimize-close"></span>
                </li>
            </ul>
        </div>
    </div>
</script>


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


<div id="page-heartbeat-event-data-model"
     class="hidden"
     data-page-heartbeat-event-intervals="[2,8,20,60]">
</div>

    <script type="text/javascript">function urchinTracker() {}</script>


<div id="PlaceLauncherStatusPanel" style="display:none;width:300px"
     data-new-plugin-events-enabled="True"
     data-event-stream-for-plugin-enabled="True"
     data-event-stream-for-protocol-enabled="True"
     data-is-protocol-handler-launch-enabled="True"
     data-is-user-logged-in="True"
     data-os-name="Windows"
     data-protocol-name-for-client="watrbx-player"
     data-protocol-name-for-studio="watrbx-studio"
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
                <a href="#" class="rbx-link" target="_blank">Click here for help</a>
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
        <div id="content">
            <video id="contentElement" style="width:0; height:0;" />
        </div>
        <div id="videoPrerollMainDiv"></div>
        <div id="videoPrerollCompanionAd">
            
                <script type="text/javascript">
                    googletag.cmd.push(function () {
                        googletag.defineSlot('/1015347/VideoPrerollUnder13', [300, 250], 'videoPrerollCompanionAd')
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
            <a href="https://www.watrbx.xyz/premium/membership?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
        </div>
    </div>   
        <script type="text/javascript" src="//imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
    <script type="text/javascript">
        $(function () {
            var videoPreRollDFP = Roblox.VideoPreRollDFP;
            if (videoPreRollDFP) {
                var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
                videoPreRollDFP.showVideoPreRoll = false;
                videoPreRollDFP.loadingBarMaxTime = 33000;
                videoPreRollDFP.videoLoadingTimeout = 10;
                videoPreRollDFP.videoPlayingTimeout = 10;
                videoPreRollDFP.videoLogNote = "";
                videoPreRollDFP.logsEnabled = true;
                videoPreRollDFP.adUnit = "/1015347/VideoPrerollUnder13";
                videoPreRollDFP.adTime = 15;
                videoPreRollDFP.isSwfPreloaderEnabled = true;
                videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
                customTargeting.userAge = "9";
                customTargeting.userGender = "Male";
                customTargeting.gameGenres = "Town and City,";
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
                <a href="/?returnUrl=http%3A%2F%2Fwww.watrbx.xyz%2Fgames%2F<?=$id?>%2FWork-at-a-Pizza-Place"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="https://www.watrbx.xyz/newlogin?returnUrl=http%3A%2F%2Fwww.watrbx.xyz%2Fgames%2F<?=$id?>%2FWork-at-a-Pizza-Place">I have an account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkRobloxInstall() {
             return RobloxLaunch.CheckRobloxInstall('/install/download.aspx');
    }

</script>

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
    Roblox.Client._installHost = 'setup.watrbx.xyz';
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
            Roblox.CookieUpgrader.domain = 'watrbx.xyz';
            Roblox.CookieUpgrader.upgrade("GuestData", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
            Roblox.CookieUpgrader.upgrade("RBXSource", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("rbx_acquisition_time", cookie); } });
            Roblox.CookieUpgrader.upgrade("RBXViralAcquisition", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("time", cookie); } });
                
                Roblox.CookieUpgrader.upgrade("RBXMarketing", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
                
                            
                Roblox.CookieUpgrader.upgrade("RBXSessionTracker", { expires: Roblox.CookieUpgrader.fourHoursFromNow });
                
                    });
    </script>


    
    <script type='text/javascript' src='/js/22f5b93b0e23b69d9c48f68ea3c65fe3.js.gzip'></script>
    <script type='text/javascript' src='/js/6385cae49dc708a8f2f93167ad17466d.js.gzip'></script>
    <script type='text/javascript' src='/js/59e30cf6dc89b69db06bd17fbf8ca97c.js.gzip'></script>
    <script type='text/javascript' src='/js/f3251ed8271ce1271b831073a47b65e3.js.gzip'></script>
    <script type='text/javascript' src='/js/045483c002abdefee9f2e9598ac48d08.js.gzip'></script>


    
    <script type='text/javascript'>Roblox.config.externalResources = [];Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/c1d70e1b98c87fcdb85e894b5881f60c.js.gzip';Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/bd76a582ffb966eb0af3f16d61defa7f.js.gzip';Roblox.config.paths['Pages.Messages'] = 'https://js.rbxcdn.com/b123274ceba7c65d8415d28132bb2220.js.gzip';Roblox.config.paths['Resources.Messages'] = 'https://js.rbxcdn.com/6307f9bd9c09fa9d88c76291f3b68fda.js.gzip';Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/64f4ed4d4cf1c0480690bc39cbb05b73.js.gzip';Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/5cf0eb71249768c86649bbf0c98591b0.js.gzip';Roblox.config.paths['Widgets.GroupImage'] = 'https://js.rbxcdn.com/556af22c86bce192fb12defcd4d2121c.js.gzip';Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/7689b2fd3f7467640cda2d19e5968409.js.gzip';Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/d689e41830fba6bc49155b15a6acd020.js.gzip';Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/45d46dd8e2bd7f10c17b42f76795150d.js.gzip';Roblox.config.paths['Widgets.SurveyModal'] = 'https://js.rbxcdn.com/56ad7af86ee4f8bc82af94269ed50148.js.gzip';</script>

    
    <script>
        Roblox.XsrfToken.setToken('8cuSGUJdw+cx');
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

    
    <script type='text/javascript' src='/js/337ab3eee0ab9796417d753849d55c43.js.gzip'></script>



<div id="page-heartbeat-event-data-model"
     class="hidden"
     data-page-heartbeat-event-intervals="[2,8,20,60]">
</div>        <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "" });

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
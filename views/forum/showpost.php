<?php 
use watrlabs\watrkit\pagebuilder;
use watrbx\forums;
use watrlabs\authentication;

$pagebuilder = new pagebuilder();
$forums = new forums();
$auth = new authentication();
global $db;

$page = 1;

if(isset($_GET["PostID"])){
	$PostID = (int)$_GET["PostID"];

    $postInfo = $forums->getPostInfo($PostID);

    if($postInfo){
        $authorinfo = $auth->getuserbyid($postInfo->userid);
        $categoryinfo = $forums->getCategoryInfo($postInfo->parent);
        $headerinfo = $forums->getHeaderInfo($categoryinfo->parent);
    } else {
        http_response_code(404);
        $pagebuilder::get_template("status_codes/404");
        die();
    }

} else {
	http_response_code(404);
	$pagebuilder::get_template("status_codes/404");
	die();
}

if(isset($_GET["page"])){
    $page = (int)$_GET["page"];
    if($page < 1){
        $page = 1;
    }
}

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___52c69b42777a376ab8c76204ed8e75e2_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___f6e33d41f2d5a62b5a238c0bbdc70438_m.css');
$pagebuilder->addresource('cssfiles', '/Forum/skins/default/style/default.css');
$pagebuilder->addresource('jsfiles', '/js/92d454a11b2b7266829922801d327151.js');
$pagebuilder->addresource('jsfiles', '/js/16994b0cbe9c1d943e0de0fade860343.js');
$pagebuilder->set_page_name($postInfo->title);
$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();

?>
    <div id="AdvertisingLeaderboard">
        

        <iframe name="Roblox_Forums_Middle_728x90" 
                allowtransparency="true"
                frameborder="0"
                height="110"
                scrolling="no"
                src="/userads/1"
                width="728"
                data-js-adtype="iframead"></iframe>
        
            </div>
        
                
                <div id="BodyWrapper">
                    
                    <div id="RepositionBody">
                        <div id="Body" class='body-width'>
                            
        
            <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                <tr valign="top">
                    <!-- left column -->
                    <td>&nbsp;&nbsp;&nbsp;</td>
        
                    <!-- center column -->
                    <td id="ctl00_cphRoblox_CenterColumn" width="95%" class="CenterColumn">
                        <br>
                        <span id="ctl00_cphRoblox_PostView1">
        
        <table cellPadding="0" width="100%">
          <table cellPadding="0" width="100%">
  <tr>
    <td align="left">
        <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami1" NAME="Whereami1">
<div>
    <nobr>
        <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_LinkHome" class="linkMenuSink notranslate" href="/Forum/Default.aspx">ROBLOX Forum</a>
    </nobr>
    <nobr>
        <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_ForumGroupSeparator" class="normalTextSmallBold"> » </span>
        <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_LinkForumGroup" class="linkMenuSink notranslate" href="/Forum/ShowForumGroup.aspx?ForumGroupID=<?=$headerinfo->id?>"><?=$headerinfo->name?></a>
    </nobr>
    <nobr>
        <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_ForumSeparator" class="normalTextSmallBold"> » </span>
        <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_LinkForum" class="linkMenuSink notranslate" href="/Forum/ShowForum.aspx?ForumID=<?= $categoryinfo->id ?>"><?= $categoryinfo->title ?></a>
    </nobr>
</div></span>
            <td align="right">
                <span id="ctl00_cphRoblox_PostView1_ctl00_Navigationmenu1">
        
        <div id="forum-nav" style="text-align: right">
            <a id="ctl00_cphRoblox_PostView1_ctl00_Navigationmenu1_ctl00_HomeMenu" class="menuTextLink first" href="/Forum/Default.aspx">Home</a>
            <a id="ctl00_cphRoblox_PostView1_ctl00_Navigationmenu1_ctl00_SearchMenu" class="menuTextLink" href="/Forum/Search/default.aspx">Search</a>
        </div>
        </span>
            </td>
          </tr>
          <tr>
            <td align="left" colSpan="2">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" colSpan="2">
                <h2 id="ctl00_cphRoblox_PostView1_ctl00_PostTitle" CssClass="notranslate" style="margin-bottom:20px"><?=$postInfo->title?></h2>
            </td>
          </tr>
          <tr>
            <td vAlign="middle" align="left">
                <span class="normalTextSmallBold"></span>
            </td>
            <td vAlign="middle" align="right">
                <span class="normalTextSmallBold">Sort: </span>
                <select name="ctl00$cphRoblox$PostView1$ctl00$SortOrder" id="ctl00_cphRoblox_PostView1_ctl00_SortOrder" style="margin-bottom:5px;">
            <option selected="selected" value="0">Oldest to newest</option>
            <option value="1">Newest to oldest</option>
        
        </select>
            </td>
          </tr>
          <tr>
            <td colSpan="2">
                <table id="ctl00_cphRoblox_PostView1_ctl00_PostList" class="tableBorder" cellspacing="1" cellpadding="0" border="0" style="width:100%;">
            <tr>
                <td class="forumHeaderBackgroundAlternate" colspan="2" style="height:20px;"><table class="forum-table-header" cellspacing="0" cellpadding="0" border="0" style="width:100%;border-collapse:collapse;">
                    <tr>
                        <td align="left" style="width:50%;"></td><td class="tableHeaderText table-header-right-align" align="right"><a id="ctl00_cphRoblox_PostView1_ctl00_PostList_ctl00_PreviousThread" class="linkSmallBold" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$PostView1$ctl00$PostList$ctl00$PreviousThread&#39;,&#39;&#39;)">Previous Thread</a>&nbsp;<span class="normalTextSmallBold">::</span>&nbsp;<a id="ctl00_cphRoblox_PostView1_ctl00_PostList_ctl00_NextThread" class="linkSmallBold" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$PostView1$ctl00$PostList$ctl00$NextThread&#39;,&#39;&#39;)">Next Thread</a>&nbsp;</td>
                    </tr>
                </table></td>
            </tr><tr class="forum-post">
                <td class="forum-content-background" valign="top" style="width:150px;white-space:nowrap;"><table border="0">
                    <tr>
                        <td><img src="/Forum/skins/default/images/user_IsOffline.gif" alt="MajorTom4321 is not online." style="border-width:0px;" />&nbsp;<a class="normalTextSmallBold notranslate" href="/users/<?=$authorinfo->id?>/profile"><?=$authorinfo->username?></a><br></td>
                    </tr><tr>
                        <td><a href="/users/<?=$authorinfo->id?>/profile" style="width:100px;height:100px;position:relative;"><img src="/Thumbs/Avatar.ashx?x=100&amp;y=100&amp;Format=Png&amp;username=<?=$authorinfo->username?>" style="border-width:0px;width:100px;height:100px;" /><img src="/Thumbs/BCOverlay.ashx?username=<?=$authorinfo->username?>" style="border-width:0px;position:absolute;left:0px;bottom:0px;" /></a></td>
                    </tr>
                    
                    <?php
                        if($authorinfo->is_admin == 1){
                            echo '<tr>
                        <td><img src="/Forum/skins/default/images/users_moderator.gif" alt="Forum Moderator" style="border-width:0px;" /></td>
                    </tr>';
                        }
                    ?>

                    <tr>
                        <td><span class="normalTextSmaller"><b>Joined:</b> <?=date("d M Y", $authorinfo->regtime)?></span></td>
                    </tr><tr>
                        <td><span class="normalTextSmaller"><b>Total Posts: </b>1</span></td>
                    </tr><tr>
                        <td style="height:20px;"><span class="normalTextSmaller primaryGroupInfo notranslate" username="<?=$authorinfo->username?>" style="display:none;"></span></td>
                    </tr>
                </table></td><td class="forum-content-background" valign="top"><table cellspacing="0" cellpadding="3" border="0" style="width:100%;border-collapse:collapse;table-layout:fixed;overflow:hidden;word-wrap:break-word;">
                    <tr>
                        <td colspan="2"><span class="normalTextSmaller"><?=date('d M Y h:i A', $postInfo->date);?></span></td>
                    </tr><tr>
                        <td valign="top" colspan="2" style="height:125px;"><span class="normalTextSmall notranslate linkify"><br /><?=$postInfo->content?></td>
                    </tr><tr>
                        <td colspan="2"><span class="normalTextSmaller notranslate"></span></td>
                    </tr><?
                global $currentuser;
                if($currentuser){
                    if($currentuser->is_admin == 1){
                        ?>
                            <tr>
                    <td colspan="2"><span>

                    <table class="tableBorder" width="100%" cellpadding="3" cellspacing="0">
                    <tbody><tr>
                        <td class="forumRowHighlight" align="center">
                        <span class="normalTextSmallBold">Moderate Post: <span id="PostView1_ctl00_PostList_ctl15_0_ctl00_0_PostID_0"><?=$postInfo->id?></span> [</span>
                        <a id="PostView1_ctl00_PostList_ctl15_0_ctl00_0_DeletePost_0" class="menuTextLink" href="/Forum/Moderate/DeletePost.aspx?PostID=<?=$postInfo->id?>">Delete Post</a> 
                        <a id="PostView1_ctl00_PostList_ctl15_0_ctl00_0_EditPost_0" class="menuTextLink" href="/Forum/Moderate/EditPost.aspx?PostID=<?=$postInfo->id?>">Edit Post</a>
                        <a id="PostView1_ctl00_PostList_ctl15_0_ctl00_0_MovePost_0" class="menuTextLink" href="/Forum/Moderate/MovePost.aspx?PostID=<?=$postInfo->id?>">Move Post</a>

                        <span class="normalTextSmallBold">]</span>
                        </td>
                    </tr>
                    </tbody></table>
                    </span></td> <?
                    }
                }

            ?><tr>
                        <td align="left" style="height:29px;"></td><td align="right"><span class="post-response-options"><span class="ReportAbuse"><span class="AbuseButton"><a href="/AbuseReport/ForumPost.aspx?PostID=">Report Abuse</a></span></span></span></td>
                    </tr>
                </table></td>
            </tr>
                        
            <?php

                $postcount = $forums->getReplyCount($PostID);

                $currentpage = $page - 1;
                $displaypage = $currentpage + 1;

                $limit = 14;      

                $allpages = ceil($postcount/$limit);
                $offset = $currentpage * $limit;

                $allreplies = $forums->getReplies($PostID, $limit, $offset);

                foreach ($allreplies as $reply){
                    $authorinfo = $auth->getuserbyid($reply->userid);
                    $pagebuilder->build_component('forum/viewpost', ["postinfo"=>$reply, "userinfo"=>$authorinfo, "parentinfo"=>$postInfo]);
                }


            ?>
            
            <tr>
                <td colspan="2" style="height:20px;"><table class="forum-table-header" cellspacing="0" cellpadding="0" border="0" style="width:100%;border-collapse:collapse;">
                    <tr>
                        <td align="left" style="width:50%;"></td><td class="tableHeaderText table-header-right-align" align="right"><a id="ctl00_cphRoblox_PostView1_ctl00_PostList_ctl03_PreviousThread" class="linkSmallBold" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$PostView1$ctl00$PostList$ctl03$PreviousThread&#39;,&#39;&#39;)">Previous Thread</a>&nbsp;<span class="normalTextSmallBold">::</span>&nbsp;<a id="ctl00_cphRoblox_PostView1_ctl00_PostList_ctl03_NextThread" class="linkSmallBold" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$PostView1$ctl00$PostList$ctl03$NextThread&#39;,&#39;&#39;)">Next Thread</a>&nbsp;</td>
                    </tr>
                </table></td>
            </tr>
        </table>
                <span id="ctl00_cphRoblox_PostView1_ctl00_Pager"><table cellspacing="0" cellpadding="0" border="0" style="width:100%;border-collapse:collapse;">
            <tr>
                <td><span class="normalTextSmallBold">Page 1 of 1</span></td><td align="right"><span><span class="normalTextSmallBold">Goto to page: </span>

            <?

            for ($i = 1; $i <= $allpages; $i++) {
                echo '<a href="?PostID='.$PostID.'&page='.$i.'">'.$i.'</a>,';
            }
        ?>

        
        </td>
            </tr>
        </table></span>
            </td>
          </tr>
          <tr>
            <td colSpan="2">&nbsp;</td>
          </tr>
          <tr>
            <td align="middle" colSpan="2">
                
                
            </td>
          </tr>
          <?php if($postInfo->CanReply == 1){ ?> <tr>
                <td colSpan="2"><div style="text-align: center; margin: 5px 0;">
            <a href="/Forum/NewReply.aspx?PostID=<?=$postInfo->id?>" class="btn-control btn-control-medium verified-email-act" id="ctl00_cphRoblox_PostReply1_ctl00_NewPostReply">Add a Reply</a>
            </div></td>
            </tr> <? } ?>
          <tr>
            <td colSpan="2">&nbsp;</td>
          </tr>
          <table cellPadding="0" width="100%">
  <tr>
    <td align="left">
        <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami1" NAME="Whereami1">
<div>
    <nobr>
        <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_LinkHome" class="linkMenuSink notranslate" href="/Forum/Default.aspx">ROBLOX Forum</a>
    </nobr>
    <nobr>
        <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_ForumGroupSeparator" class="normalTextSmallBold"> » </span>
        <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_LinkForumGroup" class="linkMenuSink notranslate" href="/Forum/ShowForumGroup.aspx?ForumGroupID=<?=$headerinfo->id?>"><?=$headerinfo->name?></a>
    </nobr>
    <nobr>
        <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_ForumSeparator" class="normalTextSmallBold"> » </span>
        <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_LinkForum" class="linkMenuSink notranslate" href="/Forum/ShowForum.aspx?ForumID=<?= $categoryinfo->id ?>"><?= $categoryinfo->title ?></a>
    </nobr>
</div></span>
    </td>
    
        </table>
        </span>
                    </td>
        
                    <td>&nbsp;&nbsp;&nbsp;</td>
        
                    <!-- right column -->
                    <td id="ctl00_cphRoblox_RightColumn" nowrap="nowrap" width="160" class="RightColumn">
                        
                        <div style="height: 138px;">&nbsp;</div>
                        <div class="roblox-skyscraper" style="height: 620px; margin-top: 10px;">
                            
        
        <iframe name="Roblox_Forums_Right_160x600" 
                allowtransparency="true"
                frameborder="0"
                height="612"
                scrolling="no"
                src="/userads/2"
                width="160"
                data-js-adtype="iframead"></iframe>
        
                        </div>
                    </td>
        
                    <td>&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>
            
            <script type="text/javascript">
                var users = [];
                var groupPagePath = '/Groups/Group.aspx';
        
                $(".primaryGroupInfo").each(function (index, element) {
                    var name = $(element).attr("username");
                    if ($.inArray(name, users) == -1)
                        users.push(name);
                });
        
                $.ajax({
                    url: "/Groups/GetPrimaryGroupInfo.ashx",
                    data: { "users": users.toString() },
                    method: "GET",
                    crossDomain: true,
                    xhrFields: {
                        withCredentials: true
                    }
                }).done(function (data) {
                    if (data != null) {
                        for (var i = 0; i < users.length; i++) {
                            var username = users[i];
                            var groupInfo = data[username];
                            if (groupInfo != null) {
                                $("span[username='" + username + "']").each(function (i, e) {
                                    var groupLink = $("<a href='" + groupPagePath + "?gid=" + groupInfo.GroupId + "' title='" + groupInfo.GroupName + "'>" + fitStringToWidthSafe(groupInfo.GroupName, 120) + "</a>");
                                    $(e).append(groupLink);
                                    $(e).show();
                                });
                            }
                        }
                    }
                });
            </script>
            
            <script type="text/javascript">
                $(window).load(function () {
                    var skyscraper = $(".roblox-skyscraper").first();
                    var numAds = $("#Body").height() / skyscraper.height();
                    var adSlot = "/1015347/Roblox_Forums_Right_160x600";
                    var adFormat = "skyscraper";
                    for (var i = 2; i < numAds; i++) {
                        $.ajax({
                            url: "/advertising/javascript-ad",
                            type: "GET",
                            crossDomain: true,
                            xhrFields: {
                                withCredentials: true
                            },
                            data: {
                                AdSlot: adSlot,
                                AdFormat: adFormat
                            },
                            datatype: "html",
                            success: function (html) {
                                $("#ctl00_cphRoblox_RightColumn").append($(html));
                                Roblox.AdsHelper.DynamicAdCreator.populateNewAds();
                            }
                        });
                    }
                });
            </script>
            
                            <div style="clear:both"></div>
                        </div>
                    </div>
                </div> 
                </div>
                
                    
        <footer class="container-footer">
            <div class="footer">
                <ul class="row footer-links">
                        <li class="col-4 col-xs-2 footer-link">
                            <a href="https://corp.roblox.com" class="text-footer-nav roblox-interstitial" target="_blank">
                                About Us
                            </a>
                        </li>
                        <li class="col-4 col-xs-2 footer-link">
                            <a href="https://corp.roblox.com/jobs" class="text-footer-nav roblox-interstitial" target="_blank">
                                Jobs
                            </a>
                        </li>
                    <li class="col-4 col-xs-2 footer-link">
                        <a href="https://blog.roblox.com" class="text-footer-nav" target="_blank">
                            Blog
                        </a>
                    </li>
                    <li class="col-4 col-xs-2 footer-link">
                        <a href="/Info/Privacy.aspx" class="text-footer-nav" target="_blank">
                            Privacy
                        </a>
                    </li>
                    <li class="col-4 col-xs-2 footer-link">
                        <a href="https://corp.roblox.com/parents" class="text-footer-nav roblox-interstitial" target="_blank">
                            Parents
                        </a>
                    </li>
                    <li class="col-4 col-xs-2 footer-link">
                        <a href="https://en.help.roblox.com/" class="text-footer-nav roblox-interstitial" target="_blank">
                            Help
                        </a>
                    </li>
                </ul>
                <p class="text-footer footer-note">
                    ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a target="_blank" href="https://corp.roblox.com" class="text-link roblox-interstitial">ROBLOX Corporation</a>, ©2016.
                    Patents pending. ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
                    Use of this site signifies your acceptance of the <a href="/info/terms-of-service" target="_blank" class="text-link">Terms and Conditions</a>.
                </p>
            </div>
        </footer>
        
        
        
                
                </div></div>
            </div>
            
                <script type="text/javascript">
                    function urchinTracker() { };
                    GoogleAnalyticsReplaceUrchinWithGAJS = true;
                </script>
            
        
            </form>
            
            
            
        
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
        
        <script type='text/javascript' src='https://js.rbxcdn.com/1ba208cf31fb5a6a592b902955c8770b.js'></script>
        
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
        
        
        <div id="PlaceLauncherStatusPanel" style="display:none;width:300px"
             data-new-plugin-events-enabled="True"
             data-event-stream-for-plugin-enabled="True"
             data-event-stream-for-protocol-enabled="True"
             data-is-protocol-handler-launch-enabled="False"
             data-is-user-logged-in="False"
             data-os-name="Unknown"
             data-protocol-name-for-client="roblox-player"
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
                    <img src="https://images.rbxcdn.com/e060b59b57fdcc7874c820d13fdcee71.svg" width="90" height="90" alt="R" />
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
                    <span class="icon-close simplemodal-close"></span>
                </div>
                <div class="ph-logo-row">
                    <img src="https://images.rbxcdn.com/e060b59b57fdcc7874c820d13fdcee71.svg" width="90" height="90" alt="R" />
                </div>
                <div class="ph-areyouinstalleddialog-content">
                    <p class="larger-font-size">
                        You're moments away from getting into the game!
                    </p>
                    <div>
                        <button type="button" class="btn btn-primary-md" id="ProtocolHandlerInstallButton">
                            Download and Install ROBLOX
                        </button>
                    </div>
                    <div class="small">
                        <a href="https://en.help.roblox.com/hc/en-us/articles/204473560" class="text-name" target="_blank">Click here for help</a>
                    </div>
        
                </div>
            </div>
        </div>
        <div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
            <p class="larger-font-size">
                <span class="icon-moreinfo"></span>
                Check <b>Remember my choice</b> and click <img src="https://images.rbxcdn.com/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application" />  in the dialog box above to join games faster in the future!
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
                Choose Your Avatar
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
                        <a href="/?returnUrl=http%3A%2F%2Fforum.roblox.com%2FForum%2FShowPost.aspx%3FPostID%3D112156401"><div class="RevisedCharacterSelectSignup"></div></a>
                        <a class="HaveAccount" href="https://www.roblox.com/newlogin?returnUrl=http%3A%2F%2Fforum.roblox.com%2FForum%2FShowPost.aspx%3FPostID%3D112156401">I have an account</a>
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            function checkRobloxInstall() {
                         window.location = '/install/unsupported.aspx'; return false;
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
                        
                                    
                        Roblox.CookieUpgrader.upgrade("RBXEventTrackerV2", {expires: Roblox.CookieUpgrader.thirtyYearsFromNow});
                        
                });
            </script>
            <script>

        //hacky workaround until I can fix it not working on legacy pages
        // leancore/Navigation.js
$(function() {
    "use strict";
    function h() {
        return $("#nav-friends").data().count
    }
    function e(n, t) {
        if (n == 0)
            return "";
        if (n < t)
            return n.toString();
        switch (t) {
        case f:
            return "1k+";
        case u:
            return "99+";
        default:
            return ""
        }
    }
    function o(n) {
        var f = h(), i = n + f, t = $(".rbx-nav-collapse .rbx-nav-notification"), r;
        if (i == 0 && !t.hasClass("hide")) {
            t.addClass("hide");
            return
        }
        r = e(i, u),
        t.html(r),
        i > 0 && t.removeClass("hide"),
        t.attr("title", i)
    }
    function c() {
        var n = "/navigation/getCount";
        $.ajax({
            url: n,
            success: function(n) {
                var t = $("#nav-friends")
                  , i = t.find(".rbx-highlight");
                t.attr("href", n.FriendNavigationUrl),
                t.data("count", n.TotalFriendRequests),
                i.html(n.DisplayCountFriendRequests),
                i.attr("title", n.TotalFriendRequests),
                o(n.TotalFriendRequests)
            }
        })
    }
    function a(n) {
        var i = $('[data-behavior="univeral-search"] .rbx-navbar-search-option')
          , t = -1;
        $.each(i, function(n, i) {
            $(i).hasClass("selected") && ($(i).removeClass("selected"),
            t = n)
        }),
        t += n.which === 38 ? i.length - 1 : 1,
        t %= i.length,
        $(i[t]).addClass("selected")
    }
    var s;
    ($(".rbx-left-col").length == 0 || $(".rbx-left-col").width() == 0) && ($("#header-login").length != 0 || $("#GamesListsContainer").length != 0) && ($("#navContent").css({
        "margin-left": "0px",
        width: "100%"
    }),
    $("#navContent").addClass("nav-no-left")),
    $(window).resize(function() {
        ($(".rbx-left-col").length == 0 || $(".rbx-left-col").width() == 0) && ($("#header-login").length != 0 || $("#GamesListsContainer").length != 0) ? ($("#navContent").css({
            "margin-left": "0px",
            width: "100%"
        }),
        $("#navContent").addClass("nav-no-left")) : $("#navContent").css({
            "margin-left": "",
            width: ""
        })
    });
    var u = 99
      , f = 1e3
      , i = 1;
    $(document).on("Roblox.Messages.CountChanged", function() {
        var n = Roblox.websiteLinks.GetMyUnreadMessagesCountLink;
        $.ajax({
            url: n,
            success: function(n) {
                var t = $("#nav-message span.rbx-highlight")
                  , i = e(n.count, f);
                t.html(i),
                t.attr("title", n.count),
                o(n.count)
            }
        })
    }).on("Roblox.Friends.CountChanged", c);
    $('[data-behavior="nav-notification"]').click(function() {
        $('[data-behavior="left-col"]').toggleClass("nav-show", 100)
    });
    var t = $("#navbar-universal-search")
      , n = $("#navbar-universal-search #navbar-search-input")
      , r = $("#navbar-universal-search .rbx-navbar-search-option")
      , l = $("#navbar-universal-search #navbar-search-btn");
    n.on("keydown", function(n) {
        var t = $(this).val();
        (n.which === 9 || n.which === 38 || n.which === 40) && t.length > 0 && (n.stopPropagation(),
        n.preventDefault(),
        a(n))
    });
    n.on("keyup", function(n) {
        var r = $(this).val(), u, f;
        n.which === 13 ? (n.stopPropagation(),
        n.preventDefault(),
        u = t.find(".rbx-navbar-search-option.selected"),
        f = u.data("searchurl"),
        r.length >= i && (window.location = f + encodeURIComponent(r))) : r.length > 0 ? (t.toggleClass("rbx-navbar-search-open", !0),
        $('[data-toggle="dropdown-menu"] .rbx-navbar-search-string').text('"' + r + '"')) : t.toggleClass("rbx-navbar-search-open", !1)
    });
    l.click(function(t) {
        t.stopPropagation(),
        t.preventDefault();
        var r = n.val()
          , u = $("#navbar-universal-search .rbx-navbar-search-option.selected")
          , f = u.data("searchurl");
        r.length >= i && (window.location = f + encodeURIComponent(r))
    });
    r.on("click touchstart", function(t) {
        var r, u;
        t.stopPropagation(),
        r = n.val(),
        r.length >= i && (u = $(this).data("searchurl"),
        window.location = u + encodeURIComponent(r))
    });
    r.on("mouseover", function() {
        r.removeClass("selected"),
        $(this).addClass("selected")
    });
    n.on("focus", function() {
        var i = n.val();
        i.length > 0 && t.addClass("rbx-navbar-search-open")
    });
    $('[data-toggle="toggle-search"]').on("click touchstart", function(n) {
        return n.stopPropagation(),
        $('[data-behavior="univeral-search"]').toggleClass("show"),
        !1
    });
    $(".rbx-navbar-right").on("click touchstart", '[data-behavior="logout"]', function(n) {
        var i, t;
        n.stopPropagation(),
        n.preventDefault(),
        i = $(this),
        typeof angular == "undefined" || angular.isUndefined(angular.element("#chat-container").scope()) || (t = angular.element("#chat-container").scope(),
        t.$digest(t.$broadcast("Roblox.Chat.destroyChatCookie"))),
        $.post(i.attr("data-bind"), {
            redirectTohome: !1
        }, function() {
            window.location.href = "/"
        })
    });
    $("#nav-robux-icon").on("show.bs.popover", function() {
        $("body").scrollLeft(0)
    });
    s = function(n) {
        var t, i;
        n.indexOf("resize") != -1 && (t = n.split(","),
        $("#iframe-login").css({
            height: t[1]
        })),
        n.indexOf("fbRegister") != -1 && (t = n.split("^"),
        i = "&fbname=" + encodeURIComponent(t[1]) + "&fbem=" + encodeURIComponent(t[2]) + "&fbdt=" + encodeURIComponent(t[3]),
        window.location.href = "../Login/Default.aspx?iFrameFacebookSync=true" + i)
    }
    ,
    $.receiveMessage(function(n) {
        s(n.data)
    });
    $("body").on("click touchstart", function(n) {
        $('[data-behavior="univeral-search"]').each(function() {
            $(this).is(n.target) || $(this).has(n.target).length !== 0 || $(this).removeClass("rbx-navbar-search-open"),
            $(this).has(n.target).length === 0 && $('[data-toggle="toggle-search"]').has(n.target).length === 0 && $('[data-behavior="univeral-search"]').css("display") === "block" && $('[data-behavior="univeral-search"]').removeClass("show")
        })
    })
});    
    </script>
        
        </body>                
        </html>
        
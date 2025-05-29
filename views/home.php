<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$pagebuilder = new pagebuilder();
$auth = new authentication();
$auth->requiresession();

$userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);

if($userinfo->membership !== "None"){
    if($userinfo->membership == "OutrageousBuildersClub"){
        $bc = '<span class="rbx-icon-obc"></span>';
    } elseif ($userinfo->membership == "TurboBuildersClub"){
        $bc = '<span class="rbx-icon-tbc"></span>';
    } else {
        $bc = '<span class="rbx-icon-bc"></span>';
    }
} else {
    $bc = null;
}

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=leanbase___f9e2a82b042c4b4f945b16e30fb19e87_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___0513ca5a00c9bdedff82380744b7def6_m.css');
$pagebuilder->addresource('jsfiles', '/js/2bd19c8fa2a972c94ed086573ec302cd.js.gzip');
$pagebuilder->set_page_name("Home");
$pagebuilder->buildheader();
?>

<div class="content  ">
              <div id="Skyscraper-Adp-Left" class="abp abp-container left-abp">
                <iframe allowtransparency="true" frameborder="0" height="612" scrolling="no" src="/userads/2" width="160" data-js-adtype="iframead"></iframe>
              </div>
              <div id="HomeContainer" class="row home-container" data-facebook-share="/facebook/share-character" data-update-status-url="/home/updatestatus" data-should-show-enable-two-step-verification-call-to-action=True>
                <div class="col-xs-12 home-header">
                  <a href="/User.aspx" class="home-thumbnail-bust">
                    <img alt="avatar" src="/headshot.png" />
                  </a>
                  <div class="home-header-content ">
                    <h1>
                      <a href="/User.aspx">Hello, <?=$userinfo->username?>!</a>
                    </h1>
                        <? if(isset($bc)){ echo $bc; } ?>
                  </div>
                </div>
                <div class="col-xs-12 section home-friends">
                  <div class="container-header">
                    <h3>Friends (4)</h3>
                    <a href="/friends.aspx#FriendsTab" class="rbx-btn-secondary-xs btn-more">See All</a>
                  </div>
                  <ul class="hlist friend-list">
                    <li class="list-item friend">
                      <a href="/users/2/profile" class="friend-link" title="watrabi">
                        <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=72230447" data-js-files='/js/47e6e85800c4ed3c4eef848c077575a9.js.gzip'>
                          <img alt='watrabi' class='' src='/images/user.png' />
                        </span>
                        <span class="friend-name rbx-text-overflow">watrabi</span>
                        <span class="friend-status rbx-icon-online" title="Website"></span>
                      </a>
                    </li>
                    <li class="list-item friend">
                      <a href="/users/3/profile" class="friend-link" title="watrabi">
                        <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=72230447" data-js-files='/js/47e6e85800c4ed3c4eef848c077575a9.js.gzip'>
                          <img alt='watrabi' class='' src='/images/user.png' />
                        </span>
                        <span class="friend-name rbx-text-overflow">sword</span>
                        <span class="friend-status rbx-icon-instudio" title="In Studio"></span>
                      </a>
                    </li>
                    <li class="list-item friend">
                      <a href="/users/5/profile" class="friend-link" title="watrabi">
                        <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=72230447" data-js-files='/js/47e6e85800c4ed3c4eef848c077575a9.js.gzip'>
                          <img alt='watrabi' class='' src='/images/user.png' />
                        </span>
                        <span class="friend-name rbx-text-overflow">MugMan</span>
                        <span class="friend-status rbx-icon-ingame" title="In Game"></span>
                      </a>
                    </li>
                    <li class="list-item friend">
                      <a href="/users/149/profile" class="friend-link" title="watrabi">
                        <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=72230447" data-js-files='/js/47e6e85800c4ed3c4eef848c077575a9.js.gzip'>
                          <img alt='watrabi' class='' src='/images/user.png' />
                        </span>
                        <span class="friend-name rbx-text-overflow">jamesniche</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div id="recently-visited-places" class="col-xs-12 container-list home-games">
                  <div class="container-header">
                    <h3>Recommended Games</h3>
                    <a href="/games?sortFilter=6" class="rbx-btn-secondary-xs btn-more">See All</a>
                  </div>
                  <ul class="hlist game-list">
                    <?php
                        global $db;

                        $query = $db->table("universes")->where("public", 1)->limit(6)->orderBy($db->Raw("RAND()"));

                        $allgames = $query->get();

                        foreach($allgames as $game){ 

                            echo $pagebuilder->build_component("game", ["game"=>$game]);

                            
                        }
?>
                  </ul>
                </div>
                <div class="col-xs-12 col-sm-6 home-right-col">
                  <div class="section">
                    <div class="section-header">
                      <h3>Blog News</h3>
                      <a href="http://blog.roblox.com" class="rbx-btn-control-xs btn-more">See More</a>
                    </div>
                    <ul class="blog-news">
                      <li class="news">
                        <span class="rbx-icon-page"></span>
                        <span class="news-link">
                          <a href="http://blog.roblox.com/2015/09/get-free-hats-win-prizes-in-the-endless-summer-camp-out/" ref="news-article" class="roblox-interstitial rbx-link rbx-article-title">Get Free Hats &amp; Win Prizes in the Endless Summer Camp Out!</a>
                        </span>
                      </li>
                      <li class="news">
                        <span class="rbx-icon-page"></span>
                        <span class="news-link">
                          <a href="http://blog.roblox.com/2015/09/new-profile-pages-add-new-features-for-interacting-with-friends/" ref="news-article" class="roblox-interstitial rbx-link rbx-article-title">New Profile Pages Add New Features for Interacting With Friends</a>
                        </span>
                      </li>
                    </ul>
                  </div>
                  <div id="FacebookConnectCard" class="section">
                    <h3> CONNECT WITH FACEBOOK </h3>
                    <p>Link your ROBLOX account with your Facebook account to let your Facebook friends see what you're doing on ROBLOX!</p>
                    <div id="connect-facebook">
                      <div id="SocialIdentitiesInformation" data-rbx-login="/social/notify-login" data-rbx-update="/social/update-info" data-rbx-disconnect="/social/disconnect" data-rbx-login-redirect-url="/social/postlogin" data-user-is-authenticated></div>
                      <div class="connect-button" data-rbx-provider="facebook" style="background-image:url('https://cdns3.gigya.com/gs/GetSprite.ashx?path=%2FHTMLLogin%2FFullLogo%2F%5Bfacebook%5D_30.png%7C78%2C30');width:78px;height:30px;background-repeat:no-repeat"></div>
                      <div class="disconnect-link" data-rbx-provider="facebook"></div>
                      <div class="nickname"></div>
                    </div>
                  </div>
                </div>
                <!-- .home-right-col -->
                <div class="col-xs-12 col-sm-6 home-left-col">
                  <div class="section">
                    <div class="section-header">
                      <h3>My Feed</h3>
                    </div>
                    <div class="rbx-form-horizontal" id="statusForm" role="form">
                      <div class="rbx-form-group">
                        <input class="form-control rbx-input-field" id="txtStatusMessage" maxlength="254" placeholder="What are you up to?"/>
                        <p class="rbx-control-label">Status update failed.</p>
                      </div>
                      <a type="button" class="rbx-btn-primary-sm" id="shareButton">Share</a>
                      <img id="loadingImage" class="share-login" style="display: none" alt="Sharing..." src="/images/ec4e85b0c4396cf753a06fade0a8d8af.gif" height="17" width="48" />
                    </div>
                    <span class="rbx-icon-charactercustomizer"></span>
                    
                    <ul class="vlist feeds">
                      <li class="list-item">
                        <a href="/My/Groups.aspx?gid=950346" class="list-header">
                          <img class='header-thumb' src='/images/user.png' />
                        </a>
                        <div class="list-body">
                          <p class="list-content">
                            <a href='/My/Groups.aspx?gid=0'>watrbx</a>
                          <div class='feedtext linkify'>"hi"</div> (posted by <a href='/User.aspx?ID=2' class='rbx-title'>watrabi</a>) </p>
                          <span class="rbx-text-notes rbx-font-sm">9/6/2015 at 2:30 PM</span>
                          <a href="/abusereport/Feed?id=0">
                            <span class="rbx-icon-report"></span>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div id="Skyscraper-Adp-Right" class="abp abp-container right-abp">
                <iframe allowtransparency="true" frameborder="0" height="612" scrolling="no" src="/userads/2" width="160" data-js-adtype="iframead"></iframe>
              </div>
            </div>
          </div>
          <div id="fb-root"></div>
          <script>
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s);
              js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0&appId=e58f2110adf82c2c00e6ae41c665510c";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
          </script>
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
                  <a href="//blog.roblox.com" class="roblox-interstitial" target="_blank">
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
              <p class="footer-note"> ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a target="_blank" href="//corp.roblox.com" class="rbx-link roblox-interstitial">ROBLOX Corporation</a>, ©2015. Patents pending. ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended. Use of this site signifies your acceptance of the <a href="/info/terms-of-service" target="_blank" class="rbx-link">Terms and Conditions</a>. </p>
            </div>
          </footer>
          <script src="https://apis.google.com/js/platform.js"></script>
        </div>
        <div id="ChatContainer" class="chat-container">
          <div id="friend_dock_chattemplate" style="display: none;">
            <div id="CHATUSERID_friend_dock_chatbox" userid="CHATUSERID" class="friend_dock_chatbox">
              <div class="friend_dock_chatbox_titlebar chat-header-blink-off" userid="CHATUSERID">
                <div class="friend_dock_chatbox_username">
                  <a style="color: #fff" class="friend_dock_chatbox_username_display" href="/user.aspx?id=CHATUSERID">CHATUSERNAME</a>
                  <a class="friend_dock_chatbox_username_abuse" style="color: #fff; font-size: 9px; line-height: 14px; cursor: pointer" alt="Report Abuse" href="#" onclick=" ChatBar.ReportAbuse(CHATUSERID); return false; ">(Report)</a>
                </div>
                <div class="friend_dock_chatbox_closebutton">
                  <a href="#" style="color: #fff" onclick=" ChatBar.CloseChat($(this).parents('.friend_dock_chatbox').filter(':first'));return false; ">-</a>
                </div>
              </div>
              <div class="friend_dock_chatbox_currentlocation" style="margin: 10px; height: 18px"></div>
              <div id="CHATUSERID_friend_dock_chatbox_chat" class="friend_dock_chatbox_chat"></div>
              <textarea class="friend_dock_chatbox_entry" maxlength="255"></textarea>
            </div>
          </div>
          <div id="friend_dock_friendtemplate" style="display: none;">
            <div id="UID_CURRTAB_friend" userid="UID" username="USERNAME" class="friend_dock_friend">
              <div id="UID_CURRTAB_onlinestatus" class="friend_dock_onlinestatus"></div>
              <div id="UID_CURRTAB_offlinestatus" class="friend_dock_offlinestatus"></div>
              <div id="UID_CURRTAB_dropdown" class="friendBarDropDown" userid="UID" username="USERNAME" style="display: none">
                <div id="UID_CURRTAB_dropdownbutton" class="friend-bar-dropdown-button"></div>
                <div id="UID_CURRTAB_dropdownlist" class="friendBarDropDownList">
                  <ul>
                    <li onclick=" Party.InviteUser('USERNAME'); " startpartydisplay>
                      <div>Invite To Party</div>
                    </li>
                    <li class="StartChat" onclick=" ChatBar.ToggleChat('UID', 'USERNAME'); " startchattingdisplay userid="UID">
                      <div>Start Chatting</div>
                    </li>
                    <li onclick=" window.location.href = '/user.aspx?id=UID'; ">
                      <div>View Profile</div>
                    </li>
                    <li class="EndChat" style="display: none" onclick=" ChatBar.RemoveActiveChat(this); " userid="UID">
                      <div>End Chat</div>
                    </li>
                  </ul>
                </div>
              </div>
              <img thumbnail_holder alt="" onclick=" ChatBar.ToggleChat('UID', 'USERNAME'); return false; " width="48" height="48" class="ActiveChatThumb" />
              <div class="friend_dock_username">
                <span class="friend_dock_username_href">USERNAMETRUNCATED</span>
              </div>
            </div>
          </div>
          <div style="position: relative;">
            <div id="friend_dock_chatholder" style="display:none;"></div>
            <div id="party-container" style="display: none; margin-left: 10px; float: right; position: absolute;">
              <div id="partyMemberTemplate" style="display:none;height:32px">
                <div id="party_pendinguserid_UID" style="clear:both;">
                  <dt style="position:relative;">
                    <span id="UID_status" class="friend_dock_offlinestatus"></span> [PARTY_MEMBER_THUMBNAIL]
                  </dt>
                  <dd>
                    <span>[PARTY_MEMBER_NAME]</span>&nbsp;&nbsp;&nbsp;
                    <!--<span class="party-report-container"></span><span class="party-kick-container"></span>-->[PARTY_MEMBER_REPORT][PARTY_KICK_MEMBER]
                  </dd>
                </div>
              </div>
              <script type="text/javascript" language="javascript">
                Party.CurrentUserID = 58633247;
                Party.CurrentUserName = "watrabi";
                Party.ActiveView = "";
                Party.PollThreadAvailable = true;
                Party.FirstLoad = true;
                Party.PollIntervalTimer = null;
                Party.MaxPartySize = 6;
                Party.PlayEnabled = true;
                /*
                                                    <sl:translate_json>*/
                Party.Resources = {
                  areYouSureReport: 'Are you sure you would like to report ',
                  report: "Report",
                  kick: "Kick from party",
                  pending: "Pending...",
                  partyInvite: "Party Invite!",
                  partyGameBlurb: "When the party leader joins a game, the rest of the party will be invited to follow",
                  inviteInstructions: "Please type the name of the user you wish to invite",
                  partyFull: "Your party is already full!",
                  joinConfirm1: "The party leader has joined ",
                  joinConfirm2: ".  Would you like to join?",
                  joinConfirm3: "You will be removed from any game you might be playing.",
                  enterUserName: 'Enter username'
                };
                /*</sl:translate_json>*/
                Party.SetGoogleAnalyticsCallback = function(placeId) {
                  RobloxLaunch._GoogleAnalyticsCallback = function() {
                    var isInsideRobloxIDE = 'website';
                    if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                      isInsideRobloxIDE = 'Studio';
                    };
                    GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
                    GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
                    EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin');
                    if (typeof Roblox.GamePlayEvents != 'undefined') {
                      Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
                    }
                  };
                }
              </script>
              <script type="text/javascript" language="javascript">
                try {
                  $(function() {
                    $(function() {
                      Party.ProcessPolledData(eval(({
                        "Error": "User not found in party"
                      })));
                      Party.OnPageLoad();
                    });
                  });
                } catch (ex) {}
              </script>
              <div class="party-window" id="party_none">
                <div id="party_none_title" class="title" onclick="Party.ToggleTab(false)">
                  <span>Party</span>
                  <div class="closeparty">-</div>
                </div>
                <div class="main">
                  <div id="new_party">
                    <p>You are not in a party. To create a party, just invite someone:</p>
                    <p>
                      <input type="text" id="new_party_invite_name" class="party-invite-box" onkeydown="return Party.ProcessKey('new_party_invite_name',event)" />
                      <input type="button" class="translate" onclick="Party.DoInvite('new_party_invite_name')" value="Invite" />
                    </p>
                  </div>
                  <div class="clear" id="new_party_clear"></div>
                </div>
              </div>
              <div class="party-window" id="party_loading" style="display:none;">
                <div id="party_loading_title" class="title" onclick="Party.ToggleTab(false)">
                  <span>Party</span>
                  <div class="closeparty">-</div>
                </div>
                <div class="main">
                  <div>
                    <p>Invitation sent.</p>
                    <p>Creating party...</p>
                  </div>
                </div>
              </div>
              <div class="party-window" id="party_pending" style="display:none;">
                <div id="party_pending_title" class="title" onclick="Party.ToggleTab(false)">
                  <span>Party</span>
                  <div class="closeparty">-</div>
                </div>
                <div class="main">
                  <div id="invite-header">RobloTim wants to party with you!</div>
                  <div class="members">
                    <dl id="party_invite_list"></dl>
                  </div>
                  <div id="invite_status">
                    <p>
                      <span>Waiting for Leader to play a game</span>
                    </p>
                  </div>
                  <div class="party-invite-buttons">
                    <div class="btn-primary btn-small">
                      <a href="#" class="party-btn-link" onclick="Party.AcceptInvite();return false;">Join Party</a>
                    </div>
                    <div class="btn-negative btn-small">
                      <a href="#" class="party-btn-link" onclick="Party.DeclineInvite();return false;">Ignore</a>
                    </div>
                  </div>
                  <div class="clear" id="invite_clear"></div>
                </div>
              </div>
              <div class="party-window" id="party_my" style="display:none;">
                <div id="party_my_title" class="title" onclick="Party.ToggleTab(false)">
                  <span>Party</span>
                  <div class="closeparty">-</div>
                </div>
                <div class="main">
                  <div class="members">
                    <dl id="party_member_list"></dl>
                  </div>
                  <p id="party_invite_instructions">
                    <span>
                      <input type="text" id="party_my_invite_name" class="party-invite-box" onkeydown="return Party.ProcessKey('party_my_invite_name',event)" />
                      <input type="button" class="translate" onclick="Party.DoInvite('party_my_invite_name')" value="Invite" />
                    </span>
                  </p>
                  <div id="chat_messages"></div>
                  <div id="chat_input">
                    <textarea name="comments" rows="2" cols="27" id="comments" tabindex="4" title="comments"></textarea>
                  </div>
                  <div id="party-auto-follow-setting" style="padding: 5px; text-align: center">
                    <input id="auto-follow-party-leader" type="checkbox" />
                    <label for="auto-follow-party-leader">Automatically follow party leader</label>
                    <script type="text/javascript">
                      $("#auto-follow-party-leader").prop('checked', $.cookie('AutoFollowPartyLeader') != 'false');
                      $("#auto-follow-party-leader").on("click", function() {
                        // every time I join a party in the future, this cookie will determine whether or not I automatically follow the party leader
                        if (ChatBar && ChatBar.UseSubdomainlessCookies) {
                          $.cookie('AutoFollowPartyLeader', null, {
                            path: '/'
                          }); // clear old cookie, if it exists
                          $.cookie('AutoFollowPartyLeader', this.checked, {
                            domain: ChatBar.CookieDomain,
                            path: '/',
                            expires: 365
                          });
                        } else {
                          if (ChatBar && ChatBar.NewCookieRollbackEnabled) {
                            // delete the subdomainlesscookie, if we are rolling back
                            $.cookie('AutoFollowPartyLeader', null, {
                              domain: ChatBar.CookieDomain,
                              path: '/',
                              expires: 365
                            });
                          }
                          $.cookie('AutoFollowPartyLeader', this.checked, {
                            path: '/',
                            expires: 365
                          });
                        }
                        $.ajax({
                          method: "GET",
                          url: "/chat/party.ashx",
                          data: {
                            reqtype: "autoFollowPartyLeader"
                          },
                          crossDomain: true,
                          xhrFields: {
                            withCredentials: true
                          }
                        }).done();
                      });
                    </script>
                  </div>
                  <div id="party_current_game">
                    <table border="0" style="padding: 0px; margin: 0px; border: 0px;">
                      <tr style="padding: 0px; margin: 0px; border: 0px;">
                        <td style="padding: 0px; margin: 0px; border: 0px;">
                          <div id="party_game_thumb"></div>
                        </td>
                        <td style="padding: 0px; margin: 0px; border: 0px;">
                          <div id="party_game_name" style="float: right;"></div>
                          <span id="party_game_follow_me" class="btn-primary btn-small">
                            <a href="#" class="party-btn-link" onclick="Party.JoinGameWithParty();return false;">Follow</a>
                          </span>
                          <span class="btn-neutral btn-small">
                            <a href="#" class="party-btn-link" onclick="Party.DeclineInvite();return false;">Leave Party</a>
                          </span>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="clear" id="leader_clear"></div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div id='friend_dock_minimized_container' style="">
            <div id="social-dock-tab" class="tab" style="float: right">
              <a id="minChatsTab" href="#">
                <span onclick=" ChatBar.ShowFriends();return false; ">
                  <img src="/images/164e80229d83c8b6e55b1eb671887e54.png" width="9" height="9" style="border: none" /> Online </span>
              </a>
            </div>
          </div>
          <div id="friend_dock_container" style="display:none;">
            <div id="friend_dock_titlebar">
              <div class="tab-container" style="float: left;">
                <div class="tab">
                  <a id="friends-tab" style="text-decoration: none" href="#" onclick=" ChatBar.TogglePanel('friends-tab');return false; ">
                    <span>Online Friends</span>
                  </a>
                </div>
                <div class="tab">
                  <a id="recents-tab" style="text-decoration: none" href="#" onclick=" ChatBar.TogglePanel('recents-tab');return false; ">
                    <span>Recent</span>
                  </a>
                </div>
                <div class="tab">
                  <a id="chats-tab" style="text-decoration: none" href="#" onclick=" ChatBar.TogglePanel('chats-tab');return false; ">
                    <span>Chats</span>
                  </a>
                </div>
              </div>
              <span class="tab-container" style="float: right;">
                <div class="tab" id="party-tab" onclick=" Party.ToggleTab(null); return false; ">
                  <a href="#">Party</a>
                </div>
                <span class="friend_dock_chatsettings" style="display: none">
                  <div style="padding: 10px">
                    <div class="chat_settings_group_header">Chat Notifications:</div>
                    <input type="radio" id="chat_settings_soundon" name="rdoNotifications" checked="checked" />
                    <b>All</b>
                    <br />
                    <input type="radio" id="chat_settings_soundoff" name="rdoNotifications" />
                    <b>None</b>
                    <br />
                    <div style="text-align: center; margin-top: 5px;">
                      <input type="button" onclick=" ChatBar.ApplySettings();$('.friend_dock_chatsettings').hide(); " value="Save">
                    </div>
                  </div>
                </span>
                <div id="social-settings-tab" class="tab">
                  <a onclick=" $('.friend_dock_chatsettings').toggle(); return false " href="#">Settings</a>&amp;nbsp;&amp;nbsp;&amp;nbsp; <img src="/images/8a762994af1e122de8ac427005ac3d9b.png" onclick=" ChatBar.HideFriends();return false; " width="12" height="13" style="border: none; cursor: pointer" alt="Close chat" />
                </div>
              </span>
            </div>
            <div id="friend_dock_thumb_container">
              <div id="friends-tab-dock-thumbnails" style="display: none">
                <div id="friends-tab-dock-thumbnails-empty">No results found. Find some friends <a href="/Browse.aspx">here</a>. </div>
              </div>
              <div id="best-friends-tab-dock-thumbnails" style="float: left; display: none">
                <div id="best-friends-tab-dock-thumbnails-empty">No results? Start off by <a href="/my/editfriends.aspx">adding some Best Friends.</a>
                </div>
              </div>
              <div id="recents-tab-dock-thumbnails" style="float: left; display: none">
                <div id="recents-tab-dock-thumbnails-empty">You have not had any recent interactions.</div>
              </div>
              <div id="chats-tab-dock-thumbnails" style="float: left; display: none">
                <div id="chats-tab-dock-thumbnails-empty">You are not currently chatting with anyone.</div>
              </div>
            </div>
          </div>
          <div id="jPlayerDiv"></div>
          <script type="text/javascript">
            if (typeof Roblox === "undefined") {
              Roblox = {};
            }
            if (typeof Roblox.Chat === "undefined") {
              Roblox.Chat = {};
            }
            Roblox.Chat.Resources = {
              //
              < sl: translate > reportConfirm: 'Are you sure you would like to report this user?',
              sendPersonalMessage1: 'This user may be offline.  They will receive your messages when they login, or you can send them a ',
              sendPersonalMessage2: 'Personal Message',
              loadingChat: 'Loading Chat',
              offline: 'Offline',
              online: 'Online',
              newMessage: 'New Message!',
              newMessages: 'New Messages!'
              //</sl:translate>
            };
            ChatBar.FriendsEnabled = 'True';
            ChatBar.PartyEnabled = 'True';
            ChatBar.MyUserName = "watrabi";
            ChatBar.MaxChatWindows = 4;
            ChatBar.ChatPollInterval = 2000;
            ChatBar.IdleChatPollInterval = 6000;
            ChatBar.FriendsPollInterval = 40000;
            ChatBar.RecentsPollInterval = 32000;
            ChatBar.ChatReceivedSoundFile = "/chat/sound/chatsound.mp3";
            ChatBar.ChatNotificationsSetting = 'All';
            ChatBar.DiagnosticsEnabled = false;
            ChatBar.jPlayerVersion = '2.9.2';
            ChatBar.SetGoogleAnalyticsCallback = function() {
              RobloxLaunch._GoogleAnalyticsCallback = function() {
                var isInsideRobloxIDE = 'website';
                if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                  isInsideRobloxIDE = 'Studio';
                };
                GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
                GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
                EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin');
                if (typeof Roblox.GamePlayEvents != 'undefined') {
                  Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
                }
              };
            }
            $(function() {
              try {
                ChatBar.OnPageLoad();
              } catch (x) {}
            });
          </script>
        </div>
        <script type="text/javascript">
          function urchinTracker() {}
        </script>
        <div id="PlaceLauncherStatusPanel" style="display:none;width:300px" data-new-plugin-events-enabled="True" data-event-stream-for-plugin-enabled="True" data-event-stream-for-protocol-enabled="True" data-is-protocol-handler-launch-enabled="True" data-is-user-logged-in="True" data-os-name="Windows" data-protocol-name-for-client="roblox-player" data-protocol-name-for-studio="roblox-studio" data-protocol-url-includes-launchtime="true" data-protocol-detection-enabled="true">
          <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
            <div id="Spinner" class="Spinner" style="padding:20px 0;">
              <img src="/images/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress" />
            </div>
            <div id="status" style="min-height:40px;text-align:center;margin:5px 20px">
              <div id="Starting" class="PlaceLauncherStatus MadStatusStarting" style="display:block"> Starting Roblox... </div>
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
            <div class="ph-modal-header"></div>
            <div class="ph-logo-row">
              <img src="/images/Logo/logo_meatball.svg" width="90" height="90" alt="R" />
            </div>
            <div class="ph-areyouinstalleddialog-content">
              <p class="larger-font-size"> ROBLOX is now loading. Get ready to play! </p>
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
              <p class="larger-font-size"> You're moments away from getting into the game! </p>
              <div>
                <button type="button" class="btn rbx-btn-primary-sm" id="ProtocolHandlerInstallButton"> Download and Install ROBLOX </button>
              </div>
              <div class="rbx-small rbx-text-notes">
                <a href="https://en.help.roblox.com/hc/en-us/articles/204473560" class="rbx-link" target="_blank">Click here for help</a>
              </div>
            </div>
          </div>
        </div>
        <div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
          <p class="larger-font-size">
            <span class="rbx-icon-moreinfo"></span> Check <b>Remember my choice</b> and click <img src="/images/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application" /> in the dialog box above to join games faster in the future!
          </p>
        </div>
        <div id="videoPrerollPanel" style="display:none">
          <div id="videoPrerollTitleDiv"> Gameplay sponsored by: </div>
          <div id="content">
            <video id="contentElement" style="width:0; height:0;" />
          </div>
          <div id="videoPrerollMainDiv"></div>
          <div id="videoPrerollCompanionAd">
            <script type="text/javascript">
              googletag.cmd.push(function() {
                googletag.defineSlot('/1015347/VideoPreroll', [300, 250], 'videoPrerollCompanionAd').addService(googletag.companionAds());
                googletag.enableServices();
                googletag.display('videoPrerollCompanionAd');
              });
            </script>
          </div>
          <div id="videoPrerollLoadingDiv"> Loading <span id="videoPrerollLoadingPercent">0%</span> - <span id="videoPrerollMadStatus" class="MadStatusField">Starting game...</span>
            <span id="videoPrerollMadStatusBackBuffer" class="MadStatusBackBuffer"></span>
            <div id="videoPrerollLoadingBar">
              <div id="videoPrerollLoadingBarCompleted"></div>
            </div>
          </div>
          <div id="videoPrerollJoinBC">
            <span>Get more with Builders Club!</span>
            <a href="/Upgrades/BuildersClubMemberships.aspx?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
          </div>
        </div>
        <script type="text/javascript">
          $(function() {
            var videoPreRollDFP = Roblox.VideoPreRollDFP;
            if (videoPreRollDFP) {
              var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
              videoPreRollDFP.showVideoPreRoll = false;
              videoPreRollDFP.loadingBarMaxTime = 33000;
              videoPreRollDFP.videoLoadingTimeout = 11000;
              videoPreRollDFP.videoPlayingTimeout = 41000;
              videoPreRollDFP.videoLogNote = "BuildersClub";
              videoPreRollDFP.logsEnabled = true;
              videoPreRollDFP.excludedPlaceIds = "32373412";
              videoPreRollDFP.adUnit = "/1015347/VideoPreroll";
              videoPreRollDFP.adTime = 15;
              videoPreRollDFP.isSwfPreloaderEnabled = true;
              videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
              customTargeting.userAge = "16";
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
          <div class="Title"> Choose Your Character </div>
          <div style="min-height: 275px; background-color: white;">
            <div style="clear:both; height:25px;"></div>
            <div style="text-align: center;">
              <div class="VisitButtonsGuestCharacter VisitButtonBoyGuest" style="float:left; margin-left:45px;"></div>
              <div class="VisitButtonsGuestCharacter VisitButtonGirlGuest" style="float:right; margin-right:45px;"></div>
            </div>
            <div style="clear:both; height:25px;"></div>
            <div class="RevisedFooter">
              <div style="width:200px;margin:10px auto 0 auto;">
                <a href="/?returnUrl=%2Fhome">
                  <div class="RevisedCharacterSelectSignup"></div>
                </a>
                <a class="HaveAccount" href="/newlogin?returnUrl=%2Fhome">I have an account</a>
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
                <img width="230" height="180" src="/images/22ff09393bb9dc4093b85439f420a531.png" />
              </div>
              <div class="ph-install-step ph-installinstructions-step2-of4">
                <h1>2</h1>
                <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process. </p>
                <img width="230" height="180" src="/images/4a3f96d30df0f7879abde4ed837446c6.png" />
              </div>
              <div class="ph-install-step ph-installinstructions-step3-of4">
                <h1>3</h1>
                <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX. </p>
                <img width="230" height="180" src="/images/1889460e8475fd0bc24c6b57992b31d4.png" />
              </div>
              <div class="ph-install-step ph-installinstructions-step4-of4">
                <h1>4</h1>
                <p class="larger-font-size">After installation, click <strong>Play</strong> below to join the action! </p>
                <div class="VisitButton VisitButtonContinuePH">
                  <a class="btn rbx-btn-primary-lg disabled">Play</a>
                </div>
              </div>
            </div>
            <div class="rbx-font-sm rbx-text-notes"> The ROBLOX installer should download shortly. If it doesn’t, <a href="#" onclick="Roblox.ProtocolHandlerClientInterface.startDownload(); return false;">start the download now.</a>
            </div>
          </div>
        </div>
        <div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>
        <div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
        <iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>
        <script type='text/javascript' src='/js/02fc1bdbf2c1cdbfcd7c063c99c89ac0.js'></script>
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
            if (GoogleAnalyticsEvents) {
              GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
              GoogleAnalyticsEvents.FireEvent(['Plugin', 'Install Success']);
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
            RobloxLaunch._GoogleAnalyticsCallback = function() {
              var isInsideRobloxIDE = 'website';
              if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                isInsideRobloxIDE = 'Studio';
              };
              GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
              GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
              EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin');
              if (typeof Roblox.GamePlayEvents != 'undefined') {
                Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
              }
            };
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
              <a href id="roblox-confirm-btn">
                <span></span>
              </a>
              <a href id="roblox-decline-btn">
                <span></span>
              </a>
            </div>
            <div class="ConfirmationModalFooter"></div>
          </div>
          <script type="text/javascript">
            Roblox = Roblox || {};
            Roblox.Resources = Roblox.Resources || {};
            //
            < sl: translate > Roblox.Resources.GenericConfirmation = {
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
        <script type='text/javascript' src='/js/a3d0a08746c2f2408b1a1130640d9d0c.js'></script>
        <script type='text/javascript' src='/js/045483c002abdefee9f2e9598ac48d08.js.gzip'></script>
        <script type='text/javascript'>
          Roblox.config.externalResources = [];
          Roblox.config.paths['Pages.Catalog'] = '/js/7f80c038811073416cc0c480b4cd735b.js.gzip';
          Roblox.config.paths['Pages.CatalogShared'] = '/js/94292889cb1b3e857d3b423f5c259701.js.gzip';
          Roblox.config.paths['Pages.Messages'] = '/js/b123274ceba7c65d8415d28132bb2220.js.gzip';
          Roblox.config.paths['Resources.Messages'] = '/js/6307f9bd9c09fa9d88c76291f3b68fda.js.gzip';
          Roblox.config.paths['Widgets.AvatarImage'] = '/js/64f4ed4d4cf1c0480690bc39cbb05b73.js.gzip';
          Roblox.config.paths['Widgets.DropdownMenu'] = '/js/5cf0eb71249768c86649bbf0c98591b0.js.gzip';
          Roblox.config.paths['Widgets.GroupImage'] = '/js/556af22c86bce192fb12defcd4d2121c.js.gzip';
          Roblox.config.paths['Widgets.HierarchicalDropdown'] = '/js/3ba7b7bc5faac4c7e7f1f42ae3af2434.js.gzip';
          Roblox.config.paths['Widgets.ItemImage'] = '/js/d689e41830fba6bc49155b15a6acd020.js.gzip';
          Roblox.config.paths['Widgets.PlaceImage'] = '/js/45d46dd8e2bd7f10c17b42f76795150d.js.gzip';
          Roblox.config.paths['Widgets.SurveyModal'] = '/js/56ad7af86ee4f8bc82af94269ed50148.js.gzip';
        </script>
        <script>
          Roblox.XsrfToken.setToken('hDq3LeL9Pm76');
        </script>
        <script>
          $(function() {
            Roblox.DeveloperConsoleWarning.showWarning();
          });
        </script>
        <script type="text/javascript">
          $(function() {
            Roblox.JSErrorTracker.initialize({
              'suppressConsoleError': true
            });
          });
        </script>
        <script type="text/javascript">
          $(function() {
            function trackReturns() {
              function dayDiff(d1, d2) {
                return Math.floor((d1 - d2) / 86400000);
              }
              if (!localStorage) {
                return false;
              }
              var cookieName = 'RBXReturn';
              var cookieOptions = {
                expires: 9001
              };
              var cookieStr = localStorage.getItem(cookieName) || "";
              var cookie = {};
              try {
                cookie = JSON.parse(cookieStr);
              } catch (ex) {
                // busted cookie string from old previous version of the code
              }
              try {
                if (typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
                  localStorage.setItem(cookieName, JSON.stringify({
                    ts: new Date().toDateString()
                  }));
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
            //
            title: "Remove Ads Like This",
            body: "Builders Club members do not see external ads like these.",
            accept: "Upgrade Now",
            decline: "No, thanks"
            //</sl:translate>
          };
        </script>
        <script type='text/javascript' src='/js/89b019cd9fe489276f2230250c461975.js'></script>
      </body>
    </html>

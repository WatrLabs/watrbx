<?php 
use watrlabs\watrkit\pagebuilder;
$pagebuilder = new pagebuilder();

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___8886b17141736b16771d4f28d5fe2eda_m.css');
$pagebuilder->addresource('jsfiles', '/js/4eedc3a9c944bd9a29f80c2e9668dfdb.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/8220b4ecd0fe4da790391da3fd0b442c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/59e30cf6dc89b69db06bd17fbf8ca97c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/ec43bbe2464c7dead5f4c5f723965c3a.js.gzip');

//$pagebuilder->addresource('jsfiles', '/js/4eedc3a9c944bd9a29f80c2e9668dfdb.js.gzip');
$pagebuilder->setlegacy(true);
$pagebuilder->set_page_name("Groups");
$pagebuilder->buildheader();
?>

<div id="BodyWrapper">
            
            <div id="RepositionBody">
                <div id="Body" style='width:970px;'>
                    
    <style type="text/css">
        #Body {
            padding: 10px;
            width: 970px;
        }
    </style>
    
            
<script type="text/javascript">
     Roblox.Clans = Roblox.Clans || {};
     //<sl:translate>
     Roblox.Clans.Resources = {
        BuyClanTitle: "Purchase Clan",
        BuyClanMessage: "Purchasing a Clan will cost <span class='robux'>{0}</span>. Do you want to continue?<p class='use-group-funds invisible'><input type='checkbox' /> Use Group funds to purchase a Clan</p>",
        BuyClanAcceptText: "Buy Now",
        BuyClanCancelText: "Cancel",
        PersonalBalanceAfterText: "Your balance after this transaction will be ",
        GroupBalanceAfterText: "Your group's balance after this transaction will be ",
        BuyClanNotEnoughMoneyText: "You need {0} more ROBUX to purchase a Clan. <a href='/upgrades/robux'>Purchase ROBUX now</a>!",
        ErrorTitle: "Error",
        SuccessTitle: "Success!",
        SuccessClanInvitationText: "Your invitation has been sent.",
        ClanInviteTitle : "Invite To {0}",
        ClanInviteMessage : "Do you want to join this Clan?",
        ClanInviteSubMessage : "You may only be in one Clan at a time. You will be removed from your current Clan.",
        ClanInviteAcceptText : "Accept",
        ClanInviteCancelText : "Decline",
        CreateInviteTitle: "Invite to Clan",
        CreateInviteText: "Invite this user to your Clan?",
        ClanKickTitle: "Kick from Clan",
        ClanKickText: "Are you sure you want to kick this user from your Clan? They will remain a member of the group.",
        ClanKickSuccessText: "Clan kick successful.",
        LeaveClanTitle: "Leave Clan",
        LeaveClanText: "Are you sure you want to leave the Clan?",
        LeaveClanSuccessText: "You are no longer in the Clan.",
        CancelInviteTitle: "Cancel Clan Invitation",
        CancelInviteText: "Are you sure you want to cancel this pending Clan invitation?",
        CancelInviteSuccessText: "The Clan invitation has been cancelled.",
        AdminJoinClanTitle: "Join Clan",
        AdminJoinClanText: "Join this Clan? <span class='already-in-clan invisible'>You will automatically leave your current Clan.</span>"
     };
 //</sl:translate>
 </script>
 


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

<input name="__RequestVerificationToken" type="hidden" value="lo9mga0DWHg40g0XXGQ4MIITRPlNI5NpJNIBzdoWAr6-JqHrpzsy1vz8nR6BOxp9B9lwUwfqAZsaZo2PZjCBUVfEYNb0XnQPT8b3OvsjxCS2xNSC0" /><div id="ClanInvitationData"
     data-is-invitation-pending="False"
     data-group-id="1"
     data-is-in-other-clan="False"
     data-group-name="Watrbx Fan Club"></div>

            <div id="left-column">
<!--                <div class="GroupListContainer StandardBox">
                    <div id="ctl00_cphRoblox_CreateNewGroup" disabled="disabled" title="You may only be in a maximum of 5 groups at one time">
  
                        
                        <div id="CreateGroupBtn" class="btn-large btn-disabled-primary">
                            Create
                        </div>   -->
                <div class="GroupListContainer StandardBox">
                    <div id="ctl00_cphRoblox_CreateNewGroup" title="Create a new group">
  
                        
                        <div id="CreateGroupBtn" class="btn-large btn-primary" onclick="window.location.replace('/My/CreateGroup.aspx');">
                            Create
                        </div>   
                        
</div>
                    

<div id="GroupThumbnails" >
    <div id="ctl00_cphRoblox_MyGroupsPane_SmallThumbsPanel" class="CarouselPager">
  
        
                
                
                <div class="GroupListItemContainer selected">
                    <div class="GroupListImageContainer notranslate">                                                
                        <a id="ctl00_cphRoblox_MyGroupsPane_SmallGroupThumbnails_ctrl0_ctl00_AssetImage1" title="Watrbx Fan Club" href="/My/Groups.aspx?gid=1" style="display:inline-block;height:42px;width:42px;cursor:pointer;"><img src="/headshot.png" height="42" width="42" border="0" alt="Watrbx Fan Club" /></a>
                    </div>
                    <div class="GroupListName notranslate">Watrbx Fan Club</div>
                    <div style="clear:both;"></div>
                </div>
            
                <div class="GroupListItemContainer ">
                    <div class="GroupListImageContainer notranslate">                                                
                        <a id="ctl00_cphRoblox_MyGroupsPane_SmallGroupThumbnails_ctrl0_ctl01_AssetImage1" title="Watrbx Admin Group" href="/My/Groups.aspx?gid=2" style="display:inline-block;height:42px;width:42px;cursor:pointer;"><img src="http://t4.rbxcdn.com/f09c3e21f07cf4b5c0d76f8f6a41848e" height="42" width="42" border="0" alt="Watrbx Admin Group" /></a>
                    </div>
                    <div class="GroupListName notranslate">Watrbx Admin Group</div>
                    <div style="clear:both;"></div>
                </div>
            
            
            
    
</div>
    <div style="clear:both;"></div>
</div>

<script type="text/javascript">
    $(function() {
        $(".GroupListImageContainer").find('a').each(function (index, elem) { $(elem).attr('title', $(elem).attr('title').replace(new RegExp("&quot;", "gm"), '"')); });
    });
</script>
                </div>
            </div>
            <div id="mid-column">
                
<div id="SearchControls">
    
    <div class="content">
        <input name="ctl00$cphRoblox$GroupSearchBar$SearchKeyword" type="text" id="ctl00_cphRoblox_GroupSearchBar_SearchKeyword" onclick="if(this.value == &#39;Search all groups&#39;){ this.value = &#39;&#39;};$(this).removeClass(&#39;default&#39;);" class="SearchKeyword default translate" maxlength="100" value="Search all groups" />
        <!--<select name="ctl00$cphRoblox$GroupSearchBar$SearchFiltersDropdown2" id="ctl00_cphRoblox_GroupSearchBar_SearchFiltersDropdown2">

</select>-->
        <input type="submit" name="ctl00$cphRoblox$GroupSearchBar$SearchButton" value="Search" onclick="javascript:if ($get(SearchKeywordText).value == &#39;&#39; || $get(SearchKeywordText).value == &#39;Search all groups&#39;) return false;" id="ctl00_cphRoblox_GroupSearchBar_SearchButton" class="group-search-button translate" />
        <input type="text" style="visibility: hidden; position: absolute">
        <!-- Enter key submission hack - IE -->
    </div>
</div>

<script type="text/javascript">
    var SearchKeywordText = 'ctl00_cphRoblox_GroupSearchBar_SearchKeyword';       
</script>


                
                <div id="description">
                    <div class="GroupPanelContainer">
                        <div class="left-col">
                            <div class="GroupThumbnail">
                                <a id="ctl00_cphRoblox_GroupDescriptionEmblem" title="Watrbx Fan Club" onclick="__doPostBack(&#39;ctl00$cphRoblox$GroupDescriptionEmblem&#39;,&#39;&#39;)" style="display:inline-block;cursor:pointer;"><img src="/headshot.png" height="150" width="150" border="0" alt="Watrbx Fan Club" /></a>
                            </div>
                            <div class="GroupOwner">
                                
                                <div id="ctl00_cphRoblox_OwnershipPanel">
  Owned By: <a style="font-style: italic;" href="/users/1/profile" onclick="">ROBLOX</a>
</div>
                                <div id="MemberCount">Members: 2</div>
                                <div id="ClanMemberCount">Clan Members: <span class="clan-members-count">3</span></div>

                                
                            </div>
                            <div class="MyRank">
                                <div>My Rank: <span id="ctl00_cphRoblox_StatusRank" class="notranslate">Owner</span></div>
                            </div>
                        </div>
                        <div class="right-col">
                            <h2 class="notranslate">Watrbx Fan Club</h2>
                            <div id="GroupDescP" class="linkify">
                                <pre class="notranslate">Welcome To The Watrbx Fan Club
</pre>
                            </div>
                            <input type="hidden" id="GroupDesc_Full" class="notranslate" value="Welcome To The Watrbx Fan Club" />
                            <div id="ctl00_cphRoblox_AbuseReportButton_AbuseReportPanel" class="ReportAbuse">
  
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton_ReportAbuseIconHyperLink" href="/abusereport/group?id=1&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx"><img src="../images/abuse.PNG?v=2" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton_ReportAbuseTextHyperLink" href="/abusereport/group?id=1&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx">Report Abuse</a></span>

</div>
                            <br />
                            <div id="ctl00_cphRoblox_GroupStatusPane_status">
    <div id="ctl00_cphRoblox_GroupStatusPane_StatusView" class="StatusView ">
        <div class="top" >
            <span id="ctl00_cphRoblox_GroupStatusPane_StatusTextField" class="StatusTextField linkify">welcome to ma cool group</span>
        </div>
        <div class="bottom">
            <div class="content">
                <a id="ctl00_cphRoblox_GroupStatusPane_StatusPoster" href="/users/1/profile" style="font-style: italic;">ROBLOX</a>
                <span style="color: #808080; font-size: 8px"><span id="ctl00_cphRoblox_GroupStatusPane_StatusDate">12/25/2015 1:00:00 PM</span></span>
            </div>
            <div id="ctl00_cphRoblox_GroupStatusPane_AbuseReportButtonGroupStatus_AbuseReportPanel" class="ReportAbuse">
  
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_GroupStatusPane_AbuseReportButtonGroupStatus_ReportAbuseIconHyperLink" href="/abuseReport/groupstatus?id=1&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx"><img src="../images/abuse.PNG?v=2" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_GroupStatusPane_AbuseReportButtonGroupStatus_ReportAbuseTextHyperLink" href="/abuseReport/groupstatus?id=1&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx">Report Abuse</a></span>

</div>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <div id="ctl00_cphRoblox_GroupStatusPane_StatusPostControls" class="StatusPostControls">
        <input name="ctl00$ctl00$cphRoblox$GroupStatusPane$StatusTextBox" type="text" id="ctl00_ctl00_cphRoblox_GroupStatusPane_StatusTextBox" style="width: 228px;" class="default" value="Enter your shout" onfocus="if($(this).hasClass(&#39;default&#39;)){$(this).removeClass(&#39;default&#39;).val(&#39;&#39;);}else{return false;}" />
        <input type="submit" name="ctl00$ctl00$cphRoblox$GroupStatusPane$StatusSubmitButton" value="Group Shout" id="ctl00_ctl00_cphRoblox_GroupStatusPane_StatusSubmitButton" style="position: relative; left: 5px;width:89px;padding:1px 0;text-align:center;" />
    </div>
</div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>

                <div id="GroupsPeopleContainer" class="divider-bottom">
                    
                    <div>
                        
                            <div id="GroupsPeople_Games" class="tab active">Games</div>
                        
                            <div id="GroupsPeople_Clan" class="tab ">Clan</div>
                        
                        <div id="GroupsPeople_Members" class="tab ">Members</div>
                        <div id="GroupsPeople_Allies" class="tab">Allies</div>
                        <div id="GroupsPeople_Enemies" class="tab">Enemies</div>
                        <div id="GroupsPeople_Items" class="tab">Store</div>
                        
                        <div style="clear: both;"></div>
                    </div>
                    
                    <div id="GroupsPeople_Pane">
                    
                            <div id="GroupsPeoplePane_Games" class="tab-content" style="display: block">
                                
<div class="results-container" data-page="1" data-group-id="1">
        <div class="GroupPlace">
                <div><a href="/games/1/work-at-a-pizza-place"><img src="http://t5.rbxcdn.com/f90baa8a4ecabbccee1db18f88a77158" data-retry-url="" title="Work At A Pizza Place!"></a></div>
            <div class="PlaceName">
                    <a class="NameText" href="/games/1/work-at-a-pizza-place">Work At A Pizza Place!</a>
            </div>
                <div class="PlayersOnline">0 players online</div>
        </div>
    <div class="clear"></div>
</div>

                            </div>
                        
                        <div id="GroupsPeoplePane_Clan" class="tab-content" style="display: none;">
                                <div class="GroupMember">
        <div class="Avatar">
            <span class="OnlineStatus offline" alt="Builderman is offline (last seen at 12/25/2015 1:00:00 PM."></span>
            <a class="roblox-avatar-image" data-user-id="3" data-image-size="small" href="/users/3/profile"></a>
        </div>
        <div class="Summary">
            <span class="Name">
                <a href="/users/3/profile" class="NameText notranslate" title="Builderman">Builderman</a>
            </span>
        </div>
    </div>
    <div class="GroupMember">
        <div class="Avatar">
            <span class="OnlineStatus online" alt="watrabi is online at Website."></span>
            <a class="roblox-avatar-image" data-user-id="2" data-image-size="small" href="/users/2/profile"></a>
        </div>
        <div class="Summary">
            <span class="Name">
                <a href="/users/2/profile" class="NameText notranslate" title="watrabi">watrabi</a>
            </span>
        </div>
    </div>
    <div class="GroupMember">
        <div class="Avatar">
            <span class="OnlineStatus online" alt="ROBLOX is online."></span>
            <a class="roblox-avatar-image" data-user-id="1" data-image-size="small" href="/users/1/profile"></a>
        </div>
        <div class="Summary">
            <span class="Name">
                <a href="/users/1/profile" class="NameText notranslate" title="ROBLOX">ROBLOX</a>
            </span>
        </div>
    </div>

<div class="clear"></div>


<input type="hidden" class="get-clan-members-data" data-results-per-page="10" data-group-id="1"/>
                        </div>
                        
                        <div id="GroupsPeoplePane_Members" class="tab-content" style="display: none">
                            

<div id="GroupRoleSetsMembersPane" >
    <script type="text/javascript">
        Sys.WebForms.PageRequestManager.getInstance().add_endRequest(updateRolesetCount);
    </script>
    <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_GroupMembersUpdatePanel" Class="MembersUpdatePanel">
  
            <div>
                <div class="Members_DropDown">
                    <select name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$dlRolesetList" onchange="loading(&#39;members&#39;);setTimeout(&#39;__doPostBack(\&#39;ctl00$cphRoblox$rbxGroupRoleSetMembersPane$dlRolesetList\&#39;,\&#39;\&#39;)&#39;, 0)" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlRolesetList" class="MembersDropDownList" style="max-width: 100%">
    <option selected="selected" value="6189062">Members</option>
    <option value="6198066">Admin</option>
    <option value="6189060">Owner</option>

  </select>
                    <input name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$RolesetCountHidden" type="text" value="2" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_RolesetCountHidden" class="RolesetCountHidden" style="display:none;" />
                    <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_AbuseReportButtonRoleSet_AbuseReportPanel" class="ReportAbuse">
    
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_AbuseReportButtonRoleSet_ReportAbuseIconHyperLink" href="/abusereport/grouproleset?id=1234567&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx"><img src="../images/abuse.PNG?v=2" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_AbuseReportButtonRoleSet_ReportAbuseTextHyperLink" href="/abusereport/grouproleset?id=1234567&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx">Report Abuse</a></span>

  </div>
                </div>
                <div>
                    <div class="spacer" style="visibility:hidden;display:block;height:69px;width:1px;float:left;"></div>
                    
                  
                            
                            <div class="GroupMember" >
                        <div class="Avatar">
                                    <span class="OfflineStatus"><img id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl0_iOfflineStatus" src="../images/offline.png" alt="ROBLOX is offline (last seen at 12/25/2015 1:00:00 PM." style="border-width:0px;" /></span>
                          <a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl0_hlAvatar" class=" notranslate" title="ROBLOX" class=" notranslate" href="/users/1/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="http://t6.rbxcdn.com/c9055db1963c0afc0afe44ab1f28bebf" height="100" width="100" border="0" alt="ROBLOX" class=" notranslate" /></a>
                                </div>
                        <div class="Summary" >
                          <span class="Name"><a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl0_hlMember" title="ROBLOX" class="NameText notranslate" href="/users/1/profile">ROBLOX</a></span>
                        </div>
                            </div>
                        
                            <div class="GroupMember" >
                        <div class="Avatar">
                                    <span class="OnlineStatus"><img id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl1_iOnlineStatus" src="../images/online.png" alt="watrabi is online." style="border-width:0px;" /></span>
                          <a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl1_hlAvatar" class=" notranslate" title="watrabi" class=" notranslate" href="/users/2/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="http://t7.rbxcdn.com/8b9a35019ee3326b271e4513ba37d517" height="100" width="100" border="0" alt="watrabi" class=" notranslate" /></a>
                                </div>
                        <div class="Summary" >
                          <span class="Name"><a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl1_hlMember" title="watrabi" class="NameText notranslate" href="/users/2/profile">watrabi</a></span>
                        </div>
                            </div>
                        
                            <div style="clear:both;"></div>
                        
                    <div style="clear:both;"></div>
                  <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_div" class="FooterPager" onclick="handlePagerClick(event, &#39;members&#39;);">
                      <span id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer"><span class="pagerbtns previous"> </span>&nbsp;
                                 <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_MembersPagerPanel" onkeypress="javascript:return WebForm_FireDefaultButton(event, &#39;ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_HiddenInputButton&#39;)">
    
                                <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_Div1" class="paging_wrapper">
                                    Page <input name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$dlUsers_Footer$ctl01$PageTextBox" type="text" value="1" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_PageTextBox" class="paging_input" /> of
                                    <div class="paging_pagenums_container" >1</div>
                                    <input type="submit" name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$dlUsers_Footer$ctl01$HiddenInputButton" value="" onclick="loading(&#39;members&#39;);" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_HiddenInputButton" class="pagerbtns translate" style="display:none;" />
                                </div>
                                
  </div>
                                <a class="pagerbtns next" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$rbxGroupRoleSetMembersPane$dlUsers_Footer$ctl02$ctl00&#39;,&#39;&#39;)"> </a>&nbsp;</span>
                    </div>
                </div>
            </div>
            <input name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$currentRoleSetID" type="hidden" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_currentRoleSetID" value="6189062" />
        
</div>
    <div style="clear: both"></div>
</div>

                        </div>
                        <div id="GroupsPeoplePane_Allies" class="tab-content">
                            <div id="ctl00_cphRoblox_rbxGroupAlliesPane_RelationshipsUpdatePanel" class="grouprelationshipscontainer">
  
        <div >
            
            
                    
                    <div style="width:42px;height:42px;padding:8px;float:left">
                        <a id="ctl00_cphRoblox_rbxGroupAlliesPane_RelationshipsListView_ctrl0_AssetImage1" alt="Group Allie 1" title="Group Allie 1" href="/Groups/group.aspx?gid=2" style="display:inline-block;height:42px;width:42px;cursor:pointer;"><img src="http://t1.rbxcdn.com/fe6362bfcb3fcf162d3139963d276fd1" height="42" width="42" border="0" alt="Group Allie 1" /></a>
                    </div>
                
                    <div style="width:42px;height:42px;padding:8px;float:left">
                        <a id="ctl00_cphRoblox_rbxGroupAlliesPane_RelationshipsListView_ctrl1_AssetImage1" alt="Group Allie 2" title="Group Allie 2" href="/Groups/group.aspx?gid=3" style="display:inline-block;height:42px;width:42px;cursor:pointer;"><img src="http://t4.rbxcdn.com/a345e855e2bf0d1b164f68ba44d9adb3" height="42" width="42" border="0" alt="Group Allie 2" /></a>
                    </div>
                
                    <div style="clear:both;margin-bottom:10px;"></div>
                
            <div style="text-align:center">
                
            </div>
        </div>
    
</div>
                        </div>
                        <div id="GroupsPeoplePane_Enemies" class="tab-content">
                            
                        </div>
                        <div id="GroupsPeoplePane_Items" class="tab-content">
                            
<div id="GroupItemPaneInstructions">
    <p>Groups have the ability to create and sell official shirts, pants, and t-shirts! All revenue goes to group funds.</p>
    
</div>
<div id="GroupItemContent">
    <div id="GroupItemPaneContent"></div>
    <div style="clear:both;text-align: center;padding-top:25px;">
        <a href="/catalog/browse.aspx?IncludeNotForSale=false&SortType=3&CreatorID=1">See more items for sale by this group</a>
        
    </div>
</div>
<script type="text/javascript">
    
    $(function () {
        var url = '/catalog/html?CreatorId=1&ResultsPerPage=3&IncludeNotForSale=false&SortType=3&' + new Date().getTime();
     $.ajax({
            method: "GET",
            url: url,
            crossDomain: true,
            xhrFields: {
                withCredentials: true
            }
        }).done(function (data) {
            if (data.indexOf("CatalogItem") == -1) {
                $('#GroupItemPaneContent').html('<p>This group has no items.</p>');
                return;
            }
            $('#GroupItemPaneContent').html(data);
            Roblox.require('Widgets.ItemImage', function (itemImage) {
                itemImage.populate();
            });
        }, "text");
        });
    
</script>
                        </div>
                        
                    </div>
                </div>
                

<script type="text/javascript">
    Roblox.ExileModal.InitializeGlobalVars(6189062, 977619);
</script>

<div id="ctl00_cphRoblox_GroupWallPane_Wall">
    <div class="StandardBox" style="margin-bottom: 0px;border-bottom:none;" >
        <span class="InsideBoxHeader">Wall</span>
        <div id="WallPostBox">
            
            <textarea name="ctl00$cphRoblox$GroupWallPane$NewPost" rows="2" cols="20" id="ctl00_cphRoblox_GroupWallPane_NewPost" class="GroupWallPostText" style="width:85%;">
</textarea>
         <input type="submit" name="ctl00$cphRoblox$GroupWallPane$NewPostButton" value="Post" id="ctl00_cphRoblox_GroupWallPane_NewPostButton" class="btn-control btn-control-large GroupWallPostBtn translate" />
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="StandardBox GroupWallPane" style="background:#fff;border-top:none;">
        <div id="ctl00_cphRoblox_GroupWallPane_GroupWallUpdatePanel">
  

    <div id="ExileModal" class="modalPopup blueAndWhite" style="width: 380px; min-height: 50px; display: none;">
    <div id="Div4" class="simplemodal-close">
            <a class="ImageButton closeBtnCircle_35h" style="cursor: pointer; margin-left:385px; position:absolute; top:-18px; left:-10px;"></a>
        </div>
        <div style="text-align:center;">
            <div  class="titleBar">Warning!</div>
            <div style="text-align: center; padding: 10px">
            <p>
                Are you sure you want to exile this user?
                    
                    <span class="exile-user-clan-kick-message invisible">They will also be kicked from the Clan.</span>
                    
                </p>
            <div style="text-align: center; margin: 5px 10px 0px 0px">
                <a onclick="Roblox.ExileModal.Exile();" id="ctl00_cphRoblox_GroupWallPane_ContinueExile" class="btn-neutral btn-medium" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$GroupWallPane$ContinueExile&#39;,&#39;&#39;)" style="cursor:pointer;"><span>Exile</span></a>
                    <a onclick="Roblox.ExileModal.Close();" id="ctl00_cphRoblox_GroupWallPane_CancelExile" class="btn-negative btn-medium" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$GroupWallPane$CancelExile&#39;,&#39;&#39;)" style="cursor: pointer"><span>Cancel</span></a>
                    <p><input type="checkbox" id="deleteAllPostsByUser" value="1" name="deleteAllPostsByUser" onclick="Roblox.ExileModal.SetDeletePostsBool();"/> Also delete all posts by this user. (Please allow some time.)</p>
                </div>
            </div>
        </div>
    </div>
                
                
                        
                        <div class="AlternatingItemTemplateOdd">
                            <div class="RepeaterImage" >
                                <a id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl0_hlAvatar" class=" notranslate" title="ROBLOX" class=" notranslate" href="/users/1/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="http://t0.rbxcdn.com/065347c3a7d88bfdc66f4a50c2c4bd1b" height="100" width="100" border="0" alt="ROBLOX" class=" notranslate" /><img src="/images/icons/overlay_bcOnly.png" class="bcOverlay" align="left" style="position:relative;top:-19px;" /></a>                   
                            </div>
                            <div class="RepeaterText" >
                                <div class="GroupWall_PostContainer notranslate linkify">
                                    I Like Ice Cream.
                                </div>
                                <div>
                                    <div class="GroupWall_PostDate">
                                        <span style="color: Gray;">12/25/2015 1:00:00 PM</span>
                                        by
                                        <span class="UserLink notranslate">
                                            <a href="/users/1/profile">
                                                ROBLOX
                                            </a>
                                        </span>
                                        <div style="float: right">
                                            <div id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl0_AbuseReportButton_AbuseReportPanel" class="ReportAbuse">
    
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl0_AbuseReportButton_ReportAbuseIconHyperLink" href="/abusereport/groupwallpost?id=123456789&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx"><img src="../images/abuse.PNG?v=2" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl0_AbuseReportButton_ReportAbuseTextHyperLink" href="/abusereport/groupwallpost?id=123456789&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx">Report Abuse</a></span>

  </div>
                                        </div>
                                    </div>
                                    <div class="GroupWall_PostBtns" style="min-height:0">
                                        <a id="ctl00_ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl1_LinkButton0" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$GroupWallPane$GroupWall$ctrl1$LinkButton0&#39;,&#39;&#39;)" style="line-height:26px; float: left">Delete</a>
                                         
                                        
                                         
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                       </div>
                    
                        <div class="AlternatingItemTemplateEven">
                            <div class="RepeaterImage" >
                                <a id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl1_hlAvatar" class=" notranslate" title="watrabi" class=" notranslate" href="/users/2/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="http://t3.rbxcdn.com/6b38c7f780f30987df76731aba370b16" height="100" width="100" border="0" alt="watrabi" class=" notranslate" /></a>                 
                            </div>
                            <div class="RepeaterText" >
                                <div class="GroupWall_PostContainer notranslate linkify">
                                    this group is so cool.
                                </div>
                                <div>
                                    <div class="GroupWall_PostDate">
                                        <span style="color: Gray;">12/25/2015 1:00:00 PM</span>
                                        by
                                        <span class="UserLink notranslate">
                                            <a href="/users/2/profile">
                                                watrabi
                                            </a>
                                        </span>
                                        <div style="float: right">
                                            <div id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl1_AbuseReportButton_AbuseReportPanel" class="ReportAbuse">
    
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl1_AbuseReportButton_ReportAbuseIconHyperLink" href="/abusereport/groupwallpost?id=123456789&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx"><img src="../images/abuse.PNG?v=2" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl1_AbuseReportButton_ReportAbuseTextHyperLink" href="/abusereport/groupwallpost?id=123456789&amp;RedirectUrl=http%3a%2f%2f%2fmy%2fgroups.aspx">Report Abuse</a></span>

  </div>
                                        </div>
                                    </div>
                                    <div class="GroupWall_PostBtns" style="min-height:0">
                                        <a id="ctl00_ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl1_LinkButton0" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$GroupWallPane$GroupWall$ctrl1$LinkButton0&#39;,&#39;&#39;)" style="line-height:26px; float: left">Delete</a>&nbsp;
                                        <a onclick="return Roblox.ExileModal.Show(3);" id="ctl00_ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl1_LinkButton1" style="line-height:26px">&nbsp;&#149;&nbsp;&nbsp;Exile User</a>
                                         
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                       </div>
                    
                        <div style="clear:both;"></div>
                    
                <div style="clear:both;"></div>
                <div id="ctl00_cphRoblox_GroupWallPane_dlUsers_Footer_div" class="FooterPager" onclick="handlePagerClick(event, &#39;wall&#39;);">
                  <span id="ctl00_cphRoblox_GroupWallPane_GroupWallPager"><span class="pagerbtns previous"> </span>&nbsp;
                                    <div id="ctl00_cphRoblox_GroupWallPane_GroupWallPager_ctl01_GroupWallPagerPanel" onkeypress="javascript:return WebForm_FireDefaultButton(event, &#39;ctl00_cphRoblox_GroupWallPane_GroupWallPager_ctl01_HiddenInputButton&#39;)">
    
                                        <div id="ctl00_cphRoblox_GroupWallPane_GroupWallPager_ctl01_Div1" class="paging_wrapper">
                                            Page <input name="ctl00$cphRoblox$GroupWallPane$GroupWallPager$ctl01$PageTextBox" type="text" value="1" id="ctl00_cphRoblox_GroupWallPane_GroupWallPager_ctl01_PageTextBox" class="paging_input" /> of
                                            <div class="paging_pagenums_container" >1</div>
                                            <input type="submit" name="ctl00$cphRoblox$GroupWallPane$GroupWallPager$ctl01$HiddenInputButton" value="" onclick="loading(&#39;wall&#39;);" id="ctl00_cphRoblox_GroupWallPane_GroupWallPager_ctl01_HiddenInputButton" class="pagerbtns" style="display:none;" />
                                        </div>
                                    
  </div>
                                <a class="pagerbtns next" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$GroupWallPane$GroupWallPager$ctl02$ctl00&#39;,&#39;&#39;)"> </a>&nbsp;</span>
                </div>
            
</div>
    </div>
</div>

                
            </div>
        <div id="right-column">
            <div id="ctl00_cphRoblox_rbxGroupFundsPane_GroupFunds" class="StandardBox" style="padding-right:0">
    <b>Funds:</b>
    <span class="robux" style="margin-left:5px">0</span>
    <span class="tickets" style="margin-left:5px">0</span>
</div>
                
                <div class="GroupControlsBox">
                    <span class="InsideBoxHeader">Controls</span>
                    
                    <div id="AdminOptions">
                        
                    </div>
                    <div id="ctl00_cphRoblox_GroupAdminControls">
                        <input type="submit" name="ctl00$cphRoblox$GroupAdminButton" value="Group Admin" onclick="location.href='/My/GroupAdmin.aspx?gid=1';return false;" id="ctl00_cphRoblox_GroupAdminButton" class="btn-control btn-control-medium translate" />
                        
                    </div>
                    
                    <div id="ctl00_cphRoblox_GroupAdvertise">
                        <input type="submit" name="ctl00$cphRoblox$GroupAdvertiseButton" value="Advertise Group" onclick="location.href='/My/NewUserAd.aspx?targetId=1&targettype=Group';return false;" id="ctl00_cphRoblox_GroupAdvertiseButton" class="btn-control btn-control-medium translate" />
                        
                    </div>
                    
                    <div id="ctl00_cphRoblox_ManagePrimaryGroup">
                        <input type="submit" name="ctl00$cphRoblox$MakePrimaryGroupButton" value="Make Primary" onclick="return confirm(&#39;Are you sure you want to make this your primary group?&#39;);" id="ctl00_cphRoblox_MakePrimaryGroupButton" class="btn-control btn-control-medium translate" />
                        
                    </div>
                    
                    <div id="LeaveGroup">
                        <input type="submit" name="ctl00$cphRoblox$LeaveButton" value="Leave Group" onclick="return confirm(&#39;Are you sure you\&#39;d like to leave this group?&#39;);" id="ctl00_cphRoblox_LeaveButton" class="btn-control btn-control-medium translate" />
                    
                    </div>
                    
                    <div id="LeaveClan">
                        <input type="submit" name="ctl00$cphRoblox$LeaveButton" value="Leave Clan" onclick="return confirm(&#39;Are you sure you\&#39;d like to leave this clan?&#39;);" id="ctl00_cphRoblox_LeaveButton" class="btn-control btn-control-medium translate" />
                    </div>
                    
                    <div id="ctl00_cphRoblox_GroupAudit">
                        <input type="submit" name="ctl00$cphRoblox$GroupAuditButton" value="Audit Log" onclick="location.href='/Groups/Audit.aspx?groupid=1';return false;" id="ctl00_cphRoblox_GroupAuditButton" class="btn-control btn-control-medium translate" />
                    </div>
                    
                </div>
                <div id="ad" style="height: 600px">
                    

    <iframe allowtransparency="true"
            frameborder="0"
            height="612"
            scrolling="no"
            src="/userads/2"
            width="160"
            data-js-adtype="iframead"></iframe>

                </div>
            </div>
        
    <br style="clear: both" />

    <div id="GetBC" class="modalPopup blueAndWhite" style="width: 380px; min-height: 50px; display: none; position: absolute; top: -200px;">
        <div id="Div2" class="simplemodal-close">
            <a class="ImageButton closeBtnCircle_35h" style="cursor: pointer; margin-left: 385px; position: absolute; top: -18px; left: -10px;"></a>
        </div>
        <div style="padding: 0px 0px 15px 0px; text-align: center;">
            <div class="titleBar">
                Uh-Oh!
            </div>
            <div>
                <p>Creating a group requires a Builders Club membership.</p>
                <div style="text-align: center; margin: 5px 10px 0px 0px">
                    <a class="btn-neutral btn-medium" style="cursor: pointer" href="https:///premium/membership"><span>Get BC!</span></a>
                    <a class="btn-negative btn-medium" onclick="GetBC.close();return false;" style="cursor: pointer"><span>Cancel</span></a>
                </div>
            </div>
        </div>
    </div>

    <div id="LeaveGroupAsOwner" class="modalPopup blueAndWhite" style="width: 380px; min-height: 50px; display: none; position: absolute; top: -200px;">
        <div id="Div1" class="simplemodal-close">
            <a class="ImageButton closeBtnCircle_35h" style="cursor: pointer; margin-left: 385px; position: absolute; top: -18px; left: -10px;"></a>
        </div>
        <div style="padding: 0px 0px 15px 0px; text-align: center;">
            <div class="titleBar">
                Warning!
            </div>
            <p>You are the owner of this group.  Leaving the group will allow any Builders Club member to claim ownership.</p>
            <p>You will lose all of the privileges of group ownership.</p>
            <div style="text-align: center; margin: 5px 10px 0px 0px">
                <a id="ctl00_cphRoblox_LinkButton3" class="btn-neutral btn-medium" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$LinkButton3&#39;,&#39;&#39;)" style="cursor: pointer"><span>Continue</span></a>
                <a onclick="LeaveGroupAsOwner.close();" id="ctl00_cphRoblox_LinkButton4" class="btn-negative btn-medium" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$LinkButton4&#39;,&#39;&#39;)" style="cursor: pointer"><span>Cancel</span></a>
            </div>

        </div>
    </div>
    <script type="text/javascript">

        if (typeof Roblox === "undefined") {
            Roblox = {};
        }

        if (typeof Roblox.Resources === "undefined") {
            Roblox.Resources = {};
        }
        Roblox.Resources.more = "More";
        Roblox.Resources.less = "Less";

        var GetBC = {};
        var LeaveGroupAsOwner = {};
        GetBC.close = function () {
            $.modal.close(".GetBC");
        };

        GetBC.open = function () {
            var modalProperties = { overlayClose: true, escClose: true, opacity: 80, overlayCss: { backgroundColor: "#000" } };
            $("#GetBC").modal(modalProperties);
        };

        LeaveGroupAsOwner.close = function () {
            $.modal.close(".LeaveGroupAsOwner");
        };

        $(function () {
            var modalProperties = { overlayClose: true, escClose: true, opacity: 80, overlayCss: { backgroundColor: "#000" } };
            
        });

    </script>

                    <div style="clear:both"></div>
                </div>
            </div>
        </div>
        </div>
        
            <div id="Footer" class="footer-container">
    <div class="FooterNav">
        <a href="/info/Privacy.aspx">Privacy Policy</a>
        &nbsp;|&nbsp;
        <a href="http://corp.roblox.com/advertise-on-roblox" class="roblox-interstitial">Advertise with Us</a>
        &nbsp;|&nbsp;
        <a href="http://corp.roblox.com/press" class="roblox-interstitial">Press</a>
        &nbsp;|&nbsp;
        <a href="http://corp.roblox.com/contact-us" class="roblox-interstitial">Contact Us</a>
        &nbsp;|&nbsp;
            <a href="http://corp.roblox.com/about" class="roblox-interstitial">About Us</a>
&nbsp;|&nbsp;        <a href="http://blog.roblox.com">Blog</a>
        &nbsp;|&nbsp;
            <a href="http://corp.roblox.com/careers" class="roblox-interstitial">Jobs</a>
&nbsp;|&nbsp;        <a href="http://corp.roblox.com/parents" class="roblox-interstitial">Parents</a>
    </div>
    <div class="legal">
            <div class="left">
                <div id="a15b1695-1a5a-49a9-94f0-9cd25ae6c3b2">
    <a href="//privacy.truste.com/privacy-seal/Roblox-Corporation/validation?rid=2428aa2a-f278-4b6d-9095-98c4a2954215" title="TRUSTe Children privacy certification" target="_blank">
        <img style="border: none" src="//privacy-policy.truste.com/privacy-seal/Roblox-Corporation/seal?rid=2428aa2a-f278-4b6d-9095-98c4a2954215" width="133" height="45" alt="TRUSTe Children privacy certification"/>
    </a>
</div>
            </div>
            <div class="right">
                <p class="Legalese">
    ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a href="http://corp.roblox.com/" ref="footer-smallabout" class="roblox-interstitial">ROBLOX Corporation</a>, ©2015. Patents pending.
    ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
    Use of this site signifies your acceptance of the <a href="/info/terms-of-service" ref="footer-terms">Terms and Conditions</a>.
</p>
            </div>
        <div class="clear"></div>
    </div>

</div>
        
        </div></div>
    </div>
    

<div id="usernotifications-data-model"
     class="hidden"
     data-notificationsdomain="https://notifications.roblox.com/"
     data-notificationstestinterval="5000"
     data-notificationsmaxconnectiontime="43200000">
</div>
        <script type="text/javascript">
            function urchinTracker() { };
            GoogleAnalyticsReplaceUrchinWithGAJS = true;
        </script>
    

    </form>
        <script type="text/javascript">
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
     data-userid="62402235"
     data-domain="roblox.com"
     data-gamespagelink="/games"
     data-chatdomain="https://chat.roblox.com"
     data-numberofmembersforpartychrome="6"
     data-avatarheadshotsmultigetlimit="100"
     data-userpresencemultigetlimit="100"
     data-intervalofchangetitleforpartychrome="500"
     data-spinner="http://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif"
     data-notificationsdomain="https://notifications.roblox.com/"
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
    <script type="text/javascript">
        var pagerProperties = {
            'windowDisplay': 8,
            'pageShift': 7,
            'orientation': 'vertical'
        };
        var groupsPager = new Roblox.CarouselDataPager($('.CarouselPager'), pagerProperties);
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
                        <img width="230" height="180" src="http://images.rbxcdn.com/8b0052e4ff81d8e14f19faff2a22fcf7.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step2-of4">
                        <h1>2</h1>
                        <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process.</p>
                        <img width="230" height="180" src="http://images.rbxcdn.com/4a3f96d30df0f7879abde4ed837446c6.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step3-of4">
                        <h1>3</h1>
                        <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX.</p>
                        <img width="230" height="180" src="http://images.rbxcdn.com/6e23e4971ee146e719fb1abcb1d67d59.png" />
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

<script type='text/javascript' src='http://js.rbxcdn.com/6b9fed5e91a508780b95c302464d62ef.js.gzip'></script>

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
            <img src="http://images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress" />
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
                <img src="http://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24" />
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
        Check <b>Remember my choice</b> and click <img src="http://images.rbxcdn.com/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application" />  in the dialog box above to join games faster in the future!
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
            <a href="https:///premium/membership?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
        </div>
    </div>   
    <script type="text/javascript">
        $(function () {
            var videoPreRollDFP = Roblox.VideoPreRollDFP;
            if (videoPreRollDFP) {
                var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
                videoPreRollDFP.showVideoPreRoll = false;
                videoPreRollDFP.loadingBarMaxTime = 33000;
                videoPreRollDFP.videoLoadingTimeout = 11000;
                videoPreRollDFP.videoPlayingTimeout = 41000;
                videoPreRollDFP.videoLogNote = "Flooded";
                videoPreRollDFP.logsEnabled = true;
                videoPreRollDFP.excludedPlaceIds = "32373412";
                videoPreRollDFP.adUnit = "/1015347/VideoPrerollUnder13";
                videoPreRollDFP.adTime = 15;
                videoPreRollDFP.isSwfPreloaderEnabled = true;
                videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
                customTargeting.userAge = "9";
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
                <a href="/?returnUrl=http%3A%2F%2F%2Fmy%2Fgroups.aspx"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="https:///newlogin?returnUrl=http%3A%2F%2F%2Fmy%2Fgroups.aspx">I have an account</a>
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
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "" });

        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <noscript>
        <img src="http://b.scorecardresearch.com/p?c1=2&c2=&c3=&c4=&c5=&c6=&c15=&cv=2.0&cj=1"/>
    </noscript>

</body>                
</html>
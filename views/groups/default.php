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
$pagebuilder->addresource('jsfiles', '/ScriptResource.axd');

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
     data-group-name="watrbx fan club"></div>

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
                        <a id="ctl00_cphRoblox_MyGroupsPane_SmallGroupThumbnails_ctrl0_ctl00_AssetImage1" title="watrbx fan club" href="/My/Groups.aspx?gid=1" style="display:inline-block;height:42px;width:42px;cursor:pointer;"><img src="/images/defaultimage.png" height="42" width="42" border="0" alt="watrbx fan club" /></a>
                    </div>
                    <div class="GroupListName notranslate">watrbx fan club</div>
                    <div style="clear:both;"></div>
                </div>
            
                <div class="GroupListItemContainer ">
                    <div class="GroupListImageContainer notranslate">                                                
                        <a id="ctl00_cphRoblox_MyGroupsPane_SmallGroupThumbnails_ctrl0_ctl01_AssetImage1" title="Watrbx Admin Group" href="/My/Groups.aspx?gid=2" style="display:inline-block;height:42px;width:42px;cursor:pointer;"><img src="/images/defaultimage.png" height="42" width="42" border="0" alt="Watrbx Admin Group" /></a>
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
                                <a id="ctl00_cphRoblox_GroupDescriptionEmblem" title="watrbx fan club" onclick="__doPostBack(&#39;ctl00$cphRoblox$GroupDescriptionEmblem&#39;,&#39;&#39;)" style="display:inline-block;cursor:pointer;"><img src="/images/defaultimage.png" height="150" width="150" border="0" alt="watrbx fan club" /></a>
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
                            <h2 class="notranslate">watrbx fan club</h2>
                            <div id="GroupDescP" class="linkify">
                                <pre class="notranslate">Welcome To The watrbx fan club
</pre>
                            </div>
                            <input type="hidden" id="GroupDesc_Full" class="notranslate" value="Welcome To The watrbx fan club" />
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
                <div><a href="/games/1/work-at-a-pizza-place"><img src="/images/defaultimage.png" data-retry-url="" title="Work At A Pizza Place!"></a></div>
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
                          <a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl0_hlAvatar" class=" notranslate" title="ROBLOX" class=" notranslate" href="/users/1/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="https://t6.rbxcdn.com/c9055db1963c0afc0afe44ab1f28bebf" height="100" width="100" border="0" alt="ROBLOX" class=" notranslate" /></a>
                                </div>
                        <div class="Summary" >
                          <span class="Name"><a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl0_hlMember" title="ROBLOX" class="NameText notranslate" href="/users/1/profile">ROBLOX</a></span>
                        </div>
                            </div>
                        
                            <div class="GroupMember" >
                        <div class="Avatar">
                                    <span class="OnlineStatus"><img id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl1_iOnlineStatus" src="../images/online.png" alt="watrabi is online." style="border-width:0px;" /></span>
                          <a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl1_hlAvatar" class=" notranslate" title="watrabi" class=" notranslate" href="/users/2/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="https://t7.rbxcdn.com/8b9a35019ee3326b271e4513ba37d517" height="100" width="100" border="0" alt="watrabi" class=" notranslate" /></a>
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
                        <a id="ctl00_cphRoblox_rbxGroupAlliesPane_RelationshipsListView_ctrl0_AssetImage1" alt="Group Allie 1" title="Group Allie 1" href="/Groups/group.aspx?gid=2" style="display:inline-block;height:42px;width:42px;cursor:pointer;"><img src="https://t1.rbxcdn.com/fe6362bfcb3fcf162d3139963d276fd1" height="42" width="42" border="0" alt="Group Allie 1" /></a>
                    </div>
                
                    <div style="width:42px;height:42px;padding:8px;float:left">
                        <a id="ctl00_cphRoblox_rbxGroupAlliesPane_RelationshipsListView_ctrl1_AssetImage1" alt="Group Allie 2" title="Group Allie 2" href="/Groups/group.aspx?gid=3" style="display:inline-block;height:42px;width:42px;cursor:pointer;"><img src="https://t4.rbxcdn.com/a345e855e2bf0d1b164f68ba44d9adb3" height="42" width="42" border="0" alt="Group Allie 2" /></a>
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
                                <a id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl0_hlAvatar" class=" notranslate" title="ROBLOX" class=" notranslate" href="/users/1/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="/images/defaultimage.png" height="100" width="100" border="0" alt="ROBLOX" class=" notranslate" /><img src="/images/icons/overlay_bcOnly.png" class="bcOverlay" align="left" style="position:relative;top:-19px;" /></a>                   
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
                                <a id="ctl00_cphRoblox_GroupWallPane_GroupWall_ctrl1_hlAvatar" class=" notranslate" title="watrabi" class=" notranslate" href="/users/2/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="/images/defaultimage.png" height="100" width="100" border="0" alt="watrabi" class=" notranslate" /></a>                 
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
                    <a class="btn-neutral btn-medium" style="cursor: pointer" href="/premium/membership"><span>Get BC!</span></a>
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
        
        <? $pagebuilder->build_footer(); ?>
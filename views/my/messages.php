<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$pagebuilder = new pagebuilder();
$auth = new authentication();
$auth->requiresession();
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___52ecb4339a49a1b9212e1c6894fd0ca0_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('jsfiles', '/js/0392919e76186a11f81ea25aa97bf5b7.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/56323c0f48e307896413a398ca63f18c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6385cae49dc708a8f2f93167ad17466d.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/59e30cf6dc89b69db06bd17fbf8ca97c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/77026e0e8875389783edcd7224c6e72b.js.gzip');

$pagebuilder->set_page_name("Messages");
$pagebuilder->setlegacy(true);

$pagebuilder->buildheader();


?>

<div id="AdvertisingLeaderboard">
                

<iframe allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>


            </div>

<div id="BodyWrapper" class="">
                        <div id="RepositionBody">
                            <div id="Body" style="width:970px">
                                
    <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.messagesModel = {};
        Roblox.messagesModel = {
            totalAnnouncements : "0",
            maxPrivateMessageLength : "9000",
            minimumAdRefreshInterval: "1000",
            lastAdRefresh: new Date()
        }
    </script>
    <div ng-modules="robloxApp, messages">
        <div class="roblox-messages-container" ng-controller="messagesController">
            <div rbx-tabs></div>
            <div class="tab-content-container tab-active" ui-view></div><!-- ng-controller="messagesContentController"-->
        </div>
    </div>
    <script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.websiteTemplates = {
        avatarTemplate : "/viewapp/common/thumbnail.html",
        tabsTemplate : "/viewapp/common/tabs.html",
        messagesNavTemplate: "/viewapp/pages/messages/directives/messagesNav.html",
        messagesListTemplate: "/viewapp/pages/messages/directives/messagesList.html",
        messagesBodyTemplate: "/viewapp/pages/messages/directives/messagesDetail.html",
        messageTemplate: "/viewapp/pages/messages/controllers/message.html",
        notificationTemplate: "/viewapp/pages/messages/controllers/notification.html"
        };
        Roblox.websiteLinks = {
            GetFormattedMessagesJsonLink: "/messages/api/get-messages",
        GetFormattedNotificationsJsonLink: "/notifications/api/get-notifications",
        ArchiveMessagesLink: "/messages/api/archive-messages",
        UnarchiveMessagesLink: "/messages/api/unarchive-messages",
        MarkMessagesReadLink: "/messages/api/mark-messages-read",
        MarkMessagesUnreadLink: "/messages/api/mark-messages-unread",
        SendMessageJsonResultLink: "/messages/api/send-message",
        GetMyUnreadMessagesCountLink: "/messages/api/get-my-unread-messages-count"
    };
    Roblox.messageDefaults = {
        robloxUserId: 1,
        robloxUserName: "ROBLOX",
        robloxUserThumbnail: "/images/defaultimage.png",
        robloxUserAbsoluteUrl: "/users/1/profile/"
    };
    </script>

<div id="MessagesAdSkyscraper" class="messages-ad-skyscraper messages-ad-skyscraper-top">


    <iframe allowtransparency="true"
            frameborder="0"
            height="612"
            scrolling="no"
            src="/userads/2"
            width="160"
            data-js-adtype="iframead"></iframe>

</div>
<!--[if IE 7]><input type="hidden" id="ie7"><![endif]-->

                                <div style="clear:both"></div>
                            </div>
                        </div>
                    </div>
<? $pagebuilder->build_footer(); ?>
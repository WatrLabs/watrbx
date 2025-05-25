<?php
use watrlabs\router\Routing;
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/game/GetCurrentUser.ashx", function() {
    $auth = new authentication();

    echo "1";
    die();

    if($auth->hasaccount()){
        $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);

        if($userinfo !== null){
            echo $userinfo->id;
            die();
        } else {
            http_response_code(400);
            die("Bad Request.");
        }

    } else {
        http_response_code(400);
            die("Bad Request.");
    }

});

$router->get('/IDE/Upload.aspx', function() {
    $pagebuilder = new pagebuilder;
    $pagebuilder::get_template("ide/upload");
});

$router->get('/ide/publish/new', function() {
    $pagebuilder = new pagebuilder;
    $pagebuilder::get_template("ide/new");
});

$router->get('/my/settings/json', function() {
    die('{"AccountAgeInDays":29,"AccountSettingsApiDomain":"https://www.watrbx.xyz","AgeBracket":0,"AllowedNotificationSourceTypes":["Test","FriendRequestReceived","FriendRequestAccepted","PartyInviteReceived","PartyMemberJoined","ChatNewMessage","PrivateMessageReceived","UserAddedToPrivateServerWhiteList","ConversationUniverseChanged","TeamCreateInvite","GameUpdate","DeveloperMetricsAvailable"],"AllowedReceiverDestinationTypes":["DesktopPush","NotificationStream"],"ApiProxyDomain":"https://www.watrbx.xyz","AuthDomain":"https://www.watrbx.xyz","BcExpireDate":"/Date(-0)/","BcLevel":null,"BcRenewalPeriod":null,"BlacklistedNotificationSourceTypesForMobilePush":[],"BlockedUsersModel":{"BlockedUserIds":[],"BlockedUsers":[],"MaxBlockedUsers":50,"Page":1,"Total":1},"CanHideInventory":false,"CanTrade":true,"ChangeEmailRequiresTwoStepVerification":false,"ChangePassword":false,"ChangePasswordRequiresTwoStepVerification":false,"ChangeUsernameEnabled":true,"ClientIpAddress":"198.44.138.113","CurrencyOperationErrorMessage":null,"DisplayName":"watrabi","Facebook":null,"FastTrackMember":null,"HasCurrencyOperationError":false,"HasFreeNameChange":false,"HasValidPasswordSet":true,"InApp":false,"IsAccountPinEnabled":true,"IsAccountPrivacySettingsV2Enabled":true,"IsAccountRestrictionsFeatureEnabled":true,"IsAccountRestrictionsSettingEnabled":false,"IsAccountSettingsSocialNetworksV2Enabled":false,"IsAdmin":false,"IsAgeDownEnabled":false,"IsAnyBC":true,"IsAppChatSettingEnabled":true,"IsBcRenewalMembership":false,"IsDisconnectFbSocialSignOnEnabled":true,"IsDisconnectXboxEnabled":true,"IsEmailOnFile":true,"IsEmailVerified":false,"IsFastTrackAccessible":false,"IsGameChatSettingEnabled":true,"IsI18nBirthdayPickerInAccountSettingsEnabled":true,"IsOBC":true,"IsPhoneFeatureEnabled":false,"IsPremium":false,"IsPromotionChannelsEndpointEnabled":true,"IsSendVerifyEmailApiEndpointEnabled":true,"IsSetPasswordNotificationEnabled":false,"IsSuperSafeModeEnabledForPrivacySetting":false,"IsTBC":false,"IsTwoStepToggleEnabled":false,"IsUiBootstrapModalV2Enabled":true,"IsUnder13UpdateEmailMessageSectionShown":false,"IsUpdateEmailApiEndpointEnabled":true,"IsUpdateEmailSectionShown":true,"IsUserConnectedToFacebook":false,"LocaleApiDomain":"https://www.watrbx.xyz","MinimumChromeVersionForPushNotifications":50,"MissingParentEmail":false,"MyAccountSecurityModel":{"IsEmailSet":true,"IsEmailVerified":false,"IsTwoStepEnabled":false,"ShowSignOutFromAllSessions":true,"TwoStepVerificationViewModel":{"CodeLength":6,"IsEnabled":false,"UserId":577,"ValidCodeCharacters":null}},"Name":"watrabi","NotificationSettingsDomain":"https://www.watrbx.xyz","PreviousUserNames":"","PushNotificationsEnabledOnFirefox":true,"ReceiveNewsletter":false,"RobuxRemainingForUsernameChange":0,"SocialNetworksVisibilityPrivacy":6,"SocialNetworksVisibilityPrivacyValue":"AllUsers","Tab":null,"Twitch":null,"Twitter":null,"UseSuperSafeChat":false,"UseSuperSafePrivacyMode":false,"UserAbove13":true,"UserEmail":"w******@watrlabs.lol","UserEmailMasked":true,"UserEmailVerified":false,"UserId":1,"YouTube":null}');
    $settings = array(
        "AccountAgeInDays"=>0,
        "AccountSettingsApiDomain"=>"https://www.watrbx.xyz",
        "AgeBracket"=>0, // I have no idea what this does
        "AllowedNotificationSourceTypes"=> array(["Test","FriendRequestReceived","FriendRequestAccepted","PartyInviteReceived","PartyMemberJoined","ChatNewMessage","PrivateMessageReceived","UserAddedToPrivateServerWhiteList","ConversationUniverseChanged","TeamCreateInvite","GameUpdate","DeveloperMetricsAvailable"]),
        "AllowedReceiverDestinationTypes"=>array(["DesktopPush","NotificationStream"]),
        "ApiProxyDomain"=>"https://www.watrbx.xyz",
        "AuthDomain"=>"https://www.watrbx.xyz",
        "BcExpireDate"=>"/Date(-0)/",
        "BcLevel"=>"0",
        "BcRenewalPeriod"=>null,
        "DisplayName"=>"watrabi"
    );

    echo json_encode($settings);
    die();

    // there's too much here so im just gonna hope it'll let this slide 
});

$router->get('/game/logout.aspx', function() {
    die("I totally logged ts out");
});

$router->group('/group', function($router) {
    
    $router->get("/hi", function () {
        echo "test<br>";
    });
    
}, 'checkhelp');
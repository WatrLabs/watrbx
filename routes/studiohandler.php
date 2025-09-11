<?php
use watrlabs\router\Routing;
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/game/GetCurrentUser.ashx", function() {
    $auth = new authentication();

    if($auth->hasaccount()){
        global $currentuser;
        $userinfo = $currentuser;

        if($userinfo !== null){
            echo $userinfo->id;
            die();
        } else {
            setcookie(".ROBLOSECURITY", "", time() - 9999999, "/", ".watrbx.wtf");
            die();
        }
    }

    die();

});

$router->get('/login/RequestAuth.ashx', function(){
    global $currentuser;

    if($currentuser !== null && isset($_COOKIE["_ROBLOSECURITY"])){
        http_response_code(200);
        setcookie(".ROBLOSECURITY", $_COOKIE["_ROBLOSECURITY"], time() + 8600, "/", ".watrbx.wtf");
        echo $_COOKIE["_ROBLOSECURITY"];
        die();
    } else {
        http_response_code(401);
        setcookie(".ROBLOSECURITY", "", time() - 9999999, "/", ".watrbx.wtf");
        die("User is not authorized.");
    }
    
});

$router->get('/Game/Edit.ashx', function(){
    header("Content-type: text/lua");
    http_response_code(200);
    die(require("../storage/edit.php"));
});

$router->get('/game/visit.ashx', function(){
    header("Content-type: text/lua");
    http_response_code(200);
    die(require("../storage/visit.php"));
});

$router->get('/ide/welcome', function(){
    header("Location: /newlogin");
    die();
});

$router->get('/ide/update', function(){
    $pagebuilder = new pagebuilder;
    $pagebuilder::get_template("ide/update");
});

$router->get('/places/{placeid}/settings', function($Placeid){
    header("Content-type: application/json");
    die("{}");
});

$router->get('/developerproducts/list', function(){
    header("Content-type: application/json");
    die('{
  "data": [
    {
      "ProductId": 456789,
      "Name": "100 Coins",
      "PriceInRobux": 10
    }
  ],
  "FinalPage": true
}

');
});

$router->get('/universes/get-aliases', function(){
    header("Content-type: application/json");
    die('{}');
});

$router->get('/badges/list-badges-for-place/json', function(){
    header("Content-type: application/json");
    die('{}');
});

$router->get('/universes/get-info', function(){
    if(isset($_GET["universeId"])){
        $universeid = (int)$_GET["universeId"];

        global $db;

        $universeinfo = $db->table("universes")->where("id", $universeid)->first();

        if($universeinfo !== null){
            $data = [
                "Name" => $universeinfo->title,
                "Description" => $universeinfo->description,
                "RootPlace" => 1,
                "StudioAccessToApisAllowed" => true,
                "CurrentUserHasEditPermissions" => true,
                "UniverseAvatarType" => "MorphToR6"
            ];
            header("Content-type: application/json");
            die(json_encode($data));
        }

    }


    die('');
});

$router->get('/IDE/ClientToolbox.aspx', function(){
    $pagebuilder = new pagebuilder;
    $pagebuilder::get_template("ide/clienttoolbox");
});

$router->get('/universes/get-universe-places', function(){
    http_response_code(200);

    global $db;

    if(isset($_GET["universeId"])){
        $universeid = (int)$_GET["universeId"];
        $universeinfo = $db->table("universes")->where("id", $universeid)->first();

        $return = [
            "FinalPage"=>true,
            "RootPlace"=>$universeinfo->assetid,
            "Places"=>[
                [
                    "PlaceId"=>$universeinfo->assetid,
                    "Name"=>$universeinfo->title
                ],
            ],
            "PageSize"=>50
        ];

        die(json_encode($return));

    }

    die('{"FinalPage":true,"RootPlace":1,"Places":[{"PlaceId":1,"Name":"Test"}],"PageSize":50}');
});

$router->get('/universes/get-universe-containing-place', function(){
    if(isset($_GET["placeid"])){
        $placeid = $_GET["placeid"];

        global $db;

        $universeinfo = $db->table("universes")->where("assetid", $placeid)->first();

        if($universeinfo !== null){
            $returnarray = [
                "UniverseId"=>$universeinfo->id
            ];

            die(json_encode($returnarray));
        }

        http_response_code(404);
        die();

    } else {
        http_response_code(400);
        die();
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
    global $currentuser;
    
    if($currentuser !== null){
        $data = [
            "AccountAgeInDays" => 29,
            "AccountSettingsApiDomain" => "https://www.watrbx.wtf",
            "AgeBracket" => 0,
            "AllowedNotificationSourceTypes" => [
                "Test", "FriendRequestReceived", "FriendRequestAccepted", "PartyInviteReceived",
                "PartyMemberJoined", "ChatNewMessage", "PrivateMessageReceived",
                "UserAddedToPrivateServerWhiteList", "ConversationUniverseChanged", "TeamCreateInvite",
                "GameUpdate", "DeveloperMetricsAvailable"
            ],
            "AllowedReceiverDestinationTypes" => ["DesktopPush", "NotificationStream"],
            "ApiProxyDomain" => "https://www.watrbx.wtf",
            "AuthDomain" => "https://www.watrbx.wtf",
            "BcExpireDate" => "/Date(-0)/",
            "BcLevel" => $currentuser->buildersclub,
            "BcRenewalPeriod" => null,
            "BlacklistedNotificationSourceTypesForMobilePush" => [],
            "BlockedUsersModel" => [
                "BlockedUserIds" => [],
                "BlockedUsers" => [],
                "MaxBlockedUsers" => 50,
                "Page" => 1,
                "Total" => 1
            ],
            "CanHideInventory" => false,
            "CanTrade" => true,
            "ChangeEmailRequiresTwoStepVerification" => false,
            "ChangePassword" => false,
            "ChangePasswordRequiresTwoStepVerification" => false,
            "ChangeUsernameEnabled" => true,
            "ClientIpAddress" => "127.0.0.1",
            "CurrencyOperationErrorMessage" => null,
            "DisplayName" => $currentuser->username,
            "Facebook" => null,
            "FastTrackMember" => null,
            "HasCurrencyOperationError" => false,
            "HasFreeNameChange" => false,
            "HasValidPasswordSet" => true,
            "InApp" => false,
            "IsAccountPinEnabled" => true,
            "IsAccountPrivacySettingsV2Enabled" => true,
            "IsAccountRestrictionsFeatureEnabled" => true,
            "IsAccountRestrictionsSettingEnabled" => false,
            "IsAccountSettingsSocialNetworksV2Enabled" => false,
            "IsAdmin" => $currentuser->is_admin == 1,
            "IsAgeDownEnabled" => false,
            "IsAnyBC" => $currentuser->buildersclub !== "None",
            "IsAppChatSettingEnabled" => true,
            "IsBcRenewalMembership" => false,
            "IsDisconnectFbSocialSignOnEnabled" => true,
            "IsDisconnectXboxEnabled" => true,
            "IsEmailOnFile" => true,
            "IsEmailVerified" => false,
            "IsFastTrackAccessible" => false,
            "IsGameChatSettingEnabled" => true,
            "IsI18nBirthdayPickerInAccountSettingsEnabled" => true,
            "IsOBC" => $currentuser->buildersclub == "OutrageousBuildersClub",
            "IsPhoneFeatureEnabled" => false,
            "IsPremium" => false,
            "IsPromotionChannelsEndpointEnabled" => true,
            "IsSendVerifyEmailApiEndpointEnabled" => true,
            "IsSetPasswordNotificationEnabled" => false,
            "IsSuperSafeModeEnabledForPrivacySetting" => false,
            "IsTBC" => $currentuser->buildersclub == "TurboBuildersClub",
            "IsTwoStepToggleEnabled" => false,
            "IsUiBootstrapModalV2Enabled" => true,
            "IsUnder13UpdateEmailMessageSectionShown" => false,
            "IsUpdateEmailApiEndpointEnabled" => true,
            "IsUpdateEmailSectionShown" => true,
            "IsUserConnectedToFacebook" => false,
            "LocaleApiDomain" => "https://www.watrbx.wtf",
            "MinimumChromeVersionForPushNotifications" => 50,
            "MissingParentEmail" => false,
            "MyAccountSecurityModel" => [
                "IsEmailSet" => false,
                "IsEmailVerified" => false,
                "IsTwoStepEnabled" => false,
                "ShowSignOutFromAllSessions" => true,
                "TwoStepVerificationViewModel" => [
                    "CodeLength" => 6,
                    "IsEnabled" => false,
                    "UserId" => $currentuser->id,
                    "ValidCodeCharacters" => null
                ]
            ],
            "Name" => $currentuser->username,
            "NotificationSettingsDomain" => "https://www.watrbx.wtf",
            "PreviousUserNames" => "",
            "PushNotificationsEnabledOnFirefox" => true,
            "ReceiveNewsletter" => false,
            "RobuxRemainingForUsernameChange" => 1000 - $currentuser->robux,
            "SocialNetworksVisibilityPrivacy" => 6,
            "SocialNetworksVisibilityPrivacyValue" => "AllUsers",
            "Tab" => null,
            "Twitch" => null,
            "Twitter" => null,
            "UseSuperSafeChat" => false,
            "UseSuperSafePrivacyMode" => false,
            "UserAbove13" => true,
            "UserEmail" => $currentuser->email,
            "UserEmailMasked" => true,
            "UserEmailVerified" => false,
            "UserId" => $currentuser->id,
            "YouTube" => null
        ];

        echo json_encode($settings);
        die();
    }

});

$router->get('/game/logout.aspx', function() {
    setcookie(".ROBLOSECURITY", "ThisIsInvalid!!!!", time() - 9999999, "/", ".watrbx.wtf");
    header("Location: /newlogin");
    die("[]");
});

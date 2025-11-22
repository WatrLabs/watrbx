<?php
use watrlabs\authentication;
use watrbx\sitefunctions;
$auth = new authentication();

$func = new sitefunctions();
$canregister = $func->get_setting("CAN_REGISTER");
$captchaEnabled = $func->get_setting("CaptchaEnabled");


if($auth->hasaccount()){
    header("Location: /home");
    die();
}

?>

<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <!-- MachineID: WEB129 -->
    <title>watrbx.wtf</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ROBLOX Corporation" />
    <meta name="description" content="User-generated MMO gaming site for kids, teens, and adults. Players architect their own worlds. Builders create free online games that simulate the real world. Create and play amazing 3D games. An online gaming cloud and distributed physics engine." />
    <meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
    <meta name="apple-itunes-app" content="app-id=431946152" />

    
    <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico" />

    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600,700" rel="stylesheet" type="text/css">

    
    
<link rel='stylesheet' href='/CSS/Base/CSS/FetchCSS?path=leanbase___71f465fc3508bdea4bb0caae519e9836_m.css' />

    
<link rel='stylesheet' href='/CSS/Base/CSS/FetchCSS?path=page___6a52ad4bd2c1f5af05f96ebf3f5ac3c9_m.css' />

    
    
    
    <script type='text/javascript' src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='https://ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>


    
    <script type='text/javascript' src='/js/35442da4b07e6a0ed6b085424d1a52cb.js'></script>


    
    


    
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    	<script type="text/javascript">

        var _gaq = _gaq || [];

		    _gaq.push(['_setAccount', 'UA-11419793-1']);
		    _gaq.push(['_setCampSourceKey', 'rbx_source']);
		    _gaq.push(['_setCampMediumKey', 'rbx_medium']);
		    _gaq.push(['_setCampContentKey', 'rbx_campaign']);
		        _gaq.push(['_setDomainName', 'watrbx.wtf']);
		_gaq.push(['b._setAccount', 'UA-486632-1']);
		_gaq.push(['b._setCampSourceKey', 'rbx_source']);
		_gaq.push(['b._setCampMediumKey', 'rbx_medium']);
		_gaq.push(['b._setCampContentKey', 'rbx_campaign']);

		_gaq.push(['b._setDomainName', 'watrbx.wtf']);
        
            _gaq.push(['b._setCustomVar', 1, 'Visitor', 'Anonymous', 2]);
            _gaq.push(['b._trackPageview']);    
        
        
        

		_gaq.push(['c._setAccount', 'UA-26810151-2']);
		_gaq.push(['c._setDomainName', 'watrbx.wtf']);

		(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();

	</script>

    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer)\.roblox\.com|robloxlabs\.com)((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm"></div>
            <script type="text/javascript">
            $(function() {
                if (Roblox.EventStream) {
                    Roblox.EventStream.InitializeEventStream("//ecsv2.watrbx.wtf/www/e.png");
                }
            });
        </script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/asset/'] = 'https://www.watrbx.wtf/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = 'https://www.watrbx.wtf/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = 'https://www.watrbx.wtf/client-status';
Roblox.Endpoints.Urls['/game/'] = 'https://www.watrbx.wtf/game/';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://www.watrbx.wtf/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://www.watrbx.wtf/game/getauthticket';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://www.watrbx.wtf/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/report-stats'] = 'https://www.watrbx.wtf/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'https://www.watrbx.wtf/game/report-event';
Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.watrbx.wtf/chat/chat';
Roblox.Endpoints.Urls['/chat/party/setting'] = 'https://www.watrbx.wtf/chat/party/setting';
Roblox.Endpoints.Urls['/chat/get.ashx'] = 'https://www.watrbx.wtf/chat/get.ashx';
Roblox.Endpoints.Urls['/chat/party.ashx'] = 'https://www.watrbx.wtf/chat/party.ashx';
Roblox.Endpoints.Urls['/chat/send.ashx'] = 'https://www.watrbx.wtf/chat/send.ashx';
Roblox.Endpoints.Urls['/chat/utility.ashx'] = 'https://www.watrbx.wtf/chat/utility.ashx';
Roblox.Endpoints.Urls['/chat/friendhandler.ashx'] = 'https://www.watrbx.wtf/chat/friendhandler.ashx';
Roblox.Endpoints.Urls['/presence/users'] = 'https://www.watrbx.wtf/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = 'https://www.watrbx.wtf/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = 'https://www.watrbx.wtf/friends/list';
Roblox.Endpoints.Urls['/navigation/getCount'] = 'https://www.watrbx.wtf/navigation/getCount';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.watrbx.wtf/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog'] = 'https://www.watrbx.wtf/catalog';
Roblox.Endpoints.Urls['/catalog/'] = 'https://www.watrbx.wtf/catalog/';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://www.watrbx.wtf/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'https://www.watrbx.wtf/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://www.watrbx.wtf/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://www.watrbx.wtf/catalog/lists.aspx';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://www.watrbx.wtf/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://www.watrbx.wtf/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://www.watrbx.wtf/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://www.watrbx.wtf/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://www.watrbx.wtf/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://www.watrbx.wtf/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://www.watrbx.wtf/asset/request-thumbnail-fix';
Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.watrbx.wtf/avatar-thumbnail-3d/json';
Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.watrbx.wtf/avatar-thumbnail/image';
Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.watrbx.wtf/avatar-thumbnail/json';
Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.watrbx.wtf/avatar-thumbnails';
Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.watrbx.wtf/avatar/request-thumbnail-fix';
Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.watrbx.wtf/bust-thumbnail/json';
Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://www.watrbx.wtf/group-thumbnails';
Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.watrbx.wtf/headshot-thumbnail/json';
Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://www.watrbx.wtf/item-thumbnails';
Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.watrbx.wtf/outfit-thumbnail/json';
Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://www.watrbx.wtf/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshot/'] = 'https://www.watrbx.wtf/thumbnail/avatar-headshot/';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshots/'] = 'https://www.watrbx.wtf/thumbnail/avatar-headshots/';
Roblox.Endpoints.Urls['/thumbnail/place/'] = 'https://www.watrbx.wtf/thumbnail/place/';
Roblox.Endpoints.Urls['/thumbnail/user-avatar/'] = 'https://www.watrbx.wtf/thumbnail/user-avatar/';
Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.watrbx.wtf/thumbnail/asset/';
Roblox.Endpoints.Urls['/thumbnail/resolve-hash/'] = 'https://www.watrbx.wtf/thumbnail/resolve-hash/';
Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.watrbx.wtf/thumbnail/get-asset-media';
Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.watrbx.wtf/thumbnail/remove-asset-media';
Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.watrbx.wtf/thumbnail/set-asset-media-sort-order';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.watrbx.wtf/thumbnail/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://www.watrbx.wtf/thumbnail/place-thumbnails-partial';
Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.watrbx.wtf/thumbnail_holder/g';
Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://www.watrbx.wtf/groups/getprimarygroupinfo.ashx';
</script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
</script>

</head>
<body data-performance-relative-value="0.5">
    
    

<style type="text/css">
    .coverSprite {
        background-repeat: no-repeat;
        background-image: url('/images/20e7d1543d2c5caf201184d86530fc35.png');
    }

    #RollerContainer {
        background-image: url('/images/dcbdfaf1c08058e71f65c09f7b98ff04.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .special-dropdown select {
        border: 0 !important;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: url('/images/379f4f1018f31cbb62ef52a22d9f2118.png') no-repeat;
        background-position: 92% 40%;
        width: 100px;
        text-indent: 0.01px;
        text-overflow: "";
    }
    #InnerWhatsRobloxContainer1 {
        height: 70%;
        background-image: url('/images/cca69eca62f23ca413fc920549e936ea.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 30% center;
        color: white;
    }
    #GameImage1 {
        background-image: url('/images/42268b6264d89827401ef912f174f288.jpg');
        margin-right: 5px;
    }

    #GameImage2 {
        background-image: url('/images/04baeb33ef66ef1395cd5464309fece6.jpg');
        margin-right: 5px;
    }

    #GameImage3 {
        background-image: url('/images/e8b89d14690203420d64b5b2fda0b461.jpg');
        margin-right: -10px;
        width: calc(33.333333% - 10px);
    }
</style>

<div class="navbar navbar-landing navbar-fixed-top" role="navigation" 
     >
    <div class="container">
        <div class="row">
            <div class="navbar-header col-md-6">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#LandingNavbar">
                    Log In
                </button>
                    <div class="navbar-brand hidden-xs"><img class="robloxLogo" src="/images/10722000cfdcfe1f5b447d83e6d6c761.png" /></div>
                <ul id="TopLeftNavLinks" class="nav navbar-nav">
                    <li id="PlayLink" class="pull-left"><a href="#RollerContainer" onclick="return scrollTo(1, '#RollerContainer');">Play</a></li>
                    <li id="AboutLink" class="pull-left"><a href="#WhatsRobloxContainer" onclick="return scrollTo(2, '#WhatsRobloxContainer');">About</a></li>
                    <li id="PlatformLink" class="pull-left"><a href="#RobloxDeviceText" onclick="return scrollTo(3, '#RobloxDeviceText');">Platforms</a></li>
                    <li id="magic-line"></li>
                </ul>
            </div>


<div class="collapse navbar-collapse col-sm-6" id="LandingNavbar" ng-modules="roblox.formEvents" >
    <form name="loginForm" action="/api/v1/login" id="LogInForm" class="navbar-form form-inline navbar-right" method="post" role="form" rbx-form-context context="RollerCoaster" novalidate>
        <div class="form-group" id="LoginUsernameParent">
            <input id="LoginUsername" type="text" placeholder="Username" class="form-control" name="username" rbx-form-interaction />
        </div>
        <div class="form-group" id="LoginPasswordParent">
            <input id="LoginPassword" type="password" placeholder="Password" class="form-control" name="password" rbx-form-interaction />
        </div>
        <div class="form-group">
            <input type="submit" id="LoginButton" class="form-control" value="Log In" rbx-form-interaction name="submitLogin" />
        </div>
        <a id="HeaderForgotPassword" class="navbar-link" href="/Login/ResetPasswordRequest.aspx">Forgot Username/Password?</a>
        <input id="ReturnUrl" name="ReturnUrl" type="hidden" value="" />
    </form>
</div>        </div>
    </div>
</div>

<div class="container-fluid" 
     >
    <!-- Roller Coaster-->
    <section class="row full-height-section" id="RollerContainer">
        <div class="col-md-12 inner-full-height-section" id="InnerRollerContainer">
            <div id="MainCenterContainer" class="row">
                <div class="col-xs-12 col-md-6">
                    <div id="MainLogo" class="text-right">
                        <div id="LogoAndSlogan" class="text-center">
                                <img id="MainLogoImage" title="ROBLOX" class="center-block img-responsive" src="/images/f76c76889f4b167ca1f27edc27eb8146.png" />
                            <div class="clearfix"></div>
                            <h1>Powering Imagination<span> &#8482 </span></h1>
                        </div>
                    </div>
                </div>

                

<!-- Modal -->
<div id="BootstrapConfirmationModal" data-modal-handle="bootstrap-confirmation" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="roblox-close-btn" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="ImageContainer roblox-item-image" data-image-size="small" data-no-overlays data-no-click>
                    <img class="GenericModalImage" alt="generic image" />
                </div>
                <p class="modal-body-text"></p>
                <p id="roblox-captcha-error" class="text-center text-danger"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="roblox-decline-btn" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="roblox-confirm-btn" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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

                <div class="clearfix visible-sm"></div>
                <div class="col-xs-12 col-md-6">
                        <div id="SignUpFormContainer" class=""
                             data-return-url="">
                                <h3 class="text-center">Sign up and start having fun!</h3>



<style type="text/css">
    .male {
        background-image: url('/images/856241927a2ac609e3033feada3ef9f9.png');
        background-repeat: no-repeat;
    }
    .female {
        background-image: url('/images/a0afd0556163477e1023c5aa55d1b9f6.png');
        background-repeat: no-repeat;
    }
</style>

<div class="signup-or-log-in" ng-modules="SignupOrLogin"
     data-metadata-params="{&quot;isEligibleForHideAdsAbTest&quot;:&quot;True&quot;}"
     data-v2-username-password-rules-enabled="0">

    

    <div class="signup-container" ng-controller="SignupController" ng-show="isSectionShown">
        <div class="signup-input-area" ng-form name="signupForm" rbx-form-context context="RollerCoaster">
             

<img src="/timg/rbx" style="position: absolute"/>
            <div class="rbx-form-group" ng-class="{'has-error' : (badSubmit || signupForm.username.$dirty) && signupForm.username.$invalid, 'has-success': (signupForm.username.$dirty && signupForm.username.$valid) }">
                <input id="Username" ng-trim="false" ng-change="onChange()" name="username" class="form-control rbx-input-field" type="text" tabindex="1" rbx-valid-username rbx-form-interaction rbx-form-validation placeholder="Username (3-20 characters, no spaces)" ng-model="signup.username" />
                <p id="UsernameInputValidation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="(badSubmit || signupForm.username.$dirty) ? signupForm.username.$validationMessage : ''"></p>
            </div>
            <div class="rbx-form-group" ng-class="{'has-error' : (badSubmit || signupForm.password.$dirty) && signupForm.password.$invalid, 'has-success': (signupForm.password.$dirty && signupForm.password.$valid) }">
                <input id="Password" ng-trim="false" name="password" class="form-control rbx-input-field" type="password" tabindex="2" rbx-valid-password rbx-form-interaction rbx-form-validation rbx-form-validation-redact-input placeholder="Password (4 letters, 2 numbers minimum)" ng-model="signup.password">
                <p id="PasswordInputValidation" class="rbx-control-label input-validation rbx-text-danger" ng-bind="(badSubmit || signupForm.password.$dirty) ? signupForm.password.$validationMessage : ''"></p>
            </div>
            <div class="rbx-form-group" ng-class="{'has-error' : (badSubmit || signupForm.passwordConfirm.$dirty) && signupForm.passwordConfirm.$invalid, 'has-success': (signupForm.passwordConfirm.$dirty && signupForm.passwordConfirm.$valid) }">
                <input id="PasswordConfirm" ng-trim="false" name="passwordConfirm" class="form-control rbx-input-field" match="signup.password" rbx-valid-password-confirm rbx-form-interaction rbx-form-validation rbx-form-validation-redact-input type="password" tabindex="3" placeholder="Confirm Password" ng-model="signup.passwordConfirm"/>
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
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
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
            
            <button id="SignupButton" type="button" tabindex="9" class="rbx-btn-primary-md" rbx-form-interaction name="signupSubmit" ng-disabled="isSubmitting" data-signup-api-url="/api/v1/signup" ng-click="submitSignup($event)" ng-keypress="submitSignup($event)" disabled>Sign Up</button>
            <noscript>
                <div class="text-danger">
                    <strong>JavaScript is required to submit this form.</strong>
                </div>
            </noscript>

            <?php
                if($canregister !== "true"){
                    echo '<div class="text-danger" style="text-align: center;"><strong>Account creation is temporarily disabled.</strong></div>';
                }
            ?>

            <div id="GeneralErrorText" class="input-validation-large rbx-alert-warning rbx-font-bold" ng-cloak ng-show="signupForm.$generalError" ng-bind="signupForm.$generalErrorText"></div>
        </div>
    </div>
    
    <div class="captcha-container" ng-controller="CaptchaController" ng-form name="captchaForm" rbx-form-context context="RollerCoaster" ng-cloak ng-show="isSectionShown">
        <?php

                if($captchaEnabled == "true"){
                    echo '<div class="cf-turnstile" data-sitekey="'. $_ENV["TurnstileSiteKey"].'" data-callback="onTurnstileSuccess"></div>';
                }

        ?>
        <div class="captcha-response-message rbx-text-danger" ng-bind="$validationMessage"></div>
        <script type="text/javascript">
		var RecaptchaOptions = {
			theme : 'white',
			tabindex : 0
		};

</script>

<script>

    const signupbtn = document.getElementById("SignupButton");

    signupbtn.disabled = true;
    
    canregister = "<?=$canregister?>"
    const captchaenabled = "<?=$captchaEnabled?>";

    function checkCaptcha() {
        if (captchaenabled == "false") {
            signupbtn.disabled = false;
            return false;
        }
    }

    console.log(captchaenabled);

    checkCaptcha();

    function onTurnstileSuccess(token) {

        console.log("Turnstile has completed.");
        
        if(canregister == "false"){
            return;
        }

       signupbtn.disabled = false;
        
        url = "/api/v1/verify-captcha";
        captcha = document.getElementsByName("cf-turnstile-response")[0].value;
        
        postdata = "captcha=" + captcha;
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
        
        xhr.onload = function(){
            if(xhr.status == 200){
                var response = JSON.parse(xhr.responseText);
                var token = response["data"].token;
                document.cookie = "token=" + token + "; path=/; expires=" + new Date(Date.now() + 3600 * 1000).toUTCString();
            } else {
                var response = JSON.parse(xhr.responseText);
                if(response.success == false){
                    alert(response.error);
                }
            }
        }
        
        xhr.send(postdata);
    }
    
    signupbtn.disabled = true;

    checkCaptcha();

</script>

<script
  src="https://challenges.cloudflare.com/turnstile/v0/api.js"
  defer
></script>



                        </div>
                </div>
            </div>

        </div>
        <div class="attribution hidden-xs">
            <span class="notranslate">Game: ROBLOX Point</span><br>
            Developer: <span class="notranslate">StarMarine614</span>
        </div>
    </section>

    <!-- What is Roblox -->
    <section class="row full-height-section" id="WhatsRobloxContainer">

        <div class="col-md-12 inner-full-height-section">

            <div class="row" id="InnerWhatsRobloxContainer1">
                <div id="WhatIsRobloxTextBg" class="col-sm-5 col-sm-offset-6 col-xs-8 col-xs-offset-2">
                    <h1 class="text-center">What is ROBLOX?</h1>
                    <p class="lead text-justify">ROBLOX is the Game Powered by Players. Build your own game world and bring it to life, publish and share it, experience what others have created, play with friends. ROBLOX is the leader in user-generated creation and gaming for all ages. What will you build?</p>
                </div>
            </div>

            <div class="row" id="InnerWhatsRobloxContainer2">
                <div id="GameImage1" class="col-sm-4 col-xs-12 game-image"></div>
                <div id="GameImage2" class="hidden-xs col-sm-4 game-image"></div>
                <div id="GameImage3" class="col-sm-4 hidden-xs game-image"></div>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>

    <!-- Roblox on your device -->
    <section id="DeviceSection">
        <div class="row" id="RobloxDeviceText">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2>ROBLOX on your device.</h2>
                <p class="lead center-block">Play ROBLOX on your desktop, your tablet, or your phone. Access your account, games, and inventory; connect with your friends; and play games whether you're at home or on the go.</p>
            </div>
        </div>

        <div class="row" id="DeviceImageContainer">
            <div class="col-md-12">
                <div class="row text-center">
                    <img id="ComputerImgSmall" class="center-block img-responsive hidden-lg ComputerImg" src="/images/5ed7d6f37de88cc74c581d9a97fdcbb2.png" />
                    <img class="center-block img-responsive visible-lg-block ComputerImg" src="/images/d7fb7b6fecd91e0c5eccf79c943b0286.png" />

                </div>
            </div>
        </div>
    </section>

    <footer class="row">
        <div class="col-xs-12">
            <div id="FooterBigLinks" class="row">
                <div class="col-md-12 text-center">
                        <a href="//corp.watrbx.wtf" target="_blank">About Us</a>
                        <a href="//corp.watrbx.wtf/jobs" target="_blank">Jobs</a>
                    <a href="//blog.watrbx.wtf" target="_blank">Blog</a>
                    <a href="https://www.watrbx.wtf/Info/Privacy.aspx" target="_blank">Privacy</a>
                    <a href="//corp.watrbx.wtf/parents" target="_blank">Parents</a>
                    <a href="//en.help.watrbx.wtf/" target="_blank">Help</a>
                </div>
            </div>
            <div class="row">
                <div id="FooterLegalText" class="col-xs-11 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-justify">
                    ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a target="_blank" href="//corp.watrbx.wtf">ROBLOX Corporation</a>, ©2015. Patents pending.
                    ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended. Use of this site signifies your acceptance of the <a href="https://www.watrbx.wtf/info/terms-of-service" target="_blank">Terms and Conditions</a>.
                </div>
            </div>
        </div>
    </footer>
</div>
 

<img src="/timg/rbx" style="position: absolute"/>


    
    <script type='text/javascript' src='/js/5953df4cf9dce65eddce189b6b391051.js'></script>


    
<script type='text/javascript' src='/js/4e21a9fc1569b661b0ff382b4272aea6.js'></script>
            

    
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

    
    <script type='text/javascript' src='/js/5f02340f4e2adcdb0d68be6bd3d7e93c.js'></script>
<script>
    setTimeout(function() {
        signupbtn.disabled = true;
        checkCaptcha();
    }, 500);
</script>
</body>
</html>

<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;
$pagebuilder = new pagebuilder();
$auth = new authentication();
$func = new sitefunctions();
$auth->requireguest();

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___87c9d2d7e0aaa8cda18c9628185c3f61_m.css');
$pagebuilder->addresource('jsfiles', '/js/71159c155b71b830770f1880fd3b181b.js');
$pagebuilder->addresource('jsfiles', '/js/827f89b1af9564915de6fb8725c9b27c.js');
$pagebuilder->addresource('jsfiles', '/js/65a34d306e0f2723a016b3b9e9cfa4ce.js');
$pagebuilder->set_page_name("Login");
$pagebuilder->setlegacy(true);

$pagebuilder->buildheader();
?>
                    <div id="BodyWrapper" class="">
                        <div id="RepositionBody">
                            <div id="Body" style="width:970px">

<!--[if IE 7]>
<style>
    #signInButtonPanel a
    {
        margin-right: 143px;
    }
</style>
<![endif]-->
<h1>Login to ROBLOX</h1>

<div>


<div id="TwoStepVerificationApiPaths"
     data-request-code-unauthenticated="/twostepverification/request-unauthenticated"
     data-request-code="/twostepverification/request"
     data-verify-code-unauthenticated="/twostepverification/verify-unauthenticated"
     data-verify-code="/twostepverification/verify">
</div>
<!-- this reminds me we need to do twofa -->

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
<form action="/api/v1/login" id="loginForm" method="post">            
    <?=$func->get_message();?>
    <br>
    <div id="loginarea" class="divider-bottom" data-is-captcha-on="False">
                <div id="leftArea">
                    <div id="loginPanel">
                        <table id="logintable">
                            <tr id="username">
                                <td><label class="form-label" for="Username">Username:</label></td>
                                <td><input class="text-box text-box-medium" data-val="true" data-val-required="You must enter a username." id="Username" name="Username" type="text" value="" /></td>
                            </tr>
                            <tr id="password">
                                <td><label class="form-label" for="Password">Password:</label></td>
                                <td><input class="text-box text-box-medium" data-val="true" data-val-required="You must enter a password." id="Password" name="Password" type="password" /></td>
                            </tr>
                        </table>
                        <div>
                        </div>
                        <div>
                            <div id="forgotPasswordPanel">
                                <a class="text-link" href="/Login/ResetPasswordRequest.aspx" target="_blank">Forgot your password?</a>
                            </div>
                            <div id="signInButtonPanel" data-use-apiproxy-signin="False" data-sign-on-api-path="/api/v1/login">
                                <button class="btn-medium btn-primary">Sign In</button>
                                
                            </div>
                            <div class="clearFloats">
                            </div>
                        </div>
                        <span id="fb-root">
                                        <div id="SplashPageConnect" class="fbSplashPageConnect social-login" data-rbx-provider="facebook">
                                            <a class="facebook-login">
                                                <span class="left"></span>
                                                <span class="middle">Login with Facebook<span>Login with Facebook</span></span>
                                                <span class="right"></span>
                                            </a>
                                        </div>


<div id="SocialIdentitiesInformation" 
    data-rbx-login=""
    data-rbx-update=""
    data-rbx-disconnect=""
     data-rbx-login-redirect-url="/social/postlogin"


     >
</div>                        </span>
                    </div>
                </div>
                <div id="rightArea" class="divider-left">
                    <div id="signUpPanel" class="FrontPageLoginBox">
                        <p class="text">Not a member?</p>
                        <h2>Sign Up to Build & Make Friends</h2>
<a  roblox-js-onsignup class="btn-medium btn-primary">Sign Up</a>                    </div>
                </div>
            </div>
<input id="ReturnUrl" name="ReturnUrl" type="hidden" value="" /></form>
</div>
<script type="text/javascript">
    if (typeof Roblox === "undefined") {
        Roblox = {};
    }
    if (typeof Roblox.Login === "undefined") {
        Roblox.Login = {};
    }

    Roblox.Login.Resources = {
        //<sl:translate>
        january: "January"
        , february: "February"
        , march: "March"
        , april: "April"
        , may: "May"
        , june: "June"
        , july: "July"
        , august: "August"
        , september: "September"
        , october: "October"
        , november: "November"
        , december: "December"
        //</sl:translate>
    };
</script>


<div id="SocialIdentitiesInformation" 
    data-rbx-login=""
    data-rbx-update=""
    data-rbx-disconnect=""
     data-rbx-login-redirect-url="/social/postlogin"


     >
</div>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                    </div>
                    <? $pagebuilder->build_footer(); ?>

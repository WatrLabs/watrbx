


<!DOCTYPE html>

<html>
<head><title>
	ROBLOX Login
</title>
<link rel='stylesheet' href='/CSS/Base/CSS/FetchCSS?path=reset___90041b2af2fb6b9b7864ee66001ba812_m.css' />

<link rel='stylesheet' href='/CSS/Base/CSS/FetchCSS?path=main___6e296d537fba6676b05da60de57c2a30_m.css' />

<link rel='stylesheet' href='/CSS/Base/CSS/FetchCSS?path=page___a8df4e05745e2f1982052b2df4b09733_m.css' />
<script type='text/javascript' src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='https://ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/4.0/1/MicrosoftAjax.js'></script>
<script type='text/javascript'>window.Sys || document.write("<script type='text/javascript' src='/js/Microsoft/MicrosoftAjax.js'><\/script>")</script>
<script type='text/javascript' src='/js/fbf1ee7f87e15b4da11fda4617461836.js'></script>
</head>
<body data-parent-url="/home" data-captchaon="false" data-clientipaddress="207.241.225.226" data-redirecttohttp ="true">
 

<div id="TwoStepVerificationApiPaths"
     data-request-code-unauthenticated="/twostepverification/request-unauthenticated"
     data-request-code="/twostepverification/request"
     data-verify-code-unauthenticated="/twostepverification/verify-unauthenticated"
     data-verify-code="/twostepverification/verify">
</div>
 <div id="NotLoggedInPanel" class="rbx-login-form">
	<form name="FacebookLoginForm" method="post" action="/Login/iFrameLogin.aspx" id="FacebookLoginForm" class="rbx-form-horizontal" role="form">
<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="dzf2RrBRSy/WgsUMWEo6YBgnkvPcq6+Z2rTsX7aWx2TYcIDL0xi92y4NMmvC2Qv6asLO2cjvyWJnyYXRF0+FXoWUoH5tQxuxggty2/L4TCeFJrL96Dptog7+c9oNWovIIBBVO6qeWckXy6MSBxtFLEGewB0pX2TMcxWM8HpAgLT87BZ/tCLybQ8jx1bXZih2GRsJcSxbd5B683ehzQ02hmTRhgU3+VvqS0dVCvq6kE27wdjj" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['FacebookLoginForm'];
if (!theForm) {
    theForm = document.FacebookLoginForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>



<script src="/ScriptResource.axd?d=_93_rgQ5E6-wjuz8R2_fwh8uTqa3-RhXY1Phqp0LA0Y1geO99XLeod1wEPn4kc-s9PZLGYDPr7J4CCoI5YBGNXJ3Zc8XGhkBgJ6dQbjCoQksswaoBe81T8tYqvfUUzNS9TjilXkcAeHQVW0XAlE7JoksTgg50KdI2Qf2imFIhhKT2nopOGrnYbQMl_raTHlLINNksacp-SNmGAMiWDmEsAQYx9cVYmRMLvgQ8ukEMaF_Z9THHSMySVpDTqvkAETr4H2AXyDyii3uoYpuZTILklblp3U1" type="text/javascript"></script>
<script src="../Services/Secure/LoginService.asmx/js" type="text/javascript"></script>
<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="2DF76423" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="UhHX091H49paRx32ssv6GDspPuXFiIfjA7wH46jJXYT4aX2vL/oNx6bm0BqwkYcnbsnSpTIyR199nEb89fwjgElYixLIS9Qv+7JutZxhxstjzSRVtXlFLdVGIdBmbFD8Ui/dQycCQ8EmRX+64qZ7UXMCHBc=" />
</div>
        <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ScriptManager', 'FacebookLoginForm', [], [], [], 90, '');
//]]>
</script>

        <div id="LoginForm" class="rbx-newLogin">
            <div id="credentials-section" class="log-in-form">
                <div class="rbx-form-group">
                    <input name="UserName" type="text" id="UserName" class="form-control rbx-input-field LoginFormInput hidden" name="UserName" placeholder="Username" />
                </div>
                <div class="rbx-form-group">
                    <input name="Password" type="password" id="Password" class="form-control rbx-input-field LoginFormInput" placeholder="Password" />
                </div>
                <div id="iFrameCaptchaControl">
                    
                </div>
                <div class="rbx-login-btns">
                    <a class="rbx-btn-secondary-sm" id="LoginButton" tabindex="4">Log In</a>
					<a class="rbx-btn-control-sm" href="/newlogin" target="_top">Sign up</a>
                </div>
				<span id="LoggingInStatus" class="rbx-login-status">
					<img src="/images/6ec6fa292c1dcdb130dcf316ac050719.gif" alt="" />
					<span>Logging in...</span>
				</span>
            </div>
            <div id="two-step-verification-section" class="log-in-form" style="display: none">
                <div class="rbx-form-group">
                    <div id="TwoStepVerificationMessage" class="two-step-verification-message">Enter your two step verification code.</div>
                </div>
                <div class="rbx-form-group">
                    <input name="TwoStepVerificationCodeInput" type="text" id="TwoStepVerificationCodeInput" class="form-control rbx-input-field LoginFormInput" placeholder="Code" />
                </div>
                <div class="rbx-login-btns">
                    <a id="TwoStepVerificationNewCodeButton" class="rbx-btn-secondary-sm" style="display:none">New Code</a>
                    <a id="TwoStepVerificationSubmitButton" class="rbx-btn-secondary-sm">Submit</a>
                    <a id="TwoStepVerificationCancelButton" class="rbx-btn-control-sm">Cancel</a>
                </div>
            </div>
                <div class="rbx-login-msg">
                    <span id="ForgotPasswordLink">
					    <a href="ResetPasswordRequest.aspx" target="_top" class="rbx-link rbx-font-sm">Forgot Password?</a>
					</span>
				    <span id="ErrorMessage" class="rbx-text-danger rbx-font-sm"></span>
                </div>
				<div id="SocialNetworkSignIn" class="rbx-social-signin">
					<div id="fb-root"></div>
					
					<div class="rbx-facebook-login" >
						<a class="rbx-btn-generic-edit-sm iframe-login"  href="/social/redirect-to-facebook" target="_top">
  	                        <span class="rbx-icon-facebook"></span>
                            <span>Connect with Facebook</span>
	                    </a>
					</div>
                    

<div id="SocialIdentitiesInformation" 
    data-rbx-login="/social/notify-login"
    data-rbx-update="/social/update-info"
    data-rbx-disconnect="/social/disconnect"
    data-rbx-login-redirect-url="/social/postlogin"
    ></div>
				</div>
            </div>
    </form>
  </div>
	<script type="text/javascript">
	    $(function () {
	        Roblox.iFrameLogin.Resources = {
	            //<sl:translate>
	            invalidCaptchaEntry: 'Invalid Captcha entry',
	            //</sl:translate>
	            useSignOnApi: 'True' === 'True',
	            signOnApiPath: '/api/v1/login',
	            requestCodeUnauthenticatedPath: '/twostepverification/request-unauthenticated',
                verifyCodeUnauthenticatedPath: '/twostepverification/verify-unauthenticated',
	            enterTwoStepCodeMessage: 'Enter your two step verification code.',
	            invalidCodeMessage: 'Sorry, but the code you entered was invalid or has expired.',
	            floodedTwoStepMessage: 'Too many unsuccessful attempts. Please try again later.',
	            verifyEmailMessage: 'You do not have a verified email address. Please contact customer support.',
                unknownTwoStepErrorMessage: 'Sorry, an unknown error has occurred.'
	        };
	        Roblox.iFrameLogin.init();
	    });
	</script>
</body>
</html>

<?php
    use watrlabs\watrkit\pagebuilder;
    use watrlabs\authentication;
    use watrbx\sitefunctions;
    $sitefunc = new sitefunctions();
    $pagebuilder = new pagebuilder;
    $auth = new authentication;
    //$auth->requireguest();
    $pagebuilder->set_page_name("Forgot Password");
    $pagebuilder->addresource('cssfiles', '/assets/loginreq.css');
    $pagebuilder->addresource('jsfiles', 'https://challenges.cloudflare.com/turnstile/v0/api.js');
    $pagebuilder->buildheader();

?>
    <div id="main">
        <div style="position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
        <?=$sitefunc->get_message();?>
        <div id="login" class="container" style="text-align: center;">
            <h2><img src="/assets/images/watrbxlogo3.png" width="254" height="57" style="margin: 15px;"></h2>
			<form method="POST" action="/api/v1/forgot-password" id="loginform">
				<div align="center">
					<input align="center" name="username" placeholder="Enter Username">
				</div>
                <div class="cf-turnstile" data-sitekey="0x4AAAAAABOjpIjhdyjp1oF5"></div>
				<button class="button"> Request Password Reset </button>
			</form>
		</div>
    </div>
    </div>
<? $pagebuilder->get_snippet("footer"); ?>
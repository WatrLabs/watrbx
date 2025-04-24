<?php
    use watrlabs\watrkit\pagebuilder;
    use watrlabs\authentication;
    use watrbx\sitefunctions;
    $sitefunc = new sitefunctions();
    $pagebuilder = new pagebuilder;
    $auth = new authentication;
    $pagebuilder->set_page_name("Register");
    $pagebuilder->addresource('cssfiles', '/assets/loginreq.css?t='. time());
    $pagebuilder->addresource('jsfiles', 'https://challenges.cloudflare.com/turnstile/v0/api.js');
    $pagebuilder->buildheader();
    //$sitefunc->get_message();

?>
    <div id="main">
        <div style="position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
        <div id="reg" class="container">
			<h2><img src="/assets/images/watrbxlogo3.png" width="254" height="57" style="margin: 15px;"></h2>
			<form method="POST" id="loginform">
				<div align="right">
					<span> Username: </span>
					<input required align="right" name="username" placeholder="3 to 20 characters long">
				</div>
				<div align="right">
					<span> Password: </span>
					<input required align="right" type="password" name="password" placeholder="5 to 100 characters long.">
				</div>
				<div align="right">
					<span> Confirm Password: </span>
					<input required align="right" type="password" name="confpassword" placeholder="5 to 100 characters long.">
				</div>
				<div align="center" id="center">
					<div class="cf-turnstile" data-sitekey="0x4AAAAAABOjpIjhdyjp1oF5"></div>
				</div>
			<!--	<div align="right">
					<span> Invite Key: </span>
					<input required align="right" name="key" placeholder="Invite Keys are used to help keep bad actors out.">
				</div>--> 
				<input type="hidden" id="js_check" name="js_check" value="">

				<p id="tosyap" style="font-size: 14px;"> By signing up to watrbx, you must agree to our <a href="/info/tos">Terms of Service</a></p>
				<button class="button"> Register </button>
				
			</form>
			
		</div>
		<a href="https://discord.gg/kwX8wvEFw6" style="text-align: center;"><p>Join the discord!</p></a>
		</div>
		
    </div>
	<script>
    	var cookieName = "botprotection";
    	var expirationDate = new Date();
    	expirationDate.setMonth(expirationDate.getMonth() + 1);
    	var cookieString = cookieName + "=true; expires=" + expirationDate.toUTCString() + "; path=/";
    	document.cookie = cookieString;
    	document.getElementById('js_check').value = 'ok';

</script>
<? $pagebuilder->get_snippet("footer"); ?>
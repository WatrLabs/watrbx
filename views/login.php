<?php
    use watrlabs\watrkit\pagebuilder;
    use watrlabs\authentication;
    use watrbx\sitefunctions;
    $sitefunc = new sitefunctions();
    $pagebuilder = new pagebuilder;
    $auth = new authentication;
    //$auth->requireguest();
    $pagebuilder->set_page_name("Login");
    $pagebuilder->addresource('cssfiles', '/assets/loginreq.css');
    $pagebuilder->buildheader();

?>
    <div id="main">
        <div style="position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
        <div id="login" class="container">
            <h2><img src="/assets/images/watrbxlogo3.png" width="254" height="57" style="margin: 15px;"></h2>
			<form method="POST" id="loginform">
				<div align="right">
					<span> Username: </span>
					<input align="right" name="username" placeholder="3 to 20 characters long">
				</div>
				<div align="right">
					<span> Password: </span>
					<input align="right" type="password" name="password" placeholder="5 to 100 characters long.">
				</div>
				<button class="button"> Login </button>
			</form>
		</div>
		<a href="https://discord.gg/kwX8wvEFw6" style="text-align: center;"><p>Join the discord!</p></a>
    </div>
    </div>
<? $pagebuilder->get_snippet("footer"); ?>
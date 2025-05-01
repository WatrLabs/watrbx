<?php
    use watrlabs\watrkit\pagebuilder;
    use watrlabs\authentication;
    use watrbx\sitefunctions;
    $sitefunc = new sitefunctions();
    $pagebuilder = new pagebuilder;
    $auth = new authentication;
    $pagebuilder->set_page_name("Change Password");
    $pagebuilder->addresource('cssfiles', '/assets/loginreq.css');

    global $db;

    if(isset($_GET["code"])){

        $rawcode = $_GET["code"];

        if(preg_match('/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/', $rawcode)){

            $query = $db->table("changepass")->where("guid", $rawcode);
            $code = $query->first();

            if($code == null){
                $sitefunc->set_message("Invalid Reset Code!", "error");
                header("Location: /forgot-password");
		        die();
            }
        } else {
            $sitefunc->set_message("Invalid Reset Code!", "error");
            header("Location: /forgot-password");
		    die();
        }

    } else {
        $sitefunc->set_message("Invalid Reset Code!", "error");
        header("Location: /forgot-password");
		die();
    }

    $pagebuilder->buildheader();

?>
    <div id="main">
        <div style="position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
        <?=$sitefunc->get_message();?>
        <div id="login" class="container" style="text-align: center;">
            <h2><img src="/assets/images/watrbxlogo3.png" width="254" height="57" style="margin: 15px;"></h2>
			<form method="POST" action="/api/v1/change-password" id="loginform">
				<div align="center">
					<input align="center" name="password" placeholder="Enter New Password">
				</div>
                <div align="center">
					<input align="center" name="confpassword" placeholder="Confirm New Password">
				</div>
                <input name="guid" style="display: none;" value="<?=$rawcode?>">
				<button class="button"> Change Password </button>
			</form>
		</div>
    </div>
    </div>
<? $pagebuilder->get_snippet("footer"); ?>
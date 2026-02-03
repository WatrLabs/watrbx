<?php 
use watrlabs\watrkit\pagebuilder;
$pagebuilder = new pagebuilder();

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___38899ea9a2e86f7111035d968957032f_m.css');
$pagebuilder->addresource('jsfiles', '/js/f49d858ef181e7cd401d8fcb4245e6e8.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6d2c5d08317da59677c25876e4f7f6a0.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6385cae49dc708a8f2f93167ad17466d.js.gzip');
$pagebuilder->set_page_name("Request Password Reset");
$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();

?>
<form action="/Login/ResetPasswordRequest.aspx" method="POST">
<div id="BodyWrapper">
            
            <div id="RepositionBody">
                <div id="Body" style="">
                    <?php
        if(isset($message)){
            $pagebuilder->build_component("status", ["status"=>"error", "msg"=>$message]);
        }
    ?>
                    
    <div style="margin: 10px 0;"><h2>Forgot your username or password?</h2></div>
    <div>
        <p>We can send you an email to remind you of your usernames or reset your password. Please enter your username or email and click one of the links below.<br></p>
        <p style="color: red;">If you did not give us a <strong>real email address</strong> when you created your account, we <strong>cannot</strong> send you an email.</p>
        <p><span class="form-label" style="display:inline-block;min-width:120px;">Username:</span><input name="ctl00$cphRoblox$UserName" type="text" id="ctl00_cphRoblox_UserName"></p>
        <table>
            <tbody><tr>
                <td>&nbsp;</td>
                <td width="140">
                    <button>Reset Password</button>
                </td>
                <td>
                    <span id="ctl00_cphRoblox_PasswordMessage"></span>
                </td>
            </tr>
        </tbody></table>
    </div>

                    <div style="clear:both"></div>
                </div>
            </div>
        </div>
    </form>
<? $pagebuilder->build_footer(); ?>
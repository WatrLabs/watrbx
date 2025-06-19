<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$pagebuilder = new pagebuilder();
$auth = new authentication();

$auth->requiresession();

global $currentuser;

$userinfo = $currentuser;

if(isset($_GET["recipientId"])){
    $recipient = (int)$_GET["recipientId"];

    if($recipient == $userinfo->id){
        header("Location: /my/messages");
        die();
    }

    $otheruser = $auth->getuserbyid($recipient);

    if($otheruser == null){
        header("Location: /my/messages");
        die();
    }

} else {
    header("Location: /my/messages");
    die();
}

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___693f28640f335d1c8bc50c5a11d7ad3d_m.css');
$pagebuilder->addresource('jsfiles', '/js/f49d858ef181e7cd401d8fcb4245e6e8.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6d2c5d08317da59677c25876e4f7f6a0.js.gzip');

$pagebuilder->set_page_name("Create New Message");

$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();
?>
<div id="AdvertisingLeaderboard">
                

                <iframe allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>
                
                
                            </div>
<div id="BodyWrapper">
    <div id="RepositionBody">
        <div id="Body" style='width:970px; padding:10px;'>
            <h1>Send New Message</h1>
            <br />
            <?php
                if(isset($error)){
                    $pagebuilder->build_component("status", ["status"=>"error", "msg"=>$error]);
                }
            ?>

            <?php
                if(isset($success)){
                    $pagebuilder->build_component("status", ["status"=>"confirm", "msg"=>$success]);
                }
            ?>
            <span class="form-label" style="float:left;font-weight: 800;">From: <a class="text-link" style="margin-left:42px;"><?=$userinfo->username?></a></span><br />
            <span class="form-label" style="float:left;font-weight: 800;">To: <a class="text-link" style="margin-left:59px;"><?=$otheruser->username?></a></span><br />
            <div style="min-height: 30px;">
                <span class="font-header-2" style="float:left;padding-top:5px;margin-right:30px;font-weight: 800;">Subject:</span>
                <div style="float: left; width: 183px; text-align:left;">
                    <input type="text" name="subject" class="text-box text-box-large" style="width: 660px;" />
                </div>
            </div>
            <div style="min-height: 30px;">
                <span class="form-label" style="float:left;padding-top:5px;margin-right:46px;font-weight: 800;">Body: </span>
                <div style="float: left; width: 660px; text-align:left;">
                    <textarea class="text-box text-area-medium" cols="80" id="textbox" name="body" rows="15" style="width: 660px;"></textarea>
                    <p style="margin-left: 0px;"><span style="color: #E04A32; float: left; width: 660px;"><i>Remember, ROBLOX Staff will never ask for your password. People who ask for your password are trying to steal your account.</i></span></p>
                </div>
            </div>
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            <a class="btn-medium btn-neutral" style="float:right;" onclick="__doPostBack('<?=$otheruser->id?>')">Send</a>
        </div>
    </div>
</div>
<? $pagebuilder->build_footer(); ?>
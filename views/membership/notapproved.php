<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrlabs\router\Routing;
global $db;
global $currentuser;
$pagebuilder = new pagebuilder();

$router = new Routing();

$auth = new authentication();
$auth->requiresession();
if(isset($_GET["ID"])){
    $banid = (int)$_GET["ID"];
    $baninfo = $db->table("moderation")->where("id", $banid)->first();
    $canreactivate = false;
    if($baninfo !== null){

        if($baninfo->userid !== $currentuser->id){
            header("Location: /home");
        }

        if($baninfo->canignore == "1"){
            header("Location: /home");
        }

        switch ($baninfo->type){
            case "reminder":
                $canreactivate = true;
                $header = ucfirst($baninfo->type);
                break;
            case "warning":
                $canreactivate = true;
                $header = ucfirst($baninfo->type);
                break;
            case "days":
                if($baninfo->days == 1){
                    $header = "Banned for " . $baninfo->days . " day.";
                } else {
                    $header = "Banned for " . $baninfo->days . " days.";
                }
                $canreactivate = $baninfo->banneduntil < time();
                break;
            case "deleted":
                $header = "Account Deleted";
                $canreactivate = false;
                break;
        }
    } else {
        header("Location: /home");
        die();
        //die($router->return_status(404));
    }

} else {
    die($router->return_status(404));
}

if($baninfo->offensiveitem !== null){
    $offensivechat = $db->table("chatlogs")->where("id", $baninfo->offensiveitem)->first();
}

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___486ee4e2def9b96aeaf9ebb663ab510e_m.css');
$pagebuilder->addresource('jsfiles', '/js/35442da4b07e6a0ed6b085424d1a52cb.js');
$pagebuilder->setlegacy(true);
$pagebuilder->set_page_name("Disabled Account");

$pagebuilder->buildheader();



?>

    <div id="Container">
        <div style="clear: both"></div>
        
        <div id="Body" class="simple-body">
            
    <div style="margin: 150px auto 150px auto; width: 500px; border: black thin solid;
        padding: 22px;">
        <h2><?=$header?></h2>
        <p>Our content monitors have determined that your behavior at ROBLOX has been in violation of our Terms of Service. <? if($baninfo->banneduntil !== null){ echo "We will terminate your account if you do not abide by the rules."; } ?></p>
        <p>Reviewed: <span style="font-weight: bold"><?=date('n/j/Y g:i:s A', $baninfo->reviewed);?></span></p>
        <p>Moderator Note: <span style="font-weight: bold"><?=$baninfo->moderatornote?></span></p>
        <!--
        -->
        
        <?php

            if(isset($offensivechat)){ ?> 

            <div style="width: auto; border: black thin solid; text-align: left;">
                <p><span style="font-weight: bold">Reason:</span> Offensive Language</p>
                <p style="text-align: left;">
                    <span style="font-weight: bold">Offensive Item:</span> 
                    <br><br>
                    <span style="margin: 35px;"><?=$offensivechat->filtered?></span>
                </p>
            </div>

            <? }

            if($canreactivate){ ?>
                <p>Please abide by the ROBLOX Community Guidelines so that ROBLOX can be fun for users of all ages.</p>
                <p>You may re-activate your account by agreeing to our <a href="#">Terms of Service</a></p>
                <div style="text-align: center;">
                    <form method="POST" action="/api/v1/reactivate?ID=<?=$banid?>">
                        <input type="checkbox" id="tos" name="tos" value="tos">
                        <label for="tos">I agree</label><br><br>
                        <button>Reactivate My Account</button><br><br>
                        <button onclick="logout()">Logout</button><br><br>
                    </form>
                </div>
            <? } elseif($baninfo->banneduntil !== null) { ?>
                <p>Your account has been disabled. You may re-activate it after <?=date('n/j/Y g:i:s A', $baninfo->banneduntil);?></p>
                <p>If you wish to appeal, please contact us via the <a href="#">Support Forum</a></p>
            <? } else { ?>
                <p>Your account has been terminated.</p>
                <p>If you wish to appeal, please contact us via the <a href="#">Support Forum</a></p>
            <?}?>

            
        
    </div>

        </div>
        <? $pagebuilder->build_footer(); ?>
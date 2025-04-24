<?php use watrlabs\authentication; 
$auth = new authentication(); 
use watrbx\sitefunctions;
$sitefunc = new sitefunctions();
$siteconf = $sitefunc->getsiteconf();
if(isset($_COOKIE["watrbxcookie"])){ 
    $usrinfo = $auth->getuserinfo($_COOKIE["watrbxcookie"]); 
    
    if($usrinfo == false){
        setcookie("watrbxcookie", "", time() - 99999, "/");
        header("Location: /login");
        die();
    }
    
    $role = $usrinfo["role"]; 
    
    
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="/assets/watrbxlogo2.png">
<?php if(isset($metatags)) { foreach ($metatags as $property => $content) { ?>
<meta <?= substr($property, 0, 2) == "og" ? "property" : "name" ?>="<?= $property ?>" content="<?= $content ?>">
<?php } } ?>	
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if(isset($cssfiles)) { foreach ($cssfiles as $url) { ?>
<link rel="stylesheet" href="<?= $url ?>">
<?php }}  if(isset($jsfiles)) { foreach ($jsfiles as $url) { ?>
<script type="text/javascript" src="<?= $url ?>"></script>
<?php }} ?>
<title><?=$config["title"] ?? "Untitled Page" ?> - <?=$_ENV["APP_NAME"]?></title>
</head>
<body>
<div id="navbar">
    <div id="nav-group">
        <!-- <a href="/" id="nav-item" class="bold">project></a> !--->
        <a href="/"><img align="center" src="/assets/watrbxlogo2.png" height="36px" style="margin-top: 6px; margin-left: 12px;"></a>
        
        <?php 
        if(isset($_COOKIE["watrbxcookie"])){ ?> 
        <a href="/home" id="nav-item">Home</a> 
            <a href="/games" id="nav-item">Games</a>
        <? } ?>
    </div>
    <div id="nav-group">
        <?php 
        if(isset($_COOKIE["watrbxcookie"])){ ?>
            <img src="/images/robuxicon.png" class="icon">
            <p id="icon-text"><?=$usrinfo["robux"]?></p>
            <img src="/images/tix-icon.png" class="icon">
            <p id="icon-text"><?=$usrinfo["tix"]?></p>
            <!--<img src="/images/mail.png" class="icon">
            <p id="icon-text">0</p> -->
            <img src="/images/settings.png" class="icon">
                <? if($role == 1){ ?> 
                    <a href="/admin/" id="nav-item">Admin</a>
                <? } ?>
            <? } else { ?> 
                <a href="/register" id="nav-item">Register</a>
                <a href="/login" id="nav-item">Login</a>
            <? } ?>
    </div>
</div>
<?php if (isset($usrinfo)) {?><div id="second-navbar">
        <div id="bottom-nav-group">
            <a href="/game/upload"> Create </a>
            <a href="/users/<?=$usrinfo["id"]?>/">Profile </a>
        </div>
</div><?}?>
<div id="site-alert">
    <p id="site-alert-text">Still porting...</p>
</div>

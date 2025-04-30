<?php
//include baseurl . "/conn.php";
use watrbx\sitefunctions;
$sitefunc = new sitefunctions();
$siteconf = $sitefunc->getsiteconf();
    
?>
<? if($siteconf->sitebanner !== ""){ ?>

<div id="site-alert">
    <p id="site-alert-text" style="margin-left: 20px;"><?=$siteconf->sitebanner?></p>
</div>

<? } ?>
<div id="footer">
    <div style="flex-direction: row; align-items: center;">
        <p style="margin-left: 20px;">watrbx - <? echo $sitefunc::getusercount(); ?> Users - <a href="/info/privacy">Privacy</a> - <a href="/info/tos">Terms</a> - <a href="mailto:dmca@watrlabs.lol">DMCA</a></p>
    </div>
    <div>
        <p style="margin-right: 20px;">©2025 WatrLabs - We are not affiliated with ROBLOX.</p>
    </div>
</div>

</body>
</html>

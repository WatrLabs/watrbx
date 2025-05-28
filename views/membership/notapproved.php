<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrlabs\router\Routing;
global $db;
$pagebuilder = new pagebuilder();

$router = new Routing();

$auth = new authentication();
$auth->requiresession();
if(isset($_GET["ID"])){
    $banid = (int)$_GET["ID"];
    $baninfo = $db->table("moderation")->where("id", $banid)->first();
    $canreactivate = false;
    if($baninfo !== null){

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
        die($router->return_status(404));
    }

} else {
    die($router->return_status(404));
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
        <p>Our content monitors have determined that your behavior at ROBLOX has been in violation of our Terms of Service. We will terminate your account if you do not abide by the rules.</p>
        <p>Reviewed: <span style="font-weight: bold"><?=date('n/j/Y g:i:s A', $baninfo->reviewed);?></span></p>
        <p>Moderator Note: <span style="font-weight: bold"><?=$baninfo->moderatornote?></span></p>
        <!--<div style="width: auto; border: black thin solid; text-align: left;">
            <p><span style="font-weight: bold">Reason:</span> Spam</p>
            <p style="text-align: left;">
                <span style="font-weight: bold">Offensive Item:</span> 
                <br><br>
                <span style="margin: 35px;">You're stupid for 20. You're really a child in reality.</span>
                <br><br>
                <span style="margin: 35px;">No capes!</span>
            </p>
        </div>
        -->
        <p>Please abide by the ROBLOX Community Guidelines so that ROBLOX can be fun for users of all ages.</p>
        <?php
            if($canreactivate){ ?>
                <p>You may re-activate your account by agreeing to our <a href="#">Terms of Service</a></p>
                <div style="text-align: center;">
                    <form method="POST" action="/api/v1/reactivate?ID=<?=$banid?>">
                        <input type="checkbox" id="tos" name="tos" value="tos">
                        <label for="tos">I agree</label><br><br>
                        <button>Reactive My Account</button><br><br>
                        <button onclick="logout()">Logout</button><br><br>
                    </form>
                </div>
            <? } else { ?>
                <p>Your account has been disabled. You may re-activate it after <?=date('n/j/Y g:i:s A', $baninfo->banneduntil);?></p>
                <p>If you wish to appeal, please contact us via the <a href="#">Support Forum</a></p>
            <? } ?>
        
    </div>

        </div>
        <div id="Footer" class="footer-container">
    <div class="FooterNav">
        <a href="http://www.roblox.com/info/Privacy.aspx">Privacy Policy</a>
        &nbsp;|&nbsp;
        <a href="http://corp.roblox.com/advertise-on-roblox" class="roblox-interstitial">Advertise with Us</a>
        &nbsp;|&nbsp;
        <a href="http://corp.roblox.com/press" class="roblox-interstitial">Press</a>
        &nbsp;|&nbsp;
        <a href="http://corp.roblox.com/contact-us" class="roblox-interstitial">Contact Us</a>
        &nbsp;|&nbsp;
            <a href="http://corp.roblox.com/about" class="roblox-interstitial">About Us</a>
&nbsp;|&nbsp;        <a href="http://blog.roblox.com">Blog</a>
        &nbsp;|&nbsp;
            <a href="http://corp.roblox.com/careers" class="roblox-interstitial">Jobs</a>
&nbsp;|&nbsp;        <a href="http://corp.roblox.com/parents" class="roblox-interstitial">Parents</a>
    </div>
    <div class="legal">
            <div class="left">
                <div id="a15b1695-1a5a-49a9-94f0-9cd25ae6c3b2">
    <a href="//privacy.truste.com/privacy-seal/Roblox-Corporation/validation?rid=2428aa2a-f278-4b6d-9095-98c4a2954215" title="TRUSTe Children privacy certification" target="_blank">
        <img style="border: none" src="//privacy-policy.truste.com/privacy-seal/Roblox-Corporation/seal?rid=2428aa2a-f278-4b6d-9095-98c4a2954215" width="133" height="45" alt="TRUSTe Children privacy certification"/>
    </a>
</div>
            </div>
            <div class="right">
                <p class="Legalese">
    ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a href="http://corp.roblox.com/" ref="footer-smallabout" class="roblox-interstitial">ROBLOX Corporation</a>, ©2015. Patents pending.
    ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
    Use of this site signifies your acceptance of the <a href="http://www.roblox.com/info/terms-of-service" ref="footer-terms">Terms and Conditions</a>.
</p>
            </div>
        <div class="clear"></div>
    </div>

</div>
    </div>
        </div></div>
      

<div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle="confirmation" style="display:none;">
    <a class="genericmodal-close ImageButton closeBtnCircle_20h"></a>
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div class="TopBody">
            <div class="ImageContainer roblox-item-image"  data-image-size="small" data-no-overlays data-no-click>
                <img class="GenericModalImage" alt="generic image" />
            </div>
            <div class="Message"></div>
        </div>
        <div class="ConfirmationModalButtonContainer">
            <a href id="roblox-confirm-btn"><span></span></a>
            <a href id="roblox-decline-btn"><span></span></a>
        </div>
        <div class="ConfirmationModalFooter">
        
        </div>  
    </div>   
    <script type="text/javascript">
        Roblox = Roblox || {};
        Roblox.Resources = Roblox.Resources || {};

        //<sl:translate>
        Roblox.Resources.GenericConfirmation = {
            yes: "Yes",
            No: "No",
            Confirm: "Confirm",
            Cancel: "Cancel"
        };
        //</sl:translate>
    </script>
</div>

    

<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};

    Roblox.UpsellAdModal.Resources = {
        //<sl:translate>
        title: "Remove Ads Like This",
        body: "Builders Club members do not see external ads like these.",
        accept: "Upgrade Now",
        decline: "No, thanks"
        //</sl:translate>
    };
</script>
<script>
    function logout(){
        document.cookie = ".ROBLOSECURITY=invalid; expires=Thu, 18 Dec 1980 12:00:00 UTC; path=/";
    }
</script>
        <script type="text/javascript">
            function urchinTracker() { };
            GoogleAnalyticsReplaceUrchinWithGAJS = true;
        </script>
    

    

<script type="text/javascript">
    $(function(){
        function trackReturns() {
            function dayDiff(d1, d2) {
                return Math.floor((d1-d2)/86400000);
            }
            if (!localStorage) {
                return false;
            }

            var cookieName = 'RBXReturn';
            var cookieOptions = {expires:9001};
            var cookieStr = localStorage.getItem(cookieName) || "";
            var cookie = {};

            try {
                cookie = JSON.parse(cookieStr);
            } catch (ex) {
                // busted cookie string from old previous version of the code
            }

            try {
                if (typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
                    localStorage.setItem(cookieName, JSON.stringify({ ts: new Date().toDateString() }));
                    return false;
                }
            } catch (ex) {
                return false;
            }

            var daysSinceFirstVisit = dayDiff(new Date(), new Date(cookie.ts));
            if (daysSinceFirstVisit == 1 && typeof cookie.odr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_odr', {});
                cookie.odr = 1;
            }
            if (daysSinceFirstVisit >= 1 && daysSinceFirstVisit <= 7 && typeof cookie.sdr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_sdr', {});
                cookie.sdr = 1;
            }
            try {
                localStorage.setItem(cookieName, JSON.stringify(cookie));
            } catch (ex) {
                return false;
            }
        }

        GoogleListener.init();


    
        RobloxEventManager.initialize(true);
        RobloxEventManager.triggerEvent('rbx_evt_pageview');
        trackReturns();
        

    
        RobloxEventManager._idleInterval = 450000;
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_start');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_ftp');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_success');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_fmp');
        RobloxEventManager.startMonitor();
        

    });

</script>

</form>
    <script type='text/javascript' src='/js/8b7bb008a86cfde6be7fb5f0fc84ec37.js'></script>

    <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "" });

        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <noscript>
        <img src="http://b.scorecardresearch.com/p?c1=2&c2=&c3=&c4=&c5=&c6=&c15=&cv=2.0&cj=1"/>
    </noscript>

</body>
</html>
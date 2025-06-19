<?php
    use watrlabs\watrkit\pagebuilder;
    $page = new pagebuilder();
    global $currentuser;
?>
<footer class="container-footer">
    <div class="footer">
        <ul class="row footer-links">
                <li class="col-xs-4 col-sm-2 footer-link">
                    <a href="https://corp.roblox.com" class="roblox-interstitial" target="_blank">
                        <h2>About Us</h2>
                    </a>
                </li>
                <li class="col-xs-4 col-sm-2 footer-link">
                    <a href="https://corp.roblox.com/jobs" class="roblox-interstitial" target="_blank">
                        <h2>Jobs</h2>
                    </a>
                </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="https://blog.roblox.com" target="_blank">
                    <h2>Blog</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="/Info/Privacy.aspx" target="_blank">
                    <h2>Privacy</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="https://corp.roblox.com/parents" class="roblox-interstitial" target="_blank">
                    <h2>Parents</h2>
                </a>
            </li>
            <li class="col-xs-4 col-sm-2 footer-link">
                <a href="https://en.help.roblox.com/" class="roblox-interstitial" target="_blank">
                    <h2>Help</h2>
                </a>
            </li>
        </ul>
        <p class="footer-note">
            ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a target="_blank" href="https://corp.roblox.com" class="rbx-link roblox-interstitial">ROBLOX Corporation</a>, ©2015.
            Patents pending. ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
            Use of this site signifies your acceptance of the <a href="/info/terms-of-service" target="_blank" class="rbx-link">Terms and Conditions</a>.
        </p>
    </div>
</footer>


</div> 
    
    <? $page::get_snippet("generic_modal"); ?>
    <? $page::get_snippet("placelaunchermodal"); ?>

    <?php
        if($currentuser !== null){
            $page::get_snippet("chat");
        }
    ?>

    
    <script type='text/javascript' src='/js/c88a84ec42b8c3034db5c52aec9320cb.js'></script>
    <script type='text/javascript' src='/js/21c119fcb600df9fa46ea76dca4f1a19.js.gzip'></script>

    <?php if(isset($footerjsfiles)) { foreach ($footerjsfiles as $url) { ?>
    <script type="text/javascript" src="<?= $url ?>"></script>
    <?php }} ?>


<div id="page-heartbeat-event-data-model"
     class="hidden"
     data-page-heartbeat-event-intervals="[2,8,20,60]">
</div>        <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "" });

        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "https://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <noscript>
        <img src="https://b.scorecardresearch.com/p?c1=2&c2=&c3=&c4=&c5=&c6=&c15=&cv=2.0&cj=1"/>
    </noscript>
</body>
</html>
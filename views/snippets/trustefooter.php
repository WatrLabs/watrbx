<?php
    use watrlabs\watrkit\pagebuilder;
    $page = new pagebuilder();
    global $currentuser;
?>
<div id="Footer" class="footer-container">
    <div class="FooterNav">
        <a href="https://www.watrbx.wtf/info/Privacy.aspx">Privacy Policy</a>
        &nbsp;|&nbsp;
        <a href="https://corp.watrbx.wtf/advertise-on-roblox" class="roblox-interstitial">Advertise with Us</a>
        &nbsp;|&nbsp;
        <a href="https://corp.watrbx.wtf/press" class="roblox-interstitial">Press</a>
        &nbsp;|&nbsp;
        <a href="https://corp.watrbx.wtf/contact-us" class="roblox-interstitial">Contact Us</a>
        &nbsp;|&nbsp;
            <a href="https://corp.watrbx.wtf/about" class="roblox-interstitial">About Us</a>
&nbsp;|&nbsp;        <a href="https://blog.watrbx.wtf">Blog</a>
        &nbsp;|&nbsp;
            <a href="https://corp.watrbx.wtf/careers" class="roblox-interstitial">Jobs</a>
&nbsp;|&nbsp;        <a href="https://corp.watrbx.wtf/parents" class="roblox-interstitial">Parents</a>
    </div>
    <div class="legal">
            <div class="left">
                <div id="a15b1695-1a5a-49a9-94f0-9cd25ae6c3b2">
    <a href="//privacy.truste.com/privacy-seal/Roblox-Corporation/validation?rid=2428aa2a-f278-4b6d-9095-98c4a2954215" title="TRUSTe Children privacy certification" target="_blank">
        <img style="border: none" src="/images/seal.png" width="133" height="45" alt="TRUSTe Children privacy certification"/>
    </a>
</div>
            </div>
            <div class="right">
                <p class="Legalese">
    WATRBX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a href="https://corp.watrbx.wtf/" ref="footer-smallabout" class="roblox-interstitial">WATRBX</a>, ©<?= date('Y'); ?>. Patents pending.
    WATRBX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
    Use of this site signifies your acceptance of the <a href="https://www.watrbx.wtf/info/terms-of-service" ref="footer-terms">Terms and Conditions</a>.
</p>
            </div>
        <div class="clear"></div>
    </div>

</div>                </div>
            </div> 
        </div> 
    </div> 
</div> 

    <? $page::get_snippet("generic_modal"); ?>
    <? $page::get_snippet("placelaunchermodal"); ?>

    <?php
        if($currentuser !== null){
            $page::get_snippet("chat");
        }
    ?>

    <script type="text/javascript">
        $(function () {
            Roblox.CookieUpgrader.domain = 'watrbx.wtf';
            Roblox.CookieUpgrader.upgrade("GuestData", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
            Roblox.CookieUpgrader.upgrade("RBXSource", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("rbx_acquisition_time", cookie); } });
            Roblox.CookieUpgrader.upgrade("RBXViralAcquisition", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("time", cookie); } });
                
                Roblox.CookieUpgrader.upgrade("RBXMarketing", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
                
                            
                Roblox.CookieUpgrader.upgrade("RBXSessionTracker", { expires: Roblox.CookieUpgrader.fourHoursFromNow });
                
                    });
    </script>

    <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "" });

        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "https://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <script>

        //hacky workaround until I can fix it not working on legacy pages
        // leancore/Navigation.js
$(function() {
    "use strict";
    function h() {
        return $("#nav-friends").data().count
    }
    function e(n, t) {
        if (n == 0)
            return "";
        if (n < t)
            return n.toString();
        switch (t) {
        case f:
            return "1k+";
        case u:
            return "99+";
        default:
            return ""
        }
    }
    function o(n) {
        var f = h(), i = n + f, t = $(".rbx-nav-collapse .rbx-nav-notification"), r;
        if (i == 0 && !t.hasClass("hide")) {
            t.addClass("hide");
            return
        }
        r = e(i, u),
        t.html(r),
        i > 0 && t.removeClass("hide"),
        t.attr("title", i)
    }
    function c() {
        var n = "/navigation/getCount";
        $.ajax({
            url: n,
            success: function(n) {
                var t = $("#nav-friends")
                  , i = t.find(".rbx-highlight");
                t.attr("href", n.FriendNavigationUrl),
                t.data("count", n.TotalFriendRequests),
                i.html(n.DisplayCountFriendRequests),
                i.attr("title", n.TotalFriendRequests),
                o(n.TotalFriendRequests)
            }
        })
    }
    function a(n) {
        var i = $('[data-behavior="univeral-search"] .rbx-navbar-search-option')
          , t = -1;
        $.each(i, function(n, i) {
            $(i).hasClass("selected") && ($(i).removeClass("selected"),
            t = n)
        }),
        t += n.which === 38 ? i.length - 1 : 1,
        t %= i.length,
        $(i[t]).addClass("selected")
    }
    var s;
    ($(".rbx-left-col").length == 0 || $(".rbx-left-col").width() == 0) && ($("#header-login").length != 0 || $("#GamesListsContainer").length != 0) && ($("#navContent").css({
        "margin-left": "0px",
        width: "100%"
    }),
    $("#navContent").addClass("nav-no-left")),
    $(window).resize(function() {
        ($(".rbx-left-col").length == 0 || $(".rbx-left-col").width() == 0) && ($("#header-login").length != 0 || $("#GamesListsContainer").length != 0) ? ($("#navContent").css({
            "margin-left": "0px",
            width: "100%"
        }),
        $("#navContent").addClass("nav-no-left")) : $("#navContent").css({
            "margin-left": "",
            width: ""
        })
    });
    var u = 99
      , f = 1e3
      , i = 1;
    $(document).on("Roblox.Messages.CountChanged", function() {
        var n = Roblox.websiteLinks.GetMyUnreadMessagesCountLink;
        $.ajax({
            url: n,
            success: function(n) {
                var t = $("#nav-message span.rbx-highlight")
                  , i = e(n.count, f);
                t.html(i),
                t.attr("title", n.count),
                o(n.count)
            }
        })
    }).on("Roblox.Friends.CountChanged", c);
    $('[data-behavior="nav-notification"]').click(function() {
        $('[data-behavior="left-col"]').toggleClass("nav-show", 100)
    });
    var t = $("#navbar-universal-search")
      , n = $("#navbar-universal-search #navbar-search-input")
      , r = $("#navbar-universal-search .rbx-navbar-search-option")
      , l = $("#navbar-universal-search #navbar-search-btn");
    n.on("keydown", function(n) {
        var t = $(this).val();
        (n.which === 9 || n.which === 38 || n.which === 40) && t.length > 0 && (n.stopPropagation(),
        n.preventDefault(),
        a(n))
    });
    n.on("keyup", function(n) {
        var r = $(this).val(), u, f;
        n.which === 13 ? (n.stopPropagation(),
        n.preventDefault(),
        u = t.find(".rbx-navbar-search-option.selected"),
        f = u.data("searchurl"),
        r.length >= i && (window.location = f + encodeURIComponent(r))) : r.length > 0 ? (t.toggleClass("rbx-navbar-search-open", !0),
        $('[data-toggle="dropdown-menu"] .rbx-navbar-search-string').text('"' + r + '"')) : t.toggleClass("rbx-navbar-search-open", !1)
    });
    l.click(function(t) {
        t.stopPropagation(),
        t.preventDefault();
        var r = n.val()
          , u = $("#navbar-universal-search .rbx-navbar-search-option.selected")
          , f = u.data("searchurl");
        r.length >= i && (window.location = f + encodeURIComponent(r))
    });
    r.on("click touchstart", function(t) {
        var r, u;
        t.stopPropagation(),
        r = n.val(),
        r.length >= i && (u = $(this).data("searchurl"),
        window.location = u + encodeURIComponent(r))
    });
    r.on("mouseover", function() {
        r.removeClass("selected"),
        $(this).addClass("selected")
    });
    n.on("focus", function() {
        var i = n.val();
        i.length > 0 && t.addClass("rbx-navbar-search-open")
    });
    $('[data-toggle="toggle-search"]').on("click touchstart", function(n) {
        return n.stopPropagation(),
        $('[data-behavior="univeral-search"]').toggleClass("show"),
        !1
    });
    $(".rbx-navbar-right").on("click touchstart", '[data-behavior="logout"]', function(n) {
        var i, t;
        n.stopPropagation(),
        n.preventDefault(),
        i = $(this),
        typeof angular == "undefined" || angular.isUndefined(angular.element("#chat-container").scope()) || (t = angular.element("#chat-container").scope(),
        t.$digest(t.$broadcast("Roblox.Chat.destroyChatCookie"))),
        $.post(i.attr("data-bind"), {
            redirectTohome: !1
        }, function() {
            window.location.href = "/"
        })
    });
    $("#nav-robux-icon").on("show.bs.popover", function() {
        $("body").scrollLeft(0)
    });
    s = function(n) {
        var t, i;
        n.indexOf("resize") != -1 && (t = n.split(","),
        $("#iframe-login").css({
            height: t[1]
        })),
        n.indexOf("fbRegister") != -1 && (t = n.split("^"),
        i = "&fbname=" + encodeURIComponent(t[1]) + "&fbem=" + encodeURIComponent(t[2]) + "&fbdt=" + encodeURIComponent(t[3]),
        window.location.href = "../Login/Default.aspx?iFrameFacebookSync=true" + i)
    }
    ,
    $.receiveMessage(function(n) {
        s(n.data)
    });
    $("body").on("click touchstart", function(n) {
        $('[data-behavior="univeral-search"]').each(function() {
            $(this).is(n.target) || $(this).has(n.target).length !== 0 || $(this).removeClass("rbx-navbar-search-open"),
            $(this).has(n.target).length === 0 && $('[data-toggle="toggle-search"]').has(n.target).length === 0 && $('[data-behavior="univeral-search"]').css("display") === "block" && $('[data-behavior="univeral-search"]').removeClass("show")
        })
    })
});    
    </script>


</body>
</html>

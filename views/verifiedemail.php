<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$pagebuilder = new pagebuilder();
$auth = new authentication();

$auth->requiresession();

global $currentuser;

$userinfo = $currentuser;


$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___91ce90e508d798217cc5452e978970d5_m.css');
$pagebuilder->addresource('jsfiles', '/js/71159c155b71b830770f1880fd3b181b.js');
$pagebuilder->addresource('jsfiles', '/js/827f89b1af9564915de6fb8725c9b27c.js');
$pagebuilder->addresource('jsfiles', '/js/142b5a3a1621b800298642e22ddb6650.js');
$pagebuilder->addresource('jsfiles', '/js/c5827143734572fa7bd8fcc79c3c126b.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/22f5b93b0e23b69d9c48f68ea3c65fe3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6385cae49dc708a8f2f93167ad17466d.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/2580e8485e871856bb8abe4d0d297bd2.js.gzip');
$pagebuilder->set_page_name("Thank You");

$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();
?>
<div id="AdvertisingLeaderboard">
    <iframe allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>
</div>  
<div id="BodyWrapper">
    <div id="RepositionBody">
        <div id="Body" style='width:970px;'>
            <div style="text-align: center;">
                <div style="text-align: center; width: 250px; margin-left: auto; margin-right: auto;">
                    <div style=" float: left; text-align: right; width: 250px; margin-left: auto; margin-right: auto;" >
                        <img style="float: left;" src="https://images.rbxcdn.com/116db03ed7027c242f773e70a4ed2e68.png">
                        <h1 style="margin: 0px;">Thank You!</h1>
                        <p style="margin: 0px;">Your email has been verified.</p>
                    </div>
                </div>
                <br>
            </div>
            <br><br><br><br>
            <div style="text-align: center; width: 250px; margin-left: auto; margin-right: auto;">
                <a href="/home" class="btn-medium btn-primary" style="float: center;">Done</a>
            </div>
        </div>
    </div>
</div>
<? $pagebuilder->build_footer(); ?>
<?php 
use watrlabs\watrkit\pagebuilder;
$pagebuilder = new pagebuilder();

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___486ee4e2def9b96aeaf9ebb663ab510e_m.css');
$pagebuilder->addresource('jsfiles', '/js/35442da4b07e6a0ed6b085424d1a52cb.js');
$pagebuilder->setlegacy(true);
$pagebuilder->set_page_name("Account Creation Disabled");

$pagebuilder->buildheader();



?>

    <div id="Container">
        <div style="clear: both"></div>
        
        <div id="Body" class="simple-body">
            
    <div style="margin: 150px auto 150px auto; width: 500px; border: black thin solid;
        padding: 22px;">
        <span style="font-weight: bold">Account creation has been suspended.</span>
    </div>

        </div>
        <? $pagebuilder->build_footer(); ?>
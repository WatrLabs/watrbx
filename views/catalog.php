<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Catalog");
$pagebuilder->addresource('cssfiles', '/assets/css/catalog.css?t='. time());
$pagebuilder->buildheader();
?>

<div id="main">
    <div class="container" id="item-select">
        <ul id="list">
            <li><h1><b>Featured</b></h1></li>
            <li>Shirts</li>
            <li>T-Shirts</li>
        </ul>
    </div>
    
    <div id="item-list">
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 2</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 3</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 4</p>
        </div>
    </div>
</div>

<? $pagebuilder->get_snippet("footer"); ?>
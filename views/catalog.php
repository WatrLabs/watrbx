<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrlabs\watrkit\sanitize;
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Catalog");
$pagebuilder->addresource('cssfiles', '/assets/css/catalog.css?t=' . time());
$pagebuilder->buildheader();

$sanitize = new sanitize();

if(isset($_GET["category"])){
    $category = $sanitize::integer($_GET["category"]);
} else {
    $category = 1;
}
?>

<div id="main" >
    <div id="item-select">
        <ul id="list">
            <li><h3>Popular</h3></li>
            <li><b>Featured</b></li>
            <li>Shirts</li>
            <li>T-Shirts</li>

            <li><h3>Clothing</h3></li>
            <li>T-Shirts</li>
            <li>Shirts</li>
            <li>Pants</li>
            <li>Hats</li>

            <li><h3>Body</h3></li>
            <li>Faces</li>
            <li>Front</li>
            <li>Back</li>
            <li>Waist</li>
            <li>Shoulder</li>
            <li>Neck</li>
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
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 5</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 6</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 7</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 8</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 9</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 10</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 11</p>
        </div>
        <div id="item">
            <img src="https://watrbx.xyz/api/get-thumb?error=true">
            <p>Example Item 12</p>
        </div>
        <p style="text-align: center; width: 100%;">Page 1 of 1 - <span id="pagination-link">Previous</span> <span id="pagination-link">1</span> <span id="pagination-link">2</span> <span id="pagination-link">3</span> <span id="pagination-link">4</span> <span id="pagination-link">5</span> <span id="pagination-link">Next</span></p>
    </div>
</div>

<? $pagebuilder->get_snippet("footer"); ?>
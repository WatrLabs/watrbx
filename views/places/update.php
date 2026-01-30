<?php
// this is mostly modified of that one create.php
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;

$pagebuilder = new pagebuilder();
$auth = new authentication();
$auth->requiresession();

global $currentuser, $db;

// check if ts is a legit place to modify
$placeId = (int)($_GET['id'] ?? 0);
$place = $db->table("assets")
    ->where("id", $placeId)
    ->where("owner", $currentuser->id)
    ->where("prodcategory", 9)
    ->first();

// why
if (!$place) {
    header("Location: /develop");
    exit;
}

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
$pagebuilder->set_page_name("Edit Place");

$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();

$auth->createcsrf("editplace");
?>
<div id="AdvertisingLeaderboard">
    <iframe allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728"></iframe>
</div>

<div id="BodyWrapper">
<div id="RepositionBody">
<div id="Body" style="width:970px;">
<h1>Edit Place</h1>

<div id="CreateTabs" class="tab-container">
    <div id="BasicSettingsLink" class="tab-active">Basic Settings</div>
    <div id="AdvancedSettingsLink">placeholder</div>
</div>

<center>
<div id="BasicSettings" class="tab-active">
<h2>Basic Settings</h2>

<br>

<form>
<a>Name:</a><br>
<input type="text" name="name" value="<?=htmlspecialchars($place->name)?>" style="width:300px;"><br><br>

<a>New description:</a><br>
<textarea name="description" style="width:300px;height:50px;"><?=htmlspecialchars($place->description)?></textarea>
</form>

<br>
<div id="autosaveStatus"></div>

<br>
<a class="btn-medium btn-primary" onclick="exitsave()">Save changes</a>
<a class="btn-medium btn-negative" onclick="window.location.href='/develop'">Cancel</a>
</div>
</center>

</div>
</div>
</div>

<!-- this javascript needs smth to eat right now -->
<script>
var updateUrl = '/api/v1/update-place/<?=$place->id?>';
var autosaveTimer;
var autosaveDelay = 1000;
var autosaveXhr;

document.getElementsByName('name')[0].addEventListener('input', autosaveQueue);
document.getElementsByName('description')[0].addEventListener('input', autosaveQueue);

function autosaveQueue() {
    clearTimeout(autosaveTimer);
    autosaveTimer = setTimeout(autosave, autosaveDelay);
}

function autosave() {
    if (autosaveXhr) autosaveXhr.abort();

    var name = document.getElementsByName('name')[0].value;
    var description = document.getElementsByName('description')[0].value;

    autosaveXhr = new XMLHttpRequest();
    autosaveXhr.open('POST', updateUrl, true);
    autosaveXhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    autosaveXhr.setRequestHeader('X-CSRF-Token', '<?=csrf("editplace")?>');

    autosaveXhr.onreadystatechange = function () {
        if (autosaveXhr.readyState === 4 && autosaveXhr.status === 200) {
            document.getElementById('autosaveStatus').innerText =
                'Saved at ' + new Date().toLocaleTimeString();
        }
    };

    autosaveXhr.send(
        'name=' + encodeURIComponent(name) +
        '&description=' + encodeURIComponent(description)
    );
}

function exitsave() {
    runAutosave();
    setTimeout(function () {
        window.location.href = '/develop';
    }, 300);
}

var tabs = ['BasicSettings'];
var links = ['BasicSettingsLink'];

for (let i = 0; i < links.length; i++) {
    document.getElementById(links[i]).onclick = function () {
        for (let j = 0; j < tabs.length; j++) {
            document.getElementById(tabs[j]).style.display = j === i ? 'block' : 'none';
            document.getElementById(links[j]).className = j === i ? 'tab-active' : '';
        }
    };
}
</script>
<? $pagebuilder->build_footer(); ?>

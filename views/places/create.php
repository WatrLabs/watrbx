<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$pagebuilder = new pagebuilder();
$auth = new authentication();

$auth->requiresession();

global $currentuser;
global $db;

$userinfo = $currentuser;

$existingplaces = $db->table("assets")
    ->where("owner", $currentuser->id)
    ->where("prodcategory", 9)
    ->count();

$placenumber = $existingplaces + 1; // count them..

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
$pagebuilder->set_page_name("Create New Place");

$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();

$auth->createcsrf("createplace");
?>
<div id="AdvertisingLeaderboard">
    <iframe allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>
</div>
<div id="BodyWrapper">
    <div id="RepositionBody">
        <div id="Body" style='width:970px;'>
            <div>
                <h1>Create Place</h1>
            <div id="CreateTabs" class="tab-container">
                    <div id="BasicSettingsLink" class="tab-active">Basic Settings</div>
                    <div id="AccessLink">Access</div>
                    <div id="AdvancedSettingsLink" >Advanced Settings</div>
                </div>
                <div>
                    <div id="BasicSettings" class="tab-active">
                        <h2>Basic Settings</h2>
                        <br><br><br>
                        <form>
                            <label>Name:</label><br>
                            <input type="text" name="name" value="<?=$currentuser->username?>'s Place Number: <?=$placenumber?>" style="width: 300px;">
                            <br><br>
                            <label>Description:</label><br>
                            <textarea type="text" name="description" style="width: 300px; height: 50px;"></textarea>
                            <br><br>
                            <label>Genre:</label><br>
                            <select name="genre" style="width: 100apx;">
                                <option value="all">All</option>
                            </select>
                        </form>
                        <br><br>
                        <a class="btn-medium btn-primary" style="float:left;" onclick="__doPostBack()">Create Place</a>
                        <a class="btn-medium btn-negative" onclick="window.close();" style="margin-left: 15px;">Cancel</a>
                    </div>
                    <div id="Access" >
                        <div id="playerAccess" class="default-hidden" style="display: block;">
                        <div class="headline">
                        <h2>Access</h2>
                        </div>
                        <br><br>
                        <div id="devices">
                            <label>Playable Devices:</label><br>
                            <input type="checkbox" name="devices" value="Computer" checked><label>Computer</label><br>
                            <input type="checkbox" name="devices" value="Phone" checked><label>Phone</label><br>
                            <input type="checkbox" name="devices" value="Tablet" checked><label>Tablet</label><br>
                        </div>
                        <br><br>
                        <div id="servertype">
                            <label>Place Type:</label>
                            <ul class="nav nav-pills">
                                <li class="active"><a>Game Place</a></li>
                                <li class=""><a>Personal Server</a></li>
                            </ul>
                        </div>


                        <div id="options">
                            <br>
                            <label class="form-label" for="NumPlayers">Number of Players:</label>
                            <br>
                            <select class="form-select" id="NumPlayers" name="NumPlayers">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>  
                                <option selected="selected">6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
                                <option>32</option>
                                <option>33</option>
                                <option>34</option>
                                <option>35</option>
                                <option>36</option>
                                <option>37</option>
                                <option>38</option>
                                <option>39</option>
                                <option>40</option>
                                <option>41</option>
                                <option>42</option>
                                <option>43</option>
                                <option>44</option>
                                <option>45</option>
                                <option>46</option>
                                <option>47</option>
                                <option>48</option>
                                <option>49</option>
                                <option>50</option>
                            </select>
                                <br><br>
                            <label class="form-label" for="Access">Access:</label>
                            <br>
                            <select class="form-select" id="Access" name="Access">
                                <option selected="selected">Everyone</option>
                                <option>Friends</option>
                                <option>No One</option>
                            </select>
                            <img class="TipsyImg tooltip-bottom h2-tooltip place-access-tooltip" src="/images/65cb6e4009a00247ca02800047aafb87.png" data-toggle="tooltip" alt="To restrict who may access this place, first you must disable private servers and not sell experience access." data-original-title="To restrict who may access this place, first you must disable private servers and not sell experience access." original-title="" style="display: none;">
                            <span class="field-validation-valid" data-valmsg-for="Access" data-valmsg-replace="true"></span>
                            <div style="clear:both;"></div>
                        </div>
                        <br><br><br>
                        <a class="btn-medium btn-primary" style="float:left;" onclick="__doPostBack()">Create Place</a>
                        <a class="btn-medium btn-negative" onclick="window.close();" style="margin-left: 15px;">Cancel</a>
                        </div>
                    </div>
                    <div id="AdvancedSettings">
                        
                            <div id="buttonRow" class="actionButtons">
                                <a class="btn-medium btn-primary" style="float:left;" onclick="__doPostBack()">Create Place</a>
                                <a class="btn-medium btn-negative" onclick="window.close();" style="margin-left: 15px;">Cancel</a>
                            </div>
                        </div>
                        <div id="ProcessingView" style="display:none">
                        <div class="ProcessingModalBody">
                            <p class="processing-indicator"><img src='https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif' alt="Searching..." /></p>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="ProcessingView" style="display:none">
                    <div class="ProcessingModalBody">
                        <p class="processing-indicator">
                            <img src='https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif' alt="Searching..." />
                            <br>
                            Creating Place...
                        </p>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function __doPostBack() {
var name = document.getElementsByName('name')[0].value;
var description = document.getElementsByName('description')[0].value;
// TODO: use custom warning instead of alert func
if(!name || name.length < 1) {
alert('Please enter a place name');
return false;
}

document.getElementById('ProcessingView').style.display = 'block';

var params = 'title=' + encodeURIComponent(name) + '&info=' + encodeURIComponent(description);

var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

xhr.open('POST', '/api/v1/create-place', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onreadystatechange = function() {
if(xhr.readyState == 4) {
if(xhr.status == 200) {
window.location.href = '/develop';
} else {
document.getElementById('ProcessingView').style.display = 'none';
alert(xhr.responseText || 'Error creating place');
}
}
};

xhr.send(params);
return false;
}

var tabs = ['BasicSettings', 'Access', 'AdvancedSettings'];
var links = ['BasicSettingsLink', 'AccessLink', 'AdvancedSettingsLink'];

for(var i = 0; i < links.length; i++) {
(function(idx) {
var link = document.getElementById(links[idx]);
if(link) {
link.onclick = function() {
for(var j = 0; j < tabs.length; j++) {
var tab = document.getElementById(tabs[j]);
var tabLink = document.getElementById(links[j]);
if(tab) tab.style.display = j === idx ? 'block' : 'none';
if(tabLink) tabLink.className = j === idx ? 'tab-active' : '';
}
};
}
})(i);
}
</script>
<? $pagebuilder->build_footer(); ?>
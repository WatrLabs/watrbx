<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$pagebuilder = new pagebuilder();
$auth = new authentication();

$auth->requiresession();

global $currentuser;

$userinfo = $currentuser;


$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___693f28640f335d1c8bc50c5a11d7ad3d_m.css');
$pagebuilder->addresource('jsfiles', '/js/c5827143734572fa7bd8fcc79c3c126b.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/22f5b93b0e23b69d9c48f68ea3c65fe3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6385cae49dc708a8f2f93167ad17466d.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/2580e8485e871856bb8abe4d0d297bd2.js.gzip');
$pagebuilder->set_page_name("Create New Place");

$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();
?>
<div id="AdvertisingLeaderboard">
    <iframe allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>
</div>
<div id="BodyWrapper">
    <div id="RepositionBody">
        <div id="Body" style='width:970px;'>
            <h1>Create Place</h1>
           <div id="CreateTabs" class="tab-container">
                <div id="TemplatesLink" class="tab-active">Templates</div>
                <div id="BasicSettingsLink">Basic Settings</div>
                <div id="AccessLink">Access</div>
                <div id="AdvancedSettingsLink" >Advanced Settings</div>
            </div>
            <div>
                <div id="Templates" class="tab-active">
                    <h2>Templates</h2>
                    <br><br>
                    <ul class="nav nav-pills">
                        <li class="active"><a>Basic</a></li>
                        <li class=""><a>Theme</a></li>
                        <li class=""><a>Gameplay</a></li>
                    </ul>
                    <br>
                    <div class="template" placeid="95206881">
                            <a class="game-image"><img class="" src="https://web.archive.org/web/20151129105425im_/http://t6.rbxcdn.com/17507896d5a29371ea8048fbdc3b1d74"></a>
                            <p>Baseplate</p>
                        </div>
                    <br><br>
                    <a class="btn-medium btn-primary" style="float:left;" onclick="__doPostBack()">Create Place</a>
                    <a class="btn-medium btn-negative" onclick="window.close();" style="margin-left: 15px;">Cancel</a>
                </div>
                <div id="BasicSettings">
                    <h2>Basic Settings</h2>
                    <br><br><br>
                    <form>
                        <label>Name:</label><br>
                        <input type="text" name="name" value="<?=$currentuser->username?>'s Place Number: 1" style="width: 300px;">
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
                </div>
            </div>
        </div>
    </div>
</div>
<? $pagebuilder->build_footer(); ?>
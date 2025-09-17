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
//$pagebuilder->addresource('cssfiles', '/CSS/Pages/Roblox.css');
//$pagebuilder->addresource('cssfiles', '/CSS/Pages/catalog.css');
$pagebuilder->addresource('cssfiles', '/CSS/Pages/develop.css');
$pagebuilder->addresource('cssfiles', '/CSS/Pages/gamesEdit.css');
$pagebuilder->addresource('cssfiles', '/CSS/Pages/upload.css');
//$pagebuilder->addresource('cssfiles', '/CSS/Pages/StyleGuide2.css');
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
?>
<div id="AdvertisingLeaderboard">
    <iframe allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>
</div>
<div id="BodyWrapper">
    <div id="RepositionBody">
        <div id="Body" style='width:970px;'>
            <div class="boxed-body">
		   <div id="navbar" class="divider-right" data-isbc="false" style="height: 549px;">
			  <div class="verticaltab selected" data-tab="basicSettings" data-cd-redirection-link="">
				 <a href="#">Basic Settings</a>
			  </div>
			  <div class="verticaltab" data-tab="playerAccess" data-cd-redirection-link="">
				 <a href="#">Access</a>
			  </div>
			  <div class="verticaltab" data-tab="permissions">
				 <a href="#">Advanced Settings</a>
			  </div>
		   </div>
		   <div id="content" style="margin-top: -1px; overflow-x: visible; overflow-y: visible;">
		   <form name="placeForm" method="post" id="placeForm" action="/api/v1/create-place">
				 <div id="basicSettings" class="default-hidden" style="display: block;">
					<div class="validation-summary-valid" data-valmsg-summary="true">
					   <ul>
						  <li style="display:none"></li>
					   </ul>
					</div>
					<div class="headline">
					   <h2>Basic Settings</h2>
                       <br><br>
					</div>
					<span id="userData" style="display: none;"></span>
					<label class="form-label" for="Name">Name:</label>
					<input autofocus="" class="text-box text-box-medium" id="title" name="title" type="text" value="">
					<span id="nameRow"><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></span>
                    <br><br>
					<label class="form-label" for="Description">Description:</label>
                    <br>
					<textarea class="text-box text-area-medium" cols="80" id="info" maxlength="1000" name="info" rows="6"></textarea>
					<span class="field-validation-valid" data-valmsg-for="Description" data-valmsg-replace="true"></span>
                    <br><br>
					<label class="form-label" for="Genre">Genre:</label>
					<select class="form-select no-margins" id="genreClassify" name="Genre">
						<option value="All">All</option>
					</select>
					<p></p>
				 </div>
				 <div id="playerAccess" class="default-hidden" style="display: none;">
					<div class="headline">
					   <h2>Access</h2>
					</div>
					<div id="GamePlaceAccess">
					   <label class="form-label" for="Access">Access:</label>
					   <select class="form-select disabled" id="Access" name="Access">
						  <option selected="selected">Everyone</option>
						  <option>Friends</option>
						  <option>No One</option>
					   </select>
					   <img class="TipsyImg tooltip-bottom h2-tooltip place-access-tooltip" src="/images/65cb6e4009a00247ca02800047aafb87.png" data-toggle="tooltip" alt="To restrict who may access this place, first you must disable private servers and not sell experience access." data-original-title="To restrict who may access this place, first you must disable private servers and not sell experience access." original-title="" style="display: none;">
					   <span class="field-validation-valid" data-valmsg-for="Access" data-valmsg-replace="true"></span>
					</div>
					<div style="clear:both;"></div>
				 </div>
				 <div id="permissions" class="default-hidden" style="display: none;">
					<div class="headline">
					   <h2>Gear Permissions</h2>
					   <img class="TipsyImg tooltip-bottom h2-tooltip" data-toggle="tooltip" height="13" width="12" src="/images/65cb6e4009a00247ca02800047aafb87.png" alt="The type of gear allowed in your place, by default all gears are allowed, however you can choose to allow only a specific gear genre." data-original-title="The type of gear allowed in your place, by default all gears are allowed, however you can choose to allow only a specific gear genre." original-title="">
					</div>
					<label class="form-label radio-button-label" for="IsAllGenresAllowed">Allow Gears:</label>
					<input id="AllowedGears" name="AllowedGears" type="checkbox"><span class="checkboxListItem">Yes</span>
					<p></p>
					<label class="form-label" for="Genre">Gear Genre:</label>
					<select class="form-select no-margins" id="genreGear" name="genreGear">
					   <option value="All">All</option>
					</select>
					<p></p>
					<div class="divider-bottom spacing"></div>
					<div class="headline">
					   <h2 id="otherSettings">Other Permissions</h2>
					</div>
					<input id="ChatType" name="ChatType" type="hidden" value="Classic">
					<fieldset>
					   By checking this box, <b>you are granting every other user of ROBLOX the right to use</b> (in various ways) the content you are now sharing. <b>If you do not want to grant this right, please do not check this box</b>. For more information about sharing content, please review the ROBLOX <a class="text-link" href="/info/terms">Terms of Use</a>.
					   <p></p>
					   <label id="copyLock">
					   <input id="IsCopyingAllowed" name="IsCopyingAllowed" type="checkbox" checked=""><span class="checkboxListItem">Allow Copying</span>
					   </label>
					</fieldset>
					<div>
					   <div id="buttonRow" class="actionButtons">
						  <a onclick="RobloxFrontEnd.editData.updatePermissionsPlace();" class="btn-medium btn-neutral" id="okButton">Save</a>
						  <a href="/develop" class="btn-medium btn-negative" id="cancelButton">Cancel</a>
					   </div>
					</div>
				 </div>
		   </div>
		</div>
                <div id="ProcessingView" style="display:none">
                    <div class="ProcessingModalBody">
                        <p class="processing-indicator">
                            <img src='https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif' alt="Searching..." />
                            <br>
                            Updating Place...
                        </p>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
</div>
<? $pagebuilder->build_footer(); ?>
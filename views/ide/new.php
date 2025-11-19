<?php

	use watrlabs\authentication;
	$auth = new authentication();

	global $currentuser;

	$auth->requiresession();
	$auth->createcsrf("createplace");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="https://www.facebook.com/2008/fbml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>New Place</title>
	  <link rel='stylesheet' href='/CSS/Pages/Roblox.css' />
	  <link rel="stylesheet" href="/CSS/Pages/catalog.css">
	  <link rel="stylesheet" href="/CSS/Pages/develop.css">
	  <link rel="stylesheet" href="/CSS/Pages/gamesEdit.css">
      <link rel="stylesheet" href="/CSS/Pages/upload.css">
	  <link rel='stylesheet' href='/CSS/Pages/StyleGuide2.css' />
	  <script type="text/javascript" src="/js/jquery/jquery-1.7.2.min.js"></script>
   </head>
   <body>
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
		   <div id="content" style="margin-top: -1px;">
		   <form name="placeForm" method="post" id="placeForm" action="/api/v1/create-place">
				 <div id="basicSettings" class="default-hidden" style="display: block;">
					<div class="validation-summary-valid" data-valmsg-summary="true">
					   <ul>
						  <li style="display:none"></li>
					   </ul>
					</div>
					<div class="headline">
					   <h2>Basic Settings</h2>
					</div>
					<span id="userData" style="display: none;"></span>
					<label class="form-label" for="Name">Name:</label>
					<input autofocus="" class="text-box text-box-medium" id="title" name="title" type="text" value="">
					<span id="nameRow"><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></span>
					<label class="form-label" for="Description">Description:</label>
					<textarea class="text-box text-area-medium" cols="80" id="info" maxlength="1000" name="info" rows="6"></textarea>
					<span class="field-validation-valid" data-valmsg-for="Description" data-valmsg-replace="true"></span>
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
		   <div id="Close" class="footer-button-container divider-top">
			  <a class="btn-medium btn-primary" onclick="Save();" id="closeButton">Create Place</a>
			  <a class="btn-medium btn-negative"  onclick="window.close(); return false" id="closeButton">Cancel</a>
		   </div> 
		</div>
		</form>
		<script>
			const form = document.getElementById("placeForm");
			function Save() {
				form.submit();
			}
		</script>
   </body>
</html>
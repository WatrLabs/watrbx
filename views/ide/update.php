<?php
    if(isset($_GET["placeId"])){
        $placeid = (int)$_GET["placeId"];
        global $db;
        $assetinfo = $db->table("assets")->where("id", $placeid)->first();
    } else {
        die();
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="https://www.facebook.com/2008/fbml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Update Place</title>
      <link rel='stylesheet' href='/CSS/Pages/Roblox.css' />
	  <link rel="stylesheet" href="/CSS/Pages/catalog.css">
	  <link rel="stylesheet" href="/CSS/Pages/develop.css">
	  <link rel="stylesheet" href="/CSS/Pages/gamesEdit.css">
	  <link rel="stylesheet" href="/CSS/Pages/upload.css">
      <link rel="stylesheet" href="/CSS/Pages/uploadbar.css?t=1">
	  <link rel='stylesheet' href='/CSS/Pages/StyleGuide2.css' />
	  <script type="text/javascript" src="/js/jquery/jquery-1.7.2.min.js"></script>
      <script type="text/javascript" src="/js/jquery/jquery-1.7.2.min.js"></script>
   </head>

   <body>
   <div id="UploadContainer">
     <div id="StartUpload">
       <div class="boxed-body">
         <h3 id="progresstexxt">Do you wish to update <?=$assetinfo->name?>?</h3> 
	       <div id="progressBarWrapper"><div id="uploadProgressBar">
		        <div id="progressAmount" class="progress-blue-bar" style="width: 0%;">
			</div>
		   </div> 
		      <a class="btn-medium btn-negative uploadCancel" id="cancelButton" onclick="window.close(); return false">Cancel</a> 
			  <a class="btn-medium blue-arrow uploadNext" onclick="publish(<?=$placeid?>);" id="nextButton">Next</a>
		   </div>
      </div>
	 </div>
	<div id="UploadSuccess" style="display:none;">
       <div class="boxed-body">
         <h3>Uploading to <?=$assetinfo->name?></h3> 
	       <div id="progressBarWrapper"><div id="uploadProgressBar">
		        <div id="progressAmount" class="progress-blue-bar" style="width: 100%;">
			</div>
		   </div> 
		      <a class="btn-medium btn-negative uploadCancel" id="cancelButton" onclick="window.close(); return false" style="display: none;">Cancel</a> 
			  <a onclick="window.close();" class="btn-medium btn-neutral uploadOK" id="okButton">OK</a> 
			  <p>100% Completed</p>
		   </div>
		   <div  id="shareWithFriends" class="divider-top"><h3>Share your Place with friends</h3> <input class="form-text-box" id="gameLink" name="gameLink" type="text" value="https://www.roblox.com/PlaceItem.aspx?ID=1818"></div>
      </div>
    </div>
   </div>
   <script>
      const progresstext = document.getElementById("progresstexxt");
      const uploadcontainer = document.getElementById("StartUpload");
      const uploadbar = document.getElementById("progressAmount");
      const uploadsuccess = document.getElementById("UploadSuccess");
      const placename = "<?=$assetinfo->name?>";

      function publish(placeid){
         progresstext.innerHtml = "Updating " + placename + " ...";
         uploadbar.style.width = "20%";
         window.external.SaveUrl('https://www.watrbx.wtf/api/v1/upload-place?placeId=' + placeid);
         uploadbar.style.width = "100%";
         uploadcontainer.style.display = "none";
         uploadsuccess.style.display = "block";
      }
   </script>
   </body>
</html>
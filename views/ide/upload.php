<?php
   use watrlabs\watrkit\pagebuilder;
   $pagebuilder = new pagebuilder();
   global $currentuser;
   global $db;
   if($currentuser !== null){
      $allplaces = $db->table("assets")->where("prodcategory", 9)->where("owner", $currentuser->id)->get(); 
   } else {
      die();
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="https://www.facebook.com/2008/fbml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Publish Place As</title>
	   <link rel="stylesheet" href="/CSS/Pages/catalog.css">
      <link rel="stylesheet" href="/CSS/Pages/upload.css">
	   <link rel='stylesheet' href='/CSS/Pages/StyleGuide2.css' />
   </head>
   <body>
      <div class="boxed-body">
         <h1 class="notranslate" data-se="item-name">
            My Places
         </h1>
         <div class="tab-container">
            <h3>Choose an existing place to overwrite, or create a new place.</h3>
         </div>
         <div>
            <div id="assetList" class="content asset-list tab-active">
               <div class="place asset" id="newasset" onclick="document.location.href = '/ide/publish/new';">
                  <a class="game-image">
                     <div id="newAssetText">New Place</div>
                     <img class="game-image" src="/images/IDE/createNew.png" alt="Create New">
                  </a>
                  <p class="item-name-container ellipsis-overflow">(Create New)</p>
               </div>
                  <?php

                  foreach($allplaces as $place){
                     $pagebuilder->build_component("ide-place", ["asset"=>$place]);
                  }
                  ?>
            </div>
         </div>
         <div id="Close" class="footer-button-container divider-top">
            <a class="btn-medium btn-negative" onclick="window.close();" id="closeButton">Cancel</a>
         </div>
      </div>
   </body>
</html>
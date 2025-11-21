<?php
use watrlabs\authentication;

$auth = new authentication;
$id = $_GET["assetId"] ?? 0;
    global $db;
    $assetinfo = $db->table("assets")->where("id", $id)->first();
    
    if($assetinfo !== null){

        $creatorinfo = $auth->getuserbyid($assetinfo->owner);
    
        ob_end_clean();
    } else { ?>
{"TargetId":<?=$id?>,"ProductType":"User Product","AssetId":402123546,"ProductId":1,"Name":"test","AssetTypeId":34,"Creator":{"Id":1,"Name":"watrbx","CreatorType":"User","CreatorTargetId":1},"IconImageAssetId":607948062,"Created":"2007-05-01T01:07:04.78Z","Updated":"2017-09-26T22:43:21.667Z","PriceInRobux":0,"PriceInTickets":null,"Sales":0,"IsNew":false,"IsForSale":true,"IsPublicDomain":true,"IsLimited":false,"IsLimitedUnique":false,"Remaining":null,"MinimumMembershipLevel":0,"ContentRatingTypeId":0}
    <? die(); } ?>
{"TargetId":<?=$id?>,"ProductType":"<?=$assetinfo->prodtype?>","AssetId":<?=$id?>,"ProductId":1,"Name":"<?=html_entity_decode($assetinfo->name)?>","AssetTypeId":<?=$assetinfo->prodcategory?>,"Creator":{"Id":<?=$creatorinfo->id?>,"Name":"<?=$creatorinfo->username?>","CreatorType":"User","CreatorTargetId":1},"IconImageAssetId":607948062,"Created":"<?=date('c', $assetinfo->created)?>","Updated":"<?=date('c', $assetinfo->updated)?>","PriceInRobux":<?=$assetinfo->robux?>,"PriceInTickets":<?=$assetinfo->tix?>,"Sales":0,"IsNew":false,"IsForSale":true,"IsPublicDomain":true,"IsLimited":false,"IsLimitedUnique":false,"Remaining":null,"MinimumMembershipLevel":0,"ContentRatingTypeId":0}
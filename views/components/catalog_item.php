<?php

    global $db;


    if(!isset($asset)){
        return;
    }
    $boughtamount = $db->table("ownedassets")->where("assetid", $asset->id)->count();
    $creator = $auth->getuserbyid($asset->owner);
    $thumbnailurl = $thumbs->get_asset_thumb($asset->id);
?>

<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="<?=$asset->id?>" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/<?=$slugify->slugify($asset->name);?>-item?id=<?=$asset->id?>">
                    <img title="<?=$asset->name?>" alt="<?=$asset->name?>" class="original-image " src="<?=$thumbnailurl?>">
                    <?php

                        if($asset->created >= time() - 86400){
                            echo '<img src="/images/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New">';
                        }

                        if($asset->limited == 1){
                            echo '<img src="/images/793dc1fd7562307165231ca2b960b19a.png" alt="Limited" class="limited-overlay">';
                        }

                        if($asset->limitedu == 1){
                            echo '<img src="/images/d649b9c54a08dcfa76131d123e7d8acc.png" alt="Limited Unique" class="limited-overlay">';
                        }

                    ?>                                  
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/<?=$slugify->slugify($asset->name);?>-item?id=<?=$asset->id?>" title="<?=$asset->name?>"><?=$asset->name?></a></div>
        <?php if($asset->publicdomain == 1){ ?>
                <? if($asset->robux == 0){ ?>
                    <div class="robux-price"><span class="robux notranslate">FREE</span></div>
                <? } ?>

                <? if($asset->robux !== 0){ ?>
                    <div class="robux-price"><span class="robux notranslate"><?=$asset->robux?></span></div>
                <? } ?>

                <? if($asset->tix !== 0){ ?>
                    <div class="tickets-price"><span class="tickets notranslate"><?=$asset->tix?></span></div>
                <? } ?>

            <? } ?>

                <!-- TODO: Private Sales -->
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/<?=$creator->id?>/profile"><?=$creator->username?></a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo"><?=$Carbon::createFromTimestamp($asset->updated)->diffForHumans();?></span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate"><?=$boughtamount?></span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">0 times</span></div> <!-- TODO: Favorites -->
        </div>
</div>
</div>	
</div>
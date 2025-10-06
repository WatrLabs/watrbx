<?php
    use watrbx\thumbnails;
    $thumbs = new thumbnails();
    $thumbnail = $thumbs->get_asset_thumb($asset->id, "200x200");
?>
<div class="place asset gameplace" data-placeid="<?=$asset->id?>">
    <a class="game-image" onclick="document.location.href = '/ide/update?placeId=<?=$asset->id?>';" data-retry-url="">
    <img class="placeThumbnail" src="<?=$thumbnail?>">
    </a>
    <p class="notranslate item-name-container ellipsis-overflow"><?=htmlspecialchars($asset->name, ENT_QUOTES, 'UTF-8')?></p>
</div>
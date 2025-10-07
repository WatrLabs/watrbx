<?php
    use watrlabs\authentication;
    use watrbx\thumbnails;
    use Cocur\Slugify\Slugify;
    $slugify = new Slugify();

    $thumbs = new thumbnails();
    $auth = new authentication();

    $creator = $auth->getuserbyid($asset->owner);
    $thumbnailurl = $thumbs->get_asset_thumb($asset->id);
?>

<td>
    <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-<?=$asset->id?>">
        <div class="AssetThumbnail">
            <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl01_AssetThumbnailHyperLink" class=" notranslate" title="<?=$asset->name?>" href="/<?=$slugify->slugify($asset->name);?>-item?id=<?=$asset->id?>" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="<?=$thumbnailurl?>" height="110" width="110" border="0" alt="<?=$asset->name?>" class=" notranslate"></a>
        </div>
        <div class="AssetDetails">
            <div class="AssetName noTranslate">
                <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl01_AssetNameHyperLinkPortrait" href="/<?=$slugify->slugify($asset->name);?>-item?id=<?=$asset->id?>"><?=htmlspecialchars($asset->name, ENT_QUOTES, 'UTF-8')?></a>
            </div>
            <div class="AssetCreator">
                <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl01_CreatorHyperLinkPortrait" class="notranslate" href="/users/<?=$creator->id?>/profile"><?=$creator->username?></a></span>
            </div>
        </div>
    </div>
    </td>
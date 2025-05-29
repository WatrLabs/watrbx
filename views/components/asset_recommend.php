<?php
    use watrlabs\authentication;
    use watrbx\thumbnails;

    $thumbs = new thumbnails();
    $auth = new authentication();

    $creator = $auth->getuserbyid($asset->owner);
    $thumbnailurl = $thumbs->get_asset_thumb($asset->id);
?>

<td>
    <div class="PortraitDiv" style="width: 140px;overflow: hidden;margin:auto;" visible="True" data-se="recommended-items-1">
        <div class="AssetThumbnail">
            <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl01_AssetThumbnailHyperLink" class=" notranslate" title="Uh Oh" href="/Uh-Oh-item?id=7074944" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="https://t2.rbxcdn.com/660b2bc80ced47bd2309d35908d6b743" height="110" width="110" border="0" alt="Uh Oh" class=" notranslate"></a>
        </div>
        <div class="AssetDetails">
            <div class="AssetName noTranslate">
                <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl01_AssetNameHyperLinkPortrait" href="https://www.roblox.com/Uh-Oh-item?id=7074944">Uh Oh</a>
            </div>
            <div class="AssetCreator">
                <span class="stat-label">Creator:</span> <span class="Detail stat"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl01_CreatorHyperLinkPortrait" class="notranslate" href="https://www.roblox.com/users/1/profile">ROBLOX</a></span>
            </div>
        </div>
    </div>
    </td>
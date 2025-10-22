<?php
    $url = $thumbs->get_asset_thumb($assetid);
    $assetinfo = $catalog::get_asset_info($assetid);
?>

<div class="Asset">
    <div class="AssetThumbnail">
        <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AccoutrementsListView_ctrl1_ctl02_AssetThumbnailHyperLink" title="click to <?=$action?>" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AccoutrementsListView$ctrl1$ctl02$AssetThumbnailHyperLink&#39;,&#39;&#39;)" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="<?=$url?>" height="110" width="110" border="0" alt="click to <?=$action?>" /></a>
            <div style="position: absolute;right:-7px;text-align: center;top: 0;">
                <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AccoutrementsListView_ctrl1_ctl02_<?=$action?>AccoutrementButton" title="click to <?=$action?>" class="btn-small btn-neutral" href="javascript:__doPostBack(&#39;<?=$action?>|<?=$assetinfo->id?>&#39;,&#39;&#39;)">    
                    <?=$action?>
                </a>                                        
            </div>
    </div>
    <div class="AssetDetails">
        <div class="AssetName">
            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AccoutrementsListView_ctrl1_ctl02_AssetNameHyperLink" title="click to view" class="notranslate" href="/<?=$slugify->slugify($assetinfo->name);?>-item?id=<?=$assetinfo->id?>"><?=$assetinfo->name?></a>
        </div>
        <div class="AssetType">
            <span class="Label">Type:</span> <span class="Detail">
                <?=$rbx->get_friendly_asset_type($assetid)?>
            </span>
        </div>
    </div>
</div>
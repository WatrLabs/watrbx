<div id="rbx-vip-servers" class="container-list"
         data-placeid="<?=$gameinfo->assetid?>"
         data-universeid="<?=$gameinfo->assetid?>"
         data-showshutdown
         data-slow-game-fps-threshold="15"
         data-private-server-name-max-length="50"
         data-private-server-name-error-text="The name of a VIP Server cannot be blank and can be no more than {0} characters."
         data-configure-base-url="/private-server/configure?privateServerId={0}"
         data-game-instances-base-url="/private-server/instance-list?universeId=<?=$id?>"
         data-game-shutdown-url="/game-instances/shutdown"
         data-is-user-authenticated="True"
         data-instance-list-url="/private-server/instance-list-json"
         data-renew-url="/private-server/renew">

        
        <div class="container-header create-server-banner section-row">
            <span class="create-server-banner-text">Play this game with friends and other people you invite.</span>
                <div id="private-server-purchase-body-content" class="hidden">
                    <div class="private-server-purchase">
                        <div class="private-server-main-text">
                            Create a VIP Server for {0}?
                        </div>
                        <div class="private-server-game-name">
                            Game Name:
                        </div>
                        <span class="game-name">
                            <?=$assetinfo->name?>
                        </span>
                        <div class="private-server-name-input">
                            Server Name:
                            <div class="private-server-name-error-message"></div>
                            <input type="text" class="private-server-name" maxlength="50">
                        </div>
                    </div>
                </div>
                <span class="rbx-btn-secondary-sm btn-more rbx-vip-server-create"
                      data-is-private-server="true"
                      data-product-id="<?=$gameinfo->assetid?>"
                      data-item-id="<?=$id?>"
                      data-item-name="<?=$assetinfo->name?>"
                      data-expected-price="100"
                      data-expected-currency="1"
                      data-seller-name="Dued1"
                      data-expected-seller-id="82471"
                      data-continueshopping-url="/games/<?=$id?>/Work-at-a-Pizza-Place"
                      data-purchase-title-text="Create VIP Server"
                      data-purchase-body-content=""
                      data-purchase-url="/private-server/purchase"
                      data-universe-id="<?=$id?>"
                      data-modal-field-validation-required="true"
                      data-footer-text="Your balance after this transaction will be {0}. This is a subscription-based feature. It will auto-renew once a month until you cancel the subscription."
                      name="CreatePrivateServer">Create VIP Server</span>

        </div>
        <div class="tab-server-only">
<h3>VIP Servers</h3>
<ul class="rbx-vip-server-item-container"></ul>
<div class="rbx-vip-servers-footer">
    <button type="button" class="rbx-btn-control-xs btn-full-width rbx-vip-servers-load-more hidden">Load More</button>
</div>
<div class="rbx-vip-server-template">
    <li class="section rbx-vip-server-item">
        <div class="section-header">
            <span class="rbx-title">My VIP Server</span>
            <div class="link-menu rbx-vip-server-menu"></div>
        </div>
        <div class="section-left rbx-vip-server-details">
            <div class="rbx-vip-owner">

            </div>
            <div class="rbx-game-status rbx-vip-server-status">x of y players max</div>
            <div class="rbx-vip-server-alert">
                <span class="rbx-icon-remove"></span>Slow Game
            </div>
            <div class="rbx-vip-server-subscription-alert">
                <span class="rbx-icon-remove"></span><span class="rbx-vip-server-subscription-alert-text">Payment Cancelled</span>
            </div>
            <div class="rbx-vip-server-insufficient-funds">
                <span class="rbx-icon-remove"></span>This Server has been deactivated. We were not able to process
                the recurring payment due to insufficient funds in your account.
            </div>
            <a class="btn-full-width rbx-btn-control-xs rbx-vip-server-renew"
               href="#">Renew</a>
            <a class="btn-full-width rbx-btn-control-xs rbx-vip-server-join"
               href="#"
               data-placeid>Join</a>

        </div>
        <div class="section-right rbx-vip-server-players">
        </div>
    </li>
</div>

        </div>
    </div>
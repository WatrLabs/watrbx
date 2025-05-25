<div id="rbx-vip-servers" class="container-list"
         data-placeid="<?=$gameinfo->id?>"
         data-universeid="<?=$gameinfo->id?>"
         data-showshutdown
         data-slow-game-fps-threshold="15"
         data-private-server-name-max-length="50"
         data-private-server-name-error-text="The name of a VIP Server cannot be blank and can be no more than {0} characters."
         data-configure-base-url="/private-server/configure?privateServerId={0}"
         data-game-instances-base-url="/private-server/instance-list?universeId=47545"
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
                            <?=$gameinfo->title?>
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
                      data-product-id="<?=$gameinfo->id?>"
                      data-item-id="<?=$gameinfo->id?>"
                      data-item-name="<?=$gameinfo->title?>"
                      data-expected-price="<?=$gameinfo->privateserverprice?>"
                      data-expected-currency="1"
                      data-seller-name="Dued1"
                      data-expected-seller-id="82471"
                      data-continueshopping-url="/games/<?=$gameinfo->id?>/Work-at-a-Pizza-Place"
                      data-purchase-title-text="Create VIP Server"
                      data-purchase-body-content=""
                      data-purchase-url="/private-server/purchase"
                      data-universe-id="<?=$gameinfo->id?>"
                      data-modal-field-validation-required="true"
                      data-footer-text="Your balance after this transaction will be {0}. This is a subscription-based feature. It will auto-renew once a month until you cancel the subscription."
                      name="CreatePrivateServer">Create VIP Server</span>

        </div>
        <div class="tab-server-only">

        </div>
    </div>
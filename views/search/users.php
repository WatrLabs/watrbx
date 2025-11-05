<?php 
use watrlabs\watrkit\pagebuilder;
use watrbx\thumbnails;
$pagebuilder = new pagebuilder();
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___91ce90e508d798217cc5452e978970d5_m.css');
$pagebuilder->addresource('jsfiles', '/js/71159c155b71b830770f1880fd3b181b.js');
$pagebuilder->addresource('jsfiles', '/js/827f89b1af9564915de6fb8725c9b27c.js');
$pagebuilder->addresource('jsfiles', '/js/142b5a3a1621b800298642e22ddb6650.js');
$pagebuilder->set_page_name("Search");
$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();


$allusers = [];

if(isset($_GET["keyword"])){
    $keyword = $_GET["keyword"];

    global $db;
    $allusers = $db->table("users")->where("username", "LIKE", $keyword)->get();

}


?>

<div id="BodyWrapper" class="">
                        <div id="RepositionBody">
                            <div id="Body" style="width:970px">
                                

<div id="PeopleSearchContainer" class="people-search-container" data-searchpageurl="/search/users" data-dosearchurl= "/search/do-search">
    <div>
        <span class="form-label">Search:</span>
        <input id="people-search-keyword" autofocus autocomplete="off" name="name" type="text" class="text-box text-box-large people-search-textbox" placeholder="Search for users..." <? if(isset($keyword)){ echo "value=\"". htmlspecialchars($keyword) . "\""; } ?> />
        <span class="search-button-image-container">
            <a  class="btn-small btn-primary" id="peoplesearch-search-button">Search Users</a>
            <img id="peoplesearch-search-loading" style="display: none" src="https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif" />
        </span>
    </div>
    <div>
        <div id="Results" class="result-container">


    <?php
        if(empty($allusers)){
            echo '<div> No results were found.</div>';
        } else {
            $thumbs = new thumbnails();
            foreach ($allusers as $user){ 
                $thumb = $thumbs->get_user_thumb($user->id, "250x250", "full");
                $is_deleted = $db->table("moderation")->where("userid", $user->id)->where("type", "deleted")->first();

                if($is_deleted == null){
                ?>

            <div class="divider-top result-item-container" data-userpageurl="/users/<?=$user->id?>/profile">
            <div class="avatar-image-container notranslate">
                <span class="avatar-image-link" data-3d-url="<?=$thumb?>"" data-js-files="https://js.rbxcdn.com/2cdabe2b5b7eb87399a8e9f18dd7ea05.js">
                    <img alt="InviteKeyTest" class="avatar-image" src="<?=$thumb?>">
                </span>
            </div>
            <div class="text-container text">
                <div class="notranslate">
                    <img alt="offline" src="https://images.rbxcdn.com/3a3aa21b169be06d20de7586e56e3739.png" title="Offline">
                    <a href="/users/<?=$user->id?>/profile"><?=$user->username?></a>
                </div>
                <div class="notranslate linkify"><?=$user->blurb?></div>
            </div>
            <div class="view-button">
                <span> 5/8/2015 5:04 PM</span>
            </div>
            <div class="clear"></div>
        </div>

           <? }
           }
         } ?>
    

        </div>
        <div class="skyscraper-ad-container">


    <iframe allowtransparency="true"
            frameborder="0"
            height="612"
            scrolling="no"
            src="/userads/2"
            width="160"
            data-js-adtype="iframead"></iframe>

        </div>
    </div>
    <div class="clear"></div>
</div>

<div id="ProcessingView" style="display:none">
    <div class="ProcessingModalBody">
        <p class="processing-indicator"><img src='https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif' alt="Searching..." /></p>
    </div>
</div>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                    </div>
                    <? $pagebuilder->build_footer(); ?>
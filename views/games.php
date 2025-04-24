<?php
use watrlabs\watrkit\pagebuilder;
$pagebuilder = new pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
//$auth->requiresession();
//$userinfo = $auth->getuserinfo($_COOKIE["watrbxsession"]);
//die(var_dump($userinfo));
$pagebuilder->set_page_name("Games");
$pagebuilder->addresource('cssfiles', '/assets/css/games.css?t=' . time());
$pagebuilder->buildheader();
?>
    <div id="main">
        <p style="text-align: center;">Don't have the <a href="/watrbxlauncher.exe">launcher</a>? - <a href="/game/upload">Create a game?</a></p>
        <div id="welcome-text">
            <h2>Most Popular</h2>
            <button style="margin-left: auto;" onclick="alert('lol this still does nothing 🔥🔥🔥')">See All</button>
        </div>
        <div id="gamecontainer">
           
        <button id="slideBack" type="button"><</button><div id="gamelist">
            <?php
                global $db;
                $query = $db->table('universes')
                ->select(
                    'universes.id',
                    'universes.title',
                    'universes.placeid',
                    $db->raw('COUNT(activeplayers.id) as active_count')
                )
                ->leftJoin('activeplayers', 'activeplayers.pid', '=', 'universes.placeid')
                ->groupBy('universes.id', 'universes.title')
                ->orderBy('active_count', 'desc');

                $result = $query->get();
            
                foreach ($result as $row) { ?>
                    <a href="/game/<?= $row->id ?>/" id="game-text">
                    <div id="game" class="container">
                        <img src="https://watrbx.xyz/api/get-thumb?assetid=<?= $row->placeid ?>&dimensions=1024x1024"
                             onerror="this.onerror=null;this.src='https://watrbx.xyz/api/get-thumb?error=true';" id="game-img">
                        <div id="gameshiz">
                            <p id="game-text"><?= $row->title ?></p>
                            <p id="playingtext"><?= $row->active_count ?> Playing</p>
                        </div>
                    </div>
                </a>
                <? } ?>

        </div>      
        <button id="slide" type="button">></button>
    </div>
    </div>
    
    <script>
        var button = document.getElementById('slide');
button.onclick = function () {
    var container = document.getElementById('gamelist');
    sideScroll(container,'right',6,440,10);
};

var back = document.getElementById('slideBack');
back.onclick = function () {
    var container = document.getElementById('gamelist');
    sideScroll(container,'left',6,440,10);
};

function sideScroll(element,direction,speed,distance,step){
    scrollAmount = 0;
    var slideTimer = setInterval(function(){
        if(direction == 'left'){
            element.scrollLeft -= step;
        } else {
            element.scrollLeft += step;
        }
        scrollAmount += step;
        if(scrollAmount >= distance){
            window.clearInterval(slideTimer);
        }
    }, speed);
}

    </script>
    
<? $pagebuilder->get_snippet("footer"); ?>
<?php
use watergames\pagebuilder;
$pagebuilder = new pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
//$auth->requiresession();
//$userinfo = $auth->getuserinfo($_COOKIE["watrbxcookie"]);
//die(var_dump($userinfo));
$pagebuilder->set_page_name("Games");
$pagebuilder->addresource('cssfiles', '/assets/css/games.css?t=' . time());
$pagebuilder->buildheader();
?>
    <div id="main">
        <p style="text-align: center;">Don't have the <a href="/watrbxlauncher.exe">launcher</a>? - <a href="/game/upload">Create a game?</a></p>
        <h2 id="welcome-text">Most Popular <button style="margin-left: 83%;">See All</button></h2>
        <div id="gamecontainer">
           
        <button id="slideBack" type="button"><</button><div id="gamelist">
            <?php
                include (baseurl . '/conn.php');
                $gamefetch = $pdo->prepare("SELECT * FROM universes WHERE parent IS NULL ORDER BY id DESC");
                $gamefetch->execute();
                $games = $gamefetch->fetchAll(PDO::FETCH_ASSOC);
                $gamesWithCount = [];
                foreach ($games as $game) {
                    include baseurl . "/conn.php";
                    $stmt = $pdo->prepare("SELECT COUNT(*) as usrcount FROM `activeplayers` WHERE pid = ?");
                    $placeid = $game["placeid"];
                    $stmt->execute([$placeid]);
                    $playingcount = $stmt->fetchColumn();
                    $gamesWithCount[] = ['game' => $game, 'playingcount' => $playingcount];
                }
                usort($gamesWithCount, function ($a, $b) {
                    return $b['playingcount'] - $a['playingcount'];
                });
                foreach ($gamesWithCount as $gameData) {
                    $game = $gameData['game'];
                    $playingcount = $gameData['playingcount'];
            ?>
    
                <a href="/game/<?=$game["id"] ?>/" id="game-text">
                    <div id="game" class="container">
                        <img src="https://watrbx.xyz/api/get-thumb?assetid=<?=$game["placeid"]?>&dimensions=1024x1024" onerror="this.onerror=null;this.src='https://watrbx.xyz/api/get-thumb?error=true';" id="game-img">
                        <div id="gameshiz">
                            <p id="game-text"><?=$game["title"]?></p>
                            <p id="playingtext"><?=$playingcount ?> Playing</p>
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
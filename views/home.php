<?php
use watergames\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;

$pagebuilder = new pagebuilder;
$auth = new authentication();
$auth->requiresession();
$userinfo = $auth->getuserinfo($_COOKIE["watrbxcookie"]);


$pagebuilder->set_page_name("Home");
$pagebuilder->addresource('cssfiles', '/assets/css/home.css?t=' . time());
$pagebuilder->buildheader();
?>

<div id="main" style="width: 60%;">
    <h1 id="welcome-text">
        <img id="pfp" src="/images/headshot.png">
        Welcome, <?= $userinfo["username"] ?> 👋
    </h1>
    
    <h1>Friends</h1>
    <div id="friendcontainer" class="container">
        <div id="friend">
            <img id="friendimg" src="/images/headshot.png">
            <p id="friendtxt">watrabi</p>
        </div>
    </div>
    
    <h1>Continue</h1>
    <div id="gamecontainer">
        <button id="slideBack" type="button">&lt;</button>
        <div id="gamelist">
            <?php
            include (baseurl . '/conn.php');
            $gamefetch = $pdo->prepare("
    SELECT u.* 
    FROM universes u
    JOIN (
        SELECT MAX(id) AS time
        FROM visits
        GROUP BY universeid
    ) lv ON u.id = (SELECT universeid FROM visits WHERE id = lv.time AND userid = ?)
    WHERE u.parent IS NULL
    ORDER BY lv.time DESC
");

            $gamefetch->execute([$userinfo["id"]]);
            $games = $gamefetch->fetchAll(PDO::FETCH_ASSOC);

            foreach ($games as $game) {
                $stmt = $pdo->prepare("SELECT COUNT(*) as usrcount FROM `activeplayers` WHERE pid = ?");
                $placeid = $game["placeid"];
                $stmt->execute([$placeid]);
                $playingcount = $stmt->fetchColumn();
            ?>
            <a href="/game/<?= $game["id"] ?>/" id="game-text">
                <div id="game" class="container">
                    <img src="https://watrbx.xyz/api/get-thumb?assetid=<?= $game["placeid"] ?>&dimensions=1024x1024"
                         onerror="this.onerror=null;this.src='https://watrbx.xyz/api/get-thumb?error=true';" id="game-img">
                    <div id="gameshiz">
                        <p id="game-text"><?= $game["title"] ?></p>
                        <p id="playingtext"><?= $playingcount ?> Playing</p>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>      
        <button id="slide" type="button">&gt;</button>
    </div>
</div>

<script>
    document.getElementById('slide').onclick = function () {
        sideScroll(document.getElementById('gamelist'), 'right', 6, 440, 10);
    };

    document.getElementById('slideBack').onclick = function () {
        sideScroll(document.getElementById('gamelist'), 'left', 6, 440, 10);
    };

    function sideScroll(element, direction, speed, distance, step) {
        let scrollAmount = 0;
        let slideTimer = setInterval(function () {
            element.scrollLeft += (direction === 'left') ? -step : step;
            scrollAmount += step;
            if (scrollAmount >= distance) {
                clearInterval(slideTimer);
            }
        }, speed);
    }
</script>

<?php $pagebuilder->get_snippet("footer"); ?>

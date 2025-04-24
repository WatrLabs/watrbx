<?php
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\sitefunctions;

$pagebuilder = new pagebuilder;
$auth = new authentication();
$auth->requiresession();
$userinfo = $auth->getuserinfo($_COOKIE["watrbxsession"]);
$pagebuilder->set_page_name("Home");
$pagebuilder->addresource('cssfiles', '/assets/css/home.css?t=' . time());
$pagebuilder->buildheader();
?>

<div id="main" style="width: 60%;">
    <h1 id="welcome-text">
        <img id="pfp" src="/images/headshot.png">
        Welcome, <?= $userinfo->username; ?> 👋
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
            global $db;

            $userid = $userinfo->id;

            $query = $db->table('universes')
            ->select(
                'universes.id',
                'universes.title',
                'universes.placeid',
                $db->raw('COUNT(activeplayers.id) as active_count'),
                $db->raw('MAX(visits.time) as last_visited')
            )
            ->join('visits', function ($join) use ($userid) {
                $join->on('visits.universeid', '=', 'universes.id')
                ->where('visits.userid', '=', $userid);
            })
            ->leftJoin('activeplayers', 'activeplayers.pid', '=', 'universes.placeid')
            ->groupBy('universes.id', 'universes.name')
            ->orderBy('last_visited', 'desc');
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

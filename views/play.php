<?php
    use watergames\pagebuilder;
    $pagebuilder = new pagebuilder;
    use watrlabs\authentication;
    $auth = new authentication();
    //$auth->requiresession();
    
    
    include(baseurl . '/conn.php');
    $gamefetch = $pdo->prepare("SELECT * FROM universes WHERE parent IS NULL AND id = ?");
    $gamefetch->execute([$id]);
    if ($gamefetch->rowCount() < 1) {
        header("Location: /404");
        die();
    } else {
        /* else isnt really required but I like how it looks */
        $gameinfo = $gamefetch->fetch(PDO::FETCH_ASSOC);
        $pagebuilder->set_page_name($gameinfo["title"]);
        $pagebuilder->addresource('cssfiles', '/assets/css/game.css?t='. time());
        $pagebuilder->addmetatag("og:title", $gameinfo["title"]);
        $pagebuilder->addmetatag("og:description", $gameinfo["description"]);
        $pagebuilder->addmetatag("og:image", "https://watrbx.xyz/api/get-thumb?assetid=".$gameinfo["placeid"]."&dimensions=1024x1024");
        $pagebuilder->buildheader();
        // added on 1/16/25 5:41 PM by Czech
        $gyatt = $pdo->prepare("SELECT * FROM `users` WHERE `id` = :b");
        $gyatt->bindParam(":b", $gameinfo["owner"], PDO::PARAM_INT);
        $gyatt->execute();
        if ($gyatt->rowCount() > 0) {
            $creator = $gyatt->fetch(PDO::FETCH_ASSOC);
        }
    }
    //die(var_dump($userinfo));
    
    if (isset($_COOKIE["watrbxcookie"])) {
        $userinfo = $auth->getuserinfo($_COOKIE["watrbxcookie"]);
        $token = $_COOKIE["watrbxcookie"];
    } else {
        $guestid = rand(100, 999);
        setcookie(".ROBLOSECURITY", "Guest/$guestid", time() + 99999999, "");
        $token = "Guest/$guestid";
    }

?>
    <div id="main">
    <div class="container" id="div1">
        <img src="https://watrbx.xyz/api/get-thumb?assetid=<?=$gameinfo["placeid"]?>&dimensions=1280x720" onerror="this.onerror=null;this.src='https://watrbx.xyz/api/get-thumb?error=true';" width="1280px" height="720px" id="gamebanner">
        <h2 id="gamename" style="position: relative; bottom: 0.5em"><?=$gameinfo["title"]?></h2>
        <?php
          if (isset($creator)) {?>
            <small><p style="color: gainsboro; position: relative; bottom: 2em;"> Created by <a href="/users/<?=$creator["id"]?>/"><?=$creator["username"]?></a> <? 
            if(isset($_COOKIE["watrbxcookie"])) { if($userinfo["id"] == $creator["id"]){ ?> - <a href="/game/<?=$gameinfo["id"]?>/update">Edit</a> <? } } ?></p></small>
          <?}
        ?>
        <button id="playbutton" onclick="joingame();">Play</button>
    </div>
    
    <div class="container" id="div2">
        <p id="div2-text"><?=$gameinfo["description"]?></p>
        <hr>
        0 Playing - 0 Favorites - 0 Servers
    </div>
    <p style="text-align: center;">this layout is temp btw</p>

    </div>
    <div id="modal-bg">
        <div id="modal" class="container">
            <div class="spinner"></div>
            <p><b>Launching watrbx... </b></p>
        </div>
    </div>
    
    <div id="install-modal-bg">
        <div id="installmodal" class="container">
            <h1>Don't have watrbx?</h1>
            <p>Install it now!</p>
            <a href="/watrbxlauncher.exe" class="button" style="margin: 35px;">Download</a>
        </div>
    </div>
    <script>
        async function joingame() {
            
            const placeid = <?=$gameinfo["placeid"];?>;
            const token = "<?=$token?>";
            const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            var placelauncherurl = "/Game/PlaceLauncher.ashx?placeId=" + placeid;

            if (isMobile) {
                //const response = fetch(placelauncherurl)
                //if (!response.ok) {
                    //alert("Failed to launch game!");
                    //return;
                //}
                window.location.href = "games/start?placeid="+ placeid;
                return;
            }
            
            const response = await fetch(placelauncherurl)
            if (!response.ok) {
                alert("Failed to launch game!");
                return;
            }
            
            const modalbg = document.getElementById("modal-bg");
            const modal = document.getElementById("modal");
            
            const installmodalbg = document.getElementById("install-modal-bg");
            const installmodal = document.getElementById("installmodal");
            
            modalbg.style.display = 'block';
            modal.style.display = 'block';
            window.location.href = "watrbx://?token="+ token +"&pid=" + placeid;
                
            setTimeout(function(){
                modal.style.display = 'none';
                modalbg.style.display = 'none';
                installmodalbg.style.display = 'block';
                installmodal.style.display = 'block';
                
                setTimeout(function(){
                    installmodalbg.style.display = 'none';
                    installmodal.style.display = 'none';
                }, 5000);
            }, 5000);
            
            return;
            
            
            
            
            
        }
    </script>

<? $pagebuilder->get_snippet("footer"); ?>
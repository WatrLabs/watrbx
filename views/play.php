<?php
    use watrlabs\watrkit\pagebuilder;
    use watrlabs\router\routing;
    use watrlabs\authentication;
    $pagebuilder = new pagebuilder;
    $router = new routing();
    $auth = new authentication();
    $userinfo = $auth->getuserinfo($_COOKIE["watrbxsession"]);

    global $db;

    $query = $db->table("universes")->select("*")->where("universes.id", $id)->join("users", "users.id", "=", "owner");
    $gameinfo = $query->first();

    if($gameinfo == null){
        $router->return_status(404);
    }

    $pagebuilder->addresource('cssfiles', '/assets/css/game.css?t=' . time());
    $pagebuilder->addmetatag("og:title", $gameinfo->title);
    $pagebuilder->addmetatag("og:description", $gameinfo->description);
    $pagebuilder->addmetatag("og:image", "/api/get-thumb?assetid=".$gameinfo->placeid."&dimensions=1024x1024");
    $pagebuilder->set_page_name($gameinfo->title);
    $pagebuilder->buildheader();
?>

    <div id="main">
        <div id="main-container" class="container">
            <div id="thumbnail-container">
                <img src="https://watrbx.xyz/api/get-thumb?assetid=<?=$gameinfo->placeid?>&dimensions=1280x720" id="thumbnail">
            </div>
            <div id="gametext">
                <h2><?=$gameinfo->title?></h2>
                <small>by <a href="<?=$gameinfo->owner?>"><?=$gameinfo->username?></a></small>
                <br>
                <div id="thebelow">
                    <button id="playbutton" onclick="joingame();">Play</button>
                </div>
            </div>
        </div>

        <div class="container" id="tabs">
            <div id="tabbutton"><a href="javascript:showabout();" id="aboutbutton" class="selected">About</a></div>
            <div id="tabbutton"><a href="javascript:showabout();" id="aboutbutton">Store</a></div>
            <div id="tabbutton"><a href="javascript:showcreations();" id="createbutton">Servers</a></div>
        </div>
        <div class="container" id="tabcontent">
            <div id="about" class="card">
                <h2>Description</h2>
                <p>This game has no description.</p>
            </div>

            <div id="creations" class="hidden card">
                <h2>Creations</h2>
                <p>This user has no games.</p>
            </div>
        </div>

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
            
            const placeid = <?=$gameinfo->placeid;?>;
            const token = "<?=$_COOKIE["watrbxsession"]?>";
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
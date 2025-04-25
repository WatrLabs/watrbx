<?php
    use watrlabs\watrkit\pagebuilder;
    use watrbx\sitefunctions;
    $sitefunc = new sitefunctions();
    use watrlabs\authentication;
    $auth = new authentication;

    global $db;

    if($auth->havesession()){
        if($auth->hasaccount()){
            header("Location: /home");
        }
    }

    $pagebuilder = new pagebuilder;
    $pagebuilder->set_page_name("Landing");
    $pagebuilder->addresource('cssfiles', '/assets/css/index.css');
    $pagebuilder->buildheader();

    if(isset($_GET["refer"])){
        $referid = $_GET["refer"];

        $query = $db->table('refers')->where('refername', '=', $referid);
        $referdata = $query->first();
        
        if($referdata !== null){
    
            $newrefers = $referdata["visits"] + 1;

            $updatearray = array(
                "visits"=>$newrefers
            );
            
            $updaterefers = $pdo->prepare("UPDATE refers SET visits = ?");
            $updaterefers->execute([$newrefers]);

            $db->table('my_table')->where('id', 5)->update($data);

            
            setcookie("referer", $referid, time() + 8600);
        }
        
    }
    
    
?>
<div id="home-main">
    <div id="home-inner">
        <img src="/assets/images/watrbxlogo3.png" id="logo">
        <p>We are a 2016 + (soon to be) 2013 ROBLOX private server.</p>
        <p>We currently have <? echo $sitefunc::getusercount(); ?> Users, why don't you join today?</p>
        <button id="home-buttons" onclick="window.location.href = '/register'">Join</button>
        <button id="home-buttons" onclick="window.location.href = '/login'">Login</button>
    </div>
    <div id="home-inner">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/0E9kzyAwC9Y?si=vIh1lgACpiWiNNui" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
</div>

<div id="main" style="text-align: center;">
    <div id="socials">
        <a href="https://x.com/_watrbx" style="text-decoration: none;">
            <div id="social" style="background-color: #378db8; color: white; text-decoration: none;">
                <div id="socialicon">
                    <img src="/assets/images/socials/x.svg" alt="X (formerly Twitter) Logo" id="sociallogo">
                </div>
                <div>
                    <p>Follow us on X for special updates and Sneak Peaks!</p>
                </div>
            </div>
        </a>
        <a href="https://discord.gg/kwX8wvEFw6" style="text-decoration: none;"  >
            <div id="social" style="background-color: #378db8; color: white; text-decoration: none;">
                <div id="socialicon">
                    <img src="/assets/images/socials/discord.svg" alt="Discord Logo" id="sociallogo">
                </div>
                <div>
                    <p>Join our discord for special events and announcements!</p>
                </div>
            </div>
        </a>
    </div>
</div>
<script>
    var totalCount = 4;
    const elem = document.getElementById("home-main");
    var num = Math.ceil( Math.random() * totalCount );
    document.getElementById("home-main").style.backgroundImage = 'url(/assets/images/bgs/'+num+'.png)';
    // ts was just for debug alert('/assets/images/bgs/'+num+'.png');
</script>
<? $pagebuilder->get_snippet("footer"); ?>
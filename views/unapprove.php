<?php
    use watergames\pagebuilder;
    $pagebuilder = new pagebuilder;
    use watrlabs\authentication;
    $auth = new authentication();
    $auth->requiresession();
    $userinfo = $auth->getuserinfo($_COOKIE["watrbxcookie"]);
    $pagebuilder->set_page_name("Unapproved");
    $pagebuilder->buildheader();
    include(baseurl . "/conn.php");
    $bancheck = $pdo->prepare('SELECT * FROM `bans` WHERE `userid` = ?'); 
    $bancheck->execute([$userinfo['id']]);
	        
    if($bancheck->rowCount() > 0){
        $baninfo = $bancheck->fetch(PDO::FETCH_ASSOC);
	            //echo $_SERVER['REQUEST_URI'];
        if($_SERVER['REQUEST_URI'] !== "/unapproved?id=" . $baninfo['id']){
            header('Location: /unapproved?id=' . $baninfo['id']);
            die();
	   }
        http_response_code(403);
    } else {
        die(header("Location: /home"));
    }

?>

<div id="main">
    <h1>Your account has been banned!</h1>
    <p>Your account was terminated for breaking our TOS!</p>
    <p>Moderator Note: <i><?=$baninfo["reason"]?></i></p>
</div>

<? $pagebuilder->get_snippet("footer"); ?>
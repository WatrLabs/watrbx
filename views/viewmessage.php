<?php 
include baseurl . "/conn.php";
use watergames\pagebuilder;
$pagebuilder = new pagebuilder;
use watrlabs\authentication;
$pagebuilder->buildheader();
$auth = new authentication();
$auth->requiresession();
$userinfo = $auth->getuserinfo($_COOKIE["watrbxcookie"]);
if (isset($id)) {
    $stmt = $pdo->prepare("SELECT * FROM `messages` WHERE `id` = ?");
    $stmt->execute([$id]);
    if ($stmt->rowCount() > 0) {
        $f = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($f["user"] != $userinfo["id"] && $f["sender"] != $userinfo["id"] && $userinfo["role"] < 1) {
            header("Location: /404");
        }
        $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `id` = ?");
        $stmt->execute([$f["sender"]]);
        if ($stmt->rowCount() > 0) {
            $sender = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $stmt = $pdo->prepare("UPDATE messages SET viewed = 1 WHERE `id` = ?");
            $stmt->execute([$id]);
        }
        
    } else {
        header("Location: /404");
        die();
    }
} else {
    header("Location: /404");
    die();
}
?>

<div id="main" style="width: 30%; margin-left: auto; margin-right: auto;">
    <div id="MessageContainer" class="container">
        <h2 style="text-align: center; margin-bottom: 0px;"><?=wordwrap(htmlentities($f["title"]), 40, "<br/>\n", true);?></h2>
        <p style="text-align: center; color: grey; margin: 0px;"> <small>From <?=$sender["username"]?></small> </p>
        <p style="text-align: center;"><?=nl2br(wordwrap(htmlentities($f["content"]), 60, "\n", true));?></p>
    </div>
</div>

<? $pagebuilder->get_snippet("footer"); ?>
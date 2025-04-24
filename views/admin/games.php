<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Game Manager");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/index.css?t='. time());
$pagebuilder->buildheader();
?>
<div id="main">
    

<p>game manager</p>
<h1>games in queue</h1>
<?php

include(baseurl . '/conn.php');
        $getServers = $pdo->query("SELECT * FROM serverqueue");
        $allServers = $getServers->fetchAll();
        
        foreach ($allServers as $server) {
?>

<p>game <?=$server['place']?> in queue</p><br>
<? } ?>

<br><br><br>
<h1>games running</h1>
<?php
        $getServers = $pdo->query("SELECT * FROM games");
        $allServers = $getServers->fetchAll();
        
        foreach ($allServers as $server) {
?>

<p>game <?=$server['place']?> running with jobid <?=$server['jobId']?> <a href="/matchmake/close?key=<?=arbiterKeySite?>&jobId=<?=$server['jobId']?>">close</a></p>
<? } ?>

</div>
<? $pagebuilder->get_snippet("footer"); ?>
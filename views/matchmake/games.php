<p>game manager</p>
<h1>games in queue</h1>
<?php

include(baseurl . '/conn.php');
        $getServers = $pdo->query("SELECT * FROM serverqueue");
        $allServers = $getServers->fetchAll();
        
        foreach ($allServers as $server) {
?>

<p>game <?=$server['id']?> in queue</p><br>
<? } ?>

<br><br><br>
<h1>games running</h1>
<?php
        $getServers = $pdo->query("SELECT * FROM servers");
        $allServers = $getServers->fetchAll();
        
        foreach ($allServers as $server) {
?>

<p>game <?=$server['place']?> running with jobid <?=$server['jobId']?> <a href="/matchmake/close?key=<?=arbiterKeySite?>&jobId=<?=$server['jobId']?>">close</a></p>
<? } ?>
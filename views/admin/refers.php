<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Refers");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/invkeys.css?t='. time());
$pagebuilder->buildheader();

?>

<div id="main" style="text-align: center;">
    <br><br>
    <table style="margin-left: auto; margin-right: auto;">
        <tr>
            <th>refer</th>
            <th>visits</th>
            <th>signups</th>
        </tr>
        <?php
        
        include(baseurl . '/conn.php');
        $getkeys = $pdo->query("SELECT * FROM refers");
        $allkeys = $getkeys->fetchAll();
        
        var_dump($allkeys);    
        
        foreach ($allkeys as $key) { ?>
        <tr>
            <td><?=$key["refername"]?></td>
            <td><?=$key["visits"]?></td>
            <td><?=$key["signups"]?></td>
        </tr>
        <? } ?>
        
    </table>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
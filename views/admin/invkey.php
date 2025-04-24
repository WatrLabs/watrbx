<?php 
use watergames\pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Invite Keys");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/invkeys.css?t='. time());
$pagebuilder->buildheader();

?>

<div id="main" style="text-align: center;">
    <a href="create-key" class="button">Create an invite key</a>
    <br><br>
    <table style="margin-left: auto; margin-right: auto;">
        <tr>
            <th>Invite Key</th>
            <th>Uses</th>
            <th>Creator</th>
            <th>Creation Date</th>
            <th>Used By</th>
            <th>Actions</th>
        </tr>
        <?php
        include(baseurl . '/conn.php');
        $getkeys = $pdo->query("SELECT * FROM invitekeys");
        $allkeys = $getkeys->fetchAll();
        
        foreach ($allkeys as $key) { ?>
        <tr>
            <td><?=$key["invkey"]?></td>
            <td><?=$key["uses"]?>/<?=$key["usedamount"]?></td>
            <td><?=$key["owner"]?></td>
            <td><?=date("m/d/Y", $key["date"])?></td>
            <td>soon</td>
            <td>soon</td>
        </tr>
        <? } ?>
        
    </table>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
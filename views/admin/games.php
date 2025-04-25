<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Manage Games");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/invkeys.css?t='. time());
$pagebuilder->buildheader();
global $db;
?>

<div id="main" style="text-align: center;">
    <br><br>
    <table style="margin-left: auto; margin-right: auto;">
        <tr>
            <th>Job ID</th>
            <th>Place ID</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        <?php

                $query = $db->table("games")->select("*");
                $allgameservers = $query->get();
                
                foreach($allgameservers as $gameserver){

        ?>        
        <tr>
            <td><?=$gameserver->jobId?></td>
            <td><?=$gameserver->place?></td>
            <td><?=$gameserver->isactive?></td>
            <td><a href="/matchmake/close?key=<?=$_ENV["arbiterKeySite"]?>&jobId=<?=$gameserver->jobId?>">Close</a></td>
        </tr>
        <? } ?>
    </table>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
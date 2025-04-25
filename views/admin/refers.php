<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
$auth->requiresession();
$pagebuilder = new pagebuilder;
$pagebuilder->set_page_name("Admin - Refers");
$pagebuilder->addresource('cssfiles', '/assets/css/admin/invkeys.css');
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

        global $db;
        $query = $db->table("refers")->select("*");
        $allrefers = $query->get();    
        
        foreach ($allrefers as $refer) { ?>
        <tr>
            <td><?=$refer->refername?></td>
            <td><?=$refer->visits?></td>
            <td><?=$refer->signups?></td>
        </tr>
        <? } ?>
        
    </table>
</div>
<? $pagebuilder->get_snippet("footer"); ?>
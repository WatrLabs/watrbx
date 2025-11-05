<tr class="forum-table-row">
	<td align="center" valign="middle" style="width:25px;">
        <?php
            if($postinfo->CanReply == 0){
                echo '<img title="Post (Locked)" src="/images/Forums/locked-unread.png" style="border-width:0px;">';
            } else {
                echo '<img title="Post (Locked)" src="/images/Forums/thread-unread.png" style="border-width:0px;">';
            }
        ?>
    </td>
    <td class="notranslate" style="height:25px;">
        <a class="post-list-subject" href="/Forum/ShowPost.aspx?PostID=<?=$postinfo->id?>">
            <div class="thread-link-outer-wrapper">
                <div class="thread-link-container notranslate">
                    <?=$postinfo->title?>
                </div>
		    </div>
        </a>
    </td>
    <td class="notranslate" style="width:80px;width:90px;padding-right:12px;"></td>
    <td align="left" style="width:100px;">
        <a class="post-list-author notranslate" href="/User.aspx?UserName=<?=$creatorusername?>">
            <div class="thread-link-outer-wrapper">
                <div class="normalTextSmaller thread-link-container">
                    <?=$creatorusername?>
                </div>
            </div>
        </a>
    </td>
    <td align="center" style="width:50px;">
        <span class="normalTextSmaller"><?=$replycount?></span>
    </td>
    <td align="center" style="width:50px;">
        <span class="normalTextSmaller"><?=$postinfo->views?></span>
    </td>
    <td align="center" style="width:100px;white-space:nowrap;">
        <a class="last-post" href="/Forum/ShowPost.aspx?PostID=<?=$postinfo->id?>">
            <div>
                <span class="normalTextSmaller"><b><?=$lastposterdate?></b></span>
            </div>
            <div class="normalTextSmaller notranslate"><?=$lastposterusername?></div>
        </a>
    </td>
</tr>
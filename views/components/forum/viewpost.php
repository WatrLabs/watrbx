<tr class="forum-post">
    <td class="forum-content-background" valign="top" style="width:150px;white-space:nowrap;"><table border="0">
        <tbody><tr>
            <td><img src="/Forum/skins/default/images/user_IsOffline.gif" alt="<?=$userinfo->username?> is not online." style="border-width:0px;">&nbsp;<a class="normalTextSmallBold notranslate" href="/users/<?=$userinfo->id?>/profile"><?=$userinfo->username?></a><br></td>
        </tr><tr>
            <td><a href="/users/<?=$userinfo->id?>/profile" style="width:100px;height:100px;position:relative;"><img src="/Thumbs/Avatar.ashx?x=100&amp;y=100&amp;Format=Png&amp;username=<?=$userinfo->username?>" style="border-width:0px;width:100px;height:100px;"><img src="/Thumbs/BCOverlay.ashx?username=<?=$userinfo->username?>" style="border-width:0px;position:absolute;left:0px;bottom:0px;"></a></td>
        </tr>
        
         <?php
            if($userinfo->is_admin == 1){
                echo '<tr>
            <td><img src="/Forum/skins/default/images/users_moderator.gif" alt="Forum Moderator" style="border-width:0px;" /></td>
        </tr>';
            }
        ?>
        <tr>
            <td><span class="normalTextSmaller"><b>Joined:</b> <?=date("d M Y", $userinfo->regtime)?></span></td>
        </tr><tr>
            <td><span class="normalTextSmaller"><b>Total Posts: </b>1</span></td>
        </tr><tr>
            <td style="height:20px;"><span class="normalTextSmaller primaryGroupInfo notranslate" username="<?=$userinfo->username?>" style="display:none;"></span></td>
        </tr>
    </tbody></table></td><td class="forum-content-background" valign="top"><table cellspacing="0" cellpadding="3" border="0" style="width:100%;border-collapse:collapse;table-layout:fixed;overflow:hidden;word-wrap:break-word;">
        <tbody><tr>
            <td colspan="2"><span class="normalTextSmaller"><?=date('d M Y h:i A', $postinfo->date);?></span></td>
        </tr><tr>
            <td valign="top" colspan="2" style="height:125px;"><span class="normalTextSmall notranslate linkify"><br><?=$postinfo->content?></span></td>
        </tr>
            <?
                global $currentuser;
                if($currentuser){
                    if($currentuser->is_admin == 1){
                        ?>
                        <tr>
				<td colspan="2"><span>

<table class="tableBorder" width="100%" cellpadding="3" cellspacing="0">
  <tbody><tr>
    <td class="forumRowHighlight" align="center">
      <span class="normalTextSmallBold">Moderate Post: <span id="PostView1_ctl00_PostList_ctl15_0_ctl00_0_PostID_0"><?=$postinfo->id?></span> [</span>
      <a id="PostView1_ctl00_PostList_ctl15_0_ctl00_0_DeletePost_0" class="menuTextLink" href="/Forum/Moderate/DeleteReply.aspx?ReplyId=<?=$postinfo->id?>">Delete Post</a> 
      <a id="PostView1_ctl00_PostList_ctl15_0_ctl00_0_EditPost_0" class="menuTextLink" href="/Forum/Moderate/EditPost.aspx?PostID=<?=$postinfo->id?>">Edit Post</a>
      <a id="PostView1_ctl00_PostList_ctl15_0_ctl00_0_MovePost_0" class="menuTextLink" href="/Forum/Moderate/MovePost.aspx?PostID=<?=$postinfo->id?>">Move Post</a>

      <span class="normalTextSmallBold">]</span>
    </td>
  </tr>
</tbody></table>
</span></td> <?
                    }
                }

            ?>
        </tr><tr>
            <td style="height:2px;"></td>
        </tr><tr>
            <td align="left" style="height:29px;"></td><td align="right"><span class="post-response-options"><?php if($parentinfo->CanReply == 1){ ?> <a href="/Forum/NewReply.aspx?PostID=<?=$parentinfo->id?>" class="btn-control btn-control-medium verified-email-act" id="ctl00_cphRoblox_PostReply1_ctl00_NewPostReply">Reply</a> <? } ?><span class="ReportAbuse"><span class="AbuseButton"><a href="/AbuseReport/ForumPost.aspx?PostID=<?=$postinfo->id?>">Report Abuse</a></span></span></span></td>
        </tr>
    </tbody></table></td>
</tr>

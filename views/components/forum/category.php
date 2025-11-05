<tr class="forum-table-row">
	<td colspan="2" style="width:80%;">
        <a class="forum-summary" href="/Forum/ShowForum.aspx?ForumID=<?=$category->id?>">
            <div class="forumTitle">
		        <?=$category->title?>
	        </div>
            <div>
		        <?=$category->description?>
	        </div>
        </a>
    </td>
    <td class="forum-centered-cell" align="center">
        <span class="normalTextSmaller"><?=$threadcount?></span>
    </td>
    <td class="forum-centered-cell" align="center">
        <span class="normalTextSmaller"><?=$postcount?></span>
    </td>
    <td align="center">
        <a class="last-post" href="/Forum/ShowPost.aspx?PostID=177713300#177715817">
            <span class="normalTextSmaller">
                <div>
		            <b><?=$lastposterdate?></b>
	            </div>
            </span>
            <span class="normalTextSmaller notranslate">
                <div class="notranslate"><?=$lastposter?></div>
            </span>
        </a>
    </td>
</tr>
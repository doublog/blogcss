<?php
$page = get_query_var('cpage');
global $post,$wp_query;
$comments = get_comments(array('post_id' => $post->ID, 'status' => 'approve', 'order' => 'ASC'));
if ( $comments  ||comments_open() )
{ 
?>
	<div class="comment_con" id="allcomments" style="display: block; ">
		<ul class="comment_list" id="allcomments_comment_list">
			<?php wp_list_comments('callback=showwithme_comment&&end-callback=showwithme_end_comment', $comments); ?>
		</ul>
	</div>
<?php
}
?>
<div id="nagivator1" class="comment_page clearfix">
<?php
showwithme_commentnavi(); 
function showwithme_commentnavi()
{
	// 如果用户在后台选择要显示评论分页
    if (get_option('page_comments')) 
	{
        // 获取评论分页的 html
      //$comment_pages = paginate_comments_links('echo=0');
	 	$baseLink = '';  	
		$baseLink = '&base=' . add_query_arg('cpage','%#%');
		$page = get_query_var('cpage');
		$comment_pages=paginate_comments_links('current=' . $page . $baseLink . '&echo=0&prev_next=0');
       // 如果评论分页的 html 不为空, 显示导航式分页
       if ($comment_pages)
	   {
	       echo '<div class="tr fr page" id="allcomments_pagesize">';
           echo $comment_pages;
		   echo '</div><div style="clear:both;"></div>';
       }
    }
} ?>
</div>

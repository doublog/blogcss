<!-- Recent comments start -->
<div class="sidebar_cmt_widget">
<h2>最新评论</h2>
	<ul class="rc_comments">
		<?php if( function_exists('wp_recentcomments') ) : ?>
			<?php wp_recentcomments('limit=5&length=16&post=false&smilies=true'); ?>
		<?php else: ?>
			<?php
			$comments = get_comments('number=6'); 
			foreach($comments as $comment){ $cmt_visitor = get_comment_author(); echo '<li class="rc-item rc-clearfix">'.get_avatar($comment, 32, ture, $cmt_visitor).'<div class="rc-info"><a href="'.get_comment_link($comment->comment_ID).'" rel="nofollow" title="查看该评论文章： '.get_the_title($comment->comment_post_ID).'">'.get_comment_author($comment->comment_ID).'</a></div><div class="rc-excerpt">'.convert_smilies(mb_strimwidth(get_comment_text($comment->comment_ID), 0, 28, '...')).'</div></li>';}?>
		
		<?php endif; ?>
	</ul>
</div>
<!-- Recent comments end -->		

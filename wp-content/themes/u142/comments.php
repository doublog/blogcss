<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			echo '<p class="nocomments">必须输入密码，才能查看评论！</p>';
			return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = '';
?>
<?php if (!comments_open()) : ?>
	<div class="messagebox"><?php _e('不好意思，评论已被关闭！'); ?></div>
<?php elseif ( get_option('comment_registration') &&!$user_ID ) : ?>
	<div id="comment_login" class="messagebox">
		<?php 
			if (function_exists('wp_login_url')) {
				$login_link = wp_login_url();
			}else {
				$login_link = get_option('siteurl') .'/wp-login.php?redirect_to='.urlencode(get_permalink());
			}
		?>
		<?php printf(__('You must be <a href="%s">logged in</a> to post a comment.','inove'),$login_link); ?>
	</div>
<?php else : ?>
	<div id="respond" class="clearfix">
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>
		<h3>给我留言</h3>	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="commentform" id="commentform">
			<?php if ($user_ID) : ?>
				<?php
					if (function_exists('wp_logout_url')) {
						$logout_link = wp_logout_url();
					}else {
						$logout_link = get_option('siteurl') .'/wp-login.php?action=logout';
					}
				?>
				<div class="row">
					<?php _e('Logged in as'); ?>
					<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><strong><?php echo $user_identity; ?></strong></a>.
					<a href="<?php echo $logout_link; ?>" title="<?php _e('Log out of this account'); ?>"><?php _e('Logout &raquo;'); ?></a>
				</div>
		
			<?php elseif($comment_author != '') : ?>
				<div id="welcome" class="row"><?php printf('欢迎回来，%s。', $comment_author); ?><a href="javascript:toggleCommentAuthorInfo();" id="toggle_comment_author_info">[ 显示资料 ]</a></div>
			<?php endif; ?>
				
			<div <?php if($comment_author != ''||$user_ID) echo 'id="comment_author_info"'; ?>>
				<div class="row"><input type="text" class="textfield" name="author" id="author" value="<?php echo $comment_author; ?>" size="24" tabindex="1"><label for="author"><?php _e('昵 称');?></label></div>
				<div class="row"><input type="text" class="textfield" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="24" tabindex="2"><label for="email"><?php _e('邮 箱');?><?php if ($req) _e(' [不会被公布出来]'); ?></label></div>
				<div class="row"><input type="text" name="url" id="url" class="textfield" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /><label for="url">网址</label></div>
			</div>
			<div class="wp_smilies"><?php include(TEMPLATEPATH . '/smiley.php'); ?></div>		
			<div class="row"><textarea name="comment" id="comment" cols="95%" rows="8" tabindex="4"></textarea></div>

			<div class="row">
				<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="提交评论" />
				<input class="reset" name="reset" type="reset" id="reset" tabindex="6" value="<?php esc_attr_e( '重写评论' ); ?>" />
				<?php comment_id_fields(); ?>
			</div>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	</div>
	<div class="clearfix"></div>
	<div class="comment clearfix" id="ajaxcomment">
		<?php include(TEMPLATEPATH . '/comment_list.php'); ?>
	</div>
<?php endif; ?>
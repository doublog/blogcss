<?php $options = get_option('Meiwenxinshang_options'); ?>

<!-- #footer start -->
<div id="footer">
	<div class="content">
	<?php if(is_home()&&!is_paged()){ ?>	
		<div id="friendly">
			<span class="item">友情链接：</span>
			<ul class="footer_links">
				<?php
					$bookmarks = get_bookmarks('orderby=rand');
					if ( !empty($bookmarks) ) {
						foreach ($bookmarks as $bookmark) {
							echo '<li><a target="_blank" href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '">' . $bookmark->link_name . '</a></li>';
						}
					}
				?>
			</ul>
		</div>	
    <?php } ?>		
        	<div id="footer-content">
			
                <div id="footer-l">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'before' => ' | ','after' => ' | ', 'depth' => 1 )); ?>
				</div>
                <div id="footer-c">
					<div><?php 
							global $wpdb;
							$post_datetimes = $wpdb->get_row($wpdb->prepare("SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970",""));
							if ($post_datetimes) {
								$firstpost_year = $post_datetimes->firstyear;
								$lastpost_year = $post_datetimes->lastyear;
								$copyright = __('Copyright &copy; ') .$firstpost_year;
							if($firstpost_year != $lastpost_year) {
								$copyright .= '-'.$lastpost_year;
							}
								$copyright .= ' ';
								echo $copyright;
							}
						?>
					<a href="<?php bloginfo('url'); ?>"><em><?php bloginfo('name'); ?></em></a>
					<?php if ( $options['footer_description'] ) { ?>		
						<?php echo $options['footer_description_content']; ?>
					<?php }else{ ?>
						Powered by <a rel="external" href="http://wordpress.org/">WordPress</a>, Theme by <a rel="external" href="http://u142.com/">有意思哦</a> designed by <a rel="external" href="http://u142.com/">U142</a>.
					<?php } ?>
						<?php if ( $options['analytics'] ) { ?>		
						<?php echo $options['analytics_content']; ?>
						<?php } ?>
					</div>
				</div>
            </div>
        </div>
</div>
<!-- #footer end -->
<?php wp_footer(); ?>
<!-- 收藏&顶部 start -->
<div id="favMsg" >
    <a href="javascript:void(0);" onclick="addFav();" class="addfav" title="欢迎收藏本站"><span>收藏</span></a> <a href="javascript:void(0);" onclick="Top();" class="gototop" ><span>回到顶部</span></a>
</div>
<!-- 收藏&顶部 end -->

<!-- 将此代码放在适当的位置，建议在body结束前 -->
<script id="bdlike_shell"></script>
<script>
	var bdShare_config = {
		"type":"small",
		"color":"blue",
		"uid":"<?php echo $options['bdlikebutton_id']; ?>"					
		};
	document.getElementById("bdlike_shell").src="http://bdimg.share.baidu.com/static/js/like_shell.js?t=" + new Date().getHours();
</script>

<!--[if IE 6]>
	<script src="http://letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.mwxs.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comment_ajax_navi.js"></script>
</body>
</html>

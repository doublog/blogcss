<div id="foot">
<div id="cup"><div id="search">
				   <?php include (TEMPLATEPATH . "/searchform.php"); ?>
				   </div></div>
<div id="footbar">


</div>
</div>
<?php wp_footer(); ?>
<div align="center"><font color="red">自从豆博成立以来，已安全运行 <?php echo floor((time()-strtotime("2011-07-11"))/86400); ?>天 ┆ 日志:<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish; ?> ┆ 评论:<?php $total_comments = get_comment_count(); echo $total_comments['approved'];?> ┆ 标签:<?php echo $count_tags = wp_count_terms('post_tag'); ?>. 
<br \>
<a target="_blank" href="http://www.doublog.com/sitemap.html">百度地图</a> ┆ <a target="_blank" href="http://www.doublog.com/sitemap.xml">谷歌地图</a><?php if (get_option('Abook_analytics')!="") {?>
<?php echo stripslashes(get_option('Abook_analytics')); ?>
<?php }?>
</font></div>
<!--[if lte IE 6]>
	<script>var LETSKILLIE6_DELAY=3;</script>
	<script src="http://letskillie6.googlecode.com/svn/trunk/letskillie6.zh_CN.pack.js"></script>
<![endif]-->      
</body>
</html>
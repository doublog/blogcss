<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class u142_sidebar_qmail extends WP_Widget {

	function u142_sidebar_qmail(){

		$widget_ops = array('description' => 'u142-边栏QQ邮件订阅');

		parent::WP_Widget('u142_sidebar_qmail',$name='u142-边栏QQ邮件订阅',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}
	
	//文章随机显示

	function sidebar_qmail($args = ''){

		$default = array();

		$r = wp_parse_args($args,$default);

		extract($r);
?>		

<?php 
	$options = get_option('Meiwenxinshang_options'); 
	if($options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}
?>
<div class="widget">
	<h2>订阅到QQ邮箱</h2>
	<a rel="nofollow" href="http://mail.qq.com/cgi-bin/feed?u=<?php echo $feed; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/side_mailrss.png" alt="QQ邮箱订阅" width="269" height="166" /></a>
</div>


<?php
	}
//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);

		self::sidebar_qmail();

	}

}

//激活小工具
register_widget('u142_sidebar_qmail');
?>
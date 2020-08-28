<?php $options = get_option('Meiwenxinshang_options'); 	
	if($options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}	
	if($options['feed_sina_weibo_url']) {
		if (substr(strtoupper($options['feed_sina_weibo_url']), 0, 7) == 'HTTP://') {
			$feed_sina_weibo_url = $options['feed_sina_weibo_url'];
		} else {
			$feed_sina_weibo_url= 'http://' . $options['feed_sina_weibo_url'];
		}
	}	
	if($options['feed_qq_weibo_url']) {
		if (substr(strtoupper($options['feed_qq_weibo_url']), 0, 7) == 'HTTP://') {
			$feed_qq_weibo_url = $options['feed_qq_weibo_url'];
		} else {
			$feed_qq_weibo_url= 'http://' . $options['feed_qq_weibo_url'];
		}
	}	
	if($options['feed_douban_url']) {
		if (substr(strtoupper($options['feed_douban_url']), 0, 7) == 'HTTP://') {
			$feed_douban_url = $options['feed_douban_url'];
		} else {
			$feed_douban_url = 'http://' . $options['feed_douban_url'];
		}
	}
?>
<!-- #sidebar start -->
<div id="sidebox">
		
<?php 
if(function_exists('dynamic_sidebar')):
if(is_home()){
	dynamic_sidebar('Home边栏');
}elseif(is_category()){
	dynamic_sidebar('Category边栏');
}elseif(is_single()){
	dynamic_sidebar('Single边栏');
}elseif(is_page()){
	dynamic_sidebar('Page边栏');
}else{
	dynamic_sidebar('其他边栏');
}
endif; ?>

</div>
<!-- #sidebar end -->
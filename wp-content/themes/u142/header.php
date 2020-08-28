<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php $options = get_option('Meiwenxinshang_options'); 
	include(TEMPLATEPATH . '/meta.php');
	if($options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}
	if($options['navi_left']) {
		$navi_left = $options['navi_left'];
	} else {
		$navi_left = 4 ;
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="Content-Language" content="zh-CN" />
<title><?php if ( is_single() ||is_page() ||is_category() ||is_tag() ) {if($paged>1){wp_title('-',ture,'right');echo '第';echo $paged;echo '页 - ';bloginfo('description');}else{wp_title('-',ture,'right');bloginfo('description');}}else {bloginfo('name');} ?></title>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="bookmark" href="/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<?php if(is_singular()) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<?php flush(); ?>
</head>

<body>
	<!-- 顶部LOGO -->
	<div id="top">
<?php if(!is_single()&&!is_page()){ ?>
		<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<?php } else { ?>
		<span class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></span>
<?php } ?>
<?php if($options['fubiaoti']){ ?>
		<div id="intro"><?php echo $options['fubiaoti']; ?></div>
<?php } ?>
<?php if ($options['text_ads']) : ?>
		<!-- 搜索框顶部文字广告 -->
		<div class="text_ads">
			<?php echo $options['index_textads_content']; ?>
		</div>
<?php endif; ?>
		<!-- 搜索框 -->
<?php if($options['google_cse'] && $options['google_cse_cx']) : ?>
		<div id="searchbox">
			<form action="<?php bloginfo('home'); ?>/cse" method="get">
				<div class="search_content">
					<input class="textfield" id="searchtxt" type="text" name="q" size="24" />
					<input type="hidden" name="cx" value="<?php echo $options['google_cse_cx']; ?>" />
					<input type="hidden" name="ie" value="UTF-8" />
					<input class="button" id="searchbtn" type="submit" value="" />
				</div>
			</form>
		</div>
<?php else : ?>
		<div id="searchbox">
			<form action="<?php bloginfo('home'); ?>/" id="search" method="get">
				<div class="search_content">
					<input class="textfield" id="searchtxt" type="text" name="s" size="14" value="<?php echo wp_specialchars($s, 1); ?>" />
					<input class="button" id="searchbtn" type="submit" value="" />
				</div>
			</form>
		</div>
<?php endif; ?>

		<!-- 收藏和订阅 -->
		<div id="dingyue"><?php wp_register(); ?><li><?php wp_loginout(); ?></li> +<a href="javascript:void(0);" onClick="addFav();">收藏我们</a> 
			<p>
				<a rel="nofollow" href="<?php echo $feed; ?>" target="_blank">订阅到</a>：<a rel="nofollow" href="http://mail.qq.com/cgi-bin/feed?u=<?php echo $feed; ?>" target="_blank">QQ邮箱</a>
				<a rel="nofollow" href="http://www.xianguo.com/subscribe.php?url=<?php echo $feed; ?>" target="_blank">鲜果</a> 
				<a rel="nofollow" href="http://www.zhuaxia.com/add_channel.php?url=<?php echo $feed; ?>" target="_blank">抓虾</a> 
				<a rel="nofollow" href="http://fusion.google.com/add?feedurl=<?php echo $feed; ?>" target="_blank">谷歌</a> 
				<a rel="nofollow" href="http://reader.youdao.com/b.do?url=<?php echo $feed; ?>" target="_blank">有道</a> 
				<a rel="nofollow"  href="http://9.douban.com/reader/subscribe?url=<?php echo $feed; ?>" target="_blank">豆瓣九点</a>
			</p>
		</div>
	</div>
	<!-- 导航菜单 -->
	<div class="nav">
		<div class="wrap clearfix">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			<script type="text/javascript">
			//<![CDATA[
				$(".nav ul.menu li ul.sub-menu:gt(<?php echo $navi_left; ?>)").css({
				"right" : "-1px",
				"left" : "auto"
				});
			//]]>
			</script>
		</div>
	</div>
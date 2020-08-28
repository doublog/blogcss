<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="zh">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?php WinyTitle(); ?></title>
<?php  
	/* This functions are used for SEO */
	head_desc_and_keywords();
	AbookHeadItem(); 
	AbookCanonical();
?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style_full.css" media="screen and (min-width:1280px) and (min-height: 799px) "/>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.4.4.min.js"></script> 
<script type="text/javascript">
<!--		
!window.jQuery && document.write('<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.4.min.js" type="text/javascript"><\/script>');
//-->
</script>
<?php wp_head();?>
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<!--[if lte IE 6]>
	    <script src="<?php bloginfo('template_url'); ?>/js/DD_belatedPNG.js" type="text/javascript"></script>
	    <script type="text/javascript"> 
        DD_belatedPNG.fix("#container,#next_page_button,#prev_page_button,#mybook .page-left,#mybook  .single-left,#mybook .page-right,#mybook  .single-right"); 
	    </script>
	<![endif]-->  
<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
<![endif]-->
<script type="text/javascript">
var _speedMark = new Date();
</script>
</head>
<body>
		<div id="header">
			<?php if (get_option('Abook_logo') =="TRUE") :  ?>
				<?php if( is_front_page() || is_home() ) { ?>
						<h1 class="hidden"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
						<a id="logoimg" title="<?php bloginfo('description'); ?>" href="<?php bloginfo('url'); ?>/"></a>
					<?php } else { ?>
						<h2 class="hidden"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
							<a id="logoimg" title="<?php bloginfo('description'); ?>" href="<?php bloginfo('url'); ?>/"></a>
					<?php } ?>	
					
				<?php else : ?>	
					<?php if( is_front_page() || is_home() ) { ?>
						<h1 id="logo" class="left"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
					<?php } else { ?>
						<h2 id="logo" class="left"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
					<?php } ?>		
				<?php endif; ?>
		
			
		<div id="feed">	
		<?php if (get_option('Abook_feed')!="") : ?>
		
					<a href="<?php echo get_option('Abook_feed'); ?>" title="<?php bloginfo('name');?> RSS Feed" class="feed" rel="nofollow">feed订阅</a>
				<?php else : ?>	
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php bloginfo('name');?> RSS Feed" class="feed" rel="nofollow">feed订阅</a>
				<?php endif; ?>
		</div>
		<div id="nav">
		<?php if ( function_exists('wp_nav_menu') ):?>
			<?php wp_nav_menu( array( 'show_home' => 'Home','container' => 'globalNavi', 'theme_location' => 'primary') ); ?>	
		<?php else: ?>
			<?php wp_page_menu( array( 'sort_column' => 'menu_order' ) ); ?>
	    <?php endif; ?>
		</div>
			

		</div>
		<div id="loading" class="loading">载入中...</div>
		<div id="container">
		
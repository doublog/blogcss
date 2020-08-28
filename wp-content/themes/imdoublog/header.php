<?php

/**

 * The Header for our theme.

 *

 * Displays all of the <head> section and everything up till <div id="main">

 *

 * @package WordPress

 * @subpackage Twenty_Ten

 * @since Twenty Ten 1.0

 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html <?php language_attributes(); ?>>

<head>

<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

<title><?php

	/*

	 * Print the <title> tag based on what is being viewed.

	 */

	global $page, $paged;



	wp_title( '|', true, 'right' );



	// Add the blog name.

	bloginfo( 'name' );



	// Add the blog description for the home/front page.

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		echo " | $site_description";



	// Add a page number if necessary:

	if ( $paged >= 2 || $page >= 2 )

		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );



	?></title>
<?php
//如果是首页
if (is_home()){
	$keywords = "豆子,豆博,豆子博客,doublog,好记性不如烂笔头,doublog.com";
	$description = "豆博|豆子的私人博客，好记性不如烂笔头";
}
//如果是文章页
elseif (is_single()){
	//默认使用文章页添加关键字
	$keywords = get_post_meta($post->ID, "keywords", true);
	//如果为空，使用标签作为关键字
	if($keywords == ""){
		$tags = wp_get_post_tags($post->ID);
		foreach ($tags as $tag){
			$keywords = $keywords.$tag->name.",";
		}
		//去掉最后一个,
		$keywords = rtrim($keywords, ', ');
	}
	//默认使用文章页添加描述
	$description = get_post_meta($post->ID, "description", true);
	//如果为空，使用文章前100个字作为描述
	if($description == ""){
		if($post->post_excerpt){
			$description = $post->post_excerpt;
		}else{
			$description = mb_strimwidth(strip_tags(apply_filters('the_content',$post->post_content)),0,200);
		}
	}
}
//如果是页面，使用页面添加的关键字和描述
elseif (is_page()){
	$keywords = get_post_meta($post->ID, "keywords", true);
	$description = get_post_meta($post->ID, "description", true);
}
//如果是分类页，使用分类名作为关键字，分类描述作为描述
elseif (is_category()){
	$keywords = single_cat_title('', false);
	$description = category_description();
}
//如果是标签页，使用标签名作为关键字，标签描述作为描述
elseif (is_tag()){
	$keywords = single_tag_title('', false);
	$description = tag_description();
}
//去掉两段空格
$keywords = trim(strip_tags($keywords));
$description = trim(strip_tags($description));
?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script type="text/javascript" src="http://ajax.useso.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/all.js"></script>

<?php if ( is_singular() ){ ?>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/comments-ajax.js"></script>

<?php } ?>

<?php

	/* We add some JavaScript to pages with the comment form

	 * to support sites with threaded comments (when in use).

	 */

	if ( is_singular() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );



	/* Always have wp_head() just before the closing </head>

	 * tag of your theme, or you will break many plugins, which

	 * generally use this hook to add elements to <head> such

	 * as styles, scripts, and meta tags.

	 */

	wp_head();

?>

</head>



<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">

	<div id="header">

		<div id="masthead">

			<div id="branding">

				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>

				<<?php echo $heading_tag; ?> id="site-title">

					<span>

						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

					</span>

				</<?php echo $heading_tag; ?>>

			</div><!-- #branding -->



			<div id="access">

			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>

				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>

				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>

				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

				<div id="rss"><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> <?php _e('Posts RSS feed'); ?>" rel="alternate" type="application/rss+xml"><span>RSS</span></a></div>

			</div><!-- #access -->

		</div><!-- #masthead -->

	</div><!-- #header -->



	<div id="main">


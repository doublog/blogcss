<?php get_header(); ?>
<?php
	$options = get_option('Meiwenxinshang_options');
	$sticky = get_option('sticky_posts');
	$kl_cat = $options['index_cat'];
	$fenlei=explode(",",$kl_cat);
?>

	<div id="container">
		<div id="mainbox">
		
			<?php 
			
			include(TEMPLATEPATH . '/slider.php');
			
			if($options['index_blog']){

			include(TEMPLATEPATH . '/index_blog.php');
			
			} else {
			
				if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('首页cms')){}

			}
			?>
			
			

		</div>
<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
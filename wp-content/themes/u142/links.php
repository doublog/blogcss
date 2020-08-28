<?php
/*
Template Name: 友情链接
*/
?>

<?php get_header(); ?>

<!--#single main start-->	
<div id="container">
    	<div class="content">
			<div id="mainbox">
				<?php include(TEMPLATEPATH . '/toolbar.php'); ?>

				<div class="post-content" id="post-<?php the_ID(); ?>">
		
					<?php $args = array(
							'orderby' => 'rand',
							'categorize' => 0,
							'title_li' => __('Bookmarks'),
							'title_before' => '<h1>',
							'title_after' => '</h1>',
							'category_before' => '',
							'category_after' => '',
							'category_orderby' => 'name',
							'category_order' => 'ASC',
							'show_description' => 1,
							'show_name' => 1,
					); ?>
		
	
					<!-- Links start -->	
					<div class="content-c">			
						<div class="entry ">			
							<?php wp_list_bookmarks($args); ?>	
						</div>
					</div>		
					<!-- Links end -->
				</div>
			</div>
			
			<?php get_sidebar(); ?>	
			
		</div>
</div>

<?php get_footer(); ?>
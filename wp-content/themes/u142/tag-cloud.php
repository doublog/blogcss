<?php
/*
Template Name: 标签云
*/
?>

<?php get_header(); ?>

<!--#single main start-->	
<div id="container">
    	<div class="content">
			<div id="mainbox">
				<?php include(TEMPLATEPATH . '/toolbar.php'); ?>

				<div class="post-content" id="post-<?php the_ID(); ?>">
					<h1 class="post-title">标签云</h1>
						<div class="entry clear" id="tag-cloud">
							<?php wp_tag_cloud('smallest=9&largest=25&number=0&order=RAND'); ?>
						</div>						
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	
</div>

<?php get_footer(); ?>
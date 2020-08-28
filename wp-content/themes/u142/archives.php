<?php
/*
Template Name: 文章归档
*/
?>

<?php get_header(); ?>

<!--#single main start-->	
<div id="container">
    	<div class="content">
			<div id="mainbox">
				<?php include(TEMPLATEPATH . '/toolbar.php'); ?>

				<div class="post-content" id="post-<?php the_ID(); ?>">
					<h1><?php the_title(); ?></h1>
						<div class="content-c">	
							<?php mwxs_archives_list(); ?>
						</div>						
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	
</div>

<?php get_footer(); ?>
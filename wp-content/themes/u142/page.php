<?php get_header(); ?>
<?php $options = get_option('Meiwenxinshang_options'); ?>

<!--#single main start-->	
<div id="container">
    	<div class="content">
			<div id="mainbox">
			<?php include(TEMPLATEPATH . '/toolbar.php'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-content" id="post-<?php the_ID(); ?>" >
					<h1><?php the_title(); ?></h1>
					<div class="entry-info" style="width:650px;">文章发布于&nbsp;<?php the_time(__('Y年n月j日','meiwenxinshang')) ?>,&nbsp;共<a href="<?php the_permalink(); ?>">&nbsp;<?php comments_popup_link(__('0', 'meiwenxinshang'), __('1', 'meiwenxinshang'), __('%', 'meiwenxinshang'));?>&nbsp;次评论,</a>&nbsp;<?php echo getPostViews(get_the_ID()); ?>&nbsp;次浏览.<?php edit_post_link(__('Edit','inove'),'<span class="editpost">','</span>'); ?></div>
			
				<div class="content-c">									
					<?php the_content(); ?>
				
			
				<p>欢迎转载，请注明转自：<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><br>
				本文链接: <a href="<?php the_permalink(); ?>" rel="bookmark" ><?php the_title(); ?></a>
				</p>
				<!-- Baidu Button BEGIN -->

				<!-- Baidu Button END -->
				</div>
 			
				<?php comments_template(); ?>
				
				<?php setPostViews(get_the_ID());?>	<!-- postviews not plugin -->
				
			<?php endwhile; endif; wp_reset_query();?>
			</div>	 
					
		</div>
		<?php get_sidebar(); ?>
		
	</div>
	
	
</div>
<!-- #single main end-->


	
	

<?php get_footer(); ?>
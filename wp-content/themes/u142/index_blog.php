			<div class="post-c">
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$sticky = get_option( 'sticky_posts' );
$args = array(
	'ignore_sticky_posts' => 1,//忽略sticky_posts，不置顶，但是输出置顶文章					
	'post__not_in' => $sticky,//排除置顶文章，不输出
	'paged' => $paged,
	);
$query = new WP_Query( $args );
if($query->have_posts()) : $i=0; while ($query->have_posts()) :  $i++; $query->the_post(); update_post_caches($posts); ?>				
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="post-img">
						<a href="<?php echo the_permalink(); ?>" rel="bookmark">
							<img src="<?php if ( get_post_meta($post->ID, 'featured', true) ) {echo get_post_meta($post->ID, 'featured', true);}elseif ( has_post_thumbnail() ){$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured-thumbnail'); echo $featured_image_url[0]; }else{ echo catch_first_image(); }?>" alt="<?php the_title(); ?>" width="200px" height="134px"/>
						</a>
					</div>
		<div class="post-right">
                    <div class="post-txt">
                        <div class="post-t-l">
                            <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="titlelink"><?php the_title(); ?></a></h2>
						</div>
                    </div>
					<div class="entry-info"><span><?php the_time(__('Y年n月j日','meiwenxinshang')) ?>,&nbsp;来自&nbsp;<?php the_category(', '); ?>&nbsp;,&nbsp;文章共&nbsp;&nbsp;<?php comments_popup_link(__('0', 'meiwenxinshang'), __('1', 'meiwenxinshang'), __('%', 'meiwenxinshang'));?>&nbsp;&nbsp;次评论,&nbsp;&nbsp;<?php echo getPostViews(get_the_ID()); ?>&nbsp;&nbsp;次浏览</span><?php edit_post_link(__('Edit','inove'),'<span class="editpost">','</span>'); ?></div>
					<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 170,"……"); ?></p>	
					<div class="entry-info2">
						<div class="cat-readmore"><a rel="nofollow" href="<?php the_permalink(); ?>" class="tag-<?php echo rand(1,5); ?>">阅读更多</a></div>
						<div class="cat-tag"><span class="tag_icon">标签：</span>
							<ul class="tag">
								<?php 
									$tags = get_the_tags(); 
									if(!empty($tags)){
										foreach($tags as $tag) 
										echo '<li class="tag-'.rand(1, 5).'"><a href="'.get_tag_link($tag -> term_id).'">'.$tag -> name.'</a></li>';
									}else{
									echo '<span>无</span>';
									}		
								?>
							</ul>
						</div>
					</div>
				</div>
				</div>

				<?php include('indexad.php'); ?>
							
			<?php endwhile; else : ?>
				<div class="post">
					<p><?php _e('不好意思，没找到相关文章，请重新再搜搜！...','meiwenxinshang'); ?></p>
						<?php if ($options['single_post_ad1']) : ?>
							<div style="text-align:center;width:680px;margin-top:30px;">
								<?php echo($options['single_post_ad1_content']); ?>
							</div>
						<?php endif; ?>
				</div>
			<?php endif; wp_reset_query(); ?>

			</div>
			
			<div class="clear"></div>
	
			<!-- .pagenavi -->
			<?php if(have_posts()) : ?>
				<div id="page">
                	<div class='wp-pagenavi'>
						<?php par_pagenavi(9); ?>
					</div>	
				</div>		
			<?php endif; ?>			
			
			
			<?php if ($options['index_ad3']) : ?>
				<div style="text-align:center;width:680px;">
					<?php echo($options['index_ad3_content']); ?>
				</div>
			<?php endif; ?>
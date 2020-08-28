<?php if ($options['slide']&&is_sticky()) : ?>	
			<div class="focus">
				<div id="focus_img">
					<div class="nbox">
					<?php 
						$args_huandeng_post=array(
						'post__in' => get_option('sticky_posts'),
						'showposts' => 5,  // 显示篇数
						);
						$huandeng_post_query = new WP_Query($args_huandeng_post);
						if ($huandeng_post_query->have_posts()) : $i=0; while ($huandeng_post_query->have_posts()) : $i++; $huandeng_post_query->the_post();
					?>						
						<div class="focus_box">
							<div class="pbox">
								<a href="<?php the_permalink() ?>">
									<img src="<?php if ( get_post_meta($post->ID, 'featured', true) ) {echo get_post_meta($post->ID, 'featured', true);}elseif ( has_post_thumbnail() ){$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured-thumbnail'); echo $featured_image_url[0]; }else{ echo catch_first_image(); }?>" alt="<?php the_title(); ?>" width="300px" height="200px" />
								</a>							
							</div>
							<div class="descs">
								<a href="<?php the_permalink() ?>" class="t"><?php the_title(); ?></a>
								<p class="intro">
									<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 160,"……"); ?><br>
									<span class="fgrey">(<?php echo getPostViews(get_the_ID()); ?>人喜欢)</span>
								</p>
								<p class="rmd_read">来自栏目：<?php the_category(', '); ?> 的推荐<br/></p>
							</div>
						</div>
				<?php endwhile; endif; wp_reset_query();?>

				</div>
			</div>
		<?php if($i>0) { ?>

			<div id="focus_links">
				<ul>
				<?php for($n=0;$n<$i;$n++) { ?>
					
					<li <?php if($n==0){ ?>class="act"<?php } ?>><a href="javascript:void(0)"></a></li>
				<?php } ?>

				</ul>
			</div>
		<?php } ?>

		</div>
<?php endif; ?>
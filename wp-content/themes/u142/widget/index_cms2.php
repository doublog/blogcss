<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class u142_index_cms2 extends WP_Widget {

	function u142_index_cms2(){

		$widget_ops = array('description' => '首页CMS栏目二');

		parent::WP_Widget('u142_index_cms2',$name='u142-首页CMS栏目二',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}

	//小工具的选项设置表单

	function form($instance){

		//cat:分类目录ID

		$instance = wp_parse_args((array)$instance,array('cat'=>1));//默认值
		
		$cat = htmlspecialchars($instance['cat']);
			
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('cat').'">分类ID:<input style="width:200px" id="'.$this->get_field_id('cat').'" name="'.$this->get_field_name('cat').'" type="text" value="'.$cat.'" /></label></p>';


	}

	//更新保存 小工具表单数据

	function update($new_instance,$old_instance){

		$instance = $old_instance;
		
		$instance['cat'] = strip_tags(stripslashes($new_instance['cat']));

		return $instance;

	}

	//首页CMS栏目二

	function index_cms2_posts($args = ''){

		$default = array('cat'=>1);

		$r = wp_parse_args($args,$default);

		extract($r);
		
?>
		
		<div class="psy_part" id="id_yinyue_part">
			<div class="psy_title">
				<span class="fgreen"><a href="<?php echo get_category_link($cat); ?>"><?php echo get_cat_name($cat); ?></a></span>
				<div class="roll">
					<a href="javascript:void(0)" class="arrow" title="后退"></a>
					<span class="act"></span><span></span>
					<a href="javascript:void(0)" class="arrow aright ract" title="前进"></a>
				</div>
			</div>
			<div class="roll_box">
				<div class="hbox">
					<div class="psy_fm">
						<?php
							$args=array(
								'cat' => $cat,   // 分类ID
								'post__not_in' => $sticky,
								'posts_per_page' => 8,  // 显示篇数
							);
							query_posts($args);
							if(have_posts()) : $j=0; while (have_posts()) : $j++; the_post(); update_post_caches($posts);
						?>
					<?php if($j>1&&$j!=5) { ?>
						<?php if($j==2||$j==6) { ?>

						<div class="fm_list"> 
							<dl>
						<?php } ?>
						
								<dd>
									<p class="pbox">
										<a href="<?php the_permalink(); ?>">
											<img src="<?php if ( get_post_meta(get_the_ID(), 'thumbnail1', true) ) {echo get_post_meta(get_the_ID(), 'thumbnail1', true);}elseif ( has_post_thumbnail() ){$thumbnail1_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail1'); echo $thumbnail1_url[0]; }else{ echo catch_first_image(); }?>" alt="<?php the_title(); ?>" width="50px" height="50px" />
										</a>
									</p>
									<p class="descs">
										<a href="<?php the_permalink(); ?>" class="fa"><?php the_title(); ?></a>
										<span class="fgrey"><?php echo getPostViews(get_the_ID()); ?> 人喜欢</span>
										<span class="more"><a rel="nofollow" href="<?php the_permalink(); ?>">收听</a><span class="listen"></span></span>
									</p>
								</dd>
					<?php } else { ?>
						<?php if($j==5){ ?>

							</dl>
						</div> 
					</div>
					<div class="psy_fm">
						<?php } ?>
						
						<div class="fbox">
							<p class="pbox">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php if ( get_post_meta(get_the_ID(), 'thumbnail1', true) ) {echo get_post_meta(get_the_ID(), 'thumbnail1', true);}elseif ( has_post_thumbnail() ){$thumbnail1_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail1'); echo $thumbnail1_url[0]; }else{ echo catch_first_image(); }?>" alt="<?php the_title(); ?>" width="195px" height="195px" />
								</a>
							</p>
							<p>
								<a href="<?php the_permalink(); ?>" class="fa"><?php the_title(); ?></a>
								<span class="fgrey"><?php echo getPostViews(get_the_ID()); ?> 人喜欢</span>
								<span><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', get_the_content())), 0, 80,"……"); ?></span>
								<br>
								<span class="listen"></span><a rel="nofollow" href="<?php the_permalink(); ?>">立即收听</a>
							</p>
						</div>
					<?php } ?>
			<?php endwhile; ?>
			<?php if($j>1&&$j!=5){ ?>

							</dl>
						</div> 
			<?php }?>
			<?php endif; wp_reset_query();?>

					</div>
				</div>
			</div>
		</div>

<?php		
	}
	
		//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);

		$cat = empty($instance['cat']) ? 1 : $instance['cat'];

		self::index_cms2_posts("cat=$cat");

	}

}

//激活小工具
register_widget('u142_index_cms2');
?>
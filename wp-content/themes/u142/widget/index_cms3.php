<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class u142_index_cms3 extends WP_Widget {

	function u142_index_cms3(){

		$widget_ops = array('description' => '首页CMS栏目三');

		parent::WP_Widget('u142_index_cms3',$name='u142-首页CMS栏目三',$widget_ops);

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

	//首页CMS栏目三

	function index_cms3_posts($args = ''){

		$default = array('cat'=>1);

		$r = wp_parse_args($args,$default);

		extract($r);
		
?>
		
			<div class="psy_part" id="id_meinv_part">
				<div class="psy_title">
					<span class="fgreen"><a href="<?php echo get_category_link($cat); ?>" ><?php echo get_cat_name($cat); ?></a></span>
					<div class="roll">
						<a href="javascript:void(0)" class="arrow" title="后退"></a>
						<span class="act"></span><span class=""></span>
						<a href="javascript:void(0)" class="arrow aright ract" title="前进"></a>
					</div>
				</div>
				<div class="roll_box">
					<div class="hbox">
						<div class="psy_fashion">
							<?php
								$args=array(
									'cat' => $cat,   // 分类ID
									'post__not_in' => $sticky,
									'posts_per_page' => 14,  // 显示篇数
								);
								query_posts($args);
								if(have_posts()) : $j=0; while (have_posts()) : $j++; the_post(); update_post_caches($posts);
							?>
					<?php if($j>1&&$j!=8) { ?>
						<?php if($j==2||$j==9) { ?>

							<ul class="img_ul">
						<?php } ?>

								<li>
									<p class="pbox">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="nofollow">
											<img src="<?php if ( get_post_meta(get_the_ID(), 'thumbnail2', true) ) {echo get_post_meta(get_the_ID(), 'thumbnail2', true);}elseif ( has_post_thumbnail() ){$thumbnail2_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail2'); echo $thumbnail2_url[0]; }else{ echo catch_first_image(); }?>" alt="<?php the_title(); ?>" width="125px" height="160px" />
										</a>
									</p>
									<span><a href="<?php the_permalink(); ?>" class="fa"><?php the_title(); ?></a></span>
								</li>
				<?php } else { ?>
					<?php if($j==8){ ?>

							</ul>
						</div>
						<div class="psy_fashion">
					<?php } ?>

						<div class="good">
							<p class="pbox">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="nofollow">
									<img src="<?php if ( get_post_meta(get_the_ID(), 'thumbnail2', true) ) {echo get_post_meta(get_the_ID(), 'thumbnail2', true);}elseif ( has_post_thumbnail() ){$thumbnail2_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail2'); echo $thumbnail2_url[0]; }else{ echo catch_first_image(); }?>" alt="<?php the_title(); ?>" width="275px" height="350px" />
								</a>
							</p>
							<span><a href="<?php the_permalink(); ?>" class="fa"><?php the_title(); ?></a></span>
						</div>
				<?php } ?>
						<?php endwhile; ?>
				<?php if($j>1&&$j!=8){ ?>
				
							</ul>
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

		self::index_cms3_posts("cat=$cat");

	}

}

//激活小工具
register_widget('u142_index_cms3');
?>
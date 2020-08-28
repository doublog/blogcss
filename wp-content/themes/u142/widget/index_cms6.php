<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class u142_index_cms6 extends WP_Widget {

	function u142_index_cms6(){

		$widget_ops = array('description' => '首页CMS栏目六');

		parent::WP_Widget('u142_index_cms6',$name='u142-首页CMS栏目六',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}

	//小工具的选项设置表单

	function form($instance){

		//cat:分类目录ID

		$instance = wp_parse_args((array)$instance,array('cat'=>'1,1'));//默认值
		
		$cat = htmlspecialchars($instance['cat']);
			
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('cat').'">分类ID:<input style="width:200px" id="'.$this->get_field_id('cat').'" name="'.$this->get_field_name('cat').'" type="text" value="'.$cat.'" /></label></p>';


	}

	//更新保存 小工具表单数据

	function update($new_instance,$old_instance){

		$instance = $old_instance;
		
		$instance['cat'] = strip_tags(stripslashes($new_instance['cat']));

		return $instance;

	}

	//首页CMS栏目五

	function index_cms6_posts($args = ''){

		$default = array('cat'=>'1,1');

		$r = wp_parse_args($args,$default);

		extract($r);
		
		$cat = preg_replace("`'`", "", $cat);		
		
		$cms6_fenlei=explode(",",$cat);		
		
?>
		
			<?php for($i=0;$i<2;$i++) { ?>

			<div class="psy_part" <?php if($i==0) { ?>id="id_duanpian_part"<?php }elseif($i==1){ ?>id="id_youqu_part"<?php } ?>>
				<div class="psy_title">
					<span class="fgreen"><a href="<?php echo get_category_link($cms6_fenlei[$i]); ?>"><?php echo get_cat_name($cms6_fenlei[$i]); ?></a></span>
					<div class="roll">
						<a href="javascript:void(0)" class="arrow" title="后退"></a>
						<span class="act"></span><span></span>
						<a href="javascript:void(0)" class="arrow aright ract" title="前进"></a>
					</div>
				</div>
				<div class="roll_box">
					<div class="hbox">		
						<div class="psy_test">
							<dl>
							<?php
								$args=array(
									'cat' => $cms6_fenlei[$i],   // 分类ID
									'post__not_in' => $sticky,
									'posts_per_page' => 8,  // 显示篇数
								);
								query_posts($args);
								if(have_posts()) : $j=0; while (have_posts()) : $j++; the_post(); update_post_caches($posts);
							?>
							<?php if($j==5){ ?>

							</dl>
						</div>
						<div class="psy_test">
							<dl>
							<?php } ?>

								<dd>
									<a href="<?php the_permalink(); ?>" class="index_cms5">
										<img src="<?php if ( get_post_meta(get_the_ID(), 'featured', true) ) {echo get_post_meta(get_the_ID(), 'featured', true);}elseif ( has_post_thumbnail() ){$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured-thumbnail'); echo $featured_image_url[0]; }else{ echo catch_first_image(); }?>" alt="<?php the_title(); ?>" width="155px" height="100px" />
									</a>
									<a href="<?php the_permalink(); ?>" class="nlink" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</dd>
							<?php endwhile; endif; wp_reset_query();?>

							</dl>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>

<?php		
	}
	
		//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);

		$cat = apply_filters('cat', empty($instance['cat']) ? __('1,1','u142') : $instance['cat']);//首页CMS第五栏分类

		self::index_cms6_posts("cat=$cat");

	}

}

//激活小工具
register_widget('u142_index_cms6');
?>
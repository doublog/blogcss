<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class u142_latest_post_list extends WP_Widget {

	function u142_latest_post_list(){

		$widget_ops = array('description' => '非首页最新文章列表');

		parent::WP_Widget('u142_latest_post_list',$name='u142-非首页最新文章',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}

	//小工具的选项设置表单

	function form($instance){

		//title:模块标题，title_en:英文标题，showPosts:显示文章数量，cat:分类目录ID

		$instance = wp_parse_args((array)$instance,array('title'=>'最新文章','showPosts'=>5));//默认值
		
		$title = htmlspecialchars($instance['title']);

		$showPosts = htmlspecialchars($instance['showPosts']);
		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('title').'">标题:<input style="width:200px;" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" /></label></p>';

		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('showPosts').'">文章数量:<input style="width:200px;" id="'.$this->get_field_id('showPosts').'" name="'.$this->get_field_name('showPosts').'" type="text" value="'.$showPosts.'" /></label></p>';


	}

	//更新保存 小工具表单数据

	function update($new_instance,$old_instance){

		$instance = $old_instance;
		
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		
		$instance['showPosts'] = strip_tags(stripslashes($new_instance['showPosts']));


		return $instance;

	}

	
	//文章随机显示

	function the_latest_posts($args = ''){

		$default = array('showPosts'=>5);

		$r = wp_parse_args($args,$default);

		extract($r);		
		
		$args_post = array(
				'orderby' => date, 
				'showposts' => $showPosts, // 显示篇数
				'ignore_sticky_posts' => 1,
			);	

		$latest_post_query = new WP_Query($args_post);

		if($latest_post_query->have_posts()){		

			echo '<div id="tb-post" class="clearfix"><ul>';

			while($latest_post_query->have_posts()){				

				$latest_post_query->the_post();
				
				$loading_images = get_bloginfo ( 'stylesheet_directory' )."/images/loading8.gif";
				
				if ( get_post_meta(get_the_ID(), 'featured', true) ) {
				$images = get_post_meta(get_the_ID(), 'featured', true);
				}elseif ( has_post_thumbnail() ){
				$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'featured-thumbnail'); 
				$images = $featured_image_url[0]; 
				}else{
				$images = catch_first_image();
				}
				
				$images = '<img src="'.$images.'" alt="'.get_the_title().'" width="90" height="60">';

				echo '<li><div class="pbox"><a href="'.get_permalink().'" title="'.get_the_title().'">'.$images.'</a></div><div class="tinfo"><a href="'.get_permalink().'">'.get_the_title().'</a><span class="desc">'.getPostViews(get_the_ID()).'人喜欢</span></div></li>';
								
			}

			echo '</ul></div>';

		}
		
		wp_reset_query();

	}

	//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('最新文章','u142') : $instance['title']);//小工具前台标题
		
		$showPosts = empty($instance['showPosts']) ? 5 : $instance['showPosts'];
		
		echo $before_widget;

		if( $title ) echo $before_title . $title . $after_title;

		self::the_latest_posts("showPosts=$showPosts");

		echo $after_widget;

	}

}

//激活小工具
register_widget('u142_latest_post_list');
?>
<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class u142_sidebar_ad125 extends WP_Widget {

	function u142_sidebar_ad125(){

		$widget_ops = array('description' => 'u142-边栏广告(125*125)');

		parent::WP_Widget('u142_sidebar_ad125',$name='u142-边栏广告(125*125)',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}

	//小工具的选项设置表单

	function form($instance){

		//title:模块标题，title_en:英文标题，showPosts:显示文章数量，cat:分类目录ID

		$instance = wp_parse_args((array)$instance,array('title'=>'赞助商'));//默认值
		
		$title = htmlspecialchars($instance['title']);
		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('title').'">标题:<input style="width:200px;" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" /></label></p>';

	}

	//更新保存 小工具表单数据

	function update($new_instance,$old_instance){

		$instance = $old_instance;
		
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));

		return $instance;

	}

	//文章随机显示

	function sidebar_ad125($args = ''){

		$default = array();

		$r = wp_parse_args($args,$default);

		extract($r);

		$options = get_option('Meiwenxinshang_options');
		
		if ($options['sidebar_ad125']) : ?>
					
			<div class="ad125">
				<ul>
				<?php 
					$no_ad = '<li><a href="/"><img src="'.get_template_directory_uri().'/ad/ad125.png" alt="no_ad" width="125" height="125"/></a></li>';
					$ads = array();
					if($options['sidebar_ad125_content1'] !='') $ads[] = $options['sidebar_ad125_content1'];
					if($options['sidebar_ad125_content2'] !='') $ads[] = $options['sidebar_ad125_content2'];
					if($options['sidebar_ad125_content3'] !='') $ads[] = $options['sidebar_ad125_content3'];
					if($options['sidebar_ad125_content4'] !='') $ads[] = $options['sidebar_ad125_content4'];
					if($options['sidebar_ad125_content5'] !='') $ads[] = $options['sidebar_ad125_content5'];
					if($options['sidebar_ad125_content6'] !='') $ads[] = $options['sidebar_ad125_content6'];
					if($options['sidebar_ad125_content7'] !='') $ads[] = $options['sidebar_ad125_content7'];
					if($options['sidebar_ad125_content8'] !='') $ads[] = $options['sidebar_ad125_content8'];
					shuffle($ads);
					foreach ($ads as $ad){
						$html .= "<li>".$ad ."</li>\n";
					}
					for ($i = 1;$i <= 8-count($ads);$i++){$html .= $no_ad;}
					echo $html;
				?>
				</ul>
			</div>
<?php

		endif;

	}
//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);
		
		$options = get_option('Meiwenxinshang_options');		
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('赞助商','u142') : $instance['title']);//小工具前台标题
	
		if($options['sidebar_ad125']){
	
		echo $before_widget;

		if( $title ) echo $before_title . $title . $after_title;

		self::sidebar_ad125();

		echo $after_widget;
		
		}

	}

}

//激活小工具
register_widget('u142_sidebar_ad125');
?>

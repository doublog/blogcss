<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class u142_sidebar_contact extends WP_Widget {

	function u142_sidebar_contact(){

		$widget_ops = array('description' => 'u142-边栏联系方式');

		parent::WP_Widget('u142_sidebar_contact',$name='u142-边栏联系方式',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}

	//小工具的选项设置表单

	function form($instance){

		//title:模块标题，qq_number:QQ号码，sina_weibo_url:新浪微博，cat:分类目录ID

		$instance = wp_parse_args((array)$instance,array('title'=>'联系我们','qq_number'=>'','sina_weibo_url'=>'','tx_weibo_url'=>'','douban_weibo_url'=>''));//默认值
		
		$title = htmlspecialchars($instance['title']);

		$qq_number = htmlspecialchars($instance['qq_number']);
		
		$sina_weibo_url = htmlspecialchars($instance['sina_weibo_url']);
		
		$tx_weibo_url = htmlspecialchars($instance['tx_weibo_url']);
		
		$douban_weibo_url = htmlspecialchars($instance['douban_weibo_url']);
		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('title').'">标题:<input style="width:200px;" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" /></label></p>';

		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('qq_number').'">QQ号码:<input style="width:200px;" id="'.$this->get_field_id('qq_number').'" name="'.$this->get_field_name('qq_number').'" type="text" value="'.$qq_number.'" /></label></p>';
		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('sina_weibo_url').'">新浪微博链接:<input style="width:200px;" id="'.$this->get_field_id('sina_weibo_url').'" name="'.$this->get_field_name('sina_weibo_url').'" type="text" value="'.$sina_weibo_url.'" /></label></p>';
		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('tx_weibo_url').'">腾讯微博链接:<input style="width:200px;" id="'.$this->get_field_id('tx_weibo_url').'" name="'.$this->get_field_name('tx_weibo_url').'" type="text" value="'.$tx_weibo_url.'" /></label></p>';
		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('douban_weibo_url').'">豆瓣微博链接:<input style="width:200px;" id="'.$this->get_field_id('douban_weibo_url').'" name="'.$this->get_field_name('douban_weibo_url').'" type="text" value="'.$douban_weibo_url.'" /></label></p>';

	}
	
	//更新保存 小工具表单数据

	function update($new_instance,$old_instance){

		$instance = $old_instance;
		
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		
		$instance['qq_number'] = strip_tags(stripslashes($new_instance['qq_number']));
		
		$instance['sina_weibo_url'] = strip_tags(stripslashes($new_instance['sina_weibo_url']));
		
		$instance['tx_weibo_url'] = strip_tags(stripslashes($new_instance['tx_weibo_url']));
		
		$instance['douban_weibo_url'] = strip_tags(stripslashes($new_instance['douban_weibo_url']));

		return $instance;

	}

	//文章随机显示

	function sidebar_contact_us($args = ''){

		$default = array();

		$r = wp_parse_args($args,$default);

		extract($r);
?>		

	<div class="contact">

		<p><span>广告投放及合作：</span><a rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq_number; ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $qq_number; ?>:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a></p>

		<p>官方微博及其他：</p>
		<p>
			<a rel="nofollow" target="_blank" href="<?php echo $sina_weibo_url; ?>">新浪微博</a> ┊ <a rel="nofollow" target="_blank" href="<?php echo $tx_weibo_url; ?>">腾讯微博</a> ┊ <a rel="nofollow" target="_blank" href="<?php echo $douban_weibo_url; ?>">豆瓣</a>
		</p>
	</div>


<?php
	}
//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('联系我们','u142') : $instance['title']);//小工具前台标题
		
		$qq_number = empty($instance['qq_number']) ? '' : $instance['qq_number'];
		
		$sina_weibo_url = empty($instance['sina_weibo_url']) ? '' : $instance['sina_weibo_url'];
		
		$tx_weibo_url = empty($instance['tx_weibo_url']) ? '' : $instance['tx_weibo_url'];
		
		$douban_weibo_url = empty($instance['douban_weibo_url']) ? '' : $instance['douban_weibo_url'];
	
		echo $before_widget;

		if( $title ) echo $before_title . $title . $after_title;

		self::sidebar_contact_us("qq_number=$qq_number&sina_weibo_url=$sina_weibo_url&tx_weibo_url=$tx_weibo_url&douban_weibo_url=$douban_weibo_url");

		echo $after_widget;

	}

}

//激活小工具
register_widget('u142_sidebar_contact');
?>
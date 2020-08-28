<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class u142_sidebar_bdshare extends WP_Widget {

	function u142_sidebar_bdshare(){

		$widget_ops = array('description' => 'u142-边栏百度分享');

		parent::WP_Widget('u142_sidebar_bdshare',$name='u142-边栏百度分享',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}
	
	//文章随机显示

	function sidebar_bdshare($args = ''){

		$default = array();

		$r = wp_parse_args($args,$default);

		extract($r);
?>	
<?php $options = get_option('Meiwenxinshang_options'); ?>
<div class="widget">
	<div style="width:275px;height:43px;">
		<!-- Baidu Button BEGIN -->
		<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
			<a class="bds_qzone"></a>
			<a class="bds_tsina"></a>
			<a class="bds_tqq"></a>
			<a class="bds_renren"></a>
			<span class="bds_more"></span>
			<a class="shareCount"></a>
		</div>
		<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=<?php echo $options['bdlikebutton_id']; ?>" ></script>
		<script type="text/javascript" id="bdshell_js"></script>
		<script type="text/javascript">
			document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
		</script>
		<!-- Baidu Button END -->
	</div>
</div>
<?php
	}
//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);

		self::sidebar_bdshare();

	}

}

//激活小工具
register_widget('u142_sidebar_bdshare');
?>
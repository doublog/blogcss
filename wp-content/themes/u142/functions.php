<?php
class MeiwenxinshangOptions {
	function getOptions() {
		$options = get_option('Meiwenxinshang_options');
		if (!is_array($options)) {
			$options['keywords'] = '';
			$options['description'] = '';
			$options['google_cse'] = false;
			$options['google_cse_cx'] = '';
			$options['index_blog'] = false;	
			$options['bdlikebutton'] = false;
			$options['bdlikebutton_id'] = '';
			$options['qq_weibo_share_button'] = false;
			$options['qq_weibo_id'] = '';
			$options['sina_weibo_share_button'] = false;
			$options['sina_weibo_id'] = '';
			$options['g-plusone_button'] = false;			
			$options['slide'] = false;
			$options['navi_left'] = '';
			$options['about_me'] = false;
			$options['about_me_content'] = '';
			$options['fubiaoti'] = '';
			$options['footer_description'] = false;
			$options['footer_description_content'] = '';
			$options['analytics'] = false;
			$options['analytics_content'] = '';
			$options['text_ads'] = false;
			$options['index_textads_content'] = '';
			$options['index_cms_ad1'] = false;	
			$options['index_cms_ad11_content'] = '';
			$options['index_cms_ad12_content'] = '';
			$options['index_cms_ad2'] = false;	
			$options['index_cms_ad21_content'] = '';
			$options['index_cms_ad22_content'] = '';
			$options['index_ad1'] = false;
			$options['index_ad1_post_number'] = '';			
			$options['index_ad1_content'] = '';
			$options['index_ad2'] = false;
			$options['index_ad2_post_number'] = '';	
			$options['index_ad2_content'] = '';
			$options['index_ad3'] = false;
			$options['index_ad3_content'] = '';
			$options['single_post_ad1'] = false;
			$options['single_post_ad1_content'] = '';
			$options['sidebar_ad125'] = false;
			$options['sidebar_ad125_content1'] = '';
			$options['sidebar_ad125_content2'] = '';
			$options['sidebar_ad125_content3'] = '';
			$options['sidebar_ad125_content4'] = '';
			$options['sidebar_ad125_content5'] = '';
			$options['sidebar_ad125_content6'] = '';
			$options['sidebar_ad125_content7'] = '';
			$options['sidebar_ad125_content8'] = '';
			$options['sidebar_ad250'] = false;
			$options['sidebar_ad250_content'] = '';
			$options['feed_url'] = '';
			update_option('Meiwenxinshang_options', $options);
		}
		return $options;
	}
	function add() {
		if(isset($_POST['Meiwenxinshang_save'])) {
			$options = MeiwenxinshangOptions::getOptions();
			// 关键词
			$options['keywords'] = stripslashes($_POST['keywords']);
			// 网站描述
			$options['description'] = stripslashes($_POST['description']);
			// 顶部副标题
			$options['fubiaoti'] = stripslashes($_POST['fubiaoti']);
			// 谷歌自定义搜索
			if ($_POST['google_cse']) {
				$options['google_cse'] = (bool)true;
			}else {
				$options['google_cse'] = (bool)false;
			}
			$options['google_cse_cx'] = stripslashes($_POST['google_cse_cx']);
			// 切换首页为博客模式
			if ($_POST['index_blog']) {
				$options['index_blog'] = (bool)true;
			}else {
				$options['index_blog'] = (bool)false;
			}
			// 百度喜欢按钮
			if ($_POST['bdlikebutton']) {
				$options['bdlikebutton'] = (bool)true;
			}else {
				$options['bdlikebutton'] = (bool)false;
			}
			$options['bdlikebutton_id'] = stripslashes($_POST['bdlikebutton_id']);
			// QQ微博按钮
			if ($_POST['qq_weibo_share_button']) {
				$options['qq_weibo_share_button'] = (bool)true;
			}else {
				$options['qq_weibo_share_button'] = (bool)false;
			}
			$options['qq_weibo_id'] = stripslashes($_POST['qq_weibo_id']);
			// 新浪微博按钮
			if ($_POST['sina_weibo_share_button']) {
				$options['sina_weibo_share_button'] = (bool)true;
			}else {
				$options['sina_weibo_share_button'] = (bool)false;
			}
			$options['sina_weibo_id'] = stripslashes($_POST['sina_weibo_id']);
			// 谷歌+1
			if ($_POST['g-plusone_button']) {
				$options['g-plusone_button'] = (bool)true;
			}else {
				$options['g-plusone_button'] = (bool)false;
			}
			// 首页幻灯
			if ($_POST['slide']) {
				$options['slide'] = (bool)true;
			}else {
				$options['slide'] = (bool)false;
			}
			// 导航向左
			$options['navi_left'] = stripslashes($_POST['navi_left']);
			// about me
			if ($_POST['about_me']) {
				$options['about_me'] = (bool)true;
			} else {
				$options['about_me'] = (bool)false;
			}
			$options['about_me_content'] = stripslashes($_POST['about_me_content']);
			// 网站底部描述
			if ($_POST['footer_description']) {
				$options['footer_description'] = (bool)true;
			} else {
				$options['footer_description'] = (bool)false;
			}
			$options['footer_description_content'] = stripslashes($_POST['footer_description_content']);
			// 统计分析
			if ($_POST['analytics']) {
				$options['analytics'] = (bool)true;
			} else {
				$options['analytics'] = (bool)false;
			}
			$options['analytics_content'] = stripslashes($_POST['analytics_content']);
			// 首页搜索顶部文字广告
			if ($_POST['text_ads']) {
				$options['text_ads'] = (bool)true;
			} else {
				$options['text_ads'] = (bool)false;
			}
			$options['index_textads_content'] = stripslashes($_POST['index_textads_content']);
			// 首页CMS广告一
			if ($_POST['index_cms_ad1']) {
				$options['index_cms_ad1'] = (bool)true;
			} else {
				$options['index_cms_ad1'] = (bool)false;
			}
			$options['index_cms_ad11_content'] = stripslashes($_POST['index_cms_ad11_content']);
			$options['index_cms_ad12_content'] = stripslashes($_POST['index_cms_ad12_content']);
			// 首页CMS广告二
			if ($_POST['index_cms_ad2']) {
				$options['index_cms_ad2'] = (bool)true;
			} else {
				$options['index_cms_ad2'] = (bool)false;
			}
			$options['index_cms_ad21_content'] = stripslashes($_POST['index_cms_ad21_content']);
			$options['index_cms_ad22_content'] = stripslashes($_POST['index_cms_ad22_content']);			
			// 博客模式首页/分类页广告一
			if ($_POST['index_ad1']) {
				$options['index_ad1'] = (bool)true;
			} else {
				$options['index_ad1'] = (bool)false;
			}
			$options['index_ad1_post_number'] = stripslashes($_POST['index_ad1_post_number']);
			$options['index_ad1_content'] = stripslashes($_POST['index_ad1_content']);
			// 博客模式首页/分类页广告二
			if ($_POST['index_ad2']) {
				$options['index_ad2'] = (bool)true;
			} else {
				$options['index_ad2'] = (bool)false;
			}
			$options['index_ad2_post_number'] = stripslashes($_POST['index_ad2_post_number']);
			$options['index_ad2_content'] = stripslashes($_POST['index_ad2_content']);
			// 博客模式首页/分类页广告三
			if ($_POST['index_ad3']) {
				$options['index_ad3'] = (bool)true;
			} else {
				$options['index_ad3'] = (bool)false;
			}
			$options['index_ad3_content'] = stripslashes($_POST['index_ad3_content']);
			// 文章内容页广告
			if ($_POST['single_post_ad1']) {
				$options['single_post_ad1'] = (bool)true;
			} else {
				$options['single_post_ad1'] = (bool)false;
			}
			$options['single_post_ad1_content'] = stripslashes($_POST['single_post_ad1_content']);
			// 边栏广告8 x 125*125
			if ($_POST['sidebar_ad125']) {
				$options['sidebar_ad125'] = (bool)true;
			} else {
				$options['sidebar_ad125'] = (bool)false;
			}
			$options['sidebar_ad125_content1'] = stripslashes($_POST['sidebar_ad125_content1']);
			$options['sidebar_ad125_content2'] = stripslashes($_POST['sidebar_ad125_content2']);
			$options['sidebar_ad125_content3'] = stripslashes($_POST['sidebar_ad125_content3']);
			$options['sidebar_ad125_content4'] = stripslashes($_POST['sidebar_ad125_content4']);
			$options['sidebar_ad125_content5'] = stripslashes($_POST['sidebar_ad125_content5']);
			$options['sidebar_ad125_content6'] = stripslashes($_POST['sidebar_ad125_content6']);
			$options['sidebar_ad125_content7'] = stripslashes($_POST['sidebar_ad125_content7']);
			$options['sidebar_ad125_content8'] = stripslashes($_POST['sidebar_ad125_content8']);
			// 边栏广告250*250
			if ($_POST['sidebar_ad250']) {
				$options['sidebar_ad250'] = (bool)true;
			} else {
				$options['sidebar_ad250'] = (bool)false;
			}
			$options['sidebar_ad250_content'] = stripslashes($_POST['sidebar_ad250_content']);				
			// feed订阅
			$options['feed_url'] = stripslashes($_POST['feed_url']);
			update_option('Meiwenxinshang_options', $options);
			
		} else {
			MeiwenxinshangOptions::getOptions();
		}
		add_theme_page(__('主题设置', 'Meiwenxinshang'), __('主题设置', 'Meiwenxinshang'), 'edit_themes', basename(__FILE__), array('MeiwenxinshangOptions', 'display'));
	}
	function display() {
		$options = MeiwenxinshangOptions::getOptions();
?>
<style>
.wrap{margin-left:20px;}
.wrap h2{border-bottom:1px #ddd solid;margin-bottom:15px;}
.wrap h3{background:#22749b;color:#fff;font-size:14px;height:30px;line-height:30px;width:120px;padding-left:10px;margin:0;}
.form-table th{width:100px;color:#00F}
.form-table {border-collapse:collapse;width:720px;margin-bottom:15px;}
.form-table td,.form-table th {border:#e0e1e1 solid 1px; font-size:12px;color:#565656;line-height:20px;background:#fff;}
.show_id{display:block;width:150px;height:400px;margin-right:-500px;position:fixed;right:50%;top:15%;line-height:14px;padding:10px;list-style:square inside;border:1px solid #ccc;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;overFlow-y: scroll;overFlow-x: hidden ;}
.show_id h4{margin:5px 0 0 0}
</style>
<form action="#" method="post" enctype="multipart/form-data" name="Meiwenxinshang_form" id="Meiwenxinshang_form">
	<div class="wrap">
		<h2><?php _e('《u142》主题设置', 'Meiwenxinshang'); ?></h2>
        <h3>基础设置</h3><span class="show_id"><h4>站点所有分类ID</h4><?php show_id();?></span>			
        <table class="form-table">
			<tbody>			
				<tr valign="top">
					<th scope="row">
						<?php _e('关键词', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
                        	<input type="text" name="keywords" id="keyword" class="code" size="75" value="<?php echo($options['keywords']); ?>">
						</label>
					</td>
				</tr>			
				<tr valign="top">
					<th scope="row">
						<?php _e('描述', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
							<textarea name="description" id="description" cols="50" rows="2" style="width:550px;font-size:12px;" class="code"><?php echo($options['description']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('顶部副标题', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
                        	<input type="text" name="fubiaoti" id="fubiaoti" class="code" size="75" value="<?php echo($options['fubiaoti']); ?>">
						</label>
					</td>
				</tr>				
				<tr valign="top">
					<th scope="row">
						<?php _e('google自定义搜索', 'Meiwenxinshang'); ?>
						<br/>
					</th>
					<td>
						<label>
							<input name="google_cse" type="checkbox" value="checkbox" <?php if($options['google_cse']) echo "checked='checked'" ; ?> />
							 <?php _e('Using google custom search engine.','Meiwenxinshang'); ?>
						</label>
						<br/>
						<?php _e('CX:','Meiwenxinshang');?>
							<input type="text" name="google_cse_cx" id="google_cse_cx" class="code" size="40" value="<?php echo($options['google_cse_cx']); ?>">
						<br/>
						<br/>
						<?php printf(__('Find <code>name="cx"</code> in the <strong>Search box code</strong> of <a href="%1$s">Google Custom Search Engine</a>,<br/>and type the <code>value</code> here.<br/>For example: <code>014782006753236413342:1ltfrybsbz4</code>','Meiwenxinshang'),'http://www.google.com/coop/cse/'); ?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('切换首页为博客', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
							<?php _e('勾选后首页则由CMS模式切换为博客模式。', 'Meiwenxinshang'); ?><input name="index_blog" type="checkbox" value="checkbox" <?php if($options['index_blog']) echo "checked='checked'"; ?> />
						</label>
					</td>
				</tr>	
				<tr valign="top">
					<th scope="row">
						<?php _e('幻灯片', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
							<?php _e('首页启用幻灯片。 ', 'Meiwenxinshang'); ?><input name="slide" type="checkbox" value="checkbox" <?php if($options['slide']) echo "checked='checked'"; ?> /><?php _e('  温馨提示：在文章编辑中使用特色图作为缩略图', 'Meiwenxinshang'); ?>
						</label>
					</td>
				</tr>				
				<tr valign="top">
					<th scope="row">
						<?php _e('二级分类向左序号', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
							<?php _e('填写导航菜单希望转向左的序号：', 'Meiwenxinshang'); ?><input type="text" name="navi_left" id="navi_left" class="code" size="50" value="<?php echo($options['navi_left']); ?>"><br/><?php _e('显示是以带二级分类的菜单才开始计算，如填 3 则是[0,1,2,3,共4个,然后从第5个开始]，主题默认填为 4 ，即从第6个开始朝左。', 'Meiwenxinshang'); ?>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('关于本站介绍', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="about_me" type="checkbox" value="checkbox" <?php if($options['about_me']) echo "checked='checked'"; ?> />
						</label><?php _e('在首页右侧边栏显示。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="about_me_content" id="about_me_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['about_me_content']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('百度喜欢按钮', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
							<?php _e('启用百度喜欢按钮。', 'Meiwenxinshang'); ?><input name="bdlikebutton" type="checkbox" value="checkbox" <?php if($options['bdlikebutton']) echo "checked='checked'"; ?> />
						</label>
						<br/>
						<label>
							<?php _e('填写百度喜欢按钮的ID：', 'Meiwenxinshang'); ?><input type="text" name="bdlikebutton_id" id="bdlikebutton_id" class="code" size="50" value="<?php echo($options['bdlikebutton_id']); ?>"><br/><?php _e('即uid后面的数字，如"uid":"625906"，即填625906。填写后则为自己的百度帐号做统计。', 'Meiwenxinshang'); ?><br/><?php _e('百度喜欢按钮代码<a target="_blank" rel="nofollow" href="http://share.baidu.com/like/get-codes"><span>获取地址</span></a>', 'Meiwenxinshang'); ?>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('QQ微博一键转播按钮', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
							<?php _e('QQ微博一键转播按钮。', 'Meiwenxinshang'); ?><input name="qq_weibo_share_button" type="checkbox" value="checkbox" <?php if($options['qq_weibo_share_button']) echo "checked='checked'"; ?> />
						</label>
						<br/>
						<label>
							<?php _e('QQ微博一键转播按钮的ID：', 'Meiwenxinshang'); ?><input type="text" name="qq_weibo_id" id="qq_weibo_id" class="code" size="50" value="<?php echo($options['qq_weibo_id']); ?>"><br/><?php _e('即appkey', 'Meiwenxinshang'); ?><br/><?php _e('QQ微博一键转播按钮代码<a target="_blank" rel="nofollow" href="http://dev.t.qq.com/websites/share/"><span>申请地址</span></a>', 'Meiwenxinshang'); ?>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('新浪微博分享按钮', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
							<?php _e('新浪微博分享按钮。', 'Meiwenxinshang'); ?><input name="sina_weibo_share_button" type="checkbox" value="checkbox" <?php if($options['sina_weibo_share_button']) echo "checked='checked'"; ?> />
						</label>
						<br/>
						<label>
							<?php _e('新浪微博分享按钮的ID：', 'Meiwenxinshang'); ?><input type="text" name="sina_weibo_id" id="sina_weibo_id" class="code" size="50" value="<?php echo($options['sina_weibo_id']); ?>"><br/><?php _e('即appkey', 'Meiwenxinshang'); ?><br/><?php _e('新浪微博一键转播按钮代码<a target="_blank" rel="nofollow" href="http://open.weibo.com/sharebutton"><span>申请地址</span></a>', 'Meiwenxinshang'); ?>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('谷歌+1按钮', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<label>
							<?php _e('谷歌+1按钮开启。', 'Meiwenxinshang'); ?><input name="g-plusone_button" type="checkbox" value="checkbox" <?php if($options['g-plusone_button']) echo "checked='checked'"; ?> />
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('Feed订阅', 'Meiwenxinshang'); ?>
					</th>
					<td>
						<?php _e('订阅地址：', 'Meiwenxinshang'); ?>
						<label>
                        	<input type="text" name="feed_url" id="feed_url" class="code" size="53" value="<?php echo($options['feed_url']); ?>">
						</label>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">
						<?php _e('页脚信息描述', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="footer_description" type="checkbox" value="checkbox" <?php if($options['footer_description']) echo "checked='checked'"; ?> />
						</label><?php _e('页脚描述。[温馨提示:换行符使用 &lt;br&gt; ]', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="footer_description_content" id="footer_description_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['footer_description_content']); ?></textarea>
						</label>
					</td>
				</tr>	
				
				<tr valign="top">
					<th scope="row">
						<?php _e('页脚统计代码', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="analytics" type="checkbox" value="checkbox" <?php if($options['analytics']) echo "checked='checked'"; ?> />
						</label><?php _e('在页脚使用统计分析代码。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="analytics_content" id="analytics_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['analytics_content']); ?></textarea>
						</label>
					</td>
				</tr>							
			</tbody>
		</table>	
		
<h3>广告位设置</h3>
        <table class="form-table">
			<tbody>
			
				<tr valign="top">
					<th scope="row">
						<?php _e('首页顶部搜索条上广告', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="text_ads" type="checkbox" value="checkbox" <?php if($options['text_ads']) echo "checked='checked'"; ?> />
						</label><?php _e('搜索条上广告468px*15px。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="index_textads_content" id="index_textads_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['index_textads_content']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('首页CMS广告一', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="index_cms_ad1" type="checkbox" value="checkbox" <?php if($options['index_cms_ad1']) echo "checked='checked'"; ?> />
						</label><?php _e('首页CMS广告一开启，包括540px*125px(左)和125px*125px(右)。', 'Meiwenxinshang'); ?>
						<br/>
						<br/>
						<?php _e('广告尺寸540px*125px(左)。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="index_cms_ad11_content" id="index_cms_ad11_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['index_cms_ad11_content']); ?></textarea>
						</label>
						<br/>
						<?php _e('广告尺寸125px*125px(右)。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="index_cms_ad12_content" id="index_cms_ad12_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['index_cms_ad12_content']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('首页CMS广告二', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="index_cms_ad2" type="checkbox" value="checkbox" <?php if($options['index_cms_ad2']) echo "checked='checked'"; ?> />
						</label><?php _e('首页CMS广告二开启，包括540px*125px(左)和125px*125px(右)。', 'Meiwenxinshang'); ?>
						<br/>
						<br/>
						<?php _e('广告尺寸540px*125px(左)。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="index_cms_ad21_content" id="index_cms_ad21_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['index_cms_ad21_content']); ?></textarea>
						</label>
						<br/>
						<?php _e('广告尺寸125px*125px(右)。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="index_cms_ad22_content" id="index_cms_ad22_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['index_cms_ad22_content']); ?></textarea>
						</label>
					</td>
				</tr>				
                <tr valign="top">
					<th scope="row">
						<?php _e('博客模式首页/分类页<br>广告一', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="index_ad1" type="checkbox" value="checkbox" <?php if($options['index_ad1']) echo "checked='checked'"; ?> />
							<?php _e('在首页/分类页下的第一个横幅广告468*60。', 'Meiwenxinshang'); ?>
						</label>
						<label>
							<?php _e('放置第:','Meiwenxinshang');?><input type="text" name="index_ad1_post_number" id="index_ad1_post_number" class="code" size="7" value="<?php echo($options['index_ad1_post_number']); ?>"><?php _e('篇文章下。','Meiwenxinshang');?>
						</label>
						<br/>
						<label>
							<textarea name="index_ad1_content" id="index_ad1_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['index_ad1_content']); ?></textarea>
						</label>
					</td>
				</tr>				
				<tr valign="top">
					<th scope="row">
						<?php _e('博客模式首页/分类页<br>广告二', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="index_ad2" type="checkbox" value="checkbox" <?php if($options['index_ad2']) echo "checked='checked'"; ?> />
						</label><?php _e('在首页/分类页下的第一个横幅广告468*60。', 'Meiwenxinshang'); ?>
						<label>
							<?php _e('放置第:','Meiwenxinshang');?><input type="text" name="index_ad2_post_number" id="index_ad2_post_number" class="code" size="7" value="<?php echo($options['index_ad2_post_number']); ?>"><?php _e('篇文章下。','Meiwenxinshang');?>
						</label>
						<br/>
						<label>
							<textarea name="index_ad2_content" id="index_ad2_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['index_ad2_content']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('博客模式首页/分类页<br>广告三', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="index_ad3" type="checkbox" value="checkbox" <?php if($options['index_ad3']) echo "checked='checked'"; ?> />
						</label><?php _e('在首页/分类页的 分页导航条 下的横幅图片广告590*100(最宽680px)。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="index_ad3_content" id="index_ad3_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['index_ad3_content']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('内容页广告', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="single_post_ad1" type="checkbox" value="checkbox" <?php if($options['single_post_ad1']) echo "checked='checked'"; ?> />
						</label><?php _e('内容页文章前插入广告336*280，可以同时放2个，并排输出。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="single_post_ad1_content" id="single_post_ad1_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['single_post_ad1_content']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('边栏广告125*125', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="sidebar_ad125" type="checkbox" value="checkbox" <?php if($options['sidebar_ad125']) echo "checked='checked'"; ?> />
						</label><?php _e('开启边栏8个小广告125px*125px。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<?php _e('小广告1:','u142'); ?><textarea name="sidebar_ad125_content1" id="sidebar_ad125_content1" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['sidebar_ad125_content1']); ?></textarea>
						</label>						
						<label>
							<?php _e('小广告2:','u142'); ?><textarea name="sidebar_ad125_content2" id="sidebar_ad125_content2" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['sidebar_ad125_content2']); ?></textarea>
						</label>
						<label>
							<?php _e('小广告3:','u142'); ?><textarea name="sidebar_ad125_content3" id="sidebar_ad125_content3" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['sidebar_ad125_content3']); ?></textarea>
						</label>
						<label>
							<?php _e('小广告4:','u142'); ?><textarea name="sidebar_ad125_content4" id="sidebar_ad125_content4" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['sidebar_ad125_content4']); ?></textarea>
						</label>
						<label>
							<?php _e('小广告5:','u142'); ?><textarea name="sidebar_ad125_content5" id="sidebar_ad125_content5" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['sidebar_ad125_content5']); ?></textarea>
						</label>						
						<label>
							<?php _e('小广告6:','u142'); ?><textarea name="sidebar_ad125_content6" id="sidebar_ad125_content6" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['sidebar_ad125_content6']); ?></textarea>
						</label>
						<label>
							<?php _e('小广告7:','u142'); ?><textarea name="sidebar_ad125_content7" id="sidebar_ad125_content7" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['sidebar_ad125_content7']); ?></textarea>
						</label>
						<label>
							<?php _e('小广告8:','u142'); ?><textarea name="sidebar_ad125_content8" id="sidebar_ad125_content8" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['sidebar_ad125_content8']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('开启边栏广告250*250', 'Meiwenxinshang'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'Meiwenxinshang'); ?></small>
					</th>
					<td>
						<label>
							<input name="sidebar_ad250" type="checkbox" value="checkbox" <?php if($options['sidebar_ad250']) echo "checked='checked'"; ?> />
						</label><?php _e('边栏广告250px*250px。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="sidebar_ad250_content" id="sidebar_ad250_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['sidebar_ad250_content']); ?></textarea>
						</label>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input class="button-primary" type="submit" name="Meiwenxinshang_save" value="<?php _e('保存更改', 'Meiwenxinshang'); ?>" />
		</p>
	</div>
</form>
<?php
	}
}
// register functions
add_action('admin_menu', array('MeiwenxinshangOptions', 'add'));
?>
<?php
/* 评论邮件通知 */
function comment_mail_notify($comment_id){
	$comment = get_comment($comment_id);
	$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
	$spam_confirmed = $comment->comment_approved;
	if(($parent_id != '') && ($spam_confirmed != 'spam')){
	$wp_email = 'webmaster@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
	$to = trim(get_comment($parent_id)->comment_author_email);
	$subject = '你在 [' . get_option("blogname") . '] 的留言有了回应';
	$message = '
	<div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px;">
		<p>' . trim(get_comment($parent_id)->comment_author) . ', 你好!</p>
		<p>你曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
		. trim(get_comment($parent_id)->comment_content) . '</p>
		<p>' . trim($comment->comment_author) . ' 给你的回应:<br />'
		. trim($comment->comment_content) . '<br /></p>
		<p>你可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回应完整内容</a></p>
		<p><strong>感谢你对 <a href="' . get_option('home') . '" target="_blank">' . get_option('blogname') . '</a> 的关注，欢迎<a href="' . get_option('home') . '/feed/" target="_blank">订阅本站</a></strong></p>
		<p><strong>您可以直接回复此邮件与我联系～</strong></p>
	</div>';
	$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
	$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
	wp_mail( $to, $subject, $message, $headers );
  }
}
add_action('comment_post', 'comment_mail_notify');
/*  添加特色图 */
add_theme_support( 'post-thumbnails' );
/* 自定义缩略图 */
if ( function_exists( 'add_image_size' ) ){
add_image_size( 'featured-thumbnail', 300, 200, true ); // 首页幻灯缩略图，首页第一栏和分页缩略图，首页第五/六栏缩略图，边栏缩略图2
add_image_size( 'thumbnail1', 195, 195, true ); // 首页第二栏大缩略图和小缩略图，第四栏缩略图，边栏缩略图1
add_image_size( 'thumbnail2', 275, 350, true ); // 首页第三栏大缩略图和小缩略图
}
/* 抓取第一张缩略图 */
 function catch_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/data-original=\"(.*?)\"/', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){
	$first_img = '';
    	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  	$first_img = $matches [1] [0];
  }
  if(empty($first_img)){ //自定义第一张图片
		$random = mt_rand(1, 6);
		$first_img= get_bloginfo ( 'stylesheet_directory' )."/images/random/".$random.".jpg";
  }
  return $first_img;
 }
/* 评论表情 */
add_filter('smilies_src','custom_smilies_src',1,10);
 function custom_smilies_src ($img_src, $img, $siteurl){
     return get_bloginfo('template_directory').'/smilies/'.$img;
 }
/* 分页 */
function par_pagenavi($range = 9){
		// $paged - number of the current page
	global $paged, $wp_query;
		// How much pages do we have?
	if ( !$max_page ) {
		$max_page = $wp_query->max_num_pages;
	}
			// We need the pagination only if there are more than 1 page
	if($max_page > 1){
		if(!$paged){
			$paged = 1;
		}
			echo '<span><strong>导航页码:&nbsp;&nbsp;&nbsp;</strong>'.$paged.' / '.$max_page.'</span>';
			// On the first page, don't put the First page link
		if($paged != 1){
			echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 起始页 </a>";
		}
			// To the previous page
		previous_posts_link('«');
			// We need the sliding effect only if there are more pages than is the sliding range
		if($max_page > $range){
			// When closer to the beginning
				if($paged < $range){
					for($i = 1; $i <= ($range + 1); $i++){
						if($i==$paged) echo "<a class='current'>$i</a>";
							else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
					}
				}
			// When closer to the end
		elseif($paged >= ($max_page - ceil(($range/2)))){
			for($i = $max_page - $range; $i <= $max_page; $i++){
					if($i==$paged) echo "<a class='current'>$i</a>";
							else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
			}
		}
		// Somewhere in the middle
		elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
			for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
					if($i==$paged) echo "<a class='current'>$i</a>";
							else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
					}
			}
		}
		// Less pages than the range, no sliding effect needed
		else{
			for($i = 1; $i <= $max_page; $i++){
					if($i==$paged) echo "<a class='current'>$i</a>";
							else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
			}
		}
		// Next page
		next_posts_link('»');
		// On the last page, don't put the Last page link
		if($paged != $max_page){
			echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 终点页 </a>";
		}
	}
}
/* 后台分类ID */
function show_id() {
	global $wpdb;
	$request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
	$request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
	$request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
	$request .= " ORDER BY term_id asc";
	$categorys = $wpdb->get_results($request);
	foreach ($categorys as $category) { 
		$output = '<p><span>'.$category->name."</span>&nbsp;&nbsp;<span>ID= <b>".$category->term_id.'</b></span></p>';
		echo $output;
	}
}
/* 文章访问计数 */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return " 0 ";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
       $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
/* 彩色标签 */
function colorCloud($text) {
$text= preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
return $text;
}
function colorCloudCallback($matches) {
$text= $matches[1];
$color= dechex(rand(0,16777215));
$pattern= '/style=(\'|\")(.*)(\'|\")/i';
$text= preg_replace($pattern,"style=\"color:#{$color};$2;\"", $text);
return"<a $text>";
}
add_filter('wp_tag_cloud','colorCloud', 1);
/* 归档页 */
function mwxs_archives_list() {
	if( !$output = get_option('mwxs_archives_list') ){
		$output = '<div id="archives"><p>[<a id="al_expand_collapse" href="#">全部展开/收缩</a>] <em>(注: 点击月份可以展开)</em></p>';
        $year=0; $mon=0; 
		$the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' ); //update: 加上忽略置顶文章	
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$year_tmp = get_the_time('Y');
			$mon_tmp = get_the_time('m');
			$y=$year; $m=$mon;
			if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
			if ($year != $year_tmp && $year > 0) $output .= '</ul>';
			if ($year != $year_tmp) {
				$year = $year_tmp;
				$output .= '<h3 class="al_year">'. $year .' 年</h3><ul class="al_mon_list">'; //输出年份
			}
			if ($mon != $mon_tmp) {
				$mon = $mon_tmp;
				$output .= '<li><span class="al_mon">'. $mon .' 月</span><ul class="al_post_list">'; //输出月份
			}
			$output .= '<li>'. get_the_time('d日: ') .'<a href="'. get_permalink() .'">'. get_the_title() .'</a>&nbsp;&nbsp;<span style="color:#999">共&nbsp;'. get_comments_number('0', '1', '%') .'&nbsp;次评论</span></li>'; //输出文章日期和标题
			endwhile;
			wp_reset_query();
			$output .= '</ul></li></ul></div>';
			update_option('mwxs_archives_list', $output);
	}
		echo $output;
}
function clear_zal_cache() {
			update_option('mwxs_archives_list', ''); // 清空 mwxs_archives_list
}
add_action('save_post', 'clear_zal_cache'); // 新发表文章/修改文章时
/* 移除头部信息 */
remove_action( 'wp_head', 'wp_generator'); 
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
/* 评论链接加nofollow */
function add_nofollow_to_comments_popup_link(){
return ' rel="nofollow" ';
}
add_filter('comments_popup_link_attributes','add_nofollow_to_comments_popup_link');
/* Anti-Spam */
class anti_spam {
	//建立
	function anti_spam() {
		if ( !current_user_can('level_0') ) {
			add_action('template_redirect', array($this, 'w_tb'), 1);
			add_action('init', array($this, 'gate'), 1);
			add_action('preprocess_comment', array($this, 'sink'), 1);
		}
	}
 
	//設欄位
	function w_tb() {
		if ( is_singular() ) {
			ob_start(create_function('$input','return preg_replace("#textarea(.*?)name=([\"\'])comment([\"\'])(.+)/textarea>#",
			"textarea$1name=$2wall$3$4/textarea><textarea name=\"comment\" cols=\"50\" rows=\"4\" style=\"display:none\"></textarea>",$input);') );
		}
	}
 
	//檢查
	function gate() {
		( !empty($_POST['wall']) && empty($_POST['comment']) ) ? $_POST['comment'] = $_POST['wall'] : $_POST['spam_confirmed'] = 1;
	}
 
	//處理
	function sink( $comment ) {
		if ( !empty($_POST['spam_confirmed']) ) {
			//方法一:直接擋掉, 將 die(); 前面兩斜線刪除即可.
			//die();
			//方法二:標記為spam, 留在資料庫檢查是否誤判.
			//add_filter('pre_comment_approved', create_function('', 'return "spam";'));
			/*
			$is_ping = in_array( $comment['comment_type'], array('pingback', 'trackback') );
			$comment['comment_content'] = ( $is_ping ) ?
			"◎ 這是 Pingback/Trackback, 小牆懷疑這可能是 Spam!\n" . $comment['comment_content'] :
			"[ 小牆判斷這是Spam! ]\n" . $comment['comment_content'];
			*/
			// MG12 的處理方法
			$is_ping = in_array( $comment['comment_type'], array('pingback', 'trackback') );
			if(!$is_ping) {
				die();
			}
		}
		return $comment;
	}
}
$anti_spam = new anti_spam();
/* 评论相对时间 */
function time_diff(){
	$time_diff = current_time('timestamp') - get_comment_time('U');
	if( $time_diff <= 2592000 )    //30天内
		echo human_time_diff(get_comment_time('U'), current_time('timestamp')).' 之前';    //显示格式 OOXX 之前
	else
		printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time());    //显示格式 X年X月X日 OOXX 时			
}
/* 评论 */
function showwithme_comment($comment, $args, $depth) 
{
	$GLOBALS['comment'] = $comment;
	//评论计数器初始化  正序
	global $commentcount;

	$max_depth=$args['max_depth'];//获得设置的最大嵌套数
	if(!$commentcount) { 
		$commentcount = array();//声明为数组
		$pagenum=get_query_var('cpage')-1;//获得当前分页（减一是为了后面计算使用）
		$page_comment_count=get_option('comments_per_page');//获得设置的每页评论数
		$commentcount[0] = $pagenum * $page_comment_count;//$commentcount的第一个元素存入计算得出的前面分页的评论数目
		$commentcount[$max_depth]=0;//这里$commentcount[$max_depth]是用数组的最后一个存储上个评论的楼层数，这里初始置为0
	}	
		
?>
<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?> <?php if( $depth > 1 && $depth < 5 ){echo ' style="margin-left:' . ceil(40/$depth) . 'px;"';} ?>>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php $add_below = 'div-comment'; ?>	
		<div class="name">
			<?php
				$author_class = '';
				if (function_exists('get_avatar') && get_option('show_avatars')) {
					$author_class = 'with_avatar';
					echo get_avatar($comment, 32);
				}
			?>
			<div class="cminfo"><em><?php comment_author(); ?></em><span>| <?php time_diff(); ?></span></div><div class="reply"><span><?php comment_reply_link(array_merge( $args, array('reply_text' => '回复', 'add_below' =>$add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span></div>
			<div class="cmflr cmflr-<?php echo $depth; ?>"><span>
			<?php 
				if(!$commentcount[$depth-1])
					$commentcount[$depth-1]=1;
				else 
					$commentcount[$depth-1]++;					
				$floor = '#'.$commentcount[$depth-1];//输出楼层显示				
				if($depth==1){
					echo $floor;
				}else if($depth==2){
					echo '-'.$floor;
				}else if($depth==3){
					echo '--'.$floor;
				}else if($depth==4){
					echo '---'.$floor;				
				}else if($depth==5){
					echo '----'.$floor;
				}
				/*下面就是重点了，$commentcount[$max_depth]里存储上个评论的嵌套层数，如果上个评论所在层数大于当前评论的层数，说明            当前评论时更高一级评论，所以要重置低级层数的评论的=计数器 */
				if($commentcount[$max_depth]&&$commentcount[$max_depth]>$depth){
					for ($i=$depth;$i<$max_depth;$i++){	//利用循环将低级的计数器都置为0 
						$commentcount[$i]=0;
					}
				}
				$commentcount[$max_depth]=$depth;//将当前评论层数赋给$commentcount[$max_depth]
			?></span>
			</div>
		</div>
		<?php if ($comment->comment_approved == '0') : ?>
		<span class="pl"><em>你的评论正在审核，稍后会显示出来！</em></span>
		<?php endif; ?>
		<div class="pl"><?php comment_text() ?></div>
		<div class="clearfix"></div>
	</div>
<?php
}
function showwithme_end_comment() {
echo '</li>';
}
function comment_ajax_navi(){
	if( isset($_POST['action'])&& $_POST['action'] == 'comment_ajax_navi'){
		include_once TEMPLATEPATH.'/comment_list.php';  //注意修改为你自己的文件的位置
		die();
	}else{
		return;
	}
}
add_action('template_redirect', 'comment_ajax_navi');
/* 自定义菜单 */
register_nav_menus(
	array(
		'header-menu' => __( '导航自定义菜单' ),
		'footer-menu' => __( '底部自定义菜单' )
	)
);
?>
<?php
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
	'name'=>'首页cms',
	'description'   => '以下小工具仅在首页显示',
	'before_widget'=>'<div class="widget">',
	'after_widget'=>'</div>'
	));
    register_sidebar(array(
	'name'=>'Home边栏',
	'description'   => '以下小工具仅在首页显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));
    register_sidebar(array(
	'name'=>'Category边栏',
	'description'   => '以下小工具仅在分类页显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));	
    register_sidebar(array(
	'name'=>'Single边栏',
	'description'   => '以下小工具仅在文章页显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));	
    register_sidebar(array(
	'name'=>'Page边栏',
	'description'   => '以下小工具仅在独立页面显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));	
    register_sidebar(array(
	'name'=>'其他边栏',
	'description'   => '以下小工具在其他页面显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));		
}
if( function_exists( 'register_sidebar_widget' ) ) {
    register_sidebar_widget('u142-首页CMS广告一','index_cms_ad1');
    register_sidebar_widget('u142-首页CMS广告二','index_cms_ad2'); 
	register_sidebar_widget('u142-关于本站','sidebar_about'); 
}
function index_cms_ad1() { include(TEMPLATEPATH . '/widget/index_cms_ad1.php'); }
function index_cms_ad2() { include(TEMPLATEPATH . '/widget/index_cms_ad2.php'); }
function sidebar_about() { include(TEMPLATEPATH . '/widget/sidebar_about.php'); }
include(TEMPLATEPATH . '/widget/index_cms1.php');
include(TEMPLATEPATH . '/widget/index_cms2.php');
include(TEMPLATEPATH . '/widget/index_cms3.php');
include(TEMPLATEPATH . '/widget/index_cms4.php');
include(TEMPLATEPATH . '/widget/index_cms5.php');
include(TEMPLATEPATH . '/widget/index_cms6.php');
include(TEMPLATEPATH . '/widget/index_latest_posts.php');
include(TEMPLATEPATH . '/widget/index_rand_posts.php');
include(TEMPLATEPATH . '/widget/index_hot_posts.php');
include(TEMPLATEPATH . '/widget/latest_posts.php');
include(TEMPLATEPATH . '/widget/rand_posts.php');
include(TEMPLATEPATH . '/widget/hot_posts.php');
include(TEMPLATEPATH . '/widget/sidebar_bdshare.php');
include(TEMPLATEPATH . '/widget/sidebar_qmail.php');
include(TEMPLATEPATH . '/widget/sidebar_comments.php');
include(TEMPLATEPATH . '/widget/sidebar_tags.php');
include(TEMPLATEPATH . '/widget/sidebar_contact.php');
include(TEMPLATEPATH . '/widget/sidebar_ad125.php');
include(TEMPLATEPATH . '/widget/sidebar_ad250.php');
add_action( 'widgets_init', 'my_unregister_widgets' );
function my_unregister_widgets() {   
    unregister_widget( 'WP_Widget_Pages' );
    unregister_widget( 'WP_Widget_RSS' );
    unregister_widget( 'WP_Widget_Search' );
    unregister_widget( 'WP_Widget_Tag_Cloud' );
    unregister_widget( 'WP_Nav_Menu_Widget' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
}
?>
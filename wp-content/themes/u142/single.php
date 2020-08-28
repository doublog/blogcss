<?php get_header(); ?>
<?php $options = get_option('Meiwenxinshang_options'); ?>
<script type="text/javascript">
	function doNewsContentLabel(size){
		var wenzhangziti=document.all?document.all['wenzhangziti']:document.getElementById('wenzhangziti');wenzhangziti.style.fontSize=size+'px';
	}
</script>
<!--#single main start-->	
<div id="container">
    	<div class="content">
			<div id="mainbox">
			<?php include(TEMPLATEPATH . '/toolbar.php'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-content" id="post-<?php the_ID(); ?>" >
					<h1><?php the_title(); ?></h1>
					<div class="entry-info" style="width:650px;"><?php the_time(__('Y年n月j日','meiwenxinshang')) ?>,&nbsp;共&nbsp;<?php comments_popup_link(__('0', 'meiwenxinshang'), __('1', 'meiwenxinshang'), __('%', 'meiwenxinshang'));?>&nbsp;次吐槽,&nbsp;<?php echo getPostViews(get_the_ID()); ?>&nbsp;次围观.<?php edit_post_link(__('Edit','inove'),'<span class="editpost">','</span>'); ?></div>
					
					<?php if ($options['qq_weibo_share_button']) :?>
					<!-- 腾讯微博分享按钮 -->
					<div class="qshare">
					<script type="text/javascript" charset="utf-8">
					//腾讯微博
					function postToWb(){
						var _url = encodeURIComponent(document.location);
						var _assname = encodeURI("");//你注册的帐号，不是昵称
						var _appkey = encodeURI("<?php echo $options['qq_weibo_id']; ?>");//你从腾讯获得的appkey
						var _pic = encodeURI('');//（例如：var _pic='图片url1|图片url2|图片url3....）
						var _t = '';//标题和描述信息
						var metainfo = document.getElementsByTagName("meta");
							for(var metai = 0;metai < metainfo.length;metai++){
								if((new RegExp('description','gi')).test(metainfo[metai].getAttribute("name"))){
									_t = metainfo[metai].attributes["content"].value;
								}
							}
							_t =  document.title+_t;//请在这里添加你自定义的分享内容
						if(_t.length > 120){
							_t= _t.substr(0,117)+'...';
						}
						_t = encodeURI(_t);
						var _u = 'http://share.v.t.qq.com/index.php?c=share&a=index&url='+_url+'&appkey='+_appkey+'&pic='+_pic+'&assname='+_assname+'&title='+_t;
						window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
					}
					</script>
						<a href="javascript:void(0)" onclick="postToWb();return false;" class="tmblog"><img src="http://mat1.gtimg.com/app/opent/images/websites/share/qshare.png" border="0" alt="转播到腾讯微博" title="分享到腾讯微博" width="118" height="25"></a>
					</div>
					<?php endif; ?>
					
					<?php if ($options['sina_weibo_share_button']) :?>	
					<!-- 新浪微博分享按钮 -->
					<div class="weiboshare">
						<script type="text/javascript" charset="utf-8">
							(function(){
								var _w = 106 , _h = 24;
								var param = {
									url:location.href,
									type:'5',
									count:'', /**是否显示分享数，1显示(可选)*/
									appkey:'<?php echo $options['sina_weibo_id']; ?>', /**您申请的应用appkey,显示分享来源(可选)*/
									title:'', /**分享的文字内容(可选，默认为所在页面的title)*/
									pic:'', /**分享图片的路径(可选)*/
									ralateUid:'', /**关联用户的UID，分享微博会@该用户(可选)*/
									language:'zh_cn', /**设置语言，zh_cn|zh_tw(可选)*/
									rnd:new Date().valueOf()
								}
								var temp = [];
									for( var p in param ){
										temp.push(p + '=' + encodeURIComponent( param[p] || '' ) )
									}
								document.write('<iframe allowTransparency="true" frameborder="0" scrolling="no" src="http://hits.sinajs.cn/A1/weiboshare.html?' + temp.join('&') + '" width="'+ _w+'" height="'+_h+'"></iframe>')
							})()
						</script>
					</div>
					<?php endif; ?>
					
					<?php if ($options['bdlikebutton']) :?>	
					<!-- 将此标记放在您希望显示like按钮的位置 -->
							<div class="bdlikebutton"></div>
					<?php endif; ?>
					
					<?php if ($options['g-plusone_button']) :?>	
					<!-- google +1 -->
					<div class="g-plusone"></div>
					<!-- google plus -->
					<script type="text/javascript">
						window.___gcfg = {lang: 'zh-HK'};
							(function() {
								var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
								po.src = 'https://apis.google.com/js/plusone.js';
								var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
							})();
					</script>
					<?php endif; ?>
					
					<div class="fontsize">字体大小:
						[<a href="javascript:doNewsContentLabel(12)">小</a>]
						[<a href="javascript:doNewsContentLabel(14)">中</a>]
						[<a href="javascript:doNewsContentLabel(16)">大</a>]
					</div>
			
				<div class="content-c" id="wenzhangziti">
					<?php if ($options['single_post_ad1']) : ?>				
						<div style="text-align:center;width:680px;">
							<?php echo($options['single_post_ad1_content']); ?>
						</div>	
					<?php endif; ?>
					
					<?php the_content(); ?>
						
				<p style="margin-top:20px;">本文来自：<?php bloginfo('description'); ?>.<br>欢迎转载，转载请注明本文链接: <a href="<?php the_permalink(); ?>" rel="bookmark" ><?php the_permalink(); ?></a>
				</p>
				<!-- tags -->
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
					
				<!-- Baidu Button BEGIN -->
					<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
						<a class="bds_qzone"></a>
						<a class="bds_tsina"></a>
						<a class="bds_tqq"></a>
						<a class="bds_renren"></a>
						<a class="bds_baidu"></a>
						<a class="bds_tqf"></a>
						<a class="bds_douban"></a>
						<a class="bds_qq"></a>
						<a class="bds_zx"></a>
						<a class="bds_xg"></a>
						<a class="bds_tsohu"></a>
						<a class="bds_hi"></a>
						<a class="bds_ff"></a>
						<span class="bds_more">更多</span>
						<a class="shareCount"></a>
					</div>
					<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=<?php echo $options['bdlikebutton_id']; ?>" ></script>
					<script type="text/javascript" id="bdshell_js"></script>
					<script type="text/javascript">document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
					</script>
				<!-- Baidu Button END -->
				</div>
 
				<!-- release post start -->	
				<div id="related-posts">
					<div class="caption">猜你也喜欢的：</div>
					<div class="related" class="clearfix">
						<ul>
							<?php
								$post_num = 5; // 數量設定.
								$exclude_id = $post->ID; // 單獨使用要開此行 
								$posttags = get_the_tags(); $i = 0;
									if ( $posttags ) {
										$tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ','; 
										$args = array(
										'post_status' => 'publish',
										'tag__in' => explode(',', $tags), // 只選 tags 的文章. 
										'post__not_in' => explode(',', $exclude_id), // 排除已出現過的文章.
										'caller_get_posts' => 1,
										'orderby' => 'comment_date', // 依評論日期排序.
										'posts_per_page' => $post_num,
									);
										query_posts($args);
											while( have_posts() ) { the_post(); 
							?>
											<li><a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>" ><img src="<?php if ( get_post_meta($post->ID, 'thumbnail1', true) ) { echo get_post_meta($post->ID, 'thumbnail1', true);}elseif ( has_post_thumbnail() ){$thumbnail1_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail1');echo $thumbnail1_url[0];}else{echo catch_first_image();} ?>" alt="<?php the_title(); ?>" width="120" height="120" ></a>
						<a href="<?php echo the_permalink(); ?>" ><?php the_title(); ?></a></li>
							<?php
									$exclude_id .= ',' . $post->ID; $i ++;
										} wp_reset_query();
									}
								if ( $i < $post_num ) { // 如果 tags 文章數量不足, 再取 category 補足.
									$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
									$args = array(
									'category__in' => explode(',', $cats), // 只選 category 的文章.
									'post__not_in' => explode(',', $exclude_id),
									'caller_get_posts' => 1,
									'orderby' => 'comment_date',
									'posts_per_page' => $post_num - $i,
									);
									query_posts($args);
										while( have_posts() ) { the_post(); 
							?>
											<li><a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>" ><img src="<?php if ( get_post_meta($post->ID, 'thumbnail1', true) ) { echo get_post_meta($post->ID, 'thumbnail1', true);}elseif ( has_post_thumbnail() ){$thumbnail1_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail1');echo $thumbnail1_url[0];}else{echo catch_first_image();} ?>" alt="<?php the_title(); ?>" width="120" height="120" ></a>
						<a href="<?php echo the_permalink(); ?>" ><?php the_title(); ?></a></li>
							<?php 
									$i++;
									} wp_reset_query();
								}
							if ( $i  == 0 )  echo '<li>没有相关文章!</li>';
							?>
						</ul>
					</div>
				</div>			
				<!-- release post end -->	
				
			<!-- postnavi start -->
			<div id="postnavi" class="block">
				<div class="meiwen_post_title">
					<?php next_post_link('<span class="prev"><span class="arrow_left"></span>%link</span>') ?>
					<?php previous_post_link('<span class="next"><span class="arrow_right"></span>%link</span>') ?>						
				</div>
			</div>
			<!-- postnavi end -->
			
				<?php comments_template(); ?>
				
				<?php setPostViews(get_the_ID());?>	<!-- postviews not plugin -->
				
			<?php endwhile; endif; wp_reset_query();?>
			</div>	 
					
		</div>
		<?php get_sidebar(); ?>
		
	</div>
	
	
</div>
<!-- #single main end-->

<?php get_footer(); ?>
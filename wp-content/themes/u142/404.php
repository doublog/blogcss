<?php get_header(); ?>
<?php $options = get_option('Meiwenxinshang_options'); ?>

<!--#single main start-->	
<div id="container">
    <div class="content">
		<div id="main404box">
			<div class="post-content">
				<div id="error404">
					<h1>404</h1>
					<p>传说中的<span style="font-weight:bold;color:#d70000;"> 404页面 </span>，只现身于有缘之人。</p>			
					<p>如果你不知道什么是404，请看<a rel="external nofollow" href="http://baike.baidu.com/view/1402912.htm?fromTaglist">百度百科</a>。</p>		
				</div>
				<div class="content-c">									
					<div class="list-posts">
					<h2>最新文章</h2>
						<ul>
						<?php 				
							$posts = get_posts('numberposts=20&orderby=post_date');			
							foreach($posts as $post) {
								setup_postdata($post);
									echo '<li><a rel="bookmark" title="'.get_the_title().'" href="'.get_permalink() .'">'.mb_strimwidth(get_the_title(), 0, 90,'...').'</a></li>';
							}
								$post = $posts[0];
						?>
						</ul>
					</div>
		
					<div class="list-posts">
					<h2>热门文章</h2>
							<?php
								$args_hotpost = array( 
									'orderby' => 'meta_value_num', 
									'meta_key' => 'post_views_count', 
									'order' => 'DESC',
									'showposts' => 20, // 显示篇数							
								);	
				
							?>			
						<ul>
						<?php 				
							$posts = get_posts($args_hotpost);			
							foreach($posts as $post) {
								setup_postdata($post);
								echo '<li><a rel="bookmark" title="'.get_the_title().'" href="'.get_permalink() .'">'.mb_strimwidth(get_the_title(), 0, 90,'...').'</a></li>';
							}
								$post = $posts[0];
						?>
						</ul>
				
					</div>
					
					<div class="list-posts">
					<h2>随机文章</h2>
						<ul>
							<?php 
								$posts = get_posts('numberposts=20&orderby=rand');
								foreach($posts as $post) {
									setup_postdata($post);
									echo '<li><a rel="bookmark" title="'.get_the_title().'" href="'.get_permalink() .'">'.mb_strimwidth(get_the_title(), 0, 90,'...').'</a></li>';
								}
								$post = $posts[0];
							?>
						</ul>
					</div>
							
				</div>
 			

			</div>	 
					
		</div>
		
		
	</div>
	
	
</div>
<!-- #single main end-->

<?php get_footer(); ?>
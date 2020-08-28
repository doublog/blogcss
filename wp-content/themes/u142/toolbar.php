<div id="toolbar" class="inner">
		<div class="center">
			<strong style="float:left;margin-right:10px;">当前位置：</strong> 
				<?php if(function_exists('yoast_breadcrumb')) {?>
					<div id="crumb">
						<?php yoast_breadcrumb('', '');?>
					</div>
				<?php }else{ ?>
					<div id="crumb">
						<a rel="nofollow" href="<?php bloginfo('url'); ?>">首页</a> &raquo; 
							<?php
								if(is_single()){
									$categorys = get_the_category();
									$category = $categorys[0];
									echo(get_category_parents($category->term_id,true,' &raquo; '));
									the_title();
								} elseif (is_page()){
									the_title();
								} elseif ( is_category() ){
									single_cat_title();
								} elseif ( is_tag() ){
									single_tag_title();
								} elseif ( is_day() ){
									the_time('Y年Fj日');
								} elseif ( is_month() ){
									the_time('Y年F');
								} elseif ( is_year() ){
									the_time('Y年');
								} elseif ( is_search() ){
									echo $s.' 的搜索结果';
								}
							?>
					</div>
				<?php } ?>
		</div>			
</div>	
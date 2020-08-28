<?php 

/*Ajax*/
function Ajax_post(){
	if( isset($_GET['action'])&& $_GET['action'] == 'Ajax_post'  ){
		nocache_headers();	//(FIX for IE)
 $cat = isset($_GET['cat']) ? $_GET['cat'] : null; 
 $category_name=isset($_GET['category_name']) ? $_GET['category_name'] : null; 
 $num = isset($_GET['num']) ? $_GET['num'] : 8;//默认每页数量
 $page = isset($_GET['page']) ? $_GET['page'] :1;
if($cat!=null){
	query_posts('cat='.$cat. '&posts_per_page='.$num.'&paged='.$page.'&caller_get_posts=1');
	}elseif($category_name!=null){
	query_posts('category_name='.$category_name. '&posts_per_page='.$num.'&paged='.$page.'&caller_get_posts=1');
	}else{
	query_posts('posts_per_page='.$num.'&paged='.$page.'&caller_get_posts=1');
	}
$wp_query->is_archive = true; $wp_query->is_home = false;?>

<?php  $i=0;$j=0;if(have_posts()){ ?>
				<?php while(have_posts()): the_post(); ?>
				<?php 
				if($i%2==0){
					if($j%2!=0){
						echo '<div class="pagecontent page-right">';
					}else{
						echo '<div class="pagecontent page-left">';
					}
					$j++;
					}
					?>
				<!-- #post-## -->
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="查看文章: <?php the_title_attribute(); ?>"><?php winyexcerpt(30, '...', 'title'); ?></a><span class="com_num"><?php comments_popup_link('抢沙发！', '1+', '%+'); ?></span></h2>
						<div class="postmeta">
		<span class="data"><?php time_diff( $time_type = 'post' ); ?></span><span class="cate"><?php the_category(',') ?></span><span class="view"><?php if(function_exists('the_views')) { the_views(); }elseif(function_exists('post_views')){post_views('点击:', '');} ?></span>
	</div>

<div class="postentry" <?php if($i%3!=0){echo 'style="float:left;"';}else{echo 'style="float:right;"';}?>>
<?php winyexcerpt(180); ?>
</div>
<div class="postimg" <?php if($i%3==0){echo 'style="float:left;"';}else{echo 'style="float:right;"';}?>>
<?php echo post_thumbnail( $width = "110px",$height = "90px");?>
</div>
<div class="clear"></div>
			</div><!-- #post-## -->
				<?php if($i%2!=0){
					
						echo '<div class="pagenum"></div></div>';
					
					}
					?>
				
				<?php $i++;?>


<?php endwhile;
	 if(($i<8)&&($i%2!=0)){
						echo '<div class="pagenum"></div></div>';
					}
}
		die();
	}
		else{
			return;
	}
}
add_action('init', 'Ajax_post');

/**ajax comment page
 * @return unknown_type
 */
function AjaxCommentsPage(){
 if( isset($_GET['action'])&& $_GET['action'] == 'AjaxCommentsPage'  ){
	global $post,$wp_query, $wp_rewrite;
	$postid = isset($_GET['post']) ? $_GET['post'] : null;
	$pageid = isset($_GET['page']) ? $_GET['page'] : null;
	if(!$postid || !$pageid){
		fail(__('Error post id or comment page id.'));
	}
		// get comments
	$comments = get_comments('post_id='.$postid);
	$post = get_post($postid);
	if(!$comments){
		fail(__('Error! can\'t find the comments'));
	}
	if( 'desc' != get_option('comment_order') ){
		$comments = array_reverse($comments);
	}
	// set as singular (is_single || is_page || is_attachment)
	$wp_query->is_singular = true;
	// base url of page links
	$baseLink = '';
	if ($wp_rewrite->using_permalinks()) {
		$baseLink = '&base=' . user_trailingslashit(get_permalink($postid) . 'comment-page-%#%', 'commentpaged');
	}
	// response 注意修改callback为你自己的，没有就去掉callback

	wp_list_comments('callback=AbookComments&type=comment&max_depth=10000&page=' . $pageid . '&per_page=' . get_option('comments_per_page'), $comments);
	
	echo '<!--Abook-AJAX-COMMENT-PAGE-->';
	echo '<span class="pages">分页：</span>';
	paginate_comments_links('current=' . $pageid . $baseLink);

	die;
	}
}
add_action('init', 'AjaxCommentsPage');
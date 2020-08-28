<?php
/*
Template Name: 亦歌电台
*/
?>
<?php get_header(); ?>

<div id="container">
	<div class="vtu1"></div>
	<div class="Prompt">
		<div class="Prompt_top"></div>
		<div class="Prompt_con">
			<div align="center"><iframe src="http://www.1g1g.com/" width="600" height="300" scrolling="no" frameborder="0" id="prF"></iframe></div>
			<div class="c"></div>
		</div>
		<div class="Prompt_btm"></div>
	</div>
	<div class="vtu2">
		<img src="<?php bloginfo('template_directory'); ?>/images/xiamian.gif" border="0" usemap="#Map" width="358px" height="122px" alt="电台列表">
		<map name="Map" id="Map">
			<area shape="rect" coords="12,11,76,113" href="/xiami/" alt="虾米电台">
			<area shape="rect" coords="95,11,159,113" href="/douban/" alt="豆瓣电台">
			<area shape="rect" coords="185,11,249,113" href="/sina/" alt="新浪电台">
			<area shape="rect" coords="273,11,337,113" href="/yige/" alt="亦歌电台">
		</map>
	</div>
	<div class="clearfix"></div>
	<div class="musicmore"></div>
</div>
<div class="clearfix"></div>

<?php get_footer(); ?>
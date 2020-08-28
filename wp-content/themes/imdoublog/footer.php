<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div id="site-info">
				<span class="wp_credit"><a href="<?php echo esc_url( __('http://wordpress.org/', 'twentyten') ); ?>" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'twentyten'); ?>" rel="generator"><?php _e('Powered By Wordpress', 'Twenty Ten' ); ?></a></span> Copyright &copy; 2011 - 2015  <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. <a href="http://www.miibeian.gov.cn/" target="_blank"> {渝ICP备15004698号-2} </a> Theme by Alan Ouyang. Hosting by <a href="http://www.doublog.com/go/dreamhost" target="_blank">Dreamhost</a> <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?ba666e64219bf028c8c8a545bb8d79e1";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
			</div><!-- #site-info -->

			<div id="site-generator">
				<a href="#top" rel="nofollow" title="Go to the header">Go Top</a>
			</div><!-- #site-generator -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>

<?php
/*
Template Name: cse
*/
?>
<?php 
		$options = get_option('Meiwenxinshang_options'); 
		$mwxs_google_cse = $options['google_cse_cx'];
?>

<?php get_header(); ?>

<div class="inner clearfloat">	
	<div class="right-wide" style="width:680px;float:left;min-height:1300px;height:auto;height:1300px;overflow:hidden;padding-top:10px;">
		<div id="cse" style="width: 100%;">正在从Google 加载搜索结果......</div>
			<script src="//www.google.com/jsapi" type="text/javascript"></script>
			<script type="text/javascript">
					function parseQueryFromUrl () {
						var queryParamName = "q";
						var search = window.location.search.substr(1);
						var parts = search.split('&');
							for (var i = 0; i < parts.length; i++) {
									var keyvaluepair = parts[i].split('=');
										if (decodeURIComponent(keyvaluepair[0]) == queryParamName) {
												return decodeURIComponent(keyvaluepair[1].replace(/\+/g, ' '));
										}
							}
								return '';
					}

					google.load('search', '1', {style : google.loader.themes.Default});
					google.setOnLoadCallback(function() {
						var customSearchControl = new google.search.CustomSearchControl('<?php echo($mwxs_google_cse); ?>');
							customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
						var options = new google.search.DrawOptions();
							options.setAutoComplete(true);
							options.enableSearchResultsOnly();
							customSearchControl.draw('cse', options);
						var queryFromUrl = parseQueryFromUrl();
						if (queryFromUrl) {
							customSearchControl.execute(queryFromUrl);
						}
					}, true);
			</script>
				<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />
			</div>
			
			<?php get_sidebar(); ?>
			
</div>	

		
<?php get_footer(); ?>
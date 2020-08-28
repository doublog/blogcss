<?php $options = get_option('Meiwenxinshang_options'); 
if ( $options['about_me'] ) { ?>				
<div class="widget">
	<h2>关于本站</h2>
	<div class="textwidget">
		<?php echo($options['about_me_content']); ?>
	</div>
</div>  		
<?php } ?>
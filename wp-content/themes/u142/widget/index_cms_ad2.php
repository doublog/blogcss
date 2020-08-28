<?php $options = get_option('Meiwenxinshang_options'); if ($options['index_cms_ad2']) : ?> 				
	<div align="center">
		<?php if ($options['index_cms_ad21_content']) { 
				echo($options['index_cms_ad21_content']); 
			}else{ 
		?>
			<a rel="nofollow" href="/" target="_blank"><img width="540px" height="125px" src="<?php bloginfo('template_url'); ?>/ad/index_cms_ad11.png" alt="AD540*125"></a>			
		<?php }
			if ($options['index_cms_ad22_content']) { 
				echo($options['index_cms_ad22_content']); 
			}else{ 
		?>			
		<a rel="nofollow" href="/" target="_blank"><img width="125px" height="125px" src="<?php bloginfo('template_url'); ?>/ad/ad125.png" alt="AD125*125"></a>
		<?php } ?>			
	</div>
<?php endif; ?>
<?php $options = get_option('Meiwenxinshang_options'); if ($options['index_cms_ad1']) : ?>
	<div align="center" class="index_cms_ad">
		<?php if ($options['index_cms_ad11_content']) { 
				echo($options['index_cms_ad11_content']); 
			}else{ 
		?>
			<a rel="nofollow" href="/" target="_blank"><img width="540px" height="125px" src="<?php bloginfo('template_url'); ?>/ad/index_cms_ad11.png" alt="AD540*125"></a>			
		<?php }
			if ($options['index_cms_ad12_content']) { 
				echo($options['index_cms_ad12_content']); 
			}else{ 
		?>			
		<a rel="nofollow" href="/" target="_blank"><img width="125px" height="125px" src="<?php bloginfo('template_url'); ?>/ad/ad125.png" alt="AD125*125"></a>
		<?php } ?>			
	</div>
<?php endif; ?>
<?php $options = get_option('Meiwenxinshang_options'); ?>
<?php if ($options['index_ad1'] && $options['index_ad1_post_number']) : ?> 				
		<?php if ( $i== $options['index_ad1_post_number'] ){?>	
				<div style="float:left;text-align:center;width:680px;border-bottom: 1px solid #E8E8E8;padding:10px 0 3px 0;margin-bottom:15px;">
					<?php echo($options['index_ad1_content']); ?>
				</div>
		<?php }; ?>
<?php endif; ?>	
			
<?php if ($options['index_ad2'] && $options['index_ad2_post_number']) : ?> 				
		<?php if ( $i == $options['index_ad2_post_number'] ){?>	
				<div style="float:left;text-align:center;width:680px;border-bottom: 1px solid #E8E8E8;padding:10px 0 3px 0;margin-bottom:15px;">
					<?php echo($options['index_ad2_content']); ?>
				</div>
		<?php }; ?>
<?php endif; ?>	
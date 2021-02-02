<?php if($atts['pagination'] != '0'):?>
<div class='orbit-btn-load-parent kl-load-more'>
	<button data-behaviour='oq-ajax-loading' data-list="<?php _e('#'.$atts['id']);?>" class="load-more" type="button">
		<?php _e( 'अधिक पोस्ट लोड करें', 'kl' );?>
		<i class="fa fa-refresh"></i>
	</button>
</div>
<?php endif;?>

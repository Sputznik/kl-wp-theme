<?php
	global $kl_customize;

	$icons = $kl_customize->get_social_icons();

	$option = $kl_customize->get_option();

	/* VALUES FROM THE THEME CUSTOMIZE SECTION */
	$icons_val = $option['social_media'];
	if( isset( $icons_val ) && $icons_val ):
?>
<div class="kl-topbar-social">
  <div class="topbar-social-inner">
    <?php foreach( $icons as $slug => $icon ): if( isset( $icons_val[ $slug ] ) && $icons_val[ $slug ] ):?>
      <?php if( $slug == 'login' ): ?>
        <a href="<?php _e( $icons_val[ $slug ] );?>"><?php _e( $icon['label'] );?></a>
			<?php elseif( $slug == 'mail' ): ?>
				<a href="mailto:<?php _e( $icons_val[ $slug ] );?>"><i class="<?php _e( $icon['icon'] )?>"></i></a>
      <?php else: ?>
        <a href="<?php _e( $icons_val[ $slug ] );?>" target="_blank"><i class="<?php _e( $icon['icon'] )?>"></i></a>
      <?php endif;?>
    <?php endif; endforeach;?>
  </div>
</div>
<?php endif;?>

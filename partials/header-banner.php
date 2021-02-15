<?php
  global $kl_customize;

  $option = $kl_customize->get_option();
  if( isset( $option['banner'] ) && $option['banner'] ){
    $banner_src = !empty( $option['banner']['img_src'] ) ? $option['banner']['img_src'] : "";
    $banner_redirect = !empty( $option['banner']['redirect_url'] ) ? $option['banner']['redirect_url'] : "";
    _e('<div class="header-banner"><a href="'.$banner_redirect.'" target="_blank">');
    _e('<img src="'.$banner_src.'" alt="Banner" />');
    _e('</a></div>');
  }
?>

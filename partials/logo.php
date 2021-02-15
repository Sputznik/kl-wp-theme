<?php
global $kl_customize;

$option = $kl_customize->get_option();

if( isset( $option['logo'] ) && $option['logo'] ){

  $img_alt = isset( $option['logo']['alt'] ) ? $option['logo']['alt'] : "";

  $kl_logo_url = apply_filters( 'kl_logo_url', get_bloginfo('url') );

  /* CONTAINER */
  _e('<div class="logo logo-'.$screen_type.'"><a href="'.$kl_logo_url.'">');

  /*DESKTOP LOGO*/
  if( isset( $option['logo']['desktop'] ) && $option['logo']['desktop'] && $screen_type == 'desktop'){

    $img_desktop_src = esc_url( $option['logo']['desktop'] );

    _e('<img src="'.$img_desktop_src.'" alt="'.$img_alt.'">');
  }

  /* MOBILE LOGO */
  if( isset( $option['logo']['mobile'] ) && $option['logo']['mobile'] && $screen_type == 'mobile' ){

    $img_mobile_src = ( isset( $option['logo']['mobile'] ) && $option['logo']['mobile'] ) ? esc_url( $option['logo']['mobile'] ) : esc_url( $option['logo']['desktop'] );

    _e('<img src="'.$img_mobile_src.'" alt="'.$img_alt.'">');

  }

  // END OF CONTAINER
  _e('</a></div>');
}

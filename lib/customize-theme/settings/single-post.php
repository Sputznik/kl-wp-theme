<?php
add_action( 'customize_register', function( $wp_customize ){

  global $kl_customize;

  $kl_customize->section( $wp_customize, 'kl_theme_panel', 'kl_single_post_section', 'Single Post Section', 'Single Post Settings' );

  $kl_customize->text( $wp_customize, 'kl_single_post_section', '[single_post_categories]', "Comma separated category ID's", '');

});

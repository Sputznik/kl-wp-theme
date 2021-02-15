<?php

	add_action( 'customize_register', function( $wp_customize ){

		global $kl_customize;

		$kl_customize->panel( $wp_customize, 'kl_theme_panel', 'Theme Options' );

    $kl_customize->section( $wp_customize, 'kl_theme_panel', 'kl_general_section', 'General', 'General Options' );

    /* Excerpt Length */
    $kl_customize->text( $wp_customize, 'kl_general_section', '[default][excerpt_length]', 'Excerpt Length', '30' );

	});

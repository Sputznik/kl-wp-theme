<?php

	add_action( 'customize_register', function( $wp_customize ){

		global $kl_customize;

		$kl_customize->section( $wp_customize, 'kl_theme_panel', 'kl_topbar_section', 'Topbar ', 'Topbar Options' );

		// Title
		$kl_customize->text( $wp_customize, 'kl_topbar_section', '[topbar][title]', 'Title', 'News' );

		// FETCH ALL THE POST CATEGORIES
	  $categories_arr = $kl_customize->kl_post_categories();

	  $kl_customize->dropdown( $wp_customize, 'kl_topbar_section', '[topbar][category]', 'Select Post Category', 'all', $categories_arr );

		$kl_customize->text( $wp_customize, 'kl_topbar_section', '[topbar][posts_count]', 'Posts Count', '10');

	});

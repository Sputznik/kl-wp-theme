<?php

	add_action('customize_register', function( $wp_customize ){

		global $kl_customize;

		$kl_customize->section( $wp_customize, 'kl_theme_panel', 'kl_social_media_section', 'Social Media', '');

		$icons = $kl_customize->get_social_icons();

		foreach( $icons as $slug => $icon ){
			$kl_customize->text( $wp_customize, 'kl_social_media_section', '[social_media]['.$slug.']', $icon['label'], '');
		}

	});

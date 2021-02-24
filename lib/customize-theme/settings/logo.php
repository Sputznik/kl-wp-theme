<?php

	add_action( 'customize_register', function( $wp_customize ){

		global $kl_customize;

		$kl_customize->section( $wp_customize, 'kl_theme_panel', 'kl_logo_section', 'Logo & Header Type', 'Upload your logo' );

		/* Desktop Logo */
		$kl_customize->image( $wp_customize, 'kl_logo_section', '[logo][desktop]', 'Logo', '' );

		/* Mobile Logo */
		$kl_customize->image( $wp_customize, 'kl_logo_section', '[logo][mobile]', 'Mobile Logo', '' );

		/* Logo Alt Text */
		$kl_customize->textarea( $wp_customize, 'kl_logo_section', '[logo][alt]', 'Logo Alt Text', '' );

		/* Header Type */
		$headers_arr = apply_filters( 'kl_headers_options', array(
			'header1' => 'Default'
		));

		$kl_customize->dropdown( $wp_customize, 'kl_logo_section', '[header_type]', 'Header Type', 'header1', $headers_arr );

		/* Header Banner */
		$kl_customize->image( $wp_customize, 'kl_logo_section', '[banner][img_src]', 'Banner Image For Header 1', '' );

		/* Header Banner Redirect Url */
		$kl_customize->text( $wp_customize, 'kl_logo_section', '[banner][redirect_url]', 'Banner Redirect Url', '');

		$kl_customize->checkbox( $wp_customize, 'kl_logo_section', '[show_topbar]', 'Show Topbar' );

	});

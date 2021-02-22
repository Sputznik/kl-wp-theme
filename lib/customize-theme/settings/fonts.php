<?php

	add_action('customize_register', function( $wp_customize ){

		global $kl_customize;

		$kl_customize->section( $wp_customize, 'kl_theme_panel', 'kl_font_section', 'Fonts', 'Select Typography');

		// FONT FAMILIES

		$google_fonts = apply_filters( 'kl_list_google_fonts', array(
  			array(
  				'slug'	=> 'opensans',
	  			'name'	=> 'Open Sans',
  				'url'	=> 'Open+Sans:400,400italic,700,700italic'
  			),
  			array(
  				'slug'	=> 'roboto',
	  			'name'	=> 'Roboto',
  				'url'	=> 'Roboto:400,400italic,700,700italic'
  			),
  		));

		$fonts_arr = array();

		foreach( $google_fonts as $google_font ){
			$fonts_arr[$google_font['name']] = $google_font['name'];
		}

		$font_locations = array(
			'[head]'	=> 'Heading Font',
			'[nav]'		=> 'Navigation Font',
			'[body]'	=> 'Body Font'
		);

		foreach( $font_locations as $location_id => $label ){
			$kl_customize->dropdown( $wp_customize, 'kl_font_section', '[font_family]'.$location_id, $label, 'Open Sans', $fonts_arr);
			$kl_customize->text( $wp_customize, 'kl_font_section', '[font_size]'.$location_id, 'Font Size for '.$label, '12px');
		}

	});

	add_action( 'kl_google_fonts_url', function(){

		global $kl_customize;

		/** GET FONTS SELECTED THROUGH CUSTOMIZE */
		$custom_kl_fonts = apply_filters('kl_font_family', array(
			'body'	=> 'Open Sans',
			'head'	=> 'Open Sans',
			'nav'	=> 'Open Sans'
		));

		$font_face = array();

		foreach( $custom_kl_fonts as $font ){

			// CHECK IF FONT IS EMPTY
			if( $font ){ $font_face[] = $font; }
		}

		// DEFAULT FONT IF NONE IS SELECTED THROUGH CUSTOMIZE
		if( ! count( $font_face ) ){
			$font_face[] = "Open Sans";
		}
		/* END OF SELECTED FONTS */



		/* LIST OF ALL THE FONTS */
		$google_fonts = apply_filters( 'kl_list_google_fonts', array(
  			array(
  				'slug'	=> 'opensans',
	  			'name'	=> 'Open Sans',
  				'url'	=> 'Open+Sans:400,400italic,700,700italic'
  			),
  			array(
  				'slug'	=> 'roboto',
	  			'name'	=> 'Roboto',
  				'url'	=> 'Roboto:400,400italic,700,700italic'
  			),
  		));

		$google_fonts_url = "//fonts.googleapis.com/css?family=";

		// ENQUEUE FONTS THAT ARE SELECTED
		foreach( $google_fonts as $google_font ){
			if( in_array( $google_font['name'], $font_face ) ){
				$google_fonts_url .= $google_font['url']."|";
			}
		}

		return $google_fonts_url;

	});

	add_filter('kl_font_family', function( $kl_font_family ){

		global $kl_customize;
		$option = $kl_customize->get_option();

		/* ITERATING THROUGH EACH ELEMENT */
		foreach( $kl_font_family as $element => $font_family ){

			/* IF FONT FAMILY HAS BEEN SELECTED */
			if( isset( $option['font_family'] ) && isset( $option['font_family'][$element] ) ){
				$kl_font_family[ $element ] = $option['font_family'][$element];
			}
		}

		return $kl_font_family;
	});

	/* ADD FONT FAMILY TO THE BODY */
	add_action('kl_body_styles', function(){

		global $kl_customize;

		$fonts = apply_filters('kl_font_family', array(
			'body'	=> 'Open Sans',
			'head'	=> 'Open Sans',
			'nav'	=> 'Open Sans'
		));

		echo "body{ ";

		if( isset( $fonts['body'] ) ){
			echo "font-family: '".$fonts['body']."',sans-serif;";
		}

		$option = $kl_customize->get_option();

		if( isset( $option['font_size'] ) && $option['font_size'] && isset( $option['font_size']['body'] ) ){
			echo "font-size: ".$option['font_size']['body'].";";
		}

		echo "}\n";

	});

	/* ADD FONT FAMILY TO HEADER ELEMENTS AND NAVIGATION */
	add_action('kl_styles', function(){

		global $kl_customize;

		$fonts = apply_filters('kl_font_family', array(
			'body'	=> 'Open Sans',
			'head'	=> 'Open Sans',
			'nav'	=> 'Open Sans'
		));

		$option = $kl_customize->get_option();

		$elements = array(
			'head' 	=> 'h1,h2,h3,h4,h5,h6',
			'nav'	=> 'nav'
		);

		do_action('kl_body_styles');

		foreach( $elements as $element => $selector ){

			if( ( isset($fonts[ $element ]) ) || ( isset( $option['font_size'] ) && $option['font_size'] && isset( $option['font_size'][ $element ] ) ) ){

				// PRINT SELECTOR
				_e($selector."{ ");

				// ADD FONT FAMILY
				if( isset($fonts[ $element ]) ){ _e("font-family: '".$fonts[ $element ]."',sans-serif;"); }

				// ADD FONT SIZE
				if( isset( $option['font_size'] ) && $option['font_size'] && isset( $option['font_size'][ $element ] ) ){
					echo "font-size: ".$option['font_size'][ $element ].";";
				}

				_e("}");
			}
		}


	});

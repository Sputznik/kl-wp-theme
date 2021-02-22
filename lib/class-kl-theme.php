<?php

class KL_THEME{

	function __construct(){

		/* LOAD THEME ASSETS */
		add_action('wp_enqueue_scripts', array( $this, 'assets' ) );

	}

	function assets(){

		//ENQUEUE STYLES
		wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', false, null );

		wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, null );

		$google_fonts_url = apply_filters('kl_google_fonts_url', 'http://fonts.googleapis.com/css?family=Oswald:300,400');

		wp_enqueue_style('google-fonts', $google_fonts_url, false, null );

		wp_enqueue_style('kl-core-style', KL_THEME_URL.'/css/main.css', array('bootstrap', 'font-awesome', 'google-fonts' ), time() );

		wp_enqueue_style('hindi-google-fonts', 'https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&display=swap', array('kl-core-style'), '1.0.0' );


		//ENQUEUE SCRIPTS
		wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array('jquery'), null, true );

		wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js', array('jquery'), null, true);

		wp_enqueue_script( 'kl-core-js', KL_THEME_URL.'/js/main.js', array('bootstrap'), time(), true );

		wp_enqueue_script( 'kl-sticky-sidebar', KL_THEME_URL.'/js/theia-sticky-sidebar.js', array('jquery'), null, true );

		// KL POST VIEWS COUNT
		if( is_singular() ){
			wp_enqueue_script('kl-post-views',KL_THEME_URL.'/js/kl-post-view-count.js', array('jquery'), time(), true );
			wp_localize_script( 'kl-post-views', 'KL_POST_VIEW', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
		    'token' =>  wp_create_nonce('kl_post_view_count')
		  ) );
		}

	}


}

global $kl_theme;

$kl_theme = new KL_THEME;

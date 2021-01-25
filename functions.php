<?php

define('KL_THEME_PATH', get_template_directory() );
define('KL_THEME_URL', get_template_directory_uri() );

/*ENQUEUE STYLES*/
add_action('wp_enqueue_scripts',function(){
  wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', false, null );
  wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, null );
  wp_enqueue_style('kl-css', KL_THEME_URL.'/css/main.css', array('bootstrap', 'font-awesome'), time() );
  wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array('jquery'), null, true );

  wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js', array('jquery'), null, true);
  wp_enqueue_script( 'kl-js', KL_THEME_URL.'/js/main.js', array('bootstrap'), time(), true );
  wp_enqueue_script( 'kl-sticky-sidebar', KL_THEME_URL.'/js/theia-sticky-sidebar.js', array('jquery'), null, true );


});

// INCLUDE FILES
$inc_files = array(
  'lib/wp-bootstrap-navwalker.php',
  'lib/kl-hooks/kl-hooks.php'
);

foreach( $inc_files as $inc_file ){ require_once( $inc_file ); }

/* HIDE ADMIN BAR FROM THE FRONTEND */
add_filter('show_admin_bar', '__return_false');

/** REGISTERING NAV MENU */
add_action( 'init', function(){
  register_nav_menus( array(
    'primary' 	=> __( 'Primary Menu', 'kl' ),
    'footer'    => __( 'Footer Menu', 'kl' )
  ));
});

add_action( 'after_setup_theme', function() {
	add_theme_support( 'post-formats', array( 'standard', 'gallery', 'video', 'audio', 'link', 'quote' ) ); //Post formats
	add_theme_support( 'post-thumbnails' ); // Post thumbnails
});

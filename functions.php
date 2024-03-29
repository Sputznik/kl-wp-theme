<?php
define('KL_THEME_PATH', get_template_directory() );
define('KL_THEME_URL', get_template_directory_uri() );

// INCLUDE FILES
$inc_files = array(
  'lib/class-kl-theme.php',
  'lib/wp-bootstrap-navwalker.php',
  'lib/customize-theme/customize-theme.php',
  'lib/kl-orbit-cf/kl-orbit-cf.php',
  'lib/kl-hooks/kl-hooks.php',
  'lib/google-fonts.php',
  'lib/kl-utils/kl-utils.php'
);

foreach( $inc_files as $inc_file ){ require_once( $inc_file ); }

/* HIDE ADMIN BAR FROM THE FRONTEND */
add_filter('show_admin_bar', '__return_false');

/** REGISTERING NAV MENU */
add_action( 'init', function(){
  register_nav_menus( array(
    'primary' 	=> __( 'Primary Menu', 'kl' ),
    'footer'    => __( 'Footer Menu', 'kl' ),
    'topbar'    => __( 'Topbar Menu', 'kl' )
  ));
});

add_action( 'after_setup_theme', function() {
	add_theme_support( 'post-formats', array( 'standard', 'gallery', 'video', 'audio', 'link', 'quote' ) ); //Post formats
	add_theme_support( 'post-thumbnails' ); // Post thumbnails
});

/* ADD SOW FROM THE THEME */
add_action('siteorigin_widgets_widget_folders', function( $folders ){
  $folders[] = get_template_directory() . '/so-widgets/';
  return $folders;
});

/* REMOVE WOOCOMMERCE PRODUCT ZOOM FEATURE */
add_filter('woocommerce_single_product_zoom_enabled', '__return_false');

/* ADD CLASSIFICATION TAG TO RSS FEED ITEMS */
add_action('rss2_item', 'add_classification_to_rss_nodes');
function add_classification_to_rss_nodes() {
	echo("<classification>UA13+</classification>");
}

<?php
include('kl-widgets.php');

/*  KL NUMBERED PAGINATION */
if ( ! function_exists( 'kl_numbered_pagination' ) ) {
	function kl_numbered_pagination() {

    global $wp_query;

    $current_page = max( 1, get_query_var( 'paged' ) );
		$big = 9999999;

		$pagination = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
      'type'   => 'list',
			'current' => $current_page,
			'total'  => $wp_query->max_num_pages,
			'prev_text'    => '<i class="fa fa-angle-left"></i>',
			'next_text'    => '<i class="fa fa-angle-right"></i>',
		) );

		if( $pagination ) { return '<div class="kl-pagination">'. $pagination . '</div>'; }
	}
}
/* KL CATEGORY PARENTS */
if ( ! function_exists( 'kl_category_parents' ) ) {
	function kl_category_parents( $cat_id ) {
		$level  = '';
		$parent = get_term( $cat_id, 'category' );

		if( is_wp_error( $parent ) ){ return ''; }

		$name = $parent->name;

		if ( $parent->parent && ( $parent->parent != $parent->term_id ) ) {
			$level .= kl_get_category_parents( $parent->parent );
		}

		$level .= '<span><a class="crumb" href="' . esc_url( get_category_link( $parent->term_id ) ) . '">' . $name . '</a></span><i class="fa fa-angle-right"></i>';

		return $level;
	}
}

/* KL CUSTOM LOGIN LOGO */
add_action( 'login_enqueue_scripts', function(){
	?>
	<style type="text/css">
		body {
			background-color: #ffffff !important;
		}
		#login h1 a, .login h1 a {
			background-image: url(<?php echo get_template_directory_uri(); ?>/images/kl-login-logo.png);
			width:300px;
			height:217px;
			background-size: 300px 217px;
			box-shadow: none;
		}
	</style>
	<?php
});

/* KL CUSTOM LOGIN LOGO URL */
function my_custom_login_url( $url ) {
  return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_custom_login_url', 10, 1 );

/* EXCERPT LENGTH */
add_filter( 'excerpt_length', function( $length ){
	global $kl_customize;

	$default_length = $kl_customize->get_theme_option('default', 'excerpt_length', 30 );
	return $default_length;

});

/* EXCERPT MORE */
add_filter( 'excerpt_more', function( $more ){
	return '&hellip;';
});


/* INCLUDES THE SOCIAL SHARE TEMPLATE */
add_action('kl_social_share', function( $style ){

	// $style = default, wrap-center, wrap-center-page

  $template = apply_filters('kl_social_share_template', KL_THEME_PATH.'/lib/templates/share.php');
  include( $template );

}, 1);

/* INCLUDES THE TOPBAR TEMPLATE */
add_action('kl_topbar', function(){

	global $kl_customize;

  $template = apply_filters('kl_topbar_template', KL_THEME_PATH.'/partials/topbar.php');
  include( $template );

}, 1);

/* INCLUDES THE TOPBAR SOCIAL TEMPLATE */
add_action('kl_topbar_social', function(){

  $template = apply_filters('kl_topbar_social_template', KL_THEME_PATH.'/partials/social_icons.php');
  include( $template );

}, 1);

/* INCLUDES THE HEADER TEMPLATE */
add_action('kl_header', function(){

	global $kl_customize;

	$header_type = $kl_customize->get_header_type();

	$header_template = apply_filters( 'kl_'.$header_type.'_template', KL_THEME_PATH.'/partials/headers/'.$kl_customize->get_header_type().'.php' );

	require_once( $header_template );

});

/* PRINT LOGOS TO THE HEADER */
add_action('kl_logo', function( $screen_type ){

	$template = apply_filters('kl_logo_template', KL_THEME_PATH.'/partials/logo.php');

	include( $template );

}, 1);

/* INCLUDES THE FEATURED SLIDER */
add_action('kl_featured_slider',function(){
  $shortcode_str = do_shortcode( '[orbit_query style="featured-slider" posts_per_page="12" category_name="district"]' );
	if( strlen( $shortcode_str ) > 0 ){
		echo $shortcode_str;
	}
});

/* INCLUDES THE SINGLE POST PAGINATION TEMPLATE */
add_action('kl_post_pagination', function(){

  $template = apply_filters('kl_post_pagination_template', KL_THEME_PATH.'/lib/templates/single_post_pagination.php');
  include( $template );

}, 1);

/* INCLUDES THE STICKY SIDEBAR */
add_action( 'kl_sticky_sidebar', function( $kl_sidebar_id ){

	if( is_active_sidebar( $kl_sidebar_id ) && $kl_sidebar_id ){
		echo "<div id='kl-sticky-sidebar'><div class='theiaStickySidebar'>";
		dynamic_sidebar( $kl_sidebar_id );
		echo "</div></div>";
	}

});

/* INCLUDES THE NORMAL SIDEBAR */
add_action( 'kl_sidebar', function( $kl_sidebar_id ){

	if( is_active_sidebar( $kl_sidebar_id ) && $kl_sidebar_id ){
		dynamic_sidebar( $kl_sidebar_id );
	}

});

/* MODIFY SEARCH RESULTS PAGE */
function kl_search_filter( $query ){
  if( ! is_admin() && $query->is_main_query() ){
    if( $query->is_search ){
        $query->set( 'post_type', 'post' );
    }
  }
}
add_action( 'pre_get_posts', 'kl_search_filter' );


/* HEADER MENU ATTRIBUTES */
add_action('kl_nav_menu', function(){

	$kl_nav_menu_options = apply_filters( 'kl_nav_menu_options', array(
		'menu'              => 'primary',
		'theme_location'    => 'primary',
		'depth'             => 2,
		'container'         => false,
		// 'container'         => 'div',
		// 'container_class'   => 'container',
		//'container_id'      => 'sidebar-wrapper',
		'menu_class'        => 'menu',
		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		'walker'            => new wp_bootstrap_navwalker()
	));

	wp_nav_menu( $kl_nav_menu_options );

});

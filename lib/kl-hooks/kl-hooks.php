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

/* EXCERPT LENGTH */
add_filter( 'excerpt_length', function( $length ){
	return 30;
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

	$header_template = apply_filters( 'kl_header1_template', KL_THEME_PATH.'/partials/headers/header1.php' );

	require_once( $header_template );

});

/* INCLUDES THE SINGLE POST PAGINATION TEMPLATE */
add_action('kl_post_pagination', function(){

  $template = apply_filters('kl_post_pagination_template', KL_THEME_PATH.'/lib/templates/single_post_pagination.php');
  include( $template );

}, 1);

/* INCLUDES THE SIDEBAR */
add_action( 'kl_sidebar', function( $kl_sidebar_id ){

	if( is_active_sidebar( $kl_sidebar_id ) && $kl_sidebar_id ){
		if( $kl_sidebar_id === 'kl-main-sidebar' ){
			echo "<div id='kl-sticky-sidebar'><div class='theiaStickySidebar'>";
			dynamic_sidebar( $kl_sidebar_id );
			echo "</div></div>";
		}
		else{ dynamic_sidebar( $kl_sidebar_id ); }
	}

});

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

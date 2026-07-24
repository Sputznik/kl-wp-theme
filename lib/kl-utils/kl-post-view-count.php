<?php

class KL_POST_VIEW_COUNT{

	var $count_meta_key;

	function __construct() {

		$this->count_meta_key = 'penci_post_views_count';

		add_action( 'wp_ajax_kl_view_count', array( $this, 'update_count_ajax' ) );
		add_action( 'wp_ajax_nopriv_kl_view_count', array( $this, 'update_count_ajax' ) );
		add_filter( 'manage_post_posts_columns', array( $this, 'register_post_columns' ) );
    add_action( 'manage_post_posts_custom_column', array( $this, 'post_columns_content' ), 10, 2 );
		add_filter( 'manage_edit-post_sortable_columns', array( $this, 'register_sortable_columns' ) );
		add_action( 'pre_get_posts', array( $this, 'sort_posts_by_views' ) );

	}

	function update_count_ajax(){

		// CHECK TOKEN / NONCE
	  if( !check_ajax_referer('kl_post_view_count', 'token') ){
	    return wp_send_json_error( 'Invalid Token' );
	  }

		if( isset( $_POST['post_id'] ) && !empty( $_POST['post_id'] ) ){

			$cookie_id = 'kl-pc-'.$_POST['post_id'];

			if( !isset( $_COOKIE[$cookie_id] ) ) {

				// UPDATE COUNT
				$this->update_count( $_POST['post_id'] );

				// SET COOKIE TO PREVENT INCREMENT ON REFRESH
				setcookie( $cookie_id, "incremented", time() + ( 60 * 30 ) );

			}

		}

		wp_die();

	}

	function update_count( $postid ){

		$count = $this->get_count( $postid );

		if ( !$count ) {
			// echo "Count is not set";
			delete_post_meta( $postid, $this->count_meta_key );
			add_post_meta( $postid, $this->count_meta_key, 1 );
		}
		else {
			$count ++;
			// echo "Count is already set";
			update_post_meta( $postid, $this->count_meta_key, $count );
		}

	}

	// RETURNS POST VIEWS COUNT
	function get_count( $postid ){
		$count = get_post_meta( $postid, $this->count_meta_key, true );
		return ( !empty( $count ) ? $count : 0 );
	}

	function register_post_columns( $columns ) {
		$columns['kl_post_views'] = 'Views';
		return $columns;
	}

	function post_columns_content( $column_name, $post_id ){
		if( $column_name === 'kl_post_views' ){
			echo $this->get_count( $post_id );
		}
	}

	function register_sortable_columns( $columns ){
		$columns['kl_post_views'] = 'kl_post_views';

		$columns['kl_post_views'] = array(
			'kl_post_views',
			true,
			'Views',
			'Table ordered by Views.',
			'desc'
		);

		return $columns;
	}

	function sort_posts_by_views( $query ) {
		$orderby = $query->get( 'orderby');

		if( !is_admin() || !$query->is_main_query() || $orderby !== 'kl_post_views' || get_current_screen()->id !== 'edit-post' ){
			return;
		}

		$query->set( 'meta_key', $this->count_meta_key );
		$query->set( 'orderby', 'meta_value_num' );
	}

}

global $kl_post_view_count;
$kl_post_view_count = new KL_POST_VIEW_COUNT;

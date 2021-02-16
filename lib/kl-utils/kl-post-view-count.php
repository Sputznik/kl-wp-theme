<?php

class KL_POST_VIEW_COUNT{

	var $count_meta_key;

	function __construct() {

		$this->count_meta_key = 'penci_post_views_count';

		add_action( 'wp_ajax_kl_view_count', array( $this, 'update_count_ajax' ) );
		add_action( 'wp_ajax_nopriv_kl_view_count', array( $this, 'update_count_ajax' ) );

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

}

global $kl_post_view_count;
$kl_post_view_count = new KL_POST_VIEW_COUNT;

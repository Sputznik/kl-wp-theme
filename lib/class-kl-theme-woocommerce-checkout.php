<?php

class KL_THEME_WOOCOMMERCE_CHECKOUT {

  function __construct(){

    // REMOVE FIELDS FROM CHECKOUT PAGE
    add_filter( 'woocommerce_checkout_fields', array( $this, 'remove_checkout_fields' ) );

    // REMOVE FIELDS FROM ADDITIONAL INFORMATION SECTION
    add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

    add_action( 'init', array( $this, 'init_cb' ) );

  }

  function remove_checkout_fields( $fields  ){
    $arr = array(
      'billing' => array( 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_postcode', 'billing_state' )
    );

    foreach ( $fields as $section => $section_fields ){
      if( isset( $arr[$section] ) ){
        $arr_len = count( $arr[$section] );
        for( $i = 0; $i < $arr_len; $i++ ){
          unset( $fields[$section][$arr[$section][$i]] );
        }
      }
    }

    return $fields;
  }

  function init_cb(){
    // REMOVE THE COUPON SECTION FROM ITS DEFAULT POSITION
    remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

    // MOVE THE COUPON SECTION BELOW THE CHECKOUT FORM
    add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
  }

}

new KL_THEME_WOOCOMMERCE_CHECKOUT;

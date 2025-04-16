<?php

class KL_THEME_WOOCOMMERCE_MY_ACCOUNT {

  function __construct(){

    // REMOVE ITEMS FROM ACCOUNT MENU
    add_filter( 'woocommerce_account_menu_items', array( $this, 'remove_account_menu_items' ) );

  }

  function woocommerce_before_account_navigation(){
    include( KL_THEME_PATH.'/partials/before-account-navigation.php' );
  }

  function remove_account_menu_items( $items ){
    $item_to_remove = 'downloads';

    if( array_key_exists( $item_to_remove, $items ) ){
      unset( $items[$item_to_remove] );
    }

    return $items;
  }

}

new KL_THEME_WOOCOMMERCE_MY_ACCOUNT;

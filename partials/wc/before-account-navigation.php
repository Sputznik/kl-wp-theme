<?php
  $current_user_name = "";
  $current_user = get_user_by( 'id', get_current_user_id() );

  if( isset( $current_user->first_name ) && !empty( $current_user->first_name ) ){
    $current_user_name = $current_user->first_name;
  } elseif ( isset( $current_user->display_name ) && !empty( $current_user->display_name ) ) {
    $current_user_name = $current_user->display_name;
  } else {
    $current_user_name = "Subscriber";
  }
?>
<div class="kl-before-account-navigation">
  <h1>Hi, <?php _e( ucwords($current_user_name) ); ?>!</h1>
  <p>Welcome to your KL Hatke account dashboard. You can find the latest KL Hatke stories below, or view your recent orders,
  manage your billing address, and edit your password and account details here.</p>
</div>

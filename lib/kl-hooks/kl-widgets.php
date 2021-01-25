<?php
add_action( 'widgets_init', function(){

  register_sidebar( array(
    'name' 			    => 'Main Sidebar',
    'id' 			      => 'kl-main-sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

  register_sidebar( array(
    'name' 			    => 'Pre Footer',
    'id' 			      => 'pre-footer-sidebar',
    'description' 	=> 'Appears before the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

});

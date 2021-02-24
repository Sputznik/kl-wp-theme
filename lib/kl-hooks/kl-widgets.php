<?php
add_action( 'widgets_init', function(){

  register_sidebar( array(
    'name' 			    => 'Main Sidebar',
    'description'   => 'Appears in the single post, category page before the pre-footer area',
    'id' 			      => 'kl-main-sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

  register_sidebar( array(
    'name' 			    => 'Archive Sidebar',
    'description'   => 'Appears in the search page , archive page before the pre-footer area',
    'id' 			      => 'kl-archive-sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

  register_sidebar( array(
    'name' 			    => 'Sidebar for Pages',
    'description'   => 'Appears in the pages before the pre-footer area',
    'id' 			      => 'kl-page-sidebar',
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

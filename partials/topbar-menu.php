<!-- TOPBAR MENU -->
<div class="kl-topbar-menu">
  <?php
    wp_nav_menu( array(
      'menu' 						=> 'topbar',
      'theme_location' 	=> 'topbar',
      'depth' 					=> 2,
      'container' 			=> false,
      'menu_class' 			=> 'topbar-menu list-unstyled',
      'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
      'walker'          => new wp_bootstrap_navwalker()
    ) );
  ?>
</div>

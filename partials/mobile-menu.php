<a id="close-mobile-nav" class="header-1"><i class="fa fa-close"></i></a>
<nav id="mobile-nav" class="header-1">
	<?php do_action('kl_logo', 'mobile');?>
  <?php do_action('kl_topbar_social');?>
  <?php do_action('kl_nav_menu');?>
  <?php if( is_active_kl_topbar() ){ do_action('kl_topbar_menu'); }?>
</nav>

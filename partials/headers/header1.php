<a id="close-mobile-nav" class="header-1"><i class="fa fa-close"></i></a>
<nav id="mobile-nav" class="header-1">
	<?php do_action('kl_logo', 'mobile');?>
  <?php do_action('kl_topbar_social');?>
  <?php do_action('kl_nav_menu');?>
</nav>
<?php do_action('kl_topbar');?>
<div class="header1">
  <div class="inner-header">
    <div class="container">
			<?php do_action('kl_logo','desktop'); ?>
      <?php include( KL_THEME_PATH.'/partials/header-banner.php' );?>
    </div>
  </div>
  <!-- Navigation -->
  <nav id="kl-navigation" class="header-layout-bottom">
    <div class="container">
      <div class="button-menu-mobile header-3"><i class="fa fa-bars"></i></div>

      <?php do_action('kl_nav_menu');?>

      <!-- SEARCH BAR -->
      <div class="kl-search">
        <div class="kl-search-inner">
          <a href="#" class="btn-search"><i class="fa fa-search"></i></a>
          <div class="search-field">
            <?php get_search_form(); ?>
            <a class="btn-search btn-close-search"><i class="fa fa-close"></i></a>
          </div>
        </div>
      </div>

    </div>
  </nav>
</div>

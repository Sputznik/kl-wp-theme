<?php
  $shortcode_str = do_shortcode('[orbit_query style="stories" posts_per_page="8" tax_query="category:premium"]');
?>
<div class="kl-account-dashboard-content">
  <h1 class="text-center">Recent Hatke Stories</h1>
  <div class="premium-stories-wrapper">
    <?php if( strlen( $shortcode_str ) > 0 ): $premium_cat_id = get_cat_ID( 'premium' ); ?>
      <div class="kl-full-width-stretched-row-wrapper">
        <div class="kl-full-width-stretch" data-behaviour="kl-full-width-stretched-row">
          <?php echo $shortcode_str; ?>
        </div>
      </div>
      <?php if( $premium_cat_id ): ?>
        <div class="text-center btn-more-premium-stories-wrapper">
          <a href="<?php _e( get_category_link( $premium_cat_id ) ); ?>" class="btn-more-premium-stories">More Premium Stories</a>
        </div>
      <?php endif;?>
    <?php else:?>
      <p class="text-center h4">We could not find any posts.</p>
    <?php endif; ?>
  </div>
</div>

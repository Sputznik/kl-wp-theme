<div class="kl-featured-list-wrapper">
  <div class="headline">
    <h3><?php _e( 'नवीनतम अपडेट' ,'kl'); ?></h3>
  </div>
  <ul id="<?php _e( $atts['id'] );?>" data-target="<?php _e('li.kl-post');?>" data-url="<?php _e( $atts['url'] );?>" class="kl-featured-list">
    <?php while( $this->query->have_posts() ) : $this->query->the_post(); ?>
    <li class="kl-post">
      <?php get_template_part( 'partials/featured', 'list' ); ?>
    </li>
    <?php endwhile;?>
  </ul>
</div> <!-- Featured Wrapper -->

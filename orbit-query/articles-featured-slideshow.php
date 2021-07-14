<div class="kl-featured-slider-wrapper">
  <div class="container">
    <ul id="<?php _e( $atts['id'] );?>" data-target="<?php _e('li.kl-post');?>"  data-auto="true" data-autotime="6000" data-speed="600" data-url="<?php _e( $atts['url'] );?>" class="kl-featured-slider slideshow">
      <?php while( $this->query->have_posts() ) : $this->query->the_post(); ?>
        <li class="kl-post">
          <?php get_template_part( 'partials/featured', 'slideshow' ); ?>
        </li>
      <?php endwhile;?>
    </ul>
  </div>
</div> <!-- Featured Wrapper -->

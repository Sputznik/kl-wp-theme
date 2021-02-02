<div class="kl-featured-wrapper">
  <?php $featured_cat = get_category_by_slug( $atts['category_name'] ); ?>
  <div class="headline">
    <a href="<?php echo esc_url( get_category_link( $featured_cat->term_id ) ); ?>"><?php _e( $featured_cat->name ,'kl'); ?></a>
  </div>
  <ul id="<?php _e( $atts['id'] );?>" data-target="<?php _e('li.post-item');?>" data-url="<?php _e( $atts['url'] );?>" class="kl-featured-grid">
    <?php $i = 1; while( $this->query->have_posts() ) : $this->query->the_post();?>
    <li class="post-item<?php if( $i == 1){ echo ' wide'; }?>">
      <?php include( locate_template( 'partials/featured-grid.php' ) ); ?>
    </li>
    <?php $i++; endwhile;?>
  </ul>
</div> <!-- Featured Wrapper -->

<!-- TOP BAR -->
<div class="kl-top-bar">
  <div class="container">
    <div class="kl-headline">
      <span class="headline-title">
        <?php _e( $kl_customize->get_theme_option('topbar', 'title', 'News' ), 'kl'); ?>
      </span>
      <?php do_action('kl_topbar_social');?>
      <?php
        $posts_count = $kl_customize->get_theme_option('topbar', 'posts_count', '10' );
        $posts_category    = $kl_customize->get_theme_option('topbar', 'category', 'all' );
        $args = array(
          'post_type'	  => 'post',
          'showposts'	  =>	$posts_count,
          'cat'				  =>	$posts_category != 'all' ? $posts_category : '',
          'post_status'	=>	'publish'
        );
        $query = new WP_Query( $args );
        if( $query->have_posts() ):
      ?>
        <div class="kl-topbar-posts" data-auto="true" data-autotime="3000" data-speed="300" data-direction="vertical" data-behaviour="kl-topbar-posts">
          <?php while( $query->have_posts() ): $query->the_post(); $title_full = get_the_title(); ?>
            <div>
              <a class="kl-topbar-post-title" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 8, '...' ); ?></a>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      <?php endif;?>
    </div>
  </div>
</div>
<!-- TOP BAR -->

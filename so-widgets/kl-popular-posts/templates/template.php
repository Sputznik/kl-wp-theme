<?php
  $args = array(
            'posts_per_page'      => $instance['posts_count'],
            'meta_key'            => 'penci_post_views_count',
            'order'               => 'DESC',
            'orderby'             => 'meta_value_num',
            'category_name'       =>  ( $instance['category'] !== 'all' ? $instance['category'] : '' )
          );


  $query = new WP_Query( $args );
  if( $query->have_posts() ) :
?>

<div class="kl-popular-posts">
  <h4 class="sow-title"><span><?php _e( $instance['title'] );?></span></h4>
  <ul class="kl-sow-posts">
    <?php  $rank = 1; while( $query->have_posts() ) : $query->the_post(); ?>
    <?php if ( !empty( get_the_post_thumbnail() ) ) : $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]; endif;?>
    <li>
      <span class="post-rank"><span class="rank-number"><?php _e( $rank );?></span></span>
      <div class="post-body">
        <div class="kl-post-thumbnail">
          <a href="<?php the_permalink(); ?>" class="kl-thumbnail-bg" style="background-image:url(<?php _e( $image_url );?>);"></a>
        </div>
        <div class="post-info">
          <h4 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
          <span class="post-date"><?php the_time('F j, Y'); ?></span>
        </div>
      </div>
    </li>
    <?php $rank++; endwhile; ?>
  </ul>
</div>

<?php endif; wp_reset_postdata(); ?>

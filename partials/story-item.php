<?php
  $permalink      = get_the_permalink();
  $thumbnail_id   = get_post_thumbnail_id( $post->ID );
  $thumbnail      = $thumbnail_id ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0] : $thumbnail_id;
  $background_img = !empty( $thumbnail ) ? 'style="background-image:url('.$thumbnail.');"' : "";
?>
<div class="orbit-thumbnail-bg" <?php _e( $background_img ); ?>>
  <a href="<?php _e( $permalink );?>"></a>
</div>
<div class="post-desc">
  <h3 class="post-title"><a href="<?php _e( $permalink );?>"><?php the_title();?></a></h3>
  <span><?php the_time( 'F j, Y' );?></span>
</div>

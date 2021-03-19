<?php

  $formats = array(
    'gallery' => array(
      'class'	=> 'fa fa-picture-o'
    ),
    'video' => array(
      'class'	=> 'fa fa-play'
    ),
    'audio' => array(
      'class'	=> 'fa fa-music'
    ),
    'link' => array(
      'class'	=> 'fa fa-link'
    ),
    'quote' => array(
      'class'	=> 'fa fa-quote-left'
    )
  );
?>

<?php if ( !empty( get_the_post_thumbnail() ) ) : $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]; endif;?>

<div class="kl-post-thumbnail">
  <a href="<?php the_permalink(); ?>" class="kl-thumbnail-bg" <?php if( isset( $image_url ) && $image_url ){ echo 'style="background-image:url('.$image_url.');"'; } ?>></a>
  <?php foreach( $formats as $format => $icon ): ?>
    <?php if( has_post_format( $format ) ) : ?>
      <a href="<?php the_permalink() ?>" class="post-format-icon"><i class="<?php _e( $icon['class'] );?>"></i></a>
    <?php endif; ?>
  <?php endforeach;?>
</div>

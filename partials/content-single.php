<?php
/**
 * The template for displaying single post content.
 */
 global $kl_post_view_count;
 $total_views = $kl_post_view_count->get_count( $post->ID );
?>
<div class="single-post-wrapper">
	<div class="kl-single-post-header">
		<h1 class="post-title"><?php the_title(); ?></h1>
		<div class="post-meta">
			<span class="author"><?php _e( 'द्वारा लिखित ', 'kl' ); ?>
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
			</span>
			<span><?php the_time('F j, Y'); ?></span>
			<span><?php _e( $total_views.' बार देखा गया', 'kl');?></span>
		</div>
	</div>
	<?php
		$video_meta = get_post_meta( $post->ID, '_format_video_embed', true );
		if( has_post_format( 'video' ) && ( strlen( trim( $video_meta ) ) > 0 ) ):
	?>
	  <div class="video-container">
	    <?php if ( wp_oembed_get( $video_meta ) ) : ?>
	      <?php echo wp_oembed_get( $video_meta ); ?>
	    <?php endif; ?>
	  </div>
	<?php endif; ?>
	<div class="single-post-content"><?php the_content(); ?></div>
  <div class="entry-comments">
    <?php
      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }
    ?>
  </div>
	<?php do_action('kl_social_share', 'wrap-center');?>
	<?php do_action('kl_post_pagination'); ?>
	<?php get_template_part( 'lib/templates/related_posts' ); ?>
</div>

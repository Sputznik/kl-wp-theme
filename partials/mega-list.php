<div class="post-item-inner">
  <?php get_template_part('partials/post', 'format');?>
	<div class="post-body">
    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php if( $i < 3 ): ?>
      <div class="post-meta">
				<span class="author"><?php _e( 'द्वारा  ', 'kl' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
				<span><?php the_time('F j, Y'); ?></span>
			</div>
      <div class="content">
				<?php the_excerpt(); ?>
			</div>
    <?php else:?>
      <div class="post-meta">
        <span><?php the_time('F j, Y'); ?></span>
			</div>
		<?php endif; ?>
  </div> <!-- Post Body -->
</div> <!-- Post Item Inner -->

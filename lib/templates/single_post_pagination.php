<?php
/**
 * Single post navigation icludes thumbnail and post title
 */
?>
<div class="single-post-pagination">
	<?php
		$next_post = get_next_post();
		$previous_post = get_previous_post();
	?>
	<?php if( !empty( $previous_post ) ) : ?>
		<div class="previous-post">
			<?php if( has_post_thumbnail( $previous_post->ID ) ): ?>
				<a class="kl-nav-thumb" href="<?php echo get_the_permalink( $previous_post->ID ); ?>">
					<?php echo get_the_post_thumbnail( $previous_post->ID, 'thumbnail' ); ?>
				</a>
			<?php endif; ?>
			<div class="previous-post-inner">
				<div class="post-label">
					<span><?php _e( 'पिछला लेख', 'kl' ); ?></span>
				</div>
				<a href="<?php echo get_the_permalink( $previous_post->ID ); ?>">
					<div class="title-wrapper">
						<h5 class="prev-title"><?php _e( get_the_title( $previous_post->ID ), 'kl' ); ?></h5>
					</div>
				</a>
			</div>
		</div>
	<?php endif; ?>

	<?php if( !empty( $next_post ) ) : ?>
		<div class="next-post">
			<?php if( has_post_thumbnail( $next_post->ID ) ): ?>
				<a class="kl-nav-thumb nav-thumb-next" href="<?php echo get_the_permalink( $next_post->ID ); ?>">
					<?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' ); ?>
				</a>
			<?php endif; ?>
			<div class="next-post-inner">
				<div class="post-label next-post-label">
					<span><?php _e( 'अगला लेख', 'kl' ); ?></span>
				</div>
				<a href="<?php echo get_the_permalink( $next_post->ID ); ?>">
					<div class="title-wrapper">
						<h5 class="next-title"><?php _e( get_the_title( $next_post->ID ), 'kl' ); ?></h5>
					</div>
				</a>
			</div>
		</div>
	<?php endif; ?>
</div>

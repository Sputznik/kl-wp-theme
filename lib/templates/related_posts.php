<?php
/**
 * Related posts slider template
 */

	$current_post = $post;
	global $post;

	$categories = get_the_category( $post->ID );
	if ( $categories ){

		$related_cat_ids = array();
		foreach ( $categories as $category ){ $related_cat_ids[] = $category->term_id; }

		$args = array(
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => 6, // Total number of related posts.
			'category__in'        => $related_cat_ids,
			'post__not_in'        => array( $post->ID ),
			'post_status' 				=> 'publish'
		);
	}
	$related_query = new WP_Query( $args ); if( $related_query->have_posts() ):?>
	<div class="kl-related-post">
		<h4 class="kl-related-title"><?php _e( 'आपको यह भी पसंद आ सकता है', 'kl' ); ?></h4>
		<div class="kl-related-slider" data-auto="true" data-dots="true" data-arrows="true" data-behaviour="kl-related-posts">
		<?php while( $related_query->have_posts() ) : $related_query->the_post(); ?>
			<div class="related-post-item">
				<?php if( !empty( get_the_post_thumbnail() ) ) : $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]; ?>
					<a class="kl-thumbnail-bg" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" style="background-image:url(<?php _e( $image_url );?>);"></a>
				<?php else: ?>
					<a class="kl-thumbnail-bg" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"></a>
				<?php endif; ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="date"><?php  the_time('F j, Y'); ?></span>
			</div>
		<?php endwhile; endif;?>
		</div>
	</div>
	<?php  wp_reset_postdata(); ?>

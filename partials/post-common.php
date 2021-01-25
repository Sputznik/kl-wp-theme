<?php
/**
 * Template loop for KL LIST GRID
 */
?>
<li class="kl-post">
	<div class="kl-post-wrapper">
		<?php if ( !empty( get_the_post_thumbnail() ) ) : $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]; ?>
			<div class="kl-post-thumbnail">
				<a href="<?php the_permalink() ?>" class="kl-thumbnail-bg" title="<?php the_title(); ?>" style="background-image:url(<?php _e( $image_url );?>);"></a>
					<?php if ( has_post_format( 'gallery' ) ) : ?>
						<span class="post-format-icon"><i class="fa fa-picture-o"></i></span>
					<?php endif; ?>
					<?php if ( has_post_format( 'video' ) ) : ?>
						<span class="post-format-icon"><i class="fa fa-play"></i></span>
					<?php endif; ?>
					<?php if ( has_post_format( 'audio' ) ) : ?>
						<span class="post-format-icon"><i class="fa fa-music"></i></span>
					<?php endif; ?>
					<?php if ( has_post_format( 'link' ) ) : ?>
						<span class="post-format-icon"><i class="fa fa-link"></i></span>
					<?php endif; ?>
					<?php if ( has_post_format( 'quote' ) ) : ?>
						<span class="post-format-icon"><i class="fa fa-quote-left"></i></span>
					<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="kl-post-content<?php if ( empty( get_the_post_thumbnail() ) ){ echo " fullwidth"; }?>">
			<div class="header">
				<span class="category">
					<?php foreach ( ( get_the_category() ) as $category ){ echo '<a class="kl-cat-name" href="'.get_category_link( $category->term_id ).'">'.$category->name.'</a>'; }?>
				</span>
				<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-meta">
					<span class="author"><?php _e( 'द्वारा  ', 'kl' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
					<span><?php the_time('F j, Y'); ?></span>
				</div>
			</div>
			<div class="content"><?php the_excerpt(); ?></div>
			<?php do_action('kl_social_share','default'); ?>
		</div>

	</div>
</li>

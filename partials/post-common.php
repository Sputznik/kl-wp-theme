<?php
/**
 * Template loop for KL LIST GRID
 */
?>
<li class="kl-post">
	<div class="kl-post-wrapper">
		<?php if ( !empty( get_the_post_thumbnail() ) ) { get_template_part('partials/post', 'format'); } ?>
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

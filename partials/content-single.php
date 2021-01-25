<?php
/**
 * The template for displaying single post content.
 */
?>
<div class="single-post-wrapper">
	<div class="kl-single-post-header">
		<h1 class="post-title"><?php the_title(); ?></h1>
		<div class="post-meta">
			<span class="author"><?php _e( 'द्वारा लिखित ', 'kl' ); ?>
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
			</span>
			<span><?php the_time('F j, Y'); ?></span>
			<span>20 बार देखा गया</span>
		</div>
	</div>
	<div class="single-post-content"><?php the_content(); ?></div>

	<?php do_action('kl_social_share', 'wrap-center');?>
	<?php do_action('kl_post_pagination'); ?>
	<?php get_template_part( 'lib/templates/related_posts' ); ?>
</div>

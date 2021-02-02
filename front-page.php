<?php
/**
 * The template for displaying front page.
 */
	get_header();
?>
<div class="container">
	<div id="kl-main-content" class="kl-sticky-sidebar">
		<div class="theiaStickySidebar">
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post();?>
        <?php the_content('Read the rest of this entry »'); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<?php do_action('kl_sidebar','kl-main-sidebar');?>
</div>


<?php get_footer(); ?>

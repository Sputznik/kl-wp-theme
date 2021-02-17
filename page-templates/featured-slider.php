<?php
/**
 * Template Name: Featured Slider Page
 *
 */

get_header();?>
	<div class="container"> <?php do_action('kl_featured_slider');?></div>
	<div class="container">
		<div id="kl-main-content" class="kl-sticky-sidebar">
			<div class="theiaStickySidebar">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<?php do_action('kl_sidebar','kl-main-sidebar');?>
	</div>
<?php get_footer();?>

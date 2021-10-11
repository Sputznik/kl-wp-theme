<?php
/**
 * The Template for displaying single woocommerce product.
 */
get_header();
?>

	<div class="container kl-breadcrumb">
		<span><a class="crumb" href="<?php bloginfo('url');?>"><?php esc_html_e( 'खबर लहरिया', 'kl' ); ?></a></span><i class="fa fa-angle-right"></i>
		<span>Plan</span><i class="fa fa-angle-right"></i><span><?php the_title(); ?></span>
	</div>

	<div class="container">
		<div id="kl-main-content" class="kl-sticky-sidebar">
			<div class="theiaStickySidebar">
				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/content', 'single-product' ); ?>
					<div data-behaviour="post-view-stat" data-id="<?php _e( $post->ID );?>"></div>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<?php /* MAIN SIDEBAR */ do_action('kl_sticky_sidebar','kl-main-sidebar'); ?>
 	</div>
<?php get_footer(); ?>

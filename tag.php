<?php
/**
 * The template for displaying tag pages
 */
get_header();
?>
	<div class="container kl-breadcrumb">
		<span><a class="crumb" href="<?php bloginfo('url');?>"><?php _e( 'खबर लहरिया', 'kl' ); ?></a></span><i class="fa fa-angle-right"></i>
    <span><?php _e( 'टैग', 'kl' );?></span><i class="fa fa-angle-right"></i>
    <span><?php printf( 'Posts tagged with "%s"', strtolower( single_tag_title( '', false ) ) ); ?></span>
	</div>
	<div class="container">
		<div id="kl-main-content" class="kl-sticky-sidebar">
			<div class="theiaStickySidebar">
				<h1 class="kl-page-title"><?php printf( esc_html__( '%s', 'kl' ), single_cat_title( '', false ) ); ?></h1>
				<?php if ( have_posts() ) : ?>
					<ul class="kl-list-grid">
						<?php while ( have_posts() ) : the_post(); get_template_part('partials/post','common'); endwhile; ?>
					</ul>
					<?php echo kl_numbered_pagination(); ?>
				<?php endif;?>
			</div>
		</div>
		<?php do_action('kl_sticky_sidebar','kl-page-sidebar');?>
	</div>
<?php get_footer(); ?>

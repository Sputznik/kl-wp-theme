<?php
/**
 * The template for displaying search results pages.
 */
	get_header();
?>

	<div class="container kl-breadcrumb">
		<span><a class="crumb" href="<?php bloginfo('url');?>"><?php _e( 'खबर लहरिया', 'kl' ); ?></a></span><i class="fa fa-angle-right"></i>
		<span><?php _e( 'खोज', 'kl' ); ?></span>
	</div>

	<div class="container">
		<div id="kl-main-content" class="kl-sticky-sidebar">
			<div class="theiaStickySidebar">
				<h1 class="kl-page-title">खोज परिणाम <?php printf( esc_html__( '"%s"', 'kl' ), get_search_query() ); ?></h1>
				<?php if ( have_posts() ) : ?>
					<ul class="kl-list-grid">
						<?php while ( have_posts() ) : the_post(); get_template_part('partials/post','common'); endwhile;?>
					</ul>
				<?php echo kl_numbered_pagination(); ?>
				<?php else : ?>
					<div class="kl-nothing-found">
						<?php _e( 'क्षमा करें, लेकिन कुछ भी आपके खोज शब्द से मेल नहीं खाता है। कृपया कुछ अलग कीवर्ड के साथ फ़िर से कोशिश करें।', 'kl' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php do_action('kl_sidebar','kl-main-sidebar');?>
	</div>


<?php get_footer(); ?>

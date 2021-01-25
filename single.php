<?php
/**
 * The Template for displaying all single posts
 */
get_header();
?>

	<div class="container kl-breadcrumb">
		<span><a class="crumb" href="<?php bloginfo('url');?>"><?php esc_html_e( 'खबर लहरिया', 'kl' ); ?></a></span><i class="fa fa-angle-right"></i>
		<span>
			<?php
				$single_cat  = array_shift( get_the_category( get_the_ID() ) );
				echo '<a class="crumb" href="'.get_category_link( $single_cat->term_id ).'">'.$single_cat->name.'</a>';
			?>
		</span><i class="fa fa-angle-right"></i>
		<span><?php the_title(); ?></span>
	</div>

	<div class="container">
		<div id="kl-main-content" class="kl-sticky-sidebar">
			<div class="theiaStickySidebar">
				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/content', 'single' ); ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
 	</div>
<?php get_footer(); ?>

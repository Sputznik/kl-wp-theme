<?php
/**
 * The template for displaying archive pages
 */
get_header();
?>
	<div class="container kl-breadcrumb">
		<span><a class="crumb" href="<?php echo bloginfo('url'); ?>"><?php _e( 'खबर लहरिया', 'kl' ); ?></a></span><i class="fa fa-angle-right"></i>
		<?php
			if ( is_author() ) :
				echo '<span>';
				_e( 'लेखक ', 'kl' );
				echo '</span>';
			else :
				echo '<span>';
				_e( 'अभिलेखागार', 'kl' );
				echo '</span>';
			endif;
		?>
	</div>
	<div class="container">
		<div id="kl-main-content" class="kl-sticky-sidebar">
			<div class="theiaStickySidebar">
				<div class="kl-page-title">
			<?php
			if ( is_day() ) :
				echo '<span>';
				_e( 'दैनिक अभिलेखागार ', 'kl' );
				echo '</span>';
				printf( __( '<span>%s</span>', 'kl'), get_the_date() );
			elseif ( is_month() ) :
				echo '<span>';
				_e( 'वार्षिक अभिलेखागार ', 'kl' );
				echo '</span>';
				printf(  __( '<span>%s</span>', 'kl' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'kl' ) ) );
			elseif ( is_year() ) :
				echo '<span>';
				_e( 'वार्षिक अभिलेखागार ', 'kl' );
				echo '</span>';
				printf(  __( '<span>%s</span>', 'kl' ) , get_the_date( _x( 'Y', 'yearly archives date format', 'kl' ) ) );
			elseif ( is_author() ) :
				echo '<span>';
				_e( 'लेखक ', 'kl' );
				echo '</span>';
				printf(  __( '<span>%s</span>', 'kl' ), get_userdata( get_query_var('author') )->display_name );
			else :
				echo '<h1>';
				_e( 'अभिलेखागार', 'kl' );
				echo '</h1>';
			endif;
			?>
		</div>
					<?php if ( have_posts() ) : ?>
						<ul class="kl-list-grid">
							<?php while( have_posts() ) : the_post(); get_template_part('partials/post','common'); endwhile; ?>
						</ul>
						<?php echo kl_numbered_pagination(); ?>
					<?php endif; ?>
			</div>
		</div>
		<?php do_action('kl_sidebar','kl-archive-sidebar');?>
	</div>
<?php get_footer(); ?>

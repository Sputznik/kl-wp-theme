<?php
/**
 * The template for displaying pages
 */
get_header();

	global $post;
	$crumb_meta 	= get_post_meta( $post->ID, $key = 'hide_kl_breadcrumb', true );
	$social_meta 	= get_post_meta( $post->ID, $key = 'hide_kl_share_icons', true );
?>
	<?php if( isset( $crumb_meta ) && empty( $crumb_meta ) ):?>
		<div class="container container-single-page kl-breadcrumb">
			<span><a class="crumb" href="<?php bloginfo('url');?>"><?php _e( 'खबर लहरिया', 'kl' ); ?></a></span><i class="fa fa-angle-right"></i>
			<?php
				$kl_page_parents = get_post_ancestors( get_the_ID() );
				if( !empty( $kl_page_parents ) ): $kl_page_parents = array_reverse( $kl_page_parents );
				foreach( $kl_page_parents as $kl_page_parent ): ?>
					<span><a class="crumb" href="<?php echo get_permalink( $kl_page_parent ); ?>"><?php echo get_the_title( $kl_page_parent ); ?></a></span><i class="fa fa-angle-right"></i>
				<?php endforeach; endif; ?>
			<span><?php the_title(); ?></span>
		</div>
	<?php endif;?>
	<div id="kl-page-content" class="container">
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php the_content('Read the rest of this entry »'); ?>
			<?php if( isset( $social_meta ) && empty( $social_meta ) ) { do_action('kl_social_share','wrap-center-page'); }?>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>

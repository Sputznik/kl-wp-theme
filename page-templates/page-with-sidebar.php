<?php
/**
 * Template Name: Page with Sidebar
 *
 */

get_header();?>
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
  <div class="container">
		<div id="kl-main-content" class="kl-sticky-sidebar">
			<div class="theiaStickySidebar">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<?php
      if( is_active_sidebar('kl-page-sidebar') ){
        dynamic_sidebar('kl-page-sidebar');
      }
    ?>
	</div>
<?php get_footer();?>

<?php
/**
 * Template Name: Post without Sidebar
 * Template Post Type: post
 *
 */

get_header();?>
<div class="container kl-breadcrumb">
  <span><a class="crumb" href="<?php bloginfo('url');?>"><?php esc_html_e( 'खबर लहरिया', 'kl' ); ?></a></span><i class="fa fa-angle-right"></i>
  <span>
    <?php
      $single_cat = get_the_category( get_the_ID() );
      $first_single_cat  = array_shift( $single_cat );
      echo '<a class="crumb" href="'.get_category_link( $first_single_cat->term_id ).'">'.$first_single_cat->name.'</a>';
    ?>
  </span><i class="fa fa-angle-right"></i>
  <span><?php the_title(); ?></span>
</div>
<div class="container">
  <div id="kl-main-content">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'partials/content', 'single' ); ?>
      <div data-behaviour="post-view-stat" data-id="<?php _e( $post->ID );?>"></div>
    <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer(); ?>

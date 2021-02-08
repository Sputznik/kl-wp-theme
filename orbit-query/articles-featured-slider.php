<div class="kl-featured-slider-wrapper">
  <div class="container">
    <ul id="<?php _e( $atts['id'] );?>" data-target="<?php _e('li.kl-post');?>"  data-auto="true" data-autotime="4000" data-speed="600" data-url="<?php _e( $atts['url'] );?>" class="kl-featured-slider">
      <?php  $flag=0; $counter = 0; while( $this->query->have_posts() ) : $this->query->the_post(); ?>
        <?php if ($counter % 4 == 0) : $flag = 1;
            echo $counter > 0 ? "</li>" : ""; // close div if it's not the first
            echo "<li class='kl-post'>";
            else: $flag = 0;
        endif;
        ?>
        <?php include( locate_template( 'partials/featured-slider.php' ) ); ?>
      <?php $counter++; endwhile;?>

    </ul>
  </div>
</div> <!-- Featured Wrapper -->

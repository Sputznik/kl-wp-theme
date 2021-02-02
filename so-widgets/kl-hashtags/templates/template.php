<div class="kl-hashtags">
  <h4 class="sow-title"><span><?php _e( $instance['title'] );?></span></h4>
  <?php foreach( $instance['hashtag_items'] as $i => $item ): ?>
    #<a href="<?php _e( $item['hashtag_url'] );?>"><?php _e( $item['hashtag_text'] );?></a>
  <?php endforeach?>
</div>

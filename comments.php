<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
  return;
}
?>
<div id="comments" class="comments-area">
  <?php if ( have_comments() ) : ?>
    <h3 class="comments-title">Comments:</h3>
    <ol class="comment-list">
      <?php
        wp_list_comments( array(
          'style'       => 'li',
          'short_ping'  => true,
          'avatar_size' => 32,
        ) );
      ?>
    </ol><!-- .comment-list -->
    <?php
      // Are there comments to navigate through ?
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
        $prev_icon     = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
        $next_icon     = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
        the_comments_navigation(
          array(
  					'prev_text' => sprintf( '%s <span class="nav-prev-text">%s</span>', $prev_icon, 'Older Comments' ),
  					'next_text' => sprintf( '%s <span class="nav-prev-text">%s</span>', 'Newer Comments', $next_icon )
  				)
        );
      }
    ?>
    <?php if ( ! comments_open() ) : ?>
      <p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
    <?php endif; ?>
  <?php endif; // have_comments() ?>
  <?php
    $defaults['title_reply_to'] = __( 'Reply to %s' );
    comment_form( $defaults );
  ?>
</div><!-- #comments -->

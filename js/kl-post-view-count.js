jQuery(document).ready(function(){

  var $kl_post_stats = jQuery('[data-behaviour="post-view-stat"]');

  if( $kl_post_stats.length > 0 ){ updatePostViewCount(); }

  function updatePostViewCount(){

    var id = $kl_post_stats.data('id');
    var url = KL_POST_VIEW.ajaxurl;

    jQuery.ajax({
      type:'post',
      url	: url,
      data : {
        action  : 'kl_view_count',
        post_id : id,
        token   : KL_POST_VIEW.token
      }
    });

  }


});

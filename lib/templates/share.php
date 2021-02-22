<?php

	$url = get_the_permalink();
	$title = get_the_title();

	$icons = array(
		'fb'  => array(
			'title'	=> 'Facebook',
			'icon'  => 'fa fa-facebook',
			'url'   => 'https://www.facebook.com/sharer/sharer.php?u='.$url
		),
	  'tw'  => array(
			'title'	=> 'Twitter',
			'icon'  => 'fa fa-twitter',
			'url'   => 'https://twitter.com/intent/tweet?text='.rawurlencode('Check out this article').':%20'.rawurlencode($title).'%20-%20'.$url
		),
		'li'  => array(
			'title'	=> 'Linkedin',
			'icon'	=> 'fa fa-linkedin',
			'url'   => 'https://www.linkedin.com/shareArticle?mini=true&url='.rawurlencode($url).'&title='.rawurlencode($title)
		),
	  'wa'  => array(
			'title'	=> 'Whatsapp',
			'icon'	=> 'fa fa-whatsapp',
			'url'   => 'https://api.whatsapp.com/send/'.rawurlencode($title).' %0A%0A '.rawurlencode($url)
		),
	  'mail'  => array(
			'title'	=> 'Email',
			'icon'	=> 'fa fa-envelope',
			'url'   => 'mailto:?subject='.$title.'&body='.$url
		)
	);
	?>

	<div class="kl-social-share <?php echo $style;?>">
	  <div class="social-share-inner">
			<?php if( is_page() ):?>
				<span class="share-text"><?php _e( 'साझा करें', 'kl' ); ?></span>
			<?php else:?>
				<a class="kl-post-like"><i class="fa fa-heart-o"></i></a>
			<?php endif;?>
	    <?php foreach( $icons as $icon ):?>
	      <a target="_blank" rel="nofollow" href="<?php _e( $icon['url'] )?>">
	        <i class="<?php _e( $icon['icon'] )?>"></i>
	        <span class="share-tooltip"><?php _e( $icon['title'], 'kl' )?></span>
	      </a>
	    <?php endforeach;?>
	  </div>
	</div>

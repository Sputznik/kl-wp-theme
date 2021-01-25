<?php

	$icons = array(
		'fb'  => array(
			'title'	=> 'Facebook',
			'icon'  => 'fa fa-facebook',
			'url'   => 'https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink()
		),
	  'tw'  => array(
			'title'	=> 'Twitter',
			'icon'  => 'fa fa-twitter',
			'url'   => 'https://twitter.com/home?status=Check%20out%20this%20article:%20'.rawurlencode( get_the_title() ).'%20-%20'.get_the_permalink()
		),
		'li'  => array(
			'title'	=> 'Linkedin',
			'icon'	=> 'fa fa-linkedin',
			'url'   => 'https://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.rawurlencode( get_the_title() )
		),
	  'wa'  => array(
			'title'	=> 'Whatsapp',
			'icon'	=> 'fa fa-whatsapp',
			'url'   => "#"
		),
	  'mail'  => array(
			'title'	=> 'Email',
			'icon'	=> 'fa fa-envelope',
			'url'   => 'mailto:?subject='.rawurlencode( get_the_title() ).'&body='.get_the_permalink()
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
	      <a target="_blank" href="<?php _e( $icon['url'] )?>">
	        <i class="<?php _e( $icon['icon'] )?>"></i>
	        <span class="share-tooltip"><?php _e( $icon['title'], 'kl' )?></span>
	      </a>
	    <?php endforeach;?>
	  </div>
	</div>

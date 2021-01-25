<?php
  $icons = array(
    'fb' => array(
      'label'	=> 'Facebook',
      'icon'	=> 'fa fa-facebook'
    ),
    'tw' => array(
      'label'	=> 'Twitter',
      'icon'	=> 'fa fa-twitter'
    ),
    'insta' => array(
      'label'	=> 'Twitter',
      'icon'	=> 'fa fa-instagram'
    ),
    'youtube' => array(
      'label'	=> 'Twitter',
      'icon'	=> 'fa fa-youtube-play'
    ),
    'mail' => array(
      'label'	=> 'Email',
      'icon'	=> 'fa fa-envelope-o'
    ),
    'rss' => array(
      'label'	=> 'RSS',
      'icon'	=> 'fa fa-rss'
    ),
    'login' => array(
      'label'	=> 'Login',
      'icon'	=> ''
    )
  );
?>
<div class="kl-topbar-social">
  <div class="topbar-social-inner">
    <?php foreach( $icons as $icon ):?>
      <?php if( $icon['label'] == 'Login' ):?>
        <a href="#" target="_blank"><?php _e( $icon['label'] );?></a>
      <?php else:?>
        <a href="#" target="_blank"><i class="<?php _e( $icon['icon'] )?>"></i></a>
      <?php endif;?>
    <?php endforeach;?>
  </div>
</div>

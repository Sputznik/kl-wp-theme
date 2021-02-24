<?php
/*
Widget Name: KL Sidebar
Description: KL Sidebar Widget.
Author: Stephen Anil, Sputznik
Author URI: https://sputznik.com/
Widget URI:
Video URI:
*/
class KL_SIDEBAR extends SiteOrigin_Widget{

  function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'kl-sidebar',
			// The name of the widget for display purposes.
			__('KL Sidebar', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('KL Sidebar Widget.'),
				'help'        => '',
			),
			//The $control_options array, which is passed through to WP_Widget
			array(),
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
        'sidebar_type' => array(
          'type' => 'select',
          'label' => __( 'Choose a Sidebar', 'siteorigin-widgets' ),
          'default' => 'kl-page-sidebar',
          'options' => $this->get_sidebar_list()
        ),

			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/kl-sidebar"
		);
	}

  function get_template_name($instance){
    return 'template';
  }

  function get_template_dir($instance) {
    return 'templates';
  }

  function get_style_name($instance){
    return '';
  }


  function get_sidebar_list(){

    $sidebar_list = array();

    foreach ( get_option( 'sidebars_widgets' ) as $key => $value ) {
      $sidebar_list[$key] = $key;
    }
    unset( $sidebar_list['wp_inactive_widgets'], $sidebar_list['array_version']  );

    return $sidebar_list;
  }



}

siteorigin_widget_register('kl-sidebar',__FILE__,'KL_SIDEBAR');
?>

<?php
/*
Widget Name: KL Hashtags
Description: Displays hashtags.
Author: Stephen Anil, Sputznik
Author URI: https://sputznik.com/
Widget URI:
Video URI:
*/
class KL_POST_HASHTAGS extends SiteOrigin_Widget{
  function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'kl-hashtags',
			// The name of the widget for display purposes.
			__('KL Hashtags', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Displays hashtags.'),
				'help'        => '',
			),
			//The $control_options array, which is passed through to WP_Widget
			array(),
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
        'title'  =>  array(
          'type'  =>  'text',
          'label' =>  __( 'Title', 'siteorigin-widgets' ),
          'default' =>  '',
        ),

        'hashtag_items' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Panels' , 'siteorigin-widgets' ),
					'item_label' => array(
						'selector' => "[id*='hashtag_text']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'hashtag_text' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Hastag Text', 'siteorigin-widgets' ),
							'default' 	=> '',
						),
            'hashtag_url' => array(
							'type' 			=> 'link',
							'label' 		=> __( 'Hastag Url', 'siteorigin-widgets' ),
							'default' 	=> '',
						),

					)
				),

			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/kl-hashtags"
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
}

siteorigin_widget_register('kl-hashtags',__FILE__,'KL_POST_HASHTAGS');
?>

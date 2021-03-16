<?php
/*
Widget Name: KL Latest Posts
Description: Displays your latest posts from all categories or a category.
Author: Stephen Anil, Sputznik
Author URI: https://sputznik.com/
Widget URI:
Video URI:
*/
class KL_LATEST_POSTS extends SiteOrigin_Widget{

  public $categories_arr = array();

  function __construct() {

    global $kl_customize;
    $this->categories_arr =  $kl_customize->kl_post_categories();

    //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.

    parent::__construct(
			// The unique id for your widget.
			'kl-latest-posts',
			// The name of the widget for display purposes.
			__('KL Latest Posts', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Displays your latest posts from all categories or a category.'),
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
        'category' => array(
					'type' 		=> 'select',
					'label' 	=> __( 'Filter by Category', 'siteorigin-widgets' ),
					'default' 	=> 'all',
					'options' 	=> $this->categories_arr
				),
        'posts_count'  =>  array(
          'type'  =>  'text',
          'label' =>  __( 'Number of posts to show', 'siteorigin-widgets' ),
          'default' =>  '1',
        ),
        'featured'  =>  array(
          'type'  =>  'checkbox',
          'label' =>  __( 'Display 1st post featured?', 'siteorigin-widgets' ),
          'default' => false
        ),
			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/kl-latest-posts"
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

siteorigin_widget_register('kl-latest-posts',__FILE__,'KL_LATEST_POSTS');
?>

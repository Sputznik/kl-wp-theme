<?php


	class KL_THEME_CUSTOMIZE{

		var $option;
		var $option_slug;

		function __construct(){

			$this->option_slug = 'kl_theme';
			$this->option = get_option( $this->option_slug );

			add_action( 'wp_head', array( $this, 'styles') );

		}

		function get_option(){ return $this->option; }

		function get_option_slug( $id = '' ){ return $this->option_slug.$id; }

		function styles(){

			echo "<style type='text/css'>";
			do_action('kl_styles');
			echo "</style>";

		}

		function get_social_icons(){
			return array(
				'fb' => array(
					'label'	=> 'Facebook',
					'icon'	=> 'fa fa-facebook'
				),
				'tw' => array(
					'label'	=> 'Twitter',
					'icon'	=> 'fa fa-twitter'
				),
				'instagram' => array(
					'label'	=> 'Instagram',
					'icon'	=> 'fa fa-instagram'
				),
				'youtube' => array(
					'label'	=> 'Youtube',
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
		}

		function get_one_option( $slug, $default ){
			$option = $this->get_option();

			if( isset( $option[ $slug ] ) && $option[ $slug ] ){
				return $option[ $slug ];
			}

			return $default;
		}

		// RETURNS DEFAULT THEME SETTINGS
		function get_theme_option( $section, $slug, $default ){
			$option = $this->get_option();

			if( isset( $option[$section][ $slug ] ) && $option[$section][ $slug ] ){
				return $option[$section][ $slug ];
			}

			return $default;
		}

		function get_header_type(){ return $this->get_one_option( 'header_type', 'header1' ); }

		function kl_post_categories(){
			$categories_list = array('all'=> 'All Categories');
			$categories = get_categories();

			foreach ( $categories as $category ){
				$categories_list[$category->slug] = $category->name;
			}

			return $categories_list;
		}

		function panel( $wp_customize, $panel_id, $panel_label ){

			$wp_customize->add_panel( $panel_id, array(
				'priority' 		=> 30,
				'capability' 	=> 'edit_theme_options',
				'theme_supports'=> '',
				'title' 			=> $panel_label,
				'description' => '',
			));

		}

		function section( $wp_customize, $panel_id, $section_id, $section_label, $section_desc ){

			$wp_customize->add_section( $section_id , array(
    		'title'       	=> __( $section_label, 'kl' ),
	    	'priority'    	=> 30,
	    	'description' 	=> $section_desc,
	    	'panel'					=> $panel_id
			));

		}

		function color( $wp_customize, $section_id, $setting_id, $setting_label, $default_setting ){

			$setting_id = $this->get_option_slug( $setting_id );

			$this->add_setting( $wp_customize, $setting_id, $default_setting );

    		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $setting_id, array(
      		'label' 	 => $setting_label,
      		'section'  => $section_id,
      		'settings' => $setting_id,
    		)));

		}

		function checkbox( $wp_customize, $section_id, $setting_id, $setting_label ){

			$setting_id = $this->get_option_slug( $setting_id );

			$wp_customize->add_setting( $setting_id, array(
				'default' 	 => 0,
  			'capability' => 'edit_theme_options',
  			'type'       => 'option',
  		));

			$wp_customize->add_control( $setting_id, array(
  			'settings' 	=> $setting_id,
  			'label'    	=> __( $setting_label ),
  			'section'  	=> $section_id,
  			'type'     	=> 'checkbox',
  			'std' 			=> 1
  		));


		}


		function text( $wp_customize, $section_id, $setting_id, $setting_label, $default_setting ){

			$setting_id = $this->get_option_slug( $setting_id );

			$wp_customize->add_setting( $setting_id, array(
   			'default' 	=> $default_setting,
   			'capability'=> 'edit_theme_options',
   			'type'      => 'option',
  		));

			$wp_customize->add_control( $setting_id, array(
				'settings' 	=> $setting_id,
	  		'type' 			=> 'text',
	    	'label' 		=> $setting_label,
	  		'section' 	=> $section_id,
      ));

		}

		function textarea( $wp_customize, $section_id, $setting_id, $setting_label, $default_setting ){

			$setting_id = $this->get_option_slug( $setting_id );

			$wp_customize->add_setting( $setting_id, array(
   			'default' 	=> $default_setting,
   			'capability'=> 'edit_theme_options',
   			'type'      => 'option',
  		));

			$wp_customize->add_control( $setting_id, array(
				'settings' 	=> $setting_id,
    		'type' 			=> 'textarea',
	    	'label' 		=> $setting_label,
    		'section' 	=> $section_id,
      ));

		}

		function dropdown( $wp_customize, $section_id, $setting_id, $setting_label, $default_setting, $choices ){

			$setting_id = $this->get_option_slug( $setting_id );

			$this->add_setting( $wp_customize, $setting_id, $default_setting );

			$wp_customize->add_control( $setting_id, array(
				'type' 			=> 'select',
	    	'label'    	=> $setting_label,
	    	'section'  	=> $section_id,
	    	'settings' 	=> $setting_id,
	    	'choices' 	=> $choices
			));

		}

		function image( $wp_customize, $section_id, $setting_id, $setting_label, $default_setting ){

			$setting_id = $this->get_option_slug( $setting_id );

			$this->add_setting( $wp_customize, $setting_id, $default_setting );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_id, array(
    		'label' 		=> $setting_label,
    		'section' 	=> $section_id,
    		'settings' 	=> $setting_id,
			)));
		}

		/* wrap add setting function of wp customize */
		function add_setting( $wp_customize, $setting_id, $default_setting ){

			$wp_customize->add_setting( $setting_id, array(
  			'default' 		=> $default_setting,
  			'transport'   => 'postMessage',
  			'type'				=> 'option'
  		));

		}

	}

	global $kl_customize;

	$kl_customize = new KL_THEME_CUSTOMIZE;

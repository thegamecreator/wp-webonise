<?php
	function mcp_script_enqueue(){
		wp_enqueue_style('customstyle',get_template_directory_uri().'/css/mytheme.css',array(),'1.0.0','all');
		wp_enqueue_script('customscript',get_template_directory_uri().'/js/mytheme.js',array(),'1.0.0',true);
		wp_enqueue_style('boothstrap','http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',array(),'1.0.0','all');
	}
	add_action('wp_enqueue_scripts','mcp_script_enqueue');

	function mcp_menu_setup(){
		add_theme_support('menus');

		register_nav_menu('Primary','Primary Top menu');
	}
	add_action('init','mcp_menu_setup');
	add_theme_support( 'custom-logo', array(
		'height'      => 300,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
	add_theme_support('custom-background', apply_filters('party_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => get_stylesheet_directory_uri() . "/images/bg.jpg",
    )));
	add_theme_support('html5', array(
        'comment-list',
        'search-form',
        'comment-form',
        'gallery',
    ));
    add_theme_support( 'title-tag' );
    function party_customize_register($wp_customize)
    {
    	if ( class_exists( 'WP_Customize_Panel' ) ):

			$wp_customize->add_panel( 'panel_big_title', array(
				'priority' => 31,
				'capability' => 'edit_theme_options',
				'title' => __( 'Big title section', 'party-lite' )
			));

			$wp_customize->add_section( 'party_bigtitle_section' , array(
				'title'       => __( 'Main content', 'party-lite' ),
				'priority'    => 1,
				'panel'       => 'panel_big_title'
			));

			/* show/hide */
			$wp_customize->add_setting( 'party_bigtitle_show', array(
				'sanitize_callback' => 'party_sanitize_checkbox',
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_show', array(
				'type' => 'checkbox',
				'label' => __('Hide big title section?','party-lite'),
				'section' => 'party_bigtitle_section',
				'priority'    => 1,
			));

			/* title */
			$wp_customize->add_setting( 'party_bigtitle_title', array(
				'sanitize_callback' => 'party_sanitize_input',
				'default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG','party-lite'),
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_title', array(
				'label'    => __( 'Title', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 2,
			));

			/* red button */
			$wp_customize->add_setting( 'party_bigtitle_redbutton_label', array(
				'sanitize_callback' => 'party_sanitize_input',
				'default' => __('Features','party-lite'),
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_redbutton_label', array(
				'label'    => __( 'Red button label', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 3,
			));

			$wp_customize->add_setting( 'party_bigtitle_redbutton_url', array(
				'sanitize_callback' => 'esc_url_raw',
				'default' => esc_url( home_url( '/' ) ).'#focus',
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_redbutton_url', array(
				'label'    => __( 'Red button link', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 4,
			));

			/* green button */
			$wp_customize->add_setting( 'party_bigtitle_greenbutton_label', array(
				'sanitize_callback' => 'party_sanitize_input',
				'default' => __("What's inside",'party-lite'),
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_greenbutton_label', array(
				'label'    => __( 'Green button label', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 5,
			));

			$wp_customize->add_setting( 'party_bigtitle_greenbutton_url', array(
				'sanitize_callback' => 'esc_url_raw',
				'default' => esc_url( home_url( '/' ) ).'#focus',
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_greenbutton_url', array(
				'label'    => __( 'Green button link', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 6,
			));

			/****************************************************/
			/************	PARALLAX IMAGES *********************/
			/****************************************************/

			$wp_customize->add_section( 'party_parallax_section' , array(
				'title'       => __( 'Parallax effect', 'party-lite' ),
				'priority'    => 2,
				'panel'       => 'panel_big_title'
			));

			/* show/hide */
			$wp_customize->add_setting( 'party_parallax_show', array(
				'sanitize_callback' => 'party_sanitize_checkbox'
			));

			$wp_customize->add_control( 'party_parallax_show', array(
				'type' 		=> 'checkbox',
				'label' 	=> __('Use parallax effect?','party-lite'),
				'section' 	=> 'party_parallax_section',
				'priority'	=> 1,
			));

			/* IMAGE 1*/
			$wp_customize->add_setting( 'party_parallax_img1', array(
				'sanitize_callback' => 'esc_url_raw',
				'default' => get_template_directory_uri() . '/images/background1.jpg'
			));

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img1', array(
				'label'    	=> __( 'Image 1', 'party-lite' ),
				'section'  	=> 'party_parallax_section',
				'settings' 	=> 'party_parallax_img1',
				'priority'	=> 1,
			)));

			/* IMAGE 2 */
			$wp_customize->add_setting( 'party_parallax_img2', array(
				'sanitize_callback' => 'esc_url_raw',
				'default' => get_template_directory_uri() . '/images/background2.png'
			));

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
				'label'    	=> __( 'Image 2', 'party-lite' ),
				'section'  	=> 'party_parallax_section',
				'settings' 	=> 'party_parallax_img2',
				'priority'	=> 2,
			)));

			

		else:

			$wp_customize->add_section( 'party_bigtitle_section' , array(
				'title'       => __( 'Big title section', 'party-lite' ),
				'priority'    => 31
			));

			/* show/hide */
			$wp_customize->add_setting( 'party_bigtitle_show', array(
				'sanitize_callback' => 'party_sanitize_checkbox',
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_show', array(
				'type' => 'checkbox',
				'label' => __('Hide big title section?','party-lite'),
				'section' => 'party_bigtitle_section',
				'priority'    => 1,
			));

			/* title */
			$wp_customize->add_setting( 'party_bigtitle_title', array(
				'sanitize_callback' => 'party_sanitize_input',
				'default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG','party-lite'),
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_title', array(
				'label'    => __( 'Title', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 2,
			));

			/* red button */
			$wp_customize->add_setting( 'party_bigtitle_redbutton_label', array(
				'sanitize_callback' => 'party_sanitize_input',
				'default' => __('Features','party-lite'),
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_redbutton_label', array(
				'label'    => __( 'Red button label', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 3,
			));

			$wp_customize->add_setting( 'party_bigtitle_redbutton_url', array(
				'sanitize_callback' => 'esc_url_raw',
				'default' => esc_url( home_url( '/' ) ).'#focus',
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_redbutton_url', array(
				'label'    => __( 'Red button link', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 4,
			));

			/* green button */
			$wp_customize->add_setting( 'party_bigtitle_greenbutton_label', array(
				'sanitize_callback' => 'party_sanitize_input',
				'default' => __("What's inside",'party-lite'),
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_greenbutton_label', array(
				'label'    => __( 'Green button label', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 5,
			));

			$wp_customize->add_setting( 'party_bigtitle_greenbutton_url', array(
				'sanitize_callback' => 'esc_url_raw',
				'default' => esc_url( home_url( '/' ) ).'#focus',
				'transport' => 'postMessage'
			));

			$wp_customize->add_control( 'party_bigtitle_greenbutton_url', array(
				'label'    => __( 'Green button link', 'party-lite' ),
				'section'  => 'party_bigtitle_section',
				'priority'    => 6,
			));

			/****************************************************/
			/************	PARALLAX IMAGES *********************/
			/****************************************************/
			$wp_customize->add_section( 'party_parallax_section' , array(
				'title'       => __( 'Parallax effect', 'party-lite' ),
				'priority'    => 60
			));

			/* show/hide */
			$wp_customize->add_setting( 'party_parallax_show', array(
				'sanitize_callback' => 'party_sanitize_checkbox'
			));

			$wp_customize->add_control( 'party_parallax_show', array(
				'type' 		=> 'checkbox',
				'label' 	=> __('Use parallax effect?','party-lite'),
				'section' 	=> 'party_parallax_section',
				'priority'	=> 1,
			));

			/* IMAGE 1*/
			$wp_customize->add_setting( 'party_parallax_img1', array(
				'sanitize_callback' => 'esc_url_raw',
				'default' => get_template_directory_uri() . '/images/background1.jpg'
			));

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img1', array(
				'label'    	=> __( 'Image 1', 'party-lite' ),
				'section'  	=> 'party_parallax_section',
				'settings' 	=> 'party_parallax_img1',
				'priority'	=> 1,
			)));

			/* IMAGE 2 */
			$wp_customize->add_setting( 'party_parallax_img2', array(
				'sanitize_callback' => 'esc_url_raw',
				'default' => get_template_directory_uri() . '/images/background2.png'
			));

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
				'label'    	=> __( 'Image 2', 'party-lite' ),
				'section'  	=> 'party_parallax_section',
				'settings' 	=> 'party_parallax_img2',
				'priority'	=> 2,
			)));

			
		endif;
    }
    add_action( 'customize_register', 'party_customize_register' );
?>
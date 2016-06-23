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
		register_nav_menu('Secondary','Footer menu');
		add_theme_support('post-formats',array('aside','image','video','gallery'));
		register_sidebar(  array(
			'name'			=>	'Sidebar',
			'id'			=>	'sidebar-1',
			'class'			=>	'side',
			'before_widget'	=>	'<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=>	"</aside>",
			'before_title'	=>	'<h1 class="widget_title">',
			'after_title'	=>	'</h1>'
		));
	}
	add_action('init','mcp_menu_setup');
	add_theme_support( 'custom-logo', array(
		'height'      => 300,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	 

function party_customize_register($wp_customize) 
{
	$wp_customize->add_section("big_title",array(
		"title"		=>	__("Big Title","customizer_party_sections"),
		"priority"	=>	30,
	));
	$wp_customize->add_setting("big_title_field", array(
		"default" => "Add zing to your Party",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"big_title_field",
		array(
			"label" => __("Enter Title", "customizer_ads_code_label"),
			"section" => "big_title",
			"settings" => "big_title_field",
			"type" => "input",
		)
	));
	$wp_customize->add_setting("big_title_desp", array(
		"default" => "Let your employees go crazy with the props, dress up, accessorize and get clicked at the funky photobooth like celebrities",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"big_title_desp",
		array(
			"label" => __("Enter Description", "customizer_ads_code_label"),
			"section" => "big_title",
			"settings" => "big_title_desp",
			"type" => "textarea",
		)
	));
	$wp_customize->add_setting("big_title_but_label", array(
		"default" => "Explore Packs",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"big_title_but_label",
		array(
			"label" => __("Enter Button Label", "customizer_ads_code_label"),
			"section" => "big_title",
			"settings" => "big_title_but_label",
			"type" => "text",
		)
	));
	$wp_customize->add_setting("big_title_but_link", array(
		"default" => "#",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"big_title_but_link",
		array(
			"label" => __("Enter Button Link", "customizer_ads_code_label"),
			"section" => "big_title",
			"settings" => "big_title_but_link",
			"type" => "text",
		)
	));
	$wp_customize->add_setting( 'big_title_bg', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'big_title_bg', array(
		'label' => __( 'Background', 'customizer_control' ),
		'section' => 'big_title',
		'settings' => 'big_title_bg',
		'priority' => 1,
	)));
	$wp_customize->add_section("promise",array(
		"title"		=>	__("Promises","customizer_party_sections"),
		"priority"	=>	31,
	));
	$wp_customize->add_setting( 'promise1_label', array(
		"default"	=>	__("Best quality products","customizer_party_sections"),
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"promise1_label",
		array(
			"label" => __("Label 1", "customizer_ads_code_label"),
			"section" => "promise",
			"settings" => "promise1_label",
			"type" => "text",
		)
	));
	$wp_customize->add_setting( 'promise1_img', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'promise1_img', array(
		'label' => __( 'image 1', 'customizer_control' ),
		'section' => 'promise',
		'settings' => 'promise1_img',
		'priority' => 1,
	)));
	$wp_customize->add_setting( 'promise2_img', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'promise2_img', array(
		'label' => __( 'image 2', 'customizer_control' ),
		'section' => 'promise',
		'settings' => 'promise2_img',
		'priority' => 1,
	)));
	$wp_customize->add_setting( 'promise3_img', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'promise3_img', array(
		'label' => __( 'image 3', 'customizer_control' ),
		'section' => 'promise',
		'settings' => 'promise3_img',
		'priority' => 1,
	)));
	$wp_customize->add_setting( 'promise2_label', array(
		"default"	=>	__("Free delivery","customizer_party_sections"),
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"promise2_label",
		array(
			"label" => __("Label 2", "customizer_ads_code_label"),
			"section" => "promise",
			"settings" => "promise2_label",
			"type" => "text",
		)
	));
	$wp_customize->add_setting( 'promise3_label', array(
		"default"	=>	__("Devlivers across India","customizer_party_sections"),
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"promise3_label",
		array(
			"label" => __("Label 3", "customizer_ads_code_label"),
			"section" => "promise",
			"settings" => "promise3_label",
			"type" => "text",
		)
	));
}

add_action("customize_register","party_customize_register");   

function party_customizer_live_preview()
{
	wp_enqueue_script("party-themecustomizer", get_template_directory_uri() . "/js/themeoption.js", array("jquery", "customize-preview"), '',  true);
}

add_action("customize_preview_init", "party_customizer_live_preview");
?>
<?php
	function mcp_script_enqueue(){
		wp_enqueue_style('customstyle',get_template_directory_uri().'/css/mytheme.css',array(),'1.0.0','all');
		wp_enqueue_script('customscript',get_template_directory_uri().'/js/mytheme.js',array(),'1.0.0',true);
	}
	add_action('wp_enqueue_scripts','mcp_script_enqueue');

	function mcp_menu_setup(){
		add_theme_support('menus');

		register_nav_menu('Primary','Primary Top menu');
	}
	add_action('init','mcp_menu_setup');
	add_theme_support('custom-background');

?>
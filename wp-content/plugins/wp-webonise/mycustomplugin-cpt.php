<?php
function mcp_register_post_type(){
	$singular='party';
	$plural='Partys';
	$label=array(
		'name'				=>$plural,
		'singular_name'		=>$singular,
		'add_name'			=>'Add New',
		'add_new_item'		=>'Add New '.$singular,
		'edit'				=>'Edit',
		'edit_item'			=>'Edit '.$singular,
		'new_item'			=>'New '.$singular,
		'view'				=>'View '.$singular,
		'view_item'			=>'View '.$singular,
		'search_term'		=>'Search '.$singular,
		'parent'			=>'Parent '.$singular,
		'not_found'			=>'No '.$plural.' Found',
		'not_found_in_trash'=>'No '.$plural.'Found in Trash'
		);
	$args = array(
		'labels' => $label,
        'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_admin_bar'	 =>true,
		'query_var'          => true,
		'rewrite'            => array( 
			'slug' 		=> 'partys',
			'with_front'=>true,
			'pages'		=>true,
			'feeds'		=>true
		 ),
		'taxonomies' => array('category','post_tag'),
		'capability_type'    => 'post',
		'menu_icon'			 =>'dashicons-groups',
		'can_export'		 =>true,
		'delete_with_mcper'	 =>true,
		'hierarchical'		 =>false,
		'has_archive'		 =>true,
		'map_meta_cap'		 =>true,
		'menu_position'      => 11 ,
		'supports'           => array( 
			'title', 
			'editor',
			'cmcptom-fields', 
			'comments',
			'thumbnail' ));
	register_post_type('Party',$args);
}
add_action('init','mcp_register_post_type');
function mcp_load_template($original_template){
	if(get_query_var('post_type')!='party'){
		return $original_template;
	}
	if(is_archive()||is_search()){
		if(file_exists(get_stylesheet_directory().'/archive-party.php')){
			return get_stylesheet_directory.'/archive-party.php';
		}
		else{
			return plugin_dir_path(__FILE__).'template/archive-party.php';
		}
	}else{
		if(file_exists(get_stylesheet_directory().'/single-party.php')){
			return get_stylesheet_directory.'/single-party.php';
		}
		else{
			return plugin_dir_path(__FILE__).'template/single-party.php';
		}
	}
	return $original_template;
}
 //add_action('template_include','mcp_load_template');
?>
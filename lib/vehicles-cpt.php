<?php
/**
 *  Custom Post Type for vehicles
 */
 
 


add_action('init', 'vehicles_register');
 
function vehicles_register() {
 
	$labels = array(
		'name' => _x('Vehicles', 'post type general name'),
		'singular_name' => _x('Vehicles Item', 'post type singular name'),
		'add_new' => _x('Add New', 'Vehicles item'),
		'add_new_item' => __('Add New Vehicles Item'),
		'edit_item' => __('Edit Vehicles Item'),
		'new_item' => __('New Vehicles Item'),
		'view_item' => __('View Vehicles Item'),
		'search_items' => __('Search Vehicles'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'supports'              => array('title','author','thumbnail', 'editor', 'excerpt', 'trackbacks','custom-fields','revisions'),
		'taxonomies'            => array( 'vehicle-category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-format-aside',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'public' => true,  // it's not public, it shouldn't have it's own permalink, and so on
		'exclude_from_search' => true,  // you should exclude it from search results
		'show_in_nav_menus' => true,  // you shouldn't be able to add it to menus
		'has_archive' => false,  // it shouldn't have archive page
		'rewrite' => true,  // it shouldn't have rewrite rules
	  ); 
 
	register_post_type( 'vehicles' , $args );
}




//Reg. taxonomy 
register_taxonomy("vehicle-category", array("vehicles"), array("hierarchical" =>  true, "label" =>  "Vehicles Category", "singular_label" =>  "Vehicles Category", "rewrite" =>  true));
 



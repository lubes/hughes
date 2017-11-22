<?php
/**
 *  Custom Post Type for Auctions
 */
 
 


add_action('init', 'auctions_register');
 
function auctions_register() {
 
	$labels = array(
		'name' => _x('Auctions', 'post type general name'),
		'singular_name' => _x('Auction Item', 'post type singular name'),
		'add_new' => _x('Add New', 'Auction item'),
		'add_new_item' => __('Add New Auction Item'),
		'edit_item' => __('Edit Auction Item'),
		'new_item' => __('New Auction Item'),
		'view_item' => __('View Auction Item'),
		'search_items' => __('Search Auctions'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'supports'              => array('title','author','thumbnail', 'editor', 'excerpt', 'trackbacks','custom-fields','revisions'),
		'taxonomies'            => array( 'auction-category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
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
 
	register_post_type( 'auctions' , $args );
}




//Reg. taxonomy 
register_taxonomy("auction-category", array("auctions"), array("hierarchical" =>  true, "label" =>  "Auctions Category", "singular_label" =>  "Auctions Category", "rewrite" =>  true));
 



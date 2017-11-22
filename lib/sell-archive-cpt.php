<?php
/**
 *  Custom Post Type for Sell Archival
 */
 
 


add_action('init', 'sell_archive_register');
 
function sell_archive_register() {
 
	$labels = array(
		'name' => _x('Sales Archive', 'post type general name'),
		'singular_name' => _x('Sales Archive Item', 'post type singular name'),
		'add_new' => _x('Add New', 'Sales Archive item'),
		'add_new_item' => __('Add New Sales Archive Item'),
		'edit_item' => __('Edit Sales Archive Item'),
		'new_item' => __('New Sales Archive Item'),
		'view_item' => __('View Sales Archive Item'),
		'search_items' => __('Search Sales Archive'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon'     => 'dashicons-format-aside',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes' ),
		'taxonomies' => array('post_tag')
	  ); 
 
	register_post_type( 'sell_archive' , $args );
}




//Reg. taxonomy 
register_taxonomy("sales_category", array("sell_archive"), array("hierarchical" =>  true, "label" =>  "Sales Category", "singular_label" =>  "Sales Category", "rewrite" =>  true));
 



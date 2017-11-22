<?php
/**
 *  Custom Post Type for Customer Testimonials
 */
 
 


add_action('init', 'testimonial_register');
 
function testimonial_register() {
 
	$labels = array(
		'name' => _x('Testimonials', 'post type general name'),
		'singular_name' => _x('Testimonial Item', 'post type singular name'),
		'add_new' => _x('Add New', 'Testimonial item'),
		'add_new_item' => __('Add New Testimonial Item'),
		'edit_item' => __('Edit Testimonial Item'),
		'new_item' => __('New Testimonial Item'),
		'view_item' => __('View Testimonial Item'),
		'search_items' => __('Search Testimonials'),
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
 
	register_post_type( 'testimonial' , $args );
}




//Reg. taxonomy 
register_taxonomy("testimonial-category", array("testimonial"), array("hierarchical" =>  true, "label" =>  "Testimonial Category", "singular_label" =>  "Testimonial Category", "rewrite" =>  true));
 



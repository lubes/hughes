<?php 
/**
 *  Custom Post Type (Slider Galleries)
 */


function my_custom_post_slide() {
	$labels = array(
		'name'               => _x( 'Slide', 'post type general name' ),
		'singular_name'      => _x( 'Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Slide' ),
		'edit_item'          => __( 'Edit Slide' ),
		'new_item'           => __( 'New Slide' ),
		'all_items'          => __( 'All Slides' ),
		'view_item'          => __( 'View Slide' ),
		'search_items'       => __( 'Search Slides' ),
		'not_found'          => __( 'No Slides found' ),
		'not_found_in_trash' => __( 'No Slides found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Slides'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Slides and Slide specific data',
		'public'        => true,
		'menu_position'         => 7,
		'menu_icon'             => 'dashicons-format-aside',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes' ),
		'has_archive'   => true,
	);
	register_post_type( 'slide', $args );	
}
add_action( 'init', 'my_custom_post_slide' );



/* CUSTOM INTERACTION MESSAGES (Adding the Messages)
 *
 */ 
 
 
 function my_updated_messages( $messages ) {
	global $post, $post_ID;
	$messages['slide'] = array(
		0 => '', 
		1 => sprintf( __('Slide updated. <a href="%s">View Slide</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.'),
		3 => __('Custom field deleted.'),
		4 => __('Slide updated.'),
		5 => isset($_GET['revision']) ? sprintf( __('Slide restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Slide published. <a href="%s">View Slide</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Slide saved.'),
		8 => sprintf( __('Slide submitted. <a target="_blank" href="%s">Preview Slide</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Slide scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Slide</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Slide draft updated. <a target="_blank" href="%s">Preview Slide</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );


/**
 * CONTEXTUAL HELP
 */
 

function my_contextual_help( $contextual_help, $screen_id, $screen ) { 
	if ( 'slide' == $screen->id ) {

		$contextual_help = '<h2>Slides</h2>
		<p>Slides show the details of the items that we sell on the website. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p> 
		<p>You can view/edit the details of each slide by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';

	} elseif ( 'edit-slide' == $screen->id ) {

		$contextual_help = '<h2>Editing Slides</h2>
		<p>This page allows you to view/modify Slide details. Please make sure to fill out the available boxes with the appropriate details (Slide image, price, brand) and <strong>not</strong> add these details to the slide description.</p>';

	}
	return $contextual_help;
}
add_action( 'contextual_help', 'my_contextual_help', 10, 3 );



/*
Custom Taxomony 
*
*/

function my_taxonomies_slide() {
	$labels = array(
		'name'              => _x( 'Slide Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Slide Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Slide Categories' ),
		'all_items'         => __( 'All Slide Categories' ),
		'parent_item'       => __( 'Parent Slide Category' ),
		'parent_item_colon' => __( 'Parent Slide Category:' ),
		'edit_item'         => __( 'Edit Slide Category' ), 
		'update_item'       => __( 'Update Slide Category' ),
		'add_new_item'      => __( 'Add New Slide Category' ),
		'new_item_name'     => __( 'New Slide Category' ),
		'menu_name'         => __( 'Slide Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'slide_category', 'slide', $args );
}
add_action( 'init', 'my_taxonomies_slide', 0 );



/**
* add order column to admin listing screen for header text
* So, assuming the custom post type is called Slide (in our Case), these are the functions and hooks that are needed:

*/
function add_new_slide_column($slide_columns) {
  $slide_columns['menu_order'] = "Order";
  return $slide_columns;
}
add_action('manage_edit-slide_columns', 'add_new_slide_column');

/**
* show custom order column values
*/
function show_order_column($name){
  global $post;

  switch ($name) {
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
   default:
      break;
   }
}
add_action('manage_slide_posts_custom_column','show_order_column');
/**
* make column sortable
*/
function order_column_register_sortable($columns){
  $columns['menu_order'] = 'menu_order';
  return $columns;
}
add_filter('manage_edit-slide_sortable_columns','order_column_register_sortable');
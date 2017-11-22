<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'ESW_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'standard',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Slide Details', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'slide' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		// TEXT
		
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Date', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}Date",
			// Field description (optional)
			'desc'  => __( 'Enter Showroom/Sale date', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
		
		
		/*array(
			// Field name - Will be used as label
			'name'  => __( 'Showroom Time', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}Time",
			// Field description (optional)
			'desc'  => __( 'Enter Showroom/Sale Time', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),*/


		array(
			// Field name - Will be used as label
			'name'  => __( 'Google Map', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}Map",
			// Field description (optional)
			'desc'  => __( 'Enter Showroom/Sale Url to Google maps', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
		
		array(
			// Field name - Will be used as label
			'name'  => __( 'Google Map Address Name', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}Map_Name",
			// Field description (optional)
			'desc'  => __( 'Enter Showroom/Sale address', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),


		
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Link Name', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}Link_Name",
			// Field description (optional)
			'desc'  => __( 'Link Name i.e Buy, Preview.', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
		
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Link', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}Link",
			// Field description (optional)
			'desc'  => __( 'Link to Sale Gallery or Buy pg.', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
		
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Sold For', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}Sold",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),

		
		
	)
);

/********************* SELL ARCHIVE ***********************/

$meta_boxes[] = array(
	'title' => __( 'Additional Information', 'rwmb' ),
	
	
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'sell_archive' ),

	'fields' => array(
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Date', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}archive_date",
			// Field description (optional)
			'desc'  => __( 'Past sale date', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
		
		
	)
);



/********************* PAGE META BOX ***********************/

$meta_boxes[] = array(
	'title' => __( 'Additional Content Area', 'rwmb' ),
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),

	'fields' => array(
		// TEXT
		array(
			'name' => __( '', 'rwmb' ),
			'id'   => "{$prefix}wysiwyg",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 15,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		
		
	)
);



//Auctions




//auctions page
$meta_boxes[] = array(
	'title' => __( 'Auctions', 'rwmb' ),
	
	'id' => 'auctions_top_section',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),
	
	// Register this meta box for posts matched below conditions
		'include' => array(
			
			'template'        => array( 'template-auctions.php' ),
	
	),
	

	'fields' => array(
		
	
		// IMAGE UPLOAD
		array(
			'name' => __( 'Image', 'rwmb' ),
			'id'   => "{$prefix}auc_img",
			'type' => 'thickbox_image',
		),
	
	// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Title', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}auc_title",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
	
	// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'excerpt', 'rwmb' ),
			'id'   => "{$prefix}auc_excerpt",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
	
		
		
	)
);



//auctions page
$meta_boxes[] = array(
	'title' => __( 'How to Bid', 'rwmb' ),
	
	'id' => 'how_to_bid_section',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),
	
	// Register this meta box for posts matched below conditions
		'include' => array(
			
			'template'        => array( 'template-auctions.php' ),
	
	),
	

	'fields' => array(
		
	
	// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Intro', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}intro_section",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'textarea',
			
		),
	
	// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'col_1', 'rwmb' ),
			'id'   => "{$prefix}col_1",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
	
	
	// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'col_2', 'rwmb' ),
			'id'   => "{$prefix}col_2",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
	
	
	// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'col_3', 'rwmb' ),
			'id'   => "{$prefix}col_3",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
	
	// FILE ADVANCED (WP 3.5+)
		array(
			'name' => __( 'Bidding Form', 'rwmb' ),
			'id'   => "{$prefix}bidding_pdf",
			'type' => 'file'
			
		),
	
		
		
	)
);


//auctions page
$meta_boxes[] = array(
	'title' => __( 'View Full Collection Link', 'rwmb' ),
	
	'id' => 'auctions_link',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),
	
	// Register this meta box for posts matched below conditions
		'include' => array(
			
			'template'        => array( 'template-auctions.php' ),
	
	),
	

	'fields' => array(
		
	
	// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'View Full Collection Link', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}collection_link",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
	
	
	
	
	
		
		
	)
);






//auctions page
$meta_boxes[] = array(
	'title' => __( 'Past Auctions', 'rwmb' ),
	
	'id' => 'auctions_bottom_section',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),
	
	// Register this meta box for posts matched below conditions
		'include' => array(
			
			'template'        => array( 'template-auctions.php' ),
	
	),
	

	'fields' => array(
		
	
		// IMAGE UPLOAD
		array(
			'name' => __( 'Image', 'rwmb' ),
			'id'   => "{$prefix}past_auc_img",
			'type' => 'thickbox_image',
		),
	
	// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Title', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}past_auc_title",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
	
	// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'excerpt', 'rwmb' ),
			'id'   => "{$prefix}past_auc_excerpt",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
	
	
		// FILE ADVANCED (WP 3.5+)
		array(
			'name' => __( 'PDF Upload', 'rwmb' ),
			'id'   => "{$prefix}auc_pdf",
			'type' => 'file'
			
		),
	
	
		// DATE
		array(
			'name' => __( 'Date', 'rwmb' ),
			'id'   => "{$prefix}auc_date",
			'type' => 'date',

			// jQuery date picker options. See here http://api.jqueryui.com/datepicker
			'js_options' => array(
				'appendText'      => __( '(yyyy-mm-dd)', 'rwmb' ),
				'dateFormat'      => __( 'MM d, yy', 'rwmb' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
	
		
		
	)
);




//vehicle page
$meta_boxes[] = array(
	'title' => __( 'Vehicles Info', 'rwmb' ),
	
	'id' => 'vehicle_top_section',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),
	
	// Register this meta box for posts matched below conditions
		'include' => array(
			
			'template'        => array( 'template-vehicles.php' ),
	
	),
	

	'fields' => array(
		
	
		// IMAGE UPLOAD
		array(
			'name' => __( 'Image', 'rwmb' ),
			'id'   => "{$prefix}veh_img",
			'type' => 'thickbox_image',
		),
	
	// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Title', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}veh_title",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
	
	// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'excerpt', 'rwmb' ),
			'id'   => "{$prefix}veh_excerpt",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
	
		
		
	)
);




//Home page
$meta_boxes[] = array(
	'title' => __( 'Video', 'rwmb' ),
	
	'id' => 'video',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),
	
	// Register this meta box for posts matched below conditions
		'include' => array(
			
			'template'        => array( 'front-page.php' ),
	
	),
	

	'fields' => array(
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Video ID', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}video_id",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
	
	
		// IMAGE UPLOAD
		array(
			'name' => __( 'Image', 'rwmb' ),
			'id'   => "{$prefix}video_img",
			'type' => 'thickbox_image',
		),
	
	
		
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Title', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}video_title",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
	
	// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'excerpt', 'rwmb' ),
			'id'   => "{$prefix}video_excerpt",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
	
		
		
	)
);



//Employee hover image
$meta_boxes[] = array(
	'title' => __( 'Employee hover image.', 'rwmb' ),
	
	
	'id' => 'about_img',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),
	


	'fields' => array(
		// IMAGE UPLOAD
		array(
			'name' => __( 'hover image', 'rwmb' ),
			'id'   => "{$prefix}hover_img",
				'type' => 'thickbox_image',
		),
		
	)
);







//Feature Product img
$meta_boxes[] = array(
	'title' => __( 'Feature Product on Shop Page.', 'rwmb' ),
	
	
	'id' => 'featured_product_img',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'product' ),
	


	'fields' => array(
	
		// CHECKBOX
		array(
			'name' => __( 'Check to show on shop pg.', 'rwmb' ),
			'id'   => "_featured_shop",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		),
		// IMAGE UPLOAD
		array(
			'name' => __( 'Image Upload', 'rwmb' ),
			'id'   => "{$prefix}featured_product",
			'type' => 'image',
		),
	
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Title', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "_title",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
		
		
	)
);


//Auction Gallery
$meta_boxes[] = array(
	'title' => __( 'Auction Gallery Images', 'rwmb' ),
	
	
	'id' => 'auction_img',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'auctions' ),
	
    'fields' => array(

	
			array(
			'name'             => __( 'Plupload Image Upload', 'rwmb' ),
			'id'               => "{$prefix}auction_thumbs",
			'type'             => 'plupload_image',
			'max_file_uploads' => 8,
		),
	
		
	)
);




//Vehicles Gallery
$meta_boxes[] = array(
	'title' => __( 'Vehicles Gallery Images', 'rwmb' ),
	
	
	'id' => 'vehicles_img',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'vehicles' ),
	
    'fields' => array(
			array(
			'name'             => __( 'Plupload Image Upload', 'rwmb' ),
			'id'               => "{$prefix}vehicles_thumbs",
			'type'             => 'plupload_image',
			'max_file_uploads' => 8,
		),
	
		
	)
);



$meta_boxes[] = array(
	'title' => __( 'Vehicles Meta Info', 'rwmb' ),
	
	'id' => 'vehicles_meta',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'vehicles' ),
	
    'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Sold For Price', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}sold_price",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
	
	
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Link', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}custom_link",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
	
		
	)
);


$meta_boxes[] = array(
	'title' => __( 'Auctions Meta Info', 'rwmb' ),
	
	'id' => 'auctions_meta',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'auctions' ),
	
    'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Estimated or Sold For Price', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}auctions_sold_price",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
	
	
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Read More Link', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}auctions_custom_link",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
	
		// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'External Link to Auctions Website', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}auctions_external_link",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
	
		
	)
);



//Why it works

$meta_boxes[] = array(
	'title' => __( 'Why It Works', 'rwmb' ),
	
	'id' => 'why_it_works',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),
	
	// Register this meta box for posts matched below conditions
		'include' => array(
			
			'template'        => array( 'template-services.php' ),
	
	),
	
	
    'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Title', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}why_title",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
	
	
			
	
			// TEXT
			array(
				'name' => __( 'Copy', 'rwmb' ),
				'id'   => "{$prefix}why_text",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'  => false,
				'std'  => __( '', 'rwmb' ),

				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 15,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
		
	)
);






//Looping thru the Steps (x)s
	$i = 1; 
	while($i <= 5) {
//Step 1
$meta_boxes[] = array(
	'title' => __( 'Step '.$i.'', 'rwmb' ),
	
	'id' => 'step_'.$i.'',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),
	
	// Register this meta box for posts matched below conditions
		'include' => array(
			
			'template'        => array( 'template-services.php' ),
	
	),
	

	'fields' => array(
		
	
		// IMAGE UPLOAD
		array(
			'name'             => __( 'Plupload Image Upload', 'rwmb' ),
			'id'               => "{$prefix}step_imgs_".$i."",
			'type'             => 'plupload_image',
			'max_file_uploads' => 3,
		),
	
	
		
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Title', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}step_title_".$i."",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
	
	// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Copy', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}step_excerpt_".$i."",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'textarea',
			
			
		),
		
		
	)
);


	
	$i++;
} 	
	
	
//END Packages	







/********************* Product META BOX ***********************/

$meta_boxes[] = array(
	'title' => __( 'Product Pie Chart', 'rwmb' ),
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'product' ),

	'fields' => array(
		// TEXT
		// SLIDER
		array(
			'name' => __( 'Condition: ', 'rwmb' ),
			'id'   => "condition",
			'type' => 'slider',

			// Text labels displayed before and after value
			'prefix' => __( '', 'rwmb' ),
			'suffix' => __( ' %', 'rwmb' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 10,
				'step'  => 1,
			),
		),
		
		
		array(
			'name' => __( 'Cool Factor: ', 'rwmb' ),
			'id'   => "cool_factor",
			'type' => 'slider',

			// Text labels displayed before and after value
			'prefix' => __( '', 'rwmb' ),
			'suffix' => __( ' %', 'rwmb' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 10,
				'step'  => 1,
			),
		),
		
		array(
			'name' => __( 'Rarity: ', 'rwmb' ),
			'id'   => "rarity",
			'type' => 'slider',

			// Text labels displayed before and after value
			'prefix' => __( '', 'rwmb' ),
			'suffix' => __( ' %', 'rwmb' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 10,
				'step'  => 1,
			),
		),
		
		
	)
);




/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );

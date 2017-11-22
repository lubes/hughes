<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to WooFramework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/includes/';

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'jo9w218fm4dxwa277zpwscvu7sc97ncti' );

// WooFramework
require_once ($functions_path . 'admin-init.php' );			// Framework Init

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-plugins.php', 			// Theme specific plugins integrated in a theme
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php',			// Theme widgets
				'includes/theme-install.php',			// Theme Installation
				'includes/theme-woocommerce.php'		// WooCommerce overrides
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );
				
foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

function buy_query( $query ) {
	
    if ($query->is_post_type_archive() && is_main_query() && !is_admin()) {
		$args = array(
				   'post_type' => 'product',
				   'posts_per_page' => 16,
				   'order'    => 'ASC',
				   'paged' => $paged
				   );
        $query->set('post_type', 'product');
        $query->set('posts_per_page', '16');
    }
}
add_action( 'pre_get_posts', 'buy_query' );








add_action('woocommerce_add_to_cart','setTimer');
//add_filter('woocommerce_add_to_cart_handler', 'setTimer');
function setTimer (){  
$currentTime = strtotime('+20 minutes');
$currentDate = date("D M d Y H:i:s (e)",$currentTime);
$currentDate = urlencode($currentDate );
$expire = time()+60*20;
setrawcookie("timercookie", $currentTime , $expire, "/", "hughesestatesales.com", false);
}

// Woocommerce New Customer Admin Notification Email
add_action('woocommerce_created_customer', 'admin_email_on_registration');
function admin_email_on_registration() {
    $user_id = get_current_user_id();
    wp_new_user_notification( $user_id );
}


require_once locate_template('/lib/scripts.php');         // Scripts and stylesheets
require_once locate_template('/lib/ESW-functions.php'); // Eat.Sleep.Work functions


/*-----------------------------------------------------------------------------------*/
/*  Add Custom Meta Boxes
/*-----------------------------------------------------------------------------------*/
// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box-master' ) );
define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/meta-box-master' ) );

// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';


include 'demo.php';

/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>
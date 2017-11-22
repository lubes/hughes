<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
 
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="<?php echo get_bloginfo('template_directory');?>/assets/js/html5shiv.js"></script>
    <![endif]-->
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	//bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<script src="<?php echo get_bloginfo('template_directory');?>/assets/js/Chart.js"></script>

<script src="<?php echo get_bloginfo('template_directory');?>/assets/js/modernizr.js" type="text/javascript"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>
    <![endif]-->
    
    
  <?php  if ( is_page_template('template-contact.php') ) {
?>
<style>
#map-canvas {width: 100%;height: 626px;}
#map-canvas img { max-width:none; }
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&sensor=false"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/assets/js/g-maps.js"></script>

<?php 
} else {
	
	//do nothing
	
} 

?>    
<link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory');?>/assets/ico/HES_Favicon_32x32.png" />
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9028381-4");
pageTracker._trackPageview();
} catch(err) {}</script>
<?php global $woocommerce;
$currentTime = strtotime("now");
if( $_COOKIE["timercookie"] < $currentTime){
	$woocommerce->cart->empty_cart();
} ?>
</head>

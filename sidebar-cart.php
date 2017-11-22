<?php 
/**
 * Sidebar Template
 *
 * If a `primary` widget area is active and has widgets, display the sidebar.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
	
	?>
	
<aside id="cart-sidebar" class="span3 feature-product">

<div class="widget">
<h4>Forget Something?</h4>

	 <?php

$paged = 1;

if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');
global $wp_query;
query_posts( array( 
                    'post_type' => 'product',
					'showposts' => 2,
					'order' => 'DESC',
					'paged' => $paged, 
                    
								   
									
                                        )  );    
   
require_once( 'woocommerce/the-main-loop.php' );
// Start the loop for  Products
?>

</div>

</aside>

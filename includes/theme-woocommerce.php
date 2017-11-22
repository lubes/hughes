<?php
/*-----------------------------------------------------------------------------------*/
/* Any WooCommerce overrides can be found here
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* This theme supports WooCommerce, woo! */
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

// Disable WooCommerce styles
define('WOOCOMMERCE_USE_CSS', false);

// Change columns in product loop to 4
function loop_columns() {
	return 4;
}
add_filter('loop_shop_columns', 'loop_columns');

// Display 16 products per page
add_filter('loop_shop_per_page', create_function('$cols', 'return 200;'));

// Remove the add to cart button from the product loop
//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 2);



// Adjust markup on all WooCommerce pages

add_action('init','your_face',10);

function your_face() {
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

}

add_action( 'woocommerce_before_main_content', 'shelflife_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'shelflife_after_content', 20 );

// Fix the layout etc
if (!function_exists('shelflife_before_content')) {
	function shelflife_before_content() {
	?>
		<!-- #content Starts -->
		<?php woo_content_before(); ?>
	    <div id="content" class="col-full">
			<?php
				global  $woo_options;
				if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) {
					woo_breadcrumbs();
				}
			?>
	        <!-- #main Starts -->
	        <?php woo_main_before(); ?>
	        <div id="main" class="col-left">
	    <?php
	}
}

if (!function_exists('shelflife_after_content')) {
	function shelflife_after_content() {
	?>
			</div><!-- /#main -->
	        <?php woo_main_after(); ?>
	    </div><!-- /#content -->
		<?php woo_content_after(); ?>
	    <?php
	}
}

// Add the WC sidebar in the right place
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action( 'woo_main_after', 'woocommerce_get_sidebar', 10);


// Remove breadcrumb (we're using the WooFramework default breadcrumb)
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
/*
add_action( 'woo_content_before', 'woocommerceframework_breadcrumb', 01, 0);

if (!function_exists('woocommerceframework_breadcrumb')) {
	function woocommerceframework_breadcrumb() {
		global  $woo_options;
		if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) {
			woo_breadcrumbs();
		}
	}
}
*/


// Remove duplicated Products page link from breadcrumbs
add_filter( 'woo_breadcrumbs_trail', 'woo_custom_filter_breadcrumbs_trail', 10 );
if (!function_exists('woo_custom_filter_breadcrumbs_trail')) {
	function woo_custom_filter_breadcrumbs_trail ( $trail ) {
	  foreach ( $trail as $k => $v ) {
	    if ( strtolower( strip_tags( $v ) ) == 'shop' ) {
	      unset( $trail[$k] );
	      break;
	    }
	  }

	  return $trail;
	} // End woo_custom_filter_breadcrumbs_trail()
}

// Remove pagination (we're using the WooFramework default pagination)
remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'woocommerceframework_pagination', 10 );

function woocommerceframework_pagination() {
	if ( is_search() && is_post_type_archive() ) {
		add_filter( 'woo_pagination_args', 'woocommerceframework_add_search_fragment', 10 );
		add_filter( 'woo_pagination_args_defaults', 'woocommerceframework_woo_pagination_defaults', 10 );
	}
	woo_pagination();
}

function woocommerceframework_add_search_fragment ( $settings ) {
	$settings['add_fragment'] = '&post_type=product';
	return $settings;
} // End woocommerceframework_add_search_fragment()

function woocommerceframework_woo_pagination_defaults ( $settings ) {
	$settings['use_search_permastruct'] = false;

	return $settings;
} // End woocommerceframework_woo_pagination_defaults()

// Remove sidebar on single shop pages
//add_action('wp', create_function("", "if (is_singular(array('product'))) remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);") );

// Remove sidebar on shop archive pages
//add_action('wp', create_function("", "if (is_archive(array('product'))) remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);") );


// Change columns in related products output to 3 and move below the product summary
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20);

if (!function_exists('woocommerce_output_related_products')) {
	function woocommerce_output_related_products() {
	    woocommerce_related_products(3,3); // 3 products, 3 columns
	}
}

// Change columns in upsells output to 3 and move below the product summary
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product', 'woocommerceframework_upsell_display', 20);

if (!function_exists('woocommerceframework_upsell_display')) {
	function woocommerceframework_upsell_display() {
	    woocommerce_upsell_display(3,3); // 3 products, 3 columns
	}
}

// Adjust the star rating in the sidebar
add_filter('woocommerce_star_rating_size_sidebar', 'woostore_star_sidebar');

if (!function_exists('woostore_star_sidebar')) {
	function woostore_star_sidebar() {
		return 12;
	}
}

// Adjust the star rating in the recent reviews
add_filter('woocommerce_star_rating_size_recent_reviews', 'woostore_star_reviews');

if (!function_exists('woostore_star_reviews')) {
	function woostore_star_reviews() {
		return 12;
	}
}

// Sticky shortcode
function woo_shortcode_sticky( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'class' => '',
      ), $atts ) );

   return '<div class="shortcode-sticky ' . esc_attr($class) . '">' . $content . '</div><!--/shortcode-sticky-->';
}

add_shortcode( 'sticky', 'woo_shortcode_sticky' );

// Sale shortcode
function woo_shortcode_sale ( $atts, $content = null ) {
	$defaults = array();
	extract( shortcode_atts( $defaults, $atts ) );
	return '<div class="shortcode-sale"><span>' . $content . '</span></div><!--/.shortcode-sale-->';
}

add_shortcode( 'sale', 'woo_shortcode_sale' );

// Add image wrap
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_product_thumbnail_wrap_open', 5, 2);
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_product_thumbnail_wrap_open', 5, 2);

if (!function_exists('woocommerce_product_thumbnail_wrap_open')) {
	function woocommerce_product_thumbnail_wrap_open() {
		echo '<div class="img-wrap">';
	}
}

// Close image wrap
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_product_thumbnail_wrap_close', 15, 2);
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_product_thumbnail_wrap_close', 11, 2);

if (!function_exists('woocommerce_product_thumbnail_wrap_close')) {
	function woocommerce_product_thumbnail_wrap_close() {
		echo '</div> <!--/.wrap-->';
	}
}

// Handle cart in header fragment for ajax add to cart
add_filter('add_to_cart_fragments', 'woocommerceframework_header_add_to_cart_fragment');

if (!function_exists('woocommerceframework_header_add_to_cart_fragment')) {
	function woocommerceframework_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		?>
        <?php if (sizeof($woocommerce->cart->cart_contents)>0) :
		            echo ' <ul class="mini-cart active-cart">';
					else :
		            echo '<ul class="mini-cart">';
		            endif;
		 ?> 
			<li>
				<a onclick="javascript:location.href='https://www.hughesestatesales.com/cart/'" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>" class="cart-parent"><span>
				<?php echo sprintf(_n('<mark>%d </mark>', '<mark>%d</mark>', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?>
				</span>

				</a>
				<?php

		        echo '<ul class="cart_list">';
		          echo '<span class="arrow">arrow</span>';
		           if (sizeof($woocommerce->cart->cart_contents)>0) : 
				   echo '<div class="cart-header">';
				   echo sprintf(_n('<h4>You have %d item in your cart.</h4><div class="count-down"><i class="count"></i><span></span></div>', '<h4>You have %d items in your cart. </h4><div class="count-down"><i class="count"></i><span></span></div>', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);
				   echo '</div>';
				   foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
			           $_product = $cart_item['data'];
			           if ($_product->exists() && $cart_item['quantity']>0) :
			              
						   echo '<li class="cart_list_product"><a href="'.get_permalink($cart_item['product_id']).'">';
							
			               echo '<figure class="crop-img">'.$_product->get_image(). '</figure>';
							echo '<h3>';
			               echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product).'</h3></a>';

			               if($_product instanceof woocommerce_product_variation && is_array($cart_item['variation'])) :
			                   echo woocommerce_get_formatted_variation( $cart_item['variation'] );
			                 endif;

			               echo '<span class="price">'.woocommerce_price($_product->get_price()).'</span></li>';
			           endif;
			       endforeach;
				
		        	else: 
					
					echo '<li class="cart-title">'.__('<h3>There are no items in your cart.</h3>','woothemes').'</li>';
					
					echo '<li class="empty">'.__('Reminder: Items you place in your cart<br>
                are reserved for 20 minutes','woothemes').'</li>'; 
					echo '<li><input type="button" value="Shop Now &raquo;" onclick="newDoc()" class="grn-link"></li>';
				
					endif;
		        	if (sizeof($woocommerce->cart->cart_contents)>0) :
		            echo '<ul class="inline">';
					echo '<li class="total"><strong>';
					
					

		            if (get_option('js_prices_include_tax')=='yes') :
		                _e('Total', 'woothemes');
		            else :
		                _e('Subtotal', 'woothemes');
		            endif;



		            echo ':</strong>'.$woocommerce->cart->get_cart_total();' ';

		            ?><span class="pull-right"><a onclick="javascript:location.href='https://www.hughesestatesales.com/cart/'" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="btn checkout-button checkout">View Cart</a></span></li><?php
					echo '</ul>';
		        endif;

		        echo '</ul>';

		    ?>
			</li>
		</ul>
        </div>
       
		<?php
		/* mini cart drop down when product added to cart
		if (sizeof($woocommerce->cart->cart_contents)>0){
			 echo '<script>setHover();</script>';
		}*/
		$fragments['ul.mini-cart'] = ob_get_clean();

		return $fragments;

	}
}

function shelflife_order_by_rating_post_clauses( $args ) {

    global $wpdb;

    $args['where'] .= " AND $wpdb->commentmeta.meta_key = 'rating' ";

    $args['join'] .= "
    	LEFT JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
    	LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
    ";

    $args['orderby'] = "$wpdb->commentmeta.meta_value DESC";

    $args['groupby'] = "$wpdb->posts.ID";

    return $args;
}

?>
<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>


<header class="checkout-title"><h1>Shopping Cart</h1></header>

<div class="empty-cart">


<p class="helper"><?php _e( 'Your Cart is Empty.', 'woocommerce' ) ?></p>

<?php do_action('woocommerce_cart_is_empty'); ?>

<p><a class="grn-link" href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><i class="icon-angle-left"></i><span style="display: inline-block;
    vertical-align: top;"><?php _e( '  Return To Shop', 'woocommerce' ) ?></span></a></p></div>
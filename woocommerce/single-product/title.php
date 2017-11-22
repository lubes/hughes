<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div class="summary-details">

<div class="spotlight-time mobile-hide"><i class="clock-icon"></i><span><?php do_action( 'woocommerce_single_product_timer' ); ?></span></div>


<h1 itemprop="name" class="product_title"><?php the_title(); ?></h1>
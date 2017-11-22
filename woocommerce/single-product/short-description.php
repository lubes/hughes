<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

if ( ! $post->post_content ) return;
?>
<div itemprop="description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_content ) ?>


<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="price-left">

<?php if ( ! $product->is_in_stock() ) : ?>

	<p class="price sold"> <?php echo $product->get_price_html(); ?> <?php echo apply_filters( 'out_of_stock_add_to_cart_text', __( 'Sold', 'woocommerce' ) ); ?></p>

<?php else : ?>



	<p itemprop="price" class="price"><?php echo $product->get_price_html(); ?> <span></p>

	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
    
    <?php endif; ?>

</div>


<?php 
	
	if ( ! $product->is_purchasable() ) return;
?>

<?php
	// Availability
	 /* $availability = $product->get_availability();

	if ($availability['availability']) :
		echo apply_filters( 'woocommerce_stock_html', '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>', $availability['availability'] );
    endif; */
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action('woocommerce_before_add_to_cart_form'); ?>

	<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype='multipart/form-data'>

	 	<?php do_action('woocommerce_before_add_to_cart_button'); ?>

	 	<?php
	 		if ( ! $product->is_sold_individually() )
	 			woocommerce_quantity_input( array(
	 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
	 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
	 			) );
	 	?>

	 	
        
        <button type="submit" class="btn drk-green shop-btn add_to_cart_button single_add_to_cart_button  alt product_type_<?php echo $product->product_type; ?>" data-product_id="<?php echo $product->id; ?>"><?php echo apply_filters('single_add_to_cart_text', __('BUY NOW', 'woocommerce'), $product->product_type); ?></button>
        

	 	<?php do_action('woocommerce_after_add_to_cart_button'); ?>

	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

<?php endif; ?>




</div>
</div><!--//summary-details-->
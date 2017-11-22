<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

$available_methods = $woocommerce->shipping->get_available_shipping_methods();
?>
<div class="cart_totals <?php if ( $woocommerce->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<?php if ( ! $woocommerce->shipping->enabled || $available_methods || ! $woocommerce->customer->get_shipping_country() || ! $woocommerce->customer->has_calculated_shipping() ) : ?>

		

		

	<div class="totals-col col" style="width:100%;">	
    
    <div class="reseller-col col pull-left">
        <div class="resel-desc">
        <h4>Are you a Reseller?</h4>
        <span><a href="/my-account" id="reseller-register">Register</a> or <a href="/my-account" id="reseller-login">Login</a></span>
        </div>
        </div>		
					
                   <ul class="inline ">
                    <li class="subtotal"><strong><?php _e( 'Subtotal', 'woocommerce' ); ?></strong></li>
					<li class="sub-price"><strong><?php echo $woocommerce->cart->get_cart_subtotal(); ?></strong></li>
				
                </li>
               </ul>
                
              	<?php if ( $woocommerce->cart->coupons_enabled() ) { ?>
					<div class="coupon">

						<label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input type="submit" class="checkout-button btn" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" /> <input name="coupon_code" placeholder="Enter Promo Code" class="input-text" id="coupon_code" value="" /> 

						<?php do_action('woocommerce_cart_coupon'); ?>

					</div>
				<?php } ?>


				<?php if ( $woocommerce->cart->get_discounts_before_tax() ) : ?>

					
					<?php _e( 'Cart Discount', 'woocommerce' ); ?> <a href="<?php echo add_query_arg( 'remove_discounts', '1', $woocommerce->cart->get_cart_url() ) ?>"><?php _e( '[Remove]', 'woocommerce' ); ?></a>
						-<?php echo $woocommerce->cart->get_discounts_before_tax(); ?></td>
					

				<?php endif; ?>
               

				<?php if ( $woocommerce->cart->needs_shipping() && $woocommerce->cart->show_shipping() && ( $available_methods || get_option( 'woocommerce_enable_shipping_calc' ) == 'yes' ) ) : ?>

					<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

					  <ul class="inline shipping-class">
						<li><?php _e( 'UPS Shipping', 'woocommerce' ); ?></li>
						<li class="last"><?php woocommerce_get_template( 'cart/shipping-methods.php', array( 'available_methods' => $available_methods ) ); ?></li>
					
                    </ul>
                    	<div class="cart-collaterals">

	<?php do_action('woocommerce_cart_collaterals'); ?>

	

	<?php woocommerce_shipping_calculator(); ?>

</div>
                    
                 

					<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

				<?php endif ?>
                
               

				<?php foreach ( $woocommerce->cart->get_fees() as $fee ) : ?>

					<ul class="fee inline fee-<?php echo $fee->id ?>">
						<li><?php echo $fee->name ?></li>
						<li><?php
							if ( $woocommerce->cart->tax_display_cart == 'excl' )
								echo woocommerce_price( $fee->amount );
							else
								echo woocommerce_price( $fee->amount + $fee->tax );
						?></li>
					</ul>

				<?php endforeach; ?>
                
                
                <?php if ( is_user_logged_in() && logged_in()) {
		
		
	// Show NO taxes is user has been approved
	
	
	} else if(is_user_logged_in()){ 
	
	
		// Show the tax user hasn't been approved as a reseller
					if ( $woocommerce->cart->tax_display_cart == 'excl' ) {
						foreach ( $woocommerce->cart->get_tax_totals() as $code => $tax ) {
							echo '<ul class="tax-rate inline tax-rate-' . $code . '">
								<li>' . $tax->label . '</li>
								<li>' . $tax->formatted_amount . '</li>
							</ul>';
						}
					}
	
	} else { 
	
	
	
					// Show the tax row if user is only a guest
					if ( $woocommerce->cart->tax_display_cart == 'excl' ) {
						foreach ( $woocommerce->cart->get_tax_totals() as $code => $tax ) {
							echo '<ul class="tax-rate inline tax-rate-' . $code . '">
								<li>' . $tax->label . '</li>
								<li>' . $tax->formatted_amount . '</li>
							</ul>';
						}
					}
				
	
	
	}
	?>
                
                
                
                
                

				

				<?php if ( $woocommerce->cart->get_discounts_after_tax() ) : ?>

					  <ul class="inline">
						<li><?php _e( 'Order Discount', 'woocommerce' ); ?> <a href="<?php echo add_query_arg( 'remove_discounts', '2', $woocommerce->cart->get_cart_url() ) ?>"><?php _e( '[Remove]', 'woocommerce' ); ?></a></li>
						<li>-<?php echo $woocommerce->cart->get_discounts_after_tax(); ?></li>
					</ul>

				<?php endif; ?>

				
			
            
            

 </div><!--//totals-col-->
 
 
 
 
 
 
 
 
 
		<?php if ( $woocommerce->cart->get_cart_tax() ) : ?>

			<div class="woocommerce-info">
<p><small><?php

				$estimated_text = ( $woocommerce->customer->is_customer_outside_base() && ! $woocommerce->customer->has_calculated_shipping() ) ? sprintf( ' ' . __( ' (taxes estimated for %s)', 'woocommerce' ), $woocommerce->countries->estimated_for_prefix() . __( $woocommerce->countries->countries[ $woocommerce->countries->get_base_country() ], 'woocommerce' ) ) : '';

				printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );

			?></small></p></div>

		<?php endif; ?>

	<?php elseif( $woocommerce->cart->needs_shipping() ) : ?>

		<?php if ( ! $woocommerce->customer->get_shipping_state() || ! $woocommerce->customer->get_shipping_postcode() ) : ?>

			<div class="woocommerce-info">

				<p><?php _e( 'No shipping methods were found; please recalculate your shipping and enter your state/county and zip/postcode on the checkout page to ensure there are no other available methods for your location.', 'woocommerce' ); ?></p>

			</div>

		<?php else : ?>

			<?php

				$customer_location = $woocommerce->countries->countries[ $woocommerce->customer->get_shipping_country() ];

				echo apply_filters( 'woocommerce_cart_no_shipping_available_html',
					'<div class="woocommerce-error"><p>' .
					sprintf( __( 'Sorry, it seems that there are no available shipping methods for your location (%s).', 'woocommerce' ) . ' ' . __( 'If you require assistance or wish to make alternate arrangements please contact us.', 'woocommerce' ), $customer_location ) .
					'</p></div>'
				);

			?>

		<?php endif; ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>
    
   

</div>


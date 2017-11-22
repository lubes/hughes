<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

$woocommerce->show_messages(); ?>

<div class="myaccount">





<?php if ( is_user_logged_in() && logged_in()) {
		printf(
		__( '<h2 class="myaccount_user">Welcome, <span>%s</span>.</h2> <p>Your Hughes Reseller status has been approved. You can now start shopping for resale merchandise. <a class="class="grn-link" style="display:block; margin-top:20px" href="/shop"><i class="icon-angle-left"></i><span>RETURN TO STORE</span></a></p>', 'woocommerce' ),
		$current_user->display_name,
		get_permalink( woocommerce_get_page_id( 'change_password' ) )
	);
		
		
	} else if(is_user_logged_in()){ 
		printf(
		__( '<h2 class="myaccount_user">Hello, <span>%s</span>.</h2> <p>Thanks for registering with Hughes Estate Sales. Your Hughes Reseller status is pending approval. Upon approval, we&#39;ll send you an email and you will be able to start shopping for resale merchandise. <a class="class="grn-link" style="display:block; margin-top:20px" href="/shop"><i class="icon-angle-left"></i><span>RETURN TO STORE</span></a></p>', 'woocommerce' ),
		$current_user->display_name,
		get_permalink( woocommerce_get_page_id( 'change_password' ) )
	);
	} else { 
		printf(
		__( '<h2 class="myaccount_user">Hello, <span>%s</span>.</h2> <p>Thanks for registering with Hughes Estate Sales. Your Hughes Reseller status is pending approval. Upon approval, we&#39;ll send you an email and you will be able to start shopping for resale merchandise. <a class="class="grn-link" style="display:block; margin-top:20px" href="/shop"><i class="icon-angle-left"></i><span>RETURN TO STORE</span></a></p>', 'woocommerce' ),
		$current_user->display_name,
		get_permalink( woocommerce_get_page_id( 'change_password' ) )
	);
	}
	?>



<?php do_action( 'woocommerce_before_my_account' ); ?>

<?php woocommerce_get_template( 'myaccount/my-downloads.php' ); ?>
<?php /* WIll leave this out until next phase of project ///
<?php woocommerce_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) );*/ ?>

<?php //woocommerce_get_template( 'myaccount/my-address.php' ); ?>

<?php //do_action( 'woocommerce_after_my_account' ); ?>
</div>
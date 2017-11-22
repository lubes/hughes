<?php
/**
 * Customer new account email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php printf(__("Thanks for registering with %s  Your username is <strong>%s</strong>.", 'woocommerce'), esc_html( $blogname ), esc_html( $user_login ) ); ?></p>

<p><?php printf(__( 'Your Hughes Reseller account status is pending approval. We reference each Seller&#39;s Permit with the California Board of Equalization online databank, a process that is done manually during business hours. Upon approval, we&#39;ll send you an email and you can start shopping right away.  %s', 'woocommerce' ), get_permalink(woocommerce_get_page_id('myaccount'))); ?></p>

<?php do_action( 'woocommerce_email_footer' ); ?>
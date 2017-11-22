<?php 
/**
 * Template Name: Timeout Template
 * Description: A template for the timeout page
 *
 */

global $woo_options;   $woocommerce->cart->empty_cart();
get_template_part('templates/head');  ?>

<body <?php body_class('error404'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<div class="wrapper mobl">
  <section class="post-wrapper">
   
      <div class="container">
        <header class="checkout-title">
          <h1>
            <?php _e( 'Timeout!', 'woothemes' ); ?>
          </h1>
        </header>
      </div>
   
    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <div class="post-content err-message">
            <p>
              <?php _e( 'Sorry your time has expired and all your items have been removed. Please go back to add the items to your cart if you are still interested.', 'woothemes' ); ?>
            </p>
            <a class="grn-link" href="/shop"><i class="icon-angle-left"></i><span style="display: inline-block;
    vertical-align: top;">RETURN TO STORE</span></a> </div>
          <!--/post-content--> 
          
        </div>
      </div>
      <!--//row--> 
      
    </div>
    <!--//container--> 
  </section>
</div>
<!-- //wrapper -->

<?php get_footer(); ?>

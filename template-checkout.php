<?php
/**
 * Template Name: Checkout Template
 * Description: A template for the cart page
 *
 */

global $woo_options;   
get_template_part('templates/head');  ?>

<body <?php body_class('cart'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<div class="wrapper mobl">
  <section class="post-wrapper">
    <div class="container">
      <section id="cart-breadcrumbs">
        <ul>
          <li class="review-order"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">Review Order <span class="icon-angle-right"></span></a></li>
          <li class="order"><a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>">Place Order</a></li>
        </ul>
      </section>
      <!--/#breadcrumbs -->
      
      <div class="row-fluid">
        <div class="span9">
          <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>
          <article <?php post_class(); ?>>
            <header class="checkout-title">
              <h1>
                <?php the_title(); ?>
              </h1>
            </header>
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
            <?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
          </article>
          <!-- .post -->
          
          <?php
            	
				} // End WHILE Loop
			} else {
		?>
          <article <?php post_class(); ?>>
            <p>
              <?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?>
            </p>
          </article>
          <!-- .post -->
          <?php } ?>
        </div>
        <!--//span9-->
        
        <?php get_sidebar('cart');?>
      </div>
      <!--//row--> 
      
    </div>
    <!--//container--> 
  </section>
</div>
<?php get_footer(); ?>

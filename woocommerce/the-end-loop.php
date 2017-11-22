<?php rewind_posts(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php woocommerce_get_template_part( 'content', 'buy' ); ?>
<?php endwhile; // end of the loop. ?>

 <?php 
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				//do_action( 'woocommerce_after_shop_loop' );
			?>
            
           
<?php woocommerce_product_loop_end(); ?>
<?php endif; ?>
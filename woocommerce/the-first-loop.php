<?php if ( have_posts() ) : ?>
<?php woocommerce_product_loop_start(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php woocommerce_get_template_part( 'content', 'buy' ); ?>
<?php endwhile; // end of the loop. ?>
<?php endif; ?>

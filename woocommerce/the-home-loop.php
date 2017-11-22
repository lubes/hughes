 
        
  <?php woocommerce_product_loop_start(); ?>

			<?php
$i = 0;

$args = array( 'post_type' => 'product', 'posts_per_page' => 4 );

$args['meta_query'] = array();
$args['meta_query']['relation'] = 'AND';
$args['meta_query'][] = array( 'key' => '_featured', 'value' => 'yes', 'compare' => '=' );
//$args['meta_query'][] = array( 'key' => '_visibility', 'value' => array( 'visible', 'catalog' ), 'compare' => 'IN' );
//$args['meta_query'][] = array( 'key' => '_stock_status', 'value' => array( 'outofstock' ), 'compare' => 'NOT IN' );
$args['meta_query'][] = array( 'taxonomy' =>  'product_cat', 'field' => 'slug', 'terms' => 'spotlight', 'compare' => 'IN' );


$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
if ( function_exists( 'get_product' ) ) {
	$product = get_product( $loop->post->ID );
} else { 
	$product = new WC_Product( $loop->post->ID );
}
?>
				

					<?php woocommerce_get_template_part( 'content', 'buy' ); ?>

				
<?php endwhile; ?>
			
            <?php woocommerce_product_loop_end(); ?>
            	

		

        
         

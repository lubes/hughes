<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 //do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
  <div id="right-col" class="summary entry-summary <?php  if (get_post_meta($post->ID, '_regular_sale', true)) {
          echo  'reg-sale';
		  } else { 
		  echo ' '; }  ?>">
    <div class="sum-inner">
      <?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		    do_action( 'woocommerce_single_product_summary' );
		?>
      <div class="pie-chart">
        <canvas id="pie-chart" height="84" width="84"></canvas>
        <script>

		var doughnutData3 = [
				{
					value: <?php echo get_post_meta($post->ID, 'condition', true); ?>,
					color:"#aeaea7"
				},
				{
					value : <?php echo get_post_meta($post->ID, 'cool_factor', true); ?>,
					color : "#02a277"
				},
				{
					value : <?php echo get_post_meta($post->ID, 'rarity', true); ?>,
					color : "#221e1a"
				}
			];

	var myDoughnut3 = new Chart(document.getElementById("pie-chart").getContext("2d")).Doughnut(doughnutData3);
	
	</script>
        <div class="chart-key">
          <h3>The Hughes Standard</h3>
          <ul>
            <li style="color:#aeaea7;"><span>Condition: <?php echo get_post_meta($post->ID, 'condition', true); ?></span></li>
            <li style="color:#02a277;"><span>Cool Factor: <?php echo get_post_meta($post->ID, 'cool_factor', true); ?></span></li>
            <li style="color:#221e1a;"><span>Rarity: <?php echo get_post_meta($post->ID, 'rarity', true); ?></span></li>
          </ul>
        </div>
      </div>
    </div>
    <!--//summary-inner--> 
    
  </div>
  <!--//summary --> 
  
</div>
<!-- //product-<?php the_ID(); ?> -->
<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
	?>
<?php //do_action( 'woocommerce_after_single_product' ); ?>

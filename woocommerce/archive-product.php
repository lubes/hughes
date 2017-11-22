<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_template_part('templates/head');  ?>

<body <?php body_class('loading buy shop'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>

<section class="slider row-fluid mobl">
<div class="container">
  <div class="shop_slider span12">
     <ul class="slides ">
      <?php
		 /*
$args = array(  
    'post_type' => 'product',  
    'meta_key' => '_featured',  
    'meta_value' => 'yes',  
    'posts_per_page' => 1  
); 
*/
		 
$args = array(
   'post_type' => 'product',
   'meta_key' => '_featured_shop',
   'posts_per_page' => 1,
   'order' => 'DESC',
   'meta_query' => array(
       array(
           'key' => '_featured_shop',
           'value' => 1,
           'compare' => 'IN',
       )
   )
 );	 
		 
		 
  
$featured_query = new WP_Query( $args );  
      if ($featured_query->have_posts()) :   
		 	while ($featured_query->have_posts()) :   
		$featured_query->the_post();
?>
<li>
	<?php $meta = get_post_meta( $featured_query->post->ID );
				//print_r($meta);  ?>
	<?php $imgs = rwmb_meta( 'ESW_featured_product', 'type=image', $featured_query->post->ID ); 
	$title = rwmb_meta( '_title', $featured_query->post->ID );
				foreach ( $imgs as $img ) {
				// print_r($img);
				echo '<img src="', esc_url( $img['full_url'] ), '"  alt="', esc_attr( $img['title'] ), '">';
				} ?>
	<div class="bx-wrap">
		<div class="container text-container">
			<a class="slider-caption" href="<?= get_permalink( $featured_query->post->ID ); ?>">
				<h1>
				<?php if ($title) {
				echo $title;
				} else { ?>
				<?= $featured_query->post->post_title; ?>
				<?php } ?>
				</h1>
				<strong class="price grn-link">
				$<?= get_post_meta( $featured_query->post->ID, '_regular_price', true ); ?>
				</strong>
			</a>
		</div>
	</div>
	<!--//bx-wrap-->
</li>
     <?php  
          endwhile;     
endif;  
  wp_reset_query(); // Remember to reset  
 ?>
   </ul>
    </div>
  </div>
  <!--//container--> 
</section>

<section class="wrapper feature-product mobl">
  <div class="container"> 
    <!-- Example row of columns -->
    <div class="row-fluid">
      <div class="span12 product-header">
        <header class="spot-light wrap">
          <h2>ONLINE ESTATE SALE INVENTORY</h2>
        </header>
        <div class="r-col pull-right"> 
          <!--//pagination-->
          <?php
//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'exclude'       => '23'
);
?>
    <div class="dropdown sort-by"> <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html"> Sort by <span class="caret"></span> </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li>
                <ul>
                  <li><a href="/shop/">All Online Inventory</a></li>
                  <li><a href="/product-category/spotlight">Spotlight Sales</a></li>
                </ul>
              </li>
              <?php wp_list_categories( $args ); ?>
            </ul>
          </div>
        </div>
      </div>
    <?php woocommerce_product_loop_start(); ?>
   
    <?php /*
  	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	$wp_query->query('showposts=16&post_type=product&taxonomy=product_cat,'.'&paged='.$paged); 
	while ($wp_query->have_posts()) : $wp_query->the_post();*/

	while (have_posts()) : the_post();
?>
	
<?php woocommerce_get_template_part( 'content', 'buy' ); ?>

<?php endwhile; ?>
<?php woocommerce_product_loop_end(); ?>
 <div class="navigation">
    <p>
      <?php posts_nav_link('&#8734;','&laquo;&laquo; Go Forward In Time','Load More'); ?>
    </p>
  </div>
    </div>
    <!--//row-fluid-->
  </div>
  <!-- /container -->
  <?php $wp_query = null; $wp_query = $temp;?>
  <?php 
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				//do_action( 'woocommerce_after_shop_loop' );
			?>
</section>
<!--//product-wrapper-->

<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action('woocommerce_after_main_content');
	?>
<?php get_footer(); ?>

</div>
<!--//main--> 

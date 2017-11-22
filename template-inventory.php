<?php
/**
 * Template Name: Current Inventory
 * Description: A template for the current inventory page
 *
 */


global $woocommerce;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_template_part('templates/head');  ?>

<body <?php body_class('loading buy shop'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<section class="slider row-fluid mobl">
  <div class="container">
    <div class="flexslider span12">
      <?php

$paged = 1;
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');
global $wp_query;
query_posts( array( 
                    'post_type' => 'slide',
					'orderby' => 'menu_order', 'order' => 'ASC',
					'showposts' => 16,
					'paged' => $paged, 
                    'tax_query' => array( 
                             'relation' => 'AND', 
                                   array( 
                                  'taxonomy' =>  'slide_category', 
                                  'field' => 'slug',
                                  'terms' => 'Buy Slider'
                                              )
								   
                                        ) ) );  
										
require_once( 'templates/slider-gallery.php' );

 ?>
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
          <h2><?php the_title();?></h2>
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
                <li><a href="/buy/">All Inventory</a></li>
                  <li><a href="/product-category/spotlight">Spotlight Sales</a></li>
                  
                </ul>
              </li>
              <?php wp_list_categories( $args ); ?>
            </ul>
          </div>
        </div>
      </div>

      <?php

$paged = 1;
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');
global $wp_query;
query_posts( array( 
                    'post_type' => 'product',
					'paged' => $paged,
					'showposts' => 99, 
                   	'tax_query'          => array(
        array(
            'taxonomy' => 'product_cat',
            'terms' => 23,      
            'field' => 'id',
            'operator' => 'NOT IN' 
        )
   )
   )
);

   
require_once( 'woocommerce/the-main-loop.php' );
// END the loop for Products
?>
    </div>
    <!--//row-fluid--> 
    
  </div>
  <!-- /container --> 
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
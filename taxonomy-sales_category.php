<?php

global $woo_options;   
get_template_part('templates/head');  ?>
<body <?php body_class('loading sell'); ?>>
  <!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->
<?php get_template_part('templates/header');  ?>

   
  <section class="wrapper top-header mobl">
  <div class="container"> 
    <!-- Example row of columns -->
    <div class="row-fluid">
    <header class="span12">
     <h2 class="sales-title">Current Sales</h2>
     </header>
     </div>
     </div>
     </section>
     
     
     <section class="slider row-fluid mobl">
<div class="container">
  <div class="flexslider span12">
   
      <?php
		query_posts( array( 
                    'post_type' => 'slide',
					'orderby' => 'menu_order', 'order' => 'ASC',
					'showposts' => 5,
					'paged' => $paged, 
                    'tax_query' => array( 
                             'relation' => 'AND', 
                                   array( 
                                  'taxonomy' =>  'slide_category', 
                                  'field' => 'slug',
                                  'terms' => 'Showroom'
                                              )
								   
                                        ) ) );  

	  
	  require_once( 'templates/slider-gallery.php' );

 ?>
    </div>
  </div>
  <!--//container--> 
</section>
  
  
  
  <section class="seller-info mobl">
    <div class="container"> 
      <!-- Example row of columns -->
      <div class="row-fluid" id="blocks">
        <article class="span6 col mobl">
          <div class="content-entry">
            <h2>Sell With Hughes</h2>
            <p>The ideal option for turning things you no longer want or need into cash.</p>
            <h4>HOW IT ALL WORKS:</h4>
            <p>Our experts know how to handle and price fine art, appraise and showcase antique furniture for sale in our Showrooms, and conduct contemporary and vintage car sales. Our experienced and professional staff provide excellent customer service every step of the way.</p>
            <p>Please fill out our Consigning Form and tell us how we can help.</p>
            <span><a href="/consignment-store-sales-form" class="btn drk-green">Start Now</a></span> </div>
        </article>
        <article class="span6 col">
          <div class="flexslider">
          <div class="highlights">
  <h3>Featured Highlights</h3>
  </div>
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
                                  'terms' => 'Featured Highlights'
                                              )
								   
                                        ) ) );       
require_once( 'templates/sell-slider-gallery.php' );
// Start the loop for  Products
?>
        </div>
        </article>
      </div>
      <!--//row-fluid--> 
      
    </div>
    <!-- /container --> 
  </section>
  <!--//seller-info-->
  
  
  <section class="wrapper mobl" id="specials-banners">
	<div class="container">
    	<div class="row-fluid">
  	<div class="span6">
    <a href="/contact/"><img src="<?= get_template_directory_uri();?>/assets/img/hughes-altadena-showroom.png" width="610" height="175" alt="The Hughes Altadena Showroom"></a> </div>
    <div class="span6">
    <a href="/contact/"><img src="<?= get_template_directory_uri();?>/assets/img/hughes-downtown-showroom.png" width="610" height="175" alt="The Hughes Downtown LA Showroom"></a> </div>
  </div>
  <!-- /row-fluid -->
    </div>
</section>
  
  <section class="wrapper feature-product mobl">
    <div class="container"> 
      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span12 line">
          <header class="sales-title pull-left">
             <h2><?php $taxonomy = 'sales_category';
$queried_term = get_query_var($taxonomy);
$term = get_term_by( 'slug', $queried_term, $taxonomy );
echo $term->name;

?></h2>
          </header>
           <?php
//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$taxonomy     = 'sales_category';
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
  'exclude'       => '34'
);
?>
<div class="dropdown sort-by pull-right">
  <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    Sort by <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
  <li><a href="<?= site_url(); ?>/showroom-sales">View All</a></li>
  <?php wp_list_categories( $args ); ?>
  </ul>
</div>
        </div>
        <ul class="thumbnails" id="ajax-container">
      <?php
			
require_once( 'templates/sell-gallery.php' );
// Start the loop for  Products
			//echo do_shortcode( '[ajax_load_more container_type="div" post_type="sell_archive" taxonomy="sales_category" posts_per_page="4" offset="8"  transition="fade" transition_container="false"]' );
						
?>
</ul>
     
     
     
      </div>
      <!--//row-fluid--> 
      
    </div>
    <!-- /container --> 
  </section>
  <!--//product-wrapper-->
		
<?php get_footer(); ?>
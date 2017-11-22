<?php
/**
 * Template Name: Services Template
 * Description: A template for the service page
 *
 */

global $woo_options;   
get_template_part('templates/head');  ?>

<body <?php body_class('services '); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->
<?php get_template_part('templates/header');  ?>

<section class="intro mobl" style="background:url(<?php $image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,'full', true);
echo $image_url[0];  ?>) 50% 0 no-repeat; -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
  <div class="container">
    <div class="row-fluid">
      <header class="into-header">
        <h1>Hughes handles all the legwork, so all you inherit are the proceeds</h1>
      </header>
    </div>
  </div>
</section>
<section class="tag-line mobl">
  <div class="container">
    <div class="row-fluid">
      <div class="entry-content col-tag">
        <?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			the_content();
		 
		} // end while
	} // end if
?>
      </div>
      <!--//span12--> 
    </div>
  </div>
</section>

<section class="our-steps wrapper mobl">
	<div class="container">
	  <header class="whoweare">
				<h6>THE HUGHES 5-STEP PROCESS:</h6>
			</header>
	  
		
    <div id="list" class="row-fluid">
				<ul class="thumbnails">
	    <div class="persons equalHt">
	    <?php $i = 1; 
	while($i <= 5) { ?>
	    
	    	<div class="person span4 step_<?= $i; ?>">
		    <div class="thumbnail">
		    <div class="flexslider_<?= $i; ?>">
		    <?php $imgs = rwmb_meta( 'ESW_step_imgs_'.$i.'', 'type=thickbox_image', $post->ID ); ?>
				  <ul class="slides">
					<?php foreach ($imgs as $img) { ?>
					<li><img src="<?= $img['full_url']; ?>" alt="hughes steps"></li>
					<?php } ?>
					 </ul>
				</div>
		    	<div class="desc-txt">
		    		<h3><span class="step"></span><?= rwmb_meta( 'ESW_step_title_'.$i.'', $post->ID  ); ?></h3>
		    		<p><?= rwmb_meta( 'ESW_step_excerpt_'.$i.'', $post->ID  ); ?></p>
		    	</div>
		    </div>
		     </div>
		     
		     <?php $i++; } ?>
			<div class="person  span4 last-step">
		    <div class="thumbnail">
		    	<div class="desc-txt">
		    		<h3><?= rwmb_meta( 'ESW_why_title', $post->ID  ); ?></h3>
		    		<?= rwmb_meta( 'ESW_why_text', $post->ID  ); ?>
<a href="<?= site_url(); ?>/consignment-store-sales-form" class="btn btn-grn">Start Now</a>
		    		
		    	</div>
		    </div>
		    </div>
		 </div>
		</ul>
		</div>
	</div>
	</section>
<section class="wrapper bio mobl">
  <div class="container">
   
     <header class="whoweare">
				<h6>THE HUGHES DIFFERENCE</h6>
			</header>
   
    <div class="row-fluid services-list" id="blocks">
    
      <div class="span6 services-features">
        <div class="row-fluid">
          <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/security-hand-icon.svg" width="80" height="80"  alt="Altadena Estate Sales – Showroom Services"></div>
          <div class="span9">
            <h2>Security</h2>
            <p>Since 1978, Hughes has assisted thousands with estate sales and services. Our goal is to make things as easy and straightforward as possible. Our Showroom consignment provides a secure and discreet option and allows us to inventory and barcode every single item, eliminating the risks typically associated with opening homes to the public. We ensure that your property is empty in one to two days.</p>
          </div>
        </div>
      </div>
      <!--/showroom sales-->
      <div class="span6 services-features">
        <div class="row-fluid">
          <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/hughes-estate-liquidation-sale-service.svg" width="100" height="100" alt="Hughes Estate Sales – Liquidation Services"></div>
          <div class="span9">
            <h2>Convenience </h2>
            <p>Our goal is to make things as easy and straightforward as possible. We ensure that your property is empty in one to two days. By offering Auctions, Showroom Sales, and an Online Store, we are your one-stop-shop for selling everything in your estate – from fine art to vehicles to contemporary & antique furnishings.</p>
          </div>
        </div>
      </div>
      <!--/consigning-->
      
       <div class="span6 services-features">
        <div class="row-fluid">
          <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/high-return-antique-inspect-appraise.svg" width="100" height="100" alt="Antiques Inspection & Appraisal for Higher Return"></div>
          <div class="span9">
            <h2>Higher Returns</h2>
            <p>Our Showroom consignment service is proven to bring you more revenue. Whether you are liquidating an entire estate, moving, downsizing or have property in storage, our selection and value estimation process ensures that each item is closely inspected and evaluated. Whether contemporary or antique, your items receive thorough inspection by our appraiser and are beautifully merchandised in our Showroom.</p>
          </div>
        </div>
      </div>
      
     
      
    
      <div class="span6 services-features">
        <div class="row-fluid">
          <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/icon-standard.svg" width="100" height="100" alt="The Hughes Standard"></div>
          <div class="span9">
            <h2>The Hughes Standard</h2>
            <p>Our official rating system assures you that every item goes through a rigorous 3-step approval process before being offered for sale:</p>
            <ol class="hughes-standard">
              <li class="third">RARITY:<span> Is it one of a kind, or do only a few still remain?</span></li>
              <li>CONDITION:<span> Signs of wear, damage and/or aging</span></li>
              <li class="second">COOL FACTOR: <span> Slightly subjective, is it cool to own?</span></li>
              
            </ol>
          </div>
        </div>
      </div>
      <!--/showroom sales-->
   
      <!--/consigning--> 
      
    </div>
    <!--/row-fluid-->
    <div class="row-fluid">
      <div class="span12 customers">
        <section class="slider row-fluid">
          <h1>From Our Customers</h1>
          <div class="flexslider">
            <ul class="slides">
              <?php

$paged = 1;
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');
global $wp_query;
query_posts( array( 
                    'post_type' => 'testimonial',
					'orderby' => 'menu_order', 'order' => 'ASC',
					'showposts' => 99,
					'paged' => $paged
                    
                                  
                                             
								   
                                       ) );       
require_once( 'templates/testimonial-gallery.php' );
// Start the loop for  Products
?>
            </ul>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- /container --> 
</section>
<!--//product-wrapper-->

<?php get_footer(); ?>

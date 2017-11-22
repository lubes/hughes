<?php
/**
 * Template Name: Contact Template
 * Description: A template for the contact page
 *
 */

global $woo_options;   
get_template_part('templates/head');  ?>

<body <?php body_class('loading contact'); ?>onLoad="initialize()">
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>

<!-- Main hero unit for a primary marketing message or call to action -->
<section class="inner-header mobl">
  <div class="container">
    <div class="row-fluid">
      <header class="span12">
        <h1>Please Get in Touch</h1>
      </header>
    </div>
  </div>
</section>
<section class="wrapper contact mobl">
  <div class="container">
    <div class="row-fluid">
      <header class="inner-sub-header">
        <h6>CONSIGNMENT STORE SHOWROOM LOCATIONS</h6>
      </header>
      <div class="map-container">
        <div id="map-canvas">
      </div>
    </div>
    </div>
  </div>
  <!-- /row-fluid --> 
  
</section>
<!--//wrapper-->
<section class="wrapper mobl" id="specials-banners">
	<div class="container">
    	<div class="row-fluid">
  	<div class="span6">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/3-day-event.png" width="610" height="308" alt="The Hughes Showroom Sale 3-Day Event"/> </div>
    <div class="span6">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/1st-3rd-Fridays.png" width="610" height="308" alt="First and Third Fridays"/></div>
  </div>
  <!-- /row-fluid -->
    </div>
</section>
<section class="wrapper mobl">
  <div class="container">
    <div class="row-fluid">
      <div class="span6 contact-form">
        <h2>General Inquiries</h2>
        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>
        <?php the_content();?>
        <?php 
        }
        }
        ?>
      </div>
      <div class="span6">
        <section class="hughes-insider">
          <h2>Become a Hughes Insider</h2>
          <p>Get on the List to find out about Showroom consignment events and when new items become available in our online store.</p>
          <a href="/become-a-hughes-insider/" class="btn btn-grn">Sign Up</a> </section>
        <?php //function loop in ESW-function
		   displaypage('consigning', "consign-contact"); ?>
      </div>
    </div>
    <!-- /row-fluid --> 
  </div>
</section>
<?php get_footer(); ?>
</div>
<!--//main-->

</body>
</html>
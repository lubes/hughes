<?php
/**
 * Template Name: FAQs template
 * Description: A template for the faqs
 *
 */

global $woo_options;   
get_template_part('templates/head');  ?>

<body <?php body_class('faqs'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->
<?php get_template_part('templates/header');  ?>

<section class="wrapper mobl">
  <div class="container">
    <div class="row-fluid">
    <div class="span12">
        <section class="hughes-faq">
          <h1>FAQs <a href="/?p=472" class="faq-close"></a></h1>
          <span>
          <?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			the_content();
		} // end while
	} // end if
?>
          </span>
        </section>
      </div>
     
    </div>
    <!-- /row-fluid -->
  </div>
</section>
<?php get_footer(); ?>

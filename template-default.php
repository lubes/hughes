<?php
/**
 * Template Name: Full-width template
 * Description: A template for full-width pages
 *
 */

global $woo_options;   
get_template_part('templates/head');  ?>

<body <?php body_class('full-width'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->
<?php get_template_part('templates/header');  ?>

<section class="wrapper mobl">
  <div class="container">
    <div class="row-fluid">
    <div class="span12">
        <section class="full-wrapper err-message">
         
         
           <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>
        <header> <h1><?php the_title();?></h1></header>
        <div class="entry_content">
         <?php the_content();?>
         </div>
          <?php
		  
		  
				} // End WHILE Loop
			}
			?>
          
        </section>
      </div>
     
    </div>
    <!-- /row-fluid -->
  </div>
</section>
<?php get_footer(); ?>

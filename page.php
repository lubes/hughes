<?php
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @subpackage Template
 */

global $woo_options;   
get_template_part('templates/head');  ?>


<body <?php body_class(); ?>>
  <!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>

       
 <div class="wrapper mobl">
  <div class="container">
    
  </div>
  <section class="post-wrapper">
    <div class="container">
      <div class="row-fluid">
        <div class="span9">
                   <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>
          <article <?php post_class(); ?>>
          <header class="checkout-title">
			    	<h1> <?php the_title(); ?></h1>
				</header>
          
          
            <div class="post-content">
             
         
             <?php the_content();?>
             
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
              <?php the_tags( '<p class="tags">'.__( 'Tags: ', 'woothemes' ), ', ', '</p>' ); ?>
           </div>
            <!--/post-content--> 
          </article>
          <!-- .post -->
         <?php
		  
		  
				} // End WHILE Loop
			} else {
		?>
          <article <?php post_class(); ?>>
            <p>
              <?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?>
            </p>
          </article>
          <!-- .post -->
          <?php } ?>
        </div>
        <!--//span9-->
        
       <?php get_sidebar('cart');?>
      </div>
      <!--//row--> 
      
    </div>
    <!--//container--> 
  </section>
</div>
<!-- //wrapper -->

<?php get_footer(); ?>

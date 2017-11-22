<?php
/**
 * Flexislider Loop
 */ ?>


  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
            <li><?php the_content(); ?> <span> – <?php the_title();?> </span></li>
 
 
  <?php endwhile; ?>
  <?php else : ?>
  <li id="post-0" class="no-results not-found">
  
  
 
          <h1>
           <?php _e( 'Nothing Found', 'toolbox' ); ?>
          </h1>
        
         <?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps refining your search will help.', 'toolbox' ); ?>
          
   
  </li>
  <!-- #post-0 -->
  <?php	endif;
?>

 <?php wp_reset_query(); ?>




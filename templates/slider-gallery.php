<?php
/**
 * Flexislider Loop
 */ ?>

<ul class="slides">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <li>
   
 <?php if ( has_post_thumbnail() ) {
	the_post_thumbnail('full');
} ?>
<div class="bx-wrap">
      <div class="container text-container">
        <div class="slider-caption">
          <h1>
            <?php the_title();?>
          </h1>
          <span><?php echo get_post_meta($post->ID, 'ESW_Date', true); ?></span>
          
               <small><?php if (get_post_meta($post->ID, 'ESW_Map', true)) {
          echo  '<a target="_blank" class="map-link" href="'.get_post_meta($post->ID, 'ESW_Map', true). '">'.get_post_meta($post->ID, 'ESW_Map_Name', true). '</a>';
		  		} else { 
		  	echo ' ';
				}
					?></small>
                    
 <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,20) . "\r\n"; ?>
	</p>
         <span class="circle outerContainer"><div class="innerContainer"><a href="<?php echo get_post_meta($post->ID, 'ESW_Link', true); ?>"> <?php echo get_post_meta($post->ID, 'ESW_Link_Name', true); ?></a></div></span>
      
        </div>
      </div>
    </div>
    <!--//bx-wrap--> 
  </li>
  <?php endwhile; ?>
  <?php else : ?>
  <li id="post-0" class="no-results not-found">
   <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/buy/slider-img-1.jpg" alt="Featured Image"/>
  
  <div class="bx-wrap">
      <div class="container text-container">
        <div class="slider-caption">
          <h1>
           <?php _e( 'Nothing Found', 'toolbox' ); ?>
          </h1>
        
         <?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps refining your search will help.', 'toolbox' ); ?>
          
      
        </div>
      </div>
    </div>
    <!--//bx-wrap--> 
  </li>
  <!-- #post-0 -->
  <?php	endif;
?>

 <?php wp_reset_query(); ?>
</ul>

<?php
/**
 * Flexislider Loop
 */ ?>

<ul class="slides">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
  <?php 
/*
	remove_all_filters('posts_orderby');
	$args = array('post_type' => 'attachment',
			'numberposts' => 99,
			'orderby'         => 'menu_order',
    		'order'           => 'ASC',
			'post_parent' => $post->ID);

	$attachments = get_posts($args);
	if ($attachments) {
		foreach ( $attachments as $attachment ) {
			$image_title .= "'".$attachment->post_title."',";	
			$caption = $attachment->post_excerpt;
			if($attachment->post_content != ""){
				$description .= "'".$attachment->post_content."',";
			} else {
				$description .= "'".$default_content . "',";
			}
			$image_list .= "'".wp_get_attachment_url( $attachment->ID , false ) ."',";
		
  */?>
  
  <li> 
    
    <div class="bx-wrap">
      <div class="container text-container">
        <div class="slider-caption">
          <h1>
            <?php the_title();?>
          </h1>
        
          <?php the_content();?>
      
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

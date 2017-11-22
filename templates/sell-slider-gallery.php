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
    <div class="slide-wrap">
      <div class="slide-entry">
        <h1>
          <?php the_title();?>
        </h1>
        <?php the_content();?>
        <span>sold for <em class="amount"><?php echo get_post_meta($post->ID, 'ESW_Sold', true); ?></em></span>
      </div>
    </div>
  </li>
  <?php endwhile; ?>
  <?php else : ?>
  <li id="post-0" class="no-results not-found"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/buy/slider-img-1.jpg" alt="Featured Image"/>
    <div class="slide-wrap">
      <div class="slide-entry">
        <h1>
          <?php _e( 'Nothing Found', 'toolbox' ); ?>
        </h1>
        <?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps refining your search will help.', 'toolbox' ); ?>
      </div>
    </div>
  </li>
  <!-- #post-0 -->
  <?php	endif;
?>
  <?php wp_reset_query(); ?>
</ul>

<?php
/**
 * Loop
 */ ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<li class="type-product post span3">
  <div class="thumbnail">
    <figure class="product-img">
      <?php $cti = catch_that_image(); 
if(isset($cti)){ ?>
        <a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $cti; ?>&w=295&h=195zc=0" alt="<?php the_title(); ?>"/> </a>
      <?php } else { ?>
      <a href="<?php the_permalink() ?>" rel="bookmark"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/news-article-img.jpg" width="295" height="195" alt="News Article Image" /></a>
      <?php   
            }

?>
      <div class="sale">
        <div class="sale-details">
          <p><a class="view" href="<?php the_permalink() ?>">View Gallery</a></p>
        </div>
      </div>
    </figure>
    <div class="product-desc">
      <h2>
        <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a>
      </h2>
      <p>
        <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,12) . "... \r\n"; ?>
      </p>
    </div>
    <time class="date meta" datetime="<?php echo get_post_meta($post->ID, 'ESW_archive_date', true); ?>"><?php echo get_post_meta($post->ID, 'ESW_archive_date', true); ?></time>
    
    <?php edit_post_link('edit', '<p style="position:absolute; bottom:0; right:10px;">', '</p>'); ?>
  </div>
</li>
<?php endwhile; ?>



<?php else : ?>
<article id="post-0" class="span6 post no-results not-found">
  <header class="entry-header">
    <h1 class="entry-title">
      <?php _e( 'Nothing Found', 'toolbox' ); ?>
    </h1>
  </header>
  <!-- .entry-header -->
  
  <div class="entry-content">
    <p>
      <?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps refining your search will help.', 'toolbox' ); ?>
    </p>
  </div>
  <!-- .entry-content --> 
</article>
<!-- #post-0 -->
<?php	endif;
?>
</ul>


<?php
/**
 * Template Name: Home pg. Template
 * Description: A template for the home page
 *
 */


get_template_part( 'templates/head' );

global $woocommerce;
$settings = array(
	'featured_enable' => 'true',
	'featured_limit' => 4
);
$settings = woo_get_dynamic_values( $settings );
?>
<body <?php body_class( 'loading home'); ?>>
	<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

	<?php get_template_part('templates/header');  ?>
	<section class="slider row-fluid mobl">
		<div class="flexslider slideshow-hero">
			<ul class="slides">
			<?php 
			$args = array(
				'post_type' => 'slide',
				'orderby' => 'menu_order', 'order' => 'ASC',
				'showposts' => 16,
				'paged' => $paged,
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'slide_category',
						'field' => 'slug',
						'terms' => 'Home Gallery'
					)

				) );
query_posts( $args );
// The Loop
while ( have_posts() ) : the_post();?>  
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
<?php endwhile;
 
// Reset Query
wp_reset_query();
			
			?>
			
	</ul>		
			
		</div>
	</section>
	<section class="wrapper feature-product mobl">
		<div class="container">
			<!-- Example row of columns -->
			<div class="row-fluid">
				
				
				<?php get_template_part('woocommerce/home', 'loop'); ?>
				
			</div>
			<!--//row-fluid-->
		</div>
		<!-- /container -->
	</section>
	<!--//product-wrapper-->
	<section class="marketing-tag mobl">
		<div class="container">
			<article>
				<div class="textbox">
					<figure><img src="<?php echo get_bloginfo('template_directory');?>/assets/img/home/estate-sales-vintage-furniture-in-la-est-78.png" alt="Estate Sales Since 1978 – Hughes L.A."/>
					</figure>
					<h3>For 40 years, Hughes has been helping families in transition get the most out of their estates.</h3>
					<a href="/estate-sales-services" class="btn drk-green btn-lrg">SEE HOW IT WORKS</a> </div>
			</article>
		</div>
	</section>
	<section class="wrapper feature-product mobl" id="home-posts">
		<div class="container">
			<!-- Example row of columns -->
			<div class="row-fluid">
				<ul class="thumbnails">
				
				<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
					<li class="span6 consign">
						<h4>Consigning (JW Testing):</h4>


						<div class="thumbnail">
							<figure class="product-img">

								<?php $imgs = rwmb_meta( 'ESW_video_img', 'type=thickbox_image', $post->ID ); ?>
								
								<?php //print_r($imgs); ?>
								
								<?php foreach ($imgs as $img) { ?>
								<img src="<?= $img['full_url']; ?>" alt="Watch Video">
								<?php } ?>
								<div class="play-video">
							<figcaption><a href="#videoModal" role="button" class="click showvideo" data-toggle="modal"> <span class="read-more"><i class="icon-play"></i> </span></a></figcaption>
							</div>
							
							</figure>
							<div class="product-desc">
								<h2>
									<?= rwmb_meta( 'ESW_video_title', $post->ID  ); ?>
								</h2>
								<?= rwmb_meta( 'ESW_video_excerpt', $post->ID  ); ?>
								<span><a href="#videoModal" data-toggle="modal" class="btn btn-grn">LEARN MORE</a></span>
							</div>
						</div>
					</li>
					<?php 
		} // end while
} // end if
?>
					
					<!--//span6-->
					<li class="span6 blog">
						<h4>From the Blog:</h4>
						<?php 
// query to set the posts per page to 1
query_posts( array ( 'posts_per_page' => 1, 'order' => 'DESC' ) );
if ( have_posts() ) : ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="thumbnail">
							<figure class="product-img">
								<?php $cti = catch_that_image(); 
if(isset($cti)){ ?>
								<a href="<?php the_permalink() ?>" rel="bookmark"> <img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $cti; ?>&w=610&h=265zc=0" alt="<?php the_title(); ?>"/> </a>
								<?php } else { ?>
								<a href="<?php the_permalink() ?>" rel="bookmark"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/news-article-img.jpg" width="610" height="265" alt="News Article Image" /></a>
								<?php   
}
?>
							</figure>
							<div class="product-desc">
								<h2><a href="<?php echo get_permalink(); ?>">
<?php the_title();?>
</a></h2>
							
								<p>
									<?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,32) . "... \r\n"; ?>
									<a class="grn-link sm-link" href="<?php echo get_permalink(); ?>">more &raquo;</a>
									</span>
								</p>
								<time class="date" datetime="<?php the_time('M j, Y') ?>">
									<?php the_time('M j, Y') ?>
								</time>
							</div>
						</div>
						<!--//thumbnail-->
						<?php endwhile; ?>
						<?php	endif; wp_reset_query(); ?>
					</li>
				</ul>
			</div>
			<!--//row-fluid-->
		</div>
		<!-- /container -->
	</section>
	<!--//product-wrapper-->

	<?php get_footer(); ?>
	</div>
	<!--//main-->


	<!-- Video Modal -->
	<div id="videoModal" class="modal modal-overlay hide fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		</div>
		<div class="modal-body">
			<div class="entry ajax-container video-holder" style="display: inline-block; opacity: 1; min-height: 450px;">
				<div class="video_wrapper">
					<iframe src="https://player.vimeo.com/video/209460579?title=0&amp;byline=0&amp;portrait=0&amp;color=d01e2f&amp;autoplay=0&api=1" class="click" width="550" height="364" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
			</div>
		</div>

	</div>
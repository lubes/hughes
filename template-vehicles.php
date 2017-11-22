<?php
/**
 * Template Name: Vehicles Template
 *
 */

 get_template_part('templates/head');  ?>
<body <?php body_class( 'loading sell'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>

<section class="wrapper top-header mobl">
		<div class="container">
			<!-- Example row of columns -->
			<div class="row-fluid">
				<header class="span12">
					<h2 class="sales-title">Vehicle Sales</h2>
				</header>
			</div>
		</div>
	</section>
	<section class="slider row-fluid mobl">
		<div class="container">
			<div class="flexslider span12">

				<?php
				query_posts( array(
					'post_type' => 'slide',
					'orderby' => 'menu_order', 'order' => 'ASC',
					'showposts' => 5,
					'paged' => $paged,
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'slide_category',
							'field' => 'slug',
							'terms' => 'Vehicles'
						)
					) ) );
				require_once( 'templates/slider-gallery.php' );
				?>
			</div>
		</div>
		<!--//container-->
	</section>
	
	<section class="consign-wrapper wrapper mobl">
		<div class="container">
			<div class="row-fluid wt-bg">
				<div class="span6">
				<?php $imgs = rwmb_meta( 'ESW_veh_img', 'type=thickbox_image', $post->ID ); ?>
					<?php foreach ($imgs as $img) { ?>
					<div class="figure-holder" style="background-image: url(<?= $img['full_url']; ?>);">
					</div>
					<?php } ?>
				</div>
				<div class="span6">
					<div class="entry">
						<h3><?= rwmb_meta( 'ESW_veh_title', $post->ID  ); ?></h3>
						<?= rwmb_meta( 'ESW_veh_excerpt', $post->ID  ); ?>
						<a href="<?= site_url(); ?>/consignment-store-sales-form" class="btn btn-grn">Start Consigning</a>
					</div>
				</div>
			</div>

		</div>

	</section>
	<section class="wrapper feature-product mobl">
		<div class="container">
			<!-- Example row of columns -->
			<div class="row-fluid">
				<div class="span12 line">
					<header class="sales-title pull-left">
						<h2>Vehicle Archive:</h2>
					</header>


				</div>
			<ul class="thumbnails" id="ajax-container">
					<?php

				$args = array(
  'paged' => $paged, 
	'post_type' => 'vehicles',
	'posts_per_page' => 8,
	'order'   => 'DESC',
	
);
				
				
// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>
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
										<p><a class="view" href="<?php the_permalink() ?>">View Gallery</a>
										</p>
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
							<?php $sold = rwmb_meta( 'ESW_sold_price', $post->ID  ); ?>
							<?php $link = rwmb_meta( 'ESW_custom_link', $post->ID  ); ?>
							<?php if ($sold) {
												echo '<a class="sold price grn-link">'.$sold.'</a>';
											} else {
												echo '<a class="price grn-link">View Item <span>»</span></a>';
											 }
													if ($link) {
									echo '<a href="'.$link.'" class="read_more_link">read more</a>';
						}
							
							?>
								
							</div>
					</li>
	
	
	<?php 
	}
	
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}
			
			?>
				
					
				</ul>
					<ul class="thumbnails" id="ajax-container">
				<?php 
echo do_shortcode( '[ajax_load_more container_type="div" post_type="vehicles" posts_per_page="4" offset="8"  transition="fade" transition_container="false"]' );?>
			</ul>
			</div>
			<!--//row-fluid-->
		</div>
		<!-- /container -->
	</section>
	<?php get_footer(); ?>

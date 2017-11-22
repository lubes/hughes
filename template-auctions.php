<?php
/**
 * Template Name: Auctions Template
 *
 */

 get_template_part('templates/head');  ?>
<body <?php body_class( 'loading  auctions sell'); ?>>
	<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->
	<?php get_template_part('templates/header');  ?>
	<section class="wrapper top-header mobl">
		<div class="container">
			<!-- Example row of columns -->
			<div class="row-fluid">
				<header class="span12">
					<h2 class="sales-title">Current Auctions</h2>
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
							'terms' => 'Auctions'
						)
					) ) );
				require_once( 'templates/slider-gallery.php' );
				?>
			</div>
		</div>
		<!--//container-->
	</section>
	
	
	
								

								
							
								
	
	
	<section class="consign-wrapper wrapper mobl org-section">
		<div class="container">
			<div class="row-fluid wt-bg">
				<div class="span6">
				<?php $imgs = rwmb_meta( 'ESW_auc_img', 'type=thickbox_image', $post->ID ); ?>
					<?php foreach ($imgs as $img) { ?>
					<div class="figure-holder" style="background-image: url(<?= $img['full_url']; ?>);">
					</div>
					<?php } ?>
				</div>
				<div class="span6">
					<div class="entry">
						<h3><?= rwmb_meta( 'ESW_auc_title', $post->ID  ); ?></h3>
						<?= rwmb_meta( 'ESW_auc_excerpt', $post->ID  ); ?>
						<a href="<?= site_url(); ?>/consignment-store-sales-form" class="btn btn-grn btn-org">Start Consigning</a>
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
						<h2>Auction Highlights:</h2>
					</header>


				</div>
<ul class="thumbnails" id="ajax-container">
					<?php

				$args = array(
				'post_type' => 'auctions',
				'posts_per_page'    => 8,
				'orderby' => 'menu_order title',
				'order'   => 'DESC',
	
					);
				
				
// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>
		  <?php $ex_link = rwmb_meta( 'ESW_auctions_external_link', $post->ID  );

	
	?> 
		<li class="type-product post span3">
						<div class="thumbnail">
							<figure class="product-img">
								<?php $cti = catch_that_image(); ?>
										<?php if ($ex_link) { ?>
										<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $cti; ?>&w=295&h=195zc=0" alt="<?php the_title(); ?>"/> </a>
							
									<?php } else { ?>
											<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $cti; ?>&w=295&h=195zc=0" alt="<?php the_title(); ?>"/> </a>
							
										<?php }
										?>
									<div class="sale">
									<div class="sale-details">
										<p>
											<?php if ($ex_link) { ?>
										<a class="view" href="<?php the_permalink() ?>">View Gallery</a>
											<?php } else { ?>
												<a class="view" href="<?php the_permalink() ?>">View Gallery</a>
											<?php } ?>
										</p>
									</div>
								</div>
							</figure>
							<div class="product-desc">
								<h2>
								
								<?php if ($ex_link) { ?>
										
										<a href="<?= $ex_link; ?>" rel="bookmark"><?php the_title();?></a>
											<?php } else { ?>
												<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a>
											<?php } ?>
								
								</h2>
									<p>
									<?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,12) . "... \r\n"; ?>
								</p>
							</div>
							
							    <?php $sold = rwmb_meta( 'ESW_auctions_sold_price', $post->ID  ); ?>
								<?php $link = rwmb_meta( 'ESW_auctions_custom_link', $post->ID  ); ?>
								<?php if ($sold) {
								
											echo '<a class="sold price grn-link" style="cursor: default;">
															'.$sold.'</a>';
								} if ($ex_link) {
								
											echo '<a target="_blank" href="'.$ex_link.'" class="price grn-link bid_link btn">Bid Now</a>';
								}
								//if ($link) {
								//echo '<a href="'.$link.'" class="read_more_link">read more</a>';
								//}
							?>
							</div>
					</li>
				<?php 
				}
	/* Restore original Post Data */
	wp_reset_postdata();
} else { ?>
<div class="span12">
	<div class="alert alert-warning">
						<?php _e('Sorry, no results were found.', 'sage'); ?>
					</div>
					</div>
<?php }
			
			?>
				 <?php 
		  
		 // echo do_shortcode( '[ajax_load_more container_type="div" post_type="auctions" posts_per_page="4" offset="8"  transition="fade" transition_container="false"]' );?>
					
				</ul>
				
				<div class="navigation">
   	 <p>
		 <a href="<?= rwmb_meta( 'ESW_collection_link', $post->ID  ); ?>">VIEW FULL CATALOG</a></p>
  		</div>
		</div>
			<!--//row-fluid-->
		</div>
		<!-- /container -->
	</section>
	<section class="hughes-bid  wrapper mobl">
		<div class="container">
			<div class="entry-content">
				<div class="title">

					<svg version="1.0" id="hughes_bid" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.3 19.87" enable-background="new 0 0 490.3 19.87" xml:space="preserve">
						<g>
							<g>
								<path d="M112.82,2.62h2.81v4.75h5.46V2.62h2.81v12.75h-2.81V9.86h-5.46v5.51h-2.81V2.62z"/>
								<path d="M134.92,2.3c3.98,0,6.88,2.61,6.88,6.7c0,4.09-2.9,6.7-6.88,6.7s-6.88-2.61-6.88-6.7C128.04,4.91,130.94,2.3,134.92,2.3z
M134.92,13.1c2.39,0,3.96-1.73,3.96-4.11s-1.57-4.11-3.96-4.11s-3.96,1.73-3.96,4.11S132.53,13.1,134.92,13.1z"/>
								<path d="M144.62,2.62h3.06l2.03,8.18h0.04l2.66-8.18h2.61l2.65,8.39h0.04l2.14-8.39h2.85l-3.73,12.75h-2.5l-2.81-8.82h-0.04
l-2.81,8.82h-2.41L144.62,2.62z"/>
								<path d="M176.25,5.11h-3.64V2.62h10.08v2.49h-3.64v10.26h-2.81V5.11z"/>
								<path d="M192.56,2.3c3.98,0,6.88,2.61,6.88,6.7c0,4.09-2.9,6.7-6.88,6.7s-6.88-2.61-6.88-6.7C185.68,4.91,188.58,2.3,192.56,2.3z
M192.56,13.1c2.39,0,3.96-1.73,3.96-4.11s-1.57-4.11-3.96-4.11S188.6,6.62,188.6,9S190.16,13.1,192.56,13.1z"/>
								<path d="M211.17,2.62h4.75c2.23,0,4.66,0.47,4.66,3.24c0,1.42-0.88,2.39-2.2,2.81v0.04c1.67,0.22,2.79,1.46,2.79,3.12
c0,2.67-2.52,3.55-4.79,3.55h-5.22V2.62z M213.98,7.72h2.03c0.86,0,1.76-0.36,1.76-1.39c0-1.06-1.01-1.33-1.89-1.33h-1.91V7.72z
M213.98,12.99h2.52c0.88,0,1.87-0.38,1.87-1.49c0-1.21-1.35-1.4-2.27-1.4h-2.12V12.99z"/>
								<path d="M225.05,2.62h2.81v12.75h-2.81V2.62z"/>
								<path d="M232.66,2.62h4.21c4.1,0,7.54,1.75,7.54,6.41c0,4.12-3.37,6.34-7.17,6.34h-4.59V2.62z M235.47,12.78h1.46
c2.61,0,4.57-0.99,4.57-3.89c0-2.5-2-3.67-4.38-3.67h-1.66V12.78z"/>
								<path d="M260.34,2.62h2.32l5.55,12.75h-3.17l-1.1-2.7h-4.95l-1.06,2.7h-3.1L260.34,2.62z M261.42,6.33l-1.55,3.96h3.12
L261.42,6.33z"/>
								<path d="M272.55,5.11h-3.64V2.62h10.08v2.49h-3.64v10.26h-2.81V5.11z"/>
								<path d="M290.24,2.62h2.81v4.75h5.46V2.62h2.81v12.75h-2.81V9.86h-5.46v5.51h-2.81V2.62z"/>
								<path d="M316.9,10.46c0,3.01-1.84,5.24-5.37,5.24c-3.55,0-5.38-2.23-5.38-5.24V2.62h2.81v7.72c0,1.57,1.08,2.76,2.57,2.76
c1.48,0,2.56-1.19,2.56-2.76V2.62h2.81V10.46z"/>
								<path d="M333.28,14.47c-1.66,0.87-3.48,1.22-5.35,1.22c-3.98,0-6.88-2.61-6.88-6.7c0-4.09,2.9-6.7,6.88-6.7
c2.02,0,3.8,0.45,5.08,1.64l-1.98,2.16c-0.76-0.79-1.67-1.21-3.1-1.21c-2.39,0-3.96,1.73-3.96,4.11s1.57,4.11,3.96,4.11
c1.22,0,2.12-0.34,2.65-0.63V10.4h-2.29V7.81h4.99V14.47z"/>
								<path d="M337.99,2.62h2.81v4.75h5.46V2.62h2.81v12.75h-2.81V9.86h-5.46v5.51h-2.81V2.62z"/>
								<path d="M354.01,2.62h8.66v2.59h-5.85v2.38h5.53v2.59h-5.53v2.59H363v2.59h-8.98V2.62z"/>
								<path d="M373.8,5.74c-0.45-0.58-1.35-0.85-2.04-0.85c-0.79,0-1.89,0.36-1.89,1.31c0,2.32,5.87,0.83,5.87,5.29
c0,2.85-2.29,4.2-4.92,4.2c-1.64,0-3.08-0.49-4.29-1.6l2-2.2c0.58,0.76,1.51,1.21,2.45,1.21c0.92,0,1.95-0.43,1.95-1.33
c0-2.34-5.98-1.08-5.98-5.33c0-2.72,2.36-4.14,4.86-4.14c1.44,0,2.83,0.38,3.91,1.33L373.8,5.74z"/>
							</g>
						</g>
						<g>
							<g>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M0,8l78.69,1.15l3.56-1.36l-3.56-1.36L0,8z M411.61,7.78l-3.56,1.36l3.56,1.36
l78.69-1.15L411.61,7.78z"/>
							</g>
						</g>
					</svg>
				</div>
				<div class="row-fluid ">
					<div class="span12">
						<div class="entry text-center">
						
						<p><?= rwmb_meta( 'ESW_intro_section', $post->ID  ); ?></p>
							
						</div>
					</div>
				</div>
				<div class="row-fluid m_spacing">
					<div class="span4">
						<div class="entry">
								<?= rwmb_meta( 'ESW_col_1', $post->ID  ); ?>
						</div>
					</div>
					<div class="span4">
						<div class="entry">
							<?= rwmb_meta( 'ESW_col_2', $post->ID  ); ?>
						</div>
					</div>
					<div class="span4">
						<div class="entry">
							<?= rwmb_meta( 'ESW_col_3', $post->ID  ); ?>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="text-center">
						<?php $bidding = rwmb_meta( 'ESW_bidding_pdf', 'type=file', $post->ID  ); ?>
						<?php foreach ($bidding  as $form) {
					echo '<a target="_blank" href="'.$form['url'].'" class="btn btn-grn btn-org">Get Bidding Form</a>';
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php $pdfs = rwmb_meta( 'ESW_auc_pdf', 'type=file', $post->ID); ?>
	<?php if ($pdfs) { ?>
	<section class="past-auctions consign-wrapper  wrapper mobl org-section">
		<div class="container">
			<div class="row-fluid">
				<div class="span12">
					<header class="sales-title pull-left">
						<h2>Past Auction Results:</h2>
					</header>
				</div>
			</div>
			<div class="row-fluid wt-bg">
				<div class="span6">
				<?php $imgs = rwmb_meta( 'ESW_past_auc_img', 'type=thickbox_image', $post->ID );?>
					<?php foreach ($imgs as $img) { ?>
					<div class="figure-holder" style="background-image:url(<?= $img['full_url']; ?>);">
					</div>
					<?php } ?>
				</div>
				<div class="span6">
					<div class="entry">
						<h3><?= rwmb_meta( 'ESW_past_auc_title', $post->ID  ); ?></h3>
						<time class="date" datetime="Mar 22, 2017"><?= rwmb_meta( 'ESW_auc_date', $post->ID  ); ?></time>
						<?= rwmb_meta( 'ESW_past_auc_excerpt', $post->ID  ); ?>
						<?php foreach ($pdfs as $pdf) {
						echo '<a target="_blank" href="'.$pdf['url'].'" class="download_pdf"><i class="down-icon"></i> Download Past Results</a>';
						} ?>
					</div>
				</div>
			</div>
			</div>
	</section>
	<?php } ?>
	<?php get_footer(); ?>
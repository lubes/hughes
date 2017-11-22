<?php
get_template_part( 'templates/head' );
$images = rwmb_meta( 'ESW_auction_thumbs', 'type=plupload_image' );
?>

<body <?php body_class( 'single-product'); ?>>
	<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

	<?php get_template_part('templates/header');  ?>
	<section <?php post_class( 'product-detials'); ?>>
		<div class="container">
			<div class="row-fluid">
				<div class="span12 product-header">
					<header class="spot-light"> <a href="/auctions"><i class="back-icon"></i> back to items</a> </header>
					<div class="r-col pull-right">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="pagination  pull-right">
							<div class="nav-previous">
								<?php
								$previous_post = get_previous_post();
								if ( !empty( $previous_post ) ): ?>
								<a class="icon-angle-left" href="<?php echo get_permalink( $previous_post->ID ); ?>"></a>
								<?php endif; ?>
							</div>
							<div class="nav-next">
								<?php
								$next_post = get_next_post();
								if ( !empty( $next_post ) ): ?>
								<a class="icon-angle-right" href="<?php echo get_permalink( $next_post->ID ); ?>"></a>
							</div>
							<?php endif; ?>
						</div>
						<?php endwhile; endif; ?>
						<div class="mobile-show mobile-header">
						</div>
						<!--//pagination-->
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="product type-product  gallery">
						<div id="equal">
							<section class="slider mobl">
								<div class="flexslider">
									<ul class="slides">
										<?php 
										//print_r($images);
										$i = 0;
										foreach ( $images as $image ) {
										echo '<li><img src="', esc_url( $image['full_url'] ), '"  alt="', esc_attr( $image['alt'] ), '"></li>';
										$i++;
										}
										?>
									</ul>
								</div>
							</section>
							<?php rewind_posts(); ?>
							<?php while ( have_posts() ) : the_post(); ?>
							<div itemscope="" itemtype="http://schema.org/Auction" class="post-13391 product type-product status-publish has-post-thumbnail hentry product_type-simple">
								<div id="left-col" class="images">
									<?php 
										$i = 0;
										foreach ( $images as $image ) {
										if ($i == 0 ) {
										$copy = $post->post_content;
										$cleanCopy = htmlspecialchars($copy);	
											
										echo '<a name="'.$cleanCopy.'"  rel="prettyPhoto[pp_gal]" class="swap open-view hello" href="', esc_url( $image['full_url'] ), '" title="'.$post->post_title.'" rel="lightbox"><img id="lrg" class="zoom small-thumb exchange open-view" src="', esc_url( $image['full_url'] ), '"  alt="', esc_attr( $image['alt'] ), '"><div class="view-overlay"><i class="view-icon"></i></div></a>';
										} else {
												echo '<a style="display:none" name="'.$cleanCopy.'"  rel="prettyPhoto[pp_gal]" class="zoom small-thumb exchange open-view" href="', esc_url( $image['full_url'] ), '" title="'.$post->post_title.'" rel="lightbox"><img class="zoom small-thumb exchange open-view" src="', esc_url( $image['full_url'] ), '"  alt="'.$post->post_title.'"><div class="view-overlay"><i class="view-icon"></i></div></a>';
										}
											$i++;
											}?>
								</div>
								<!--//left-col-->
								<div id="right-col" class="summary entry-summary reg-sale">
									<div class="sum-inner">
										<div class="summary-details">
											<h1 itemprop="name" class="product_title">
												<?php the_title();?>
											</h1>
											<div itemprop="description">
												<?php the_content();?>
												<?php 
												$auction_price = rwmb_meta( 'ESW_auctions_sold_price', $post->ID  );
												$link = rwmb_meta( 'ESW_auctions_custom_link', $post->ID  );
												$ex_link = rwmb_meta( 'ESW_auctions_external_link', $post->ID  ); ?>
												
													<?php if ($link) {
													echo '<a href="'.$link.'" class="read_more_link">read more</a>';
												} ?>
												
												<?php if ($auction_price) { ?>
													<div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer" class="price-left">
													<p itemprop="price" class="price"><span class="amount"><?= rwmb_meta( 'ESW_auctions_sold_price', $post->ID  ); ?></span>
													</p>
													
												</div>
													<?php } ?>
												<?php if ($ex_link) {
												echo '<a href="'.$ex_link.'" class="btn drk-green">Bid Now</a>';
												}
												?>
												
												
												
											</div>
										</div>
										<!--//summary-details-->
									</div>
									<!--//summary-inner-->
								</div>
								<!--//summary -->
							</div>
							<?php endwhile; // end of the loop. ?>
						</div>
						<!--//equal-->
						<div class="thumbnailz">
							<ul>
								
								<?php 
//print_r($images);
$i = 0;
foreach ( $images as $image ) {
echo '<li><a class="zoom small-thumb exchange" href="', esc_url( $image['full_url'] ), '"><img class="attachment-shop_thumbnail" src="', esc_url( $image['full_url'] ), '"  alt="', esc_attr( $image['alt'] ), '"></a></li>';
$i++;
}
?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--//row-->
		</div>
	</section>
	<!--//product-details-->
	<?php get_footer(); ?>
	<script>
		$( document ).ready( function () {
			$( "a[rel^='prettyPhoto']" ).prettyPhoto( {
				animation_speed: 'fast',
				/* fast/slow/normal */
				slideshow: 5000,
				/* false OR interval time in ms */
				theme: 'light_square',
				slideshow: 3000,
				overlay_gallery: false,
				social_tools: false,
				counter_separator_label: ' / ',
				deeplinking: false,
				autoplay_slideshow: false,
				markup: '<div class="pp_pic_holder"> \
<div class="pp_top"> \
<div class="pp_left"></div> \
<div class="pp_middle"></div> \
<div class="pp_right"></div> \
</div> \
<div class="pp_content_container"> \
<div class="pp_left"> \
<div class="pp_right"> \
<div class="pp_content"> \
<div class="pp_loaderIcon"></div> \
<div class="pp_fade"> \
<a href="#" class="pp_expand" title="Expand the image">Expand</a> \
<div class="pp_hoverContainer"> \
<button id="next" class="page-switcher"><a class="pp_next" href="#"><i class="icon-angle-right"></i></a></button> \
<button id="prev" class="page-switcher"><a class="pp_previous" href="#"><i class="icon-angle-left"></i></a></button> \
<a class="pp_close" href="#"><i class="close-ico"></i></a> \
</div> \
<div id="pp_full_res"></div> \
<div class="pp_details"> \
<div class="plus grow"> \
<div class="desc-box"> \
<i class="plus-icon"></i> \
<h2 class="pp_description">&nbsp;</h2> \
<p class="ppt"></p> \
<div class="buy-now"></div> \
</div> \
<div class="paginate"> \
<div class="pp_nav"> \
<a href="#" class="pp_arrow_previous"><i class="icon-angle-left"></i></a> \
<p class="currentTextHolder">0 <span>/</span> 0</p> \
<a href="#" class="pp_arrow_next"><i class="icon-angle-right"></i></a> \
</div> \
</div> \
</div> \
</div> \
</div> \
</div> \
</div> \
</div> \
</div> \
<div class="pp_bottom"> \
<div class="pp_left"></div> \
<div class="pp_middle"></div> \
<div class="pp_right"></div> \
</div> \
</div> \
<div class="pp_overlay"></div>',
			} );
			var counter = 1;
			$( '.grow' ).live( 'click', function () {
				$( this ).toggleClass( 'active' ); // <- notice the change in this line

				counter++ % 2 ?
					$( this ).stop().animate( {
						height: '190px'
					}, 500 ) :
					$( this ).stop().animate( {
						height: '20px'
					}, 1000 );
				return false;
			} );
		} );
	</script>
	<!--endof script-->
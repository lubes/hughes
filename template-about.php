<?php
/**
 * Template Name: About Template
 * Description: A template for the about page
 *
 */

global $woo_options;
get_template_part( 'templates/head' );n ?>

<body <?php body_class( 'about'); ?>>
	<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->
	<?php get_template_part('templates/header');  ?>
	<section class="intro mobl" style="background:url(<?php $image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,'full', true);
echo $image_url[0];  ?>) 50% 0 no-repeat; -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
		<div class="container">
			<div class="row-fluid">
				<header class="into-header">
					<h1>The 2nd generation estate seller that's still second to none</h1>
				</header>
			</div>
		</div>
	</section>
	<section class="tag-line mobl">
		<div class="container">
			<div class="row-fluid">
				<div class="entry-content">
					<?php 
if ( have_posts() ) {
while ( have_posts() ) {
the_post(); 
the_content();
edit_post_link('edit', '<p>', '</p>'); 
} // end while
} // end if
?>
				</div>
				<!--//span12-->
			</div>
		</div>
	</section>
	<section class="sub-line mobl">
		<div class="container">
			<div class="row-fluid">
				<div class="entry-content"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/about/est-ico.png" width="158" height="136" alt="Est. 1978">
					<?php rewind_posts(); ?>
					<?php while (have_posts()) : the_post(); ?>
					<?php echo get_post_meta($post->ID, 'ESW_wysiwyg', true); ?>
					<?php endwhile; ?>
				</div>
				<!--//span12-->
			</div>
		</div>
	</section>
	<section class="wrapper bio mobl">
		<div class="container">
			<header class="whoweare">
				<h6>Who we are</h6>
			</header>
			<div id="list" class="row-fluid">
				<ul class="thumbnails og-grid" id="og-grid">
					<div class="persons js-dropdown-items">
						<?php

						$args = array(
							'post_type' => 'page',
							'posts_per_page' => 99,
							'post_parent' => $post->ID,
							'orderby' => 'menu_order',
							'order' => 'ASC',
						);
						$related_posts = new WP_Query( $args );
						while ( $related_posts->have_posts() ):
							$related_posts->the_post();
						?>

						<div class="person js-dropdown-item span4">
							<div class="avatar">
								<figure class="img-holder">
								
 					<?php  if (has_post_thumbnail( $post->ID ) ) { ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>									
									<img class="img-responsive" src="<?= $image[0]; ?>">
									<?php } ?>
									
									<?php $imgs = rwmb_meta( 'ESW_hover_img', 'type=thickbox_image', $post->ID ); ?>
								
							
									<?php foreach ($imgs as $img) { ?>
									
									<img class="hover_img img-responsive" src="<?= $img['full_url']; ?>">
									
									<?php } ?>
									
									
								</figure>
							</div>
							<div class="bio-desc">
						<h2>
								<?php the_title(); ?>
							</h2>
							<p>
								<?php echo get_post_meta($post->ID, 'ESW_wysiwyg', true); ?>
							</p>
							</div>
							<div class="js-description">
								<?php the_content();?>
							</div>
						</div>
						<!--/item-->
						<?php
						endwhile;
						?>
					</div>
				</ul>
			</div>
		</div>
		<!-- /container -->
	</section>
	<!--//product-wrapper-->
	<?php get_footer(); ?>
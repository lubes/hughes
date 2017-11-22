<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_template_part('templates/head');

$attachment_ids = $product->get_gallery_attachment_ids();

?>




<body <?php body_class('single-product'); ?>>
  <!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<section <?php post_class('product-detials'); ?>>
    <div class="container">
      <div class="row-fluid">
        <div class="span12 product-header <?php  if (get_post_meta($post->ID, '_regular_sale', true)) {
          echo  'reg-sale';
		  } else { 
		  echo ' '; }  ?>">
          <header class="spot-light"> <a href="<?= site_url(); ?>/shop"><i class="back-icon"></i> back to items</a> </header>
          <div class="r-col pull-right">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="pagination  pull-right">
              <div class="nav-previous"> 
              
               <?php
$previous_post = get_previous_post();
if (!empty( $previous_post )): ?>
  <a class="icon-angle-left" href="<?php echo get_permalink( $previous_post->ID ); ?>"></a>
<?php endif; ?>
              
              </div>
              <div class="nav-next"> 
              
              <?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
  <a class="icon-angle-right" href="<?php echo get_permalink( $next_post->ID ); ?>"></a></div>
<?php endif; ?>
              
            </div>
            <?php endwhile; endif; ?>
            <div class="mobile-show mobile-header">
            <div class="spotlight-time"><i class="clock-icon"></i><span><?php do_action( 'woocommerce_single_product_timer' ); ?></span></div>
            </div>
            <!--//pagination--> 
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div  class="product type-product  gallery">
            <div id="equal">
            <section class="slider mobl">
  <div class="flexslider">
    <ul class="slides">
    
    
     <?php
		/*
	 remove_all_filters('posts_orderby');
$args = array(
    'post_type' => 'attachment',
    'numberposts' => 99,
    'orderby' => 'menu_order',
		'order' => 'ASC',
    'post_parent' => $post->ID
);

	$attachments = get_posts($args);
	if ($attachments) {
		foreach ( $attachments as $attachment ) {
  $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
	$caption = $attachment->post_excerpt;
	$description = $image->post_content;
	*/
	
?>
     
     <?php if ( $attachment_ids ) { 
		foreach ( $attachment_ids as $attachment_id ) {
			 $image_link = wp_get_attachment_url( $attachment_id );
			 $image_title = esc_attr( get_the_title( $attachment_id ) );
					echo '<li><img src="'.$image_link.'" /></li>';
			}
		}
		?>
      
      </ul>
  </div>
</section>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action('woocommerce_before_main_content');
	?>
    
   <?php rewind_posts(); ?>


		<?php while ( have_posts() ) : the_post(); ?>

			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action('woocommerce_after_main_content');
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action('woocommerce_sidebar');
	?>
      </div>
            <!--//equal-->
            
            <?php do_action( 'woocommerce_product_thumbnails' ); ?>
            
          </div>
          <!-- #product-543 --> 
          
        </div>
      </div>
      <!--//row--> 
    </div>
  </section>
  <!--//product-details-->
    

<?php get_footer(); ?>

<script>


$(document).ready(function(){
				
				
				$("a[rel^='prettyPhoto']").prettyPhoto({
					
					animation_speed: 'fast', /* fast/slow/normal */
					slideshow: 5000, /* false OR interval time in ms */
					theme:'light_square',
					slideshow:3000, 
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
											<div class="buy-now"><?php include ('single-product/add-to-cart/simple-btn.php');?></div> \
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
					
					
					
	
	

    });
	 var counter = 1;
	$('.grow').live('click', function() {
        $(this).toggleClass('active'); // <- notice the change in this line
		
		
		 counter++ % 2 ? 
    		$(this).stop().animate({height:'190px'},500) :
         
		$(this).stop().animate({height:'20px'},1000);
    
    
	
	
	
	
	
	
	return false;
 
    });
	
  });
  
  </script>
  <!--endof script-->



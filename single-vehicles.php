<?php

get_template_part( 'templates/head' );
$images = rwmb_meta( 'ESW_vehicles_thumbs', 'type=plupload_image' ); 
?>

<body <?php body_class('gallery single-product single-sell_archive'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<div class="light_square"><?php if($_GET['email'] == 'true'){ ?> <a class="close-button" href="<?= site_url(); ?>/vehicles"><i class="close-ico"></i></a> <?php } else { ?> <a class="close-button" href="javascript: history.go(-1)"><i class="close-ico"></i></a> <?php } ?>
  <button class="page-switcher next">
  <a class="pp_next"><i class="icon-angle-right"></i></a>
  </button>
  <button  class="page-switcher prev">
  <a class="pp_previous"><i class="icon-angle-left"></i></a>
  </button>
  <div class="gallery-content">
 <figure class="staffPic"></figure>
    <div class="pp_details">
      <div class="plus">
        <div class="desc-box"><span style="display:block; width:85%; height:20px;" class="trigger"><i class="plus-icon"></i>
          <h2 class="title_tag">&nbsp;</h2></span>
          <p class="ppt"> </p>
        </div>
        <div class="paginate">
          <div class="pp_nav"> <a class="pp_arrow_previous prev"><i class="icon-angle-left"></i></a>
            <div id="nav">&nbsp;</div>
            <a  class="pp_arrow_next next"><i class="icon-angle-right"></i></a> </div>
        </div>
      </div>
    </div>
  </div>
  <!--//gallery-content--> 
</div>
<!--//light_square-->
<div class="mobile-wrapper">
<div class="product-header mobile-show">
<header class="spot-light">
<?php if($_GET['email'] == 'true'){ 
	echo '<a href="/vehicles/"><i class="back-icon"></i> back to sales</a>'; 
} else { 
	echo '<a onclick="goBack();" style="cursor:pointer;"><i class="back-icon"></i> back to sales</a>'; } ?>
	</header>
</div>
<section class="slider mobl">
    <div class="flex-container">
      <div class="flexslider">
        <?php require_once( 'templates/royal-sell-gallery.php' ); // Start the loop for  Products ?>
      </div>
      <div class="meta-page"></div>
    </div>
  </section>
  <?php get_footer('gallery');?>
</div>
<!--//mobile-wrapper--> 
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lib/bgstretcher.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.royalslider.min.js"></script>  
<script type="text/javascript">

	 jQuery(window).resize(function($) {

  if (jQuery(window).width() > 976) { //  Initialize Backgound Stretcher	  
		
<?php 
	if ( have_posts() ) { $count = 0;
    	while ( have_posts() ) { the_post(); $count++;
			$default_content = get_the_content();	
		}
	}
	remove_all_filters('posts_orderby');
	$args = array(
			'post_type' => 'attachment',
			'exclude'        => get_post_thumbnail_id( $post->ID ),
			'numberposts' 	  => 99,
			'orderby'         => 'menu_order',
    		'order'           => 'ASC',
			'post_parent'     => $post->ID);
	$count = 0;
	$image_list="";
	$default_desc = addslashes(get_the_excerpt());
	$description = "";
	$image_title  ="";
	$caption = "";
	$staff_pick = get_post_meta( $attachment->ID, '_staffPx', false );
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ( $attachments as $attachment ) {
			$count++;
			/*if($count > 32){
				break;
			}*/
			//print_r(get_post_custom($attachment->ID));
			if($attachment->_staffPx) {$staffPix[] = get_post_meta( $attachment->ID, '_staffPx', false ); } else { $staffPix[] = ''; }
			$image_title[] = addslashes($attachment->post_title);	
			if ($attachment->post_excerpt){
				$caption[] = addslashes($attachment->post_excerpt);
			} else{
				$caption[]  = get_the_title() ;
			}
			if ($attachment->post_excerpt){
				$caption[] = addslashes($attachment->post_excerpt);
			} else{
				$caption[]  = get_the_title() ;
			}
			if($attachment->post_content != ''){
				$description[] = addslashes($attachment->post_content);
			} else {
				$description[] = addslashes($default_desc);
			}

			$image_list[] = wp_get_attachment_url( $attachment->ID , false );
		}

	} 
?>
jQuery('body').bgStretcher({
		images: <?php echo json_encode($image_list); ?>, 
		title_text:<?php echo json_encode($caption); ?>,
		text:<?php echo json_encode($description); ?>,
		staffPick: <?php echo json_encode($staffPix); ?>,
		resizeProportionally: true,
		slideDirection: 'W',
		slideShowSpeed: 500,
		transitionEffect: 'simpleSlide',
		slideShow: false,
		nextSlideDelay: 1000000,
		sequenceMode: 'normal',
		buttonPrev: '.prev',
		buttonNext: '.next',
		pagination: '#nav',
	});
	} else {
	jQuery('#debug').html('load');
}
});

</script> 
<script type="text/javascript" charset="utf-8"> 
  jQuery(window).load(function() {
 	var sliderJQ = $('#content-slider-1').css('display', 'block').royalSlider({
	autoHeight: true,
    arrowsNav: false,
    fadeinLoadedSlide: false,
    controlNavigationSpacing: 0,
   	controlNavigation:'none',
    imageScaleMode: 'none',
    imageAlignCenter:false,
	imageScalePadding : 'none',
    loop: false,
    loopRewind: true,
    numImagesToPreload: 1,
	imageScalePadding: 0,
	slidesSpacing: 0,
    keyboardNavEnabled: false,
    });
    var sliderInstance = sliderJQ.data('royalSlider');
	var slideCountEl = $('<div style="text-align:center; float:none;" class="rsSlideCount"></div>').appendTo( ".meta-page" );
	 function updCount() {
        slideCountEl.html( (sliderInstance.currSlideId+1) + ' / ' + sliderInstance.numSlides );
    }
    sliderInstance.ev.on('rsAfterSlideChange', updCount);
    updCount();
   $(".trigger").toggle(function() {
             $(".plus").stop().animate({height:'190px'},300);
			$(".plus").addClass("active");
        }, function() {
			$(".plus").removeClass("active");
             $(".plus").stop().animate({height:'20px'},500);
	});
    });
  
  
</script>
<?php wp_footer(); ?>
</body>
</html>
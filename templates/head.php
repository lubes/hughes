<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
 
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="<?php echo get_bloginfo('template_directory');?>/assets/js/html5shiv.js"></script>
    <![endif]-->
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	//bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
<script>
window.goBack = function (e){
    var defaultLocation = "/shop/";
    var oldHash = window.location.hash;

    history.back(); // Try to go back

    var newHash = window.location.hash;

    /* If the previous page hasn't been loaded in a given time (in this case
    * 1000ms) the user is redirected to the default location given above.
    * This enables you to redirect the user to another page.
    *
    * However, you should check whether there was a referrer to the current
    * site. This is a good indicator for a previous entry in the history
    * session.
    *
    * Also you should check whether the old location differs only in the hash,
    * e.g. /index.html#top --> /index.html# shouldn't redirect to the default
    * location.
    */

    if(
        newHash === oldHash &&
        (typeof(document.referrer) !== "string" || document.referrer  === "")
    ){
        window.setTimeout(function(){
            // redirect to default location
            window.location.href = defaultLocation;
        },1000); // set timeout in ms
    }
    if(e){
        if(e.preventDefault)
            e.preventDefault();
        if(e.preventPropagation)
            e.preventPropagation();
    }
    return false; // stop event propagation and browser default event
}
</script>
<script src="<?php echo get_bloginfo('template_directory');?>/assets/js/Chart.js"></script>

<script src="<?php echo get_bloginfo('template_directory');?>/assets/js/modernizr.js" type="text/javascript"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>
    <![endif]-->
    
<?php  if ( is_page_template('template-consign-upload.php') ) { ?>
<script src="<?php echo get_bloginfo('template_directory');?>/assets/js/dropzone.min.js"></script>
<link href="<?php echo get_bloginfo('template_directory');?>/assets/css/dropzone.css" type="text/css" rel="stylesheet" />
 
<script>
<!-- 3 -->


jQuery(document).ready(function($) {
	Dropzone.options.myDropzone = {
		autoProcessQueue: false,
	  	uploadMultiple: false,
	  	parallelUploads: 20,
		maxFiles: 20,
		url: '/uploads/upload.php',

	    init: function() {
	        thisDropzone = this;
	        uploaded = new Array();
	        <!-- 4 -->
	       /* $.get('upload.php', function(data) {
	 
	            <!-- 5 -->
	           /* $.each(data, function(key,value){
	                 
	                var mockFile = { name: value.name, size: value.size };
	                 
	                thisDropzone.options.addedfile.call(thisDropzone, mockFile);
	 
	                thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "uploads/"+value.name);
	                 
	            }); */
	             
	        /* });*/

	         // First change the button to actually tell Dropzone to process the queue.
		    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
		      // Make sure that the form isn't actually being sent.
		      e.preventDefault();
		      e.stopPropagation();
		      thisDropzone.processQueue();
		    });

		    this.on("complete", function (file) {
				//console.log(file);
		    	
				if(file.status == "success")
				{uploaded.push(file.xhr['response']);}

		      if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
		        var $form = $('#my-dropzone');

			    // let's select and cache all the fields
			    //$('.consign-form').html("Finished! Thanks You!");
					
			    var email = '<?php echo $_POST["your-email"]; ?>';

			    var array1 = <?php echo json_encode($_POST["checkbox-404"]); ?>;
			    var array2 = <?php echo json_encode($_POST["checkbox-406"]); ?>;
			    var array3 = <?php echo json_encode($_POST["checkbox-408"]); ?>;

			    $.ajax({
				      type: "POST",
				      url: "/uploads/email.php",
				      data: { youremail: email, 
						     name: '<?php echo $_POST["your-name"]; ?>',
						     address: '<?php echo $_POST["your-address"]; ?>',
						     tel: '<?php echo $_POST["tel-146"]; ?>',
						     check404: array1,
						     check406: array2,
						     check408: array3,
						     deadline: '<?php echo $_POST["deadline"]; ?>',
						     date: '<?php echo $_POST["your-date"]; ?>',
						     other: '<?php echo $_POST["items-other"]; ?>',
						     detail: '<?php echo $_POST["items-detail"]; ?>',
						     referral: '<?php echo $_POST["your-referral"]; ?>',
				      		 files: uploaded }
				    }).done(function( msg ) {
				      //console.log( "Data Saved: " + msg );
					  window.location="/consignment-form/thanks/";
				});

			    var $inputs = $form.find("input, select, button, textarea");
			    // serialize the data in the form

			    // let's disable the inputs for the duration of the ajax request
			    $inputs.prop("disabled", true);

			    // callback handler that will be called on success
			    request.done(function (response, textStatus, jqXHR){
			        // log a message to the console
			        console.log("Hooray, it worked!");
			    });

			    // callback handler that will be called on failure
			    request.fail(function (jqXHR, textStatus, errorThrown){
			        // log the error to the console
			        console.error(
			            "The following error occured: "+
			            textStatus, errorThrown
			        );
			    });
		      }
		    });
	    }
	};
});

</script>
<?php } ?> 
<?php  if ( is_page_template('template-consign.php') ) { ?>
<script>
	function validateForm()
	{
	var x=document.forms["myForm"]["your-email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	  {
	   $('.formError').html("<p style='color:#fa4506; text-transform:uppercase;'><strong>Please fill in your Name, Property Address, Phone and Email.</strong></p>");
	  return false;
	  }
	var x=document.forms["myForm"]["your-name"].value;
	var y=document.forms["myForm"]["your-address"].value;
	var z=document.forms["myForm"]["tel-146"].value;
	if (x==null || x=="" || y==null || y=="" || z==null || z=="")
	  {
	  $('.formError').html("<p style='color:#fa4506; text-transform:uppercase;'><strong>Please fill in your Name, Property Address, Phone and Email.</strong></p>");
	  return false;
	  }  
	}

</script>
<?php } ?>  
  <?php  if ( is_page_template('template-contact.php') ) {
?>
<style>
#map-canvas {width: 100%;height: 626px;}
#map-canvas img { max-width:none; }
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&sensor=false"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/assets/js/g-maps.js"></script>

<?php 
} else {
	
	//do nothing
	
} 

?>    
<link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory');?>/assets/ico/HES_Favicon_32x32.png" />

<?php global $woocommerce;
$currentTime = strtotime("now");
if( $_COOKIE["timercookie"] < $currentTime){
	$woocommerce->cart->empty_cart();
} ?>
</head>

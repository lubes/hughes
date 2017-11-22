<?php
/**
 * Template Name: Consignment Upload Template 
 * Description: A template for the consigning form
 *
 */
function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}
//echo $_POST["formID"];
//echo $_POST["submit"];



if ( isset($_POST['continue']) && !empty($_POST['continue']) ) //Test if submit button named submit was clicked and not empty
{

} else {	

header('Location: /consignment-store-sales-form');	


if ($_POST["formID"] == "consign" && $_POST["submit"] == "true" ){
	
	$to = 'contact@hughesestatesales.com';
	//$to = 'john.chimmy@eatsleepwork.com';
	$subject = 'Consignment Form Submission';
	$headers = "From: " . strip_tags($_POST['your-email']) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($_POST['your-email']) . "\r\n";
	$headers .= 'Bcc: john.chimmy@eatsleepwork.com' . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	$message = '<html><body>';
	$message .= '<h1>Consignment Form Submission!</h1>';
	$message .= '<h2>WHAT DO YOU NEED HELP WITH?</h2>';
	if($_POST["checkbox-408"]){foreach($_POST["checkbox-408"] as $key){ $message .=  "<p>" .$key . "</p>"; }}
	$message .= '<p> Name: '. strip_tags($_POST['your-name']) .'</p>';
	$message .= '<p> Address: '. strip_tags($_POST['your-address']) .'</p>';
	$message .= '<p> Telephone: '. strip_tags($_POST['tel-146']) .'</p>';
	$message .= '<p> Email: '. strip_tags($_POST['your-email']) .'</p>';
	$message .= '<h2>WHAT TYPE OF PROPERTY IS IT?</h2>';
	if($_POST["checkbox-406"]){foreach($_POST["checkbox-406"] as $key => $value){ $message .=  "<p>" . $key . ": " . $value. "</p>"; }}
	$message .= '<h2>IS THERE A DEADLINE?</h2>';
	$message .= '<p> Deadline: '. strip_tags($_POST['deadline']) .'</p>';
	$message .= '<p> Date: '. strip_tags($_POST['your-date']) .'</p>';
	$message .= '<h2>WHAT TYPE OF ITEMS ARE INVOLVED?</h2>';
	if($_POST["checkbox-404"]){foreach($_POST["checkbox-404"] as $key => $value){ $message .=  "<p>" . $key . ": " . $value. "</p>"; }}
	$message .= '<p> Other: '. strip_tags($_POST['items-other']) .'</p>';
	$message .= '<h2>CAN YOU IDENTIFY THE ARTIST NAME, DESIGNER, AUTHOR / EDITION, STYLE, ERA, GENRE OR OTHER DETAILS ABOUT THE ITEMS?</h2>';
	$message .= '<p> Details: '. strip_tags($_POST['items-detail']) .'</p>';
	$message .= '<h2>HOW DID YOU HEAR ABOUT US? WHO REFERRED YOU TO HUGHES?</h2>';
	$message .= '<p> Referral: '. strip_tags($_POST['your-referral']) .'</p>';
	
	$message .= "\r\r<p><small>" . date('Y-m-d') . '</small></p>';
	$message .= '</body></html>';

	if(mail($to, $subject, $message, $headers)){
		$response = "sent";
		header('Location: /consignment-store-sales-form/thanks');
	};
	
}

}


global $woo_options;   
get_template_part('templates/head');  ?>
<body <?php body_class(); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->
<?php get_template_part('templates/header');  ?>
<section class="inner-header mobl">
  <div class="container">
  <div class="consign-title">
        <h1>Sell With Hughes</h1>
        </div>
        <div class="faq-link mobile-show">
        <a href="/consignment-form/faqs/">FAQs</a>
        </div>
      
  </div>
  
 
</section>
<section class="wrapper mobl">
  <div class="container">
    <div class="row-fluid">
      <div class="span9 contact-form">
        <section class="consign-intro">
          <h3>How Does It Work?</h3>
          <p>After a complimentary consultation, we will identify the best selling platform for your items. We'll pack up and transport your items to our Showroom. Our movers are efficient, and professional. All items are inventoried, barcoded, evaluated, and priced by our appraisal team. After your auction or Showroom sales event, you will be provided with a complete inventory of items sold.</p>
          <a class="faq-submit mobile-show" href="/consignment-form/faqs/">FAQs</a>
        </section>
        <div class="consign-form" id="consign-f162-p163-o1">
         <h3 class="Uploader-title">Please Upload Images of Your Items:</h3>
         <ul class="upload-instructions">
            <li>Drag & Drop up to 20 images</li>
            <li>Each image must be under 256 KB</li>
            <li>Images must be saved at 72 dpi RGB</li>
            </ul>
          <form class="dropzone" id="my-dropzone">
          <div class="button-control">
          <hr>
          <button class="consign-form-control consign-submit" type="submit" name="submit" value="true">Submit</button>
          	<input type="hidden" id="youremail" name="youremail" value="<?php echo $_POST["your-email"]; ?>">
            </div>
      </form>
        <div class="dropzone-previews"></div>
        </div>
      </div>
    
      <div class="span3 mobile-faq">
        <section class="hughes-faq">
          <h1>FAQs</h1>
         <?php //function loop in ESW-function
		   displaypage('/consignment-store-sales-form/faqs/', "faq-info"); ?>
     </section>
      </div>
     
    </div>
    <!-- /row-fluid -->
  </div>
</section>



<?php get_footer(); ?>

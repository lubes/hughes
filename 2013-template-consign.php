<?php
/**
 * Template Name: Consignment Template
 * Description: A template for the consigning form
 *
 */
function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

if ($_POST["formID"] =="consign" ){
	
	if ($_FILES['mobilefile'] != "") {
	$date = time();
	$file_name = $date ."-". $_FILES['mobilefile']['name'];
    $file_size =$_FILES['mobilefile']['size'];
    $file_tmp = $_FILES['mobilefile']['tmp_name'];
    $file_type= $_FILES['mobilefile']['type'];   
    $file_ext=strtolower(end(explode('.',$_FILES['mobilefile']['name'])));
    
	move_uploaded_file($file_tmp,"/home/hughesds/hughesestatesales.com/uploads/files/".$file_name);
	$tmp .= "http://www.hughesestatesales.com/uploads/files/" . $file_name . " ";
}
	
	
	
	$to = 'contact@hughesestatesales.com';
	//$to = 'freddie.horstmann@eatsleepwork.com';
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
	$message .= '<h2>IMAGES UPLOADED</h2>';
  $message .=  $_FILES;
	if($_POST["uploaded-images"]){foreach($_POST["uploaded-images"] as $key){ $message .=  "<p>" .$key . "</p>"; }}
	if($_FILES['mobilefile']['name'] != ""){$message .=  "<p>Uploaded via mobile device.</p><p>" .$tmp  . "</p>"; }
	
	$message .= "\r\r<p><small>" . date('Y-m-d') . '</small></p>';
	$message .= '</body></html>';

	if(mail($to, $subject, $message, $headers)){
		$response = "sent";
		header('Location: thanks/');
	};
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
          <p>After an initial consultation, we will determine if an onsite estate sale or consignment at our monthly showroom sale is the best option. For onsite sales, our team sets up the home to be as much like a store as possible. We organize, price, merchandise, and advertise for an optimal shopping experience. Sales last from one to three days, depending on the size of the estate. For consignment, we pack and move your items to our showroom, where they will be inventoried, priced, and merchandized for our monthly three day sales event. We provide you with a complete inventory and issue a cashier’s check within 21 business days of the sale.</p>
          <a class="faq-submit mobile-show" href="/consignment-form/faqs/">FAQs</a>
        </section>
        <div class="consign-form" id="consign-f162-p163-o1">
          <h3>What Do You Need Help With?</h3>
          <form action="/consignment-form/" method="post" enctype="multipart/form-data">
            <p><span class="consign-form-control-wrap checkbox-408"><span class="consign-form-control consign-checkbox clearfix"> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-408[]" value="Entire Household" id="entire-household">
              &nbsp;
              <label class="consign-list-item-label" for="entire-household">Entire Household</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-408[]" value="Partial Household" id="partial-household">
              &nbsp;
              <label class="consign-list-item-label" for="partial-household">Partial Household</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-408[]" value="A Few Things" id="few-things">
              &nbsp;
              <label class="consign-list-item-label" for="few-things">A Few Things</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-408[]" value="Vehicle(s)" id="vehicle">
              &nbsp;
              <label class="consign-list-item-label" for="vehicle">Vehicle(s)</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-408[]" value="Business Liquidation" id="business-liquidation">
              &nbsp;
              <label class="consign-list-item-label" for="business-liquidation">Business Liquidation</label>
              </span></span></span></p>
            <p><span class="consign-form-control-wrap your-name">
              <input type="text" name="your-name" value="" size="40" class="consign-form-control consign-text" aria-required="true" placeholder="Name">
              </span> </p>
            <p><span class="consign-form-control-wrap your-address">
              <input type="text" name="your-address" value="" size="40" class="consign-form-control consign-text" placeholder="Property Address">
              </span></p>
            <p><span class="consign-form-control-wrap tel-146">
              <input type="tel" name="tel-146" value="" size="40" class="consign-form-control consign-text consign-tel phone" placeholder="Phone">
              </span></p>
            <p><span class="consign-form-control-wrap your-email">
              <input type="email" name="your-email" value="" size="40" class="consign-form-control consign-text consign-email" aria-required="true" placeholder="Email">
              </span> </p>
            <hr>
            <h3>What Type of Property Is It?</h3>
            <p><span class="consign-form-control-wrap checkbox-406"><span class="consign-form-control consign-checkbox clearfix"> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-406[]" value="House" id="house">
              &nbsp;
              <label class="consign-list-item-label" for="house">House</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-406[]" value="Apartment" id="apartment">
              &nbsp;
              <label class="consign-list-item-label" for="apartment">Apartment</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-406[]" value="Condo" id="condo">
              &nbsp;
              <label class="consign-list-item-label" for="condo">Condo</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-406[]" value="Storage Unit" id="storage-unit">
              &nbsp;
              <label class="consign-list-item-label" for="storage-unit">Storage Unit</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-406[]" value="Storefront" id="storefront">
              &nbsp;
              <label class="consign-list-item-label" for="storefront">Storefront</label>
              </span></span></span> </p>
            <hr>
            <h3>Is There A Deadline?</h3>
            <p> <span class="consign-form-control consign-checkbox clearfix"> <span class="consign-list-item">
              <input type="radio" name="deadline" value="Yes" id="yes">
              &nbsp;
              <label class="consign-list-item-label" for="yes">Yes</label>
              </span> <span class="consign-list-item">
              <input type="radio" name="deadline" value="No" id="no">
              &nbsp;
              <label class="consign-list-item-label" for="no">No</label>
              </span> </span> </p>
            <p><span class="consign-form-control-wrap your-date">
              <input type="text" name="your-date" value="" size="40" class="consign-form-control consign-text" aria-required="true" placeholder="Enter Date">
              </span> </p>
            <hr>
            <h3>What Type of Items Are Involved?</h3>
            <p><span class="consign-form-control-wrap checkbox-406"><span class="consign-form-control consign-checkbox clearfix"> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Art" id="art">
              &nbsp;
              <label class="consign-list-item-label" for="art">Art</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Furniture" id="furniture">
              &nbsp;
              <label class="consign-list-item-label" for="furniture">Furniture</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Books" id="books">
              &nbsp;
              <label class="consign-list-item-label" for="books">Books</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Jewelry" id="jewelry">
              &nbsp;
              <label class="consign-list-item-label" for="jewelry">Jewelry</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Dishes-Flatware" id="dishes">
              &nbsp;
              <label class="consign-list-item-label" for="dishes">Dishes / Flatware</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Vehicles" id="vehicles2">
              &nbsp;
              <label class="consign-list-item-label" for="vehicles2">Vehicles</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Rugs" id="rugs">
              &nbsp;
              <label class="consign-list-item-label" for="rugs">Rugs</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Decorative" id="decorative">
              &nbsp;
              <label class="consign-list-item-label" for="decorative">Decorative</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Clothing" id="clothing">
              &nbsp;
              <label class="consign-list-item-label" for="clothing">Clothing</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Household Items" id="household">
              &nbsp;
              <label class="consign-list-item-label" for="household">Household Items</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Appliances" id="appliances">
              &nbsp;
              <label class="consign-list-item-label" for="appliances">Appliances</label>
              </span> <span class="consign-list-item">
              <input type="checkbox" name="checkbox-404[]" value="Collectibiles" id="collectibiles">
              &nbsp;
              <label class="consign-list-item-label" for="collectibiles">Collectibiles</label>
              </span> </span></span></p>
            <p><span class="consign-form-control-wrap items-other">
              <input type="text" name="items-other" value="" size="40" class="consign-form-control consign-text" placeholder="Other">
              </span></p>
            <hr>
            <h3>Can You Identify the Artist Name, Designer, Author / Edition, Style, Era, Genre or Other Details About the Items? </h3>
            <p> <span class="consign-form-control-wrap items-detail">
              <textarea name="items-detail" cols="40" rows="10" class="consign-form-control consign-textarea" placeholder="Details"></textarea>
              </span> </p>
            <hr>
            <h3>How Did You Hear About Us? Who Referred You to Hughes?</h3>
            <p><span class="consign-form-control-wrap your-referral">
              <input type="text" name="your-referral" value="" size="40" class="consign-form-control consign-text" aria-required="true" placeholder="Other">
              </span> </p>
            <!--Ajax Drag and Drop File Uploader-->
            <hr>
            <h3>Please Upload Images of Your Items:</h3>
            <ul class="upload-instructions">
              <li>Each image must be under 256 Kb</li>
              <li>Images must be saved at 72 dpi RGB</li>
              <li class="mobilehide">Upload 5 files at a time. Repeat as necessary for more files.</li>
            </ul> 
           <div id="FileUpload">
   <input type="file" size="24" id="BrowserHidden" name="mobilefile" onChange="getElementById('FileField').value = getElementById('BrowserHidden').value;" />
    <div id="BrowserVisible"><input type="text" id="FileField" multiple/></div>
</div>
            <div class="upload_form_cont">
              <div id="dropArea"><span>
Drag &amp; Drop Images Here</span></div>
              <div class="info">
              
              <div><h3>Progress:</h3></div>
                <canvas width="480" height="10"></canvas>
                <div>Images left to be uploaded: <span id="count">0</span></div>
                <div style="visibility:hidden; height:1px;">Destination url:
                  <input id="url" value="/uploads/upload.php">
                </div>
                <div id="result"></div>
                
              </div>
            </div>
            <script src="<?php echo get_template_directory_uri(); ?>/assets/js/draganddrop.js"></script>
            <!--/Drag and Drop -->
            <hr>
            <p><input name="formID" type="hidden" value="consign">
              <input type="submit" value="Submit" class="consign-form-control consign-submit">
              </p>
          
          </form>
        </div>
      </div>
    
      <div class="span3 mobile-faq">
        <section class="hughes-faq">
          <h1>FAQs</h1>
         <?php //function loop in ESW-function
		   displaypage('consignment-form/faqs/', "faq-info"); ?>
     </section>
      </div>
     
    </div>
    <!-- /row-fluid -->
  </div>
</section>



<?php get_footer(); ?>

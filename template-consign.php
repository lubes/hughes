<?php
/**
 * Template Name: Consignment Template
 * Description: A template for the consigning form
 *
 */

global $woo_options;   
get_template_part('templates/head');  ?>
<body <?php body_class(); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->
<?php get_template_part('templates/header');  ?>
<section class="inner-header mobl">
  <div class="container">
  <div class="consign-title">
        <h1>Consignment Sales with Hughes</h1>
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
          <p>After a complimentary consultation, we'll pack up and transport your items to the Altadena or Los Angeles consignment store for one of our monthly Showroom Sale events. Our movers are efficient, professional, and take exceptional care with art and fine furnishings. In the Showroom, all items are inventoried, barcoded, evaluated, and priced. Our Showroom Sales happen twice a month and are staffed by knowledgeable and helpful sales people, as well as security. We provide you with a complete inventory of items sold at the Showroom event.</p>
          <a class="faq-submit mobile-show" href="/consignment-form/faqs/">FAQs</a>
        </section>
        <div class="consign-form" id="consign-f162-p163-o1">
          <h3>What Do You Need Help With?</h3>
          <form action="/consigning/consignment-form-upload/" name="myForm" method="post" enctype="multipart/form-data" onSubmit="return validateForm()" style="overflow:hidden;">
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
              <input type="checkbox" name="checkbox-404[]" value="Collectibles" id="collectibiles">
              &nbsp;
              <label class="consign-list-item-label" for="collectibiles">Collectibles</label>
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
            
            <div class="formError"></div>
               <input type="hidden" name="formID"  value="consign">
            <div class="submit-l">
              <h3 style="white-space: nowrap;">Submit without images</h3>
                 <button class="consign-form-control consign-submit" name="submit" value="true" type="submit">Submit</button>       
            </div>
            
            <div class="submit-r">
            <h3>CONTINUE TO UPLOAD IMAGES</h3>
            <input type="submit" name="continue" value="Continue" class="consign-form-control consign-submit gry-btn">
         </div>
         
          </form>
        </div>
      </div>
    
      <div class="span3 mobile-faq">
        <section class="hughes-faq">
          <h1>FAQs</h1>
         <?php //function loop in ESW-function
       displaypage('consignment-store-sales-form/faqs/', "faq-info"); ?>
     </section>
      </div>
     
    </div>
    <!-- /row-fluid -->
  </div>
</section>



<?php get_footer(); ?>

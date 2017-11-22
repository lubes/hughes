<?php
/**
 * Template Name: Selling Template
 * Description: A template for the selling page
 *
 */

global $woo_options;   
get_template_part('templates/head');  ?>


<body <?php body_class('services selling-services'); ?>>
  <!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
 
 
 
 
 
 <section class="service-link mobile-show">
   <div class="links">
              <ul>
              <li class="buying"><a href="/estate-sales-services/buying/">Buying</a></li>
              <li>/</li>
              <li class="selling last"><a href="/estate-sales-services/selling/">Selling</a></li>
              </ul>
            </div>
            <div class="mobile-show mobile-header">
          <h1>About Selling:</h1>
            </div>
        </section>
  
  
  
  <section class="wrapper bio mobl">
    <div class="container">
      <div class="row-fluid services-list">
        
       
        
        <div class="span6 services-features">
          <div class="row-fluid">
          <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/hughes-estate-liquidation-sale-service.png" width="100" height="100" alt="Hughes Estate Sales – Liquidation Services"></div>
          <div class="span9">
            <h2>Security &amp; Convenience </h2>
            <p>Since 1978, Hughes has assisted thousands with estate sales and services. Our goal is to make things as easy and straightforward as possible. Our Showroom consignment provides a secure and discreet option and allows us to inventory and barcode every single item, eliminating the risks typically associated with opening homes to the public. We ensure that your property is empty in one to two days.</p>
          </div>
        </div>
        </div>
        <!--/consigning-->
       
        <div class="span6 services-features">
          <div class="row-fluid">
          <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/high-return-antique-inspect-appraise.png" width="100" height="100" alt="Antiques Inspection & Appraisal for Higher Return"></div>
          <div class="span9">
            <h2>Higher Returns</h2>
            <p>Our Showroom consignment service is proven to bring you more revenue. Whether you are liquidating an entire estate, moving, downsizing or have property in storage, our selection and value estimation process ensures that each item is closely inspected and evaluated. Whether contemporary or antique, your items receive thorough inspection by our appraiser and are beautifully merchandised in our Showroom.</p>
          </div>
        </div>
        </div>
        
        
        <!--/showroom sales-->
        <div class="span6 services-features">
          <div class="row-fluid">
          <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/icon-vehicle.png" width="100" height="100" alt="Vehicle Sales"></div>
          <div class="span9">
            <h2>Vehicle Sales</h2>
            <p>For higher quality pre-owned or vintage collector cars, we offer a brokerage service. Our in-house specialist brings more than 20 years of automotive expertise and will do a cost analysis of your vehicle before placement on the market. Hughes handles all aspects of the sale from start to finish and has consistently exceeded fair market value on all vehicles sold.</p>
          </div>
        </div>
        </div>
      
        
        <!--/showroom sales-->
        <div class="span6 services-features">
          <div class="row-fluid">
          <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/hughes-antique-appraisal.png" width="100" height="100" alt="Estate Sale Appraiser Service"></div>
          <div class="span9">
            <h2>Appraisals</h2>
            <p>For valuation estimations and antique appraisal services, our entire appraising team brings decades of experience in determining current market value of valuables. In addition, our in-house staff appraiser is certified by the American Society of Appraisers to conduct Personal Property Appraisals. Our appraisals can simplify equitable distribution among heirs, guide insurance decisions, assist in estate planning, or prepare your items for market.</p>
          </div>
        </div>
        </div>
        <!--/consigning-->
        
      </div>
      <!--/row-fluid-->
      
    </div>
    <!-- /container -->
  </section>
  <!--//product-wrapper-->
		
<?php get_footer(); ?>
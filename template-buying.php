<?php
/**
 * Template Name: Buying Template
 * Description: A template for the buying page
 *
 */

global $woo_options;   
get_template_part('templates/head');  ?>


<body <?php body_class('services buying-services'); ?>>
  <!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
 
 
 
 
 
 <section class="service-link mobile-show">
   <div class="links">
              <ul>
              <li class="buying"><a href="/estate-sales-services/buying/">Buying</a></li>
              <li>/</li>
              <li class="last"><a href="/estate-sales-services/selling/">Selling</a></li>
              </ul>
            </div>
            <div class="mobile-show mobile-header">
          <h1>About Buying:</h1>
            </div>
        </section>
  
  
  
  
  <section class="wrapper bio mobl">
    <div class="container">
      <div class="row-fluid services-list">
        
       
        <div class="span6 services-features">
          <div class="row-fluid">
            <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/los-angeles-estate-sale-showroom-service.png" width="100" height="100" alt="Altadena Estate Sales – Showroom Services"></div>
            <div class="span9">
              <h2>Altadena Showroom</h2>
              <p>Since 2007, our Altadena Showroom has offered shoppers hand-picked vintage and designer furnishings from estates all over Los Angeles. Every month, our Showroom features fresh stock from multiple estates all under one roof, attracting shoppers from all over the region. Shoppers line up on Friday, Saturday and Sunday mornings to be the first ones through the door. This 3-day sale starts the first Friday of every month.</p>
            </div>
          </div>
        </div>
        <!--/showroom sales-->
        
        <div class="span6 services-features">
          <div class="row-fluid">
            <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/estate-showroom-sale-altadena.png" width="100" height="100" alt="Estate Sale Showroom – Serving Los Angeles"></div>
            <div class="span9">
              <h2>Downtown Arts District Showroom</h2>
              <p>Located in the heart of the Downtown LA Arts District, our new Showroom brings vintage and designer furnishings within arms reach of loft dwellers, designers, artists, and urban professionals who call Downtown home. Situated at 5th and Alameda, we’re just off the 10 Freeway and just a few blocks from trendy cafés. This 3-day sale starts the third Friday of every month.</p>
            </div>
          </div>
        </div>
        <!--/showroom sales-->
        
        <div class="span6 services-features">
          <div class="row-fluid">
            <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/online-estate-sales-services.png" width="100" height="100" alt="Online Estate Sales – Virtual Shopping Services"></div>
            <div class="span9">
              <h2>Online Sales</h2>
              <p>As part of our virtual service, the online Store features curated collections and is the perfect place for rare and higher ticket items that call for a worldwide audience. Timed “Spotlight Sales" offering select items from the Showroom floor are a fun, easy way to nab a great find before the estate sale opens! We ship worldwide or can arrange for pick up during Showroom Sale hours. </p>
            </div>
          </div>
        </div>
        <!--/showroom sales-->
        
        <div class="span6 services-features">
          <div class="row-fluid">
            <div class="span3"> <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/services/icon-standard.png" width="100" height="100" alt="The Hughes Standard"></div>
            <div class="span9">
              <h2>The Hughes Standard</h2>
              <p>Our official rating system assures you that every item goes through a rigorous 3-step approval process before being offered for sale:</p>
            <ol class="hughes-standard">
              <li class="third">RARITY:<span> Is it one of a kind, or do only a few still remain?</span></li>
              <li>CONDITION:<span> Signs of wear, damage and/or aging</span></li>
              <li class="second">COOL FACTOR: <span> Slightly subjective, is it cool to own?</span></li>
              
            </ol>
            </div>
          </div>
        </div>
       
        
        <!--/showroom sales-->
       
        
      </div>
      <!--/row-fluid-->
      
    </div>
    <!-- /container -->
  </section>
  <!--//product-wrapper-->

		
<?php get_footer(); ?>
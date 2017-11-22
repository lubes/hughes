<?php 


global $woo_options;   
get_template_part('templates/head');  ?>

<body <?php body_class(); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<section class="wrapper mobl">
  <div class="container">
    <div class="row-fluid">
    <div class="span12">
        <section class="full-wrapper err-message">
        <header>
          <h1>
            <?php _e( 'Oops - Page not found!', 'woothemes' ); ?>
          </h1>
        </header>
     	 <div class="err-message">
            <p>
              <?php _e( 'The page you\'re trying to reach does not exist, or has been moved.', 'woothemes' ); ?>
            </p>
            <a style="font-size:14px; font-family: 'AvenirLT-Heavy';
font-size: 14px; line-height:20px;" class="grn-link" href="<?= site_url(); ?>/shop"><i class="icon-angle-left"></i><span style="display: inline-block;
    vertical-align: top;">RETURN TO STORE</span></a> </div>
          <!--/post-content--> 
          
        </section>
      </div>
     
    </div>
    <!-- /row-fluid -->
  </div>
</section>
<?php get_footer(); ?>

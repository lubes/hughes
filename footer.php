<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */


?>

<div class="push"></div>
<footer class="footer mobl">
  <div class="container">
    <div class="row-fluid">
      <div class="l-col">
        <div class="span4">
          <div class="col alpha">
            <h3>626-791-9600</h3>
            <address>
            Hughes Main Office<br>
            Altadena Showroom<br>
            711 West Woodbury Road, Bldg A<br>
            Altadena, CA 91001
            </address>
            
            <address>
           

Downtown LA Arts District Showroom<br>
458 South Alameda Street<br>
Los Angeles, CA 90013<br>

            </address>
            
            <small>&copy; <?php echo date('Y'); ?> Hughes Estate Sales, Inc.</small> </div>
          <div class="col omega">
            <ul class="footer-nav">
              <li><a href="<?= site_url(); ?>">Home</a></li>
              <li><a href="<?= site_url(); ?>/shop/">Shop</a></li>
              <li><a href="<?= site_url(); ?>/showroom-sales/">Showroom Sales</a></li>
              <li><a href="<?= site_url(); ?>/auctions/">Auctions</a></li>
               <li><a href="<?= site_url(); ?>/vehicles/">Vehicles</a></li>
              <li><a href="<?= site_url(); ?>/estate-sales-services/">Services</a></li>
              <li><a href="<?= site_url(); ?>/estate-liquidation-blog-and-sale-tips/">Blog</a></li>
              <li><a href="<?= site_url(); ?>/contact-consignment-store-in-los-angeles/">Contact</a></li>
              <li><a href="<?= site_url(); ?>/conditions-of-sale/">Conditions of Sale</a></li>
            </ul>
          </div>
        </div>
        <!--//span4--> 
      </div>
      <!--//l-col-->
      <div class="r-col">
        <div class="span4">
          <div class="col social">
            <h2>Follow Hughes</h2>
            <ul>
              <li class="ico"><a class="icon-twitter" href="https://twitter.com/EstateSalesCA" target="_blank"></a></li>
              <li class="ico"><a class="icon-facebook" href="https://www.facebook.com/HughesEstateSalesInc" target="_blank"></a></li>
              <li class="ico"><a class="icon-pinterest" href="http://pinterest.com/hughesestates" target="_blank"></a></li>
              <li class="ico"><a class="icon-instagram" href="http://instagram.com/hughesestatesalesinc" target="_blank"></a></li>
              <li class="ico"><a class="icon-google-plus" href="https://plus.google.com/u/0/109217521077289521436/posts" target="_blank"></a></li>
            </ul>
          </div>
        </div>
        
        <!--//span4-->
        <div class="span4">
          <div class="col last">
            <h2>Become a Hughes Insider</h2>
            <p>Get on the List to find out about upcoming<br>
              sale events and new items available online.</p>
            <a data-toggle="modal" href="#myModal" class="btn btn-grn modal-btn">Sign Up</a> <a href="/become-a-hughes-insider/" class="btn btn-grn modal-btn mobile-show">Sign Up</a> <span class="ipad-hide">Are you a Reseller? <a href="/my-account" id="reseller-register">Register</a> or
            <?php
					if ( is_user_logged_in() ) {
					    echo '<a href="'.wp_logout_url( get_permalink() ).'" title="Logout">Logout</a>';
					} else {
					    echo '<a href="/my-account" title="Login" id="reseller-login">Login</a>';
					}
					?>
            </span> </div>
          <!--//col--> 
        </div>
        <!--//span4--> 
      </div>
      <!--//r-col--> 
    </div>
    <!--//row-fluid--> 
  </div>
  <!--//container--> 
</footer>

<!--//MOBILE Footer-->

<footer id="mobile-footer" class="footer mobl">
  <div class="container">
    <div class="row-fluid">
      <div class="r-col">
        <div class="span4">
          <div class="col last">
            <h2>Become a Hughes Insider</h2>
            <p>Get on the List to find out about upcoming<br>
              sales and new items available online.</p>
            <a href="/become-a-hughes-insider/" class="btn btn-grn">Sign Up</a> </div>
        </div>
        <!--//span4-->
        
        <div class="span4">
          <div class="col social">
            <h2>Follow Hughes</h2>
            <ul>
              <li class="ico"><a class="icon-twitter" href="https://twitter.com/EstateSalesCA" target="_blank"></a></li>
              <li class="ico"><a class="icon-facebook" href="https://www.facebook.com/HughesEstateSalesInc" target="_blank"></a></li>
              <li class="ico"><a class="icon-pinterest" href="http://pinterest.com/hughesestates" target="_blank"></a></li>
              <li class="ico"><a class="icon-instagram" href="http://instagram.com/hughesestatesalesinc" target="_blank"></a></li>
              <li class="ico"><a class="icon-google-plus" href="https://plus.google.com/u/0/109217521077289521436/posts" target="_blank"></a></li>
            </ul>
          </div>
        </div>
        
        <!--//span4--> 
        
      </div>
      <!--//r-col-->
      
      <div class="l-col">
        <div class="span4">
          <div class="col alpha">
            <h3>626-791-9600</h3>
             <address>
            Hughes Main Office<br>
            Altadena Showroom<br>
            711 West Woodbury Road, Bldg A<br>
            Altadena, CA 91001
            </address>
            
            <address>
           

Downtown LA Arts District Showroom<br>
458 South Alameda Street<br>
Los Angeles, CA 90013<br>

            </address>
          </div>
          <!--//col-->
          <div class="col omega">
            <ul class="footer-nav">
              <li><a href="<?= site_url(); ?>">Home</a></li>
              <li><a href="<?= site_url(); ?>/shop/">Shop</a></li>
              <li><a href="<?= site_url(); ?>/showroom-sales/">Showroom Sales</a></li>
              <li><a href="<?= site_url(); ?>/auctions/">Auctions</a></li>
               <li><a href="<?= site_url(); ?>/vehicles/">Vehicles</a></li>
              <li><a href="<?= site_url(); ?>/estate-sales-services/">Services</a></li>
              <li><a href="<?= site_url(); ?>/estate-liquidation-blog-and-sale-tips/">Blog</a></li>
              <li><a href="<?= site_url(); ?>/contact-consignment-store-in-los-angeles/">Contact</a></li>
              <li><a href="<?= site_url(); ?>/conditions-of-sale/">Conditions of Sale</a></li>
            </ul>
            <small>&copy; <?php echo date('Y'); ?> Hughes Estate Sales, Inc.</small> </div>
        </div>
        <!--//span4--> 
      </div>
      <!--//l-col--> 
      
    </div>
    <!--//fluid--> 
  </div>
  <!--//container--> 
  
</footer>
<div class="sub-footer mobl">
  <div class="container"> <span>Are you a Reseller? <a href="/my-account" id="reseller-register">Register</a> or
    <?php
					if ( is_user_logged_in() ) {
					    echo '<a href="'.wp_logout_url( get_permalink() ).'" title="Logout">Logout</a>';
					} else {
					    echo '<a href="/my-account" title="Login" id="reseller-login">Login</a>';
					}
					?>
    </span> </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close-ico" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Become a Hughes Insider</h4>
      </div>
      <div class="modal-body">
        <div class="modal-form"> 
          
          <!-- Begin MailChimp Signup Form -->
          <link href="https://cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
          <style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
          <div id="mc_embed_signup">
            <form action="http://hughesestatesales.us2.list-manage.com/subscribe/post?u=5ee8ee1efbd65dc77c99c0f7c&amp;id=9963f49b5a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <p> <span class="consign-form-control-wrap your-name">
                <input type="text" placeholder="First Name" value="" name="FNAME" class="required" id="mce-FNAME">
                </span> </p>
              <p> <span class="consign-form-control-wrap your-name">
                <input type="text" placeholder="Last Name" value="" name="LNAME" class="required" id="mce-LNAME">
                </span> </p>
              <p> <span class="consign-form-control-wrap your-email">
                <input type="email" placeholder="Email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                </span> </p>
              <div class="consign-form-control-wrap">
                <h3>Sign me up for: <span>choose all that apply</span></h3>
                <span class="consign-form-control consign-checkbox clearfix"> <span class="consign-list-item">
                <input type="checkbox" value="1" name="group[1][1]" id="mce-group[1]-1-0">
                <label for="mce-group[1]-1-0">Estate and Showroom Sales</label>
                </span> <span class="consign-list-item">
                <input type="checkbox" value="2" name="group[5][2]" id="mce-group[5]-5-0">
                <label for="mce-group[5]-5-0">Estate Vehicles</label>
                </span> </span> </div>
              <div class="consign-form-control-wrap"> <span class="consign-form-control consign-checkbox clearfix"> <span class="consign-list-item">
                <input type="checkbox" value="4" name="group[9][4]" id="mce-group[9]-9-0">
                <label for="mce-group[9]-9-0">Online Shop Updates</label>
                </span> <span class="consign-list-item">
                <input type="checkbox" value="8" name="group[13][8]" id="mce-group[13]-13-0">
                <label for="mce-group[13]-13-0">Newsletters</label>
                </span> </span> </div>
              <div class="consign-form-control-wrap">
                <h3>Get Text Alerts: <span>not required</span></h3>
                <p> <span class="consign-form-control consign-checkbox clearfix"> <span class="consign-list-item last">
                  <input type="checkbox" value="16" name="group[17][16]" id="mce-group[17]-17-0">
                  <label for="mce-group[17]-17-0">Yes, I also want to receive text alerts. </label>
                  </span> </span>
                <p> <span class="consign-form-control-wrap tel-146">
                  <input type="tel" placeholder="1-888-888-8888" value="" name="MMERGE3" class="" id="mce-MMERGE3">
                  </span> </p>
              </div>
              <div id="mce-responses">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
              </div>
              <input type="submit" value="Subscribe" name="subscribe" class="wpcf7-submit">
            </form>
          </div>
          <script type="text/javascript">
var fnames = new Array();var ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[0]='EMAIL';ftypes[0]='email';
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == 'complete') mce_preload_check();
        }    
    }
}
var script = document.createElement('script');
script.type = 'text/javascript';
script.src = 'https://downloads.mailchimp.com/js/jquery.form-n-validate.js';
head.appendChild(script);
var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
}
var head= document.getElementsByTagName('head')[0];
var style= document.createElement('style');
style.type= 'text/css';
if (style.styleSheet) {
  style.styleSheet.cssText = err_style;
} else {
  style.appendChild(document.createTextNode(err_style));
}
head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    jQuery(document).ready( function($) {
      var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: 'http://hughesestatesales.us2.list-manage1.com/subscribe/post-json?u=5ee8ee1efbd65dc77c99c0f7c&id=9963f49b5a&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $('#mce_tmp_error_msg').remove();
                        $('.datefield','#mc_embed_signup').each(
                            function(){
                                var txt = 'filled';
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        var bday = false;
                                        if (fields.length == 2){
                                            bday = true;
                                            fields[2] = {'value':1970};//trick birthdays into having years
                                        }
                                    	if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                    		this.value = '';
									    } else if ( fields[0].value=='' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                    		this.value = '';
									    } else {
									        if (/\[day\]/.test(fields[0].name)){
    	                                        this.value = fields[1].value+'/'+fields[0].value+'/'+fields[2].value;									        
									        } else {
    	                                        this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
	                                        }
	                                    }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $('#mc-embedded-subscribe-form').ajaxForm(options);
      
      
    });
}
function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
    	});
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';
                
                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
}

</script> 
          <!--End mc_embed_signup--> 
          
        </div>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->
<div id="loader" style="display:none;"></div>
<?php wp_footer(); ?>
<?php woo_foot(); ?>
<div class="hreview-aggregate" style="height:0px; overflow:hidden;"><span class="item"> <span class="fn">Hughes Estate Sales</span> <img src="https://lh5.googleusercontent.com/-Zm4JrlNShY4/Ui5XXICDq0I/AAAAAAAAANU/Ayuyc-1g1w0/s250-no/HES_Avatar_Google.jpg" class="photo" /> </span> <span class="rating"> <span class="average">4.5</span> out of <span class="best">5</span> </span> based on <span class="votes">51</span> ratings.</div>
</body></html>
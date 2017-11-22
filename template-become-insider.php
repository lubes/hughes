<?php
/*
Template Name: Become an Hughes Insider
*/
global $woo_options;   
get_template_part('templates/head');  ?>

<body <?php body_class(); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<div class="wrapper mobl">
  <div class="container"> </div>
  <section class="post-wrapper">
    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <article>
            <div class="post-content signup-wrapper">
              <div class="modal-form"> 
                
                <!-- Begin MailChimp Signup Form -->
                <link href="http://cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
                <style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
                <div id="mc_embed_signup">
                  <form action="http://hughesestatesales.us2.list-manage.com/subscribe/post?u=5ee8ee1efbd65dc77c99c0f7c&amp;id=9963f49b5a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <h4 class="modal-title">Become a Hughes Insider</h4>
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
script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
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
            <!--/post-content--> 
          </article>
          <!-- .post --> 
          
        </div>
        <!--//span9--> 
        
      </div>
      <!--//row--> 
      
    </div>
    <!--//container--> 
  </section>
</div>
<!-- //wrapper -->

<?php get_footer(); ?>

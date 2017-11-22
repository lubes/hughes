<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/bootstrap.css
 * 2. /theme/assets/css/bootstrap-responsive.css
 * 3. /theme/assets/css/app.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.10.2.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/plugins.js (in footer)
 * 4. /theme/assets/js/main.js    (in footer)
 */
 
 
 
 
 
function esw_scripts() {
  wp_enqueue_style('esw_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, null);
  wp_enqueue_style('esw_bootstrap_responsive', get_template_directory_uri() . '/assets/css/bootstrap-responsive.css', array('esw_bootstrap'), null);
   wp_enqueue_style('esw_awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false, null);
   wp_enqueue_style('esw_flex', get_template_directory_uri() . '/assets/css/flexslider.css', false, null);
    wp_enqueue_style('esw_pretty', get_template_directory_uri() . '/assets/css/prettyPhoto.css', false, null);
   wp_enqueue_style('esw_comp', get_template_directory_uri() . '/assets/css/component.css', false, null);
  wp_enqueue_style('esw_app', get_template_directory_uri() . '/assets/css/all.css', false, null);
   wp_enqueue_style('esw_jw', get_template_directory_uri() . '/assets/css/jw.css', false, null);

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, null, false);
    add_filter('script_loader_src', 'esw_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  
  
	wp_register_script('esw_jquery', get_template_directory_uri() . '/assets/js/lib/jquery.js', false, null, false);
	wp_register_script('jquery-ui', 'http://code.jquery.com/ui/1.10.3/jquery-ui.js', false, null, false);
	wp_register_script('esw_plugins', get_template_directory_uri() . '/assets/js/plugins.js', false, null, true);
	wp_register_script('prettyphoto', get_template_directory_uri() . '/assets/js/plugins/jquery.prettyPhoto.js', false, null, true);
	wp_register_script('esw_main', get_template_directory_uri() . '/assets/js/main.js', false, null, true);
	wp_register_script('esw_timer', get_template_directory_uri() . '/assets/js/cart-timer.js', false, null, true);
	wp_register_script('froogaloop2', get_template_directory_uri() . '/assets/js/froogaloop2.min.js', false, null, true);
	
	wp_register_script('esw_easing', get_template_directory_uri() . '/assets/js/lib/jquery.easing.js', false, null, true);
	wp_register_script('esw_mousewheel', get_template_directory_uri() . '/assets/js/lib/jquery.mousewheel.js', false, null, true);
	wp_register_script('dropdownLayer', get_template_directory_uri() . '/assets/js/dropdownLayer.min.js', false, null, true);
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui');
	wp_enqueue_script('esw_plugins');
	wp_enqueue_script('prettyphoto');
	wp_enqueue_script('esw_main');
	wp_enqueue_script('esw_timer');
    wp_enqueue_script('froogaloop2');
	wp_enqueue_script('esw_easing');
	wp_enqueue_script('esw_mousewheel');
	wp_enqueue_script('dropdownLayer');
}
add_action('wp_enqueue_scripts', 'esw_scripts', 100);


// http://wordpress.stackexchange.com/a/12450
function esw_jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/lib/jquery.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}

/*function esw_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>
<?php }
if (GOOGLE_ANALYTICS_ID) {
  add_action('wp_footer', 'esw_google_analytics', 20);
}*/

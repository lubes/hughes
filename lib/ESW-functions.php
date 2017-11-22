<?php

/*-----------------------------------------------------------------------------------*/
/* ESW Functions -  Table of Contents
/* 1. Custom Walker for Header Nav
/* 2. Custom Walker for Footer Nav
/* 3. CSS Stylesheets & JS includes
/* 4. Excerpt Limiter
/* 5. Add Featured Image
/* 6. TimThumb - Get the First Image 
/* 7. Specifies the # of characters in except & content
/* 8. Add excerpt field to all pages
/* 9. //Remove all wp menu items if declared!! 
/* 10. //Will Add Custom Content Fields If Additional Fields are needed on Page
/* 11. Custom Meta Boxes
/* 12. Post Paginate
/* 13. Custom Post type pagination (controls number of custom posts)
/* 14. Hacking into the search for so we can use our own html & css
/* 15. conditional function for checking whether a post belongs to a taxonomy term
/* 16. Conditional is_tax to check if its the term or any of his children */
/*-----------------------------------------------------------------------------------*/




//NEW CUSTOM META

function add_image_attachment_fields_to_edit( $form_fields, $post ) {
	//$form_fields['image_url'] = $image_url_field;
	$staffPx = (bool) get_post_meta($post->ID, '_staffPx', true);
    $checked = ($staffPx) ? 'checked' : '';
    $form_fields['staffPx'] = array(
        'label' => 'Staff Pick',
        'input' => 'html',
        'html' => "<input type='checkbox' {$checked} name='attachments[{$post->ID}][staffPx]' id='attachments[{$post->ID}][islogo]' />",
        'value' => $staffPx,
        'helps' => 'Check for yes, leave empty for no'
    );
	return $form_fields;
}
add_filter("attachment_fields_to_edit", "add_image_attachment_fields_to_edit", null, 2);


/**
 * Save custom media metadata fields
 *
 * Be sure to validate your data before saving it
 * http://codex.wordpress.org/Data_Validation
 */
function add_image_attachment_fields_to_save( $post, $attachment ) {
	$staffPx = ($attachment['staffPx'] == 'on') ? '1' : '0';
    update_post_meta($post['ID'], '_staffPx', $staffPx);  
    return $post;  
}
add_filter("attachment_fields_to_save", "add_image_attachment_fields_to_save", null , 2);

/*-----------------------------------------------------------------------------------*/
/* 1. // Custom Walker Menu Stripped of All Default UL LI (Header)
/*-----------------------------------------------------------------------------------*/
class themeslug_walker_nav_menu extends Walker_Nav_Menu {
  
// add classes to ul sub-menus
function start_lvl( &$output, $depth ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
        'sub-navigation menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}
  
// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth, $args ) {
    global $wp_query;
$menu_space = preg_replace('/\s*/', '', $item->title);
$menu_title = strtolower($menu_space);
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item '.$menu_title.'_menu' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
  
    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
  
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
  
    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}

/*-----------------------------------------------------------------------------------*/
/* 2. // Custom Walker Menu Stripped of All Default UL LI (Footer)
/*-----------------------------------------------------------------------------------*/

class themeslug_walker_footer_menu extends Walker_Nav_Menu {
  
// add classes to ul sub-menus
function start_lvl( &$output, $depth ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
        'sub-navigation menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}
  
// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth, $args ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item span2' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
  
    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
  
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
  
    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}


/*-----------------------------------------------------------------------------------*/
/* 3. // CSS & JS Includes
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/* 4. // Excerpt Limiter
/*-----------------------------------------------------------------------------------*/

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

/*-----------------------------------------------------------------------------------*/
/* 5. // Add Featured Image
/*-----------------------------------------------------------------------------------*/

/*
add_theme_support( 'post-thumbnails' );

function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo $thumbnail_image[0]->post_excerpt;
  }
}
*/


/*-----------------------------------------------------------------------------------*/
/* 6. // TimThumb - Get the First Image 
/*-----------------------------------------------------------------------------------*/


function catch_that_image_post() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];

// no image found display default image instead

 if ($first_img) {
	$first_img = str_replace('https://www.hughesestatesales.com/', '', $first_img);
	return $first_img;
} 
}
// Get URL of first image in a post
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];

// no image found display default image instead

 if (has_post_thumbnail( $post->ID ) ) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	return $image[0];
 } else if($first_img) {
	$first_img = str_replace('https://www.hughesestatesales.com/', '', $first_img);
	return $first_img;
} else {
	$first_img = "/wp-content/themes/Hughes/scripts/preview.jpg"; 
	return $first_img;
}
}


/*-----------------------------------------------------------------------------------*/
/* 7. // Specifies the # of characters by using echo content() & echo excerpt(). Add # inside parentheses
/*-----------------------------------------------------------------------------------*/




function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`_[[^_]]*_]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/ _[.+ _]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


/*-----------------------------------------------------------------------------------*/
/* 8. //will add excerpt field to all pages, not just posts
/*-----------------------------------------------------------------------------------*/

add_post_type_support( 'page', 'excerpt' );


/*-----------------------------------------------------------------------------------*/
/* 9. //Remove all wp menu items if declared!!  Keeping this commented out until dev completion
/*-----------------------------------------------------------------------------------*/
/*function remove_menus () {
global $menu;
	$restricted = array(__('ESW'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');*/



/*-----------------------------------------------------------------------------------*/
/* 10. //Will Add Custom Content Fields If Additional Fields are needed on Page 
/*-----------------------------------------------------------------------------------*/

/*

include("preset-library.php");

$meta_box['page'] = array(
    'id' => 'Custom fields',  
    'title' => 'Custom fields',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
					
		array(
            'name' => 'Title',
            'desc' => 'Enter Title of Page. Note: This field is for the page "Why we are different"',
            'id' => 'title',
            'type' => 'text',
            'default' => ''
        ),
     
		array(
            'name' => 'Address',
            'desc' => 'Add current address',
            'id' => 'address',
            'type' => 'textarea',
            'default' => ''
        ),
		array(
            'name' => 'Phone',
            'desc' => 'Business Numbers',
            'id' => 'number',
            'type' => 'textarea',
            'default' => ''
        ),
		array(
            'name' => 'video/mp4',
            'desc' => 'mp4 video',
            'id' => 'mp4',
            'type' => 'text',
            'default' => ''
        ),
		array(
            'name' => 'video/ogv',
            'desc' => 'ogv video',
            'id' => 'ogv',
            'type' => 'text',
            'default' => ''
        )
		
    )
);

add_action('admin_menu', 'plib_add_box');
*/


/*-----------------------------------------------------------------------------------*/
/* 11. Add Custom Meta Boxes
/*-----------------------------------------------------------------------------------*/
// Re-define meta box path and URL
/*
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box-master' ) );
define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/meta-box-master' ) );

// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';

// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
include 'demo.php';

*/
/*-----------------------------------------------------------------------------------*/
/* 11. //Post pagination 
/*-----------------------------------------------------------------------------------*/




function paginate() {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	
	$pagination = array(
		'base' => @add_query_arg('page','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => true,
		'type' => 'list',
		'next_text' => '&raquo;',
		'prev_text' => '&laquo;'
		);
	
	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
	
	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
	
	echo paginate_links( $pagination );
}





/*-----------------------------------------------------------------------------------*/
/* 12. //Custom Category Output
/*-----------------------------------------------------------------------------------*/

class Walker_Category_Parents extends Walker_Category {
  
    function start_el(&$output, $category, $depth, $args) {
        global $wpdb;
        extract($args);
  
        $cat_name = esc_attr( $category->name );
        $cat_name = apply_filters( 'list_cats', $cat_name, $category );
        $link = '<a class="btn" href="' . esc_attr( get_term_link($category) ) . '" ';
        $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
        $link .= 'rel="'.$category->slug.'" ';
        $link .= '>';
        $link .= $cat_name . '</a>';
        if ( 'list' == $args['style'] ) {
            $output .= "\t<li";
             
            $children = $wpdb->get_results( "SELECT term_id FROM $wpdb->term_taxonomy WHERE parent=".$category->term_id );
             
            $children_count = count($children);
             
            $has_children = ($children_count != 0) ? ' parent-category' : '';
             
            $class = 'cat-item cat-item-' . $category->term_id . $has_children;
            if ( !empty($current_category) ) {
                $_current_category = get_term( $current_category, $category->taxonomy );
                if ( $category->term_id == $current_category )
                    $class .=  ' current-cat';
                elseif ( $category->term_id == $_current_category->parent )
                    $class .=  ' current-cat-parent';
            }
            $output .=  ' class="' . $class . '"';
            $output .= ">$link\n";
        } else {
            $output .= "\t$link\n";
        }
    }
}

/*-----------------------------------------------------------------------------------*/
/* 13. Custom Post type pagination*/
/*-----------------------------------------------------------------------------------*/


/*function product_posts_per_page( $query ) {  
    if ( $query->query_vars['post_type'] == 'product' ) $query->query_vars['posts_per_page'] = 1;  
    return $query;  
}  
if ( !is_admin() ) add_filter( 'pre_get_posts', 'product_posts_per_page' ); 
*/

/*-----------------------------------------------------------------------------------*/
/* 14. Hacking into the search form so we can use our own html & css*/
/*-----------------------------------------------------------------------------------*/

function my_search_form( $form ) {

    $form = '<form id="searchform" class="form-search" method="get" action="' . home_url( '/' ) . '" >
    
   
     <input type="text" class="field" name="s" value="' . get_search_query() . '" name="s" id="s" placeholder="Search">
	
	<input type="submit" class="searchsubmit" name="submit" value="'. esc_attr__('') .'" />
   	</form>';
	return $form;
}

add_filter( 'get_search_form', 'my_search_form' );


/*-----------------------------------------------------------------------------------*/
/* 15. conditional function for checking whether a post belongs to a taxonomy term */
/*-----------------------------------------------------------------------------------*/


/**
* Conditional function to check if post belongs to term in a custom taxonomy.
*
* @param    tax        string                taxonomy to which the term belons
* @param    term    int|string|array    attributes of shortcode
* @param    _post    int                    post id to be checked
* @return             BOOL                True if term is matched, false otherwise
*/
function pa_in_taxonomy($tax, $term, $_post = NULL) {
// if neither tax nor term are specified, return false
if ( !$tax || !$term ) { return FALSE; }
// if post parameter is given, get it, otherwise use $GLOBALS to get post
if ( $_post ) {
$_post = get_post( $_post );
} else {
$_post =& $GLOBALS['post'];
}
// if no post return false
if ( !$_post ) { return FALSE; }
// check whether post matches term belongin to tax
$return = is_object_in_term( $_post->ID, $tax, $term );
// if error returned, then return false
if ( is_wp_error( $return ) ) { return FALSE; }
return $return;
}

/*-----------------------------------------------------------------------------------*/
/* 16. Conditional is_tax to check if its the term or any of his children */
/*-----------------------------------------------------------------------------------*/

function is_or_descendant_tax( $terms,$taxonomy){
    if (is_tax($taxonomy, $terms)){
            return true;
    }
    foreach ( (array) $terms as $term ) {
        // get_term_children() accepts integer ID only
        $descendants = get_term_children( (int) $term, $taxonomy);
        if ( $descendants && is_tax($taxonomy, $descendants) )
            return true;
    }
    return false;
}


/*function my_post_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    // alter the query for the home and category pages 

    if(is_home()){
      $query->set('posts_per_page', 4);
    }

    if(is_category()){
      $query->set('posts_per_page', 4);
    }

  }
}
add_action( 'pre_get_posts', 'my_post_queries' );

 */

/*-----------------------------------------------------------------------------------*/
/* 18. Conditional is_tax to check if its the term or any of his children */
/*-----------------------------------------------------------------------------------*/


function my_get_the_term_list( $id = 0, $taxonomy, $before = '', $sep = '', $after = '', $exclude = array() ) {
	$terms = get_the_terms( $id, $taxonomy );

	if ( is_wp_error( $terms ) )
		return $terms;

	if ( empty( $terms ) )
		return false;

	foreach ( $terms as $term ) {

		if(!in_array($term->term_id,$exclude)) {
			$link = get_term_link( $term, $taxonomy );
			if ( is_wp_error( $link ) )
				return $link;
			$term_links[] = '' . $term->name . '';
		}
	}

	$term_links = apply_filters( "term_links-$taxonomy", $term_links );

	return $before . join( $sep, $term_links ) . $after;
}


//remove Wordpress toolbar
/*
function hide_admin_bar_from_front_end(){
  if (is_blog_admin()) {
    return true;
  }
  return false;
}
add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );

*/

/*-----------------------------------------------------------------------------------*/
/*  CPT
/*-----------------------------------------------------------------------------------*/



require_once locate_template('lib/slider-cpt.php');
require_once locate_template('lib/sell-archive-cpt.php');
require_once locate_template('lib/testimonials-cpt.php');



/*-----------------------------------------------------------------------------------*/
/*  Displays pages by slug
/*-----------------------------------------------------------------------------------*/


function displaypage($pageID, $pagesection){
	$my_query = new WP_Query("pagename=$pageID");
    while ($my_query->have_posts()) : $my_query->the_post();
	switch ($pagesection){
	   case "consign":
	   ?><div class="thumbnail">
        <figure class="product-img"><?php $cti = catch_that_image(); 
if(isset($cti)){ ?>
           <img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $cti; ?>&w=610&h=265zc=0" alt="<?php the_title(); ?>"/> 
             <?php } else { ?>
            <a href="<?php the_permalink() ?>" rel="bookmark"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/news-article-img.jpg" width="610" height="265" alt="News Article Image" /></a>
         <?php   
            }
		?>
</figure><div class="product-desc">
	 	<?php the_content(); ?>
        <span><a href="/consignment-store-sales-form" class="btn btn-grn">Start Now</a></span></div> </div> <?php 
	  break;
	  case "consign-contact":
	   ?><section class="sell-with-hughes"> <?php $cti = catch_that_image(); 
if(isset($cti)){ ?>
            <img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $cti; ?>&w=610&h=265zc=0" alt="<?php the_title(); ?>"/><?php } else { ?>
             <img src="<?php echo get_template_directory_uri(); ?>/assets/img/news-article-img.jpg" width="610" height="265" alt="News Article Image" />
         <?php   
            }
			?>
<span><?php the_content();?>
        <a href="/consignment-store-sales-form" class="btn btn-grn">Get Started</a>
          </span>
         </section>
	   <?php 
	  break;
	  case "faq-info":
	   ?><span><?php the_content(); ?></span>
        <?php 
	  break;
		}
	
edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' );

endwhile; 
}


/*-----------------------------------------------------------------------------------*/
/* change main loop count */
/*-----------------------------------------------------------------------------------*/

// Display 16 products per page. Goes in functions.php
//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 16;' ), 20 );



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',40);


/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'yourtheme_woocommerce_image_dimensions', 1 );
 
/**
 * Define image sizes
 */
function yourtheme_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '400',	// px
		'height'	=> '400',	// px
		'crop'		=> 1 		// true
	);
 
	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
 
	$thumbnail = array(
		'width' 	=> '120',	// px
		'height'	=> '120',	// px
		'crop'		=> 0 		// false
	);
 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}


/*-----------------------------------------------------------------------------------*/
/* Checkout Form Billing */
/*-----------------------------------------------------------------------------------*/


$address_fields = apply_filters('woocommerce_billing_fields', $address_fields);


// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    
	$fields['billing']['billing_first_name'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('First Name', 'placeholder', 'woocommerce') );
	 $fields['billing']['billing_last_name'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('Last Name', 'placeholder', 'woocommerce')  );
	  $fields['billing']['billing_company'] = array(
     'label'     => false,
	 'placeholder' => _x('Company Name', 'placeholder', 'woocommerce')
	 
	  );
	  $fields['billing']['billing_address_1'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('Address', 'placeholder', 'woocommerce')  );
	 
	 
	  $fields['billing']['billing_address_2'] = array(
     'label'     => false, 'required'  => false, 'placeholder' => _x('Unit (optional)', 'placeholder', 'woocommerce')  );
	 
	  $fields['billing']['billing_city'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('City', 'placeholder', 'woocommerce')  );
	
	 $fields['billing']['billing_postcode'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('Zip Code', 'placeholder', 'woocommerce')  );
	 
	 $fields['billing']['billing_email'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('Email', 'placeholder', 'woocommerce') );
	
	 $fields['billing']['billing_phone'] = array(
     'label'     => false, 'placeholder' => _x('Phone', 'placeholder', 'woocommerce'));
	 
	

 	
	 
	 //SHIPPING FIELDS
	 
	 $fields['shipping']['shipping_first_name'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('First Name', 'placeholder', 'woocommerce')  );
	 $fields['shipping']['shipping_last_name'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('Last Name', 'placeholder', 'woocommerce')   );
	  $fields['shipping']['shipping_company'] = array(
     'label'     => false,
	 'placeholder' => _x('Company Name', 'placeholder', 'woocommerce'));
	  $fields['shipping']['shipping_address_1'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('Address', 'placeholder', 'woocommerce')   );
	 
	  $fields['shipping']['shipping_address_2'] = array(
     'label'     => false, 'required'  => false, 'placeholder' => _x('Unit (optional)', 'placeholder', 'woocommerce')   );
	 
	  $fields['shipping']['shipping_city'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('City', 'placeholder', 'woocommerce')   );
	
	 $fields['shipping']['shipping_postcode'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('Zip Code', 'placeholder', 'woocommerce')   );
	 
	 $fields['shipping']['shipping_email'] = array(
     'label'     => false, 'required'  => true, 'placeholder' => _x('Email', 'placeholder', 'woocommerce')  );
	
	 $fields['shipping']['shipping_phone'] = array(
     'label'     => false, 'placeholder' => _x('Phone', 'placeholder', 'woocommerce'));
	 
	 
	
 	
	 return $fields;
}






/*add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
function add_loginout_link( $items, $args ) {
	if (is_user_logged_in() && $args->menu == 'main menu') {
			$items .= '<li style="position:fixed; top:10px; right:10px;"><a href="'. wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ) .'">Log Out</a></li>';
	}
	elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
			$items .= '<li><a href="' . get_permalink( woocommerce_get_page_id( 'myaccount' ) ) . '">Log In</a></li>';
	}
	return $items;
}*/






//[div class="span"]
function col_func( $atts ){
	return '<div class="span6">';
}
add_shortcode( 'col', 'col_func' );


//[/]
function col_close_func( $atts ){
	return '</div>';
}
add_shortcode( 'end_col', 'col_close_func' );


/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/


	add_action( 'admin_menu', 'my_remove_menu_pages' );

	function my_remove_menu_pages() {
		remove_menu_page('admin.php?page=woothemes');
		remove_menu_page('edit.php?post_type=promotion');
		remove_menu_page('edit.php?post_type=infobox');	
	}
	




//Add infinite scroll
function tweakjp_custom_is_support() {
	$supported = current_theme_supports( 'infinite-scroll' ) && ( is_page('sell') || is_archive() );

	return $supported;
}
add_filter( 'infinite_scroll_archive_supported', 'tweakjp_custom_is_support' );


/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or things will fall apart*/
/*-----------------------------------------------------------------------------------*/
?>
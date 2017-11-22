<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;




// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );


if (get_post_meta($post->ID, '_regular_sale', true)) {
       $RegSale = 'Sale';
 }
	


// Ensure visibility
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;



// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = '';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = '';
$classes[] .= ' span3';
?>
<li id="post-<?php the_ID(); ?>" <?php post_class('span3 post'); ?>>
   <div class="thumbnail <?php  if (get_post_meta($post->ID, '_regular_sale', true)) {
          echo  'reg-sale';
		  } else { 
		  echo ' '; }  ?>"> 
<figure class="product-img">  <?php $cti = catch_that_image(); 
if(isset($cti)){ ?>
           <a href="<?php the_permalink() ?>" rel="bookmark"> <img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $cti; ?>&w=590&h=390zc=0" alt="<?php the_title(); ?>"/> </a>
            
             <?php } else { ?>
            <a href="<?php the_permalink() ?>" rel="bookmark"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/news-article-img.jpg" width="295" height="195" alt="News Article Image" /></a>
         <?php   
            }

?>

<div class="sale">
                  <div class="sale-details">
                    <p><?php do_action( 'woocommerce_before_shop_loop_item' ); ?></p>
                 <?php
                 	/** do_action( 'woocommerce_after_shop_loop_item' );
					*/?>
                    <a href="<?php the_permalink(); ?>" class="add_to_cart_button btn btn-grn product_type_simple">Buy It</a>
                  </div>
                </div>


<div class="box mobl-time"><i class="icon-time"></i>
                  <div class="non-active"><?php do_action( 'woocommerce_before_shop_loop_item' ); ?></div>
                </div>
</figure>

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			//do_action( 'woocommerce_before_shop_loop_item_title' );
		?>


<div class="product-desc">
                
            


		<h2><a href="<?php echo get_permalink($product->id); ?>"><?php the_title(); ?></a></h2>
        
       <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,15) . "... \r\n"; ?></p>
 	
      </div>
      <?php /** include ('loop/add-to-cart-mobile.php'); */?>
      
      
      <a href="<?php the_permalink(); ?>" class="add_to_cart_button btn btn-grn btn-mobl product_type_simple">Buy It</a>
      
      
 <?php if ( $price_html = $product->get_price_html() ) : ?>
	<span class="price grn-link">
   <?php
    if ($product->sale_price) :
					$price .= '<del><span class="amount">'.woocommerce_price( $product->regular_price ).'</span></del>  <ins><span class="sale-price amount"> '.$RegSale.' '.woocommerce_price( $product->sale_price ).'</span></ins>';
					$price = apply_filters('woocommerce_sale_price_html', $price, $this);
				else :
					$price .= '<span class="amount">' .woocommerce_price( $product->price ).'</span>';
					$price = apply_filters('woocommerce_price_html', $price, $this);
				endif;
echo $price;

?>
     
	
	
	<?php if ( ! $product->is_in_stock() ) : ?>

 <a href="<?php echo apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ); ?>" class="sold-item"><?php echo apply_filters( 'out_of_stock_add_to_cart_text', __( 'Sold', 'woocommerce' ) ); ?></a> 
 
 <?php else : ?>
 
 <?php echo '';
 
 endif; ?>
 
 </span>
<?php endif; ?>

		
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 
			do_action( 'woocommerce_after_shop_loop_item_title' );*/
		?>

<?php edit_post_link('edit', '<p style="position:absolute; bottom:0; right:10px;">', '</p>'); ?>
	
</div>
</li>
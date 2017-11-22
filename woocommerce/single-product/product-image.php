<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;

?>
<div id="left-col" class="images">
<?php 
	/* if (has_post_thumbnail( ) ) {
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
		$caption = $attachment->post_excerpt;
		if($image_content = get_post(get_post_thumbnail_id())->post_content != ""){
			$image_content = get_post(get_post_thumbnail_id())->post_content; 
		} else  {
			$image_content = get_the_excerpt(); echo string_limit_words($excerpt,50) . " \r\n";
		}
		if($image_caption = get_post(get_post_thumbnail_id())->post_excerpt != ""){
			$image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
		} else {
			$image_caption = the_title_attribute('echo=0');
		}
		echo '<a name="'. $image_content .'" rel="prettyPhoto[pp_gal]" class="swap open-view hello"  href="' . $large_image_url[0] . '" title="' . $image_caption . '" >';
?>
		<img id="lrg" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
<?php
		echo '<div class="view-overlay"><i class="view-icon"></i></div></a>';
	} */

	function wp_get_attachment( $attachment_id ) {		
		$attachment = get_post( $attachment_id );
		return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title,
	);
}

$args = get_posts('numberposts=2&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids&meta_key=_woocommerce_exclude_image&meta_value=0' );
$attachment_ids = $product->get_gallery_attachment_ids($args);

if ( $attachment_ids ) {
	$loop = 0;
	$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	foreach ( $attachment_ids as $attachment_id ) {
		$classes = array( 'zoom small-thumb exchange open-view' );
		if ( $loop == 0 || $loop % $columns == 0 )
			$classes[] = '';
			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = '';
				$image_link = wp_get_attachment_url( $attachment_id );
			if ( ! $image_link )
				continue;
				$imagestuff = wp_get_attachment($attachment_id);
				$image      = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
				$image_class = esc_attr( implode( ' ', $classes ) );
				$image_title = esc_attr( get_the_title( $attachment_id ) );
				// NEW DESCRIPTION
 				if($imagestuff['description'] != ""){
					$image_excerpt = $imagestuff['description'];
				} else {
					$image_excerpt = get_the_excerpt(); echo string_limit_words($excerpt,50) . " \r\n";
				}//END
				if($imagestuff['caption'] != ""){
					$imagecaption = $imagestuff['caption'];
				} else {
					$imagecaption = the_title_attribute('echo=0');
				}	
			if($loop == 0){
					echo '<a name="'. $image_excerpt .'" rel="prettyPhoto[pp_gal]" class="swap open-view hello"  href="'.$image_link.'" title="' . $imagecaption . '">';
					echo  '<img id="lrg" src="'.$image_link.'" alt="'.$image_title.'" />';
					echo '<div class="view-overlay"><i class="view-icon"></i></div></a>';
			} else {
			
			
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a rel="prettyPhoto[pp_gal]" href="%s" name="' . $image_excerpt . ' " class="%s" title="'.$imagecaption.'" style="display:none"><img src="'.$image_link.'"><div class="view-overlay"><i class="view-icon"></i></div></a>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );
			}
			$loop++;
		}

}
?>
</div>
<!--//left-col--> 
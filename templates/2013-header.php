<?php global $woo_options;
 global $woocommerce;
 ?>

<div id="main-nav" class="navbar navbar-static-top">
  <div class="navbar-inner ease">
    <div class="container"> <a class="brand sm-brand" href="/">Hughes Estate Sales</a>
      <div id="add-to-cart" class="pull-right mobile-hide">
        <?php if( is_woocommerce_activated() ) { ?>
        <?php if (sizeof($woocommerce->cart->cart_contents)>0) :
		            echo ' <ul class="mini-cart active-cart">';
         					
					else :
		               echo '<ul class="mini-cart">';
         					 
		            endif;
						  ?>
        <li> <a onclick="javascript:location.href='https://www.hughesestatesales.com/cart/'" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>" class="cart-parent"> <span>
          <?php
				
				echo sprintf(_n('<mark>%d </mark>', '<mark>%d</mark>', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);
				?>
          </span> </a>
          <?php

		        echo '<ul class="cart_list active">';
		          echo '<span class="arrow">arrow</span>';
		           if (sizeof($woocommerce->cart->cart_contents)>0) : 
				   echo '<div class="cart-header">';
				   echo sprintf(_n('<h4>You have %d item in your cart.</h4><div class="count-down"><i class="count"></i><span></span></div>', '<h4>You have %d items in your cart. </h4><div class="count-down"><i class="count"></i><span></span></div>', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);
				   echo '</div>';
				   foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
			           $_product = $cart_item['data'];
			           if ($_product->exists() && $cart_item['quantity']>0) :
			              
						   echo '<li class="cart_list_product"><a href="'.get_permalink($cart_item['product_id']).'">';
							
			               echo '<figure class="crop-img">'.$_product->get_image(). '</figure>';
							echo '<h3>';
			               echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product).'</h3></a>';

			               if($_product instanceof woocommerce_product_variation && is_array($cart_item['variation'])) :
			                   echo woocommerce_get_formatted_variation( $cart_item['variation'] );
			                 endif;

			               echo '<span class="price">'.woocommerce_price($_product->get_price()).'</span></li>';
			           endif;
			       endforeach;

		        	else: 
					
					echo '<li class="cart-title">'.__('<h3>There are no items in your cart.</h3>','woothemes').'</li>';
					
					echo '<li class="empty">'.__('Reminder: Items you place in your cart<br>
                are reserved for 20 minutes','woothemes').'</li>'; 
					echo '<li><input type="button" value="Shop Now &raquo;" onclick="newDoc()" class="grn-link"></li>';
				
					endif;
		        	if (sizeof($woocommerce->cart->cart_contents)>0) :
		            echo '<ul class="inline">';
					echo '<li class="total"><strong>';
					
					

		            if (get_option('js_prices_include_tax')=='yes') :
		                _e('Total', 'woothemes');
		            else :
		                _e('Subtotal', 'woothemes');
		            endif;



		            echo ':</strong>'.$woocommerce->cart->get_cart_total();' ';

		            echo '<span class="pull-right"><a onclick="javascript:location.href=\'https://www.hughesestatesales.com/cart/\'" href="'.$woocommerce->cart->get_cart_url().'" class="btn checkout-button checkout">'.__('View Cart','woothemes').'</a></span></li>';
					echo '</ul>';
		        endif;

		        echo '</ul>';

		    ?>
        </li>
        </ul>
      </div>
      <?php } ?>
      <button type="button" id="mobile-menu" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><i class="icon-reorder"></i> </button>
      <div class="nav-collapse collapse nav-container menu">
        <div class="nav-wrap pull-left collapse-inner">
          <li class="cart-item mobile-show">
            <div id="add-to-cart">
              <ul class="mini-cart">
                <li> <a href="#" title="View your shopping cart" class="cart-parent" data-toggle="dropdown"> <span style="display:none;">
                  <mark>0</mark>
                  </span> </a> </li>
              </ul>
            </div>
          </li>
          <?php wp_nav_menu( array(
    'container'     => false,
    'menu_class'        => 'nav',
	'menu' => 'main menu',
    'echo'          => true,
    'walker'        => new themeslug_walker_nav_menu
) );  ?>
        </div>
        <div class="form-wrap desktop"> <?php echo get_search_form(); ?> </div>
        
        <!-- /#navigation --> 
      </div>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>
<div id="main">

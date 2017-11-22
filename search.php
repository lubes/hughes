<?php
/**
 * Search Template
 *
 * The search template is used to display search results from the native WordPress search.
 *
 * If no search results are found, the user is assisted in refining their search query in
 * an attempt to produce an appropriate search results set for the user's search query.
 *
 * @package WooFramework
 * @subpackage Template
 */

get_template_part('templates/head');  ?>

<body <?php body_class('blog'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<header class="blog-title">
  <div class="container">
    <h1><a href="#"><?php echo __( 'Search Results:', 'woothemes' ) . ' '; the_search_query(); ?></a></h1>
  </div>
</header>
<section class="wrapper feature-product mobl">
    
         
         
       
         
         <div class="container" id="blog-container"> 
  
    

    
   
    
    <div class="thumbnails" id="post-container">   

		<?php if ( have_posts() ) { $count = 0; ?>
            
           
                
            <?php while ( have_posts() ) { the_post(); $count++; ?>
                                                                        
            <article class="span3 post-item" id="post-<?php the_ID(); ?>">
        <div class="thumbnail"> <a href="<?php echo get_permalink(); ?>">
          <figure class="post-img">
            <?php if ( has_post_thumbnail() ) {
	the_post_thumbnail('full');
} ?>
            <div class="active">
              <div class="details">
                <p>View Post</p>
              </div>
            </div>
          </figure>
          <div class="desc">
            <h2>
              <?php the_title();?>
            </h2>
            <p>
              <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,20) . "... \r\n"; ?>
            </p>
            <time class="date" datetime="<?php the_time('M j, Y') ?>">
              <?php the_time('M j, Y') ?>
            </time>
          </div>
          </a>
          <div class="term">
            <?php foreach((get_the_category()) as $category) { $category->cat_name . ' '; } ?>
            <a href="<?php echo get_category_link(get_cat_id($category->cat_name)); ?>"><?php echo $category->cat_name ?></a> </div>
        </div>
      </article>
      <!--//span3-->
                                                    
            <?php
            		} // End WHILE Loop
            	} else {
            ?>
            
            <article <?php post_class(); ?>>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
            
            <?php } // End IF Statement ?>
			
       </div>
    <!--//post-container--> 
   
    
  </div>
  <!-- /container --> 
   <?php woo_pagenav(); ?>
</section>
<?php get_footer(); ?>
<script src="http://isotope.metafizzy.co/jquery.isotope.min.js"></script> 
<script>
 $(function(){
      
      var $container = $('#post-container');
      
      $container.isotope({
        itemSelector: '.post-item'
      });
      
    });
 
 
 
    $container = $('#post-container');
	
$(window).load(function() {
      
    var $container = $('#post-container'),    
    	aniOpts = {      
    		queue: false,      
    		duration: 800    
    	},    
    		reflowImages = function (){    	
    		$container.isotope({  		  
    			columnWidth: $container.find('.post-item').outerWidth(true)      
    		});    
    	};
	
	//$container.isotope( 'shuffle' );
    
   
    
    
    $(window).resize(function(){
  		reflowImages();
  		
		//$container.isotope( 'insert', $('#image-list li.owl') );
		
  		
	});
    
    
  
    
    
});


	

  </script>
</div>
<!--//main--> 
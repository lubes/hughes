<?php
/**
 *
 */


get_template_part('templates/head');  ?>

<body <?php body_class('blog'); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php get_template_part('templates/header');  ?>
<header class="blog-title">
  <div class="container">
    <h1><a href="/blog">The Hughes Blog</a></h1>
  </div>
</header>
<div class="wrapper mobl">
  <div class="container">
    <div class="row-fluid">
      <div class="span12 line blog-header">
      
      <header class="spot-light wrap mobile-show">
          <?php foreach((get_the_category()) as $category) { $category->cat_name . ' '; } ?>
           <h2><?php echo $category->cat_name ?></h2>


        </header>
      
      
      
      
      
      <?php
//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$taxonomy     = 'category';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
);
?>


<div class="dropdown sort-by pull-right mobile-show">
  <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    Sort by <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
  
  <?php wp_list_categories( $args ); ?>
  </ul>
</div>
      
      
      
        <div class="post-cat pull-left mobile-hide">
          <?php
	
	$cat_arguments = array(
	  'orderby' => 'name',
  'child_of'                 => 0,
  'orderby'                  => 'name',
  'exclude'                  => '1'
	  );
	   echo '<ul>';
  echo '<li class="current-cat"><a href="/estate-liquidation-blog-and-sale-tips">Everything</a><span>/</span></li>';
	$cats = get_categories($cat_arguments);
	$i = 0;
	foreach($cats as $category) {
		if($cat != $category->term_id) { echo '<li class=""><a href="'.get_category_link( $category->term_id ).'">'.$category->name.'</a>'; }
		else { echo '<li class="current-cat"><a href="'.get_category_link( $category->term_id ).'">'.$category->name.'</a>'; }
		$i++;
		if ($i < count($cats)) {
			echo '<span class="divider">/</span></li>';
		}
	}
	echo '</ul>';

	?>
        </div>
        <div class="r-col pull-right mobile-hide">
        <div class="spot-light mobile-hide"> <a href="/blog"><i class="back-icon"></i></a> </div>
          <div class="pagination  pull-right">
            <div class="nav-previous"> <a class="icon-angle-left" href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"></a></div>
            <div class="nav-next"> <a class="icon-angle-right" href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"></a></div>
          </div>
          
          <!--//pagination--> 
        </div>
      </div>
    </div>
  </div>
  <section class="post-wrapper">
    <div class="container">
      <div class="row-fluid">
        <div class="span9">
          <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>
          <article <?php post_class(); ?>>
            <div class="post-content">
            <h1 class="post-title">
                <?php the_title(); ?>
              </h1>
              <figure class="post-img">
               
<?php $cti = catch_that_image_post(); if(isset($cti)){ ?>

<img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $cti; ?>&w=778&zc=1" alt="<?php the_title(); ?>" name="<?php the_title(); ?>"/>
<?php } else { ?>
<div class="noimage"></div>
<?php } ?>


                <div class="post-date">
                  <time class="date" datetime="<?php the_time('M j, Y') ?>">
                    <?php the_time('M j, Y') ?>
                  </time>
                </div>
              </figure>
              
             <?php
$content = get_the_content('Read more');
$content = preg_replace('/<img[^>]+./','', $content, 1); // Remove first image of Post
$content = apply_filters('the_content', $content);
echo $content;
?>
              <div class="post-meta">
              <div class="author pull-left"> Posted by
                <?php the_author() ?> / <?php foreach((get_the_category()) as $category) { $category->cat_name . ' '; } ?>
            <a href="<?php echo get_category_link(get_cat_id($category->cat_name)); ?>"><?php echo $category->cat_name ?></a>
               
              </div>
              <div class="social-media pull-right">
             <ul>
             <li>
            

<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
             </li> 
             
              <li style="width:70px;">
<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
                
           </li>
             
             
             <li class="last">
             <div class="fb-like" data-href="<?php the_permalink() ?>" data-width="100" data-layout="button_count" data-show-faces="false" data-send="false"></div></li>
            
           
           </ul>  
           
           
            </div>
            
            
            
            </div><!--post-meta-->
            <div class="facebook-comment-wrap">
            <h2>COMMENTS</h2>
            <div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="700"></div>
            </div>
              <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
              <?php the_tags( '<p class="tags">'.__( 'Tags: ', 'woothemes' ), ', ', '</p>' ); ?>
            </div>
            <!--/post-content--> 
          </article>
          <!-- .post -->
          
          <?php /*<nav id="post-entries" class="fix">
            <div class="nav-prev fl">
              <?php //previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?>
            </div>
            <div class="nav-next fr">
              <?php //next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?>
            </div>
          </nav>
          <!-- #post-entries -->
          
		  */ ?>
		  <?php
		  
		  
            	

				} // End WHILE Loop
			} else {
		?>
          <article <?php post_class(); ?>>
            <p>
              <?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?>
            </p>
          </article>
          <!-- .post -->
          <?php } ?>
        </div>
        <!--//span9-->
        
       <?php get_sidebar();?>
      </div>
      <!--//row--> 
      
    </div>
    <!--//container--> 
  </section>
</div>
<!-- //wrapper -->

<?php get_footer(); ?>

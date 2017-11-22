<?php
/**
 *
 */


get_template_part('templates/head');  ?>

<body <?php body_class('blog'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<header class="blog-title">
  <div class="container">
    <h1><a href="/blog">The Hughes Blog</a></h1>
  </div>
</header>
<section class="wrapper feature-product mobl">
  <div class="container">
    <div class="row-fluid">
      <div class="span12 line blog-header">
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
        <header class="spot-light wrap mobile-show">
          <h2>
            Everything
          </h2>
        </header>
       
        <div class="dropdown sort-by pull-right mobile-show"> <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html"> Sort by <span class="caret"></span> </a>
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
  echo '<li class="current-cat"><a href="/blog">Everything</a><span>/</span></li>';
	$cats = get_categories($cat_arguments);
	$i = 0;
	foreach($cats as $category) {
		if($cat != $category->term_id) { echo '<li><a href="'.get_category_link( $category->term_id ).'">'.$category->name.'</a>'; }
		else { echo '<li class="current-cat"><a href="'.get_category_link( $category->term_id ).'">'.$category->name.'</a>'; }
		$i++;
		if ($i < count($cats)) {
			echo '<span class="divider">/</span></li>';
		}
	}
	echo '</ul>';

	?>
        </div>
        <!--//post-cat--> 
        
      </div>
    </div>
  </div>
  <div class="container" id="blog-container"> 
    <!-- Example row of columns -->
    
    <div class="thumbnails" id="post-container">
      <?php 
// query to set the posts per page to 3
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 24, 'paged' => $paged );
query_posts($args); ?>
      <!-- the loop -->
      <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('span3 post-item type-product post'); ?>>
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
      <?php endwhile; ?>
      <?php endif;  ?>
    </div>
    <!--//post-container--> 
    
  </div>
  <!-- /container -->
  <?php woo_pagenav(); ?>
</section>
<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.isotope.min.js"></script> 
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.infinitescroll.min.js"></script> 

<script>
$(window).load(function () {
    var $container = $('#post-container');
    $container.isotope({
        itemSelector: '.post-item'
  
	});
	$container.infinitescroll({
            navSelector: '.woo-pagination', // selector for the paged navigation 
            nextSelector: '.woo-pagination a', // selector for the NEXT link (to page 2)
            itemSelector: '.post-item', // selector for all items you'll retrieve
            behavior: 'twitter',
            loading: {
                finishedMsg: 'No more pages to load.',
                img: 'http://i.imgur.com/qkKy8.gif'
            }
        },
        // call Isotope as a callback
        function (newElements) {
            $container.isotope('appended', $(newElements));
        }
    );
});

$container = $('#post-container');
 //.isotope('reLayout');
var $container = $('#post-container'),
    aniOpts = {
        queue: false,
        duration: 800
    },
    reflowImages = function () {
        $container.isotope({
            columnWidth: $container.find('.post-item').outerWidth(true)
        });
    };
	
//$container.isotope( 'shuffle' ); 
$(window).resize(function () {
    reflowImages();
    //$container.isotope( 'insert', $('#image-list li.owl') );
});


 $(window).scroll(function() {
        $container
          .isotope('reLayout');
        return false;
      });


</script>
</div>
<!--//main--> 


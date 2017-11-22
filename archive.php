<?php get_template_part('templates/head');  ?>

<body <?php body_class('blog'); ?>>
<!--[if lt IE 7]><div class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div><![endif]-->

<?php get_template_part('templates/header');  ?>
<header class="blog-title">
  <div class="container">
    <h1><a href="/blog/">The Hughes Blog</a></h1>
  </div>
</header>
<section class="wrapper feature-product mobl">
  <div class="container">
    <div class="row-fluid">
      <div class="span12 line blog-header">
        <header class="spot-light wrap mobile-show">
          <?php $term =	$wp_query->queried_object;
echo '<h2>'.$term->name.'</h2>';

?>
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
  'title_li'     => $title
);
?>
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
  echo '<li><a href="/estate-liquidation-blog-and-sale-tips">Everything</a><span>/</span></li>';
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
      </div>
    </div>
  </div>
  <?php if (have_posts()) : $count = 0; ?>
  <?php /*
            <?php if (is_category()) { ?>
        	<header class="archive_header">
        		<span class="fl cat"><?php _e( 'Archive', 'woothemes' ); ?> | <?php echo single_cat_title(); ?></span> 
        		<span class="fr catrss"><?php $cat_id = get_cat_ID( single_cat_title( '', false ) ); echo '<a href="' . get_category_feed_link( $cat_id, '' ) . '">' . __( "RSS feed for this section", "woothemes" ) . '</a>'; ?></span>
        	</header>        
        
            <?php } elseif (is_day()) { ?>
            <header class="archive_header"><?php _e( 'Archive', 'woothemes' ); ?> | <?php the_time( get_option( 'date_format' ) ); ?></header>

            <?php } elseif (is_month()) { ?>
            <header class="archive_header"><?php _e( 'Archive', 'woothemes' ); ?> | <?php the_time( 'F, Y' ); ?></header>

            <?php } elseif (is_year()) { ?>
            <header class="archive_header"><?php _e( 'Archive', 'woothemes' ); ?> | <?php the_time( 'Y' ); ?></header>

            <?php } elseif (is_author()) { ?>
            <header class="archive_header"><?php _e( 'Archive by Author', 'woothemes' ); ?></header>

            <?php } elseif (is_tag()) { ?>
            <header class="archive_header"><?php _e( 'Tag Archives:', 'woothemes' ); ?> <?php echo single_tag_title( '', true ); ?></header>
            
            <?php } ?>

        <?php
        	// Display the description for this archive, if it's available.
        	woo_archive_description();
      */  ?>
  <div class="container" id="blog-container"> 
    
    <!-- Example row of columns -->
    
    <div class="thumbnails" id="post-container">
      <?php while (have_posts()) : the_post(); $count++; ?>
      
      <!-- Post Starts -->
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
      <!-- /.post -->
      
      <?php endwhile; else: ?>
      <article <?php post_class(); ?>>
        <p>
          <?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?>
        </p>
      </article>
      <!-- /.post -->
      
      <?php endif; ?>
    </div>
    <!--//post-container--> 
    
  </div>
  <!-- /container --> 
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
</script>
</div>
<!--//main--> 


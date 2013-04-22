<?php get_header(); ?>

<div id="main" class="container-fluid" style="min-height: 706px;">
  <div class="row-fluid">
    <div class="container-center-float container-fluid">
      <div class="content-header"><h1 class="Blog">Blog</h1><p class="content-subtitle"></p>
        <div class="button-container"></div>
      </div>
      <div class="toolbar-container toolbar-2">
        <div class="bar-controls-dark toolbar undefined"></div>
      </div>
      <div class="article-container">
        <div class="blog-sidebar">
          <ul class="blog-nav">
            <?php
            function curPageURL() {
             $pageURL = 'http';
             if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
             $pageURL .= "://";
             if ($_SERVER["SERVER_PORT"] != "80") {
              $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
             } else {
              $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
             }
             return $pageURL;
            }
            ?>
            <?php $currentPage = basename(curPageURL()); ?>
            <li><a <?php echo ($currentPage == 'all') ? "class='active'" : ""; ?> href="/articles/all">All</a>
            </li>
            <li><a <?php echo ($currentPage == 'weight-loss') ? "class='active'" : ""; ?>href="/articles/weight-loss/">Weight Loss</a></li>
            </li>
            <li><a <?php echo ($currentPage == 'run') ? "class='active'" : ""; ?> href="/articles/running/">Run</a>
            </li>
            <li><a <?php echo ($currentPage == 'ride') ? "class='active'" : ""; ?> href="/articles/cycling/">Ride</a>
            </li>
            <li><a <?php echo ($currentPage == 'fitness') ? "class='active'" : ""; ?> href="/articles/fitness/">Fitness</a>
            </li>
            <li><a <?php echo ($currentPage == 'recipes') ? "class='active'" : ""; ?> href="/articles/recipes/">Recipes</a>
            </li>
          </ul>
        </div>
        <?php the_post(); ?>
        <?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>

        <?php rewind_posts(); ?>

        <div class="blog-main-content">
          <?php while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
              <div class="blog-9 blog-summary">
                <a href="<?php the_permalink(); ?>">
                  <?php just_custom_image($post->ID, 'featured_img'); ?>
                </a>
                <h4> <a href="<?php the_permalink(); ?>"><?php printf( __('%s', 'hbd-theme'), the_title_attribute('echo=0') ); ?></a></h4>
                <?php $type = get_post_meta($post->ID, 'type', true); ?>
                <?php if ( $type == "poster" ) { ?>
                  <p class="summary">
                    <a href="<?php the_permalink(); ?>" class="link-readMore">
                    </a>
                  </p>
                <?php } else { ?>
                  <p class="summary"><?php echo get_post_meta($post->ID, 'summary', true); ?>
                    <a href="<?php the_permalink(); ?>" class="link-readMore">Read More
                      <i class="dbl-arrow-blue"></i>
                    </a>
                  </p>
                  <div class="blog-details">
                    <?php $Date = get_post_meta($post->ID, 'date', true); ?>
                    <p class="date-light"><?php 
                        $longDate = DateTime::createFromFormat('Y-m-d', $Date);
                        echo $longDate->format('F d, Y'); ?></p>
                    <div class="clear"></div>
                  </div>

                <?php } ?>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>

        <?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
          <div id="nav-above" class="navigation">
            <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'hbd-theme' )) ?></div>
            <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'hbd-theme' )) ?></div>
          </div>
        <?php } ?>

          <div class="clear"></div>
        </div>
      </div>
    </div>

<?php get_footer(); ?>
<?php get_sidebar(); ?>
<?php get_header(); ?>
<?php $Date = get_post_meta($post->ID, 'date', true); ?>
<?php $Year = get_post_meta($post->ID, 'date', true); ?>
<?php $thisID = $post->ID; ?>

<div id="main" class="container-fluid" style="min-height: 706px;">
  <div class="row-fluid">
    <div class="container-center-float container-fluid">
      <div id="full-article-container">
        <?php just_custom_image($post->ID, 'featured_img'); ?>
        <?php if ($Date != null) { ?>
          <div class="date"> 
            <?php $MonthDay = DateTime::createFromFormat('Y-m-d', $Date);
            echo $MonthDay->format('F d, '); ?>
            <span class="year">
              <?php $Year = DateTime::createFromFormat('Y-m-d', $Date);
              echo $Year->format('Y'); ?></span>
            <?php } ?>
        </div>
        <div class="clear"> </div>
        <?php the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="article-body-container">
          <div class="article-body">

            <?php the_content(); ?>
            <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>
          </div>
          <?php $type = get_post_meta($post->ID, 'type', true); ?>
          <?php if ( $type == "poster" ) { ?>
          <?php } else { ?>
          <div class="related-items-container">
            <div class="subheader">
              <h2>Related</h2><br><h2 class="double-line">Items</h2>
            </div>

              <div class="related-item">
              <?php $post_id = get_post_meta($post->ID, 'related_item_1', true);
                  foreach($post_id as $related){
                      $title1 = get_the_title( $post->ID = $related );
                      $link1 = get_permalink( $post->ID = $related );
                  }
                ?>
                <?php just_custom_image($post->ID, 'thumbnail'); ?>
                <h6><?php echo $title1; ?></h6>
                <div class="subheader">
                  <a href="<?php echo $link1; ?>"> Read More</a>
                </div>
              </div>
              <?php $post->ID = $thisID; ?>

              <div class="related-item">
              <?php $post_id = get_post_meta($post->ID, 'related_item_2', true);
                  foreach($post_id as $related2){
                      $title2 = get_the_title( $post->ID = $related2 );
                      $link2 = get_permalink( $post->ID = $related2 );
                  }
                ?>
                <?php just_custom_image($post->ID, 'thumbnail'); ?>
                <h6><?php echo $title2; ?></h6>
                <div class="subheader">
                  <a href="<?php echo $link2; ?>"> Read More</a>
                </div>
              </div>
              <?php $post->ID = $thisID; ?>
            </div>
          <?php } ?>
          <div class="clear"></div>


        <?php edit_post_link( __( 'Edit', 'hbd-theme' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
              </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
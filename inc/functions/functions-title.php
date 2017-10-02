<?php function healthclinic_title() {
$subtitle = get_post_meta(get_the_ID(), "madzaplug_sub_title", true);
  ?>
  <div class="container page-title">
    <div class="row">
      <div class="col-md-12">
        <?php if(is_search()) { ?>
					<h1><?php printf( esc_html__( 'Search Results for: %s', "healthclinic"  ), '' . get_search_query() . '' ); ?></h1>
        <?php } else if(is_page()) { ?>
          <h1><?php the_title(); ?></h1>
          <?php  if(!empty($subtitle)){ ?><h4 class="mt-page-subtitle" itemprop="description"><?php echo esc_html($subtitle); ?></h2><?php } ?>
            <?php healthclinic_breadcrumbs(); ?>
        <?php } else if(is_home()) { ?>
          <h1><?php echo esc_html__( 'News', "healthclinic"  ); ?></h1>
          <?php  if(!empty($subtitle)){ ?><h2 class="single-subtitle" itemprop="description"><?php echo esc_html($subtitle); ?></h2><?php } ?>
        <?php } else if(is_category()) { ?>
          <h1><?php echo esc_html__( 'Category: ', "healthclinic"  ); ?></h1>
        <?php } else if(is_tag()) { ?>
          <h1><?php echo esc_html__( 'Tag: ', "healthclinic"  ); ?></h1>
        <?php } else if(is_single()) { ?>
          <h1><?php the_title(); ?></h1>
          <?php  if(!empty($subtitle)){ ?><h2 class="single-subtitle" itemprop="description"><?php echo esc_html($subtitle); ?></h2><?php } ?>
          <?php healthclinic_breadcrumbs(); ?>
        <?php } else { ?>
          <h1><?php the_title(); ?></h1>
          <?php  if(!empty($subtitle)){ ?><h4 class="mt-page-subtitle" itemprop="description"><?php echo esc_html($subtitle); ?></h2><?php } ?>
            <?php healthclinic_breadcrumbs(); ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php
}

add_filter('healthclinic_title','healthclinic_title'); ?>

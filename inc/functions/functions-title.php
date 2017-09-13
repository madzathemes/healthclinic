<?php function healthclinic_title() {

  ?>
  <div class="container page-title">
    <div class="row">
      <div class="col-md-12">
        <?php if(is_search()) { ?>
					<h1><?php printf( esc_html__( 'Search Results for: %s', "healthclinic"  ), '' . get_search_query() . '' ); ?></h1>
        <?php } else if(is_page()) { ?>
          <h1><?php the_title(); ?></h1>
        <?php } else if(is_home()) { ?>
          <h1><?php echo esc_html__( 'News', "healthclinic"  ); ?></h1>
        <?php } else if(is_category()) { ?>
          <h1><?php echo esc_html__( 'Category: ', "healthclinic"  ); ?></h1>
        <?php } else if(is_tag()) { ?>
          <h1><?php echo esc_html__( 'Tag: ', "healthclinic"  ); ?></h1>
        <?php } else if(is_single()) { ?>
          <h1><?php the_title(); ?></h1>
          <?php $subtitle = get_post_meta(get_the_ID(), "magazin_subtitle", true); if(!empty($subtitle)){ ?><h2 class="single-subtitle" itemprop="description"><?php echo get_post_meta(get_the_ID(), "magazin_subtitle", true); ?></h2><?php } ?> 
        <?php } else { ?>
          <h1><?php the_title(); ?></h1>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php
}

add_filter('healthclinic_title','healthclinic_title'); ?>

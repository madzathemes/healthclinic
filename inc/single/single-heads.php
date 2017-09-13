<?php function healthclinic_single_cat() {?>

  <div class="single-cat-wrap"><?php echo get_the_category_list(); ?></div>

<?php } ?>
<?php function healthclinic_single_cat_posts() {

  $category_name = get_the_category(get_the_ID()); $cat =""; if(!empty($category_name[0])) { $cat =''.$category_name[0]->slug.''; } if ( shortcode_exists( 'posts' ) ) { echo do_shortcode('[posts item_nr=5  category="'.$cat.'" type=small-bottom ]'); }

} ?>
<?php function healthclinic_single_title() {
  $subtitle = get_post_meta(get_the_ID(), "magazin_subtitle", true); ?>
} ?>
<?php function healthclinic_single_social() {
$share_top = "";
$share_top = get_post_meta(get_the_ID(), "magazin_post_share_top", true);

/* Share Meta from Magazin framework */
$share = get_post_meta(get_the_ID(), "magazin_share_count", true);
$shares = "1";
if (class_exists('Kirki')) {
  $shares = magazin_get_shares(get_the_ID());
}
if (!empty($share)){
	$shares = $share+$shares;
}
/* View Meta from Magazin framework */
$view = get_post_meta(get_the_ID(), "magazin_view_count", true);
$views = get_post_meta(get_the_ID(), "magazin_post_views_count", true);
$viewes = $views + "0";
if (!empty($view)){ $viewes = $view + $views; $viewes = number_format($viewes); }

$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));

?>
  <div class="after-title">
    <div class="pull-left">
      <div class="author-img pull-left">
        <?php global $post; echo get_avatar( $post->post_author, 30 ); ?>
      </div>
      <div class="author-info">
        <strong itemprop="author"><?php the_author_posts_link(); ?></strong>
        <small class="color-silver-light" itemprop="datePublished"><?php the_date('M d, Y'); ?></small>
        <span class="hide" itemprop="dateModified"><?php the_modified_date(); ?></span>
      </div>
    </div>
    <?php if(class_exists('md_walker')) { ?>
    <div class="post-statistic pull-left">
      <?php if(!empty($shares)){ ?><span class="stat-shares color-silver-light"><strong><?php echo esc_attr($shares); ?></strong> <?php echo esc_html__('Shares', 'healthclinic'); ?></span><?php } ?>
      <?php if(!empty($viewes)){ ?><span class="stat-views"><strong><?php echo esc_attr($viewes) ?></strong> <?php echo esc_html__('Views', 'healthclinic'); ?></span><?php } ?>
    </div>
    <?php } ?>

    <div class="clearfix"></div>

    <div class="single-stat-comments">
      <?php if (get_comments_number()!="0") { ?><span class="stat-comments"><?php echo get_comments_number(); ?> Comments</span><?php } ?>
    </div>
    <div class="clearfix"></div>
  </div>

<?php } ?>

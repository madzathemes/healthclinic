<?php function healthclinic_header() {
$allowed_html = array('ins' => array( 'class' => array(), 'style' => array(),'data-ad-client' => array(),'data-ad-slot' => array(),'data-ad-format' => array()), 'iframe' => array( 'id' => array(),'name' => array(),'src' => array(),'style' => array(),'scrolling' => array(),'frameborder' => array()), 'script' => array( 'async' => array(), 'type' => array(),'src' => array()), 'noscript' => array(), 'small' => array( 'class' => array()), 'img' => array( 'src' => array(), 'alt' => array(), 'class' => array(), 'width' => array(), 'height' => array() ), 'a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'i' => array('class' => array()),  'em' => array(), 'strong' => array(), 'div' => array('class' => array()), 'span' => array('class' => array()));
$option = get_option("healthclinic_theme_options");
$optioz = get_option("magazin_theme_options");
$page_option = get_post_meta(get_the_ID(), "magazin_menu_background_width", true);
if(!empty($page_option)) {
	if($page_option=="2") {
		$menu_full =  'menu-background';
		$menu_boxed =  '';
	} else {
		$menu_full =  '';
		$menu_boxed =  'menu-background';
	}
}
else if(!empty($option['menu_background_width'])) {
	if($option['menu_background_width']=="full") {
		$menu_full =  'menu-background';
		$menu_boxed =  '';
	} else {
		$menu_full =  '';
		$menu_boxed =  'menu-background';
	}
} else {
	$menu_full =  '';
	$menu_boxed =  'menu-background';
}
?>

<div class="mt-header-mobile menu-background-mobile hide-desktop top-nav <?php if(!empty($option['menu_search'])) { if($option['menu_search']=="1") { ?>search-on<?php } } ?>">
	<div class="nav-mobile pointer pull-left">
		<div class="mt-m-cool-button">
			<span class="mt-m-cool-button-line"></span>
		</div>
	</div>
	<div class="mt-mobile-logo"><?php healthclinic_logo_mobile(); ?></div>
	<?php if(!empty($option['menu_search'])) { if($option['menu_search']=="1") { ?>
		<div class="search-close"></div>
		<div class="nav-search-wrap pull-right">
			<div class="nav-search pointer"></div>
			<div class="nav-search-input mt-radius">
				<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>/">
					<input type="text" placeholder="<?php esc_html_e( 'Type and hit enter to search ...', 'healthclinic' ); ?>"  name="s" >
				</form>
			</div>
		</div>
	<?php } } ?>
</div>
<div class="mt-header-space hide-desktop"></div>

<?php $title_bg = get_post_meta(get_the_ID(), "madzaplug_title_bg", true); ?>
<div class="mt-head" <?php if(!empty($title_bg)) { ?> style="background-image:url('<?php echo esc_url($title_bg); ?>');" <?php } else if(!empty($option['title_bg'])) { ?> style="background-image:url('<?php echo esc_url($option['title_bg']); ?>');" <?php } ?>>
	<div class="header-wrap" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<div class="header-mt-container-wrap">
			<div class="container mt-header-container">
				<div class="row">
					<div class="col-md-12">
						<div class="head container-fluid">
							<div class="head-logo"><?php healthclinic_logo(); ?></div>
							<?php if  (!empty($option['menu_top_ad'])) {  ?>
								<?php if  ($option['menu_top_ad']=="ad") {  ?>
									<div class="top-ad">
										<?php if  (!empty($optioz['header_ad_top'])) {  ?>
									    <div class="text-right">
									      <?php echo html_entity_decode($optioz['header_ad_top']); ?>
									    </div>
									  <?php } ?>
									</div>
								<?php } else { echo healthclinic_top_content(); } ?>
							<?php } else { echo healthclinic_top_content(); } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="header-menu mt-header-container <?php if(!empty($option['menu_search'])) { if($option['menu_search']=="1") { ?>search-on<?php } } if(!empty($option['menu_small_on'])) { ?> small-on<?php } ?> ">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="top-nav container-fluid">

							<div class="nav-button mt-radius pointer pull-left menu-background <?php if(empty($option['menu_small_on'])) { ?>hide-desktop<?php } ?>">
								<div class="mt-m-cool-button">
									<span class="mt-m-cool-button-line"></span>
								</div>
							</div>

							<div class="nav pull-left" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" >
								<?php healthclinic_nav(); ?>

								<div class="pull-right menu-background mt-radius">

											<?php if( WC()->cart->get_cart_contents_count() > 0){ ?>
													<a class="mt-menu-cart cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View my car' ); ?>"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
													</a>
											<? } ?>

									<?php healthclinic_socials(); ?>
								</div>
							</div>

							<?php if(!empty($option['menu_search'])) { if($option['menu_search']=="1") { ?>
								<div class="search-close"></div><div class="search-close"></div>
								<div class="nav-search-wrap pull-right menu-background mt-radius">
									<div class="nav-search pointer"></div>
									<div class="nav-search-input mt-radius">
										<form method="get" action="<?php echo esc_url(home_url('/')); ?>/">
											<input type="text" placeholder="<?php esc_html_e( 'Type and hit enter to search ...', 'healthclinic' ); ?>"  name="s" >
										</form>
									</div>
								</div>
							<?php } } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php healthclinic_title(); ?>
</div>
<?php } add_filter('healthclinic_header','healthclinic_header');


function healthclinic_top_content() { $option = get_option("healthclinic_theme_options"); ?>
		<div class="head-nav">
			<?php if(!empty($option['head_phone'])) { ?>
				<div class="mt-head-phone">
					<span class="mt-head-title"><?php esc_html_e( 'Call Now', 'healthclinic' ); ?></span>
					<span class="mt-head-info"><?php esc_html_e($option['head_phone']); ?></span>
				</div>
			<?php } ?>
			<?php if(!empty($option['head_email'])) { ?>
				<div class="mt-head-mail">
					<span class="mt-head-title"><?php esc_html_e( 'E-mail', 'healthclinic' ); ?></span>
					<span class="mt-head-info"><?php esc_html_e($option['head_email']); ?></span>
				</div>
			<?php } ?>
			<?php if(!empty($option['head_address'])) { ?>
				<div class="mt-head-address">
					<span class="mt-head-title"><?php esc_html_e( 'Address', 'healthclinic' ); ?></span>
					<div class="mt-head-arrow"></div>
					<span class="mt-head-info"><?php esc_html_e($option['head_address']); ?></span>
				</div>
			<?php } ?>
		</div>

		<?php if(!empty($option['header_link_url'])) { ?>
				<div class="head-bookmark">
					<a class="mt-radius" href="<?php echo esc_url($option['header_link_url']);  ?>" <?php if(!empty($option['header_link_blank'])) { if($option['header_link_blank']=="1") {?>target="_blank" <?php }} ?>><?php echo esc_attr(get_theme_mod('healthclinic_header_link_name', 'Add Post')); ?></a>
				</div>
		<?php } ?>
<?php }
add_filter('healthclinic_top_content','healthclinic_top_content');

function healthclinic_logo() {

	$option = get_option("healthclinic_theme_options");

	// Fix for SSL
	if(!empty($option['header_logo'])) {
		$header_logo = esc_url($option['header_logo']);
		if(is_ssl() and 'http' == parse_url($header_logo, PHP_URL_SCHEME) ){
		    $header_logo = str_replace('http://', 'https://', $header_logo);
		}
	}
	if(!empty($option['header_logox2'])) {
		$header_logo2 = esc_url($option['header_logox2']);
		if(is_ssl() and 'http' == parse_url($header_logo2, PHP_URL_SCHEME) ){
		    $header_logo2 = str_replace('http://', 'https://', $header_logo2);
		}
	}

 	if(!empty($option['header_logo'])) { ?>
		<a class="logo"  href="<?php echo esc_url(home_url('/'));?>">
			<img <?php if(!empty($option['logo_width'])) { ?>  width="<?php echo esc_attr($option['logo_width']); ?>" <?php } if(!empty($option['logo_height'])) { ?>  height="<?php echo esc_attr($option['logo_height']); ?>" <?php } ?>
			src="<?php echo esc_url($header_logo); ?>"
			srcset="<?php echo esc_url($header_logo); ?>, <?php if(!empty($option['header_logox2'])) { echo esc_url($header_logo2); } ?> 2x"  alt="<?php echo the_title(); ?>"  />
		</a>
	<?php } else { ?>
		<a class="logo"  href="<?php echo esc_url(home_url('/'));?>">
			<img src="<?php echo get_template_directory_uri(); ?>/inc/img/logo.png" width="178" height="39" alt="<?php echo the_title(); ?>" />
		</a>
	<?php }
}

add_filter('healthclinic_logo','healthclinic_logo');

function healthclinic_logo_mobile() {

	$option = get_option("healthclinic_theme_options"); ?>

	<?php if(!empty($option['mobile_logo'])) { ?>
		<a href="<?php echo esc_url(home_url('/'));?>">
			<img src="<?php echo esc_url($option['mobile_logo']); ?>" alt="<?php echo the_title(); ?>"  />
		</a>
	<?php } else { ?>
		<a href="<?php echo esc_url(home_url('/'));?>">
			<img src="<?php echo get_template_directory_uri(); ?>/inc/img/logo.png" alt="<?php echo the_title(); ?>" />
		</a>
	<?php }
}
add_filter('healthclinic_logo_mobile','healthclinic_logo_mobile');

function healthclinic_nav() {
	if(class_exists('md_walker_')) {
		wp_nav_menu( array('theme_location'=>"primary",  'menu_class' => 'sf-menu menu-background mt-radius', 'walker'	=> new md_walker, 'echo' => true, 'depth' => 3));
	} else {
		wp_nav_menu( array('theme_location'=>"primary",  'menu_class' => 'sf-menu menu-background mt-radius', 'echo' => true, 'depth' => 3));
	}
}
add_filter('healthclinic_nav','healthclinic_nav');

function healthclinic_nav_fixed() {
	wp_nav_menu( array('theme_location'=>"primary",  'menu_class' => 'fixed-menu-ul',  'echo' => true, 'depth' => 1));
}
add_filter('healthclinic_nav_fixed','healthclinic_nav_fixed');

function healthclinic_nav_mobile() {
	wp_nav_menu( array('theme_location'=>"mobile",  'menu_class' => 'mobile',  'echo' => true, 'depth' => 2));
}
add_filter('healthclinic_nav_mobile','healthclinic_nav_mobile');

function healthclinic_socials() { ?>
	<ul class="social"> <?php
			$option = get_option("healthclinic_theme_options");
			if(!empty($option['mt_icon_twitter'])) {?><li><a <?php if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_twitter']); ?>"><i class="ic-twitter"></i></a></li><?php }
			if(!empty($option['mt_icon_facebook'])) {?><li><a <?php  if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_facebook']); ?>" ><i class="ic-facebook"></i></a></li><?php }
			if(!empty($option['mt_icon_intagram'])) {?><li><a <?php if(!empty($option['mt_icon_blank'])) {  if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_intagram']); ?>" ><i class="ic-instagram"></i></a></li><?php }
			if(!empty($option['mt_icon_vimeo'])) {?><li><a <?php  if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_vimeo']); ?>"><i class="ic-vimeo"></i></a></li><?php }
			if(!empty($option['mt_icon_youtube'])) {?><li><a <?php  if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_youtube']); ?>"><i class="ic-youtube-play"></i></a></li><?php }
			if(!empty($option['mt_icon_linkedin'])) {?><li><a <?php  if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_linkedin']); ?>"><i class="ic-linkedin"></i></a></li><?php }
			if(!empty($option['mt_icon_gplus'])) {?><li><a <?php  if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_gplus']); ?>"><i class="ic-google-plus"></i></a></li><?php }
			if(!empty($option['mt_icon_dribble'])) {?><li><a <?php  if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_dribble']); ?>"><i class="ic-dribbble"></i></a></li><?php }
			if(!empty($option['mt_icon_skype'])) {?><li><a <?php  if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_skype']); ?>"><i class="ic-skype"></i></a></li><?php }
			if(!empty($option['mt_icon_pinterest'])) {?><li><a <?php  if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_pinterest']); ?>"><i class="ic-pinterest"></i></a></li><?php }
			if(!empty($option['mt_icon_rss'])) {?><li><a <?php  if(!empty($option['mt_icon_blank'])) { if($option['mt_icon_blank']=="on") {?> target="_blank" <?php }} ?> href="<?php echo esc_url($option['mt_icon_rss']); ?>"><i class="ic-rss"></i></a></li><?php }
			?>
	</ul><?php
} add_filter('healthclinic_socials','healthclinic_socials');

function healthclinic_header_fixed() { ?>
	<div class="fixed-top-menu">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php healthclinic_logo(); ?>
					<?php healthclinic_nav_fixed(); ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
<?php } add_filter('healthclinic_header_fixed','healthclinic_header_fixed'); ?>

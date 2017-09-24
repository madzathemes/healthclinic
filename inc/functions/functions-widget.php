<?php

function healthclinic_sidebar_widget_init() {

$mt_columns = get_option("healthclinic_theme_options");

/* --------------------------------------------------------------------------------------- Page Widget Area 1 */

	register_sidebar( array(
		'name' => esc_html__( 'Default Sidebar', 'healthclinic'),
		'id' => 'sidebar-widget-area-1',
		'description' => esc_html__( 'The page sidebar widget area 1', 'healthclinic' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h3 class="heading"><span>',
				'after_title' => '</span></h3>',
	) );


/* --------------------------------------------------------------------------------------- Blog Widget Area */

	register_sidebar( array(
		'name' => esc_html__( 'Blog/Category Sidebar', 'healthclinic'),
		'id' => 'sidebar-blog-widget-area',
		'description' => esc_html__( 'The blog sidebar widget area' , 'healthclinic'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h3 class="heading"><span>',
				'after_title' => '</span></h3>',
	) );



/* --------------------------------------------------------------------------------------- Single Widget Area */

	register_sidebar( array(
		'name' => esc_html__( 'Post Sidebar', 'healthclinic'),
		'id' => 'sidebar-single-widget-area',
		'description' => esc_html__( 'The single page sidebar widget area' , 'healthclinic'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h3 class="heading"><span>',
				'after_title' => '</span></h3>',
	) );

	/* --------------------------------------------------------------------------------------- Single Widget Area */

		register_sidebar( array(
			'name' => esc_html__( 'Our Services Sidebar', 'healthclinic'),
			'id' => 'sidebar-our-services-widget-area',
			'description' => esc_html__( 'The our services single page sidebar widget area' , 'healthclinic'),
			'before_widget' => '<div class="widget">',
			'after_widget' => '<div class="clear"></div></div>',
					'before_title' => '<h3 class="heading"><span>',
					'after_title' => '</span></h3>',
		) );

		/* --------------------------------------------------------------------------------------- Single Widget Area */

		register_sidebar( array(
			'name' => esc_html__( 'Our Staff Sidebar', 'healthclinic'),
			'id' => 'sidebar-our-staff-widget-area',
			'description' => esc_html__( 'The our staff single page sidebar widget area' , 'healthclinic'),
			'before_widget' => '<div class="widget">',
			'after_widget' => '<div class="clear"></div></div>',
					'before_title' => '<h3 class="heading"><span>',
					'after_title' => '</span></h3>',
		) );

	/* --------------------------------------------------------------------------------------- Single Buttom Widget Area */

		register_sidebar( array(
			'name' => esc_html__( 'Post Bottom (Before Comments)', 'healthclinic'),
			'id' => 'sidebar-single-bottom-widget-area-before',
			'description' => esc_html__( 'The post bottom widget area' , 'healthclinic'),
			'before_widget' => '<div class="widget">',
			'after_widget' => '<div class="clear"></div></div>',
					'before_title' => '<h3 class="heading"><span>',
					'after_title' => '</span></h3>',
		) );

	/* --------------------------------------------------------------------------------------- Single Buttom Widget Area */

			register_sidebar( array(
				'name' => esc_html__( 'Post Bottom (After Comments)', 'healthclinic'),
				'id' => 'sidebar-single-bottom-widget-area-after',
				'description' => esc_html__( 'The post bottom widget area' , 'healthclinic'),
				'before_widget' => '<div class="widget">',
				'after_widget' => '<div class="clear"></div></div>',
						'before_title' => '<h3 class="heading"><span>',
						'after_title' => '</span></h3>',
			) );


/* --------------------------------------------------------------------------------------- Search Widget Area */


	register_sidebar( array(
		'name' => esc_html__( 'Search Page Sidebar', 'healthclinic'),
		'id' => 'sidebar-search-widget-area',
		'description' => esc_html__( 'The search page sidebar widget area' , 'healthclinic'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h3 class="heading"><span>',
				'after_title' => '</span></h3>',
	) );

	/* --------------------------------------------------------------------------------------- Author widgets */

	register_sidebar( array(
	'name' => esc_html__( 'Author Page Sidebar', 'healthclinic'),
	'id' => 'sidebar-author-widget-area',
	'description' => esc_html__( 'The Author page sidebar widget area' , 'healthclinic'),
	'before_widget' => '<div class="widget">',
	'after_widget' => '<div class="clear"></div></div>',
			'before_title' => '<h3 class="heading"><span>',
			'after_title' => '</span></h3>',
	) );

	/* --------------------------------------------------------------------------------------- Footer Hot Post widgets */

	register_sidebar( array(
	'name' => esc_html__( 'Footer Hot Post Widget', 'healthclinic'),
	'id' => 'sidebar-footer-hotposts-widget-area',
	'description' => esc_html__( 'The footer host post widget area' , 'healthclinic'),
	'before_widget' => '<div class="widget">',
	'after_widget' => '<div class="clear"></div></div>',
			'before_title' => '<h3 class="heading"><span>',
			'after_title' => '</span></h3>',
	) );


}

add_action( 'widgets_init', 'healthclinic_sidebar_widget_init' );
?>

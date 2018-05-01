<?php

/*-----------------------------------------------------------------------------------*/
/* Function
/*-----------------------------------------------------------------------------------*/
require get_template_directory() .'/inc/functions/functions-widget.php';
require get_template_directory() .'/inc/functions/functions-header.php';
require get_template_directory() .'/inc/functions/functions-hooks.php';
require get_template_directory() .'/inc/functions/functions-comment.php';
require get_template_directory() .'/inc/functions/functions-plugins.php';
require get_template_directory() .'/inc/functions/functions-general.php';
require get_template_directory() .'/inc/functions/functions-title.php';
require get_template_directory() .'/inc/functions/functions-footer.php';
require get_template_directory() .'/inc/functions/functions-slider.php';

/*-----------------------------------------------------------------------------------*/
/* Customizer
/*-----------------------------------------------------------------------------------*/
if (class_exists('Kirki')) {
require get_template_directory() .'/inc/customizer/customizer-fonts.php';
require get_template_directory() .'/inc/customizer/customizer-footer.php';
require get_template_directory() .'/inc/customizer/customizer-header.php';
require get_template_directory() .'/inc/customizer/customizer-posts.php';
require get_template_directory() .'/inc/customizer/customizer-colors.php';
}

/*-----------------------------------------------------------------------------------*/
/* Single
/*-----------------------------------------------------------------------------------*/
require get_template_directory() .'/inc/single/single-heads.php';
require get_template_directory() .'/inc/single/single-media.php';
require get_template_directory() .'/inc/single/single-sidebar.php';
require get_template_directory() .'/inc/single/single-content.php';
require get_template_directory() .'/inc/single/single-styles.php';
define('KC_LICENSE', 'l483kg4m-jxbv-ju7k-or7h-yhgd-q3jl1ec3fqyi');
/*-----------------------------------------------------------------------------------*/
/* Theme Setup
/*-----------------------------------------------------------------------------------*/

function healthclinic_theme_setup() {

	add_editor_style();
	add_theme_support( 'post-formats', array('video', 'gallery') );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( "title-tag" );

	load_theme_textdomain( 'healthclinic', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	set_post_thumbnail_size( 999, 999, true );

	register_nav_menus( array(
		'primary' => esc_html__( 'Header Menu', 'healthclinic' ),
		'mobile' => esc_html__( 'Mobile Menu', 'healthclinic' ),
		'footer_menu' => esc_html__( 'Footer Navigation', 'healthclinic' ),
	) );
	if ( ! isset( $content_width ) ) { $content_width = 900; }
}

add_action( 'after_setup_theme', 'healthclinic_theme_setup' );


/*-----------------------------------------------------------------------------------*/
/* Default Options
/*-----------------------------------------------------------------------------------*/

function healthclinic_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'healthclinic_javascript_detection', 0 );

if ( ! isset( $content_width ) ) {
	$content_width = 740;
}

function healthclinic_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'healthclinic Full', 'healthclinic' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo1/demo.xml',
            #'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo1/widgets.json',
            #'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo1/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'healthclinic' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'healthclinic_import_files' );

function healthclinic_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Header', 'nav_menu' );
		$mobile_menu = get_term_by( 'name', 'Mobile Menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
						'mobile' => $mobile_menu->term_id,
						'footer_menu' => $footer_menu->term_id,
        )
    );
		wp_delete_post(1);
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'News' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'healthclinic_after_import_setup' );

/**
 * Disblae WPES on media library search
 * @param type $enabled
 * @return boolean
 */
function healthclinic_disbale_wpes_on_media_search($enabled) {
    if ((defined('DOING_AJAX') && DOING_AJAX) && isset($_REQUEST['action']) && $_REQUEST['action'] == 'query-attachments') {
        return false;
    }

    return $enabled;
}
add_filter('wpes_enabled', 'healthclinic_disbale_wpes_on_media_search');

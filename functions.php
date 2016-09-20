<?php
/**
 * sumaweb functions file
 *
 * @package WordPress
 * @subpackage sumaweb
 * @since sumaweb 1.0
 */


/******************************************************************************\
	Theme support, standard settings, menus and widgets
\******************************************************************************/
add_filter('show_admin_bar', '__return_false');
//add_theme_support( 'post-formats', array( 'image', 'quote', 'status', 'link' ) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );




function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);







/******************************************************************************\
	Scripts and Styles
\******************************************************************************/

/**
 * Enqueue sumaweb scripts
 * @return void
 */
function sumaweb_enqueue_scripts() {
	// STYLES
	wp_enqueue_style( 'sumaweb-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,300,700', array(), '1.0' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/bower_components/fancyBox/source/jquery.fancybox.css', array(), '1.0');
	wp_enqueue_style( 'sumaweb-styles', get_stylesheet_uri(), array(), '1.0' );


	// SCRIPTS
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery.mousewheel', get_template_directory_uri() . '/bower_components/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js', array(), '1.0', true );
	wp_enqueue_script( 'jquery.fancybox', get_template_directory_uri() . '/bower_components/fancyBox/source/jquery.fancybox.pack.js', array(), '1.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0', true );
	wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDfUGtFXqjO5NLMjGySi3SMbmMvG_iu520&callback=initMap', array(), '1.0', true );
	//wp_enqueue_script( 'googlemaps' );
}
add_action( 'wp_enqueue_scripts', 'sumaweb_enqueue_scripts' );





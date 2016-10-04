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




/////////////////////////////////////////////////////////////
// CONVERT URLS TO BITLY SHORTENER
/////////////////////////////////////////////////////////////

function make_bitly_url($url){
	
	//Properties
	$appkey = '12c4dafc84295a965f6f76af1f79eddfb443428a';
	$format = 'txt';
	$version = '2.0.1';
	
	//call Bitly API
	$bitly = 'https://api-ssl.bitly.com/v3/shorten?longUrl='.urlencode($url).'&access_token='.$appkey.'&format='.$format;

	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $bitly);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	curl_close($ch);
	
	//get the shortened URL
	//$response = file_get_contents($bitly);
	
	return $response ? trim($response) : $url;
}










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





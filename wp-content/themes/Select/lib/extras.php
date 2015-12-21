<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;


/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


//Custom image size
add_image_size( 'covers_img', 450, 300, true );

add_image_size( 'square_news', 300, 300, true );


//Woocommerce Cookie Issue
add_action( 'wp_enqueue_scripts', 'custom_frontend_scripts' );
function custom_frontend_scripts() {
  	global $post, $woocommerce;
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_deregister_script( 'jquery-cookie' ); 
		wp_register_script( 'jquery-cookie', $woocommerce->plugin_url() . '/assets/js/jquery-cookie/jquery_cookie' . $suffix . '.js', array( 'jquery' ), '1.3.1', true );
}



//Events Title
add_filter( 'tribe_event_label_singular', 'event_display_name' );
function event_display_name() {
	return 'Course';
}

add_filter( 'tribe_event_label_plural', 'event_display_name_plural' );
function event_display_name_plural() {
	return 'Courses';  
}
















<?php
/**
 * Active Net.
 *
 * This file adds the front page to the theme.
 *
 * @package Active Net
 * @author  Active Net
 * @license GPL-2.0+
 * @link    https://www.active-net.it
 */

//* Add Slider widget area
add_action( 'genesis_before_content_sidebar_wrap', 'slider_widget',20 );
	function slider_widget() {	
		genesis_widget_area( 'slider', array(
			'before' => '<div class="slider widget-area"><div class="wrap">',
			'after' => '</div></div>',
	) );
}

//* Add Home Top Sections widget area
//add_action( 'genesis_before_content', 'home_top_sections_widget',20 );
	function home_top_sections_widget() {	
		genesis_widget_area( 'home-top-sections', array(
			'before' => '<div class="home-top-sections sections widget-area"><div class="wrap">',
			'after' => '</div></div>',
	) );
}

//* Add Home Bottom Sections widget area
//add_action( 'genesis_before_footer', 'home_bottom_sections_widget', 5 );
	function home_bottom_sections_widget() {	
		genesis_widget_area( 'home-bottom-sections', array(
			'before' => '<div class="home-bottom-sections sections widget-area"><div class="wrap">',
			'after' => '</div></div>',
	) );
}

add_filter( 'genesis_attr_body', 'an_sections_body' );

function an_sections_body( $attributes ) {

	if ( is_active_sidebar( 'home-top-sections' )) {
		 $attributes['class'] .= ' has-home-top-sections';
		 return $attributes;
		}

	else {	
		 return $attributes;
		}

}

// Run the Genesis loop.
genesis();
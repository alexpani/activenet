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

//* Remove Skip Links
remove_action ( 'genesis_before_header', 'genesis_skip_links', 5 );

//* Dequeue Skip Links Script
add_action( 'wp_enqueue_scripts', 'activenet_dequeue_skip_links' );
function activenet_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove site header elements
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

//* Remove navigation
remove_theme_support( 'genesis-menus' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Run the Genesis loop.
genesis();
<?php

// =============================================================================
// Your functions
// =============================================================================

function poka_child_enqueue_styles() {
	// Your custom styles
	wp_enqueue_style( 'child-theme-style', get_stylesheet_directory_uri() . '/style.css', array( 'poka-vendor', 'poka-bundle', 'poka-css-vars' ), filemtime( get_stylesheet_directory() . '/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'poka_child_enqueue_styles', 10 );




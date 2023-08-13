<?php

// =============================================================================
// Custom functions
// =============================================================================

function poka_child_enqueue_styles() {
    // Existing theme styles
    wp_enqueue_style( 'child-theme-style', get_stylesheet_directory_uri() . '/style.css', array( 'poka-vendor', 'poka-bundle', 'poka-css-vars' ), filemtime( get_stylesheet_directory() . '/style.css' ) );

    // Custom styles for the Custom- Rviews Listing block
    wp_enqueue_style( 'custom-reviews-listing-style', get_stylesheet_directory_uri() . '/assets/public/css/styles.css', array( 'poka-vendor', 'poka-bundle', 'poka-css-vars', 'child-theme-style' ), filemtime( get_stylesheet_directory() . '/assets/public/css/custom-reviews-listing.css' ) );
}
add_action( 'wp_enqueue_scripts', 'poka_child_enqueue_styles', 10 );



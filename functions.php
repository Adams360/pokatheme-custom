<?php

// =============================================================================
// Custom functions
// =============================================================================

function poka_child_enqueue_styles() {
    // Existing theme styles
    wp_enqueue_style( 'child-theme-style', get_stylesheet_directory_uri() . '/style.css', array( 'poka-vendor', 'poka-bundle', 'poka-css-vars' ), filemtime( get_stylesheet_directory() . '/style.css' ) );

    // Custom styles for the Custom- Reviews Listing block
    wp_enqueue_style( 'custom-reviews-listing-style', get_stylesheet_directory_uri() . '/assets/public/css/custom-reviews-listing.css', array( 'poka-vendor', 'poka-bundle', 'poka-css-vars', 'child-theme-style' ), filemtime( get_stylesheet_directory() . '/assets/public/css/custom-reviews-listing.css' ) );

     // Custom script
     wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/assets/src/js/custom-script.js', array('jquery'), null, true );

}
add_action( 'wp_enqueue_scripts', 'poka_child_enqueue_styles', 10 );


/**
 * Get affiliate bonus
 */
function custom_affiliate_bonus( $review_id ) {
    return apply_filters( 'poka_affiliate_bonus_text', poka_get_field( 'affiliate_bonus', $review_id )) ;
}


/**
* Return affiliate button
*/
function custom_affiliate_button( $review_id ) {
    $btn = '<a href="' . poka_affiliate_link( $review_id ) . '" ' . poka_affiliate_link_atts( $review_id ) . '>' . poka_get_translation( 'Play Now' ) . '</a>';
    return $btn;
}

/**
 * Get review single link html
 *
 */
function custom_review_single_link( $review_id ) {
        // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
        $link = '<a href="' . poka_review_single_link_url( $review_id ) . '" ><span>' . 'Read Review' . '</span></a>';

        // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
        return apply_filters( 'poka_review_single_button_html', $link );
}


/**
 * Return affiliate rating
 */
function custom_affiliate_rating( $review_id, $atts = array() ) {
    $html         = '';
    $rating_num   = poka_affiliate_rating_number( $review_id );
    $rating_icons = poka_affiliate_rating_icons();

    if ( $rating_num ) {

        if ( in_array( 'rating_num', $atts ) ) {
            $html .= '<div class="review-rating">';
            $html .= '<span><strong>' . $rating_num . '</strong>/5</span>';
        }

        $html .= '<div class="rating">';

        // Check if the rating is 1 or above to display one full star, else display an empty star.
        if ($rating_num >= 1) {
            $html .= $rating_icons['full_star'];
        } else {
            $html .= $rating_icons['empty_star'];
        }

        $html .= '</div>';
        $html .= '<!--/.rating-->';

        if ( in_array( 'rating_num', $atts ) ) {
            $html .= '</div>';
            $html .= '<!--/. review -rating-->';
        }
    }

    return apply_filters( 'custom_affiliate_rating_html', $html );
}

/**
* Get affiliate terms
 */
function custom_affiliate_terms_text($review_id) {
    if (poka_get_field('affiliate_terms', $review_id)) {
        return '<p>' . wp_kses_post(nl2br(poka_get_field('affiliate_terms', $review_id))) . '</p>';
    }
    return '';
}

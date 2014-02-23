<?php

add_action('genesis_setup','bsg_featured_image_display', 15);

function bsg_featured_image_display() {
    // image with post (disabled on single post / single page )
    add_action( 'genesis_before_entry', 'srf_bootstrap_genesis_featured_image');

    add_action( 'genesis_before_content', 'srf_bootstrap_genesis_featured_image_above_content' );
}

// display featured image within the main container (next to sidebar)
// on non-singular pages (potentially multiple featured images on these pages)
function srf_bootstrap_genesis_featured_image() {
    global $post;

    if ( is_singular() || !has_post_thumbnail()) {
        // abort if singular or no thumbnail
        return;
    }
    $attr = array(
        'class' => 'archive-featured-image'
    );

    $permalink = get_permalink();

    echo ( $permalink ? "<a href=\"{$permalink}\">" : "" );
        the_post_thumbnail( 'blog-featured-image', $attr );
    echo ( $permalink ? "</a>" : "" );
}


// display featured image above the main container and sidebar
// on singular pages (only one featured image on these pages)
function srf_bootstrap_genesis_featured_image_above_content() {
    if ( !is_singular() || !has_post_thumbnail()) {
        // abort if NOT singular or no thumbnail
        return;
    }
    $attr = array(
        'class' => 'single-featured-image span12'
    );
    the_post_thumbnail( 'full-width-featured-image', $attr );
}

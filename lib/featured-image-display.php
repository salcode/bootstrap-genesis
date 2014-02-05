<?php

add_action('genesis_setup','bsg_featured_image_display', 15);

function bsg_featured_image_display() {
    // image with post (disabled on single post / single page )
    add_action( 'genesis_before_entry', 'srf_bootstrap_genesis_featured_image');

    add_action( 'genesis_before_content', 'srf_bootstrap_genesis_featured_image_above_content' );
}

function srf_bootstrap_genesis_featured_image() {
    global $post;

    if ( is_singular() || !has_post_thumbnail()) {
        // abort if singular or no thumbnail
        return;
    }
    $attr = array(
        'class' => 'archive-featured-image'
    );
    the_post_thumbnail( 'blog-featured-image', $attr );
}


// Move the featured image out above all of the content
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

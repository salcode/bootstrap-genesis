<?php

add_action('genesis_setup','bsg_featured_image_display', 15);

function bsg_featured_image_display() {
    // image with post (disabled on single post / single page )
    add_action( 'genesis_entry_header', 'srf_bootstrap_genesis_featured_image', 0);
}

function srf_bootstrap_genesis_featured_image() {
    global $post;

    if ( !has_post_thumbnail() ) {
        return;
    }

    $featured_image_attr = array();

    if ( is_singular() ) {
        $featured_image_attr['class'] = 'single-featured-image';
        // image does NOT link on single page
        // (link would link back to the page we are already on)
        $permalink = false;
    } else {
        $featured_image_attr['class'] = 'archive-featured-image';
        $permalink = get_permalink();
    }

    echo ( $permalink ? "<a href=\"{$permalink}\">" : "" );
        $size = apply_filters( 'bsg-featured-image', 'bsg-featured-image' );
        $featured_image_attr = apply_filters( 'bsg-featured-image-attr', $featured_image_attr );
        the_post_thumbnail( $size, $featured_image_attr );
    echo ( $permalink ? "</a>" : "" );
}

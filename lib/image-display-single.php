<?php
add_action( 'genesis_entry_header', 'bsg_single_featured_image', 5 );

function bsg_single_featured_image() {
    global $post;

    if ( ! is_singular() ) {
        return;
    }

    if ( ! has_post_thumbnail() ) {
        return;
    }

    $featured_image_attr = apply_filters( 'bsg-featured-image-attr', array(
        'class' => 'single-featured-image'
    ) );

    $size = apply_filters( 'bsg-featured-image', 'bsg-featured-image' );

    the_post_thumbnail( $size, $featured_image_attr );

}

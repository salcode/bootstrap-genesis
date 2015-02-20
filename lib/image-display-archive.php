<?php

remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action(    'genesis_entry_header',  'genesis_do_post_image', 0 );

add_filter( "genesis_attr_entry-image", 'bsg_archive_image_attr_filter' );
function bsg_archive_image_attr_filter( $attributes ) {
    $attributes['class'] .= ' wp-post-image archive-featured-image';
    return $attributes;
}

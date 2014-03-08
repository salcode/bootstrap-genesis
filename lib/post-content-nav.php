<?php

// modify post content navigation markup

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'bsg_do_post_content_nav_setup', 15 );

function bsg_do_post_content_nav_setup() {
    // remove default post_content_nav
    remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );

    // add custom post_content_nav
    add_action( 'genesis_entry_content', 'bsg_do_post_content_nav', 12 );

    // filter page links for correct bootstrap format
    add_filter( 'wp_link_pages_link', 'bsg_wp_link_pages_link' );
}

function bsg_wp_link_pages_link( $link ) {
    if ( $link && '<' !== $link[0] ) {
        // this link is NOT an anchor tag,
        // it is the current item
        // add anchor tag and class active
        return '<li class="active"><a href="#">' . $link . '</a></li>';
    } else {
        return '<li>' . $link . '</li>';
    }
}

function bsg_do_post_content_nav( $attr ) {
    wp_link_pages( array(
        'before' => '<div class="bsg-post-content-nav"><p>' . __( 'Pages:', 'genesis' ) . '</p><div class="pagination clearfix"><ul>',
        'after'  => '</ul></div></div>',
    ) );
}

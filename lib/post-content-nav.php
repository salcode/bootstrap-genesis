<?php

/**
 * Apply Bootstrap Styles to Page links when a post has multiple
 * pages via the <!--nextpage--> tag.
 *
 * See https://codex.wordpress.org/Styling_Page-Links
 *
 * @since 0.4.0
 */

// remove default post_content_nav
remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );

// add custom post_content_nav
add_action( 'genesis_entry_content', 'bsg_do_post_content_nav', 12 );

// filter page links for correct bootstrap format
add_filter( 'wp_link_pages_link', 'bsg_wp_link_pages_link' );

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
        'before' => '<div class="bsg-post-content-nav">'
                . '<p>' . __( 'Pages:', 'genesis' ) . '</p>'
                . genesis_markup( array(
                    'html5'   => '<div %s><ul>',
                    'xhtml'   => '<div %s><ul>',
                    'context' => 'entry-pagination',
                    'echo'    => false,
                ) ),
        'after'  => '</ul></div></div>',
    ) );
}

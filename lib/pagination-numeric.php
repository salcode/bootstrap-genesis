<?php
/**
 * Modify Previous Page / Next Page to use Bootstrap styling
 *
 * To generate the proper markup, we've recreated genesis_posts_nav()
 * and genesis_prev_next_posts_nav() since there was not a good way
 * to hook in and modify the markup.
 *
 * @since 0.7.0
 */

add_filter( 'genesis_prev_link_text', 'bsg_genesis_prev_link_text_numeric' );
add_filter( 'genesis_next_link_text', 'bsg_genesis_next_link_text_numeric' );

function bsg_genesis_prev_link_text_numeric( $text ) {
    if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
        return '<span aria-hidden="true">&laquo;</span>'
            . '<span class="sr-only">' . __( 'Previous Page', 'genesis' ) . '</span>';
    }
    return $text;
}

function bsg_genesis_next_link_text_numeric( $text ) {
    if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
        return '<span class="sr-only">' . __( 'Next Page', 'genesis' ) . '</span>'
            . '<span aria-hidden="true">&raquo;</span>';
    }
    return $text;
}

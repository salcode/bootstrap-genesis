<?php
/**
 * Add class "bsg-pagination-numeric" or "bsg-pagination-prev-next" depending on
 * the pagination style selected in the Genesis theme options
 *
 * @since 0.7.0
 */
remove_filter( 'genesis_attr_archive-pagination', 'genesis_attributes_pagination' );

add_filter( 'bsg-add-class', 'bsg_prev_next_or_numeric_archive_pagination', 10, 2 );

function bsg_prev_next_or_numeric_archive_pagination( $classes_array, $context ) {
    if ( 'archive-pagination' !== $context ) {
        return $classes_array;
    }

    if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
        $classes_array[] = 'bsg-pagination-numeric';
    } else {
        $classes_array[] = 'bsg-pagination-prev-next';
    }

    return $classes_array;

}

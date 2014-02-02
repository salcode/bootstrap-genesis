<?php

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'bsg_bootstrap_markup_setup', 15 );

function bsg_bootstrap_markup_setup() {

    // add bootstrap classes
    add_filter( 'genesis_attr_site-inner',          'bsg_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_content-sidebar-wrap','bsg_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_content',             'bsg_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_sidebar-primary',     'bsg_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_archive-pagination',  'bsg_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_site-footer',         'bsg_add_markup_class', 10, 2 );

} // bsg_bootstrap_markup_setup()

function bsg_add_markup_class( $attr, $context ) {
    // default classes to add
    $classes_to_add = apply_filters ('bsg-classes-to-add', array(
        'site-inner'        => 'container',
        'content-sidebar-wrap'      => 'row',
        'content'           => 'span9',
        'sidebar-primary'   => 'span3',
        'archive-pagination'=> 'clearfix',
    ) );

    if ( isset( $classes_to_add[ $context ] ) ) {
        $attr['class'] = ' ' . apply_filters('bsg-add-class', sanitize_html_class( $classes_to_add[ $context ] ), $context, $attr );
    }
    return $attr;
}

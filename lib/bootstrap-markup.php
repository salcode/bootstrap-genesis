<?php

add_action( 'genesis_setup', 'bsg_add_boostrap_classes', 15 ); // Priority 15 ensures it runs after Genesis itself has setup.
function bsg_add_boostrap_classes() {

    // remove structural wraps
    // more info about structural wraps at
    // http://genesistutorials.com/genesis-structural-wraps-creating-a-full-width-genesis-child-theme/
    remove_theme_support( 'genesis-structural-wraps' );

    add_filter( 'genesis_attr_site-header', 'bsg_attr_site_header' );
    add_filter( 'genesis_attr_title-area', 'bsg_attr_title_area' );

    add_filter( 'genesis_attr_site-inner', 'bsg_attr_site_inner' );
    add_filter( 'genesis_attr_content-sidebar-wrap', 'bsg_attr_content_sidebar_wrap' );
    add_filter( 'genesis_attr_content', 'bsg_attr_content' );
    add_filter( 'genesis_attr_sidebar-primary', 'bsg_attr_sidebar_primary' );

    add_filter( 'genesis_attr_site-footer', 'bsg_attr_site_footer' );
}

// heading
function bsg_attr_site_header( $attr ) {
    return bsg_add_class( $attr, 'container' );
}

function bsg_attr_title_area( $attr ) {
    return bsg_add_class( $attr, 'jumbotron' );
}

// body
function bsg_add_class( $attr, $class ) {
    $attr['class'] .= ' ' . sanitize_html_class( $class );
    return $attr;
}

function bsg_attr_site_inner( $attr ) {
    return bsg_add_class( $attr, 'container' );
}
 
function bsg_attr_content_sidebar_wrap( $attr ) {
    return bsg_add_class( $attr, 'row' );
}
 
function bsg_attr_content( $attr ) {
    return bsg_add_class( $attr, 'col-md-8' );
}
 
function bsg_attr_sidebar_primary( $attr ) {
    return bsg_add_class( $attr, 'col-md-4' );
}

// footer
function bsg_attr_site_footer( $attr ) {
    return bsg_add_class( $attr, 'container' );
}

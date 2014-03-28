<?php
/* Modify the Bootstrap Classes being applied
 * based on the Genesis template chosen
 */

// remove unused layouts
add_action('genesis_setup', 'bsg_remove_unused_layout_options', 15);

// modify bootstrap classes based on genesis_site_layout
add_filter('bsg-classes-to-add', 'bsg_modify_classes_based_on_template', 10, 3);

function bsg_remove_unused_layout_options() {
    genesis_unregister_layout( 'content-sidebar-sidebar' );
    genesis_unregister_layout( 'sidebar-sidebar-content' );
    genesis_unregister_layout( 'sidebar-content-sidebar' );
}

function bsg_layout_options_modify_classes_to_add( $classes_to_add ) {

    $layout = genesis_site_layout();

    // content-sidebar          // default

    // full-width-content       // supported
    if ( 'full-width-content' === $layout ) {
        $classes_to_add['content'] = 'span12';
    }

    // sidebar-content          // not yet supported 
    // - same markup as content-sidebar with css modifications rather than markup

    // content-sidebar-sidebar  // not yet supported

    // sidebar-sidebar-content  // not yet supported

    // sidebar-content-sidebar  // not yet supported

    return $classes_to_add;
};

function bsg_modify_classes_based_on_template( $classes_to_add, $context, $attr ) {
    $classes_to_add = bsg_layout_options_modify_classes_to_add( $classes_to_add );

    return $classes_to_add;
}

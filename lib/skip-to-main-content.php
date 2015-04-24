<?php
/* Skip to Main Content - Accessibility Link
 *
 */

// add markup for the link
add_action( 'genesis_before', 'bsg_skip_navigation_add_link', 5 );
// add id="main-content-container" as target
add_filter( 'genesis_attr_content', 'bsg_skip_navigation_add_id_for_target' );


function bsg_skip_navigation_add_link() {
    echo '<a class="skip-to-main-content btn btn-large btn-danger" href="#main-content-container" tabindex="1">skip to main content</a>';
}

function bsg_skip_navigation_add_id_for_target( $attr ) {
    $attr['id'] = __( 'main-content-container', 'bsg' );

    return $attr;
}

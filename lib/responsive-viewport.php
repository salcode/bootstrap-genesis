<?php

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'bsg_responsive_viewport_setup', 15 );

function bsg_responsive_viewport_setup() {
    // Add viewport meta tag for mobile browsers
    // genesis-responsive-viewport does NOT include maximum-scale=1
    // and does NOT have a filter to modify, therefore we're using our own code
    //add_theme_support( 'genesis-responsive-viewport' );
    add_action( 'genesis_meta', 'bsg_responsive_viewport');
}

// add viewport for responsive
// http://stackoverflow.com/questions/9386429/simple-bootstrap-page-is-not-responsive-on-the-iphone#answer-10120831
function bsg_responsive_viewport() {
    ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
}

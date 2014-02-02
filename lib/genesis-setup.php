<?php

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'bsg_genesis_setup', 15 );

function bsg_genesis_setup() {
    // http://my.studiopress.com/snippets/html5/
    // Add HTML5 markup structure
    add_theme_support( 'html5' );
}

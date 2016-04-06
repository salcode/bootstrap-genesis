<?php
/**
 * Remove the .no-js class from the html element via JavaScript
 *
 * This allows styles targetting browsers without JavaScript
 */

add_action( 'wp_head', 'bsg_remove_no_js_class', 1 );

function bsg_remove_no_js_class() {
    echo "<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>";
}

<?php
/**
 * Add X-UA-Compatible header to all responses
 *
 * @package salcode/boostrap-genesis
 */

if ( ! is_admin() ) {
    add_action( 'send_headers', 'bsg_add_header_xua' );
}

/**
 * Send X-UA-Compatible header
 */
function bsg_add_header_xua() {
    header( 'X-UA-Compatible: IE=edge,chrome=1' );
}

<?php

add_filter( 'genesis_footer_output', 'bsg_footer_creds_filter', 10, 3 );

function bsg_footer_creds_filter( $creds ) {
    $rel = is_front_page() ? '' : 'rel="nofollow"';
    $creds = "<p class='text-center'><a {$rel} href=\"http://ironcodestudio.com/bootstrap-genesis-theme/\">Bootstrap Genesis Theme</a> by <a {$rel} href=\"http://ironcodestudio.com/\">Iron Code Studio</a></p>";
    return $creds;
}


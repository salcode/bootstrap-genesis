<?php

add_filter('genesis_footer_creds_text', 'bsg_footer_creds_filter');

function bsg_footer_creds_filter( $creds ) {
    $creds = '<a title="Bootstrap Genesis Theme" href="http://ironcodestudio.com/bootstrap-genesis-theme/">Bootstrap Genesis Theme</a> by <a href="http://ironcodestudio.com/">Iron Code Studio</a>';
    return $creds;
}

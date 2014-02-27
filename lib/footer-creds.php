<?php

add_filter('genesis_footer_creds_text', 'bsg_footer_creds_filter');

function bsg_footer_creds_filter( $creds ) {
    $creds = '<a title="Bootstrap Genesis Starter Theme" href="https://github.com/salcode/bootstrap-genesis">Bootstrap Genesis Starter Theme</a> for the <a href="http://www.studiopress.com/themes/genesis" title="Genesis Framework">Genesis Framework</a> by <a title="Sal Ferrarello" href="http://salferrarello.com/">Sal Ferrarello</a>';
    return $creds;
}

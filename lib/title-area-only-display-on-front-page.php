<?php

// hide title and description on all pages other than front page
add_action( 'template_redirect', 'bsg_title_area_hide_on_pages_other_than_front' );

function bsg_title_area_hide_on_pages_other_than_front() {
    if ( !is_front_page() ) {
        remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
        remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
    }
}

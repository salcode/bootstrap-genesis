<?php

add_action( 'template_redirect', 'bsg_title_area_hero_unit_on_front_page' );

function bsg_title_area_hero_unit_on_front_page() {
    if ( is_front_page() ) {
        add_action( 'genesis_site_title', 'bsg_hero_unit_open', 2 );
        add_action( 'genesis_site_description', 'bsg_hero_unit_close', 30 );
    }
}


function bsg_hero_unit_open() {
    echo '<div class="hero-unit">';
}

function bsg_hero_unit_close() {
    echo '</div>';
}



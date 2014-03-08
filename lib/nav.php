<?php

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'bsg_primary_nav_modifications', 15 );


function bsg_primary_nav_modifications() {
    // remove primary & secondary nav from default position
    remove_action( 'genesis_after_header', 'genesis_do_nav' );
    remove_action( 'genesis_after_header', 'genesis_do_subnav' );
    // add primary & secondary nav to top of the page
    add_action( 'genesis_before', 'genesis_do_nav' );
    add_action( 'genesis_before', 'genesis_do_subnav' );

    // filter menu args for bootstrap walker and other settings
    add_filter( 'wp_nav_menu_args', 'bsg_nav_menu_args_filter' );

    // add bootstrap markup around the nav
    add_filter( 'wp_nav_menu', 'bsg_nav_menu_markup_filter', 10, 2 );
}

function bsg_nav_menu_args_filter( $args ) {

    if (
        'primary' === $args['theme_location'] ||
        'secondary' === $args['theme_location']
    ) {
        $args['depth'] = 2;
        $args['menu_class'] = 'nav';
        $args['walker'] = new wp_bootstrap_navwalker();
    }

    return $args;
}

function bsg_nav_menu_markup_filter( $html, $args ) {

    $output = '<div class="navbar">' .
        '<div class="navbar-inner">' .
            '<div class="container-fluid">';
                $output .= '<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="';
                    $output .= '.nav-collapse' . sanitize_html_class( '-' . $args->theme_location );
                    $output .= '">' .
                    '<span class="icon-bar"></span>' .
                    '<span class="icon-bar"></span>' .
                    '<span class="icon-bar"></span>' .
                '</button>';
                //'<a class="brand" id="logo" title="Programming, parenting, and an abundance of other topics" href="http://salferrarello.com">Sal Ferrarello</a>' .
                $output .= '<div class="nav-collapse collapse ';
                    $output .= 'nav-collapse' . sanitize_html_class( '-' . $args->theme_location );
                $output .= '">';
                    $output .= $html .
                '</div>' .
            '</div>' .
        '</div>' .
    '</div>';

    return $output;
}

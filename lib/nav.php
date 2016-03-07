<?php

if (
    class_exists('UberMenu')
    || class_exists('UberMenuStandard')
) {
    return;
}
// remove primary & secondary nav from default position
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
// add primary & secondary nav to top of the page
add_action( 'genesis_before', 'genesis_do_nav' );
add_action( 'genesis_before', 'genesis_do_subnav' );



add_filter( 'genesis_do_nav', 'bsg_genesis_menu_args_filter', 10, 3 );
add_filter( 'genesis_do_subnav', 'bsg_genesis_menu_args_filter', 10, 3 );
function bsg_genesis_menu_args_filter($nav_output, $nav, $args){

    $args['depth'] = 3;
    $args['menu_class'] = 'nav navbar-nav';
    $args['fallback_cb'] = 'wp_bootstrap_navwalker::fallback';
    $args['walker'] = new wp_bootstrap_navwalker();

    $nav = wp_nav_menu( $args );
    $sanitized_location = sanitize_key( $args['theme_location'] );

    $data_target = 'nav-collapse-' . $sanitized_location;
    $nav_markup = <<<EOT
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#{$data_target}">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
EOT;
    // only include blog name and description in the nav
    // if it is the primary nav location
    if ( 'primary' === $sanitized_location ) {
        $nav_markup .= apply_filters( 'bsg_navbar_brand', bsg_navbar_brand_markup() );
    }

    $nav_markup .= '</div>'; // .navbar-header
    $nav_markup .= '<div class="collapse navbar-collapse" id="'.$data_target.'">';
    $nav_markup .= $nav;
    $nav_markup .= '</div>'; // .collapse .navbar-collapse

    $nav_markup_open  = sprintf( '<nav %s>', genesis_attr( 'nav-' . $sanitized_location ) ) . '<div class="container-fluid">';
	$nav_markup_close  = '</div></nav>';
	$nav_output = $nav_markup_open . $nav_markup . $nav_markup_close;

	return $nav_output;
}



function bsg_navbar_brand_markup() {
    $output = '<a class="navbar-brand" id="logo" title="' .
        esc_attr( get_bloginfo( 'description' ) ) .
        '" href="' .
            esc_url( home_url( '/' ) ) .
    '">';
        $output .= get_bloginfo( 'name' );
    $output .= '</a>';

    return $output;
}

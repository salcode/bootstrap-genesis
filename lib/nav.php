<?php

if ( class_exists('UberMenuStandard') ) {
    return;
}
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

function bsg_nav_menu_args_filter( $args ) {

    if (
        'primary' === $args['theme_location'] ||
        'secondary' === $args['theme_location']
    ) {
        $args['depth'] = 2;
        $args['menu_class'] = 'nav navbar-nav';
        $args['fallback_cb'] = 'wp_bootstrap_navwalker::fallback';
        $args['walker'] = new wp_bootstrap_navwalker();
    }

    return $args;
}

function bsg_nav_menu_markup_filter( $html, $args ) {
    // only add additional Bootstrap markup to
    // primary and secondary nav locations
    if (
        'primary'   !== $args->theme_location &&
        'secondary' !== $args->theme_location
    ) {
        return $html;
    }

    $data_target = "nav-collapse" . sanitize_html_class( '-' . $args->theme_location );
    $output = <<<EOT
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
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
        if ( 'primary' === $args->theme_location ) {
            $output .= '<a class="navbar-brand" id="logo" title="' .
                esc_attr( get_bloginfo( 'description' ) ) .
                '" href="' .
                    esc_url( home_url( '/' ) ) .
            '">';
                $output .= get_bloginfo( 'name' );
            $output .= '</a>';
        }

        $output .= '</div>'; // .navbar-header

        $output .= "<div class=\"collapse navbar-collapse\" id=\"{$data_target}\">";
            $output .= $html;
        $output .= '</div>'; // .collapse .navbar-collapse

    $output .= '</div>'; // .container-fluid
    return $output;
}


function bsg_remove_primary_bottom_margin() {
?>
  <style type="text/css">
  nav.nav-primary.navbar.navbar-default.navbar-static-top {
      margin-bottom: 0px!important;
  }
  </style>
<?php
}


function bsg_has_nav_menu_primary_secondary_check() {
  if ( has_nav_menu( 'primary' ) && has_nav_menu( 'secondary' ) ) {
        add_action('wp_head', 'bsg_remove_primary_bottom_margin');
  }
}
add_action('get_header', 'bsg_has_nav_menu_primary_secondary_check');

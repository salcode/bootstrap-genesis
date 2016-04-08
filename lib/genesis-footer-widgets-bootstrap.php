<?php

add_filter( 'footer-widgets-single-wrap', function( $markup, $footer_widgets_count ) {
    return '<div class="footer-widgets-%d widget-area col-sm-3">%s</div>';
}, 10, 2 );

function bsg_has_footer_widgets() {
	$footer_widgets = get_theme_support( 'genesis-footer-widgets' );
	return ( $footer_widgets && isset( $footer_widgets[0] ) && is_numeric( $footer_widgets[0] ) );
}

add_action( 'genesis_before_footer', function() {
    if ( ! bsg_has_footer_widgets() ) { return; }
    ?>
    <div class="container">
        <div class="row">
    <?php
}, 9 );

add_action( 'genesis_before_footer', function() {
    if ( ! bsg_has_footer_widgets() ) { return; }
    ?>
        </div><!--  class="row" -->
    </div><!-- class="container" -->
    <?php
}, 11 );

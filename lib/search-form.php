<?php

// search-form same behavior as genesis with additional classes
// for bootstrap styling

add_filter( 'genesis_search_form', 'bsg_search_form', 10, 4);

function bsg_search_form( $form, $search_text, $button_text, $label ) {

    $value_or_placeholder = ( get_search_query() == '' ) ? 'placeholder' : 'value';

    $form = sprintf( '<form method="get" class="search-form" action="%s" role="search">%s<input type="search" class="search-query" name="s" %s="%s" /> <input type="submit" class="btn" value="%s" /></form>', home_url( '/' ), esc_html( $label ), $value_or_placeholder, esc_attr( $search_text ), esc_attr( $button_text ) );

    return $form;
}

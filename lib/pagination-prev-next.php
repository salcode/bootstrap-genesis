<?php
/**
 * Modify Previous Page / Next Page to use Bootstrap styling
 *
 * To generate the proper markup, we've recreated genesis_posts_nav()
 * and genesis_prev_next_posts_nav() since there was not a good way
 * to hook in and modify the markup.
 *
 * @since 0.7.0
 */
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
add_action( 'genesis_after_endwhile', 'bsg_genesis_posts_nav' );

/**
 * Replacement for genesis_posts_nav() that replaces the call to
 * genesis_prev_next_posts_nav() with
 * bsg_genesis_prev_next_posts_nav()
 *
 * @since 0.7.0
 */
function bsg_genesis_posts_nav() {
    if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
		genesis_numeric_posts_nav();
    } else {
        bsg_genesis_prev_next_posts_nav();
    }
}

/*
 * Replacement for genesis_prev_next_posts_nav() that uses the preferred
 * Bootstrap markup for Pager
 *
 * See http://getbootstrap.com/components/#aligned-links
 *
 * @since 0.7.0
 */
function bsg_genesis_prev_next_posts_nav() {
	$prev_link = get_previous_posts_link( apply_filters( 'genesis_prev_link_text', '<span aria-hidden="true">&larr;</span> ' . __( 'Previous Page', 'genesis' ) ) );
	$next_link = get_next_posts_link( apply_filters( 'genesis_next_link_text', __( 'Next Page', 'genesis' ) . ' <span aria-hidden="true">&rarr;</span>' ) );

	$prev = $prev_link ? '<li class="previous">' . $prev_link . '</li>' : '';
	$next = $next_link ? '<li class="next">' . $next_link . '</li>' : '';

	$nav = genesis_markup( array(
		'html5'   => '<nav %s><ul class="pager">',
		'xhtml'   => '<div class="navigation"><ul class="pager">',
		'context' => 'archive-pagination',
		'echo'    => false,
	) );

	$nav .= $prev;
	$nav .= $next;
	$nav .= genesis_html5() ? '</ul></nav>' : '</ul></div>';

	if ( $prev || $next )
		echo $nav;

}

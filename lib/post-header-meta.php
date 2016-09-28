<?php
/**
 * Modify a post entry's meta header info
 *
 * @since 0.7.0
 */

 // Customize entry meta in the entry header
 add_filter( 'genesis_post_info', 'bsg_post_info_filter' );
 
 function bsg_post_info_filter( $post_info ) {
 	$post_info = '[post_date] by [post_author_posts_link] | [post_comments] [post_edit]';

 	return $post_info;
 }
 
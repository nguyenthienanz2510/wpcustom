<?php
/**
 * All core theme actions.
 *
 * Please do not modify this file directly.
 * You may remove actions in your child theme by using remove_action().
 *
 * Please see /inc/partials.php for the list of partials,
 * added to actions.
 *
 * @package Copenhagen
 */

/**
 * Body
 */

add_action( 'mbf_header_before', 'mbf_notification_bar' );
add_action( 'mbf_site_before', 'mbf_offcanvas' );
add_action( 'mbf_main_content_before', 'mbf_breadcrumbs', 100 );

/**
 * Main
 */
add_action( 'mbf_main_before', 'mbf_page_header', 100 );

/**
 * Singular
 */
add_action( 'mbf_entry_content_before', 'mbf_singular_post_type_before', 10 );
add_action( 'mbf_entry_content_after', 'mbf_singular_post_type_after', 999 );

/**
 * Entry Header
 */
add_action( 'mbf_main_before', 'mbf_entry_header', 10 );
add_action( 'mbf_main_before', 'mbf_entry_media', 10 );

/**
 * Entry Sections
 */
add_action( 'mbf_entry_content_after', 'mbf_page_pagination', 10 );
add_action( 'mbf_entry_content_after', 'mbf_entry_tags', 20 );
add_action( 'mbf_entry_content_after', 'mbf_entry_footer', 20 );
add_action( 'mbf_entry_content_after', 'mbf_entry_prev_next', 30 );
add_action( 'mbf_entry_wrap_end', 'mbf_entry_comments', 10 );

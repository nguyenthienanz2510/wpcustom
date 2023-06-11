<?php
/**
 * WooCommerce theme breadcrumbs
 *
 * @package Copenhagen
 */

/**
 * Change the breadcrumb delimiter
 *
 * @param array $defaults The defaults.
 */
function wcc_change_breadcrumb_delimiter( $defaults ) {

	$defaults['delimiter'] = ' <span class="mbf-separator"></span> ';

	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );

/**
 * WC Breadcrumbs
 *
 * @param bool $echo Output type.
 */
function mbf_wc_breadcrumbs( $echo = true ) {
	$display_options = get_option( 'wpseo_titles' );

	if ( ! isset( $display_options['breadcrumbs-enable'] ) ) {
		$display_options['breadcrumbs-enable'] = false;
	}

	ob_start();
	if ( function_exists( 'yoast_breadcrumb' ) && $display_options['breadcrumbs-enable'] ) {
		yoast_breadcrumb( '<div class="mbf-breadcrumbs" id="breadcrumbs">', '</div>' );
	} else {
		woocommerce_breadcrumb();
	}

	if ( $echo ) {
		return ob_end_flush();
	}

	return ob_get_clean();
}

/**
 * WC Change Theme Breadcrumbs
 */
function mbf_wc_theme_breadcrumbs() {

	if ( is_front_page() ) {
		return;
	}

	if ( mbf_doing_request() ) {
		return;
	}

	mbf_wc_breadcrumbs();

	return false;
}
add_filter( 'mbf_breadcrumbs', 'mbf_wc_theme_breadcrumbs' );

/**
 * Reassign default breadcrumbs
 */
function mbf_wc_reassign_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_action( 'template_redirect', 'mbf_wc_reassign_breadcrumbs' );

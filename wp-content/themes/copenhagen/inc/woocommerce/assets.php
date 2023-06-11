<?php
/**
 * WooCommerce assets
 *
 * @package Copenhagen
 */

/**
 * Enqueues WooCommerce assets.
 */
function mbf_wc_enqueue_scripts() {
	$theme = wp_get_theme();

	$version = $theme->get( 'Version' );

	// Register WooCommerce styles.
	wp_register_style( 'mbf_css_wc', mbf_style( get_template_directory_uri() . '/assets/css/woocommerce.css' ), array(), $version );

	wp_add_inline_style( 'mbf_css_wc', ':root {
		--mbf-wc-label-products: "' . esc_html__( 'Products', 'copenhagen' ) . '";
		--mbf-wc-label-cart: "' . esc_html__( 'Cart', 'copenhagen' ) . '";
		--mbf-wc-label-delete: "' . esc_html__( 'Delete', 'copenhagen' ) . '";
	}' );

	// Enqueue WooCommerce styles.
	wp_enqueue_style( 'mbf_css_wc' );

	// Add RTL support.
	wp_style_add_data( 'mbf_css_wc', 'rtl', 'replace' );

	// Remove selectWoo.
	wp_dequeue_style( 'selectWoo' );
	wp_dequeue_script( 'selectWoo' );
}
add_action( 'wp_enqueue_scripts', 'mbf_wc_enqueue_scripts' );

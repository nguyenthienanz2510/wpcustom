<?php
/**
 * WooCommerce filters.
 *
 * @package Copenhagen
 */

/**
 * Adds classes to <body> tag
 *
 * @param array $classes is an array of all body classes.
 */
function mbf_woocommerce_body_class( $classes ) {

	$classes[] = 'mbf-gallery-layout-' . get_theme_mod( 'woocommerce_product_gallery_layout', 'slider-column' );

	if ( ! is_user_logged_in() && is_account_page() ) {
		$classes[] = 'woocommerce-account-no-logged';
	}

	return $classes;
}
add_filter( 'body_class', 'mbf_woocommerce_body_class' );

/**
 * Change sale flash label
 *
 * @param string $label The label.
 */
function mbf_woocommerce_sale_flash( $label ) {

	$label = '<span class="onsale">' . esc_html__( 'Sale', 'copenhagen' ) . '</span>';

	return $label;
}
add_filter( 'woocommerce_sale_flash', 'mbf_woocommerce_sale_flash' );

/**
 * Change default address fields
 *
 * @param array $fields The fields.
 */
function mbf_woocommerce_default_address_fields( $fields ) {

	foreach ( $fields as $key => $field ) {
		if ( isset( $fields[ $key ]['label'] ) && $fields[ $key ]['label'] ) {

			if ( ! isset( $fields[ $key ]['placeholder'] ) || ! $fields[ $key ]['placeholder'] ) {
				$fields[ $key ]['placeholder'] = $fields[ $key ]['label'];
			}

			$fields[ $key ]['label'] = __return_empty_string();

			if ( isset( $fields[ $key ]['required'] ) && $fields[ $key ]['required'] ) {
				$fields[ $key ]['placeholder'] .= ' *';
			}
		}
	}

	return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'mbf_woocommerce_default_address_fields' );

/**
 * Change checkout fields
 *
 * @param array $sections The sections.
 */
function mbf_woocommerce_checkout_fields( $sections ) {

	foreach ( $sections as $j => $section ) {
		foreach ( $section as $i => $field ) {
			if ( isset( $sections[ $j ][ $i ]['label'] ) && $sections[ $j ][ $i ]['label'] ) {

				if ( ! isset( $sections[ $j ][ $i ]['placeholder'] ) || ! $sections[ $j ][ $i ]['placeholder'] ) {
					$sections[ $j ][ $i ]['placeholder'] = $sections[ $j ][ $i ]['label'];
				}

				$sections[ $j ][ $i ]['label'] = __return_empty_string();

				if ( isset( $sections[ $j ][ $i ]['required'] ) && $sections[ $j ][ $i ]['required'] ) {
					$sections[ $j ][ $i ]['placeholder'] .= ' *';
				}
			}
		}
	}

	return $sections;
}
add_filter( 'woocommerce_checkout_fields', 'mbf_woocommerce_checkout_fields' );

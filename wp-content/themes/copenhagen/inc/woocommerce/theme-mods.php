<?php
/**
 * WooCommerce theme mods
 *
 * @package Copenhagen
 */

/**
 * Add fields to WooCommerce.
 */
function mbf_wc_add_fields_customizer() {
	MBF_Customizer::add_section(
		'woocommerce_common_settings',
		array(
			'title' => esc_html__( 'Common Settings', 'copenhagen' ),
			'panel' => 'woocommerce',
		)
	);

	MBF_Customizer::add_field(
		array(
			'type'     => 'text',
			'settings' => 'woocommerce_product_catalog_offcanvas_label',
			'label'    => esc_html__( 'Off-canvas Label', 'copenhagen' ),
			'section'  => 'woocommerce_product_catalog',
			'default'  => esc_html__( 'Filters', 'copenhagen' ),
		)
	);

	MBF_Customizer::add_field(
		array(
			'type'     => 'checkbox',
			'settings' => 'woocommerce_product_catalog_cart',
			'label'    => esc_html__( 'Display add to cart bottom', 'copenhagen' ),
			'section'  => 'woocommerce_product_catalog',
			'default'  => false,
		)
	);

	MBF_Customizer::add_section(
		'woocommerce_product_page',
		array(
			'title' => esc_html__( 'Product Page', 'copenhagen' ),
			'panel' => 'woocommerce',
		)
	);

	MBF_Customizer::add_field(
		array(
			'type'     => 'radio',
			'settings' => 'woocommerce_product_gallery_layout',
			'label'    => esc_html__( 'Product Gallery Layout', 'copenhagen' ),
			'section'  => 'woocommerce_product_page',
			'default'  => 'slider-column',
			'choices'  => array(
				'slider-column' => esc_html__( 'Single Column', 'copenhagen' ),
				'slider'        => esc_html__( 'Slider', 'copenhagen' ),
			),
		)
	);

	MBF_Customizer::add_section(
		'woocommerce_product_misc',
		array(
			'title' => esc_html__( 'Miscellaneous', 'copenhagen' ),
			'panel' => 'woocommerce',
		)
	);

	MBF_Customizer::add_field(
		array(
			'type'     => 'checkbox',
			'settings' => 'woocommerce_header_hide_my_account',
			'label'    => esc_html__( 'Hide My Account in Header', 'copenhagen' ),
			'section'  => 'woocommerce_product_misc',
			'default'  => false,
		)
	);

	MBF_Customizer::add_field(
		array(
			'type'     => 'checkbox',
			'settings' => 'woocommerce_header_hide_icon',
			'label'    => esc_html__( 'Hide Cart Icon in Header', 'copenhagen' ),
			'section'  => 'woocommerce_product_misc',
			'default'  => false,
		)
	);
}
add_action( 'init', 'mbf_wc_add_fields_customizer' );

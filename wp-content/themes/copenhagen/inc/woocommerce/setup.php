<?php
/**
 * WooCommerce setup
 *
 * @package Copenhagen
 */

/**
 * Add support WooCommerce.
 */
add_theme_support(
	'woocommerce',
	array(
		'thumbnail_image_width'         => 712,
		'single_image_width'            => 1200,
		'gallery_thumbnail_image_width' => ( 'slider' === get_theme_mod( 'woocommerce_product_gallery_layout', 'slider-column' ) ) ? 300 : 1200,
	)
);

add_theme_support( 'wc-product-gallery-lightbox' );

if ( 'slider' === get_theme_mod( 'woocommerce_product_gallery_layout', 'slider-column' ) ) {
	add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Register WooCommerce Sidebar
 */
function mbf_wc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Off-canvas', 'copenhagen' ),
			'id'            => 'shop-offcanvas',
			'before_widget' => '<div class="widget %1$s %2$s">',
			'after_widget'  => '</div>',
		)
	);
}
add_action( 'widgets_init', 'mbf_wc_widgets_init' );

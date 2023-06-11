<?php
/**
 * WooCommerce common
 *
 * @package Copenhagen
 */

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

/**
 * Shop Off-canvas
 */
function mbf_shop_offcanvas() {
	get_template_part( 'woocommerce/shop-offcanvas' );
}
add_action( 'mbf_site_before', 'mbf_shop_offcanvas' );

/**
 * Shop Minicart
 */
function mbf_shop_minicart() {
	get_template_part( 'woocommerce/shop-minicart' );
}
add_action( 'mbf_site_before', 'mbf_shop_minicart' );

/**
 * Wrapper Start
 */
function mbf_wc_wrapper_start() {
	?>
	<div id="primary" class="mbf-content-area">

		<?php
		/**
		 * The mbf_wc_main_before hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'mbf_wc_main_before' );
		?>

		<div class="woocommerce-area">
	<?php
}
add_action( 'woocommerce_before_main_content', 'mbf_wc_wrapper_start', 1 );

/**
 * Wrapper End
 */
function mbf_wc_wrapper_end() {
	?>
		</div>
	</div>
	<?php
}
add_action( 'woocommerce_after_main_content', 'mbf_wc_wrapper_end', 999 );

/**
 * Add subheader to products - Start
 */
function mbf_wc_products_subheader_start() {
	?>
	<div class="woocommerce-products-subheader">
		<?php if ( is_active_sidebar( 'shop-offcanvas' ) ) { ?>
			<a class="mbf-shop-offcanvas__toggle">
				<?php echo esc_html( get_theme_mod( 'woocommerce_product_catalog_offcanvas_label', esc_html__( 'Filters', 'copenhagen' ) ) ); ?>
			</a>
		<?php } ?>
	<?php
}
add_action( 'woocommerce_before_shop_loop', 'mbf_wc_products_subheader_start', 15 );

/**
 * Add subheader to products - End
 */
function mbf_wc_products_subheader_end() {
	?>
	</div>
	<?php
}
add_action( 'woocommerce_before_shop_loop', 'mbf_wc_products_subheader_end', 999 );

/**
 * The product image itself is hooked in at priority 10 using woocommerce_template_loop_product_thumbnail(),
 * so priority 9 and 11 are used to open and close the div.
 */
add_action( 'woocommerce_before_shop_loop_item_title', function() {
	echo '<div class="woocommerce-thumbnail">';
}, 9 );

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	echo '</div>';
}, 11 );

/**
 * Woocommerce loop add to cart
 */
function mbf_wc_shop_loop_item() {
	if ( ! get_theme_mod( 'woocommerce_product_catalog_cart', false ) ) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	}
}
add_action( 'template_redirect', 'mbf_wc_shop_loop_item' );

/**
 * Add excerpt to products
 */
function mbf_wc_products_excerpt() {
	if ( has_excerpt() ) {
		?>
		<div class="woocommerce-excerpt">
			<?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?>
		</div>
		<?php
	}
}
add_action( 'woocommerce_shop_loop_item_title', 'mbf_wc_products_excerpt', 40 );

/**
 * Add hover image to shop
 *
 * @param string $image  The image.
 * @param object $object The object.
 */
function mbf_wc_product_hover_image( $image, $object ) {

	if ( is_admin() ) {
		return $image;
	}

	$attachment_ids = $object->get_gallery_image_ids();

	if ( is_array( $attachment_ids ) && $attachment_ids ) {

		foreach ( $attachment_ids as $attachment_id ) {
			$attachment_id = wp_get_attachment_image( $attachment_id, 'woocommerce_thumbnail', false, array(
				'class' => 'woocommerce-hover-image',
			) );

			$image = $attachment_id . $image;

			break;
		}
	}

	return $image;
}
add_filter( 'woocommerce_product_get_image', 'mbf_wc_product_hover_image', 10, 2 );

if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_title() {
		/**
		 * The woocommerce_product_loop_title_classes hook.
		 *
		 * @since 1.0.0
		 */
		echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '"><span>' . wp_kses( get_the_title(), 'post' ) . '</span></h2>';
	}
}

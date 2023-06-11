<?php
/**
 * WooCommerce theme header
 *
 * @package Copenhagen
 */

/**
 * Add my account to header
 *
 * @param array $settings The advanced settings.
 */
function mbf_wc_header_my_account( $settings = array() ) {

	if ( ! get_theme_mod( 'woocommerce_header_hide_my_account', false ) ) {
		$myaccount_page = wc_get_page_id( 'myaccount' );

		if ( $myaccount_page ) {
			?>
			<a class="mbf-header__my-account" href="<?php echo esc_url( get_permalink( $myaccount_page ) ); ?>">
				<span><?php esc_html_e( 'My Account', 'copenhagen' ); ?></span>
			</a>
			<?php
		}
	}
}

/**
 * Add cart to header
 *
 * @param array $settings The advanced settings.
 */
function mbf_wc_header_cart( $settings = array() ) {

	if ( ! get_theme_mod( 'woocommerce_header_hide_icon', false ) ) {

		$quantity = intval( WC()->cart->get_cart_contents_count() );
		?>
		<a class="mbf-header__cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'copenhagen' ); ?>">
			<i class="mbf-icon mbf-icon-cart"></i>
			<div class="mbf-header__cart-label">
				<span><?php esc_html_e( 'Cart', 'copenhagen' ); ?></span>
			</div>
			<?php if ( $quantity ) { ?>
				<span class="mbf-header__cart-quantity"><?php echo esc_html( $quantity ); ?></span>
			<?php } ?>
		</a>
		<?php
	}
}

/**
 * Add location for update nav cart
 *
 * @param array $fragments The cart fragments.
 */
function mbf_wc_update_nav_cart( $fragments ) {

	ob_start();

	mbf_wc_header_cart();

	$fragments['a.mbf-header__cart'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'mbf_wc_update_nav_cart', 10, 1 );

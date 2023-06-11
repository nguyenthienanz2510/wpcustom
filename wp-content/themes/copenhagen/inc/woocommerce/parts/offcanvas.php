<?php
/**
 * WooCommerce theme offcanvas
 *
 * @package Copenhagen
 */

/**
 * Add my account to offcanvas
 *
 * @param array $settings The advanced settings.
 */
function mbf_off_canvas_my_account( $settings = array() ) {

	if ( ! get_theme_mod( 'woocommerce_header_hide_my_account', false ) ) {
		$myaccount_page = wc_get_page_id( 'myaccount' );

		if ( $myaccount_page ) {
			?>
			<a class="mbf-offcanvas__my-account" href="<?php echo esc_url( get_permalink( $myaccount_page ) ); ?>">
				<span><?php esc_html_e( 'My Account', 'copenhagen' ); ?></span>
			</a>
			<?php
		}
	}
}

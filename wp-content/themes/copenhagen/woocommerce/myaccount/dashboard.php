<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'div'  => array(
		'class' => array(),
	),
	'span' => array(
		'class' => array(),
	),
	'a'    => array(
		'href' => array(),
	),
);
?>

<div class="woocommerce-MyAccount-dashboard">
	<div class="woocommerce-MyAccount-dashboard-hello">
		<?php
		printf(
			/* translators: 1: user display name 2: logout url */
			wp_kses( __( '<div>Hello %1$s!</div> <span>Not %1$s? <a href="%2$s">Log out</a></span>', 'copenhagen' ), $allowed_html ),
			esc_html( $current_user->display_name ),
			esc_url( wc_logout_url() )
		);
		?>
	</div>

	<div class="woocommerce-MyAccount-dashboard-info">
		<?php
		/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
		$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'copenhagen' );
		if ( wc_shipping_enabled() ) {
			/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
			$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'copenhagen' );
		}
		printf(
			wp_kses( $dashboard_desc, $allowed_html ),
			esc_url( wc_get_endpoint_url( 'orders' ) ),
			esc_url( wc_get_endpoint_url( 'edit-address' ) ),
			esc_url( wc_get_endpoint_url( 'edit-account' ) )
		);
		?>
	</div>

	<?php
		/**
		 * My Account dashboard.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_dashboard' );

		/**
		 * Deprecated woocommerce_before_my_account action.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_before_my_account' );

		/**
		 * Deprecated woocommerce_after_my_account action.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_after_my_account' );

	/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

	?>

</div>
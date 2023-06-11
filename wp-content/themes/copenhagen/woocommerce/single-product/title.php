<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;
?>

<?php
if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) {
	$sku = $product->get_sku()
	?>

	<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'copenhagen' ); ?> <span class="sku"><?php call_user_func( 'printf', '%s', $sku ? $sku : esc_html__( 'N/A', 'copenhagen' ) ); ?></span></span>

<?php } ?>

<div class="product_meta">

	<?php
	/**
	 * The woocommerce_product_meta_start hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'woocommerce_product_meta_start' );
	?>

	<?php call_user_func( 'printf', '%s', wc_get_product_category_list( $product->get_id(), '', '', '' ) ); ?>

	<?php
	/**
	 * The woocommerce_product_meta_end hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'woocommerce_product_meta_end' );
	?>

</div>

<?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>

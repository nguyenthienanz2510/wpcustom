<?php
/**
 * The template part for displaying shop off-canvas area.
 *
 * @package Copenhagen
 */

if ( is_active_sidebar( 'shop-offcanvas' ) ) {
	?>

	<div class="mbf-shop-offcanvas-overlay"></div>

	<div class="mbf-shop-offcanvas">
		<div class="mbf-shop-offcanvas__header">
			<?php
			/**
			 * The mbf_shop_offcanvas_header_start hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mbf_shop_offcanvas_header_start' );
			?>

			<nav class="mbf-shop-offcanvas__nav">
				<span class="mbf-shop-offcanvas__nav-headline">
					<span class="mbf-shop-offcanvas__nav-headline-label">
						<?php echo esc_html( get_theme_mod( 'woocommerce_product_catalog_offcanvas_label', esc_html__( 'Filters', 'copenhagen' ) ) ); ?>
					</span>
				</span>

				<span class="mbf-shop-offcanvas__toggle" role="button"><i class="mbf-icon mbf-icon-x"></i></span>
			</nav>

			<?php
			/**
			 * The mbf_shop_offcanvas_header_end hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mbf_shop_offcanvas_header_end' );
			?>
		</div>
		<aside class="mbf-shop-offcanvas__sidebar">
			<div class="mbf-shop-offcanvas__inner mbf-shop-offcanvas__area mbf-widget-area">
				<?php dynamic_sidebar( 'shop-offcanvas' ); ?>
			</div>
		</aside>
	</div>
	<?php
}

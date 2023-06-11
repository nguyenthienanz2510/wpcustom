<?php
/**
 * WooCommerce single product
 *
 * @package Copenhagen
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
remove_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 70 );
add_action( 'woocommerce_review_after_comment_text', 'woocommerce_review_display_meta', 70 );

/**
 * Single Wrapper Start
 */
function mbf_wc_single_wrapper_start() {
	?>
	<div class="mbf-single-product">
	<?php
}
add_action( 'woocommerce_before_single_product', 'mbf_wc_single_wrapper_start', 1 );

/**
 * Single Wrapper End
 */
function mbf_wc_single_wrapper_end() {
	?>
	</div>
	<?php
}
add_action( 'woocommerce_after_single_product', 'mbf_wc_single_wrapper_end', 999 );

/**
 * Single Product Summary Inner Start
 */
function mbf_wc_single_product_summary_inner_start() {
	?>
	<div class="entry-summary-inner">
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'mbf_wc_single_product_summary_inner_start', 25 );

/**
 * Single Product Summary Inner End
 */
function mbf_wc_single_product_summary_inner_end() {
	?>
	</div>
	<?php
}
add_action( 'woocommerce_after_single_product_summary', 'mbf_wc_single_product_summary_inner_end', 998 );

/**
 * Single Product Summary Start
 */
function mbf_wc_single_product_summary_start() {
	?>
	<div class="mbf-single-product-summary-wrap">
		<div class="mbf-single-product-summary">
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'mbf_wc_single_product_summary_start', 1 );

/**
 * Single Product Summary End
 */
function mbf_wc_single_product_summary_end() {
	?>
		</div>
	</div>
	<?php
	woocommerce_upsell_display();
	woocommerce_output_related_products();
}
add_action( 'woocommerce_after_single_product_summary', 'mbf_wc_single_product_summary_end', 999 );

/**
 * Change related products heading
 *
 * @param string $heading The heading.
 */
function mbf_wc_product_related_products_heading( $heading ) {

	$heading = esc_html__( 'You May Also Like', 'copenhagen' );

	return $heading;
}
add_filter( 'woocommerce_product_related_products_heading', 'mbf_wc_product_related_products_heading' );

/**
 * Change upsells products heading
 *
 * @param string $heading The heading.
 */
function mbf_wc_product_upsells_products_heading( $heading ) {

	$heading = esc_html__( 'Similar Products', 'copenhagen' );

	return $heading;
}
add_filter( 'woocommerce_product_upsells_products_heading', 'mbf_wc_product_upsells_products_heading' );

/**
 * Change dropdown variation attribute options_args
 *
 * @param array $args The args.
 */
function mbf_wc_dropdown_variation_attribute_options_args( $args ) {

	$args['show_option_none'] = esc_html__( 'Choose', 'copenhagen' );

	return $args;
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'mbf_wc_dropdown_variation_attribute_options_args' );

/**
 * Change review comment form args
 *
 * @param array $args The args.
 */
function mbf_wc_change_review_comment_form_args( $args ) {

	$args['comment_field']    = str_replace( 'name="comment"', sprintf( 'name="comment" placeholder="%s"', esc_html__( 'Your review *', 'copenhagen' ) ), $args['comment_field'] );
	$args['fields']['author'] = str_replace( 'name="author"', sprintf( 'name="author" placeholder="%s"', esc_html__( 'Name *', 'copenhagen' ) ), $args['fields']['author'] );
	$args['fields']['email']  = str_replace( 'name="email"', sprintf( 'name="email" placeholder="%s"', esc_html__( 'Email *', 'copenhagen' ) ), $args['fields']['email'] );

	return $args;
}
add_filter( 'woocommerce_product_review_comment_form_args', 'mbf_wc_change_review_comment_form_args' );

<?php
/**
 * Register block styles
 *
 * @package Copenhagen
 */

/**
 * Register block styles.
 */
function mbf_register_block_styles() {
	if ( function_exists( 'register_block_style' ) ) {

		register_block_style( 'core/heading', array(
			'name'  => 'mbf-heading-primary',
			'label' => esc_html__(  'Primary', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-1',
			'label' => esc_html__(  'Layout 1', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-2',
			'label' => esc_html__(  'Layout 2', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-3',
			'label' => esc_html__(  'Layout 3', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-fullwidth',
			'label' => esc_html__(  'Fullwidth', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-container',
			'label' => esc_html__(  'Container', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-fullheight',
			'label' => esc_html__(  'Fullheight', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-fullheight-alt',
			'label' => esc_html__(  'Fullheight Alt', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-group-short-width',
			'label' => esc_html__(  'Short Width', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-group-wide-width',
			'label' => esc_html__(  'Wide Width', 'copenhagen' ),
		) );

		register_block_style('core/group', array(
			'name'  => 'mbf-post-meta',
			'label' => esc_html__( 'Post Meta', 'copenhagen')
			)
		);

		register_block_style( 'core/group', array(
			'name'  => 'mbf-post-image',
			'label' => esc_html__(  'Post Image', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-parallax-image',
			'label' => esc_html__(  'Parallax Image', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-flex-container',
			'label' => esc_html__(  'Flex Container', 'copenhagen' ),
		) );

		register_block_style( 'core/separator', array(
			'name'  => 'mbf-separator-easy-line',
			'label' => esc_html__(  'Easy Line', 'copenhagen' ),
		) );

		register_block_style( 'woocommerce/featured-category', array(
			'name'  => 'mbf-featured-category-parallax',
			'label' => esc_html__(  'Parallax', 'copenhagen' ),
		) );

		register_block_style( 'core/image', array(
			'name'  => 'mbf-animation-parallax',
			'label' => esc_html__(  'Parallax Style', 'copenhagen' ),
		) );

		register_block_style( 'core/columns', array(
			'name'  => 'mbf-columns-gap-xs',
			'label' => esc_html__(  'Gap XS 1', 'copenhagen' ),
		) );

		register_block_style( 'core/columns', array(
			'name'  => 'mbf-columns-gap-xs-2',
			'label' => esc_html__(  'Gap XS 2', 'copenhagen' ),
		) );

		register_block_style( 'core/columns', array(
			'name'  => 'mbf-columns-gap-xss',
			'label' => esc_html__(  'Gap 2px', 'copenhagen' ),
		) );

		register_block_style( 'core/columns', array(
			'name'  => 'mbf-columns-posts',
			'label' => esc_html__(  'Columns for Posts', 'copenhagen' ),
		) );

		register_block_style( 'core/post-template', array(
			'name'  => 'mbf-post-template-buttom-border',
			'label' => esc_html__(  'Bottom Border', 'copenhagen' ),
		) );

		register_block_style( 'core/post-featured-image', array(
			'name'  => 'mbf-post-featured-image-landscape',
			'label' => esc_html__(  'Landscape', 'copenhagen' ),
		) );

		register_block_style( 'core/button', array(
			'name'  => 'mbf-button-arrow',
			'label' => esc_html__(  'Theme Arrow', 'copenhagen' ),
		) );

		register_block_style( 'core/buttons', array(
			'name'  => 'mbf-buttons-fullheight',
			'label' => esc_html__(  'Fullheight', 'copenhagen' ),
		) );

		register_block_style( 'core/button', array(
			'name'  => 'mbf-button-outline',
			'label' => esc_html__(  'Theme Outline', 'copenhagen' ),
		) );

		register_block_style( 'core/button', array(
			'name'  => 'mbf-button-outline-arrow',
			'label' => esc_html__(  'Theme Outline Arrow', 'copenhagen' ),
		) );

		register_block_style( 'core/paragraph', array(
			'name'  => 'mbf-paragraph-short-width',
			'label' => esc_html__(  'Short Width', 'copenhagen' ),
		) );

		register_block_style( 'core/heading', array(
			'name'  => 'mbf-heading-without-margin',
			'label' => esc_html__(  'Without Margin', 'copenhagen' ),
		) );

		register_block_style( 'core/paragraph', array(
			'name'  => 'mbf-paragraph-without-margin',
			'label' => esc_html__(  'Without Margin', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-1',
			'label' => esc_html__(  'Top 1', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-2',
			'label' => esc_html__(  'Top 2', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-3',
			'label' => esc_html__(  'Top 3', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-4',
			'label' => esc_html__(  'Top 4', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-5',
			'label' => esc_html__(  'Top 5', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-6',
			'label' => esc_html__(  'Top 6', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-minus-1',
			'label' => esc_html__(  'Top 1 small', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-minus-2',
			'label' => esc_html__(  'Top 2 small', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-minus-3',
			'label' => esc_html__(  'Top 3 small', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-bottom-1',
			'label' => esc_html__(  'Bottom 1', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-bottom-2',
			'label' => esc_html__(  'Bottom 2', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-bottom-3',
			'label' => esc_html__(  'Bottom 3', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-bottom-4',
			'label' => esc_html__(  'Bottom 4', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-bottom-5',
			'label' => esc_html__(  'Bottom 5', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-bottom-minus-1',
			'label' => esc_html__(  'Bottom 1 small', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-bottom-minus-2',
			'label' => esc_html__(  'Bottom 2 small', 'copenhagen' ),
		) );

		register_block_style( 'core/group', array(
			'name'  => 'mbf-layout-margin-bottom-minus-3',
			'label' => esc_html__(  'Bottom 3 small', 'copenhagen' ),
		) );
	}
}
add_action( 'init', 'mbf_register_block_styles' );

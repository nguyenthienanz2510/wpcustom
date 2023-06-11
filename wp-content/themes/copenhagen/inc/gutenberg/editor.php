<?php
/**
 * Editor Settings.
 *
 * @package Copenhagen
 */

/**
 * Enqueue editor scripts
 */
function mbf_block_editor_scripts() {
	wp_enqueue_script(
		'mbf-editor-scripts',
		get_template_directory_uri() . '/assets/jsx/editor-scripts.js',
		array(
			'wp-editor',
			'wp-element',
			'wp-compose',
			'wp-data',
			'wp-plugins',
		),
		mbf_get_theme_data( 'Version' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'mbf_block_editor_scripts' );

/**
 * Adds classes to <div class="editor-styles-wrapper"> tag
 */
function mbf_block_editor_wrapper() {
	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return;
	}

	// Set post type.
	$post_type = sprintf( 'post-type-%s', get_post_type( $post_id ) );

	// Set page layout.
	$default_layout = mbf_get_page_sidebar( $post_id, 'default' );
	$page_layout    = mbf_get_page_sidebar( $post_id, false );

	if ( 'disabled' === $default_layout ) {
		$default_layout = 'mbf-sidebar-disabled';
	} else {
		$default_layout = 'mbf-sidebar-enabled';
	}

	if ( 'disabled' === $page_layout ) {
		$page_layout = 'mbf-sidebar-disabled';
	} else {
		$page_layout = 'mbf-sidebar-enabled';
	}

	wp_enqueue_script(
		'mbf-editor-wrapper',
		get_template_directory_uri() . '/assets/jsx/editor-wrapper.js',
		array(
			'wp-editor',
			'wp-element',
			'wp-compose',
			'wp-data',
			'wp-plugins',
		),
		mbf_get_theme_data( 'Version' ),
		true
	);

	wp_localize_script(
		'mbf-editor-wrapper',
		'cscoGWrapper',
		array(
			'post_type'      => $post_type,
			'default_layout' => $default_layout,
			'page_layout'    => $page_layout,
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'mbf_block_editor_wrapper' );

/**
 * Change editor color palette.
 */
function mbf_change_editor_color_palette() {
	// Editor Color Palette.
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Blue', 'copenhagen' ),
				'slug'  => 'blue',
				'color' => '#59BACC',
			),
			array(
				'name'  => esc_html__( 'Green', 'copenhagen' ),
				'slug'  => 'green',
				'color' => '#58AD69',
			),
			array(
				'name'  => esc_html__( 'Orange', 'copenhagen' ),
				'slug'  => 'orange',
				'color' => '#FFBC49',
			),
			array(
				'name'  => esc_html__( 'Red', 'copenhagen' ),
				'slug'  => 'red',
				'color' => '#e32c26',
			),
			array(
				'name'  => esc_html__( 'Pale Pink', 'copenhagen' ),
				'slug'  => 'pale-pink',
				'color' => '#f78da7',
			),
			array(
				'name'  => esc_html__( 'White', 'copenhagen' ),
				'slug'  => 'white',
				'color' => '#FFFFFF',
			),
			array(
				'name'  => esc_html__( 'Gray 50', 'copenhagen' ),
				'slug'  => 'gray-50',
				'color' => '#f8f9fa',
			),
			array(
				'name'  => esc_html__( 'Gray 100', 'copenhagen' ),
				'slug'  => 'gray-100',
				'color' => '#f8f9fb',
			),
			array(
				'name'  => esc_html__( 'Gray 200', 'copenhagen' ),
				'slug'  => 'gray-200',
				'color' => '#E0E0E0',
			),
			array(
				'name'  => esc_html__( 'Primary', 'copenhagen' ),
				'slug'  => 'primary',
				'color' => get_theme_mod( 'color_primary', '#5D6E71' ),
			),
			array(
				'name'  => esc_html__( 'Layout', 'copenhagen' ),
				'slug'  => 'layout',
				'color' => get_theme_mod( 'color_layout_background', '#f6f8f9' ),
			),
			array(
				'name'  => esc_html__( 'Border', 'copenhagen' ),
				'slug'  => 'border',
				'color' => get_theme_mod( 'color_border', '#AEBABC' ),
			),
			array(
				'name'  => esc_html__( 'Divider', 'copenhagen' ),
				'slug'  => 'divider',
				'color' => get_theme_mod( 'color_divider', '#5D6E72' ),
			),
			array(
				'name'  => esc_html__( 'Black', 'copenhagen' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
		)
	);
}
add_action( 'after_setup_theme', 'mbf_change_editor_color_palette' );

<?php
/**
 * Widgets Init
 *
 * Register sitebar locations for widgets.
 *
 * @package Copenhagen
 */

if ( ! function_exists( 'mbf_widgets_init' ) ) {
	/**
	 * Register sidebars
	 */
	function mbf_widgets_init() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Default Sidebar', 'copenhagen' ),
				'id'            => 'sidebar-main',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Off-canvas', 'copenhagen' ),
				'id'            => 'sidebar-offcanvas',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
			)
		);
	}
	add_action( 'widgets_init', 'mbf_widgets_init' );
}

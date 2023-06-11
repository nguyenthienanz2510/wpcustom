<?php
/**
 * Miscellaneous Settings
 *
 * @package Copenhagen
 */

MBF_Customizer::add_section(
	'miscellaneous',
	array(
		'title' => esc_html__( 'Miscellaneous Settings', 'copenhagen' ),
	)
);

MBF_Customizer::add_field(
	array(
		'type'              => 'textarea',
		'settings'          => 'misc_notification_bar',
		'label'             => esc_html__( 'Notification Bar', 'copenhagen' ),
		'section'           => 'miscellaneous',
		'sanitize_callback' => function( $val ) {
			return wp_kses( $val, 'content' );
		},
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'misc_sticky_sidebar',
		'label'    => esc_html__( 'Sticky Sidebar', 'copenhagen' ),
		'section'  => 'miscellaneous',
		'default'  => true,
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'radio',
		'settings'        => 'misc_sticky_sidebar_method',
		'label'           => esc_html__( 'Sticky Method', 'copenhagen' ),
		'section'         => 'miscellaneous',
		'default'         => 'mbf-stick-to-top',
		'choices'         => array(
			'mbf-stick-to-top'    => esc_html__( 'Sidebar top edge', 'copenhagen' ),
			'mbf-stick-to-bottom' => esc_html__( 'Sidebar bottom edge', 'copenhagen' ),
			'mbf-stick-last'      => esc_html__( 'Last widget top edge', 'copenhagen' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'misc_sticky_sidebar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

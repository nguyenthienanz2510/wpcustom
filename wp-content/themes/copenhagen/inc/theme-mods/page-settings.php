<?php
/**
 * Page Settings
 *
 * @package Copenhagen
 */

MBF_Customizer::add_section(
	'page_settings',
	array(
		'title' => esc_html__( 'Page Settings', 'copenhagen' ),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'radio',
		'settings' => 'page_header_type',
		'label'    => esc_html__( 'Page Header Type', 'copenhagen' ),
		'section'  => 'page_settings',
		'default'  => 'standard',
		'choices'  => array(
			'standard' => esc_html__( 'Standard', 'copenhagen' ),
			'title'    => esc_html__( 'Page Title Only', 'copenhagen' ),
			'none'     => esc_html__( 'None', 'copenhagen' ),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'radio',
		'settings'        => 'page_media_preview',
		'label'           => esc_html__( 'Standard Page Header Preview', 'copenhagen' ),
		'section'         => 'page_settings',
		'default'         => 'uncropped',
		'choices'         => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'copenhagen' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'copenhagen' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'page_header_type',
				'operator' => '==',
				'value'    => 'standard',
			),
		),
	)
);

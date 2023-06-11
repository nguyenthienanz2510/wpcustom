<?php
/**
 * Header Settings
 *
 * @package Copenhagen
 */

MBF_Customizer::add_section(
	'header',
	array(
		'title' => esc_html__( 'Header Settings', 'copenhagen' ),
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'collapsible',
		'settings'    => 'header_collapsible_common',
		'section'     => 'header',
		'label'       => esc_html__( 'Common', 'copenhagen' ),
		'input_attrs' => array(
			'collapsed' => true,
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'dimension',
		'settings' => 'header_initial_height',
		'label'    => esc_html__( 'Header Initial Height', 'copenhagen' ),
		'section'  => 'header',
		'default'  => '90px',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-header-initial-height',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'dimension',
		'settings' => 'header_height',
		'label'    => esc_html__( 'Header Height', 'copenhagen' ),
		'section'  => 'header',
		'default'  => '60px',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-header-height',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'dimension',
		'settings' => 'header_border_width',
		'label'    => esc_html__( 'Header Border Width', 'copenhagen' ),
		'section'  => 'header',
		'default'  => '2px',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-header-border-width',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'navbar_sticky',
		'label'       => esc_html__( 'Make navigation bar sticky', 'copenhagen' ),
		'description' => esc_html__( 'Enabling this option will make navigation bar visible when scrolling.', 'copenhagen' ),
		'section'     => 'header',
		'default'     => true,
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'navbar_smart_sticky',
		'label'           => esc_html__( 'Enable the smart sticky feature', 'copenhagen' ),
		'description'     => esc_html__( 'Enabling this option will reveal navigation bar when scrolling up and hide it when scrolling down.', 'copenhagen' ),
		'section'         => 'header',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'navbar_sticky',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'header_offcanvas',
		'label'    => esc_html__( 'Display offcanvas toggle button', 'copenhagen' ),
		'section'  => 'header',
		'default'  => false,
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'header_navigation_menu',
		'label'    => esc_html__( 'Display navigation menu', 'copenhagen' ),
		'section'  => 'header',
		'default'  => true,
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'header_navigation_secondary_menu',
		'label'    => esc_html__( 'Display navigation secondary menu', 'copenhagen' ),
		'section'  => 'header',
		'default'  => true,
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'header_collapsible_search',
		'section'  => 'header',
		'label'    => esc_html__( 'Search', 'copenhagen' ),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'header_search_button',
		'label'    => esc_html__( 'Display search button', 'copenhagen' ),
		'section'  => 'header',
		'default'  => true,
	)
);

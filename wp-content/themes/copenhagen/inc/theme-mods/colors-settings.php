<?php
/**
 * Colors
 *
 * @package Copenhagen
 */

MBF_Customizer::add_panel(
	'colors',
	array(
		'title' => esc_html__( 'Colors', 'copenhagen' ),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'radio',
		'settings' => 'color_scheme',
		'label'    => esc_html__( 'Site Color Scheme', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => 'system',
		'choices'  => array(
			'system' => esc_html__( 'User’s system preference', 'copenhagen' ),
			'light'  => esc_html__( 'Light', 'copenhagen' ),
			'dark'   => esc_html__( 'Dark', 'copenhagen' ),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'color_scheme_toggle',
		'label'    => esc_html__( 'Enable dark/light mode toggle', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => true,
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'divider',
		'settings' => wp_unique_id( 'divider' ),
		'section'  => 'colors',
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'color-alpha',
		'settings' => 'color_site_background',
		'label'    => esc_html__( 'Site Background', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => '#FFFFFF',
		'alpha'    => true,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-site-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'color-alpha',
		'settings' => 'color_site_background_is_dark',
		'label'    => esc_html__( 'Site Background Dark', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => '#1c1c1c',
		'alpha'    => true,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-site-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'color-alpha',
		'settings' => 'color_layout_background',
		'label'    => esc_html__( 'Layout Background', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => '#f6f8f9',
		'alpha'    => true,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-layout-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'color-alpha',
		'settings' => 'color_layout_background_is_dark',
		'label'    => esc_html__( 'Layout Background Dark', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => '#232323',
		'alpha'    => true,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-layout-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'color-alpha',
		'settings' => 'color_primary',
		'label'    => esc_html__( 'Primary Color', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => '#5D6E71',
		'alpha'    => true,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-primary-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'color-alpha',
		'settings' => 'color_primary_color_is_dark',
		'label'    => esc_html__( 'Primary Color Dark', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => '#c4c4c4',
		'alpha'    => true,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-primary-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'color-alpha',
		'settings' => 'color_accent',
		'label'    => esc_html__( 'Accent Color', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => '#000000',
		'alpha'    => true,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-accent-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'color-alpha',
		'settings' => 'color_accent_color_is_dark',
		'label'    => esc_html__( 'Accent Color Dark', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => '#FFFFFF',
		'alpha'    => true,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-accent-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'color_advanced_settings',
		'label'    => esc_html__( 'Display advanced color settings', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => false,
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'divider',
		'settings'        => wp_unique_id( 'divider' ),
		'section'         => 'colors',
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_button_background',
		'label'           => esc_html__( 'Button Background', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#5D6E71',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-button-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_button_background_is_dark',
		'label'           => esc_html__( 'Button Background Dark', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#3e3e3e',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-button-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_button',
		'label'           => esc_html__( 'Button Color', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#FFFFFF',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-button-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_button_color_is_dark',
		'label'           => esc_html__( 'Button Color Dark', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#FFFFFF',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-button-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_button_background_hover',
		'label'           => esc_html__( 'Button Hover Background', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#354548',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-button-hover-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_button_background_hover_is_dark',
		'label'           => esc_html__( 'Button Hover Background Dark', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#3e3e3e',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-button-hover-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_button_hover',
		'label'           => esc_html__( 'Button Hover Color', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#FFFFFF',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-button-hover-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_button_hover_color_is_dark',
		'label'           => esc_html__( 'Button Hover Color Dark', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#FFFFFF',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-button-hover-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_border',
		'label'           => esc_html__( 'Border Color', 'copenhagen' ),
		'description'     => esc_html__( 'Used on Form Inputs, Separators etc.', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#AEBABC',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-border-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_border_color_is_dark',
		'label'           => esc_html__( 'Border Color Dark', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#393939',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-border-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_divider',
		'label'           => esc_html__( 'Divider Color', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#5D6E72',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-divider-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_divider_color_is_dark',
		'label'           => esc_html__( 'Divider Color Dark', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => '#494949',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-divider-color',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_overlay',
		'label'           => esc_html__( 'Overlay Background', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => 'rgba(93,110,113, 0.125)',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-light-overlay-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'color_overlay_color_is_dark',
		'label'           => esc_html__( 'Overlay Background Dark', 'copenhagen' ),
		'section'         => 'colors',
		'default'         => 'rgba(0,0,0, 0.25)',
		'alpha'           => true,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-dark-overlay-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'color_advanced_border_settings',
		'label'    => esc_html__( 'Display border radius settings', 'copenhagen' ),
		'section'  => 'colors',
		'default'  => false,
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'divider',
		'settings'        => wp_unique_id( 'divider' ),
		'section'         => 'color_border_settings',
		'active_callback' => array(
			array(
				'setting'  => 'color_advanced_border_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'              => 'dimension',
		'settings'          => 'color_layout elements_border_radius',
		'label'             => esc_html__( 'Layout Elements Border Radius', 'copenhagen' ),
		'description'       => esc_html__( 'Used on Form Elements, Blockquotes, Block Groups etc.', 'copenhagen' ),
		'section'           => 'colors',
		'default'           => '5px',
		'sanitize_callback' => 'esc_html',
		'output'            => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-layout-elements-border-radius',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback'   => array(
			array(
				'setting'  => 'color_advanced_border_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'              => 'dimension',
		'settings'          => 'color_thumbnail_border_radius',
		'label'             => esc_html__( 'Thumbnail Border Radius', 'copenhagen' ),
		'section'           => 'colors',
		'default'           => '5px',
		'sanitize_callback' => 'esc_html',
		'output'            => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-thumbnail-border-radius',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback'   => array(
			array(
				'setting'  => 'color_advanced_border_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'              => 'dimension',
		'settings'          => 'color_button_border_radius',
		'label'             => esc_html__( 'Button Border Radius', 'copenhagen' ),
		'section'           => 'colors',
		'default'           => '2px',
		'sanitize_callback' => 'esc_html',
		'output'            => array(
			array(
				'element'  => ':root',
				'property' => '--mbf-button-border-radius',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback'   => array(
			array(
				'setting'  => 'color_advanced_border_settings',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

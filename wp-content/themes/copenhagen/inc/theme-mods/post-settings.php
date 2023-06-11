<?php
/**
 * Post Settings
 *
 * @package Copenhagen
 */

MBF_Customizer::add_section(
	'post_settings',
	array(
		'title' => esc_html__( 'Post Settings', 'copenhagen' ),
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'collapsible',
		'settings'    => 'post_collapsible_common',
		'section'     => 'post_settings',
		'label'       => esc_html__( 'Common', 'copenhagen' ),
		'input_attrs' => array(
			'collapsed' => true,
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'multicheck',
		'settings' => 'post_meta',
		'label'    => esc_html__( 'Post Meta', 'copenhagen' ),
		'section'  => 'post_settings',
		'default'  => array( 'category', 'date', 'author' ),
		'choices'  => array(
			'category' => esc_html__( 'Category', 'copenhagen' ),
			'date'     => esc_html__( 'Date', 'copenhagen' ),
			'author'   => esc_html__( 'Author', 'copenhagen' ),
			'comments' => esc_html__( 'Comments', 'copenhagen' ),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'radio',
		'settings' => 'post_header_type',
		'label'    => esc_html__( 'Default Page Header Type', 'copenhagen' ),
		'section'  => 'post_settings',
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
		'settings'        => 'post_media_preview',
		'label'           => esc_html__( 'Standard Page Header Preview', 'copenhagen' ),
		'section'         => 'post_settings',
		'default'         => 'uncropped',
		'choices'         => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'copenhagen' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'copenhagen' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'post_header_type',
					'operator' => '==',
					'value'    => 'standard',
				),
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'post_subtitle',
		'label'    => esc_html__( 'Display excerpt as post subtitle', 'copenhagen' ),
		'section'  => 'post_settings',
		'default'  => true,
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'post_tags',
		'label'    => esc_html__( 'Display tags', 'copenhagen' ),
		'section'  => 'post_settings',
		'default'  => true,
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'post_footer',
		'label'    => esc_html__( 'Display post footer', 'copenhagen' ),
		'section'  => 'post_settings',
		'default'  => true,
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_prev_next',
		'section'  => 'post_settings',
		'label'    => esc_html__( 'Prev Next Links', 'copenhagen' ),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'post_prev_next',
		'label'    => esc_html__( 'Display prev next links', 'copenhagen' ),
		'section'  => 'post_settings',
		'default'  => true,
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'post_prev_next_type_image_orientation',
		'label'           => esc_html__( 'Image Orientation', 'copenhagen' ),
		'section'         => 'post_settings',
		'default'         => 'square',
		'choices'         => array(
			'original'       => esc_html__( 'Original', 'copenhagen' ),
			'landscape'      => esc_html__( 'Landscape 4:3', 'copenhagen' ),
			'landscape-3-2'  => esc_html__( 'Landscape 3:2', 'copenhagen' ),
			'landscape-16-9' => esc_html__( 'Landscape 16:9', 'copenhagen' ),
			'landscape-21-9' => esc_html__( 'Landscape 21:9', 'copenhagen' ),
			'portrait'       => esc_html__( 'Portrait 3:4', 'copenhagen' ),
			'portrait-2-3'   => esc_html__( 'Portrait 2:3', 'copenhagen' ),
			'square'         => esc_html__( 'Square', 'copenhagen' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_prev_next',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'post_prev_next_type_image_size',
		'label'           => esc_html__( 'Image Size', 'copenhagen' ),
		'section'         => 'post_settings',
		'default'         => 'mbf-small',
		'choices'         => mbf_get_list_available_image_sizes(),
		'active_callback' => array(
			array(
				'setting'  => 'post_prev_next',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'dimension',
		'settings'        => 'post_prev_next_image_border_radius',
		'label'           => esc_html__( 'Image Border Radius', 'copenhagen' ),
		'section'         => 'post_settings',
		'default'         => '3px',
		'output'          => array(
			array(
				'element'  => '.mbf-entry__prev-next',
				'property' => '--mbf-thumbnail-border-radius',
				'suffix'   => '!important',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_prev_next',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'multicheck',
		'settings'        => 'post_prev_next_meta',
		'label'           => esc_html__( 'Post Meta', 'copenhagen' ),
		'section'         => 'post_settings',
		'default'         => array( 'date', 'author' ),
		'choices'         => array(
			'date'     => esc_html__( 'Date', 'copenhagen' ),
			'author'   => esc_html__( 'Author', 'copenhagen' ),
			'comments' => esc_html__( 'Comments', 'copenhagen' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_prev_next',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

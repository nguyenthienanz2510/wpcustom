<?php
/**
 * Typography
 *
 * @package Copenhagen
 */

MBF_Customizer::add_panel(
	'typography',
	array(
		'title' => esc_html__( 'Typography', 'copenhagen' ),
	)
);

MBF_Customizer::add_section(
	'typography_general',
	array(
		'title' => esc_html__( 'General', 'copenhagen' ),
		'panel' => 'typography',
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'font_base',
		'label'    => esc_html__( 'Base Font', 'copenhagen' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'satoshi',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1rem',
			'letter-spacing' => 'normal',
			'line-height'    => '1.5',
		),
		'choices'  => array(
			'variant' => array(
				'regular',
				'italic',
				'500italic',
				'500',
				'700',
				'700italic',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'font_primary',
		'label'       => esc_html__( 'Primary Font', 'copenhagen' ),
		'description' => esc_html__( 'Used for buttons, and tags and other actionable elements.', 'copenhagen' ),
		'section'     => 'typography_general',
		'default'     => array(
			'font-family'    => 'satoshi',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.8125rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'     => array(
			'variant' => array(
				'regular',
				'italic',
				'500',
				'500italic',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'font_secondary',
		'label'       => esc_html__( 'Secondary Font', 'copenhagen' ),
		'description' => esc_html__( 'Used for image captions and other secondary elements.', 'copenhagen' ),
		'section'     => 'typography_general',
		'default'     => array(
			'font-family'    => 'satoshi',
			'variant'        => '900',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.6875rem',
			'letter-spacing' => '0.1em',
			'text-transform' => 'uppercase',
		),
		'choices'     => array(
			'variant' => array(
				'regular',
				'italic',
				'500',
				'500italic',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'font_category',
		'label'    => esc_html__( 'Category Font', 'copenhagen' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'satoshi',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'  => array(),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'font_post_meta',
		'label'    => esc_html__( 'Post Meta Font', 'copenhagen' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'satoshi',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.8125rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'  => array(
			'variant' => array(
				'regular',
				'italic',
				'500',
				'500italic',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'font_input',
		'label'    => esc_html__( 'Input Font', 'copenhagen' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'satoshi',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.8125rem',
			'line-height'    => '1.625rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'  => array(),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'font_post_subtitle',
		'label'    => esc_html__( 'Post Subtitle Font', 'copenhagen' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'inherit',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.625rem',
			'letter-spacing' => '-0.05em',
		),
		'choices'  => array(
			'variant' => array(
				'regular',
				'italic',
				'500italic',
				'500',
				'700',
				'700italic',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'font_post_content',
		'label'    => esc_html__( 'Post Content Font', 'copenhagen' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'satoshi',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.125rem',
			'letter-spacing' => 'normal',
			'line-height'    => '1.55',
		),
		'choices'  => array(
			'variant' => array(
				'regular',
				'italic',
				'500',
				'500italic',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'font_excerpt',
		'label'    => esc_html__( 'Entry Excerpt Font', 'copenhagen' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'satoshi',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1rem',
			'letter-spacing' => 'normal',
			'line-height'    => '1.5',
		),
		'choices'  => array(
			'variant' => array(
				'regular',
				'italic',
				'500',
				'500italic',
			),
		),
	)
);

MBF_Customizer::add_section(
	'typography_logos',
	array(
		'title' => esc_html__( 'Logos', 'copenhagen' ),
		'panel' => 'typography',
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'font_main_logo',
		'label'           => esc_html__( 'Main Logo', 'copenhagen' ),
		'description'     => esc_html__( 'The main logo is used in the navigation bar and mobile view of your website.', 'copenhagen' ),
		'section'         => 'typography_logos',
		'default'         => array(
			'font-family'    => 'Manrope',
			'font-size'      => '1.375rem',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => '-0.04em',
			'text-transform' => 'none',
		),
		'choices'         => array(),
		'active_callback' => array(
			array(
				'setting'  => 'logo',
				'operator' => '==',
				'value'    => '',
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'font_footer_logo',
		'label'           => esc_html__( 'Footer Logo', 'copenhagen' ),
		'description'     => esc_html__( 'The footer logo is used in the site footer in desktop and mobile view.', 'copenhagen' ),
		'section'         => 'typography_logos',
		'default'         => array(
			'font-family'    => 'Manrope',
			'font-size'      => '1rem',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => '-0.04em',
			'text-transform' => 'none',
		),
		'choices'         => array(),
		'active_callback' => array(
			array(
				'setting'  => 'footer_logo',
				'operator' => '==',
				'value'    => '',
			),
		),
	)
);

MBF_Customizer::add_section(
	'typography_headings',
	array(
		'title' => esc_html__( 'Headings', 'copenhagen' ),
		'panel' => 'typography',
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'font_headings',
		'label'    => esc_html__( 'Headings', 'copenhagen' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-family'    => 'DM Sans',
			'variant'        => '400',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => '-0.05em',
			'text-transform' => 'none',
			'line-height'    => '1.25',
		),
		'choices'  => array(),
	)
);

MBF_Customizer::add_section(
	'typography_navigation',
	array(
		'title' => esc_html__( 'Navigation', 'copenhagen' ),
		'panel' => 'typography',
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'font_menu',
		'label'       => esc_html__( 'Menu Font', 'copenhagen' ),
		'description' => esc_html__( 'Used for main top level menu elements.', 'copenhagen' ),
		'section'     => 'typography_navigation',
		'default'     => array(
			'font-family'    => 'satoshi',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.8215rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'     => array(),
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'font_submenu',
		'label'       => esc_html__( 'Submenu Font', 'copenhagen' ),
		'description' => esc_html__( 'Used for submenu elements.', 'copenhagen' ),
		'section'     => 'typography_navigation',
		'default'     => array(
			'font-family'    => 'satoshi',
			'subsets'        => array( 'latin' ),
			'variant'        => '500',
			'font-size'      => '0.8215rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'     => array(),
	)
);

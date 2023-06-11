<?php
/**
 * Footer Settings
 *
 * @package Copenhagen
 */

MBF_Customizer::add_section(
	'footer',
	array(
		'title' => esc_html__( 'Footer Settings', 'copenhagen' ),
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'collapsible',
		'settings'    => 'footer_collapsible_common',
		'label'       => esc_html__( 'Common', 'copenhagen' ),
		'section'     => 'footer',
		'input_attrs' => array(
			'collapsed' => true,
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'              => 'textarea',
		'settings'          => 'footer_text',
		'label'             => esc_html__( 'Footer Text', 'copenhagen' ),
		'section'           => 'footer',
		'sanitize_callback' => function( $val ) {
			return wp_kses( $val, 'content' );
		},
	)
);

MBF_Customizer::add_field(
	array(
		'type'              => 'textarea',
		'settings'          => 'footer_copyright',
		'label'             => esc_html__( 'Footer Copyright', 'copenhagen' ),
		'section'           => 'footer',
		'default'           => '©️ 2022 – Theme. All Rights Reserved.',
		'sanitize_callback' => function( $val ) {
			return wp_kses( $val, 'content' );
		},
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'image',
		'settings'    => 'footer_promo_image',
		'label'       => esc_html__( 'Footer Promo Image', 'copenhagen' ),
		'description' => esc_html__( 'Please upload the 2x version of your logo via Media Library with ', 'copenhagen' ) . '<code>@2x</code>' . esc_html__( ' suffix for supporting Retina screens. For example ', 'copenhagen' ) . '<code>promo@2x.png</code>' . esc_html__( '. Recommended width and height is 45px (90px for Retina version).', 'copenhagen' ),
		'section'     => 'footer',
		'default'     => '',
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'collapsible',
		'settings'    => 'footer_collapsible_follow',
		'label'       => esc_html__( 'Follow', 'copenhagen' ),
		'section'     => 'footer',
		'input_attrs' => array(
			'collapsed' => false,
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'footer_follow',
		'label'    => esc_html__( 'Display follow section', 'copenhagen' ),
		'section'  => 'footer',
		'default'  => false,
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'footer_follow_title',
		'label'           => esc_html__( 'Title', 'copenhagen' ),
		'section'         => 'footer',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'footer_follow',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'footer_follow_username',
		'label'           => esc_html__( 'Username', 'copenhagen' ),
		'section'         => 'footer',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'footer_follow',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'footer_follow_info',
		'label'           => esc_html__( 'Info', 'copenhagen' ),
		'section'         => 'footer',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'footer_follow',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
	);

MBF_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'footer_follow_avatar',
		'label'           => esc_html__( 'Avatar', 'copenhagen' ),
		'description'     => esc_html__( 'Please upload the 2x version of your logo via Media Library with ', 'copenhagen' ) . '<code>@2x</code>' . esc_html__( ' suffix for supporting Retina screens. For example ', 'copenhagen' ) . '<code>avatar@2x.png</code>' . esc_html__( '. Recommended width and height is 45px (90px for Retina version).', 'copenhagen' ),
		'section'         => 'footer',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'footer_follow',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'footer_follow_button_label',
		'label'           => esc_html__( 'Button Label', 'copenhagen' ),
		'section'         => 'footer',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'footer_follow',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'footer_follow_button_url',
		'label'           => esc_html__( 'Button URL', 'copenhagen' ),
		'section'         => 'footer',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'footer_follow',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'footer_follow_promo',
		'label'           => esc_html__( 'Promo Image', 'copenhagen' ),
		'description'     => esc_html__( 'Please upload the 2x version of your logo via Media Library with ', 'copenhagen' ) . '<code>@2x</code>' . esc_html__( ' suffix for supporting Retina screens. For example ', 'copenhagen' ) . '<code>promo@2x.png</code>',
		'section'         => 'footer',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'footer_follow',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'        => 'collapsible',
		'settings'    => 'footer_collapsible_subscribe',
		'label'       => esc_html__( 'Subscribe', 'copenhagen' ),
		'section'     => 'footer',
		'input_attrs' => array(
			'collapsed' => false,
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'footer_subscribe',
		'label'    => esc_html__( 'Display subscribe section', 'copenhagen' ),
		'section'  => 'footer',
		'default'  => false,
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'footer_subscribe_title',
		'label'           => esc_html__( 'Title', 'copenhagen' ),
		'section'         => 'footer',
		'active_callback' => array(
			array(
				'setting'  => 'footer_subscribe',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

MBF_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'footer_subscribe_mailchimp',
		'label'           => esc_html__( 'Mailchimp Form Link', 'copenhagen' ),
		'section'         => 'footer',
		'active_callback' => array(
			array(
				'setting'  => 'footer_subscribe',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

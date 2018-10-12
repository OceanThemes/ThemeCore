<?php

/**
 * Get customize settings
 *
 * @return array
 */
function otcore_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'otcore',
	);

	$panels = array(
		'header'        => array(
			'title'      => esc_html__( 'Header', 'otcore' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		),
    );

	$sections = array(
		'header_social_section'           => array(
			'title'       => esc_html__( 'Header Socials', 'otcore' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
    );

	$fields = array(
		// Header Social
		'social_switch'     => array(
			'type'        => 'toggle',
			'label'       => esc_attr__( 'Social On/Off?', 'otcore' ),
			'section'     => 'header_social_section',
			'default'     => '1',
			'priority'    => 9,
		),
		'header_socials'     => array(
			'type'     => 'repeater',
			'label'    => esc_html__( 'Socials Network', 'otcore' ),
			'section'  => 'header_social_section',
			'priority' => 10,
			'active_callback' => array(
				array(
					'setting'  => 'social_switch',
					'operator' => '==',
					'value'    => 1,
				),
			),
			'row_label' => array(
				'type' => 'field',
				'value' => esc_attr__('social', 'otcore' ),
				'field' => 'social_name',
			),
			'default'  => array(),
			'fields'   => array(
				'social_name' => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Social network name', 'otcore' ),
					'description' => esc_html__( 'This will be the social network name', 'otcore' ),
					'default'     => '',
				),
				'social_icon' => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Icon class name', 'otcore' ),
					'description' => esc_html__( 'This will be the social icon: https://fontawesome.com/v4.7.0/icons/#brand', 'otcore' ),
					'default'     => '',
				),
				'social_link' => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Link url', 'otcore' ),
					'description' => esc_html__( 'This will be the social link', 'otcore' ),
					'default'     => '',
				),
			),
		),
		'social_target_link'    => array(
			'type'        => 'select',
			'label'       => esc_attr__( 'HTML a target Attribute', 'otcore' ),
			'section'     => 'header_social_section',
			'default'     => '_self',
			'priority'    => 11,
			'multiple'    => 1,
			'active_callback' => array(
				array(
					'setting'  => 'social_switch',
					'operator' => '==',
					'value'    => 1,
				),
			),
			'choices'     => array(
				'_self' => esc_attr__( 'Same frame', 'otcore' ),
				'_blank' => esc_attr__( 'New window', 'otcore' ),					
				'_parent' => esc_attr__( 'Parent frame', 'otcore' ),
			),
		),
    );

	$settings['panels']   = apply_filters( 'otcore_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'otcore_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'otcore_customize_fields', $fields );

	return $settings;
}

$otcore_customize = new otcore_Customize( otcore_customize_settings() );
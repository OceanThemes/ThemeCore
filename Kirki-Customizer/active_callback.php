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
		'general'     => array(
			'priority' => 5,
			'title'    => esc_html__( 'General', 'otcore' ),
		),
        'blog'        => array(
			'title'      => esc_html__( 'Blog', 'otcore' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		),
    );

	$sections = array(
		'blog_page'           => array(
			'title'       => esc_html__( 'Blog Page', 'otcore' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'panel'       => 'blog',
		),
        'single_post'           => array(
			'title'       => esc_html__( 'Single Post', 'otcore' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'panel'       => 'blog',
		),
    );

	$fields = array(
		// Blog Page
		'blog_view'           => array(
			'type'        => 'select',
			'label'       => esc_html__( 'Blog View', 'otcore' ),
			'section'     => 'blog_page',
			'default'     => 'classic',
			'priority'    => 10,
			'choices'     => array(
				'classic' => esc_html__( 'Classic', 'otcore' ),
				'grid' => esc_html__( 'Grid', 'otcore' ),
				'list'    => esc_html__( 'List', 'otcore' ),
				'masonry'    => esc_html__( 'Masonry', 'otcore' ),
			),
		),
		'blog_layout'           => array(
			'type'        => 'select',
			'label'       => esc_html__( 'Blog Layout', 'otcore' ),
			'section'     => 'blog_page',
			'default'     => 'content-sidebar',
			'priority'    => 10,
			'description' => esc_html__( 'Select default sidebar for the blog page.', 'otcore' ),
			'choices'     => array(
				'content-sidebar' => esc_html__( 'Right Sidebar', 'otcore' ),
				'sidebar-content' => esc_html__( 'Left Sidebar', 'otcore' ),
				'full-content'    => esc_html__( 'Full Content', 'otcore' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'blog_view',
					'operator' => '==',
					'value'    => 'classic',
				),
			),
		),
		'blog_grid_style'           => array(
			'type'        => 'select',
			'label'       => esc_html__( 'Blog grid style', 'otcore' ),
			'section'     => 'blog_page',
			'default'     => '1',
			'priority'    => 10,
			'description' => esc_html__( 'Select style for the blog grid page.', 'otcore' ),
			'choices'     => array(
				'1' => esc_html__( 'Style 1', 'otcore' ),
				'2' => esc_html__( 'Style 2', 'otcore' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'blog_view',
					'operator' => '==',
					'value'    => 'grid',
				),
			),
		),
		'blog_columns'           => array(
			'type'        => 'select',
			'label'       => esc_html__( 'Blog Columns', 'otcore' ),
			'section'     => 'blog_page',
			'default'     => '3',
			'priority'    => 10,
			'description' => esc_html__( 'Select default blog columns for the blog page.', 'otcore' ),
			'choices'     => array(
				'3' => esc_html__( '3 Columns', 'otcore' ),
				'2' => esc_html__( '2 Columns', 'otcore' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'blog_view',
					'operator' => '==',
					'value'    => 'grid',
				),
			),
		),
		'excerpt_length'               => array(
			'type'     => 'number',
			'label'    => esc_html__( 'Excerpt Length', 'otcore' ),
			'section'  => 'blog_page',
			'default'  => '50',
			'priority' => 10,
		),
		'blog_entry_meta'              => array(
			'type'     => 'multicheck',
			'label'    => esc_html__( 'Entry Meta', 'otcore' ),
			'section'  => 'blog_page',
			'default'  => array( 'date', 'author', 'cat' ),
			'choices'  => array(
				'date'    => esc_html__( 'Date', 'otcore' ),
				'author'  => esc_html__( 'Author', 'otcore' ),
				'cat'     => esc_html__( 'Categories', 'otcore' ),
				'cmt'     => esc_html__( 'Count comment', 'otcore' ),
			),
			'priority' => 10,
		),
		'blog_read_more'               => array(
			'type'            => 'text',
			'label'           => esc_html__( 'Blog Read More', 'otcore' ),
			'section'         => 'blog_page',
			'default'         => esc_html__( 'Read more', 'otcore' ),
			'priority'        => 10,
		),
		'type_nav'                     => array(
			'type'     => 'select',
			'label'    => esc_html__( 'Type of Navigation', 'otcore' ),
			'section'  => 'blog_page',
			'default'  => 'numberic',
			'priority' => 10,
			'choices'  => array(
				'numberic'   => esc_html__( 'Numberic', 'otcore' ),
				'view_more' => esc_html__( 'View More', 'otcore' ),
			),
		),
		'view_more_text'               => array(
			'type'            => 'text',
			'label'           => esc_html__( 'View More Text', 'otcore' ),
			'section'         => 'blog_page',
			'default'         => esc_html__( 'MORE', 'otcore' ),
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'type_nav',
					'operator' => '==',
					'value'    => 'view_more',
				),
			),
		),

		// Single Post
		'single_post_layout'           => array(
			'type'        => 'select',
			'label'       => esc_html__( 'Single Post Layout', 'otcore' ),
			'section'     => 'single_post',
			'default'     => 'content-sidebar',
			'priority'    => 10,
			'description' => esc_html__( 'Select default sidebar for the single post page.', 'otcore' ),
			'choices'     => array(
				'content-sidebar' => esc_html__( 'Right Sidebar', 'otcore' ),
				'sidebar-content' => esc_html__( 'Left Sidebar', 'otcore' ),
				'full-content'    => esc_html__( 'Full Content', 'otcore' ),
			),
		),
        'post_entry_meta'              => array(
			'type'     => 'multicheck',
			'label'    => esc_html__( 'Entry Meta', 'otcore' ),
			'section'  => 'single_post',
			'default'  => array( 'date', 'author', 'cat' ),
			'choices'  => array(
				'date'    => esc_html__( 'Date', 'otcore' ),
                'author'  => esc_html__( 'Author', 'otcore' ),
                'cat'     => esc_html__( 'Categories', 'otcore' ),
			),
			'priority' => 10,
		),
		'show_author_box'           => array(
			'type'     => 'toggle',
			'label'    => esc_html__( 'Show Author Box', 'otcore' ),
			'section'  => 'single_post',
			'default'  => 0,
			'priority' => 10,
		),
		'post_custom_field_1'          => array(
			'type'    => 'custom',
			'section' => 'single_post',
			'default' => '<hr/>',
		),

		'show_post_social_share' => array(
			'type'        => 'toggle',
			'label'       => esc_html__( 'Show Socials Share', 'otcore' ),
			'description' => esc_html__( 'Check this option to show socials share in the single post page.', 'otcore' ),
			'section'     => 'single_post',
			'default'     => 0,
			'priority'    => 10,
		),

		'post_socials_share'        => array(
			'type'            => 'multicheck',
			'label'           => esc_html__( 'Socials Share', 'otcore' ),
			'section'         => 'single_post',
			'default'         => array( 'facebook', 'twitter', 'google', 'tumblr' ),
			'choices'         => array(
				'facebook'  => esc_html__( 'Facebook', 'otcore' ),
				'twitter'   => esc_html__( 'Twitter', 'otcore' ),
				'google'    => esc_html__( 'Google Plus', 'otcore' ),
				'tumblr'    => esc_html__( 'Tumblr', 'otcore' ),
				'pinterest' => esc_html__( 'Pinterest', 'otcore' ),
				'linkedin'  => esc_html__( 'Linkedin', 'otcore' ),
			),
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'show_post_social_share',
					'operator' => '==',
					'value'    => 1,
				),
			),
		),
    );

	$settings['panels']   = apply_filters( 'otcore_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'otcore_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'otcore_customize_fields', $fields );

	return $settings;
}

$otcore_customize = new otcore_Customize( otcore_customize_settings() );
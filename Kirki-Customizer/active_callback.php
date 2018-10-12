<?php

/**
 * Get customize settings
 *
 * @return array
 */
function helendo_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'helendo',
	);

	$panels = array(
		'general'     => array(
			'priority' => 5,
			'title'    => esc_html__( 'General', 'helendo' ),
		),
        'blog'        => array(
			'title'      => esc_html__( 'Blog', 'helendo' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		),
    );

	$sections = array(
		'blog_page'           => array(
			'title'       => esc_html__( 'Blog Page', 'helendo' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'panel'       => 'blog',
		),
        'single_post'           => array(
			'title'       => esc_html__( 'Single Post', 'helendo' ),
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
			'label'       => esc_html__( 'Blog View', 'helendo' ),
			'section'     => 'blog_page',
			'default'     => 'classic',
			'priority'    => 10,
			'choices'     => array(
				'classic' => esc_html__( 'Classic', 'helendo' ),
				'grid' => esc_html__( 'Grid', 'helendo' ),
				'list'    => esc_html__( 'List', 'helendo' ),
				'masonry'    => esc_html__( 'Masonry', 'helendo' ),
			),
		),
		'blog_layout'           => array(
			'type'        => 'select',
			'label'       => esc_html__( 'Blog Layout', 'helendo' ),
			'section'     => 'blog_page',
			'default'     => 'content-sidebar',
			'priority'    => 10,
			'description' => esc_html__( 'Select default sidebar for the blog page.', 'helendo' ),
			'choices'     => array(
				'content-sidebar' => esc_html__( 'Right Sidebar', 'helendo' ),
				'sidebar-content' => esc_html__( 'Left Sidebar', 'helendo' ),
				'full-content'    => esc_html__( 'Full Content', 'helendo' ),
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
			'label'       => esc_html__( 'Blog grid style', 'helendo' ),
			'section'     => 'blog_page',
			'default'     => '1',
			'priority'    => 10,
			'description' => esc_html__( 'Select style for the blog grid page.', 'helendo' ),
			'choices'     => array(
				'1' => esc_html__( 'Style 1', 'helendo' ),
				'2' => esc_html__( 'Style 2', 'helendo' ),
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
			'label'       => esc_html__( 'Blog Columns', 'helendo' ),
			'section'     => 'blog_page',
			'default'     => '3',
			'priority'    => 10,
			'description' => esc_html__( 'Select default blog columns for the blog page.', 'helendo' ),
			'choices'     => array(
				'3' => esc_html__( '3 Columns', 'helendo' ),
				'2' => esc_html__( '2 Columns', 'helendo' ),
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
			'label'    => esc_html__( 'Excerpt Length', 'helendo' ),
			'section'  => 'blog_page',
			'default'  => '50',
			'priority' => 10,
		),
		'blog_entry_meta'              => array(
			'type'     => 'multicheck',
			'label'    => esc_html__( 'Entry Meta', 'helendo' ),
			'section'  => 'blog_page',
			'default'  => array( 'date', 'author', 'cat' ),
			'choices'  => array(
				'date'    => esc_html__( 'Date', 'helendo' ),
				'author'  => esc_html__( 'Author', 'helendo' ),
				'cat'     => esc_html__( 'Categories', 'helendo' ),
				'cmt'     => esc_html__( 'Count comment', 'helendo' ),
			),
			'priority' => 10,
		),
		'blog_read_more'               => array(
			'type'            => 'text',
			'label'           => esc_html__( 'Blog Read More', 'helendo' ),
			'section'         => 'blog_page',
			'default'         => esc_html__( 'Read more', 'helendo' ),
			'priority'        => 10,
		),
		'type_nav'                     => array(
			'type'     => 'select',
			'label'    => esc_html__( 'Type of Navigation', 'helendo' ),
			'section'  => 'blog_page',
			'default'  => 'numberic',
			'priority' => 10,
			'choices'  => array(
				'numberic'   => esc_html__( 'Numberic', 'helendo' ),
				'view_more' => esc_html__( 'View More', 'helendo' ),
			),
		),
		'view_more_text'               => array(
			'type'            => 'text',
			'label'           => esc_html__( 'View More Text', 'helendo' ),
			'section'         => 'blog_page',
			'default'         => esc_html__( 'MORE', 'helendo' ),
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
			'label'       => esc_html__( 'Single Post Layout', 'helendo' ),
			'section'     => 'single_post',
			'default'     => 'content-sidebar',
			'priority'    => 10,
			'description' => esc_html__( 'Select default sidebar for the single post page.', 'helendo' ),
			'choices'     => array(
				'content-sidebar' => esc_html__( 'Right Sidebar', 'helendo' ),
				'sidebar-content' => esc_html__( 'Left Sidebar', 'helendo' ),
				'full-content'    => esc_html__( 'Full Content', 'helendo' ),
			),
		),
        'post_entry_meta'              => array(
			'type'     => 'multicheck',
			'label'    => esc_html__( 'Entry Meta', 'helendo' ),
			'section'  => 'single_post',
			'default'  => array( 'date', 'author', 'cat' ),
			'choices'  => array(
				'date'    => esc_html__( 'Date', 'helendo' ),
                'author'  => esc_html__( 'Author', 'helendo' ),
                'cat'     => esc_html__( 'Categories', 'helendo' ),
			),
			'priority' => 10,
		),
		'show_author_box'           => array(
			'type'     => 'toggle',
			'label'    => esc_html__( 'Show Author Box', 'helendo' ),
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
			'label'       => esc_html__( 'Show Socials Share', 'helendo' ),
			'description' => esc_html__( 'Check this option to show socials share in the single post page.', 'helendo' ),
			'section'     => 'single_post',
			'default'     => 0,
			'priority'    => 10,
		),

		'post_socials_share'        => array(
			'type'            => 'multicheck',
			'label'           => esc_html__( 'Socials Share', 'helendo' ),
			'section'         => 'single_post',
			'default'         => array( 'facebook', 'twitter', 'google', 'tumblr' ),
			'choices'         => array(
				'facebook'  => esc_html__( 'Facebook', 'helendo' ),
				'twitter'   => esc_html__( 'Twitter', 'helendo' ),
				'google'    => esc_html__( 'Google Plus', 'helendo' ),
				'tumblr'    => esc_html__( 'Tumblr', 'helendo' ),
				'pinterest' => esc_html__( 'Pinterest', 'helendo' ),
				'linkedin'  => esc_html__( 'Linkedin', 'helendo' ),
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

	$settings['panels']   = apply_filters( 'helendo_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'helendo_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'helendo_customize_fields', $fields );

	return $settings;
}

$helendo_customize = new Helendo_Customize( helendo_customize_settings() );
<?php
//Register Custom Post Type - admin-functions.php
add_action( 'init', 'onum_create_header_builder' );
function onum_create_header_builder() {
    register_post_type( 'ot_header_builders',
        array(
            'labels' => array(
                'name' => 'Header Builders',
                'singular_name' => 'Header Builder',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Header Builder',
                'edit' => 'Edit',
                'edit_item' => 'Edit Header Builder',
                'new_item' => 'New Header Builder',
                'view' => 'View',
                'view_item' => 'View Header Builder',
                'search_items' => 'Search Header Builders',
                'not_found' => 'No Header Builders found',
                'not_found_in_trash' => 'No Header Builders found in Trash',
                'parent' => 'Parent Header Builder'
            ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'menu_position' => 60,
            'supports' => array( 'title', 'editor' ),
            'menu_icon' => 'dashicons-editor-kitchensink',
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'capability_type' => 'post'
        )
    );
}

add_action( 'init', 'onum_create_footer_builder' ); 
function onum_create_footer_builder() {
    register_post_type( 'ot_footer_builders',
        array(
            'labels' => array(
                'name' => 'Footer Builders',
                'singular_name' => 'Footer Builder',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Footer Builder',
                'edit' => 'Edit',
                'edit_item' => 'Edit Footer Builder',
                'new_item' => 'New Footer Builder',
                'view' => 'View',
                'view_item' => 'View Footer Builder',
                'search_items' => 'Search Footer Builders',
                'not_found' => 'No Footer Builders found',
                'not_found_in_trash' => 'No Footer Builders found in Trash',
                'parent' => 'Parent Footer Builder'
            ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'menu_position' => 60,
            'supports' => array( 'title', 'editor' ),
            'menu_icon' => 'dashicons-editor-kitchensink',
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'capability_type' => 'post'
        )
    );
}

//Option Metabox in page - meta-boxes.php
$meta_boxes[] = array (
      'id' => 'select-header-footer',
      'title' => 'General Settings',
      'pages' =>   array ('page',),
      'context' => 'normal',
      'priority' => 'high',
      'autosave' => false,
      'fields' =>   array (  
      	array(
		    'name'        => 'Header Version',
		    'id'          => 'select_header',
		    'type'        => 'post',

		    // Post type.
		    'post_type'   => 'ot_header_builders',

		    // Field type.
		    'field_type'  => 'select_advanced',

		    // Placeholder, inherited from `select_advanced` field.
		    'placeholder' => 'Select a header',

		    // Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
		    'query_args'  => array(
		        'post_status'    => 'publish',
		        'posts_per_page' => - 1,
		        'orderby' => 'date',
		        'order' => 'ASC',
		    ),
		),
        array (
        	'name' => 'Footer Version',
			'id' => 'select_footer',
			'type'        => 'post',

		    // Post type.
		    'post_type'   => 'ot_footer_builders',

		    // Field type.
		    'field_type'  => 'select_advanced',

		    // Placeholder, inherited from `select_advanced` field.
		    'placeholder' => 'Select a footer',

		    // Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
		    'query_args'  => array(
		        'post_status'    => 'publish',
		        'posts_per_page' => - 1,
		        'orderby' => 'date',
		        'order' => 'ASC',
		    ),
        ),
      ),
    );
    
// Create a functions in functions.php
if ( ! function_exists( 'onum_footer_builder' ) ) {
    function onum_footer_builder (){
        $footer_builder = '';    

        if ( is_page() ) {
            if ( function_exists('rwmb_meta') ) {
                global $wp_query;
                $metabox_fb = rwmb_meta( 'select_footer', 'field_type=select_advanced', $wp_query->get_queried_object_id() ); 
                if ($metabox_fb != '') {
                    $footer_builder = $metabox_fb;
                }else{
                    $footer_builder = onum_get_option('footer_layout');
                }
            } 
        }else{
            $footer_builder = onum_get_option('footer_layout');
        }

        if( !$footer_builder ) {
            return;
        }else{
            if( is_plugin_active( 'elementor/elementor.php' ) ) {                
                echo \Elementor\Plugin::$instance->frontend->get_builder_content( $footer_builder ); 
            }
        }
    }
}

// Place this functions on footer.php file
onum_footer_builder();		


<?php 
// Add default custom post type using WPBakery Page Builder
if( class_exists( 'Vc_Manager' ) ) {
    $list = array(
        'post',
        'page',
        'portfolio',        
        'service',        
    );
    vc_set_default_editor_post_types( $list );
    //vc_disable_frontend();
}
?>
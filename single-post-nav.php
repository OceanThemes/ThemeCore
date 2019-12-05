<?php 
// single.php file
$prevPost = get_previous_post(true);
if($prevPost) {
    $prevThumbnail = get_the_post_thumbnail( $prevPost->ID, 'thumbnail' );
    previous_post_link( '<div class="post-prev">%link</div>', '<span class="flaticon-arrow-pointing-to-left"></span>'.esc_html__( 'Previous', 'text-domain' ).'<p>%title</p>'.$prevThumbnail, TRUE );  
}
$nextPost = get_next_post(true);
if($nextPost) {
    $nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'thumbnail' );                  
    next_post_link( '<div class="post-next">%link</div>', esc_html__( 'Next', 'text-domain' ).'<span class="flaticon-arrow-pointing-to-right"></span><p>%title</p>'.$nextThumbnail, TRUE ); 
}

// single-custom_post_type.php
$prevPost = get_previous_post();
if($prevPost) {
    $prevThumbnail = get_the_post_thumbnail( $prevPost->ID, 'thumbnail' );
    previous_post_link( '<div class="post-prev">%link</div>', '<span class="flaticon-arrow-pointing-to-left"></span>'.esc_html__( 'Previous', 'text-domain' ).'<p>%title</p>'.$prevThumbnail, TRUE, ' ', 'taxonomy-name' );  
}
$nextPost = get_next_post();
if($nextPost) {
    $nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'thumbnail' );                  
    next_post_link( '<div class="post-next">%link</div>', esc_html__( 'Next', 'text-domain' ).'<span class="flaticon-arrow-pointing-to-right"></span><p>%title</p>'.$nextThumbnail, TRUE, ' ', 'taxonomy-name' ); 
}            
            

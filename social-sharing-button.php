<?php
function onum_social_sharing_buttons($content) {
    global $post;
    if(is_singular() || is_home()){
        // Get current page URL 
        $postURL = urlencode(get_permalink());

        // Get current page title
        $postTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');        
        
        // Get Post Thumbnail for pinterest
        $postThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

        // Get current page excerpt
        $postExcerpt = wp_strip_all_tags( get_the_excerpt(), true );

        // Get site name
        $site_title = get_bloginfo( 'name' );

        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL.'&amp;via='.$site_title;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$postURL.'&amp;title='.$postTitle;
        $googleURL = 'https://plus.google.com/share?url='.$postURL;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postURL;
        $bufferURL = 'https://bufferapp.com/add?url='.$postURL.'&amp;text='.$postTitle;
        $diggURL = 'https://www.digg.com/submit?url='.$postURL;
        $redditURL = 'https://reddit.com/submit?url='.$postURL.'&amp;title='.$postTitle;
        $stumbleuponURL = 'https://www.stumbleupon.com/submit?url='.$postURL.'&amp;title='.$postTitle;
        $tumblrURL = 'https://www.tumblr.com/share/link?url='.$postURL.'&amp;title='.$postTitle;
        $vkURL = 'https://vk.com/share.php?url='.$postURL;
        $yummlyURL = 'https://www.yummly.com/urb/verify?url='.$postURL.'&amp;title='.$postTitle;
        $mailURL = 'mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 '.$postURL;

        $whatsappURL = 'whatsapp://send?text='.$postTitle . ' ' . $postURL;

        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$postURL.'&amp;media='.$postThumbnail[0].'&amp;description='.$postTitle;

        $variable .= '<div class="otf-social-share">';
        $variable .= '<a class="social-buffer" href="'.$bufferURL.'" target="_blank"><i class="fab fa-buffer"></i></a>';
        $variable .= '<a class="social-digg" href="'.$diggURL.'" target="_blank"><i class="fab fa-digg"></i></a>';        
        $variable .= '<a class="social-facebook" href="'.$facebookURL.'" target="_blank"><i class="fab fa-facebook-f"></i></a>';    
        $variable .= '<a class="social-googleplus" href="'.$googleURL.'" target="_blank"><i class="fab fa-google-plus-g"></i></a>';    
        $variable .= '<a class="social-linkedin" href="'.$linkedInURL.'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';    
        $variable .= '<a class="social-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><i class="fab fa-pinterest-p"></i></a>';                
        $variable .= '<a class="social-reddit" href="'.$redditURL.'" target="_blank"><i class="fab fa-reddit"></i></a>';    
        $variable .= '<a class="social-tumbleupon" href="'.$stumbleuponURL.'" target="_blank"><i class="fab fa-stumbleupon"></i></a>';    
        $variable .= '<a class="social-tumblr" href="'.$tumblrURL.'" target="_blank"><i class="fab fa-tumblr"></i></a>';     
        $variable .= '<a class="social-twitter" href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';    
        $variable .= '<a class="social-vk" href="'.$vkURL.'" target="_blank"><i class="fab fa-vk"></i></a>';   
        $variable .= '<a class="social-yummly" href="'.$yummlyURL.'" target="_blank"><i class="fab fa-yummly"></i></a>';
        $variable .= '<a class="social-email" href="'.$mailURL.'"><i class="fa fa-envelope"></i></a>';
        $variable .= '<a class="social-print" href="javascript:;" onclick="window.print()"><i class="fa fa-print"></i></a>';
        $variable .= '</div>';  

        return $variable.$content.$variable;
    }else{
        // if not a post/page then don't include sharing button
        return $variable.$content.$variable;
    }
};
add_filter( 'the_content', 'onum_social_sharing_buttons');

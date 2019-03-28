<?php 
// [oceanthemes_date time_custom="F j, Y"]
function oceanthemes_date_func( $atts ) {
    $date_format = shortcode_atts( array(
        'time_custom' => 'Y',        
    ), $atts );

    $dt = new DateTime("now");
    $gmt_timestamp = $dt->format("{$date_format['time_custom']}");

    return $gmt_timestamp;
}
add_shortcode( 'oceanthemes_date', 'oceanthemes_date_func' );


Ouput:

echo wp_specialchars_decode( do_shortcode( theme_name_prefix_get_option('copyright') ) );
?>
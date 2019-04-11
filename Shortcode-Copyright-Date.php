<?php 
/**
* https://codex.wordpress.org/Formatting_Date_and_Time
* Using this shortcode in backend theme option: [oceanthemes_date time_custom="F j, Y"]
* Ouput on footer.php file: echo wp_specialchars_decode( do_shortcode( otcore_get_option('copyright') ) );
**/

function oceanthemes_date_func( $atts ) {
    $date_format = shortcode_atts( array(
        'time_custom' => 'Y',        
    ), $atts );

    $dt = new DateTime("now");
    $gmt_timestamp = $dt->format("{$date_format['time_custom']}");

    return $gmt_timestamp;
}
add_shortcode( 'oceanthemes_date', 'oceanthemes_date_func' );
?>
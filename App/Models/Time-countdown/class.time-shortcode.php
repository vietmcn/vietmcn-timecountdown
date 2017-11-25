<?php 
class Vietmcn_time_shortcode extends Vietmcn_models
{
    public function __construct()
    {
        add_shortcode( 'time_down', array( $this, 'get_time' ) );
    }
    public function get_time( $atts )
    {
        $atts = shortcode_atts( array(
            'date' => '',
        ), $atts );
        
        return '<div data-countdown="'.$atts['date'].'"></div>';
    }
}

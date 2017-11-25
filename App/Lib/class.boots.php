<?php 
class Vietmcn_boots
{
    public static $options;
    
    public function __construct()
    {

    }
    public function options()
    {
        return get_option( 'vietmcn_add_option_item' );
    }
    public function import( $att = array() )
    {
        $options = ( isset( $att['option'] ) ) ? $att['option'] : null;
        //import
        if ( ! class_exists( $att['Class'] ) ) {
            // Load the Vietmcn Plugins
            require_once dirname( VIETMCN_FILE ) . '/App/Models/'.$att['require'].'.php';
            new $att['Class']( $options );
        }
    }
}
new Vietmcn_boots();
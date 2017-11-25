<?php 
class Vietmcn_bootstrap
{
    public function __construct()
    {
        $this->vietmcn_lib();
        //@import Models
        $this->vietmcn_models();
    }
    private function vietmcn_lib()
    {
        //Import boots
        if ( ! class_exists(  'Vietmcn_boots' ) ) {
            require_once( VIETMCN_PATH .'App/Lib/class.boots.php' );
        }
        //Import models
        if ( ! class_exists(  'Vietmcn_models' ) ) {
            require_once( VIETMCN_PATH .'App/Lib/class.models.php' );
        }
        //Import field
        if ( ! class_exists(  'Vietmcn_field' ) ) {
            require_once( VIETMCN_PATH .'App/Lib/class.field.php' );
        }
    }
    public function vietmcn_models()
    {
        //Get Option
        $vietmcn_option = get_option( 'vietmcn_add_option_item' );

        //import models Count Down Time
        if ( ! class_exists( 'Vietmcn_time_boots' ) ) {
            require_once VIETMCN_PATH .'/App/Models/Time-countdown/class.time-boots.php';
            new Vietmcn_time_boots( $vietmcn_option );
        }
        //import models Count Down Time
        if ( ! class_exists( 'Vietmcn_removebar_boots' ) ) {
            require_once VIETMCN_PATH .'/App/Models/Remove-bar/class.removebar-boots.php';
            new Vietmcn_removebar_boots( $vietmcn_option );
        }
        //import models Count Down Time
        if ( ! class_exists( 'Vietmcn_customer_order_boots' ) ) {
            require_once VIETMCN_PATH .'/App/Models/Product-salecount/class.order-boots.php';
            new Vietmcn_customer_order_boots( $vietmcn_option );
        }
        //import models Count Down Time
        if ( ! class_exists( 'Vietmcn_product_filter_boots' ) ) {
            require_once VIETMCN_PATH .'/App/Models/Product-filter/class.filter-boots.php';
            new Vietmcn_product_filter_boots( $vietmcn_option );
        }
    }
}
//Return Object
return new Vietmcn_bootstrap();
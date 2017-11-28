<?php 
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
define( 'VIETMCN_VERSION', '0.1' );
define( 'VIETMCN', '//vietmcn.com' );

if ( ! defined( 'VIETMCN_PATH' ) ) {
	define( 'VIETMCN_PATH', plugin_dir_path( VIETMCN_FILE ) );
}

if ( ! defined( 'VIETMCN_URL' ) ) {
	define( 'VIETMCN_URL', plugin_dir_url( VIETMCN_FILE ) );
}

if ( ! defined( 'VIETMCN_BASENAME' ) ) {
	define( 'VIETMCN_BASENAME', plugin_basename( VIETMCN_FILE ) );
}
//Import script Front
function vietmcn_print_script() {
    wp_enqueue_style( 'vietmcn', VIETMCN_URL .'App/Public/Css/vietmcn-style.min.css', false, VIETMCN_VERSION );    
}
add_action( 'wp_enqueue_scripts', 'vietmcn_print_script' );

//Import Boot 
if ( ! class_exists('Vietmcn_bootstrap' ) ) {
    require_once( VIETMCN_PATH .'App/class.bootstrap.php' );
}

//Đăng ký menu
function vietmcn_add_menu() {
    add_menu_page(
        __( 'Vietmcn', 'Vietmcn' ),
            'Vietmcn/Time',
            'manage_options',
            'vietmcn_plugins',
            'vietmcn_option',
            'dashicons-before-vietmcn_icon',
            '65'
    );
    add_action( 'admin_init', 'vietmcn_register_settings' );
    
}
add_action( 'admin_menu', 'vietmcn_add_menu' );

//Đăng Ký menu
function vietmcn_register_settings() {
    register_setting( 'vietmcn_plugins_option', 'vietmcn_add_option_time_item' );
}
//Import Script Style
function vietmcn_script() {
    wp_enqueue_style( 'vietmcn-css', VIETMCN_URL .'App/Public/Css/option.min.css', false, VIETMCN_VERSION );
    wp_enqueue_style( 'vietmcn-icon', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', false, VIETMCN_VERSION );
    wp_enqueue_script( 'vietmcn-option-js', VIETMCN_URL .'App/Public/Js/option.min.js', array('jquery'), VIETMCN_VERSION, true );
    wp_enqueue_script( 'vietmcn-option-js-popup', VIETMCN_URL .'App/Public/Js/lib/popup.min.js', array('jquery'), VIETMCN_VERSION, true ); 
    wp_enqueue_script( 'vietmcn-option-js-transition', VIETMCN_URL .'App/Public/Js/lib/transition.min.js', array('jquery'), VIETMCN_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'vietmcn_script' );
//Page Option
function vietmcn_option() {
    //@impot Option
    if ( !class_exists( 'Vietmcn_front_option' ) ) :
        require_once( VIETMCN_PATH .'App/Front/class.option.php' );
    endif;
    new Vietmcn_front_option();
    Vietmcn_front_option::vietmcn_option_welcome();

}
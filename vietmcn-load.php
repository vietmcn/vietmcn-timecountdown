<?php 
/**
 * Plugin Name: Vietmcn - Time Countdown Saleoff Product
 * Plugin URI: https://vietmcn.com/wordpress-timecountdown
 * Description: Models thêm phần mở rộng đếm ngược kết thúc thời gian giảm giá dành cho woocommerce
 * Author URI: https://vietmcn.com/tags/wordpress
 * Author: Vietmcn Team
 * Version: 1.0
 * Text Domain: vietmcn-plugins
 * License: GPL v3
 */
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if ( ! defined( 'VIETMCN_FILE' ) ) {
	define( 'VIETMCN_FILE', __FILE__ );
}
if ( ! function_exists( 'vietmcn_is_woocommerce' ) ) {
	/**
	 * Query WooCommerce activation
	 */
	function vietmcn_is_woocommerce() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

/**
 * Checks if the current page is a product archive
 * @return boolean
 */
function vietmcn_is_product_archive() {
	if ( vietmcn_is_woocommerce() ) {
		if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

// Load the Vietmcn Plugins
require_once dirname( VIETMCN_FILE ) . '/vietmcn-main.php';
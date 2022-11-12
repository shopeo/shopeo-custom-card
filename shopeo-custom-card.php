<?php
/*
Plugin Name: SHOPEO Custom Card
Plugin URI: https://shopeo.cn/
Description: SHOPEO Custom Card
Author: SHOPEO
Author URI: https://shopeo.cn/
Text Domain: shopeo-custom-card
Domain Path: /languages/
Version: 0.0.1
*/

require_once "vendor/autoload.php";

if ( ! defined( 'SHOPEO_CUSTOM_CARD_PLUGIN_FILE' ) ) {
	define( 'SHOPEO_CUSTOM_CARD_PLUGIN_FILE', __FILE__ );
}

if ( ! function_exists( 'shopeo_custom_card_activation' ) ) {
	function shopeo_custom_card_activation() {

	}
}
register_activation_hook( __FILE__, 'shopeo_custom_card_activation' );

if ( ! function_exists( 'shopeo_custom_card_deactivation' ) ) {
	function shopeo_custom_card_deactivation() {

	}
}
register_deactivation_hook( __FILE__, 'shopeo_custom_card_deactivation' );

add_action( 'init', function () {
	load_plugin_textdomain( 'shopeo-custom-card', false, dirname( __FILE__ ) . '/languages' );
} );

add_action( 'admin_enqueue_scripts', function () {
	$plugin_version = get_plugin_data( SHOPEO_CUSTOM_CARD_PLUGIN_FILE )['Version'];
	wp_enqueue_style( 'shopeo-custom-card-style', plugins_url( '/assets/css/backend.css', SHOPEO_CUSTOM_CARD_PLUGIN_FILE ), array(), $plugin_version );
	wp_style_add_data( 'shopeo-custom-card-style', 'rtl', 'replace' );
	wp_enqueue_script( 'shopeo-custom-card-script', plugins_url( '/assets/js/backend.js', SHOPEO_CUSTOM_CARD_PLUGIN_FILE ), array( 'jquery' ), $plugin_version );
	wp_localize_script( 'shopeo-custom-card-script', 'shopeo_custom_card', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	) );
} );

add_action( 'wp_enqueue_scripts', function () {
	$plugin_version = get_plugin_data( SHOPEO_CUSTOM_CARD_PLUGIN_FILE )['Version'];
	wp_enqueue_style( 'shopeo-custom-card-frontend-style', plugins_url( '/assets/css/frontend.css', SHOPEO_CUSTOM_CARD_PLUGIN_FILE ), array(), $plugin_version );
	wp_style_add_data( 'shopeo-custom-card-frontend-style', 'rtl', 'replace' );
	wp_enqueue_script( 'shopeo-custom-card-frontend-script', plugins_url( '/assets/js/frontend.js', SHOPEO_CUSTOM_CARD_PLUGIN_FILE ), array(), $plugin_version, true );
	wp_localize_script( 'shopeo-custom-card-frontend-script', 'shopeo_custom_card_frontend', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	) );
} );

add_action( 'woocommerce_single_product_summary', function () {
	global $product;
	if ( $product ) {
		echo "<div id='custom-app' style='display: none;'></div><button class='button' onclick='document.getElementById(" . "\"custom-app\"" . ").style.display=" . "\"block\"" . "'>" . __( 'Custom Now', 'shopeo-custom-card' ) . "</button>";
	}
}, 40 );

add_action( 'wp', function () {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
} );
<?php
/**
 * Plugin Name: WebbaKit
 * Plugin URI: https://webba-booking.com/
 * Description: Foundation plugin for Webba Starter theme. Adds Elementor widgets, design sections, templates, and Webba Booking compatible layout tools.
 * Version: 1.0.0
 * Author: Webba Booking
 * Author URI: https://webba-booking.com/
 * Text Domain: webbakit
 * Domain Path: /languages
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WEBBAKIT_VERSION', '1.0.0' );
define( 'WEBBAKIT_FILE', __FILE__ );
define( 'WEBBAKIT_PATH', plugin_dir_path( __FILE__ ) );
define( 'WEBBAKIT_URL', plugin_dir_url( __FILE__ ) );
define( 'WEBBAKIT_ASSETS_URL', WEBBAKIT_URL . 'assets/' );
define( 'WEBBAKIT_TEMPLATES_PATH', WEBBAKIT_PATH . 'templates/' );

require_once WEBBAKIT_PATH . 'includes/class-webbakit-plugin.php';
require_once WEBBAKIT_PATH . 'includes/class-webbakit-helpers.php';
require_once WEBBAKIT_PATH . 'includes/class-webbakit-template-loader.php';
require_once WEBBAKIT_PATH . 'includes/class-webbakit-webba-booking.php';

/**
 * Render a WebbaKit template and return its output.
 *
 * @param string $template Relative template path inside templates/.
 * @param array  $args     Template arguments.
 * @return string
 */
function webbakit_render_template( $template, $args = array() ) {
	return WebbaKit_Template_Loader::render( $template, $args );
}

/**
 * Check whether Webba Booking is active.
 *
 * @return bool
 */
function webbakit_is_webba_booking_active() {
	return WebbaKit_Webba_Booking::is_active();
}

/**
 * Get the default Webba Booking shortcode.
 *
 * @return string
 */
function webbakit_get_default_booking_shortcode() {
	return WebbaKit_Webba_Booking::get_default_shortcode();
}

WebbaKit_Plugin::instance();

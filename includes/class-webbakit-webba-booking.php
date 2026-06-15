<?php
/**
 * Webba Booking compatibility helpers.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Compatibility layer for Webba Booking.
 */
final class WebbaKit_Webba_Booking {
	/**
	 * Check whether a Webba Booking plugin variant is active.
	 *
	 * @return bool
	 */
	public static function is_active() {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';

		return is_plugin_active( 'webba-booking-lite/webba-booking-lite.php' ) || is_plugin_active( 'webba-booking/webba-booking.php' );
	}

	/**
	 * Return the default booking shortcode.
	 *
	 * @return string
	 */
	public static function get_default_shortcode() {
		return '[webbabooking]';
	}
}

<?php
/**
 * Main plugin bootstrap.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main WebbaKit plugin class.
 */
final class WebbaKit_Plugin {
	/**
	 * Singleton instance.
	 *
	 * @var WebbaKit_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Get singleton instance.
	 *
	 * @return WebbaKit_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->includes();

		WebbaKit_Elementor::instance();

		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_action( 'plugins_loaded', array( $this, 'init' ), 20 );
	}

	/**
	 * Load required class files.
	 *
	 * @return void
	 */
	private function includes() {
		require_once WEBBAKIT_PATH . 'includes/class-webbakit-assets.php';
		require_once WEBBAKIT_PATH . 'includes/class-webbakit-elementor.php';
	}

	/**
	 * Load translations.
	 *
	 * @return void
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'webbakit', false, dirname( plugin_basename( WEBBAKIT_FILE ) ) . '/languages' );
	}

	/**
	 * Initialize feature classes.
	 *
	 * @return void
	 */
	public function init() {
		WebbaKit_Assets::instance();
	}
}

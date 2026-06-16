<?php
/**
 * Asset registration and loading.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register plugin assets.
 */
final class WebbaKit_Assets {
	/**
	 * Singleton instance.
	 *
	 * @var WebbaKit_Assets|null
	 */
	private static $instance = null;

	/**
	 * Get singleton instance.
	 *
	 * @return WebbaKit_Assets
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
		add_action( 'init', array( $this, 'register_assets' ) );
		add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'enqueue_editor_assets' ) );
	}

	/**
	 * Register shared and widget assets.
	 *
	 * @return void
	 */
	public function register_assets() {
		wp_register_style(
			'webbakit-base',
			WEBBAKIT_ASSETS_URL . 'css/frontend.css',
			array(),
			WEBBAKIT_VERSION
		);

		wp_register_script(
			'webbakit-base',
			WEBBAKIT_ASSETS_URL . 'js/frontend.js',
			array(),
			WEBBAKIT_VERSION,
			true
		);

		$widgets = array(
			'hero',
			'services',
			'booking-form',
			'staff',
			'testimonials',
			'faq',
			'contact-cta',
			'pricing',
		);

		foreach ( $widgets as $widget ) {
			wp_register_style(
				'webbakit-' . $widget,
				WEBBAKIT_ASSETS_URL . 'css/' . $widget . '.css',
				array( 'webbakit-base' ),
				WEBBAKIT_VERSION
			);

			wp_register_script(
				'webbakit-' . $widget,
				WEBBAKIT_ASSETS_URL . 'js/' . $widget . '.js',
				array( 'webbakit-base' ),
				WEBBAKIT_VERSION,
				true
			);
		}
	}

	/**
	 * Enqueue Elementor editor assets.
	 *
	 * @return void
	 */
	public function enqueue_editor_assets() {
		wp_enqueue_style( 'webbakit-base' );
		wp_enqueue_script( 'webbakit-base' );

		wp_enqueue_style(
			'webbakit-editor',
			WEBBAKIT_ASSETS_URL . 'css/editor.css',
			array(),
			WEBBAKIT_VERSION
		);

		wp_enqueue_script(
			'webbakit-editor',
			WEBBAKIT_ASSETS_URL . 'js/editor.js',
			array(),
			WEBBAKIT_VERSION,
			true
		);
	}
}

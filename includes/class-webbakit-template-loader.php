<?php
/**
 * Template loader.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shared safe template rendering.
 */
final class WebbaKit_Template_Loader {
	/**
	 * Render a template safely.
	 *
	 * @param string $template Relative template path.
	 * @param array  $args     Template args.
	 * @return string
	 */
	public static function render( $template, $args = array() ) {
		$template_path = self::locate( $template );

		if ( ! $template_path ) {
			return '';
		}

		$template_path = apply_filters( 'webbakit_template_path', $template_path, $template, $args );

		if ( ! is_string( $template_path ) || ! file_exists( $template_path ) ) {
			return '';
		}

		ob_start();

		$args = is_array( $args ) ? $args : array();

		foreach ( $args as $key => $value ) {
			if ( preg_match( '/^[A-Za-z_][A-Za-z0-9_]*$/', (string) $key ) ) {
				${$key} = $value; // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.VariableRedeclaration
			}
		}

		include $template_path;

		return (string) ob_get_clean();
	}

	/**
	 * Locate a template under the plugin template directory.
	 *
	 * @param string $template Relative template path.
	 * @return string
	 */
	public static function locate( $template ) {
		$template = ltrim( (string) $template, '/\\' );

		if ( false !== strpos( $template, '..' ) ) {
			return '';
		}

		$path = wp_normalize_path( WEBBAKIT_TEMPLATES_PATH . $template );
		$base = wp_normalize_path( WEBBAKIT_TEMPLATES_PATH );

		if ( 0 !== strpos( $path, $base ) ) {
			return '';
		}

		return file_exists( $path ) ? $path : '';
	}
}

<?php
/**
 * Shared helper methods.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shared utility methods.
 */
final class WebbaKit_Helpers {
	/**
	 * Sanitize a checkbox-like value.
	 *
	 * @param mixed $value Value to sanitize.
	 * @return string
	 */
	public static function sanitize_switcher( $value ) {
		return ( 'yes' === $value ) ? 'yes' : '';
	}

	/**
	 * Sanitize a HEX color.
	 *
	 * @param mixed $value Color value.
	 * @return string
	 */
	public static function sanitize_color( $value ) {
		$color = is_string( $value ) ? sanitize_hex_color( $value ) : '';

		return is_string( $color ) ? $color : '';
	}

	/**
	 * Split textarea lines into a trimmed array.
	 *
	 * @param string $value Raw line-delimited value.
	 * @return array
	 */
	public static function parse_lines( $value ) {
		if ( ! is_string( $value ) || '' === trim( $value ) ) {
			return array();
		}

		$lines = preg_split( '/\r\n|\r|\n/', $value );
		$lines = array_map( 'trim', $lines );

		return array_values( array_filter( $lines ) );
	}

	/**
	 * Normalize a repeater list.
	 *
	 * @param mixed $items Raw items.
	 * @return array
	 */
	public static function ensure_array( $items ) {
		return is_array( $items ) ? $items : array();
	}

	/**
	 * Convert an Elementor URL field into a safe URL.
	 *
	 * @param mixed $link Elementor link field.
	 * @return string
	 */
	public static function get_link_url( $link ) {
		if ( ! is_array( $link ) || empty( $link['url'] ) ) {
			return '';
		}

		return esc_url( $link['url'] );
	}

	/**
	 * Build rel attribute for Elementor links.
	 *
	 * @param mixed $link Elementor link field.
	 * @return string
	 */
	public static function get_link_rel( $link ) {
		if ( ! is_array( $link ) ) {
			return '';
		}

		$rels = array();

		if ( ! empty( $link['nofollow'] ) ) {
			$rels[] = 'nofollow';
		}

		if ( ! empty( $link['is_external'] ) ) {
			$rels[] = 'noopener';
			$rels[] = 'noreferrer';
		}

		return implode( ' ', array_unique( $rels ) );
	}
}

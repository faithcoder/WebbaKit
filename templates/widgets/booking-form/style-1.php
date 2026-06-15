<?php
/**
 * Booking form style 1.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shortcode = ! empty( $settings['booking_shortcode'] ) ? wp_kses_post( $settings['booking_shortcode'] ) : webbakit_get_default_booking_shortcode();
?>
<section class="webbakit-widget webbakit-booking-form webbakit-booking-form--style-1">
	<div class="webbakit-booking-form__panel">
		<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
		<?php if ( ! empty( $settings['helper_text'] ) ) : ?><p class="webbakit-booking-form__helper"><?php echo esc_html( $settings['helper_text'] ); ?></p><?php endif; ?>
		<div class="webbakit-booking-form__form-wrap">
			<?php if ( webbakit_is_webba_booking_active() ) : ?>
				<?php echo do_shortcode( $shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php elseif ( 'yes' === ( $settings['show_inactive_notice'] ?? '' ) ) : ?>
				<p class="webbakit-booking-form__notice"><?php esc_html_e( 'Webba Booking is not active. Install or activate it to render the booking form.', 'webbakit' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>

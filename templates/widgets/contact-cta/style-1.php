<?php
/**
 * Contact CTA style 1.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$button_url = WebbaKit_Helpers::get_link_url( $settings['button_url'] ?? array() );
?>
<section class="webbakit-widget webbakit-contact-cta webbakit-contact-cta--style-1">
	<div class="webbakit-contact-cta__content">
		<h2 class="webbakit-contact-cta__title"><?php echo esc_html( $settings['title'] ?? '' ); ?></h2>
		<p class="webbakit-contact-cta__subtitle"><?php echo esc_html( $settings['subtitle'] ?? '' ); ?></p>
		<?php if ( ! empty( $settings['button_text'] ) ) : ?><a class="webbakit-contact-cta__button" href="<?php echo esc_url( $button_url ? $button_url : '#booking' ); ?>"><?php echo esc_html( $settings['button_text'] ); ?></a><?php endif; ?>
	</div>
</section>

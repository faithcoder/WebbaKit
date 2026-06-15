<?php
/**
 * Contact CTA style 2.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$button_url = WebbaKit_Helpers::get_link_url( $settings['button_url'] ?? array() );
?>
<section class="webbakit-widget webbakit-contact-cta webbakit-contact-cta--style-2">
	<div class="webbakit-contact-cta__layout">
		<div class="webbakit-contact-cta__content">
			<h2 class="webbakit-contact-cta__title"><?php echo esc_html( $settings['title'] ?? '' ); ?></h2>
			<p class="webbakit-contact-cta__subtitle"><?php echo esc_html( $settings['subtitle'] ?? '' ); ?></p>
			<?php if ( ! empty( $settings['button_text'] ) ) : ?><a class="webbakit-contact-cta__button" href="<?php echo esc_url( $button_url ? $button_url : '#booking' ); ?>"><?php echo esc_html( $settings['button_text'] ); ?></a><?php endif; ?>
		</div>
		<?php if ( 'yes' === ( $settings['show_contact_info'] ?? '' ) ) : ?><div class="webbakit-contact-cta__meta"><?php if ( ! empty( $settings['phone'] ) ) : ?><p><span class="webbakit-contact-cta__meta-label">Phone</span><?php echo esc_html( $settings['phone'] ); ?></p><?php endif; ?><?php if ( ! empty( $settings['email'] ) ) : ?><p><span class="webbakit-contact-cta__meta-label">Email</span><?php echo esc_html( $settings['email'] ); ?></p><?php endif; ?><?php if ( ! empty( $settings['address'] ) ) : ?><p><span class="webbakit-contact-cta__meta-label">Address</span><?php echo esc_html( $settings['address'] ); ?></p><?php endif; ?></div><?php endif; ?>
	</div>
</section>

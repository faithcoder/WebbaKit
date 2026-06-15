<?php
/**
 * Pricing style 2.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = WebbaKit_Helpers::ensure_array( $settings['pricing_items'] ?? array() );
?>
<section class="webbakit-widget webbakit-pricing webbakit-pricing--style-2">
	<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
	<div class="webbakit-pricing__list">
		<?php foreach ( $items as $item ) : ?>
			<div class="webbakit-pricing__row">
				<div><h3 class="webbakit-pricing__name"><?php echo esc_html( $item['plan_name'] ?? '' ); ?></h3><p class="webbakit-pricing__description"><?php echo esc_html( $item['description'] ?? '' ); ?></p></div>
				<div class="webbakit-pricing__aside"><div class="webbakit-pricing__price"><?php echo esc_html( $item['price'] ?? '' ); ?></div><p class="webbakit-pricing__duration"><?php echo esc_html( $item['duration'] ?? '' ); ?></p><?php if ( ! empty( $item['button_text'] ) ) : ?><a class="webbakit-pricing__button" href="<?php echo esc_url( WebbaKit_Helpers::get_link_url( $item['button_url'] ?? array() ) ?: '#booking' ); ?>"><?php echo esc_html( $item['button_text'] ); ?></a><?php endif; ?></div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

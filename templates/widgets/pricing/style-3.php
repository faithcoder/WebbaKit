<?php
/**
 * Pricing style 3.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items    = WebbaKit_Helpers::ensure_array( $settings['pricing_items'] ?? array() );
$featured = ! empty( $items[0] ) ? $items[0] : array();
?>
<section class="webbakit-widget webbakit-pricing webbakit-pricing--style-3">
	<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
	<div class="webbakit-pricing__feature-layout">
		<div class="webbakit-pricing__card is-featured">
			<?php if ( ! empty( $featured['badge_text'] ) ) : ?><span class="webbakit-pricing__badge"><?php echo esc_html( $featured['badge_text'] ); ?></span><?php endif; ?>
			<h3 class="webbakit-pricing__name"><?php echo esc_html( $featured['plan_name'] ?? '' ); ?></h3>
			<div class="webbakit-pricing__price"><?php echo esc_html( $featured['price'] ?? '' ); ?></div>
			<p class="webbakit-pricing__description"><?php echo esc_html( $featured['description'] ?? '' ); ?></p>
			<?php if ( ! empty( $featured['button_text'] ) ) : ?><a class="webbakit-pricing__button" href="<?php echo esc_url( WebbaKit_Helpers::get_link_url( $featured['button_url'] ?? array() ) ?: '#booking' ); ?>"><?php echo esc_html( $featured['button_text'] ); ?></a><?php endif; ?>
		</div>
		<div class="webbakit-pricing__list">
			<?php foreach ( array_slice( $items, 1 ) as $item ) : ?><div class="webbakit-pricing__row"><h4 class="webbakit-pricing__name"><?php echo esc_html( $item['plan_name'] ?? '' ); ?></h4><div class="webbakit-pricing__price"><?php echo esc_html( $item['price'] ?? '' ); ?></div></div><?php endforeach; ?>
		</div>
	</div>
</section>

<?php
/**
 * Pricing style 1.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = WebbaKit_Helpers::ensure_array( $settings['pricing_items'] ?? array() );
?>
<section class="webbakit-widget webbakit-pricing webbakit-pricing--style-1">
	<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
	<div class="webbakit-pricing__grid">
		<?php foreach ( $items as $item ) : ?>
			<?php $features = WebbaKit_Helpers::parse_lines( $item['feature_list'] ?? '' ); ?>
			<article class="webbakit-pricing__card<?php echo 'yes' === ( $item['highlighted'] ?? '' ) ? ' is-featured' : ''; ?>">
				<?php if ( ! empty( $item['badge_text'] ) && 'yes' === ( $item['highlighted'] ?? '' ) ) : ?><span class="webbakit-pricing__badge"><?php echo esc_html( $item['badge_text'] ); ?></span><?php endif; ?>
				<h3 class="webbakit-pricing__name"><?php echo esc_html( $item['plan_name'] ?? '' ); ?></h3>
				<div class="webbakit-pricing__price"><?php echo esc_html( $item['price'] ?? '' ); ?></div>
				<p class="webbakit-pricing__duration"><?php echo esc_html( $item['duration'] ?? '' ); ?></p>
				<p class="webbakit-pricing__description"><?php echo esc_html( $item['description'] ?? '' ); ?></p>
				<?php if ( $features ) : ?><ul class="webbakit-pricing__features"><?php foreach ( $features as $feature ) : ?><li><?php echo esc_html( $feature ); ?></li><?php endforeach; ?></ul><?php endif; ?>
				<?php if ( ! empty( $item['button_text'] ) ) : ?><a class="webbakit-pricing__button" href="<?php echo esc_url( WebbaKit_Helpers::get_link_url( $item['button_url'] ?? array() ) ?: '#booking' ); ?>"><?php echo esc_html( $item['button_text'] ); ?></a><?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
</section>

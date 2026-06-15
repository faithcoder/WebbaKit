<?php
/**
 * Services style 2.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = WebbaKit_Helpers::ensure_array( $settings['services'] ?? array() );
?>
<section class="webbakit-widget webbakit-services webbakit-services--style-2">
	<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
	<div class="webbakit-services__stack">
		<?php foreach ( $services as $service ) : ?>
			<article class="webbakit-services__card webbakit-services__card--horizontal">
				<div class="webbakit-services__side">
					<?php if ( ! empty( $service['icon']['value'] ) && class_exists( '\Elementor\Icons_Manager' ) ) : ?><div class="webbakit-services__icon"><?php \Elementor\Icons_Manager::render_icon( $service['icon'], array( 'aria-hidden' => 'true' ) ); ?></div><?php endif; ?>
					<div><h3 class="webbakit-services__card-title"><?php echo esc_html( $service['title'] ?? '' ); ?></h3><p class="webbakit-services__description"><?php echo esc_html( $service['description'] ?? '' ); ?></p></div>
				</div>
				<div class="webbakit-services__aside">
					<span class="webbakit-services__meta"><?php echo esc_html( $service['duration'] ?? '' ); ?></span>
					<?php if ( ! empty( $service['price'] ) ) : ?><strong class="webbakit-services__price"><?php echo esc_html( $service['price'] ); ?></strong><?php endif; ?>
					<?php if ( ! empty( $service['button_text'] ) ) : ?><a class="webbakit-services__button" href="<?php echo esc_url( WebbaKit_Helpers::get_link_url( $service['button_url'] ?? array() ) ?: '#' ); ?>"><?php echo esc_html( $service['button_text'] ); ?></a><?php endif; ?>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>

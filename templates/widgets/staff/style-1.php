<?php
/**
 * Staff style 1.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = WebbaKit_Helpers::ensure_array( $settings['staff_members'] ?? array() );
$style = sprintf( '--webbakit-columns-desktop:%1$s;--webbakit-columns-tablet:%2$s;--webbakit-columns-mobile:%3$s;', esc_attr( $settings['columns_desktop'] ?? '3' ), esc_attr( $settings['columns_tablet'] ?? '2' ), esc_attr( $settings['columns_mobile'] ?? '1' ) );
?>
<section class="webbakit-widget webbakit-staff webbakit-staff--style-1">
	<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
	<div class="webbakit-staff__grid" style="<?php echo esc_attr( $style ); ?>">
		<?php foreach ( $items as $item ) : ?>
			<article class="webbakit-staff__card">
				<?php if ( ! empty( $item['photo']['url'] ) ) : ?><div class="webbakit-staff__image"><img src="<?php echo esc_url( $item['photo']['url'] ); ?>" alt=""></div><?php endif; ?>
				<h3 class="webbakit-staff__name"><?php echo esc_html( $item['name'] ?? '' ); ?></h3>
				<p class="webbakit-staff__role"><?php echo esc_html( $item['role'] ?? '' ); ?></p>
				<p class="webbakit-staff__bio"><?php echo esc_html( $item['bio'] ?? '' ); ?></p>
				<?php if ( ! empty( $item['button_text'] ) ) : ?><a class="webbakit-staff__button" href="<?php echo esc_url( WebbaKit_Helpers::get_link_url( $item['button_url'] ?? array() ) ?: '#' ); ?>"><?php echo esc_html( $item['button_text'] ); ?></a><?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
</section>

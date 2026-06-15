<?php
/**
 * Staff style 2.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = WebbaKit_Helpers::ensure_array( $settings['staff_members'] ?? array() );
?>
<section class="webbakit-widget webbakit-staff webbakit-staff--style-2">
	<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
	<div class="webbakit-staff__stack">
		<?php foreach ( $items as $item ) : ?>
			<article class="webbakit-staff__card webbakit-staff__card--horizontal">
				<?php if ( ! empty( $item['photo']['url'] ) ) : ?><div class="webbakit-staff__image"><img src="<?php echo esc_url( $item['photo']['url'] ); ?>" alt=""></div><?php endif; ?>
				<div class="webbakit-staff__content">
					<h3 class="webbakit-staff__name"><?php echo esc_html( $item['name'] ?? '' ); ?></h3>
					<p class="webbakit-staff__role"><?php echo esc_html( $item['role'] ?? '' ); ?></p>
					<p class="webbakit-staff__bio"><?php echo esc_html( $item['bio'] ?? '' ); ?></p>
					<div class="webbakit-staff__meta"><?php if ( ! empty( $item['email'] ) ) : ?><a href="mailto:<?php echo antispambot( esc_attr( $item['email'] ) ); ?>"><?php echo esc_html( $item['email'] ); ?></a><?php endif; ?><?php if ( ! empty( $item['phone'] ) ) : ?><span><?php echo esc_html( $item['phone'] ); ?></span><?php endif; ?></div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<?php
/**
 * Hero style 1.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_url = ! empty( $settings['hero_image']['url'] ) ? esc_url( $settings['hero_image']['url'] ) : '';
$primary   = WebbaKit_Helpers::get_link_url( $settings['primary_button_url'] ?? array() );
$secondary = WebbaKit_Helpers::get_link_url( $settings['secondary_button_url'] ?? array() );
?>
<section class="webbakit-widget webbakit-hero webbakit-hero--style-1">
	<div class="webbakit-hero__inner">
		<div class="webbakit-hero__content">
			<?php if ( ! empty( $settings['badge_text'] ) ) : ?><span class="webbakit-hero__badge"><?php echo esc_html( $settings['badge_text'] ); ?></span><?php endif; ?>
			<?php if ( ! empty( $settings['pre_title'] ) ) : ?><p class="webbakit-hero__pretitle"><?php echo esc_html( $settings['pre_title'] ); ?></p><?php endif; ?>
			<h1 class="webbakit-hero__title"><?php echo esc_html( $settings['title'] ?? '' ); ?> <?php if ( ! empty( $settings['highlight_title'] ) ) : ?><span class="webbakit-hero__highlight"><?php echo esc_html( $settings['highlight_title'] ); ?></span><?php endif; ?></h1>
			<?php if ( ! empty( $settings['subtitle'] ) ) : ?><p class="webbakit-hero__subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></p><?php endif; ?>
			<div class="webbakit-hero__actions">
				<?php if ( 'yes' === ( $settings['show_booking_button'] ?? '' ) && ! empty( $settings['primary_button_text'] ) ) : ?><a class="webbakit-hero__button webbakit-hero__button--primary" href="<?php echo esc_url( $primary ? $primary : '#booking' ); ?>"><?php echo esc_html( $settings['primary_button_text'] ); ?></a><?php endif; ?>
				<?php if ( ! empty( $settings['secondary_button_text'] ) && $secondary ) : ?><a class="webbakit-hero__button webbakit-hero__button--secondary" href="<?php echo esc_url( $secondary ); ?>"><?php echo esc_html( $settings['secondary_button_text'] ); ?></a><?php endif; ?>
			</div>
		</div>
		<?php if ( $image_url ) : ?><div class="webbakit-hero__media"><img class="webbakit-hero__image" src="<?php echo $image_url; ?>" alt=""></div><?php endif; ?>
	</div>
</section>

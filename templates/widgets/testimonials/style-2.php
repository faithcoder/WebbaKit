<?php
/**
 * Testimonials style 2.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = WebbaKit_Helpers::ensure_array( $settings['testimonials'] ?? array() );
$item  = ! empty( $items[0] ) ? $items[0] : array();
?>
<section class="webbakit-widget webbakit-testimonials webbakit-testimonials--style-2">
	<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
	<article class="webbakit-testimonials__feature">
		<?php if ( 'yes' === ( $item['show_rating'] ?? '' ) ) : ?><div class="webbakit-testimonials__rating"><?php echo esc_html( str_repeat( '★', max( 1, min( 5, absint( $item['rating'] ?? 5 ) ) ) ) ); ?></div><?php endif; ?>
		<p class="webbakit-testimonials__text"><?php echo esc_html( $item['testimonial_text'] ?? '' ); ?></p>
		<div class="webbakit-testimonials__person"><strong class="webbakit-testimonials__name"><?php echo esc_html( $item['client_name'] ?? '' ); ?></strong><span class="webbakit-testimonials__role"><?php echo esc_html( $item['client_role'] ?? '' ); ?></span></div>
	</article>
</section>

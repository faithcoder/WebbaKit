<?php
/**
 * Testimonials style 3.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = WebbaKit_Helpers::ensure_array( $settings['testimonials'] ?? array() );
?>
<section class="webbakit-widget webbakit-testimonials webbakit-testimonials--style-3">
	<div class="webbakit-testimonials__strip">
		<?php foreach ( $items as $item ) : ?>
			<div class="webbakit-testimonials__strip-item"><span class="webbakit-testimonials__name"><?php echo esc_html( $item['client_name'] ?? '' ); ?></span><span class="webbakit-testimonials__text"><?php echo esc_html( $item['testimonial_text'] ?? '' ); ?></span></div>
		<?php endforeach; ?>
	</div>
</section>

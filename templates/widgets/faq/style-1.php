<?php
/**
 * FAQ style 1.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = WebbaKit_Helpers::ensure_array( $settings['faq_items'] ?? array() );
?>
<section class="webbakit-widget webbakit-faq webbakit-faq--style-1" data-webbakit-accordion>
	<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
	<div class="webbakit-faq__list">
		<?php foreach ( $items as $index => $item ) : ?>
			<div class="webbakit-faq__item<?php echo ( 0 === $index && 'yes' === ( $settings['first_item_open'] ?? '' ) ) ? ' is-open' : ''; ?>">
				<button class="webbakit-faq__question" type="button"><?php echo esc_html( $item['question'] ?? '' ); ?></button>
				<div class="webbakit-faq__answer"<?php echo ( 0 === $index && 'yes' === ( $settings['first_item_open'] ?? '' ) ) ? '' : ' hidden'; ?>><?php echo esc_html( $item['answer'] ?? '' ); ?></div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

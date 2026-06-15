<?php
/**
 * FAQ style 3.
 *
 * @package WebbaKit
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = WebbaKit_Helpers::ensure_array( $settings['faq_items'] ?? array() );
?>
<section class="webbakit-widget webbakit-faq webbakit-faq--style-3">
	<div class="webbakit-section-heading"><h2 class="webbakit-section-heading__title"><?php echo esc_html( $settings['section_title'] ?? '' ); ?></h2><p class="webbakit-section-heading__subtitle"><?php echo esc_html( $settings['section_subtitle'] ?? '' ); ?></p></div>
	<div class="webbakit-faq__cards">
		<?php foreach ( $items as $item ) : ?>
			<div class="webbakit-faq__item"><h3 class="webbakit-faq__question"><?php echo esc_html( $item['question'] ?? '' ); ?></h3><div class="webbakit-faq__answer"><?php echo esc_html( $item['answer'] ?? '' ); ?></div></div>
		<?php endforeach; ?>
	</div>
</section>

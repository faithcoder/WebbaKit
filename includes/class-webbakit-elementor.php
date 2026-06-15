<?php
/**
 * Elementor integration.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers Elementor categories and widgets safely.
 */
final class WebbaKit_Elementor {
	/**
	 * Singleton instance.
	 *
	 * @var WebbaKit_Elementor|null
	 */
	private static $instance = null;

	/**
	 * Get singleton instance.
	 *
	 * @return WebbaKit_Elementor
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		add_action( 'admin_notices', array( $this, 'maybe_render_admin_notices' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'register_category' ) );
		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}

	/**
	 * Include widget files.
	 *
	 * @return void
	 */
	private function includes() {
		require_once WEBBAKIT_PATH . 'includes/elementor/class-webbakit-widget-base.php';
		require_once WEBBAKIT_PATH . 'includes/elementor/class-webbakit-hero-widget.php';
		require_once WEBBAKIT_PATH . 'includes/elementor/class-webbakit-services-widget.php';
		require_once WEBBAKIT_PATH . 'includes/elementor/class-webbakit-booking-form-widget.php';
		require_once WEBBAKIT_PATH . 'includes/elementor/class-webbakit-staff-widget.php';
		require_once WEBBAKIT_PATH . 'includes/elementor/class-webbakit-testimonials-widget.php';
		require_once WEBBAKIT_PATH . 'includes/elementor/class-webbakit-faq-widget.php';
		require_once WEBBAKIT_PATH . 'includes/elementor/class-webbakit-contact-cta-widget.php';
		require_once WEBBAKIT_PATH . 'includes/elementor/class-webbakit-pricing-widget.php';
	}

	/**
	 * Check if Elementor is active.
	 *
	 * @return bool
	 */
	public function is_elementor_installed() {
		return class_exists( '\Elementor\Plugin' );
	}

	/**
	 * Check if Elementor is fully loaded.
	 *
	 * @return bool
	 */
	public function is_elementor_active() {
		return did_action( 'elementor/loaded' ) || class_exists( '\Elementor\Plugin' );
	}

	/**
	 * Render admin notices.
	 *
	 * @return void
	 */
	public function maybe_render_admin_notices() {
		if ( current_user_can( 'activate_plugins' ) && ! $this->is_elementor_active() ) {
			printf(
				'<div class="notice notice-warning notice-dismissible"><p>%s</p></div>',
				esc_html__( 'WebbaKit Elementor widgets require Elementor to be installed and activated.', 'webbakit' )
			);
		}

		if ( current_user_can( 'activate_plugins' ) && ! webbakit_is_webba_booking_active() ) {
			printf(
				'<div class="notice notice-info notice-dismissible"><p>%s</p></div>',
				esc_html__( 'Webba Booking is recommended for full booking form functionality.', 'webbakit' )
			);
		}
	}

	/**
	 * Register custom Elementor category.
	 *
	 * @param \Elementor\Elements_Manager $elements_manager Elementor elements manager.
	 * @return void
	 */
	public function register_category( $elements_manager ) {
		$elements_manager->add_category(
			'webbakit',
			array(
				'title' => esc_html__( 'WebbaKit', 'webbakit' ),
				'icon'  => 'fa fa-plug',
			)
		);
	}

	/**
	 * Register widgets.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Widgets manager.
	 * @return void
	 */
	public function register_widgets( $widgets_manager ) {
		if ( ! class_exists( '\Elementor\Widget_Base' ) ) {
			return;
		}

		$this->includes();

		$widgets = array(
			new WebbaKit_Hero_Widget(),
			new WebbaKit_Services_Widget(),
			new WebbaKit_Booking_Form_Widget(),
			new WebbaKit_Staff_Widget(),
			new WebbaKit_Testimonials_Widget(),
			new WebbaKit_FAQ_Widget(),
			new WebbaKit_Contact_CTA_Widget(),
			new WebbaKit_Pricing_Widget(),
		);

		foreach ( $widgets as $widget ) {
			if ( method_exists( $widgets_manager, 'get_widget_types' ) && $widgets_manager->get_widget_types( $widget->get_name() ) ) {
				continue;
			}

			$widgets_manager->register( $widget );
		}
	}
}

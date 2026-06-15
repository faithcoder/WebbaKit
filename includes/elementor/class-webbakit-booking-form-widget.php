<?php
/**
 * Booking form widget.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

/**
 * Webba Booking Form widget.
 */
class WebbaKit_Booking_Form_Widget extends WebbaKit_Widget_Base {
	public function get_name() {
		return 'webbakit-booking-form';
	}

	public function get_title() {
		return esc_html__( 'Webba Booking Form', 'webbakit' );
	}

	public function get_icon() {
		return 'eicon-calendar';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content_section', array( 'label' => esc_html__( 'Content', 'webbakit' ) ) );
		$this->add_design_style_control();
		$this->add_section_heading_controls( esc_html__( 'Book your appointment', 'webbakit' ), esc_html__( 'Choose a service and time below.', 'webbakit' ) );
		$this->add_control( 'booking_shortcode', array( 'label' => esc_html__( 'Booking Shortcode', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => webbakit_get_default_booking_shortcode(), 'label_block' => true ) );
		$this->add_control( 'helper_text', array( 'label' => esc_html__( 'Helper Text', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'rows' => 3, 'default' => esc_html__( 'Use your default Webba Booking shortcode or replace it with a service-specific one.', 'webbakit' ) ) );
		$this->add_control( 'show_inactive_notice', array( 'label' => esc_html__( 'Show Webba Booking Inactive Notice', 'webbakit' ), 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->end_controls_section();

		$this->start_controls_section( 'style_section', array( 'label' => esc_html__( 'Style', 'webbakit' ), 'tab' => Controls_Manager::TAB_STYLE ) );
		$this->add_control( 'wrapper_background', array( 'label' => esc_html__( 'Wrapper Background', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-booking-form__panel' => 'background-color: {{VALUE}};' ) ) );
		$this->add_group_control( Group_Control_Border::get_type(), array( 'name' => 'wrapper_border', 'selector' => '{{WRAPPER}} .webbakit-booking-form__panel' ) );
		$this->add_control( 'wrapper_radius', array( 'label' => esc_html__( 'Border Radius', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-booking-form__panel' => 'border-radius: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_responsive_control( 'wrapper_padding', array( 'label' => esc_html__( 'Padding', 'webbakit' ), 'type' => Controls_Manager::DIMENSIONS, 'size_units' => array( 'px', 'rem' ), 'selectors' => array( '{{WRAPPER}} .webbakit-booking-form__panel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ) ) );
		$this->add_heading_style_controls( '.webbakit-section-heading__title', '.webbakit-section-heading__subtitle' );
		$this->add_control( 'helper_text_color', array( 'label' => esc_html__( 'Helper Text Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-booking-form__helper' => 'color: {{VALUE}};' ) ) );
		$this->add_group_control( Group_Control_Box_Shadow::get_type(), array( 'name' => 'form_container_shadow', 'selector' => '{{WRAPPER}} .webbakit-booking-form__form-wrap' ) );
		$this->end_controls_section();
	}

	protected function render() {
		$this->render_widget_template( 'booking-form', $this->get_settings_for_display() );
	}
}

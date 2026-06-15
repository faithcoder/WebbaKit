<?php
/**
 * Contact CTA widget.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Webba Contact CTA widget.
 */
class WebbaKit_Contact_CTA_Widget extends WebbaKit_Widget_Base {
	public function get_name() {
		return 'webbakit-contact-cta';
	}

	public function get_title() {
		return esc_html__( 'Webba Contact CTA', 'webbakit' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content_section', array( 'label' => esc_html__( 'Content', 'webbakit' ) ) );
		$this->add_design_style_control();
		$this->add_control( 'title', array( 'label' => esc_html__( 'Title', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Ready to schedule your visit?', 'webbakit' ), 'label_block' => true ) );
		$this->add_control( 'subtitle', array( 'label' => esc_html__( 'Subtitle', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'default' => esc_html__( 'Use Webba Booking to manage services, availability, deposits, reminders, and payment methods.', 'webbakit' ), 'rows' => 4 ) );
		$this->add_control( 'button_text', array( 'label' => esc_html__( 'Button Text', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Book Now', 'webbakit' ) ) );
		$this->add_control( 'button_url', array( 'label' => esc_html__( 'Button URL', 'webbakit' ), 'type' => Controls_Manager::URL ) );
		$this->add_control( 'phone', array( 'label' => esc_html__( 'Phone', 'webbakit' ), 'type' => Controls_Manager::TEXT ) );
		$this->add_control( 'email', array( 'label' => esc_html__( 'Email', 'webbakit' ), 'type' => Controls_Manager::TEXT ) );
		$this->add_control( 'address', array( 'label' => esc_html__( 'Address', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'rows' => 3 ) );
		$this->add_control( 'show_contact_info', array( 'label' => esc_html__( 'Show Contact Info', 'webbakit' ), 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->add_control( 'image', array( 'label' => esc_html__( 'Image', 'webbakit' ), 'type' => Controls_Manager::MEDIA ) );
		$this->end_controls_section();

		$this->start_controls_section( 'style_section', array( 'label' => esc_html__( 'Style', 'webbakit' ), 'tab' => Controls_Manager::TAB_STYLE ) );
		$this->add_control( 'background_color', array( 'label' => esc_html__( 'Background Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-contact-cta' => 'background-color: {{VALUE}};' ) ) );
		$this->add_control( 'text_color', array( 'label' => esc_html__( 'Text Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-contact-cta' => 'color: {{VALUE}};' ) ) );
		$this->add_button_style_controls( '.webbakit-contact-cta__button' );
		$this->add_control( 'contact_icon_color', array( 'label' => esc_html__( 'Contact Icon Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-contact-cta__meta-label' => 'color: {{VALUE}};' ) ) );
		$this->add_box_style_controls( '.webbakit-contact-cta' );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'cta_title_typography', 'selector' => '{{WRAPPER}} .webbakit-contact-cta__title' ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'cta_text_typography', 'selector' => '{{WRAPPER}} .webbakit-contact-cta__subtitle, {{WRAPPER}} .webbakit-contact-cta__meta' ) );
		$this->add_alignment_control( '.webbakit-contact-cta__content' );
		$this->end_controls_section();
	}

	protected function render() {
		$this->render_widget_template( 'contact-cta', $this->get_settings_for_display() );
	}
}

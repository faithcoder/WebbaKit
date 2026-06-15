<?php
/**
 * Hero widget.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

/**
 * Webba Hero widget.
 */
class WebbaKit_Hero_Widget extends WebbaKit_Widget_Base {
	public function get_name() {
		return 'webbakit-hero';
	}

	public function get_title() {
		return esc_html__( 'Webba Hero', 'webbakit' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => esc_html__( 'Content', 'webbakit' ),
			)
		);

		$this->add_design_style_control();
		$this->add_control( 'pre_title', array( 'label' => esc_html__( 'Pre-title', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Simple online booking', 'webbakit' ), 'label_block' => true ) );
		$this->add_control( 'title', array( 'label' => esc_html__( 'Main Title', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Launch a professional booking website faster.', 'webbakit' ), 'label_block' => true ) );
		$this->add_control( 'highlight_title', array( 'label' => esc_html__( 'Highlighted Title Text', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'booking', 'webbakit' ), 'label_block' => true ) );
		$this->add_control( 'subtitle', array( 'label' => esc_html__( 'Subtitle', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'default' => esc_html__( 'Built for service businesses using Webba Booking, Gutenberg, and Elementor layouts.', 'webbakit' ), 'rows' => 4 ) );
		$this->add_control( 'show_booking_button', array( 'label' => esc_html__( 'Show Booking Button', 'webbakit' ), 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->add_primary_button_controls( esc_html__( 'Book an Appointment', 'webbakit' ) );
		$this->add_secondary_button_controls();
		$this->add_control( 'hero_image', array( 'label' => esc_html__( 'Image', 'webbakit' ), 'type' => Controls_Manager::MEDIA ) );
		$this->add_control( 'badge_text', array( 'label' => esc_html__( 'Badge Text', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Webba Booking Ready', 'webbakit' ), 'label_block' => true ) );
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__( 'Style', 'webbakit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control( 'background_color', array( 'label' => esc_html__( 'Background Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-hero' => 'background-color: {{VALUE}};' ) ) );
		$this->add_control( 'title_color', array( 'label' => esc_html__( 'Title Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-hero__title' => 'color: {{VALUE}};' ) ) );
		$this->add_control( 'highlight_color', array( 'label' => esc_html__( 'Highlight Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-hero__highlight' => 'color: {{VALUE}};' ) ) );
		$this->add_control( 'subtitle_color', array( 'label' => esc_html__( 'Subtitle Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-hero__subtitle' => 'color: {{VALUE}};' ) ) );
		$this->add_button_style_controls( '.webbakit-hero__button' );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'hero_title_typography', 'selector' => '{{WRAPPER}} .webbakit-hero__title' ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'hero_subtitle_typography', 'selector' => '{{WRAPPER}} .webbakit-hero__subtitle' ) );
		$this->add_responsive_control( 'hero_spacing', array( 'label' => esc_html__( 'Content Gap', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'range' => array( 'px' => array( 'min' => 0, 'max' => 120 ) ), 'selectors' => array( '{{WRAPPER}} .webbakit-hero__content' => 'gap: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_responsive_control( 'hero_border_radius', array( 'label' => esc_html__( 'Border Radius', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'range' => array( 'px' => array( 'min' => 0, 'max' => 60 ) ), 'selectors' => array( '{{WRAPPER}} .webbakit-hero, {{WRAPPER}} .webbakit-hero__image, {{WRAPPER}} .webbakit-hero__panel' => 'border-radius: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_group_control( Group_Control_Box_Shadow::get_type(), array( 'name' => 'hero_shadow', 'selector' => '{{WRAPPER}} .webbakit-hero__panel, {{WRAPPER}} .webbakit-hero__image' ) );
		$this->add_alignment_control( '.webbakit-hero__content' );
		$this->end_controls_section();
	}

	protected function render() {
		$this->render_widget_template( 'hero', $this->get_settings_for_display() );
	}
}

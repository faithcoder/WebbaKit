<?php
/**
 * Testimonials widget.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

/**
 * Webba Testimonials widget.
 */
class WebbaKit_Testimonials_Widget extends WebbaKit_Widget_Base {
	public function get_name() {
		return 'webbakit-testimonials';
	}

	public function get_title() {
		return esc_html__( 'Webba Testimonials', 'webbakit' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content_section', array( 'label' => esc_html__( 'Content', 'webbakit' ) ) );
		$this->add_design_style_control();
		$this->add_section_heading_controls( esc_html__( 'Clients appreciate the simple booking flow.', 'webbakit' ), esc_html__( 'Build trust with short proof points close to the booking area.', 'webbakit' ) );

		$repeater = new Repeater();
		$repeater->add_control( 'client_photo', array( 'label' => esc_html__( 'Client Photo', 'webbakit' ), 'type' => Controls_Manager::MEDIA ) );
		$repeater->add_control( 'client_name', array( 'label' => esc_html__( 'Client Name', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Avery Brooks', 'webbakit' ) ) );
		$repeater->add_control( 'client_role', array( 'label' => esc_html__( 'Client Role / Company', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Marketing Director', 'webbakit' ) ) );
		$repeater->add_control( 'testimonial_text', array( 'label' => esc_html__( 'Testimonial Text', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'rows' => 4 ) );
		$repeater->add_control( 'rating', array( 'label' => esc_html__( 'Rating', 'webbakit' ), 'type' => Controls_Manager::NUMBER, 'default' => 5, 'min' => 1, 'max' => 5 ) );
		$repeater->add_control( 'show_rating', array( 'label' => esc_html__( 'Show Rating', 'webbakit' ), 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );

		$this->add_control(
			'testimonials',
			array(
				'label'       => esc_html__( 'Testimonials', 'webbakit' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ client_name }}}',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section( 'style_section', array( 'label' => esc_html__( 'Style', 'webbakit' ), 'tab' => Controls_Manager::TAB_STYLE ) );
		$this->add_control( 'card_background', array( 'label' => esc_html__( 'Card Background', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-testimonials__card' => 'background-color: {{VALUE}};' ) ) );
		$this->add_control( 'quote_color', array( 'label' => esc_html__( 'Quote Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-testimonials__text' => 'color: {{VALUE}};' ) ) );
		$this->add_control( 'rating_color', array( 'label' => esc_html__( 'Rating Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-testimonials__rating' => 'color: {{VALUE}};' ) ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'testimonial_text_typography', 'selector' => '{{WRAPPER}} .webbakit-testimonials__text' ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'testimonial_name_typography', 'selector' => '{{WRAPPER}} .webbakit-testimonials__name' ) );
		$this->add_responsive_control( 'card_radius', array( 'label' => esc_html__( 'Border Radius', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-testimonials__card' => 'border-radius: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_group_control( Group_Control_Box_Shadow::get_type(), array( 'name' => 'testimonial_shadow', 'selector' => '{{WRAPPER}} .webbakit-testimonials__card' ) );
		$this->add_responsive_control( 'card_gap', array( 'label' => esc_html__( 'Gap', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-testimonials__grid' => 'gap: {{SIZE}}{{UNIT}};' ) ) );
		$this->end_controls_section();
	}

	protected function render() {
		$this->render_widget_template( 'testimonials', $this->get_settings_for_display() );
	}
}

<?php
/**
 * Services widget.
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
use Elementor\Repeater;

/**
 * Webba Services widget.
 */
class WebbaKit_Services_Widget extends WebbaKit_Widget_Base {
	public function get_name() {
		return 'webbakit-services';
	}

	public function get_title() {
		return esc_html__( 'Webba Services', 'webbakit' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content_section', array( 'label' => esc_html__( 'Content', 'webbakit' ) ) );
		$this->add_design_style_control();
		$this->add_section_heading_controls( esc_html__( 'Services designed for easy scheduling.', 'webbakit' ), esc_html__( 'Show durations, outcomes, and booking-friendly service details.', 'webbakit' ) );

		$repeater = new Repeater();
		$repeater->add_control( 'icon', array( 'label' => esc_html__( 'Icon', 'webbakit' ), 'type' => Controls_Manager::ICONS ) );
		$repeater->add_control( 'title', array( 'label' => esc_html__( 'Title', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Consultation', 'webbakit' ), 'label_block' => true ) );
		$repeater->add_control( 'duration', array( 'label' => esc_html__( 'Duration', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => '30 min' ) );
		$repeater->add_control( 'description', array( 'label' => esc_html__( 'Description', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'rows' => 3 ) );
		$repeater->add_control( 'price', array( 'label' => esc_html__( 'Price', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => '$49' ) );
		$repeater->add_control( 'button_text', array( 'label' => esc_html__( 'Button Text', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'View Details', 'webbakit' ) ) );
		$repeater->add_control( 'button_url', array( 'label' => esc_html__( 'Button URL', 'webbakit' ), 'type' => Controls_Manager::URL, 'default' => array( 'url' => '#' ) ) );

		$this->add_control(
			'services',
			array(
				'label'       => esc_html__( 'Services', 'webbakit' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array( 'title' => esc_html__( 'Consultation', 'webbakit' ), 'duration' => '30 min', 'description' => esc_html__( 'Short introductory session.', 'webbakit' ), 'price' => '$49', 'button_text' => esc_html__( 'View Details', 'webbakit' ) ),
					array( 'title' => esc_html__( 'Treatment', 'webbakit' ), 'duration' => '60 min', 'description' => esc_html__( 'Longer session with a specialist.', 'webbakit' ), 'price' => '$89', 'button_text' => esc_html__( 'View Details', 'webbakit' ) ),
				),
			)
		);

		$this->add_columns_control( 'columns_desktop', esc_html__( 'Columns Desktop', 'webbakit' ), 3 );
		$this->add_columns_control( 'columns_tablet', esc_html__( 'Columns Tablet', 'webbakit' ), 2 );
		$this->add_columns_control( 'columns_mobile', esc_html__( 'Columns Mobile', 'webbakit' ), 1 );
		$this->end_controls_section();

		$this->start_controls_section( 'style_section', array( 'label' => esc_html__( 'Style', 'webbakit' ), 'tab' => Controls_Manager::TAB_STYLE ) );
		$this->add_control( 'card_background', array( 'label' => esc_html__( 'Card Background', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-services__card' => 'background-color: {{VALUE}};' ) ) );
		$this->add_control( 'card_border_color', array( 'label' => esc_html__( 'Card Border Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-services__card' => 'border-color: {{VALUE}};' ) ) );
		$this->add_responsive_control( 'card_padding', array( 'label' => esc_html__( 'Card Padding', 'webbakit' ), 'type' => Controls_Manager::DIMENSIONS, 'size_units' => array( 'px', 'rem' ), 'selectors' => array( '{{WRAPPER}} .webbakit-services__card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ) ) );
		$this->add_control( 'card_radius', array( 'label' => esc_html__( 'Card Border Radius', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-services__card' => 'border-radius: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_control( 'icon_color', array( 'label' => esc_html__( 'Icon Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-services__icon' => 'color: {{VALUE}};' ) ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'services_title_typography', 'selector' => '{{WRAPPER}} .webbakit-services__card-title' ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'services_description_typography', 'selector' => '{{WRAPPER}} .webbakit-services__description' ) );
		$this->add_control( 'price_color', array( 'label' => esc_html__( 'Price Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-services__price' => 'color: {{VALUE}};' ) ) );
		$this->add_button_style_controls( '.webbakit-services__button' );
		$this->add_responsive_control( 'card_gap', array( 'label' => esc_html__( 'Gap', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-services__grid' => 'gap: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_group_control( Group_Control_Box_Shadow::get_type(), array( 'name' => 'card_hover_shadow', 'selector' => '{{WRAPPER}} .webbakit-services__card:hover' ) );
		$this->end_controls_section();
	}

	protected function render() {
		$this->render_widget_template( 'services', $this->get_settings_for_display() );
	}
}

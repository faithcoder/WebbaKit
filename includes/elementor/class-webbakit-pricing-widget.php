<?php
/**
 * Pricing widget.
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
 * Webba Pricing widget.
 */
class WebbaKit_Pricing_Widget extends WebbaKit_Widget_Base {
	public function get_name() {
		return 'webbakit-pricing';
	}

	public function get_title() {
		return esc_html__( 'Webba Pricing', 'webbakit' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content_section', array( 'label' => esc_html__( 'Content', 'webbakit' ) ) );
		$this->add_design_style_control();
		$this->add_section_heading_controls( esc_html__( 'Transparent service packages', 'webbakit' ), esc_html__( 'Use pricing cards for deposits, service tiers, or promotional packages.', 'webbakit' ) );

		$repeater = new Repeater();
		$repeater->add_control( 'plan_name', array( 'label' => esc_html__( 'Plan / Service Name', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Starter', 'webbakit' ) ) );
		$repeater->add_control( 'price', array( 'label' => esc_html__( 'Price', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => '$49' ) );
		$repeater->add_control( 'duration', array( 'label' => esc_html__( 'Duration', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Per session', 'webbakit' ) ) );
		$repeater->add_control( 'description', array( 'label' => esc_html__( 'Description', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'rows' => 3 ) );
		$repeater->add_control( 'feature_list', array( 'label' => esc_html__( 'Feature List', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'description' => esc_html__( 'One feature per line.', 'webbakit' ), 'rows' => 4 ) );
		$repeater->add_control( 'button_text', array( 'label' => esc_html__( 'Button Text', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Book Now', 'webbakit' ) ) );
		$repeater->add_control( 'button_url', array( 'label' => esc_html__( 'Button URL', 'webbakit' ), 'type' => Controls_Manager::URL ) );
		$repeater->add_control( 'highlighted', array( 'label' => esc_html__( 'Highlighted', 'webbakit' ), 'type' => Controls_Manager::SWITCHER, 'default' => '' ) );
		$repeater->add_control( 'badge_text', array( 'label' => esc_html__( 'Badge Text', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Popular', 'webbakit' ) ) );

		$this->add_control(
			'pricing_items',
			array(
				'label'       => esc_html__( 'Pricing Items', 'webbakit' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ plan_name }}}',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section( 'style_section', array( 'label' => esc_html__( 'Style', 'webbakit' ), 'tab' => Controls_Manager::TAB_STYLE ) );
		$this->add_control( 'card_background', array( 'label' => esc_html__( 'Card Background', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-pricing__card' => 'background-color: {{VALUE}};' ) ) );
		$this->add_control( 'highlighted_card_background', array( 'label' => esc_html__( 'Highlighted Card Background', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-pricing__card.is-featured' => 'background-color: {{VALUE}};' ) ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'price_typography', 'selector' => '{{WRAPPER}} .webbakit-pricing__price' ) );
		$this->add_control( 'feature_color', array( 'label' => esc_html__( 'Feature Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-pricing__features li' => 'color: {{VALUE}};' ) ) );
		$this->add_button_style_controls( '.webbakit-pricing__button' );
		$this->add_responsive_control( 'card_radius', array( 'label' => esc_html__( 'Border Radius', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-pricing__card' => 'border-radius: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_group_control( Group_Control_Box_Shadow::get_type(), array( 'name' => 'pricing_shadow', 'selector' => '{{WRAPPER}} .webbakit-pricing__card' ) );
		$this->add_responsive_control( 'card_gap', array( 'label' => esc_html__( 'Gap', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-pricing__grid' => 'gap: {{SIZE}}{{UNIT}};' ) ) );
		$this->end_controls_section();
	}

	protected function render() {
		$this->render_widget_template( 'pricing', $this->get_settings_for_display() );
	}
}

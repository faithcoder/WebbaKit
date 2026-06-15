<?php
/**
 * FAQ widget.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

/**
 * Webba FAQ widget.
 */
class WebbaKit_FAQ_Widget extends WebbaKit_Widget_Base {
	public function get_name() {
		return 'webbakit-faq';
	}

	public function get_title() {
		return esc_html__( 'Webba FAQ', 'webbakit' );
	}

	public function get_icon() {
		return 'eicon-help-o';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content_section', array( 'label' => esc_html__( 'Content', 'webbakit' ) ) );
		$this->add_design_style_control();
		$this->add_section_heading_controls( esc_html__( 'Frequently asked questions', 'webbakit' ), esc_html__( 'Answer common booking concerns before clients choose a time.', 'webbakit' ) );

		$repeater = new Repeater();
		$repeater->add_control( 'question', array( 'label' => esc_html__( 'Question', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Can I reschedule?', 'webbakit' ) ) );
		$repeater->add_control( 'answer', array( 'label' => esc_html__( 'Answer', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'rows' => 4 ) );

		$this->add_control(
			'faq_items',
			array(
				'label'       => esc_html__( 'FAQ Items', 'webbakit' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ question }}}',
			)
		);

		$this->add_control( 'first_item_open', array( 'label' => esc_html__( 'First Item Open', 'webbakit' ), 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->end_controls_section();

		$this->start_controls_section( 'style_section', array( 'label' => esc_html__( 'Style', 'webbakit' ), 'tab' => Controls_Manager::TAB_STYLE ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'faq_question_typography', 'selector' => '{{WRAPPER}} .webbakit-faq__question' ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'faq_answer_typography', 'selector' => '{{WRAPPER}} .webbakit-faq__answer' ) );
		$this->add_control( 'item_background', array( 'label' => esc_html__( 'Item Background', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-faq__item' => 'background-color: {{VALUE}};' ) ) );
		$this->add_control( 'border_color', array( 'label' => esc_html__( 'Border Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-faq__item' => 'border-color: {{VALUE}};' ) ) );
		$this->add_control( 'active_color', array( 'label' => esc_html__( 'Active Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-faq__item.is-open .webbakit-faq__question' => 'color: {{VALUE}};' ) ) );
		$this->add_responsive_control( 'item_radius', array( 'label' => esc_html__( 'Border Radius', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-faq__item' => 'border-radius: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_responsive_control( 'item_padding', array( 'label' => esc_html__( 'Padding', 'webbakit' ), 'type' => Controls_Manager::DIMENSIONS, 'size_units' => array( 'px', 'rem' ), 'selectors' => array( '{{WRAPPER}} .webbakit-faq__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ) ) );
		$this->add_responsive_control( 'item_gap', array( 'label' => esc_html__( 'Gap', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-faq__list' => 'gap: {{SIZE}}{{UNIT}};' ) ) );
		$this->end_controls_section();
	}

	protected function render() {
		$this->render_widget_template( 'faq', $this->get_settings_for_display() );
	}
}

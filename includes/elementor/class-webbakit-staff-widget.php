<?php
/**
 * Staff widget.
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
 * Webba Staff widget.
 */
class WebbaKit_Staff_Widget extends WebbaKit_Widget_Base {
	public function get_name() {
		return 'webbakit-staff';
	}

	public function get_title() {
		return esc_html__( 'Webba Staff', 'webbakit' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content_section', array( 'label' => esc_html__( 'Content', 'webbakit' ) ) );
		$this->add_design_style_control();
		$this->add_section_heading_controls( esc_html__( 'Experienced professionals ready to help.', 'webbakit' ), esc_html__( 'Introduce the people clients can trust before they book.', 'webbakit' ) );

		$repeater = new Repeater();
		$repeater->add_control( 'photo', array( 'label' => esc_html__( 'Photo', 'webbakit' ), 'type' => Controls_Manager::MEDIA ) );
		$repeater->add_control( 'name', array( 'label' => esc_html__( 'Name', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Alex Morgan', 'webbakit' ), 'label_block' => true ) );
		$repeater->add_control( 'role', array( 'label' => esc_html__( 'Role', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Lead Specialist', 'webbakit' ) ) );
		$repeater->add_control( 'bio', array( 'label' => esc_html__( 'Bio', 'webbakit' ), 'type' => Controls_Manager::TEXTAREA, 'rows' => 3 ) );
		$repeater->add_control( 'email', array( 'label' => esc_html__( 'Email', 'webbakit' ), 'type' => Controls_Manager::TEXT ) );
		$repeater->add_control( 'phone', array( 'label' => esc_html__( 'Phone', 'webbakit' ), 'type' => Controls_Manager::TEXT ) );
		$repeater->add_control( 'button_text', array( 'label' => esc_html__( 'Button Text', 'webbakit' ), 'type' => Controls_Manager::TEXT, 'default' => esc_html__( 'Contact', 'webbakit' ) ) );
		$repeater->add_control( 'button_url', array( 'label' => esc_html__( 'Button URL', 'webbakit' ), 'type' => Controls_Manager::URL ) );
		$repeater->add_control( 'facebook_url', array( 'label' => esc_html__( 'Facebook URL', 'webbakit' ), 'type' => Controls_Manager::URL ) );
		$repeater->add_control( 'instagram_url', array( 'label' => esc_html__( 'Instagram URL', 'webbakit' ), 'type' => Controls_Manager::URL ) );
		$repeater->add_control( 'linkedin_url', array( 'label' => esc_html__( 'LinkedIn URL', 'webbakit' ), 'type' => Controls_Manager::URL ) );
		$repeater->add_control( 'x_url', array( 'label' => esc_html__( 'X URL', 'webbakit' ), 'type' => Controls_Manager::URL ) );
		$repeater->add_control( 'website_url', array( 'label' => esc_html__( 'Website URL', 'webbakit' ), 'type' => Controls_Manager::URL ) );

		$this->add_control(
			'staff_members',
			array(
				'label'       => esc_html__( 'Team Members', 'webbakit' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ name }}}',
			)
		);

		$this->add_columns_control( 'columns_desktop', esc_html__( 'Columns Desktop', 'webbakit' ), 3 );
		$this->add_columns_control( 'columns_tablet', esc_html__( 'Columns Tablet', 'webbakit' ), 2 );
		$this->add_columns_control( 'columns_mobile', esc_html__( 'Columns Mobile', 'webbakit' ), 1 );
		$this->end_controls_section();

		$this->start_controls_section( 'style_section', array( 'label' => esc_html__( 'Style', 'webbakit' ), 'tab' => Controls_Manager::TAB_STYLE ) );
		$this->add_control( 'card_background', array( 'label' => esc_html__( 'Card Background', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-staff__card' => 'background-color: {{VALUE}};' ) ) );
		$this->add_control( 'image_radius', array( 'label' => esc_html__( 'Image Radius', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-staff__image img' => 'border-radius: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'name_typography', 'selector' => '{{WRAPPER}} .webbakit-staff__name' ) );
		$this->add_control( 'role_color', array( 'label' => esc_html__( 'Role Color', 'webbakit' ), 'type' => Controls_Manager::COLOR, 'selectors' => array( '{{WRAPPER}} .webbakit-staff__role' => 'color: {{VALUE}};' ) ) );
		$this->add_group_control( Group_Control_Typography::get_type(), array( 'name' => 'bio_typography', 'selector' => '{{WRAPPER}} .webbakit-staff__bio' ) );
		$this->add_responsive_control( 'card_padding', array( 'label' => esc_html__( 'Card Padding', 'webbakit' ), 'type' => Controls_Manager::DIMENSIONS, 'size_units' => array( 'px', 'rem' ), 'selectors' => array( '{{WRAPPER}} .webbakit-staff__card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ) ) );
		$this->add_responsive_control( 'card_gap', array( 'label' => esc_html__( 'Gap', 'webbakit' ), 'type' => Controls_Manager::SLIDER, 'selectors' => array( '{{WRAPPER}} .webbakit-staff__grid' => 'gap: {{SIZE}}{{UNIT}};' ) ) );
		$this->add_group_control( Group_Control_Box_Shadow::get_type(), array( 'name' => 'staff_shadow', 'selector' => '{{WRAPPER}} .webbakit-staff__card' ) );
		$this->add_alignment_control( '.webbakit-staff__card' );
		$this->end_controls_section();
	}

	protected function render() {
		$this->render_widget_template( 'staff', $this->get_settings_for_display() );
	}
}

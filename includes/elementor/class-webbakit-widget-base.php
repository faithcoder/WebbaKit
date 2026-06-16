<?php
/**
 * Shared Elementor widget base.
 *
 * @package WebbaKit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

/**
 * Base widget with shared helpers.
 */
abstract class WebbaKit_Widget_Base extends Widget_Base {
	/**
	 * Get categories.
	 *
	 * @return array
	 */
	public function get_categories() {
		return array( 'webbakit' );
	}

	/**
	 * Get style dependencies.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return array( 'webbakit-base', $this->get_widget_asset_handle() );
	}

	/**
	 * Get script dependencies.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array( 'webbakit-base', $this->get_widget_asset_handle() );
	}

	/**
	 * Get the asset handle for the current WebbaKit widget.
	 *
	 * @return string
	 */
	protected function get_widget_asset_handle() {
		return sanitize_key( $this->get_name() );
	}

	/**
	 * Add design style select control.
	 *
	 * @return void
	 */
	protected function add_design_style_control() {
		$this->add_control(
			'design_style',
			array(
				'label'   => esc_html__( 'Design Style', 'webbakit' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => array(
					'style-1' => esc_html__( 'Style 1', 'webbakit' ),
					'style-2' => esc_html__( 'Style 2', 'webbakit' ),
					'style-3' => esc_html__( 'Style 3', 'webbakit' ),
				),
			)
		);
	}

	/**
	 * Add shared title and subtitle controls.
	 *
	 * @param string $title_default Default title.
	 * @param string $subtitle_default Default subtitle.
	 * @return void
	 */
	protected function add_section_heading_controls( $title_default = '', $subtitle_default = '' ) {
		$this->add_control(
			'section_title',
			array(
				'label'       => esc_html__( 'Section Title', 'webbakit' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $title_default,
				'label_block' => true,
			)
		);

		$this->add_control(
			'section_subtitle',
			array(
				'label'       => esc_html__( 'Section Subtitle', 'webbakit' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => $subtitle_default,
				'rows'        => 3,
				'label_block' => true,
			)
		);
	}

	/**
	 * Add shared alignment control.
	 *
	 * @param string $selector CSS selector.
	 * @return void
	 */
	protected function add_alignment_control( $selector ) {
		$this->add_responsive_control(
			'content_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'webbakit' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'webbakit' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'webbakit' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'webbakit' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'left',
				'selectors' => array(
					'{{WRAPPER}} ' . $selector => 'text-align: {{VALUE}};',
				),
			)
		);
	}

	/**
	 * Add shared primary button controls.
	 *
	 * @param string $text_default Default button text.
	 * @return void
	 */
	protected function add_primary_button_controls( $text_default = '' ) {
		$this->add_control(
			'primary_button_text',
			array(
				'label'       => esc_html__( 'Primary Button Text', 'webbakit' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $text_default,
				'label_block' => true,
			)
		);

		$this->add_control(
			'primary_button_url',
			array(
				'label'       => esc_html__( 'Primary Button URL', 'webbakit' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'https://',
				'default'     => array(
					'url' => '',
				),
			)
		);
	}

	/**
	 * Add shared secondary button controls.
	 *
	 * @return void
	 */
	protected function add_secondary_button_controls() {
		$this->add_control(
			'secondary_button_text',
			array(
				'label'       => esc_html__( 'Secondary Button Text', 'webbakit' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'label_block' => true,
			)
		);

		$this->add_control(
			'secondary_button_url',
			array(
				'label'       => esc_html__( 'Secondary Button URL', 'webbakit' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'https://',
				'default'     => array(
					'url' => '',
				),
			)
		);
	}

	/**
	 * Add common section box controls.
	 *
	 * @param string $selector CSS selector.
	 * @return void
	 */
	protected function add_box_style_controls( $selector ) {
		$this->add_responsive_control(
			'section_padding',
			array(
				'label'      => esc_html__( 'Padding', 'webbakit' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . $selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'section_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'webbakit' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . $selector => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'section_shadow',
				'selector' => '{{WRAPPER}} ' . $selector,
			)
		);
	}

	/**
	 * Add shared heading typography controls.
	 *
	 * @param string $title_selector Title selector.
	 * @param string $subtitle_selector Subtitle selector.
	 * @return void
	 */
	protected function add_heading_style_controls( $title_selector, $subtitle_selector ) {
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'webbakit' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . $title_selector => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} ' . $title_selector,
			)
		);

		$this->add_control(
			'subtitle_color',
			array(
				'label'     => esc_html__( 'Subtitle Color', 'webbakit' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . $subtitle_selector => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} ' . $subtitle_selector,
			)
		);
	}

	/**
	 * Add shared button style controls.
	 *
	 * @param string $selector Button selector.
	 * @return void
	 */
	protected function add_button_style_controls( $selector ) {
		$this->add_control(
			'button_text_color',
			array(
				'label'     => esc_html__( 'Button Text Color', 'webbakit' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . $selector => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button_background_color',
			array(
				'label'     => esc_html__( 'Button Background Color', 'webbakit' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . $selector => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} ' . $selector,
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'button_border',
				'selector' => '{{WRAPPER}} ' . $selector,
			)
		);
	}

	/**
	 * Add a responsive columns control stored as CSS custom properties.
	 *
	 * @param string $name Control base name.
	 * @param string $label Label text.
	 * @param int    $default Default value.
	 * @return void
	 */
	protected function add_columns_control( $name, $label, $default = 3 ) {
		$this->add_responsive_control(
			$name,
			array(
				'label'   => $label,
				'type'    => Controls_Manager::SELECT,
				'default' => (string) $default,
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
			)
		);
	}

	/**
	 * Render a widget template using the selected style.
	 *
	 * @param string $slug Widget slug.
	 * @param array  $settings Settings.
	 * @return void
	 */
	protected function render_widget_template( $slug, $settings ) {
		$style    = ! empty( $settings['design_style'] ) ? sanitize_key( $settings['design_style'] ) : 'style-1';
		$template = 'widgets/' . $slug . '/' . $style . '.php';

		if ( '' === WebbaKit_Template_Loader::locate( $template ) ) {
			$template = 'widgets/' . $slug . '/style-1.php';
		}

		echo webbakit_render_template(
			$template,
			array(
				'settings' => $settings,
				'widget'   => $this,
			)
		); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

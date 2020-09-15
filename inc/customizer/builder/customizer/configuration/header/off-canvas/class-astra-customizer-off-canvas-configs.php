<?php
/**
 * Astra Theme Customizer Configuration Off Canvas.
 *
 * @package     astra-builder
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       x.x.x
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'Astra_Customizer_Config_Base' ) ) {

	/**
	 * Register Off Canvas Customizer Configurations.
	 *
	 * @since x.x.x
	 */
	class Astra_Customizer_Off_Canvas_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Builder Above Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since x.x.x
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_section = 'section-popup-header-builder';

			$_configs = array(

				// Section: Off-Canvas.
				array(
					'name'     => $_section,
					'type'     => 'section',
					'title'    => __( 'Off-Canvas', 'astra-builder', 'astra' ),
					'panel'    => 'panel-header-builder-group',
					'priority' => 30,
				),

				/**
				 * Option: Header Builder Tabs
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[builder-header-off-canvas-tabs]',
					'section'     => $_section,
					'type'        => 'control',
					'control'     => 'ast-builder-header-control',
					'priority'    => 0,
					'description' => '',
				),

				/**
				 * Option: Mobile Header Type.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[mobile-header-type]',
					'default'   => astra_get_option( 'mobile-header-type' ),
					'type'      => 'control',
					'control'   => 'select',
					'section'   => $_section,
					'priority'  => 30,
					'title'     => __( 'Header Type', 'astra-builder', 'astra' ),
					'choices'   => array(
						'off-canvas' => __( 'Off-Canvas', 'astra-builder', 'astra' ),
						'dropdown'   => __( 'Dropdown', 'astra-builder', 'astra' ),
					),
					'transport' => 'postMessage',
					'context'   => array(
						array(
							'setting' => 'ast_selected_tab',
							'value'   => 'general',
						),
					),
				),

				/**
				 * Option: Off-Canvas Layout
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[off-canvas-layout]',
					'default'   => astra_get_option( 'off-canvas-layout' ),
					'type'      => 'control',
					'transport' => 'postMessage',
					'control'   => 'select',
					'section'   => $_section,
					'priority'  => 30,
					'title'     => __( 'Layout', 'astra-builder', 'astra' ),
					'required'  => array(
						ASTRA_THEME_SETTINGS . '[mobile-header-type]',
						'==',
						'off-canvas',
					),
					'choices'   => array(
						'full-width' => __( 'Full Width', 'astra-builder', 'astra' ),
						'side-panel' => __( 'Flyout', 'astra-builder', 'astra' ),
					),
					'context'   => array(
						array(
							'setting' => 'ast_selected_tab',
							'value'   => 'general',
						),
					),
				),

				/**
				 * Option: Off-Canvas Slide-Out.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[off-canvas-slide]',
					'default'   => astra_get_option( 'off-canvas-slide' ),
					'type'      => 'control',
					'transport' => 'postMessage',
					'control'   => 'select',
					'section'   => $_section,
					'priority'  => 30,
					'title'     => __( 'Position', 'astra-builder', 'astra' ),
					'choices'   => array(
						'left'  => __( 'Left', 'astra-builder', 'astra' ),
						'right' => __( 'Right', 'astra-builder', 'astra' ),
					),
					'required'  => array(
						ASTRA_THEME_SETTINGS . '[off-canvas-layout]',
						'==',
						'side-panel',
					),
					'context'   => array(
						array(
							'setting' => 'ast_selected_tab',
							'value'   => 'general',
						),
					),
				),

				// Option Group: Off-Canvas Colors Group.
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[off-canvas-colors-group]',
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Background', 'astra-builder', 'astra' ),
					'section'   => $_section,
					'transport' => 'postMessage',
					'priority'  => 30,
					'context'   => array(
						array(
							'setting' => 'ast_selected_tab',
							'value'   => 'design',
						),
					),
				),

				/**
				 * Option: Off-Canvas Background.
				 */
				array(
					'name'      => 'off-canvas-background',
					'transport' => 'postMessage',
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[off-canvas-colors-group]',
					'section'   => $_section,
					'title'     => '',
					'control'   => 'ast-background',
					'default'   => astra_get_option( 'off-canvas-background' ),
					'priority'  => 35,
					'context'   => array(
						array(
							'setting' => 'ast_selected_tab',
							'value'   => 'design',
						),
					),
				),

				// Option: Off-Canvas Close Icon Color.
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[off-canvas-close-color]',
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'off-canvas-close-color' ),
					'type'      => 'control',
					'control'   => 'ast-color',
					'section'   => $_section,
					'priority'  => 30,
					'title'     => __( 'Close Icon Color', 'astra-builder', 'astra' ),
					'required'  => array(
						ASTRA_THEME_SETTINGS . '[mobile-header-type]',
						'==',
						'off-canvas',
					),
					'context'   => array(
						array(
							'setting' => 'ast_selected_tab',
							'value'   => 'design',
						),
					),
				),
			);

			return array_merge( $configurations, $_configs );
		}
	}

	/**
	 * Kicking this off by creating object of this class.
	 */
	new Astra_Customizer_Off_Canvas_Configs();
}

<?php
/**
 * steklodom Theme Customizer
 *
 * @package steklodom
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function steklodom_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'steklodom_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'steklodom_customize_partial_blogdescription',
		) );
	}

	// Настройки темы steklodom
	$wp_customize->add_section('steklodom_theme_options', array(
		'title' => __('Настройки темы', 'steklodom'),
		'priority' => 10
	));

	$wp_customize->add_setting('steklodom_home_category', array(
		'default' => ''
	));

	$wp_customize->add_setting('steklodom_projects', array(
		'default' => ''
	));

	$wp_customize->add_setting('steklodom_additional_slider', array(
		'default' => ''
	));

	$wp_customize->add_control('steklodom_home_category', array(
		'label' => __('Категории вывода на главном слайдере', 'steklodom'),
		'section' => 'steklodom_theme_options',
		'type' => 'text'
	));

	$wp_customize->add_control('steklodom_projects', array(
		'label' => __('Категории вывода для наших проектов', 'steklodom'),
		'section' => 'steklodom_theme_options',
		'type' => 'text'
	));

	$wp_customize->add_control('steklodom_additional_slider', array(
		'label' => __('Категории вывода для дополнительного слайдера', 'steklodom'),
		'section' => 'steklodom_theme_options',
		'type' => 'text'
	));
}
add_action( 'customize_register', 'steklodom_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function steklodom_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function steklodom_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function steklodom_customize_preview_js() {
	wp_enqueue_script( 'steklodom-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'steklodom_customize_preview_js' );

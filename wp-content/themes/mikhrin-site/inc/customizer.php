<?php
/**
 * Mikhrin and Co Site Theme Customizer.
 *
 * @package Mikhrin_and_Co_Site
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mikhrin_and_co_site_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'mikhrin_and_co_site_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mikhrin_and_co_site_customize_preview_js() {
	wp_enqueue_script( 'mikhrin_and_co_site_customizer', get_template_directory_uri() . '/src/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mikhrin_and_co_site_customize_preview_js' );

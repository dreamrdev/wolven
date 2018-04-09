<?php
/**
 * Wolven Theme Customizer
 *
 * @package Wolven
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wolven_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'wolven_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'wolven_customize_partial_blogdescription',
		) );
	}

	//Remove Default Sections
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('colors');

	//Add New Sections

	//Header Section
	$wp_customize->add_section('header', array(
		'title' => __('Header', 'wolven'),
		'priority' => 20,
	));
			//header link color
			$wp_customize->add_setting('header-link-color', array(
				'default' => '#ffffff',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header-link-color-select', array(
				'label' => __('Header Link Color', 'wolven'),
				'section' => 'header',
				'settings' => 'header-link-color',
			)));
			//header link hover color
			$wp_customize->add_setting('header-link-hover-color', array(
				'default' => '#a30000',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header-link-hover-color-select', array(
				'label' => __('Header Link Hover Color', 'wolven'),
				'section' => 'header',
				'settings' => 'header-link-hover-color',
			)));
			//site description text color
			$wp_customize->add_setting('site-desc-text-color', array(
				'default' => '#ffffff',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site-desc-text-color-select', array(
				'label' => __('Site Description Text Color', 'wolven'),
				'section' => 'header',
				'settings' => 'site-desc-text-color',
			)));
			//CTA Button text
			$wp_customize->add_setting('cta-button-text', array(
				'default' => '',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'cta-button-text-textbox', array(
				'type' => 'text',
				'label' => __('Header Button Text', 'wolven'),
				'section' => 'header',
				'settings' => 'cta-button-text',
			)));
			//CTA Button URL
			$wp_customize->add_setting('cta-button-url', array(
				'default' => '',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'cta-button-url-textbox', array(
				'type' => 'text',
				'label' => __('Header Button URL', 'wolven'),
				'section' => 'header',
				'settings' => 'cta-button-url',
			)));
			//button text color
			$wp_customize->add_setting('cta-button-text-color', array(
				'default' => '#ffffff',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta-button-text-color-select', array(
				'label' => __('Header Button Text Color', 'wolven'),
				'section' => 'header',
				'settings' => 'cta-button-text-color',
			)));
			//button border color
			$wp_customize->add_setting('cta-button-border-color', array(
				'default' => '#ffffff',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta-button-text-border-select', array(
				'label' => __('Header Button Border Color', 'wolven'),
				'section' => 'header',
				'settings' => 'cta-button-border-color',
			)));
			//Custom header image
			$wp_customize->add_setting('custom-header-image', array(
				'default' => '',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom-header-image-control', array(
				'label' => __('Header Background Image', 'wolven'),
				'section' => 'header',
				'settings' => 'custom-header-image',
			)));
			//header no image bg color
			$wp_customize->add_setting('header-noimage-bg-color', array(
				'default' => '#2E4453',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header-noimage-bg-color-select', array(
				'label' => __('Header Background (No Header Background Image)', 'wolven'),
				'section' => 'header',
				'settings' => 'header-noimage-bg-color',
			)));
	//Posts Section
	$wp_customize->add_section('post-section', array(
		'title' => __('Post Page', 'wolven'),
		'priority' => 20,
	));
			//about title
			$wp_customize->add_setting('post-page-about-title', array(
				'default' => 'Wolven',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'post-page-about-title-select', array(
				'label' => __('About Title', 'wolven'),
				'section' => 'post-section',
				'settings' => 'post-page-about-title',
			)));
			//about text
			$wp_customize->add_setting('post-page-about-text', array(
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'post-page-about-text-select', array(
				'type' => 'textarea',
				'label' => __('About Title', 'wolven'),
				'section' => 'post-section',
				'settings' => 'post-page-about-text',
			)));
			//post title color
			$wp_customize->add_setting('post-title-color', array(
				'default' => '#000000',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post-title-color-select', array(
				'label' => __('Post Title Color', 'wolven'),
				'section' => 'post-section',
				'settings' => 'post-title-color',
			)));
			//post excerpt color
			$wp_customize->add_setting('post-excerpt-color', array(
				'default' => '#b5b5b5',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post-excerpt-color-select', array(
				'label' => __('Post Excerpt Color', 'wolven'),
				'section' => 'post-section',
				'settings' => 'post-excerpt-color',
			)));

	//Footer Section
	$wp_customize->add_section('footer', array(
		'title' => __('Footer', 'wolven'),
		'priority' => 20,
	));
			//widget area background color
			$wp_customize->add_setting('footer-widget-area-background-color', array(
				'default' => '#2E4453',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer-widget-area-background-color-select', array(
				'label' => __('Widget Area Background Color', 'wolven'),
				'section' => 'footer',
				'settings' => 'footer-widget-area-background-color',
			)));
			//widget area title color
			$wp_customize->add_setting('footer-widget-area-title-color', array(
				'default' => '#ffffff',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer-widget-area-title-color-select', array(
				'label' => __('Widget Title Color', 'wolven'),
				'section' => 'footer',
				'settings' => 'footer-widget-area-title-color',
			)));
			//widget area link color
			$wp_customize->add_setting('footer-widget-area-link-color', array(
				'default' => '#FFFFFF',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer-widget-area-link-color-select', array(
				'label' => __('Widget Link Color', 'wolven'),
				'section' => 'footer',
				'settings' => 'footer-widget-area-link-color',
			)));
			//widget area link hover color
			$wp_customize->add_setting('footer-widget-area-link-hover-color', array(
				'default' => '#a30000',
				'transport' => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer-widget-area-link-hover-color-select', array(
				'label' => __('Widget Link Hover Color', 'wolven'),
				'section' => 'footer',
				'settings' => 'footer-widget-area-link-hover-color',
			)));
}
add_action( 'customize_register', 'wolven_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wolven_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wolven_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wolven_customize_preview_js() {
	wp_enqueue_script( 'wolven-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wolven_customize_preview_js' );

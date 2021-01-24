<?php
/**
 * This file contains functions and hooks for styling Hootkit plugin
 *   Hootkit is a free plugin released under GPL license and hosted on wordpress.org.
 *   It is recommended to the user via wp-admin using TGMPA class
 *
 * This file is loaded at 'after_setup_theme' action @priority 10 ONLY IF hootkit plugin is active
 *
 * @package    Unos Store Bell
 * @subpackage HootKit
 */

// Register HootKit
// Parent added @priority 5
add_filter( 'hootkit_register', 'unosbell_register_hootkit', 7 );

// Add theme's hootkit styles.
// Changing priority to >11 has added benefit of loading child theme's stylesheet before hootkit style.
// This is preferred in case of pre-built child themes where we want child stylesheet to come before
// dynamic css (not after like in the case of user blank child themes purely used for customizations)
add_action( 'wp_enqueue_scripts', 'unosbell_enqueue_hootkit', 15 );

// Set dynamic css handle to child theme's hootkit
// if HK active : earlier set to hootkit@parent @priority 5; set to child stylesheet @priority 7
// Dynamic is hooked to child stylesheet in main functions file. We modify it here for when HootKit is
// active to load dynamic after hootkit stylesheet (which is loaded after child stylesheet - see above)
add_filter( 'hoot_style_builder_inline_style_handle', 'unosbell_dynamic_css_hootkit_handle', 8 );

// Add dynamic CSS for hootkit
// Priority@12: 10-> base hootkit lite/prim
add_action( 'hoot_dynamic_cssrules', 'unosbell_hootkit_dynamic_cssrules', 12 );

/**
 * Register Hootkit
 * Parent added @priority 5
 *
 * @since 1.0
 * @param array $config
 * @return string
 */
if ( !function_exists( 'unosbell_register_hootkit' ) ) :
function unosbell_register_hootkit( $config ) {

	// Add support for woocommerce product widgets
	if ( version_compare( hootkit()->version, '1.2.0', '>' ) ) {
		$addsupport = array( 'product-list', 'products-ticker', 'products-search', 'products-carticon' );
		if ( !empty( $config['modules'] ) )
			$config['modules']['woocommerce'] = ( empty( $config['modules']['woocommerce'] ) ) ? $addsupport : array_merge( $config['modules']['woocommerce'], $addsupport );
	}

	// Array of configuration settings.
	if ( isset( $config['supports'] ) && is_array( $config['supports'] ) )
		$config['supports'][] = 'widget-subtitle';
	return $config;

}
endif;

/**
 * Enqueue Scripts and Styles
 *
 * @since 1.0
 * @access public
 * @return void
 */
if ( !function_exists( 'unosbell_enqueue_hootkit' ) ) :
function unosbell_enqueue_hootkit() {

	/* 'unos-hootkit' is loaded using 'hoot_locate_style' which loads child theme location. Hence deregister it and load files again */
	wp_deregister_style( 'unos-hootkit' );
	/* Load Hootkit Style - Add dependency so that hotkit is loaded after */
	if ( file_exists( hoot_data()->template_dir . 'hootkit/hootkit.css' ) )
	wp_enqueue_style( 'unos-hootkit', hoot_data()->template_uri . 'hootkit/hootkit.css', array( 'hoot-style' ), hoot_data()->template_version );
	if ( file_exists( hoot_data()->child_dir . 'hootkit/hootkit.css' ) )
	wp_enqueue_style( 'unosbell-hootkit', hoot_data()->child_uri . 'hootkit/hootkit.css', array( 'hoot-style', 'unos-hootkit' ), hoot_data()->childtheme_version );

}
endif;

/**
 * Set dynamic css handle to hootkit
 *
 * @since 1.0
 * @access public
 * @return void
 */
if ( !function_exists( 'unosbell_dynamic_css_hootkit_handle' ) ) :
function unosbell_dynamic_css_hootkit_handle( $handle ) {
	return 'unosbell-hootkit';
}
endif;

/**
 * Custom CSS built from user theme options for hootkit features
 *
 * @since 1.0
 * @access public
 */
if ( !function_exists( 'unosbell_hootkit_dynamic_cssrules' ) ) :
function unosbell_hootkit_dynamic_cssrules() {

	global $hoot_style_builder;

	// Get user based style values
	$styles = unos_user_style(); // echo '<!-- '; print_r($styles); echo ' -->';
	extract( $styles );

	$hoot_style_builder->remove( array(
		'.social-icons-icon',
		'#topbar .social-icons-icon, #page-wrapper .social-icons-icon',
	) );

	/*** Add Dynamic CSS ***/

}
endif;

/**
 * Modify Post Grid default style
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
function unosbell_post_grid_widget_settings( $settings ) {
	if ( isset( $settings['form_options']['unitheight']['desc'] ) )
		$settings['form_options']['unitheight']['desc'] = __( 'Default: 205 (in pixels)', 'unos-store-bell' );
	return $settings;
}
add_filter( 'hootkit_post_grid_widget_settings', 'unosbell_post_grid_widget_settings', 5 );
add_filter( 'hootkit_content_grid_widget_settings', 'unosbell_post_grid_widget_settings', 5 );

/**
 * Modify Ticker default style
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
function unosbell_ticker_widget_settings( $settings ) {
	if ( isset( $settings['form_options']['background'] ) )
		$settings['form_options']['background']['std'] = '#f1f1f1';
	if ( isset( $settings['form_options']['fontcolor'] ) )
		$settings['form_options']['fontcolor']['std'] = '#666666';
	return $settings;
}
function unosbell_ticker_products_widget_settings( $settings ) {
	if ( isset( $settings['form_options']['background'] ) )
		$settings['form_options']['background']['std'] = '#f1f1f1';
	if ( isset( $settings['form_options']['fontcolor'] ) )
		$settings['form_options']['fontcolor']['std'] = '#333333';
	return $settings;
}
add_filter( 'hootkit_ticker_widget_settings', 'unosbell_ticker_widget_settings', 5 );
add_filter( 'hootkit_ticker_posts_widget_settings', 'unosbell_ticker_widget_settings', 5 );
add_filter( 'hootkit_products_ticker_widget_settings', 'unosbell_ticker_products_widget_settings', 5 );

/**
 * Modify Products Cart Icon default style
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
function unosmvu_products_carticon_widget_settings( $settings ) {
	if ( isset( $settings['form_options']['background'] ) )
		$settings['form_options']['background']['std'] = '#ee559d';
	if ( isset( $settings['form_options']['fontcolor'] ) )
		$settings['form_options']['fontcolor']['std'] = '#ffffff';
	return $settings;
}
add_filter( 'hootkit_products_carticon_widget_settings', 'unosmvu_products_carticon_widget_settings', 5 );

/**
 * Modify Content Grid default style
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
function unosbell_content_grid_widget_settings( $settings ) {
	if ( isset( $settings['form_options']['boxes']['fields']['caption_bg'] ) )
		$settings['form_options']['boxes']['fields']['caption_bg']['std'] = 'dark-on-light';
	return $settings;
}
add_filter( 'hootkit_content_grid_widget_settings', 'unosbell_content_grid_widget_settings', 5 );

/**
 * Filter Ticker and Ticker Posts display Title markup
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
function unosbell_hootkit_widget_title( $display, $title, $context, $icon = '' ) {
	// if ( $context == 'ticker-posts' || $context == 'ticker' || $context == 'products-ticker' )
	$display = '<div class="ticker-title accent-typo">' . $icon . $title . '</div>';
	return $display;
}
add_filter( 'hootkit_widget_ticker_title', 'unosbell_hootkit_widget_title', 5, 4 );

/**
 * Modify content block icon class
 *
 * @since 1.0
 * @param array $settings
 * @return string
 */
function unosbell_hootkit_content_blocks_icon_style( $iconstyle, $box, $style ) {
	if ( $style == 'style4' && !empty( $box['icon_style'] ) && $box['icon_style'] !== 'none' )
		return 'accent-typo';
	return $iconstyle;
}
add_filter( 'hootkit_content_blocks_icon_style', 'unosbell_hootkit_content_blocks_icon_style', 5, 3 );
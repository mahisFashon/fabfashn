<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function shopstar_customizer_library_options() {
	// Theme defaults
	$primary_color = '#000000';
	$site_title_font_color = '#000000';
	$nav_menu_font_color = '#000000';
	$nav_menu_rollover_font_color = '#ba2227';
	$slider_font_color = '#000000';
	$heading_font_color = '#000000';
    $body_font_color = '#4F4F4F';
    $form_input_font_color = '#4F4F4F';
    $link_font_color = '#939598';
    $link_rollover_font_color = '#4F4F4F';
    $slider_control_button_color = '#000000';
    $button_color = '#000000';
    $footer_color = '#ECEDED';
    
    
	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	// Site Identity
	$section = 'title_tagline';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Site Identity', 'shopstar' ),
		'priority' => '25'
	);
	
	if ( ! function_exists( 'has_custom_logo' ) ) {
		$options['shopstar-logo'] = array(
			'id' => 'shopstar-logo',
			'label'   => __( 'Logo', 'shopstar' ),
			'section' => $section,
			'type'    => 'image'
		);
	}
    
    // Layout Settings
    $section = 'shopstar-layout';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Layout', 'shopstar' ),
        'priority' => '30'
    );
    
        
    // Header Settings
    $panel = 'shopstar-header';
    
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Header', 'shopstar' ),
    	'priority' => '35'
    );
    
    	// Top Bar - Sub-section
	    $section = 'shopstar-header-top-bar';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Top Bar', 'shopstar' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	        	
	    $options['shopstar-show-header-top-bar'] = array(
	    	'id' => 'shopstar-show-header-top-bar',
	    	'label'   => __( 'Show Top Bar', 'shopstar' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1,
	    );
	    
	    // Site Logo Area - Sub-section
	    $section = 'shopstar-header-site-logo-area';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Site Logo Area', 'shopstar' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );

	    $choices = array(
	    	'shopstar-header-layout-centered' => 'Centered',
	    	'shopstar-header-layout-left-aligned' => 'Left Aligned'
	    );
	    $options['shopstar-header-layout'] = array(
	    	'id' => 'shopstar-header-layout',
	    	'label'   => __( 'Layout', 'shopstar' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $choices,
	    	'default' => 'shopstar-header-layout-centered'
	    );
	    
		// Header Text - Sub-section
	    $section = 'shopstar-header-text';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Header Text', 'shopstar' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['shopstar-header-info-text'] = array(
	    	'id' => 'shopstar-header-info-text',
	    	'label'   => __( 'Info Text', 'shopstar' ),
	    	'section' => $section,
	    	'type'    => 'text',
	    	'default' => '',
	    	'sanitize_callback' => 'wp_kses_post'
	    );
    
    // Social Settings
    $section = 'shopstar-social';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Social Media Links', 'shopstar' ),
    	'priority' => '35'
    );
    
    $options['shopstar-social-email'] = array(
    	'id' => 'shopstar-social-email',
    	'label'   => __( 'Email Address', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-skype'] = array(
    	'id' => 'shopstar-social-skype',
    	'label'   => __( 'Skype Name', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-tumblr'] = array(
    	'id' => 'shopstar-social-tumblr',
    	'label'   => __( 'Tumblr', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-flickr'] = array(
    	'id' => 'shopstar-social-flickr',
    	'label'   => __( 'Flickr', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    
    
    // Search Settings
    $section = 'shopstar-search';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Search', 'shopstar' ),
    	'priority' => '35'
    );
    
    $options['shopstar-header-search'] = array(
    	'id' => 'shopstar-header-search',
    	'label'   => __( 'Show Search in the Navigation Menu', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    
    $options['shopstar-search-placeholder-text'] = array(
    	'id' => 'shopstar-search-placeholder-text',
    	'label'   => __( 'Default Search Input Text', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'Search...', 'shopstar' )
    );
    
    $options['shopstar-website-text-no-search-results-heading'] = array(
    	'id' => 'shopstar-website-text-no-search-results-heading',
    	'label'   => __( 'No Search Results Found Heading', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'Nothing Found!', 'shopstar')
    );
    $options['shopstar-website-text-no-search-results-text'] = array(
        'id' => 'shopstar-website-text-no-search-results-text',
        'label'   => __( 'No Search Results Found Message', 'shopstar' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shopstar')
    );
    
    
    // Slider Settings
    $section = 'shopstar-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider', 'shopstar' ),
        'priority' => '35'
    );
    
    $choices = array(
        'shopstar-slider-default' => 'Default Slider',
        'shopstar-slider-plugin' => 'Slider Plugin',
        'shopstar-no-slider' => 'None'
    );
    $options['shopstar-slider-type'] = array(
        'id' => 'shopstar-slider-type',
        'label'   => __( 'Choose a Slider', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'shopstar-no-slider'
    );
    
    $options['shopstar-default-slider-info'] = array(
    	'id' => 'shopstar-default-slider-info',
    	'label'   => '',
    	'section' => $section,
    	'type'    => 'info',
    	'description' => __( '<a href="https://www.outtheboxthemes.com/documentation/shopstar/homepage-slider/default-slider/" rel="nofollow" target="_blank">Read a guide on how to set up the Default Slider</a>', 'shopstar' ),
    );

    $options['shopstar-slider-plugin-info'] = array(
    	'id' => 'shopstar-slider-plugin-info',
    	'label'   => '',
    	'section' => $section,
    	'type'    => 'info',
    	'description' => __( '<a href="https://www.outtheboxthemes.com/documentation/shopstar/homepage-slider/slider-plugin/" rel="nofollow" target="_blank">Read a guide on using a slider plugin</a>', 'shopstar' ),
    );
    
	$options['shopstar-slider-categories'] = array(
		'id' => 'shopstar-slider-categories',
		'label'   => __( 'Slider Categories', 'shopstar' ),
		'section' => $section,
		'type'    => 'dropdown-categories',
		'description' => __( 'Select the categories of the posts you want to display in the slider. The featured image will be the slide image and the post content will display over it. Hold down the Ctrl (windows) / Command (Mac) button to select multiple categories.', 'shopstar' )
	);
	
    $options['shopstar-slider-has-min-width'] = array(
    	'id' => 'shopstar-slider-has-min-width',
    	'label'   => __( 'Slider has a minimum width', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    
    $options['shopstar-slider-min-width'] = array(
    	'id' => 'shopstar-slider-min-width',
    	'label'   => __( 'Minimum Width', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 600
    );
	
    $options['shopstar-slider-transition-speed'] = array(
    	'id' => 'shopstar-slider-transition-speed',
    	'label'   => __( 'Slide Transition Speed', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'milliseconds',
    	'default' => 450,
    	'description' => __( 'The speed it takes to transition between slides in milliseconds. 1000 milliseconds equals 1 second.', 'shopstar' )
    );
    
    $options['shopstar-slider-plugin-shortcode'] = array(
    	'id' => 'shopstar-slider-plugin-shortcode',
    	'label'   => __( 'Slider Shortcode', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'description' => __( 'Enter the shortcode given by the slider plugin you\'re using.', 'shopstar' )
    );
    
    
    // Header Image
    $section = 'header_image';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Header Image', 'shopstar' ),
    	'priority' => '35'
    );
    
    $options['shopstar-slider-enabled-warning'] = array(
    	'id' => 'shopstar-slider-enabled-warning',
    	'label'   => __( 'Please note: The header image will not display on your site as the slider is currently enabled. To make the header image visible you will first need to disable the slider.', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'warning',
    	'priority' => 0,
    	'class'    => ''
    );
    
    $options['shopstar-header-image-text'] = array(
    	'id' => 'shopstar-header-image-text',
    	'label'   => __( 'Text', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'textarea',
    	'default' => __( '<h2>Fashion is what you buy</h2><p>Style is what you do with it</p><p><a href="https://www.outtheboxthemes.com/wordpress-themes/shopstar/" rel="nofollow" target="_blank" class="button">Shop Now</a></p>', 'shopstar' ),
    	'description' => esc_html( __( 'Use <h2></h2> tags around heading text and <p></p> tags around body text.', 'shopstar' ) ),
    	'sanitize_callback' => 'wp_kses_post'
    );


	// WooCommerce
	if ( shopstar_is_woocommerce_activated() ) {

	    $panel = 'woocommerce';
	    
	    $panels[] = array(
	    	'id' => $panel,
	    	'title' => __( 'WooCommerce', 'shopstar' ),
	    	'priority' => '30'
	    );
	
	    	// Header
		    $section = 'woocommerce-header';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Header', 'shopstar' ),
		    	'priority' => '0',
		    	'panel' => $panel
		    );
		    
			$options['shopstar-woocommerce-header-cart-auto-update'] = array(
		    	'id' => 'shopstar-woocommerce-header-cart-auto-update',
		    	'label'   => __( 'Auto Update Header Cart', 'shopstar' ),
		    	'description' => __( 'This will auto-update the header cart as products are added or removed. <strong>Please note:</strong> If you are running a multilingual site then you should disable this setting for the header cart translations to function correctly', 'shopstar' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 1
		    );
			
// 			// Check for the shopstar-woocommerce-enable-ajax-cart-fragments setting to honour the previous version of the theme
// 			if ( get_theme_mod( 'shopstar-woocommerce-enable-ajax-cart-fragments' ) ) {
// 		    	$options['shopstar-woocommerce-header-cart-auto-update']['default'] = get_theme_mod( 'shopstar-woocommerce-enable-ajax-cart-fragments', true );
// 		    } else {
// 		    	$options['shopstar-woocommerce-header-cart-auto-update']['default'] = true;
// 		    }
		    
		    $options['shopstar-header-shop-links'] = array(
		    	'id' => 'shopstar-header-shop-links',
		    	'label'   => __( 'Shop Links', 'shopstar' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 1,
				'description' => __( 'Display the My Account and Checkout links in the Top Bar when WooCommerce is active.', 'shopstar' )
		    );
	
	    	// Product Catalog
		    $section = 'woocommerce_product_catalog';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product Catalog', 'shopstar' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
	
		    $options['shopstar-layout-woocommerce-shop-full-width'] = array(
		    	'id' => 'shopstar-layout-woocommerce-shop-full-width',
		    	'label'   => __( 'Full width', 'shopstar' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => '0',
		    	'default' => 0,
		    );
	
		    $options['shopstar-woocommerce-shop-display-thumbnail-loader-animation'] = array(
		    	'id' => 'shopstar-woocommerce-shop-display-thumbnail-loader-animation',
		    	'label'   => __( 'Display a loader animation on thumbnails', 'shopstar' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => 0,
		    	'default' => 0
		    );
		    
		    $options['shopstar-woocommerce-products-per-page'] = array(
		    	'id' => 'shopstar-woocommerce-products-per-page',
		    	'label'   => __( 'Products per page', 'shopstar' ),
		    	'section' => $section,
		    	'type'    => 'text',
		    	'default' => get_option('posts_per_page'),
		    	'description' => __( 'How many products should be shown per page?', 'shopstar' )
		    );
		    	    
	    	// Product
		    $section = 'woocommerce-product';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product', 'shopstar' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
		    
		    $options['shopstar-layout-woocommerce-product-full-width'] = array(
		    	'id' => 'shopstar-layout-woocommerce-product-full-width',
		    	'label'   => __( 'Full width', 'shopstar' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', 0 )
		    );
		    
		    $options['shopstar-woocommerce-product-image-zoom'] = array(
		    	'id' => 'shopstar-woocommerce-product-image-zoom',
		    	'label'   => __( 'Enable zoom on product image', 'shopstar' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 1,
		    );
		    
	    	// Product category / tag page
		    $section = 'woocommerce-category-tag-page';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product Category and Tag Page', 'shopstar' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
	    
		    $options['shopstar-layout-woocommerce-category-tag-page-full-width'] = array(
		    	'id' => 'shopstar-layout-woocommerce-category-tag-page-full-width',
		    	'label'   => __( 'Full width', 'shopstar' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => '0',
		    	'default' => get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', 0 )
		    );

	    	// Cart
		    $section = 'woocommerce-cart';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Cart', 'shopstar' ),
		    	'priority' => 20,
		    	'panel' => $panel
		    );

	}

    // Colors
    $section = 'colors';
    $font_choices = customizer_library_get_font_choices();
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Colors', 'shopstar' ),
    	'priority' => '25'
    );
    
    $options['shopstar-primary-color'] = array(
    	'id' => 'shopstar-primary-color',
    	'label'   => __( 'Primary Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $primary_color,
    );
    
    $options['shopstar-slider-control-button-color'] = array(
    	'id' => 'shopstar-slider-control-button-color',
    	'label'   => __( 'Slider Prev / Next Button Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $slider_control_button_color,
    );
    
    $options['shopstar-button-color'] = array(
    	'id' => 'shopstar-button-color',
    	'label'   => __( 'Button Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $button_color,
    );
    
    $options['shopstar-footer-color'] = array(
    	'id' => 'shopstar-footer-color',
    	'label'   => __( 'Footer Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $footer_color,
    );
    
	// Font Settings
	$panel = 'shopstar-fonts';
	
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Fonts', 'shopstar' ),
    	'priority' => '30'
    );
    
	    // Site Title - Sub-section
	    $section = 'shopstar-site-title-fonts';
	    $font_choices = customizer_library_get_font_choices();
		    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Site Title', 'shopstar' ),
	    	'priority' => '35',
	    	'panel' => $panel
		);

		$options['shopstar-site-title-font'] = array(
			'id' => 'shopstar-site-title-font',
			'label'   => __( 'Font', 'shopstar' ),
			'section' => $section,
			'type'    => 'select',
			'choices' => $font_choices,
			'default' => 'Prata'
		);
		$options['shopstar-site-title-font-color'] = array(
			'id' => 'shopstar-site-title-font-color',
			'label'   => __( 'Color', 'shopstar' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $site_title_font_color,
		);
		
	    $options['shopstar-site-title-font-info'] = array(
	    	'id' => 'shopstar-site-title-font-info',
	    	'label'   => '',
	    	'section' => $section,
	    	'type'    => 'info',
	    	'description' => __( '<a href="https://www.outtheboxthemes.com/documentation/shopstar/fonts/preview-page/" rel="nofollow" target="_blank">Struggling to find the right font? Read more about our theme fonts preview tool</a>', 'shopstar' )
	    );
		
    	// Navigation Menu - Sub-section
	    $section = 'shopstar-navigation-menu-fonts';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Navigation Menu', 'shopstar' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
		
		$options['shopstar-nav-menu-font-color'] = array(
			'id' => 'shopstar-nav-menu-font-color',
			'label'   => __( 'Color', 'shopstar' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $nav_menu_font_color,
		);
		$options['shopstar-nav-menu-rollover-font-color'] = array(
			'id' => 'shopstar-nav-menu-rollover-font-color',
			'label'   => __( 'Rollover Color', 'shopstar' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $nav_menu_rollover_font_color,
		);
		
    	// Slider - Sub-section
	    $section = 'shopstar-slider-fonts';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Slider / Header Image', 'shopstar' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );		
		
		$options['shopstar-slider-font-color'] = array(
			'id' => 'shopstar-slider-font-color',
			'label'   => __( 'Color', 'shopstar' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $slider_font_color,
		);
		
		$options['shopstar-slider-text-shadow'] = array(
			'id' => 'shopstar-slider-text-shadow',
			'label'   => __( 'Display a drop shadow on the slider / header image text.', 'shopstar' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => 0
		);

    	// Heading - Sub-section
	    $section = 'shopstar-heading-fonts';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Heading', 'shopstar' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
		
		$options['shopstar-heading-font'] = array(
			'id' => 'shopstar-heading-font',
			'label'   => __( 'Font', 'shopstar' ),
			'section' => $section,
			'type'    => 'select',
			'choices' => $font_choices,
			'default' => 'Raleway'
		);
		
	    $choices = array(
	    	'300' => 'Light',
	    	'400' => 'Normal',
	    	'500' => 'Medium',
	    	'600' => 'Semi-bold',
	    	'700' => 'Bold',
	    	'800' => 'Extra Bold'
	    );
	    $options['shopstar-heading-font-weight'] = array(
	    	'id' => 'shopstar-heading-font-weight',
	    	'label'   => __( 'Weight', 'shopstar' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $choices,
	    	'default' => '300'
	    );
		
		$options['shopstar-heading-font-color'] = array(
			'id' => 'shopstar-heading-font-color',
			'label'   => __( 'Color', 'shopstar' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $heading_font_color,
		);
	
	    $options['shopstar-heading-font-info'] = array(
	    	'id' => 'shopstar-heading-font-info',
	    	'label'   => '',
	    	'section' => $section,
	    	'type'    => 'info',
	    	'description' => __( '<a href="https://www.outtheboxthemes.com/documentation/shopstar/fonts/preview-page/" rel="nofollow" target="_blank">Struggling to find the right font? Read more about our theme fonts preview tool</a>', 'shopstar' )
	    );
		
    	// Body Text - Sub-section
	    $section = 'shopstar-body-fonts';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Body Text', 'shopstar' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
		
	    $options['shopstar-body-font'] = array(
	        'id' => 'shopstar-body-font',
	        'label'   => __( 'Font', 'shopstar' ),
	        'section' => $section,
	        'type'    => 'select',
	        'choices' => $font_choices,
	        'default' => 'Lato'
	    );
	    
	    $options['shopstar-body-font-color'] = array(
	        'id' => 'shopstar-body-font-color',
	        'label'   => __( 'Color', 'shopstar' ),
	        'section' => $section,
	        'type'    => 'color',
	        'default' => $body_font_color,
	    );

	    $options['shopstar-link-font-color'] = array(
	    	'id' => 'shopstar-link-font-color',
	    	'label'   => __( 'Link Color', 'shopstar' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $link_font_color,
	    );
	    $options['shopstar-link-rollover-font-color'] = array(
	    	'id' => 'shopstar-link-rollover-font-color',
	    	'label'   => __( 'Link Rollover Color', 'shopstar' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $link_rollover_font_color,
	    );

	    $options['shopstar-body-font-info'] = array(
	    	'id' => 'shopstar-body-font-info',
	    	'label'   => '',
	    	'section' => $section,
	    	'type'    => 'info',
	    	'description' => __( '<a href="https://www.outtheboxthemes.com/documentation/shopstar/fonts/preview-page/" rel="nofollow" target="_blank">Struggling to find the right font? Read more about our theme fonts preview tool</a>', 'shopstar' )
	    );
	    
		// Form Fields - Sub-section
	    $section = 'shopstar-form-field-fonts';
	    $font_choices = customizer_library_get_font_choices();
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Form Fields', 'shopstar' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['shopstar-form-input-font-color'] = array(
	    	'id' => 'shopstar-form-input-font-color',
	    	'label'   => __( 'Color', 'shopstar' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $form_input_font_color
	    );
    
    // Styling Settings
    $panel = 'shopstar-styling';
    
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Styling', 'shopstar' ),
    	'priority' => '30'
    );

    	// Page Builders - Sub-section
	    $section = 'shopstar-styling-page-builders';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Page Builders', 'shopstar' ),
	    	'panel' => $panel
	    );
	    
	    $options['shopstar-page-builders-use-theme-styles'] = array(
	    	'id' => 'shopstar-page-builders-use-theme-styles',
	    	'label'   => __( 'Use theme styles', 'shopstar' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1,
	    	'description' => ''
	    );
	    
    // Blog Settings
    $section = 'shopstar-blog';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog', 'shopstar' ),
        'priority' => '50'
    );
    
	$options['shopstar-blog-featured-image-size'] = array(
		'id' => 'shopstar-blog-featured-image-size',
		'label'   => __( 'Size', 'shopstar' ),
		'section' => $section,
		'type'    => 'dropdown-image-sizes',
		//'description' => 'This list consists of all of the available image sizes in your site',
		'default' => 'large'
    );
    
    $choices = array(
		'shopstar-blog-archive-layout-full' => 'Full Post',
		'shopstar-blog-archive-layout-excerpt' => 'Post Excerpt'
    );
    $options['shopstar-blog-archive-layout'] = array(
        'id' => 'shopstar-blog-archive-layout',
        'label'   => __( 'Archive Layout', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'shopstar-blog-archive-layout-full'
    );
    
    $options['shopstar-blog-excerpt-length'] = array(
    	'id' => 'shopstar-blog-excerpt-length',
    	'label'   => __( 'Excerpt Length', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 55
    );
    
    $options['shopstar-blog-read-more-text'] = array(
    	'id' => 'shopstar-blog-read-more-text',
    	'label'   => __( 'Read More Text', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 'Read More'
    );
    
    // Site Text Settings
    $section = 'shopstar-website-text';

    $sections[] = array(
        'id' => $section,
        'title' => __( '404 Page', 'shopstar' ),
        'priority' => '50'
    );
    $options['shopstar-website-text-404-page-heading'] = array(
        'id' => 'shopstar-website-text-404-page-heading',
        'label'   => __( 'Heading', 'shopstar' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( '404!', 'shopstar')
    );
    $options['shopstar-website-text-404-page-text'] = array(
        'id' => 'shopstar-website-text-404-page-text',
        'label'   => __( 'Message', 'shopstar' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'The page you were looking for cannot be found!', 'shopstar')
    );

    // Media
    $section = 'shopstar-media';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Media', 'shopstar' ),
    	'priority' => '50'
    );

    $options['shopstar-media-crisp-images'] = array(
    	'id' => 'shopstar-media-crisp-images',
    	'label'   => __( 'Crisp images', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    	'description' => __( '<p>This will remove the default anti-aliasing done to scaled images by browsers creating a more crisp image.</p>', 'shopstar' )
    );
    
	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'shopstar_customizer_library_options' );

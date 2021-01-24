<?php
/**
 * shopstar functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shopstar
 */
define( 'SHOPSTAR_THEME_VERSION' , '1.0.94' );

global $shopstar_demo_slides;

if ( empty( $shopstar_demo_slides ) ) {
	$shopstar_demo_slides = array(
		'slide1' => array(
			'image' => get_template_directory_uri() . '/library/images/demo/slider-default01.jpg',
 			'text' => sprintf( __( '<h2>Fashion is what you buy</h2><p>Style is what you do with it</p><p><a href="%1$s" target="_blank" rel="nofollow" class="button no-bottom-margin">%2$s</a></p>', 'shopstar' ), esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/shopstar/' ), __( 'Shop Now', 'shopstar' ) )
		),
		'slide2' => array(
			'image' => get_template_directory_uri() . '/library/images/demo/slider-default02.jpg',
			'text' => sprintf( __( '<h2>Life isn\'t perfect</h2><p>But your outfit can be</p><p><a href="%1$s" target="_blank" rel="nofollow" class="button no-bottom-margin">%2$s</a></p>', 'shopstar' ), esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/shopstar/' ), __( 'Shop Now', 'shopstar' ) )
		)
	);
}

if ( ! function_exists( 'shopstar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shopstar_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 832; /* pixels */
	}

	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,600,600italic,700,700italic' );
	add_editor_style( $font_url );
	
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,800' );
	add_editor_style( $font_url );
	
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lora:400italic' );
	add_editor_style( $font_url );
	
	add_editor_style('editor-style.css');
	
	if ( !get_theme_mod( 'otb_shopstar_dot_org' ) ) set_theme_mod( 'otb_shopstar_dot_org', true );
	if ( !get_theme_mod( 'otb_shopstar_activated' ) ) set_theme_mod( 'otb_shopstar_activated', date('Y-m-d') );
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on shopstar, use a find and replace
	 * to change 'shopstar' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'shopstar', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	*
	* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'shopstar_blog_img_side', 352, 230, true );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'shopstar' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Setup Custom Logo Support for theme
	* Supported from WordPress version 4.5 onwards
	* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
	*/
	if ( function_exists( 'has_custom_logo' ) ) {
		add_theme_support( 'custom-logo' );
	}
	
	// The custom header is used for the logo
	add_theme_support( 'custom-header', array(
		'default-image' => esc_url( get_template_directory_uri() ) . '/library/images/headers/default.jpg',
		'width'         => 1680,
		'height'        => 600,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
	) );	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shopstar_custom_background_args', array(
		'default-color' => 'FFFFFF',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'title-tag' );
	
	// Gutenberg Support
    add_theme_support( 'align-wide' );
	
 	add_theme_support( 'woocommerce', array(
 		'gallery_thumbnail_image_width' => 300
 	) );
	
	if ( get_theme_mod( 'shopstar-woocommerce-product-image-zoom', true ) ) {	
		add_theme_support( 'wc-product-gallery-zoom' );
	}
		
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );	
}
endif; // shopstar_setup
add_action( 'after_setup_theme', 'shopstar_setup' );

/**
 * Enqueue admin scripts and styles.
 */
function shopstar_admin_scripts() {
	wp_enqueue_style( 'shopstar-admin-css', get_template_directory_uri() . '/library/css/admin.css', array(), SHOPSTAR_THEME_VERSION );
	wp_enqueue_script( 'shopstar-admin-js', get_template_directory_uri() . '/library/js/admin.js', SHOPSTAR_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'shopstar_admin_scripts' );

function shopstar_set_elementor_default_schemes( $config ) {

	// Primary
	$config['schemes']['items']['color']['items']['1']['value'] = get_theme_mod( 'shopstar-heading-font-color', customizer_library_get_default( 'shopstar-heading-font-color' ) );
	
	// Secondary
	$config['schemes']['items']['color']['items']['2']['value'] = get_theme_mod( 'shopstar-primary-color', customizer_library_get_default( 'shopstar-primary-color' ) );
	
	// Text
	$config['schemes']['items']['color']['items']['3']['value'] = get_theme_mod( 'shopstar-body-font-color', customizer_library_get_default( 'shopstar-body-font-color' ) );
	
	// Accent
	$config['schemes']['items']['color']['items']['4']['value'] = get_theme_mod( 'shopstar-primary-color', customizer_library_get_default( 'shopstar-primary-color' ) );

	// Primary Headline
	$config['schemes']['items']['typography']['items']['1']['value'] = [
		'font-family' => get_theme_mod( 'shopstar-heading-font', customizer_library_get_default( 'shopstar-heading-font' ) ),
		'font-weight' => get_theme_mod( 'shopstar-heading-font-weight', customizer_library_get_default( 'shopstar-heading-font-weight' ) )
	];
	
	// Secondary Headline
	$config['schemes']['items']['typography']['items']['2']['value'] = [
		'font-family' => get_theme_mod( 'shopstar-heading-font', customizer_library_get_default( 'shopstar-heading-font' ) ),
		'font-weight' => get_theme_mod( 'shopstar-heading-font-weight', customizer_library_get_default( 'shopstar-heading-font-weight' ) )
	];

	// Body Text
	$config['schemes']['items']['typography']['items']['3']['value'] = [
		'font-family' => get_theme_mod( 'shopstar-body-font', customizer_library_get_default( 'shopstar-body-font' ) ),
		'font-weight' => get_theme_mod( 'shopstar-body-font-weight', customizer_library_get_default( 'shopstar-body-font-weight' ) )
	];

	// Accent Text
	$config['schemes']['items']['typography']['items']['4']['value'] = [
		'font-family' => get_theme_mod( 'shopstar-heading-font', customizer_library_get_default( 'shopstar-heading-font' ) ),
		'font-weight' => get_theme_mod( 'shopstar-heading-font-weight', customizer_library_get_default( 'shopstar-heading-font-weight' ) )
	];

	$config['schemes']['items']['color-picker']['items']['1']['value'] = get_theme_mod( 'shopstar-primary-color', customizer_library_get_default( 'shopstar-primary-color' ) );
	$config['schemes']['items']['color-picker']['items']['2']['value'] = get_theme_mod( 'shopstar-button-color', customizer_library_get_default( 'shopstar-button-color' ) );
	$config['schemes']['items']['color-picker']['items']['3']['value'] = get_theme_mod( 'shopstar-body-font-color', customizer_library_get_default( 'shopstar-body-font-color' ) );
	$config['schemes']['items']['color-picker']['items']['4']['value'] = get_theme_mod( 'shopstar-footer-color', customizer_library_get_default( 'shopstar-footer-color' ) );
	$config['schemes']['items']['color-picker']['items']['5']['value'] = '';
	$config['schemes']['items']['color-picker']['items']['6']['value'] = '';
	$config['schemes']['items']['color-picker']['items']['7']['value'] = '';
	$config['schemes']['items']['color-picker']['items']['8']['value'] = '';
	
	return $config;
};
add_filter('elementor/editor/localize_settings', 'shopstar_set_elementor_default_schemes', 100);

// Adjust content_width for full width pages
function shopstar_adjust_content_width() {
	global $content_width;

	if ( shopstar_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}

    if ( is_page_template( 'template-full-width.php' ) ) {
    	$content_width = 1140;
	} else if ( ( is_page_template( 'template-left-sidebar.php' ) || basename( get_page_template() ) === 'page.php' ) && !is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1140;
	} else if ( shopstar_is_woocommerce_activated() && is_shop() && get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-shop-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( shopstar_is_woocommerce_activated() && is_product() && get_theme_mod( 'shopstar-layout-woocommerce-product-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-product-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( shopstar_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'shopstar-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( $is_woocommerce && !is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1140;
	}
}
add_action( 'template_redirect', 'shopstar_adjust_content_width' );

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
 /*
function shopstar_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'otb-dashboard-news', // Widget slug.
		__( 'Out the Box News', 'shopstar' ), // Title.
		'otb_dashboard_news' // Display function.
	);
	
	// Move the Out the Box widget to the top
	global $wp_meta_boxes;

	$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	$ours      = array( 'otb-dashboard-news' => $dashboard['otb-dashboard-news'] );
	unset($dashboard['otb-dashboard-news']);

	$wp_meta_boxes['dashboard']['normal']['core'] = array_merge( $ours, $dashboard ); // WPCS: override ok.
}
add_action( 'wp_dashboard_setup', 'shopstar_add_dashboard_widgets', 20 );
*/
/**
 * Create the function to output the contents of your Dashboard Widget.
 */
function otb_dashboard_news() {
	$feed = array(
		array(
			'url'          => 'https://www.outtheboxthemes.com/feed/',
			'items'        => 4,
			'show_summary' => 0,
			'show_author'  => 0,
			'show_date'    => 1,
		),
	);

	wp_dashboard_primary_output( 'otb_dashboard_widget_news', $feed );

	if( function_exists( 'wp_print_community_events_markup' ) ) {
		?>
		<p class="community-events-footer">
			<?php
			printf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s <span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
				esc_url( 'https://www.outtheboxthemes.com/blog/' ),
				__( 'Blog', 'shopstar' ),
				/* translators: accessibility text */
				__( '(opens in a new window)', 'shopstar' )
			);
			echo ' | ';

			printf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s <span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
				esc_url( 'https://www.outtheboxthemes.com/documentation/shopstar/' ),
				__( 'Documentation', 'shopstar' ),
				/* translators: accessibility text */
				__( '(opens in a new window)', 'shopstar' )
			);
			echo ' | ';
			
			printf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer" style="color: #2ebd59">%2$s <span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
				/* translators: If a Rosetta site exists (e.g. https://es.wordpress.org/news/), then use that. Otherwise, leave untranslated. */
				esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/shopstar/' ),
				__( 'Get Premium', 'shopstar' ),
				/* translators: accessibility text */
				__( '(opens in a new window)', 'shopstar' )
			);
			?>
		</p>
		<?php
	}	
}

function shopstar_review_notice() {
	$user_id = get_current_user_id();
	$message = 'Thank you for using Shopstar! We hope you\'re enjoying the theme, please consider <a href="https://wordpress.org/support/theme/shopstar/reviews/#new-post" target="_blank">rating it on wordpress.org</a> :)';
	
	if ( !get_user_meta( $user_id, 'shopstar_review_notice_dismissed' ) ) {
		$class = 'notice notice-success is-dismissible';
		printf( '<div class="%1$s"><p>%2$s</p><p><a href="?shopstar-review-notice-dismissed">Dismiss this notice</a></p></div>', esc_attr( $class ), $message );
	}
}
$today = new DateTime( date( 'Y-m-d' ) );
$activate  = new DateTime( date( get_theme_mod( 'otb_shopstar_activated' ) ) );
if ( $activate->diff($today)->d >= 14 ) {
	add_action( 'admin_notices', 'shopstar_review_notice' );
}

function shopstar_review_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['shopstar-review-notice-dismissed'] ) ) {
		add_user_meta( $user_id, 'shopstar_review_notice_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'shopstar_review_notice_dismissed' );

function shopstar_admin_notice() {
	$user_id = get_current_user_id();
	
	$message = array (
		'id' => 15,
		'heading' => 'Christmas Sale',
		'text' => '<a href="https://www.outtheboxthemes.com/go/theme-notification-christmas-2020-wordpress-themes/">Get 20% off any of our Premium WordPress Themes until Christmas Day</a>',
		'link' => 'https://www.outtheboxthemes.com/go/theme-notification-christmas-2020-wordpress-themes/'
	);
	
	if ( !empty( $message['text'] ) && !get_user_meta( $user_id, 'shopstar_admin_notice_' .$message['id']. '_dismissed' ) ) {
		$class = 'notice otb-notice notice-success is-dismissible';
		printf( '<div class="%1$s"><img src="https://www.outtheboxthemes.com/wp-content/uploads/2020/12/logo-red.png" class="logo" /><h3>%2$s</h3><p>%3$s</p><p style="margin:0;"><a class="button button-primary" href="%4$s" target="_blank">Read More</a> <a class="button button-dismiss" href="?shopstar-admin-notice-dismissed&shopstar-admin-notice-id=%5$s">Dismiss</a></p></div>', esc_attr( $class ), $message['heading'], $message['text'], $message['link'], $message['id'] );
	}
}

if ( date('Y-m-d') <= '2020-12-25' ) {
	add_action( 'admin_notices', 'shopstar_admin_notice' );
}

function shopstar_admin_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['shopstar-admin-notice-dismissed'] ) ) {
    	$shopstar_admin_notice_id = $_GET['shopstar-admin-notice-id'];
		add_user_meta( $user_id, 'shopstar_admin_notice_' .$shopstar_admin_notice_id. '_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'shopstar_admin_notice_dismissed' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shopstar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shopstar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar(array(
		'name' => __( 'Footer', 'shopstar' ),
		'id' => 'footer',
		'description' => ''
	));
}
add_action( 'widgets_init', 'shopstar_widgets_init' );

function shopstar_set_variables() {}
add_action('init', 'shopstar_set_variables', 10);

/**
 * Enqueue scripts and styles.
 */
function shopstar_scripts() {
	wp_enqueue_style( 'shopstar-site-title-font-default', '//fonts.googleapis.com/css?family=Prata:400', array(), SHOPSTAR_THEME_VERSION );
	wp_enqueue_style( 'shopstar-body-font-default', '//fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,600,600italic,700,700italic', array(), SHOPSTAR_THEME_VERSION );
	wp_enqueue_style( 'shopstar-blockquote-quote-font', '//fonts.googleapis.com/css?family=Lora:400italic', array(), SHOPSTAR_THEME_VERSION );	
	wp_enqueue_style( 'shopstar-heading-font-default', '//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,800', array(), SHOPSTAR_THEME_VERSION );

	if ( get_theme_mod( 'shopstar-header-layout', customizer_library_get_default( 'shopstar-header-layout' ) ) == 'shopstar-header-layout-centered' ) {
		wp_enqueue_style( 'shopstar-header-centered', get_template_directory_uri().'/library/css/header-centered.css', array(), SHOPSTAR_THEME_VERSION );
	} else {
		wp_enqueue_style( 'shopstar-header-left-aligned', get_template_directory_uri().'/library/css/header-left-aligned.css', array(), SHOPSTAR_THEME_VERSION );
	}
	
	wp_enqueue_style( 'otb-font-awesome', get_template_directory_uri().'/library/fonts/otb-font-awesome/css/font-awesome.css', array(), '4.7.0' );
	wp_enqueue_style( 'shopstar-style', get_stylesheet_uri(), array(), SHOPSTAR_THEME_VERSION );
	
	if ( shopstar_is_woocommerce_activated() ) {
		wp_enqueue_style( 'shopstar-woocommerce-custom', get_template_directory_uri().'/library/css/woocommerce-custom.css', array(), SHOPSTAR_THEME_VERSION );
	}
	
	wp_enqueue_script( 'shopstar-navigation-js', get_template_directory_uri() . '/library/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'shopstar-caroufredsel-js', get_template_directory_uri() . '/library/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	wp_enqueue_script( 'shopstar-touchswipe-js', get_template_directory_uri() . '/library/js/jquery.touchSwipe.min.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	wp_enqueue_script( 'shopstar-custom-js', get_template_directory_uri() . '/library/js/custom.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	
	wp_enqueue_script( 'shopstar-skip-link-focus-fix-js', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shopstar_scripts' );

/**
 * Load Gutenberg stylesheet.
*/
function shopstar_gutenberg_assets() {
	wp_enqueue_style( 'shopstar-gutenberg-editor', get_theme_file_uri( '/library/css/gutenberg-editor-style.css' ), false, SHOPSTAR_THEME_VERSION );
	
	// Output inline styles based on theme customizer selections
	require get_template_directory() . '/library/includes/gutenberg-editor-styles.php';
}
add_action( 'enqueue_block_editor_assets', 'shopstar_gutenberg_assets' );

// Recommended plugins installer
require_once get_template_directory() . '/library/includes/class-tgm-plugin-activation.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/library/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/library/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/library/includes/jetpack.php';

// Helper library for the theme customizer.
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/customizer/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/customizer/mods.php';

// Include TRT Customize Pro library
require_once( get_template_directory() . '/trt-customize-pro/class-customize.php' );

/**
 * Premium Upgrade Page
 */
include get_template_directory() . '/upgrade/upgrade.php';

/**
 * Enqueue shopstar custom customizer styling.
 */
function shopstar_load_customizer_script() {
	wp_enqueue_script( 'shopstar-customizer-custom-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	wp_enqueue_style( 'shopstar-customizer', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css', array(), SHOPSTAR_THEME_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'shopstar_load_customizer_script' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function shopstar_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'shopstar_pingback_header' );

if ( ! function_exists( 'shopstar_load_dynamic_css' ) ) :
	/**
	 * Add Dynamic CSS
	 */
	function shopstar_load_dynamic_css() {
		$shopstar_slider_has_min_width = get_theme_mod( 'shopstar-slider-has-min-width', customizer_library_get_default( 'shopstar-slider-has-min-width' ) );
		$shopstar_slider_min_width 	   = floatVal( get_theme_mod( 'shopstar-slider-min-width', customizer_library_get_default( 'shopstar-slider-min-width' ) ) );
	
		// Activate the mobile menu when on a mobile device
		//if ( wp_is_mobile() ) {
		//	$mobile_menu_breakpoint = 10000000;
		//} else {
			$mobile_menu_breakpoint = 960;
		//}
		
		require get_template_directory() . '/library/includes/dynamic-css.php';
	}
endif;
add_action( 'wp_head', 'shopstar_load_dynamic_css' );

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'shopstar_is_woocommerce_activated' ) ) :
	function shopstar_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) {
			return true;
		} else {
			return false;
		}
	}
endif; // shopstar_is_woocommerce_activated

if ( shopstar_is_woocommerce_activated() ) {
	require get_template_directory() . '/library/includes/woocommerce-inc.php';
}

// Add CSS class to body by filter
function shopstar_add_body_class( $classes ) {
	
	if( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}
	
	if ( get_theme_mod( 'shopstar-media-crisp-images', customizer_library_get_default( 'shopstar-media-crisp-images' ) ) ) {
		$classes[] = 'crisp-images';
	}
	
	if ( get_theme_mod( 'shopstar-page-builders-use-theme-styles', customizer_library_get_default( 'shopstar-page-builders-use-theme-styles' ) ) ) {
		$classes[] = 'shopstar-page-builders-use-theme-styles';
	}
	
	if ( shopstar_is_woocommerce_activated() && is_shop() && get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-shop-full-width' ) ) ) {
		$classes[] = 'shopstar-shop-full-width';
	}

	if ( shopstar_is_woocommerce_activated() && is_product() && get_theme_mod( 'shopstar-layout-woocommerce-product-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-product-full-width' ) ) ) {
		$classes[] = 'shopstar-product-full-width';
	}
	
	if ( shopstar_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'shopstar-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$classes[] = 'shopstar-shop-full-width';
	}
		
	if ( shopstar_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}
	
	if ( $is_woocommerce && !is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'full-width';
	}	
	
	return $classes;
}
add_filter( 'body_class', 'shopstar_add_body_class' );

// Set the number or products per page
function shopstar_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = get_theme_mod( 'shopstar-woocommerce-products-per-page' );
	
	return $cols;
}
add_filter( 'loop_shop_per_page', 'shopstar_loop_shop_per_page', 20 );

/**
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
endif;

// Disable WooCommerce Ajax Cart Fragments
function shopstar_disable_woocommerce_cart_fragments() { 
	if ( !get_theme_mod( 'shopstar-woocommerce-enable-ajax-cart-fragments', customizer_library_get_default( 'shopstar-woocommerce-enable-ajax-cart-fragments' ) ) ) {
		wp_dequeue_script( 'wc-cart-fragments' );
	} 
}
add_action( 'wp_enqueue_scripts', 'shopstar_disable_woocommerce_cart_fragments', 11 );

/*
// Set the number or products per row
if (!function_exists('shopstar_loop_shop_columns')) {

	function shopstar_loop_shop_columns() {
		if (
			( is_shop() && get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-shop-full-width' ) ) ) 
			|| ( ( is_product_category() || is_product_tag() ) && get_theme_mod( 'shopstar-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-category-tag-page-full-width' ) ) ) 
			|| ! is_active_sidebar( 'sidebar-1' ) 
		) {
			return 4;
		} else {
			return 3;
		}
	}
	
}
add_filter('loop_shop_columns', 'shopstar_loop_shop_columns');
*/

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'shopstar-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'shopstar-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '<div class="hiddenUntilLoadedImageContainer loading">';
	}
}, 9 );

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'shopstar-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'shopstar-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '</div>';
	}
}, 11 );

if (!function_exists('shopstar_woocommerce_product_thumbnails_columns')) {
	function shopstar_woocommerce_product_thumbnails_columns() {
		return 3;
	}
}
add_filter ( 'woocommerce_product_thumbnails_columns', 'shopstar_woocommerce_product_thumbnails_columns' );

/**
 * Replace Read more buttons for out of stock items
 */
// Display an Out of Stock label on out of stock products
add_action( 'woocommerce_after_shop_loop_item_title', 'shopstar_out_of_stock_notice', 10 );
function shopstar_out_of_stock_notice() {
    global $product;
    if ( !$product->is_in_stock() ) {
		echo '<p class="stock out-of-stock">';
		echo __( 'Out of Stock', 'shopstar' );
		echo '</p>';
    }
}

/*
if (!function_exists('woocommerce_template_loop_add_to_cart')) {
	function woocommerce_template_loop_add_to_cart( $args = array() ) {
		global $product;

		if (!$product->is_in_stock()) {
			echo '<p class="stock out-of-stock">';
			echo __( 'Out of Stock', 'shopstar' );
			echo '</p>';
		} else {
			$defaults = array(
				'quantity' => 1,
				'class' => implode( ' ', array_filter( array(
				'button',
				'product_type_' . $product->get_type(),
				$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
				$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
				) ) )
			);
			
			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
			wc_get_template( 'loop/add-to-cart.php', $args );
		}
	}
}
*/

function shopstar_excerpt_length( $length ) {
	return get_theme_mod( 'shopstar-blog-excerpt-length', customizer_library_get_default( 'shopstar-blog-excerpt-length' ) );
}
add_filter( 'excerpt_length', 'shopstar_excerpt_length', 999 );

function shopstar_excerpt_more( $more ) {
	return ' <a class="read-more" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . wp_kses_post( pll__( get_theme_mod( 'shopstar-blog-read-more-text', customizer_library_get_default( 'shopstar-blog-read-more-text' ) ) ), 'shopstar' ) . '</a>';
}
add_filter( 'excerpt_more', 'shopstar_excerpt_more' );

/**
 * Adjust is_home query if shopstar-slider-categories is set
 */
function shopstar_set_blog_queries( $query ) {

	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
	
		$is_front_page = ( $query->get('page_id') == get_option('page_on_front') || is_front_page() );
	
		if ( count($slider_categories) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			if ( !is_admin() && !$is_front_page  && $query->get('id') != 'slider' || !is_admin() && $is_front_page && $query->get('id') != 'slider' ){
				$query->set( 'category__not_in', $slider_categories );
			}
		}
	}

}
add_action( 'pre_get_posts', 'shopstar_set_blog_queries' );

function shopstar_filter_recent_posts_widget_parameters( $params ) {
	
	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
	$slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
		if ( count($slider_categories) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			$params['category__not_in'] = $slider_categories;
		}
	}
	
	return $params;
}
add_filter('widget_posts_args','shopstar_filter_recent_posts_widget_parameters');

/**
 * Adjust the widget categories query if shopstar-slider-categories is set
*/
function shopstar_set_widget_categories_args($args){
	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter('widget_categories_args', 'shopstar_set_widget_categories_args');

function shopstar_set_widget_categories_dropdown_arg($args){
	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
	$slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );

	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter('widget_categories_dropdown_args', 'shopstar_set_widget_categories_dropdown_arg');

function shopstar_update_allowed_tags( $tags ) {
	$tags["h1"] = array();
	$tags["h2"] = array();
	$tags["h3"] = array();
	$tags["h4"] = array();
	$tags["h5"] = array();
	$tags["h6"] = array();
	$tags["p"] 	= array();
	$tags["br"] = array();
	
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'shopstar_update_allowed_tags' );

function shopstar_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => __( 'Super Simple Slider', 'shopstar' ),
			'slug'      => 'super-simple-slider',
			'required'  => false
		),
		array(
			'name'      => __( 'Elementor Page Builder', 'shopstar' ),
			'slug'      => 'elementor',
			'required'  => false
		),
		array(
			'name'      => __( 'SiteOrigin Widgets Bundle', 'shopstar' ),
			'slug'      => 'so-widgets-bundle',
			'required'  => false
		),
		array(
			'name'      => __( 'Beam me up Scotty', 'shopstar' ),
			'slug'      => 'beam-me-up-scotty',
			'required'  => false
		),
		array(
			'name'      => __( 'WPForms', 'shopstar' ),
			'slug'      => 'wpforms-lite',
			'required'  => false
		),
		array(
			'name'      => __( 'WooCommerce', 'shopstar' ),
			'slug'      => 'woocommerce',
			'required'  => false
		),
		array(
			'name'      => __( 'MailChimp for WordPress', 'shopstar' ),
			'slug'      => 'mailchimp-for-wp',
			'required'  => false
		),
		array(
			'name'      => __( 'Anti-Spam', 'shopstar' ),
			'slug'      => 'anti-spam',
			'required'  => false
		),
		array(
			'name'      => __( 'Yoast SEO', 'shopstar' ),
			'slug'      => 'wordpress-seo',
			'required'  => false
		)
	);

	$config = array(
		'id'           => 'shopstar',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => ''                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'shopstar_register_required_plugins' );

/**
 * Determine if Custom Post Type
 * usage: if ( is_this_a_custom_post_type() )
 *
 * References/Modified from:
 * @link https://codex.wordpress.org/Function_Reference/get_post_types
 * @link http://wordpress.stackexchange.com/users/73/toscho <== love this person!
 * @link http://wordpress.stackexchange.com/a/95906/64742
 */
function shopstar_is_this_a_custom_post_type( $post = NULL ) {

    $all_custom_post_types = get_post_types( array ( '_builtin' => false ) );

    //* there are no custom post types
    if ( empty ( $all_custom_post_types ) ) return false;

    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );

    //* could not detect current type
    if ( ! $current_post_type )
        return false;

    return in_array( $current_post_type, $custom_types );
}

/**
 * Remove blog menu link class 'current_page_parent' when on an unrelated CPT
 * or search results page
 * or 404 page
 * dep: is_this_a_custom_post_type() function
 * modified from: https://gist.github.com/ajithrn/1f059b2201d66f647b69
 */
function shopstar_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link( $classes, $item, $args ) {
    if ( shopstar_is_this_a_custom_post_type() || is_search() || is_404() ) {
        $blog_page_id = intval( get_option('page_for_posts') );

        if ( $blog_page_id != 0 && $item->object_id == $blog_page_id ) {
			unset( $classes[array_search( 'current_page_parent', $classes )] );
        }

	}

    return $classes;
}
add_filter( 'nav_menu_css_class', 'shopstar_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link', 10, 3 );

if ( function_exists( 'pll_register_string' ) ) {
	/**
	* Register some string from the customizer to be translated with Polylang
	*/
	function shopstar_pll_register_string() {
		// Header
		pll_register_string( 'shopstar-header-info-text', get_theme_mod( 'shopstar-header-info-text', customizer_library_get_default( 'shopstar-header-info-text' ) ), 'shopstar', false );
		
		// Search
		pll_register_string( 'shopstar-search-placeholder-text', get_theme_mod( 'shopstar-search-placeholder-text', customizer_library_get_default( 'shopstar-search-placeholder-text' ) ), 'shopstar', false );
		pll_register_string( 'shopstar-website-text-no-search-results-heading', get_theme_mod( 'shopstar-website-text-no-search-results-heading', customizer_library_get_default( 'shopstar-website-text-no-search-results-heading' ) ), 'shopstar', false );
		pll_register_string( 'shopstar-website-text-no-search-results-text', get_theme_mod( 'shopstar-website-text-no-search-results-text', customizer_library_get_default( 'shopstar-website-text-no-search-results-text' ) ), 'shopstar', true );
		
		// Header media
		pll_register_string( 'shopstar-header-image-text', get_theme_mod( 'shopstar-header-image-text', customizer_library_get_default( 'shopstar-header-image-text' ) ), 'shopstar', true );
		
		// Blog read more
		pll_register_string( 'shopstar-blog-read-more-text', get_theme_mod( 'shopstar-blog-read-more-text', customizer_library_get_default( 'shopstar-blog-read-more-text' ) ), 'shopstar', true );
		
		// 404
		pll_register_string( 'shopstar-website-text-404-page-heading', get_theme_mod( 'shopstar-website-text-404-page-heading', customizer_library_get_default( 'shopstar-website-text-404-page-heading' ) ), 'shopstar', true );
		pll_register_string( 'shopstar-website-text-404-page-text', get_theme_mod( 'shopstar-website-text-404-page-text', customizer_library_get_default( 'shopstar-website-text-404-page-text' ) ), 'shopstar', true );
	}
	add_action( 'admin_init', 'shopstar_pll_register_string' );
}

/**
 * A fallback function that outputs a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return  void
 */
if ( !function_exists( 'pll_e' ) ) {
	function pll_e( $str ) {
		echo $str;
	}
}

/**
 * A fallback function that returns a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return string
 */
if ( !function_exists( 'pll__' ) ) {
	function pll__( $str ) {
		return $str;
	}
}

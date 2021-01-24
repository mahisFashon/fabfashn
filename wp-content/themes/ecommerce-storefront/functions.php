<?php
/* This file is part of shopping mart child theme.
 * Note: this function loads the parent stylesheet before, then child theme stylesheet, leave it in place unless you know what you are doing.
 */
	
define('ECOMMERCE_STOREFRONT_THEME_REVIEW_URI', 'https://wordpress.org/themes/ecommerce-storefront/');
define('ECOMMERCE_STOREFRONT_THEME_DOC', 'https://www.ceylonthemes.com/wp-tutorials/');
define('ECOMMERCE_STOREFRONT_THEME_URI', 'https://www.ceylonthemes.com/product/wordpress-storefront-theme/');

//add new settings
require  get_stylesheet_directory().'/inc/settings.php';

add_action( 'wp_enqueue_scripts', 'ecommerce_storefront_styles' );

function ecommerce_storefront_styles() {
	//enqueue parent styles
	wp_enqueue_style( 'ecommerce-storefront-parent-styles', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'ecommerce-storefront-styles', get_stylesheet_directory_uri(). '/style.css', array('ecommerce-storefront-parent-styles'));
}

add_action( 'after_setup_theme', 'ecommerce_storefront_default_header' );
/**
 * Add Default Custom Header Image To Twenty Fourteen Theme
 * 
 * @return void
 */
function ecommerce_storefront_default_header() {

    add_theme_support(
        'custom-header',
        apply_filters(
            'ecommerce_storefront_custom_header_args',
            array(
                'default-text-color' => '#ffffff',
                'default-image' => get_stylesheet_directory_uri() . '/images/header.jpg',
				'width'              => 1280,
				'height'             => 300,
				'flex-width'         => true,
				'flex-height'        => true,				
            )
        )
    );
}

// get_parent theme settings and override with child theme settings
$ecommerce_storefront_settings = new new_york_business_settings();
$ecommerce_storefront_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $ecommerce_storefront_settings->default_data()); 


/* allowed html tags */

$ecommerce_storefront_allowed_html = array(
		'a'          => array(
			'href'  => true,
			'title' => true,
			'class'  => true,			
		),
		'option'          => array(
			'selected'  => true,
			'value' => true,
			'class'  => true,			
		),		
		'p'          => array(
			'class'  => true,
		),		
		'abbr'       => array(
			'title' => true,
		),
		'acronym'    => array(
			'title' => true,
		),
		'b'          => array(),
		'blockquote' => array(
			'cite' => true,
		),
		'cite'       => array(),
		'code'       => array(),
		'del'        => array(
			'datetime' => true,
		),
		'em'         => array(),
		'i'          => array(),
		'q'          => array(
			'cite' => true,
		),
		's'          => array(),
		'strike'     => array(),
		'strong'     => array(),
	);

/* wp body open */
function ecommerce_storefront_body_open(){
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
}

add_action('ecommerce_storefront_wp_body_open', 'ecommerce_storefront_body_open');

/**
 * override parent theme customize control
 */
if ( class_exists( 'WP_Customize_Control' )) {

	class new_york_business_pro_Control extends WP_Customize_Control {
	
		public function render_content() {
			?>
			<p style="padding:5px;background-color:#8080FF;color:#FFFFFF;text-align: center;"><a href="<?php echo esc_url(ECOMMERCE_STOREFRONT_THEME_URI); ?>" target="_blank" style="color:#FFFFFF"><?php echo esc_html__('See Premium Features', 'ecommerce-storefront'); ?></a></p>
			<?php
		}
	}
	
}

require   get_stylesheet_directory().'/inc/fonts.php';

/**
 * Override custom fonts functions of parent theme.
 */
 

function new_york_business_fonts_url() {
	$fonts_url = '';
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by "Open Sans", sans-serif;, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$typography = _x( 'on', 'Open Sans font: on or off', 'ecommerce-storefront' );

	if ( 'off' !== $typography ) {
		$font_families = array();
		
		$font_families[] = get_theme_mod('header_fontfamily','Oswald').':300,400,500';
		$font_families[] = get_theme_mod('body_fontfamily','Google Sans').':300,400,500';
		
 
		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);
        
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		
	}
   
	return esc_url( $fonts_url );

}
add_action('after_setup_theme', 'new_york_business_fonts_url');

//call custom fonts
add_action('after_setup_theme', 'new_york_business_custom_fonts_css');


//header_background

add_action( 'customize_register', 'ecommerce_storefront_customizer_settings' ); 

function ecommerce_storefront_customizer_settings( $wp_customize ) {

	
	//banner section	
	$wp_customize->add_section( 'top_banner' , array(
		'title'      => __( 'Hero Section', 'ecommerce-storefront' ),
		'priority'   => 1,
		'panel' => 'theme_options',
	) );	
	
	//hero section
	$wp_customize->add_setting('new_york_business_option[hero_page]' , array(
		'default'    => 0,
		'sanitize_callback' => 'absint',
		'type'=>'option',

	));

	$wp_customize->add_control('new_york_business_option[hero_page]' , array(
		'label' => __('Select Hero (Page)', 'ecommerce-storefront' ),
		'section' => 'top_banner',
		'type'=> 'dropdown-pages',
	) );
	

	//product_menu
	$wp_customize->add_setting('new_york_business_option[product_menu]' , array(
		'default'    => 1,
		'sanitize_callback' => 'new_york_business_sanitize_checkbox',
		'type'=>'option',

	));

	$wp_customize->add_control('new_york_business_option[product_menu]' , array(
		'label' => __('Add Product Category Menu [Not Visible in Customizer Preview]', 'ecommerce-storefront' ),
		'section' => 'header_section',
		'type'=> 'checkbox',
	) );
	
	
	// breadcrumb image height
	$wp_customize->add_setting( 'new_york_business_option[header_image_height]' , array(
	'default'    => 140,
	'sanitize_callback' => 'absint',
	'type'=>'option'
	));

	$wp_customize->add_control('new_york_business_option[header_image_height]' , array(
	'label' => __('Image Height (Minimum)','ecommerce-storefront' ),
	'section' => 'header_image',
	'type'=>'number',
	) );		

	
		
}

/**
 * @since 1.0.0
 * add product categories links.
 */

function ecommerce_storefront_nav_wrap() {
	  $wrap  = '<ul id="%1$s" class="%2$s">';
	  $wrap .= '<li class="hidden-xs theme-product-cat-menu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="/"><i class="fa fa-align-left"></i>&nbsp;'.esc_html__('Product Categories','ecommerce-storefront').'</a>';
	  $wrap .= ecommerce_storefront_print_categories();
	  $wrap .= '</li>';
	  $wrap .= '%3$s';
	  $wrap .= '</ul>';
	  return $wrap;
}

function ecommerce_storefront_print_categories(){
  $cat_string = '';
  $max_items = 10;
  $args = array(
		 'taxonomy'     => 'product_cat',
		 'orderby'      => 'date',
		 'order'      	=> 'ASC',
		 'show_count'   => 1,
		 'pad_counts'   => 0,
		 'hierarchical' => 1,
		 'title_li'     => '',
		 'hide_empty'   => 1,
  );
 $all_categories = get_categories( $args );
 $cat_count = 1;
	 $cat_string .= '<ul class="sub-menu theme-product-cat-sub-menu">';
	 foreach ($all_categories as $cat) {
		 if($cat_count > $max_items){
			break;
		 }
		 $cat_count++;
	 
			if($cat->category_parent == 0) {
				$category_id = $cat->term_id; 
				$args2 = array(
						'taxonomy'     => 'product_cat',
						'child_of'     => 0,
						'parent'       => $category_id,
						'orderby'      => 'name',
						'show_count'   => 1,
						'pad_counts'   => 0,
						'hierarchical' => 1,
						'title_li'     => '',
						'hide_empty'   => 1,
				);
				$sub_cats = get_categories( $args2 );
				if($sub_cats) {
				$cat_string .= '<li class="has-sub menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"> <a href="'.esc_url(get_term_link($cat->slug, 'product_cat')).'">'.esc_html($cat->name).'</a>';
				$cat_string .= '<ul class="sub-menu">';
					foreach($sub_cats as $sub_category) {
						$sub_category_id = $sub_category->term_id;
						$args3 = array(
								'taxonomy'     => 'product_cat',
								'child_of'     => 0,
								'parent'       => $sub_category_id,
								'orderby'      => 'name',
								'show_count'   => 1,
								'pad_counts'   => 0,
								'hierarchical' => 1,
								'title_li'     => '',
								'hide_empty'   => 1,
						);
						$sub_sub_cats = get_categories( $args3 );
						if($sub_sub_cats) {
						$cat_string .= '<li class="has-sub"> <a href="'.esc_url(get_term_link($sub_category->slug, 'product_cat')).'">'.esc_html($sub_category->name).'</a>';
							$cat_string .= '<ul class="sub-menu">';
								foreach($sub_sub_cats as $sub_sub_cat) {
									$cat_string .= '<li> <a href="'.esc_url(get_term_link($sub_sub_cat->slug, 'product_cat')).'">'.esc_html($sub_sub_cat->name).'</a>';
								}
							$cat_string .= '</ul>';						
						} else {
						$cat_string .= '<li> <a href="'.esc_url(get_term_link($sub_category->slug, 'product_cat')) .'">'.esc_html($sub_category->name).'</a>';
						}
					}
				$cat_string .= '</ul>'; 
				} else {
					$cat_string .= '<li> <a href="'.esc_url(get_term_link($cat->slug, 'product_cat')).'">'.esc_html($cat->name).'</a>';
				}
			}		      
	 } /* end for each */
	 $cat_string .=  '</ul>';

return $cat_string;

}


/* 
 * Override parent theme functions 
 */

function new_york_business_footer_foreground_css(){

	$color =  esc_attr(get_theme_mod( 'footer_foreground_color', '#fff')) ;
		
	/**
	 *
	 * @since ecommerce-storefront 1.0
	 *
	 */

	$css                = '
	
	.footer-foreground {}
	.footer-foreground .widget-title, 
	.footer-foreground a, 
	.footer-foreground p, 
	.footer-foreground td,
	.footer-foreground th,
	.footer-foreground caption,
	.footer-foreground li,
	.footer-foreground h1,
	.footer-foreground h2,
	.footer-foreground h3,
	.footer-foreground h4,
	.footer-foreground h5,
	.footer-foreground h6,
	.footer-foreground .site-info a
	{
	  color:'.$color.';
	}
	
	.footer-foreground #today {
		font-weight: 600;	
		background-color: #3ba0f4;	
		padding: 5px;
	}
	
	.footer-foreground a:hover, 
	.footer-foreground a:active {
		color:#ccc ;
	}
	
	';

return $css;

}

/**
 * disable parent admin notice 
 **/
function new_york_business_general_admin_notice(){}
function ecommerce_storefront_general_admin_notice(){

         $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible" ><p>
		 		<a href=%1$s target="_blank"  style="text-decoration: none; " class="button"> %2$s </a>
             	<a href=%3$s target="_self"  style="text-decoration: none; margin-left:10px;" class="button"> %4$s </a>
			 	<a href=%5$s target="_blank"  style="text-decoration: none; margin-left:10px;" class="button">%6$s</a>
			 	<a href="?ecommerce_storefront_notice_dismissed" target="_self"  style="text-decoration: none; margin-left:10px;" >%7$s</a>
			 	<strong>%8$s</strong></p></div>',
				esc_url(ECOMMERCE_STOREFRONT_THEME_URI),
				esc_html__('Upgrade to Pro', 'ecommerce-storefront'),
				esc_url('themes.php?page=ecommerce-storefront-submenu'),
				esc_html__('Quick Setup','ecommerce-storefront'),
				esc_url(ECOMMERCE_STOREFRONT_THEME_DOC),	
				esc_html__('Tutorials','ecommerce-storefront'),
				esc_html__('Dismiss', 'ecommerce-storefront'),
				esc_html__('Go Customize -> Theme Option, Customize Slider, Navigation, Header Contacts, Banner sections, Header Widgets ', 'ecommerce-storefront'));				
		 echo wp_kses_post($msg);
}

if ( isset( $_GET['ecommerce_storefront_notice_dismissed'] ) ){
	update_option('ecommerce_storefront_enabled_notice', 5);
}
$ecommerce_storefront_notice = get_option('ecommerce_storefront_enabled_notice', 6);

if($ecommerce_storefront_notice !=5 || $ecommerce_storefront_notice == ''){
	add_action('admin_notices', 'ecommerce_storefront_general_admin_notice');	
}


//add child theme widget area

function ecommerce_storefront_widgets_init(){

	/* header sidebar */
	global $ecommerce_storefront_option;

	register_sidebar(
		array(
			'name'          => __( 'Page Top Widgets', 'ecommerce-storefront' ),
			'id'            => 'page-top',
			'description'   => __( 'Add widgets to appear in Header.', 'ecommerce-storefront' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'ecommerce_storefront_widgets_init' );




require  get_stylesheet_directory().'/inc/help.php';
/**
 * Register a sub menu page.
 */
add_action('admin_menu', 'ecommerce_storefront_register_theme_page');
 
function ecommerce_storefront_register_theme_page() {
    add_theme_page(
        'eCommerce Storefront Theme',
        'eCommerce Storefront Theme',
        'manage_options',
        'ecommerce-storefront-submenu',
        'ecommerce_storefront_submenu_page_callback' );
}
 



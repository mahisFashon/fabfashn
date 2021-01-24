<?php
/**
 * The header
 * @package ecommerce-storefront
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php 
wp_head();
//get settings array 
global $new_york_business_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $new_york_business_default_settings = new new_york_business_settings();
   $new_york_business_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $new_york_business_default_settings->default_data());  
}
?>
</head>
<body <?php body_class(); ?> >
<!-- link to site content -->
<a class="skip-link screen-reader-text " href="#content"><?php esc_html_e( 'Skip to content', 'ecommerce-storefront' ); ?></a>
<?php do_action('ecommerce_storefront_wp_body_open'); ?>
<!-- The Search Modal Dialog -->
<div id="myModal" class="modal" aria-hidden="true" tabindex="-1" role="dialog">
  <!-- Modal content -->
  <div class="modal-content">
    <span id="search-close" class="close" tabindex="0">&times;</span>
	<br/> <br/>
    <?php get_template_part( 'searchform'); ?>
	<br/> 
  </div>
</div><!-- end search model-->

<?php if(is_front_page()) get_template_part( 'templates/widgets', 'section' ); ?>

<div id="page" class="site">
<?php if($new_york_business_option['box_layout']) echo '<div class="wrap-box">'; ?>
<header id="masthead" class="site-header  site-header-background" role="banner" >

	<!-- start of mini header -->
	<?php if((!$new_york_business_option['header_section_hide_header']) && 
	($new_york_business_option['contact_section_phone']!='' 
	|| $new_york_business_option['contact_section_email']!='' 
	|| $new_york_business_option['contact_section_address']!='' 
	|| $new_york_business_option['contact_section_hours']!='' 
	||  ($new_york_business_option['social_facebook_link']!='') 
	|| ($new_york_business_option['social_twitter_link']!='') 
	|| ($new_york_business_option['social_skype_link']!='') 
	|| ($new_york_business_option['social_pinterest_link']!='') )): ?>
	   
			<div class="mini-header hidden-xs">
				<div class="container vertical-center">
					
						<div id="mini-header-contacts" class="col-md-8 col-sm-8 lr-clear-padding" >
						 
							<ul class="contact-list-top">
							<?php if($new_york_business_option['contact_section_phone']!=''): ?>					  
								<li><i class="fa fa-phone contact-margin"></i><span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_phone']); ?></span></li>
							<?php endif; ?>
							<?php if($new_york_business_option['contact_section_email']!=''): ?>
								<li class="contact-margin"><i class="fa fa-envelope" ></i><a href="<?php echo esc_url( 'mailto:'.$new_york_business_option['contact_section_email'] ); ?>"><span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_email']); ?></span></a></li>
							<?php endif; ?>
							<?php if($new_york_business_option['contact_section_address']!=''): ?>
								<li class="contact-margin"><i class="fa fa-map-marker" ></i><span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_address']); ?></span></li>
							<?php endif; ?>
							<?php if($new_york_business_option['contact_section_hours']!=''): ?>
								<li class="contact-margin"><i class="fa fa-clock-o" ></i><span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_hours']); ?></span></li>
							<?php endif; ?>														
							</ul>
						 
						</div>
						<div class="col-md-4 col-sm-4 lr-clear-padding">			
							<ul class="mimi-header-social-icon pull-right animate fadeInRight" >
								<?php if($new_york_business_option['social_facebook_link']!=''){?> <li><a href="<?php echo esc_url($new_york_business_option['social_facebook_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Facebook','ecommerce-storefront'); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
								<?php if($new_york_business_option['social_twitter_link']!=''){?> <li><a href="<?php echo esc_url($new_york_business_option['social_twitter_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Twitter','ecommerce-storefront'); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
								<?php if($new_york_business_option['social_skype_link']!=''){?> <li><a href="<?php echo esc_url($new_york_business_option['social_skype_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Skype','ecommerce-storefront'); ?>"><i class="fa fa-skype"></i></a></li><?php } ?>
								<?php if($new_york_business_option['social_pinterest_link']!=''){?> <li><a href="<?php echo esc_url($new_york_business_option['social_pinterest_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Pinterest','ecommerce-storefront'); ?>"><i class="fa fa-pinterest"></i></a></li><?php } ?>
							</ul>
						</div>	
					
				</div>	
			</div><!-- .end of contacts mini header -->
		<?php endif;	
	   
		get_template_part( 'inc/info-menu-search');
		
		if(!$new_york_business_option['home_header_section_disable']) { 
			get_template_part( 'templates/subheader');
		}

?>  
</header><!-- #masthead -->
<?php	
	if(is_front_page() and $new_york_business_option['hero_page'] != 0 ) { 
		get_template_part( 'templates/hero', 'section' ); 
	}
	if ( is_front_page() and $new_york_business_option['slider_in_home_page']) {
		get_template_part( 'template-parts/slider', 'section' ); 
	}

if(class_exists('woocommerce')) { ?>
<div id="scroll-cart" class="topcorner">
	<ul>
					
		<li class="my-cart"><?php do_action( 'new_york_business_woocommerce_cart_top' ); ?></li>
		<?php if(function_exists('YITH_WCWL')) { ?><li class="my-cart"><?php new_york_business_wishlist_count(); ?></li><?php } ?>								
		<li><a class="login-register"  href="<?php echo esc_url($new_york_business_option['header_myaccount_link']); ?>"><i class="fa fa-user-circle">&nbsp;</i></a></li>
	</ul>
</div>
<?php } ?>


<div id="content">
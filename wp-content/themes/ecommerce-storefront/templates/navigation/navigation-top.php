<?php
/**
 * Displays top navigation
 *
 * @package new-york-business
 * @since 1.0

 */

?>
<?php if ( has_nav_menu( 'top' ) ) : ?>
<div class="navigation-top">
<nav id="site-navigation" class="main-navigation navigation-font-size" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'ecommerce-storefront' ); ?>">
	<button id="main-menu-toggle"  class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo new_york_business_get_fo( array( 'icon' => 'bars' ) );
		echo new_york_business_get_fo( array( 'icon' => 'close' ) );
		esc_html_e( 'Menu', 'ecommerce-storefront' );
		?>
	</button>

	<?php
	global $new_york_business_option;
	if(class_exists('WooCommerce') && $new_york_business_option['product_menu'] && (!class_exists('WP_Customize_Control'))) {
		wp_nav_menu(
			array(
				'theme_location' => 'top',
				'menu_id'        => 'top-menu',
				'items_wrap' 		=> 	ecommerce_storefront_nav_wrap(),
			)
	);
	
	} else {
	
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	
	}
	?>

</nav><!-- #site-navigation -->

</div>	  

<!-- .navigation-top -->
<?php endif; ?>

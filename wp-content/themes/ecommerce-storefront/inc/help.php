<?php

function ecommerce_storefront_submenu_page_callback() {
 ?>
	<div class="wrap" >
	
		<div class="welcome-panel" >
	
        <h2><?php esc_html__('eCommerce Storefront Theme', 'ecommerce-storefront'); ?> </h2>
		
		<h3><?php echo esc_html__('How to install Demo :-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Download demo content .zip file from Unzip the content. Install one click demo import. Appearance-> Import Demo Data. Add Data file, customizer and settings files manually. Click import. ', 'ecommerce-storefront'); ?> </p>

		<p><?php echo esc_html__('Demo content:-', 'ecommerce-storefront') ; echo ECOMMERCE_STOREFRONT_THEME_DOC; ?></p>

        <p><b><?php echo esc_html__('Set Home page and main menu manually as described below.', 'ecommerce-storefront'); ?></b></p>
		
		<h3><?php echo esc_html__('Set Home Page :-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Settings -> Reading -> Select a static page, select home page and save settings.', 'ecommerce-storefront'); ?> </p>

		
		<h3><?php echo esc_html__('Create Menus :-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Appearance > Menu and Click View all locations. Theme has 2 menu areas called Top and Footer. If a Main menu already exists, assign to menus. Otherwise create a menu. Click save.', 'ecommerce-storefront'); ?> </p>
				
		
		<h3><?php echo esc_html__('Add Wishlist, Compare support :-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Install YITH WishList, YITH quick view and YITH Compare plugins. If wishlist compare AJAX not loading, goto wishlist settings and enable AJAX Loading.', 'ecommerce-storefront'); ?> </p>
		
		
		<h3><?php echo esc_html__('Add Header Contact and Social links :-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Customizer  -> Theme Options -> Header, Add phone, email, Work Hours Edit My Account Link', 'ecommerce-storefront'); ?> </p>

		
		<h3><?php echo esc_html__('Add Home slider :-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Customizer  -> Theme Options -> Slider. Enable slider. Select post category to display', 'ecommerce-storefront'); ?> </p>

		
		<h3><?php echo esc_html__('Add Home Hero Content :-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Customizer  -> Theme Options -> Hero. Select page to display', 'ecommerce-storefront'); ?> </p>

		<h3><?php echo esc_html__('Add Home Page Widgets:-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Goto home page, Customizer  -> Widgets. Add widget.', 'ecommerce-storefront'); ?> </p>

		
		<h3><?php echo esc_html__('Change Fonts :-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Customizer  -> Theme Options -> Fonts. Change fonts', 'ecommerce-storefront'); ?> </p>

		
		<h3><?php echo esc_html__('Change Footer Credits :-', 'ecommerce-storefront'); ?></h3>
        <p><?php echo esc_html__('Customizer  -> Theme Options -> Footer. Edit text.', 'ecommerce-storefront'); ?> </p>

		</div>

    </div> 
 <?php 
 }

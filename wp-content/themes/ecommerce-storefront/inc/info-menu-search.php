<!--start of site branding search-->
<div class="container ">
	<div class="vertical-center">
	
		<div class="col-md-4 col-sm-4 col-xs-12 site-branding" >
		
		  <?php if ( has_custom_logo() ) : ?>
		  	<?php the_custom_logo(); ?>
		  <?php endif; ?>
		  
		  <div class="site-branding-text">
			<?php if ( is_front_page() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			  <?php bloginfo( 'name' ); ?>
			  </a></h1>
			<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			  <?php bloginfo( 'name' ); ?>
			  </a></p>
			<?php endif; ?>
			<?php $ecommerce_storefront_description = get_bloginfo( 'description', 'display' ); if ( $ecommerce_storefront_description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo esc_html($ecommerce_storefront_description); ?></p>
			<?php endif; ?>
		  </div>
		</div>
		<!-- .end of site-branding -->
		
		<div class="col-sm-8 col-xs-12 vertical-center"><!--  menu, search -->
		
		<?php if(class_exists( 'WooCommerce' )): ?>
		
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 header-search-form">
				<?php the_widget('new_york_business_product_search_widget'); ?> 
		</div>
		
	 	<div class="col-md-3 col-sm-3 col-xs-12 site-branding" >	 	
				<div id="cart-wishlist-container">
					<table align="center">
					<tr>
					<td>
					  <?php if(class_exists('YITH_WCWL')): ?>
					  <div id="wishlist-top" class="wishlist-top">
						<li class="my-wishlist"><?php new_york_business_wishlist_count(); ?></li>
					  </div>
					  <?php endif; ?> 
					</td>
					
	
					<td>
					  <div id="cart-top" class="cart-top">
						<div class="cart-container">
						  <?php do_action( 'new_york_business_woocommerce_cart_top' ); ?>
						</div>
					  </div>
					</td>
					</tr>
					</table>
				</div>
	 	</div>		
	
		<?php else: ?>
		<div id="sticky-nav" class="top-menu-layout-2" > <!--start of navigation-->
		  <div class="container">
		  <div class="row vertical-center">
			<!-- start of navigation menu -->
			<div class="navigation-center-align">
			  <?php get_template_part( 'templates/navigation/navigation', 'top' ); ?>
			</div>
			<!-- end of navigation menu -->
			</div>
		  </div>
		  <!-- .container -->
		</div>		 
		<?php endif; ?> 
		 
	</div><!-- .menu, search -->
	
   </div> <!-- .end of woocommerce layout -->
   
</div>
<!-- .end of site-branding, search -->
	 
	  
<?php if(class_exists( 'WooCommerce' )): ?>
<div id="sticky-nav" class="woocommerce-layout" > <!--start of navigation-->
	<div class="container">
	<div class="row vertical-center">
		<!-- start of navigation menu -->
		<div class="col-sm-12 col-lg-12 col-xs-12 woocommerce-layout">
			<?php get_template_part( 'templates/navigation/navigation', 'top' ); ?>
		</div>
		<!-- end of navigation menu -->
	</div>
	</div>
<!-- .container -->
</div>
<?php 
endif;

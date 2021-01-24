<?php 
if ( function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'primary' ) ) {
?>
<nav id="site-navigation" class="main-navigation-mega-menu" style="background: linear-gradient(to bottom, <?php echo( mmm_get_theme_for_location('primary')['container_background_from'] ); ?>, <?php echo( mmm_get_theme_for_location('primary')['container_background_to'] ); ?>);" role="navigation">
	<div id="main-menu" class="container">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</div>
</nav><!-- #site-navigation -->
<?php 
} else {
?>
<nav id="site-navigation" class="main-navigation <?php echo ( !is_front_page() || ( get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-no-slider' && !get_header_image() ) ) ? 'bottom-border mobile' : 'bottom-border'; ?>" role="navigation">
	<span class="menu-toggle">
		<i class="otb-fa otb-fa-bars"></i>
	</span>
	
	<div id="main-menu" class="container shopstar-mobile-menu-primary-color-scheme <?php echo ( !is_front_page() || ( get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-no-slider' && !get_header_image() ) ) ? 'bottom-border' : ''; ?>">
	    <div class="padder">
	
			<div class="close-button"><i class="otb-fa otb-fa-angle-right"></i><i class="otb-fa otb-fa-angle-left"></i></div>
			<div class="main-navigation-inner">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	        </div>
			<?php if( get_theme_mod( 'shopstar-header-search', customizer_library_get_default( 'shopstar-header-search' ) ) ) : ?>
	        <span class="search-button">
	        	<a href=""><?php echo __( 'Search', 'shopstar' ); ?> <i class="otb-fa otb-fa-search search-btn"></i></a>
	        </span>
	        <?php endif; ?>
	
			<div class="search-slidedown">
				<div class="container">
					<div class="padder">
						<div class="search-block">
						<?php
						if( get_theme_mod( 'shopstar-header-search', customizer_library_get_default( 'shopstar-header-search' ) ) ) :
							get_search_form();
						endif;
						?>
						</div>
					</div>
				</div>
			</div>
		
		</div>	        
	</div>
</nav><!-- #site-navigation -->
<?php 
}

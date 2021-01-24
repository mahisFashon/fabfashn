
<header id="masthead" class="site-header centered <?php echo ( get_theme_mod( 'shopstar-show-header-top-bar', customizer_library_get_default( 'shopstar-show-header-top-bar' ) ) ) ? 'has-top-bar' : ''; ?>" role="banner">

	<?php
	if( get_theme_mod( 'shopstar-show-header-top-bar', customizer_library_get_default( 'shopstar-show-header-top-bar' ) ) ) :
		get_template_part( 'library/template-parts/top-bar' );
	endif;
	
	$logo = '';
	
	if ( function_exists( 'has_custom_logo' ) ) {
		if ( has_custom_logo() ) {
			$logo = get_custom_logo();
		}
	} else if ( get_theme_mod( 'shopstar-logo' ) ) {
		$logo = "<a href=\"". esc_url( home_url( '/' ) ) ."\" title=\"". esc_attr( get_bloginfo( 'name', 'display' ) ) ."\"><img src=\"". esc_url( get_theme_mod( 'shopstar-logo' ) ) ."\" alt=\"". esc_attr( get_bloginfo( 'name' ) ) ."\" /></a>";
	}	
	?>

	<div class="container">
	    <div class="padder">
	
		    <div class="branding">
		        <?php
		        if( $logo ) :
					echo $logo;
		        else :
		        ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="title"><?php bloginfo( 'name' ); ?></a>
		            <div class="description"><?php bloginfo( 'description' ); ?></div>
		        <?php
	        	endif;
	        	?>
		    </div>
	    
	    </div> 
	</div>

	<?php
	get_template_part( 'library/template-parts/navigation-menu' );
	?>

</header><!-- #masthead -->
 
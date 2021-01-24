
<div class="top-bar">
	<div class="container">
        
		<div class="padder">
            
			<div class="left">
            
				<?php get_template_part( 'library/template-parts/social-links' ); ?>
                
            </div>
            
            <div class="right">
				
                <?php
                if ( shopstar_is_woocommerce_activated() && get_theme_mod( 'shopstar-header-shop-links', customizer_library_get_default( 'shopstar-header-shop-links' ) ) ) {
					get_template_part( 'library/template-parts/shop-links' );
                } else {
					get_template_part( 'library/template-parts/info-text' );
                }
                ?>
            </div>
            
            <div class="clearboth"></div>
            
		</div>
            
	</div>
</div>

<section id="hero-section">
	<div>
		<?php 
		$ecommerce_storefront_settings = new new_york_business_settings();
		$ecommerce_storefront_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $ecommerce_storefront_settings->default_data()); 

		$ecommerce_storefront_banner = $ecommerce_storefront_option['hero_page'];
		if($ecommerce_storefront_banner != 0 ) {
	
			$ecommerce_storefront_args = array( 'post_type' => 'page','ignore_sticky_posts' => 1 , 'post__in' => array($ecommerce_storefront_banner));
			$ecommerce_storefront_result = new WP_Query($ecommerce_storefront_args);
			while ( $ecommerce_storefront_result->have_posts() ) :
				$ecommerce_storefront_result->the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
		}
		 ?>
	</div>
</section> 


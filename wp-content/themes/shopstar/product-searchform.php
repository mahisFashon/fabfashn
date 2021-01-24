<?php
/**
 * The template for displaying the product search form
 *
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( get_theme_mod( 'shopstar-search-placeholder-text', customizer_library_get_default( 'shopstar-search-placeholder-text' ) ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" title="<?php _ex( 'Search for:', 'label', 'shopstar' ); ?>" />
	<label>
	<button type="submit" id="searchsubmit" class="search-submit">
		<i class="otb-fa otb-fa-search"></i>
	</button>
	<input type="hidden" name="post_type" value="product" />
</form>

<div class="clearboth"></div>

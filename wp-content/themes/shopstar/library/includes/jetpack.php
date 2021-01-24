<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package shopstar
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function shopstar_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'shopstar_infinite_scroll_render',
		'footer'    => false,
		'wrapper'	=> false
	) );
} // end function shopstar_jetpack_setup
add_action( 'after_setup_theme', 'shopstar_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function shopstar_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'library/template-parts/content' );
	}
}

/**
 * Remove default Related Posts | Custom added to single.php.
 */
function shopstar_remove_default_related_posts() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp     = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
 
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_action( 'wp', 'shopstar_remove_default_related_posts', 20 );

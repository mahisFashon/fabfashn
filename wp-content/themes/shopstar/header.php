<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package shopstar
 */
?><!DOCTYPE html><!-- Shopstar! -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'shopstar' ); ?></a>

	<?php
	if ( get_theme_mod( 'shopstar-header-layout', customizer_library_get_default( 'shopstar-header-layout' ) ) == 'shopstar-header-layout-centered' ) :
		get_template_part( 'library/template-parts/header', 'centered' );
	else :
		get_template_part( 'library/template-parts/header', 'left-aligned' );
    endif;
    ?>
	
	<script>
    var shopstarSliderTransitionSpeed = parseInt( <?php echo intval( get_theme_mod( 'shopstar-slider-transition-speed', customizer_library_get_default( 'shopstar-slider-transition-speed' ) ) ); ?> );
	</script>
	
	<?php
	if ( is_front_page() && get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) != 'shopstar-no-slider' ) :
		get_template_part( 'library/template-parts/slider' );
	elseif ( is_front_page() && get_header_image() ) :
		get_template_part( 'library/template-parts/header-image' );
	endif;
	?>
		
	<div id="content" class="site-content">
		<a name="site-content"></a>
		<div class="container">
			<div class="padder">
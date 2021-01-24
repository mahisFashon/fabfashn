<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package shopstar
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">
		
	    <?php
	    if ( function_exists( 'bcn_display' ) ) :
	    ?>
	        <div class="breadcrumbs">
	            <?php bcn_display(); ?>
	        </div>
	    <?php
	    endif;

		while ( have_posts() ) : the_post();

			get_template_part( 'library/template-parts/content', 'single' );
			
			shopstar_post_nav();

			if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
				echo do_shortcode( '[jetpack-related-posts]' );
			}
			
			// If comments are open load up the comment template.
			if ( comments_open() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		 
		// Prevent weirdness
		wp_reset_postdata();
		?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

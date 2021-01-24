<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopstar
 */

if (!defined('ABSPATH')) exit;

get_header(); ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">
		
		    <?php
		    if ( ! is_front_page() ) :
		        
		        if ( function_exists( 'bcn_display' ) ) : 
		    ?>
		        <div class="breadcrumbs">
					<?php bcn_display(); ?>
		        </div>
			<?php 
				endif;
				
		    endif;
        
        	get_template_part( 'library/template-parts/page-title' );

			if ( have_posts() ) {
	
				while ( have_posts() ) : the_post();
	
					get_template_part( 'library/template-parts/content' );
	
				endwhile;
				
				// Prevent weirdness
				wp_reset_postdata();
	
				if ( !class_exists( 'Jetpack' ) || class_exists( 'Jetpack' ) && !Jetpack::is_module_active( 'infinite-scroll' ) ) {
					shopstar_paging_nav();
				}
	
			} else {
	
				get_template_part( 'library/template-parts/content', 'none' );
	
			}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopstar
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">

		    <?php if ( ! is_front_page() ) : ?>
		    
		        <?php if ( function_exists( 'bcn_display' ) ) : ?>
		        <div class="breadcrumbs">
		            <?php bcn_display(); ?>
		        </div>
		        <?php endif; ?>
		        
		    <?php endif; ?>
		    
		    <?php get_template_part( 'library/template-parts/page-title' ); ?>
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'library/template-parts/content', 'page' ); ?>

				<?php
					// If comments are open load up the comment template.
					if ( comments_open() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>
			
			<?php
			// Prevent weirdness
			wp_reset_postdata();
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

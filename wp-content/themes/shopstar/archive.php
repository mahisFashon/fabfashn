<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopstar
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">
		
	    <?php if ( function_exists( 'bcn_display' ) ) : ?>
	        <div class="breadcrumbs">
	            <?php bcn_display(); ?>
	        </div>
	    <?php endif; ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	    
		<?php
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

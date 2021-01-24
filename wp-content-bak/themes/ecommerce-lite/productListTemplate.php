<?php /* Template Name: ProductListT1 */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        // Start the loop.
        //while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'template-parts/content', 'page' );

            $args = array(
                'post_type'      => 'product',
            );
        
            $loop = new WP_Query( $args );
            $loopCount = 0;
            while ( $loop->have_posts() ) : $loop->the_post();
                global $product; $loopCount++;
                echo '<br /> PRODUCT-DATA-FOR ' . $loopCount . '<br />' ;
                echo $product->get_name() . '-', $product->get_sku()  . '<br />' ;
                if ($loopCount == 1)
                    echo print_r($product, true);
            endwhile;
        
            wp_reset_query();

        //endwhile;
        ?>

    </main><!-- .site-main -->

    <?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 * @package wpcotestheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php

			if ( have_posts() ) :

				/**
				 * hooked
				 */
				do_action( 'wpcotestheme_page_loop_before' );

				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', 'page' );

				endwhile; // End of the loop.

				/**
				 * hooked
				 */
				do_action( 'wpcotestheme_page_loop_after' );

				else :

					get_template_part( dirname( __DIR__ ) . 'template-parts/content/content', 'none' );
			
				endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

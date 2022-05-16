<?php
/**
 * The template for displaying all single posts.
 *
 * @package wpcotestheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php

		/**
		 * @hooked
		 */
		do_action( 'wpcotestheme_single_post_loop_before' );

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'single' );

		endwhile; // End of the loop.

		/**
		 * @hooked
		 */
		do_action( 'wpcotestheme_single_post_loop_after' );
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();

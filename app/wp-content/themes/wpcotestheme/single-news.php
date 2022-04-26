<?php
/**
 * Custom Post Type News
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<?php
	if ( have_posts() ) :

		/**
		 * @hooked wpcotestheme_archive_header - 10
		 */
		do_action( 'wpcotestheme_loop_before' );

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'news' );

		endwhile;

		/**
		 * @hooked wpcotestheme_paging_nav - 10
		 */
		do_action( 'wpcotestheme_loop_after' );

	else :
		get_template_part( 'template-parts/content/content', 'none' );
	endif;
	?>
	</main><!-- #main -->
</div><!-- #primary -->    
<?php
get_sidebar();
get_footer();

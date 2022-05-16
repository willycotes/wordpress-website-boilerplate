<?php
/**
 * The template for displaying search results pages.
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
		do_action( 'wpcotestheme_search_main_top' );
		?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						/* translators: %s: search term */
						printf( esc_attr__( 'Search Results for: %s', 'wpcotestheme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/**
			 *
			 */
			do_action( 'wpcotestheme_search_loop_before' );
			?>

			<div class="grid-container">
				<?php
				while ( have_posts() ) :
					the_post();

					/**
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/excerpt/excerpt', get_post_format() );
				endwhile;
				?>
			</div><!-- .grid-container -->	

			<?php
			/**
			 *
			 * @hooked wpcotestheme_paging_nav - 10
			 */
			do_action( 'wpcotestheme_search_loop_after' );

		else :

			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

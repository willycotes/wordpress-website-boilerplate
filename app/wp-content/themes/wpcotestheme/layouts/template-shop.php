<?php
/**
 * The template for displaying the shop page.
 *
 * Template name: Shop page
 *
 * @package wpcotestheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/**
			 * Functions hooked in to homepage action
			 *
			 * @hooked wpcotestheme_homepage_content      - 10
			 * @hooked wpcotestheme_product_categories    - 20
			 * @hooked wpcotestheme_recent_products       - 30
			 * @hooked wpcotestheme_featured_products     - 40
			 * @hooked wpcotestheme_popular_products      - 50
			 * @hooked wpcotestheme_on_sale_products      - 60
			 * @hooked wpcotestheme_best_selling_products - 70
			 */
			do_action( 'wpcotestheme_shop' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php

/**
 * @hooked
 */
do_action( 'wpcotestheme_shop_sidebar' );
get_footer();

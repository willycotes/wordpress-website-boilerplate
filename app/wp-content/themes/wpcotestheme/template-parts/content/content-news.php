<?php
/**
 * Template parts content news
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php

		/**
		 * Functions hooked in to wpcotestheme_post_news_header_top action.
		 */
		do_action( 'wpcotestheme_post_news_header_top' );

		the_title( '<h1 class="entry-title">', '</h1>' );

		/**
		 * Functions hooked in to wpcotestheme_post_news_header_bottom action.
		 *
		 * @hooked
		 */
		do_action( 'wpcotestheme_post_news_header_bottom' );
		?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->

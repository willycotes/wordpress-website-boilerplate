<?php
/**
 * Content default excerpt 
 *
 * Template part for displaying homepage (blog), post archives and search results
 *
 */
?>

<!-- #post-${ID} -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	/**
	 * @hooked wpcotestheme_post_excerpt_header - 10
	 * @hooked wpcotestheme_post_excerpt_content - 10
	 */
	do_action( 'wpcotestheme_post_excerpt' );
	?>
</article>

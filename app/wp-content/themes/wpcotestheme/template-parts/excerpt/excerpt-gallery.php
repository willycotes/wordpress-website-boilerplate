<?php
/**
 * Show the appropriate content for the Gallery post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage wpcotestheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	/**
	 * @hooked
	 */
	do_action( 'wpcotestheme_post_excerpt_gallery_top' );

	// Print the 1st gallery found.
	if ( has_block( 'core/gallery', get_the_content() ) ) {

		wpcotestheme_print_first_instance_of_block( 'core/gallery', get_the_content() );
	}

	the_title( sprintf( '<h2 class="entry-title"><a href="%s" class="entry-title__link">', esc_url( get_permalink() ) ), '</a></h2>' );

	/**
	 * @hooked
	 */
	do_action( 'wpcotestheme_post_excerpt_gallery_bottom' );
	?>
</article>

<?php
/**
 * Show the appropriate content for the Image post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage wpcotestheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	do_action( 'wpcotestheme_post_excerpt_image_top' );

	// If there is no featured-image, print the first image block found.
	if ( has_block( 'core/image', get_the_content() ) ) {
		wpcotestheme_print_first_instance_of_block( 'core/image', get_the_content() );
	} elseif ( wpcotestheme_can_show_post_thumbnail() ) {
		the_post_thumbnail();
	}

	the_title( sprintf( '<h2 class="entry-title"><a href="%s" class="entry-title__link">', esc_url( get_permalink() ) ),'</a></h2>' );

	/**
	 * @hooked wpcotestheme_post_header
	 */
	do_action( 'wpcotestheme_post_excerpt_image_bottom' );
	?>
</article>


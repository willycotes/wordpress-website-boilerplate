<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wpcotestheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to wpcotestheme_page add_action
	 *
	 * @hooked wpcotestheme_page_header          - 10
	 * @hooked wpcotestheme_page_content         - 20
	 * @hooked wpcotestheme_edit_post_link       - 30
	 * @hooked wpcotestheme_display_comments     - 40
	 */
	do_action( 'wpcotestheme_page' );
	?>
</article><!-- #post-## -->

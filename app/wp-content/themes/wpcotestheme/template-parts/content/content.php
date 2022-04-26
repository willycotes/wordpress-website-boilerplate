<?php
/**
 * Template used to display default content.
 *
 * @package wpcotestheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to wpcotestheme_content action.
	 *
	 * @hooked wpcotestheme_post_header          - 10
	 * @hooked wpcotestheme_post_content         - 10
	 * @hooked wpcotestheme_post_nav 						- 10
	 */
	do_action( 'wpcotestheme_content' );
	?>
</article><!-- #post-## -->

<?php
/**
 * Template used to display post content on single pages.
 *
 * @package wpcotestheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	/**
	 * @hooked wpcotestheme_post_header          - 10
	 * @hooked wpcotestheme_post_content         - 20
	 * @hooked wpcotestheme_edit_post_link				- 30
	 * @hooked wpcotestheme_post_nav             - 40
	 * @hooked wpcotestheme_display_comments     - 50
	 */
	do_action( 'wpcotestheme_single_post' );

	?>
</article><!-- #post-## -->

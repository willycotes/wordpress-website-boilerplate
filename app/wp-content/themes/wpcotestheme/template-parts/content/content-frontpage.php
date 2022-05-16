<?php
/**
 * Template used to display post content.
 *
 * @package wpcotestheme
 */
?>

<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to wpcotestheme_loop_post action.
	 *
	 * @hooked wpcotestheme_frontpage_header         - 10
	 * 
	 * @hooked wpcotestheme_frontpage_content         - 20
	 */
	do_action( 'wpcotestheme_content_frontpage' );
	?>
</div>

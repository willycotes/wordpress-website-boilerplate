<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wpcotestheme
 */

?>

<!doctype html>
<html <?php language_attributes(); ?><?php wpcotestheme_the_html_classes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>	
	</head>

	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>

		<?php do_action( 'wpcotestheme_before_site' ); ?>

		<div id="page" class="hfeed site">

			<?php do_action( 'wpcotestheme_before_header' ); ?>

			<header id="masthead" class="site-header">

				<?php
				/**
				 * @hooked wpcotestheme_skip_links - 10
				 * @hooked wpcotestheme_site_title_or_logo - 20
				 */
				do_action( 'wpcotestheme_header' );
				?>

			</header><!-- #masthead -->

			<?php
			/**
			 * Functions hooked in to wpcotestheme_before_content
			 *
			 * @hooked wpcotestheme_primary_navigation - 10
			 * @hooked wpcotestheme_header_widget_region - 20
			 * @hooked wpcotestheme_breadcrumb or woocommerce_breadcrumb - 30
			 */
			do_action( 'wpcotestheme_before_content' );
			?>

			<div id="content" class="site-content" tabindex="-1">

				<?php do_action( 'wpcotestheme_content_top' ); ?>
				
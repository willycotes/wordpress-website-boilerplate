<?php
/**
 * wpcotestheme engine room.
 *
 * @package wpcotestheme
 */

/**
 * Assign the wpcotestheme version to a var
 */
$theme              = wp_get_theme( 'wpcotestheme' );
$wpcotestheme_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

/**
 * Creating Object theme config
 */
$wpcotestheme = (object) array(
	'version'    => $wpcotestheme_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-wpcotestheme.php',
	// 'customizer' => require 'inc/customizer/class-wpcotestheme-customizer.php',
);

require 'inc/wpcotestheme-functions.php';
require 'inc/wpcotestheme-template-hooks.php';
require 'inc/wpcotestheme-template-functions.php';
require 'inc/wordpress-shims.php';

require_once 'inc/base/class-wpcotestheme-post-type.php';

// if ( is_admin() ) {
	// $wpcotestheme->admin = require 'inc/admin/class-wpcotestheme-admin.php';
// }

// if ( wpcotestheme_is_woocommerce_activated() ) {
// 	$wpcotestheme->woocommerce = require_once 'inc/test-woocommerce/test-class-wpcotestheme-woocommerce.php';
// 	require_once 'inc/test-woocommerce/test-wpcotestheme-woocommerce-functions.php';
// 	require_once 'inc/test-woocommerce/test-wpcotestheme-woocommerce-template-functions.php';
// 	require_once 'inc/test-woocommerce/test-wpcotestheme-woocommerce-hooks.php';
// }

// if ( wpcotestheme_is_woocommerce_activated() ) {
// 	$wpcotestheme->woocommerce            = require 'inc/woocommerce/class-wpcotestheme-woocommerce.php';
// 	// $wpcotestheme->woocommerce_customizer = require 'inc/woocommerce/class-wpcotestheme-woocommerce-customizer.php';

// 	require 'inc/woocommerce/class-wpcotestheme-woocommerce-adjacent-products.php';

// 	require 'inc/woocommerce/wpcotestheme-woocommerce-template-hooks.php';
// 	require 'inc/woocommerce/wpcotestheme-woocommerce-template-functions.php';
// 	require 'inc/woocommerce/wpcotestheme-woocommerce-functions.php';
// }

 /**
	* desactivate emojis
  */
	/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
 }
 add_action( 'init', 'disable_emojis' );
 
 /**
	* Filter function used to remove the tinymce emoji plugin.
	* 
	* @param array $plugins 
	* @return array Difference betwen the two arrays
	*/
 function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	return array();
	}
 }
 
 /**
	* Remove emoji CDN hostname from DNS prefetching hints.
	*
	* @param array $urls URLs to print for resource hints.
	* @param string $relation_type The relation type the URLs are printed for.
	* @return array Difference betwen the two arrays.
	*/
 function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
 
 $urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
 
 return $urls;
 }

 /**
	* Deactivate widgets block editor. Block editor fixed no resolve
  */
 function wdvp_deactivate_widgets_block_editor() {
	 remove_theme_support( 'widgets-block-editor' );
 }

 add_action( 'after_setup_theme', 'wdvp_deactivate_widgets_block_editor' );

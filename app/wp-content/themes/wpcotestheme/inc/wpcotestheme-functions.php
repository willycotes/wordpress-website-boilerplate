<?php
/**
 * wpcotestheme functions.
 *
 * @package wpcotestheme
 */

if ( ! function_exists( 'wpcotestheme_is_woocommerce_activated' ) ) {
	/**
	 * Query WooCommerce activation
	 */
	function wpcotestheme_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.4.6
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function wpcotestheme_do_shortcode( $tag, array $atts = array(), $content = null ) {
	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}

/**
 * Get the content background color
 * Accounts for the wpcotestheme Designer and wpcotestheme Powerpack content background option.
 *
 * @since  1.6.0
 * @return string the background color
 */
function wpcotestheme_get_content_background_color() {
	if ( class_exists( 'WPCotesTheme_Designer' ) ) {
		$content_bg_color = get_theme_mod( 'sd_content_background_color' );
		$content_frame    = get_theme_mod( 'sd_fixed_width' );
	}

	if ( class_exists( 'WPCotesTheme_Powerpack' ) ) {
		$content_bg_color = get_theme_mod( 'sp_content_frame_background' );
		$content_frame    = get_theme_mod( 'sp_content_frame' );
	}

	$bg_color = str_replace( '#', '', get_theme_mod( 'background_color' ) );

	if ( class_exists( 'WPCotesTheme_Powerpack' ) || class_exists( 'WPCotesTheme_Designer' ) ) {
		if ( $content_bg_color && ( 'true' === $content_frame || 'frame' === $content_frame ) ) {
			$bg_color = str_replace( '#', '', $content_bg_color );
		}
	}

	return '#' . $bg_color;
}

/**
 * Apply inline style to the wpcotestheme banner.
 *
 * @uses  get_header_image()
 * @since  2.0.0
 */
function wpcotestheme_banner_styles() {
	$is_header_image = get_header_image();
	$header_bg_image = '';

	if ( $is_header_image ) {
		$header_bg_image = 'url(' . esc_url( $is_header_image ) . ')';
	}

	$styles = array();

	if ( '' !== $header_bg_image ) {
		$styles['background-image'] = $header_bg_image;
	}

	$styles = apply_filters( 'wpcotestheme_header_styles', $styles );

	foreach ( $styles as $style => $value ) {
		echo esc_attr( $style . ': ' . $value . '; ' );
	}
}

/**
 * Apply inline style to the wpcotestheme homepage content.
 *
 * @uses  get_the_post_thumbnail_url()
 * @since  2.2.0
 */
function wpcotestheme_homepage_content_styles() {
	$featured_image   = get_the_post_thumbnail_url( get_the_ID() );
	$background_image = '';

	if ( $featured_image ) {
		$background_image = 'url(' . esc_url( $featured_image ) . ')';
	}

	$styles = array();

	if ( '' !== $background_image ) {
		$styles['background-image'] = $background_image;
	}

	$styles = apply_filters( 'wpcotestheme_homepage_content_styles', $styles );

	foreach ( $styles as $style => $value ) {
		echo esc_attr( $style . ': ' . $value . '; ' );
	}
}

/**
 * Given an hex colors, returns an array with the colors components.
 *
 * @param  strong $hex Hex color e.g. #111111.
 * @return bool        Array with color components (r, g, b).
 * @since  2.5.8
 */
function get_rgb_values_from_hex( $hex ) {
	// Format the hex color string.
	$hex = str_replace( '#', '', $hex );

	if ( 3 === strlen( $hex ) ) {
		$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
	}

	// Get decimal values.
	$r = hexdec( substr( $hex, 0, 2 ) );
	$g = hexdec( substr( $hex, 2, 2 ) );
	$b = hexdec( substr( $hex, 4, 2 ) );

	return array(
		'r' => $r,
		'g' => $g,
		'b' => $b,
	);
}

/**
 * Returns true for light colors and false for dark colors.
 *
 * @param  strong $hex Hex color e.g. #111111.
 * @return bool        True if the average lightness of the three components of the color is higher or equal than 127.5.
 * @since  2.5.8
 */
function is_color_light( $hex ) {
	$rgb_values        = get_rgb_values_from_hex( $hex );
	$average_lightness = ( $rgb_values['r'] + $rgb_values['g'] + $rgb_values['b'] ) / 3;
	return $average_lightness >= 127.5;
}

/**
 * Adjust a hex color brightness
 * Allows us to create hover styles for custom link colors
 *
 * @since 2.5.8 Added $opacity argument.
 *
 * @param  strong  $hex     Hex color e.g. #111111.
 * @param  integer $steps   Factor by which to brighten/darken ranging from -255 (darken) to 255 (brighten).
 * @param  float   $opacity Opacity factor between 0 and 1.
 * @return string           Brightened/darkened color (hex by default, rgba if opacity is set to a valid value below 1).
 * @since  1.0.0
 */
function wpcotestheme_adjust_color_brightness( $hex, $steps, $opacity = 1 ) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter.
	$steps = max( -255, min( 255, $steps ) );

	$rgb_values = get_rgb_values_from_hex( $hex );

	// Adjust number of steps and keep it inside 0 to 255.
	$r = max( 0, min( 255, $rgb_values['r'] + $steps ) );
	$g = max( 0, min( 255, $rgb_values['g'] + $steps ) );
	$b = max( 0, min( 255, $rgb_values['b'] + $steps ) );

	if ( $opacity >= 0 && $opacity < 1 ) {
		return 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';
	}

	$r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
	$g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
	$b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

	return '#' . $r_hex . $g_hex . $b_hex;
}

/**
 * Sanitizes choices (selects / radios)
 * Checks that the input matches one of the available choices
 *
 * @param array $input the available choices.
 * @param array $setting the setting object.
 * @since  1.3.0
 */
function wpcotestheme_sanitize_choices( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checkbox sanitization callback.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 * @since  1.5.0
 */
function wpcotestheme_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Determines if post thumbnail can be displayed.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function wpcotestheme_can_show_post_thumbnail() {
	return apply_filters(
		'wpcotestheme_can_show_post_thumbnail',
		! post_password_required() && ! is_attachment() && has_post_thumbnail()
	);
}

/**
 * Print the first instance of a block in the content, and then break away.
 *
 * @since 1.0.0
 *
 * @param string      $block_name The full block type name, or a partial match.
 *                                Example: `core/image`, `core-embed/*`.
 * @param string|null $content    The content to search in. Use null for get_the_content().
 * @param int         $instances  How many instances of the block will be printed (max). Defaults to 1.
 *
 * @return bool Returns true if a block was located & printed, otherwise false.
 */
function wpcotestheme_print_first_instance_of_block( $block_name, $content = null, $instances = 1 ) {
	$instances_count = 0;
	$blocks_content  = '';

	if ( ! $content ) {
		$content = get_the_content();
	}

	// Parse blocks in the content.
	$blocks = parse_blocks( $content );

	// Loop blocks.
	foreach ( $blocks as $block ) {

		// Sanity check.
		if ( ! isset( $block['blockName'] ) ) {
			continue;
		}

		// Check if this the block matches the $block_name.
		$is_matching_block = false;

		// If the block ends with *, try to match the first portion.
		if ( '*' === $block_name[-1] ) {
			$is_matching_block = 0 === strpos( $block['blockName'], rtrim( $block_name, '*' ) );
		} else {
			$is_matching_block = $block_name === $block['blockName'];
		}

		if ( $is_matching_block ) {
			// Increment count.
			$instances_count++;

			// Add the block HTML.
			$blocks_content .= render_block( $block );

			// Break the loop if the $instances count was reached.
			if ( $instances_count >= $instances ) {
				break;
			}
		}
	}

	if ( $blocks_content ) {
		echo apply_filters( 'the_content', $blocks_content ); // phpcs:ignore WordPress.Security.EscapeOutput
		return true;
	}

	return false;
}

	/**
 * Debug logs with var_dump php
 */
function wpcotestheme_dump_log( $var ) {
	$output = WP_CONTENT_DIR . '/debug.log';
	ob_start();
	var_dump( $var );
	$content = ob_get_contents();
	$content .= "\n";
	ob_get_clean();
	error_log( $content, 0, $output );
}

/**
 * Debug log with print_r php
 */
function wpcotestheme_print_log( $var ) {
	$output = WP_CONTENT_DIR . '/debug.log';
	$content = print_r( $var, true );
	error_log( $content, 0, $output );
}	
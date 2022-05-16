<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

/**
 * The base configuration for WordPress
 *
 */

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

// Environment configuration controller
require_once dirname( __DIR__ ) . '/wp-config/wpcotes-config-controller.php';

/** Absolute path to the WordPress directory. */
defined( 'ABSPATH' ) || define( 'ABSPATH', __DIR__ . '/wordpress/' );

require_once ABSPATH . 'wp-settings.php';

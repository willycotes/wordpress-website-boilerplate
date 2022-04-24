<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

require_once __DIR__ . '/vendor/autoload.php';

// Load class configuration with dotenv.
require_once __DIR__ . '/includes/class-wp-config.php';

// WP_Config::dotenv_load_file();

// WP_Config::apply_config();
require_once __DIR__ . '/wp-config/wp-config-controller.php';


// Management indexing
// require_once dirname( ABSPATH ) . '/includes/disallow-indexing.php';

// Support wp-cli with table prefix data base global variable.
// $table_prefix = TABLE_PREFIX;

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wordpress/' );
}

// Support wp-cli with wp-setting.phps.
if ( ! function_exists( 'wp_unregister_GLOBALS' ) ) {
	/** Sets up WordPress vars and included files. */
	require_once ABSPATH . 'wp-settings.php';
}

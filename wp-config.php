<?php
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

// Load class configuration with dotenv.
require_once dirname( ABSPATH ) . '/includes/class-wp-config-dotenv.php';

WP_Config_Dotenv::load_config();

// Support wp-cli with table prefix data base global variable.
$table_prefix = TABLE_PREFIX ?? 'wp_';

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wordpress-core/' );
}

// Support wp-cli.
if ( ! function_exists( 'wp_unregister_GLOBALS' ) ) {
	/** Sets up WordPress vars and included files. */
	require_once ABSPATH . 'wp-settings.php';
}

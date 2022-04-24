<?php
/**
 * Commons configurations
 */

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
WP_Config::dotenv_load_file();
/**
 * Using 'defined()' function do why Local, Flywheel, and WP Engine is pre-pending the WP_ENVIRONMENT_TYPE constant and setting it to local
 */
defined( 'WP_ENVIRONMENT_TYPE' ) || WP_Config::define( 'WP_ENVIRONMENT_TYPE', $_ENV['WP_ENVIRONMENT_TYPE'] );

// General
WP_Config::define( 'WP_SITEURL', $_ENV['WP_SITEURL'] );
WP_Config::apply_config();
define( 'WP_HOME', WP_SITEURL );

define( 'WP_CONTENT_URL', WP_SITEURL . '/wp-content' );

define( 'WP_CONTENT_DIR', dirname( __DIR__ ) . '/wp-content' );

// Control memory wordpress.
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

// Database
require_once __DIR__ . '/database.php';

// WP_Config::apply_config();

// Configuration of environment WordPress
$env_config_path = __DIR__ . '/environment/' . WP_ENVIRONMENT_TYPE . '.php';

if ( file_exists( $env_config_path ) ) {
	require_once $env_config_path;
}
else {
	$message = sprintf( 'No se encuentra el archivo de configuracion: %s', WP_ENVIRONMENT_TYPE );
	throw new Error( $message, 1 );
}
WP_Config::apply_config();
<?php
/**
 * Environment configuration
 */

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

$root_dir = dirname( __DIR__ );

/**
 * Load environment vars in .env file
 */
$dotenv_dir = file_exists( $root_dir . '/.env' ) ? $root_dir : ''; 

if ( $dotenv_dir ) {
  $dotenv = Dotenv\Dotenv::createImmutable( $dotenv_dir );
	$dotenv->safeLoad();
} else {
	throw new Exception( 'Error: No such .env file' );
}

/**
 * Using 'defined()' function do why Local, Flywheel, and WP Engine is pre-pending the WP_ENVIRONMENT_TYPE constant and setting it to local
 */
defined( 'WP_ENVIRONMENT_TYPE' ) || define( 'WP_ENVIRONMENT_TYPE', $_ENV['WP_ENVIRONMENT_TYPE'] );

// General define constant
define( 'WP_SITEURL', $_ENV['WP_SITEURL'] );
define( 'WP_HOME', $_ENV['WP_HOME'] );
define( 'WP_CONTENT_URL', WP_HOME. 'wp-content' );
define( 'WP_CONTENT_DIR', $root_dir . '/app/wp-content' );

// Control memory wordpress.
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

// Database
require_once __DIR__ . '/database.php';

// Require configuration of environment WordPress
$env_config_path = __DIR__ . '/environments/' . WP_ENVIRONMENT_TYPE . '.php';
if ( file_exists( $env_config_path ) ) {
	require_once $env_config_path;
} else {
	$message = sprintf( 'No se encuentra el archivo de configuracion: %s', $env_config_path );
	throw new Error( $message, 1 );
}

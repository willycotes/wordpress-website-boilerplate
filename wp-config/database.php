<?php
/**
 * Database Configuration
 */

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/** The name of the database for WordPress */
WP_Config::define( 'DB_NAME', $_ENV['DB_NAME'] );

/** MySQL database username */
WP_Config::define( 'DB_USER', $_ENV['DB_USER'] );

/** MySQL database password */
WP_Config::define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );

/** MySQL hostname */
WP_Config::define( 'DB_HOST', $_ENV['DB_HOST'] );

/** Database Charset to use in creating database tables. */
WP_Config::define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
WP_Config::define( 'DB_COLLATE', '' );

// table prefix database.
$table_prefix = $_ENV['TABLE_PREFIX'] ;

/**#@+
 * Authentication Unique Keys and Salts.
 * 
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * Generate your keys:
 *
 * Generate using command line (https://aaemnnost.tv/wp-cli-commands/dotenv): "wp dotenv salts generate --file=./.env"
 *
 * Generate with BedRock WordPress salts generator here https://roots.io/salts.html
 *
 * Generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 *
 */
WP_Config::define( 'AUTH_KEY', $_ENV['AUTH_KEY'] );
WP_Config::define( 'SECURE_AUTH_KEY', $_ENV['SECURE_AUTH_KEY'] );
WP_Config::define( 'LOGGED_IN_KEY', $_ENV['LOGGED_IN_KEY'] );
WP_Config::define( 'NONCE_KEY', $_ENV['NONCE_KEY'] );
WP_Config::define( 'AUTH_SALT', $_ENV['AUTH_SALT'] );
WP_Config::define( 'SECURE_AUTH_SALT', $_ENV['SECURE_AUTH_SALT'] );
WP_Config::define( 'LOGGED_IN_SALT', $_ENV['LOGGED_IN_SALT'] );
WP_Config::define( 'NONCE_SALT', $_ENV['NONCE_SALT'] );
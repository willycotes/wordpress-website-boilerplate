<?php
/**
 *  Environment development database wordpress
 */

use WPCotesConfig\Config;

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Enable Debug logging to the /wp-content/debug.log file.
Config::define( 'WP_DEBUG', true );
Config::define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings.
Config::define( 'WP_DEBUG_DISPLAY', true );

// Desactivar la caché.
Config::define( 'WP_CACHE', false );
Config::define( 'DISABLE_CACHE', true );

// no generated new image with if edited.
Config::define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
Config::define( 'DISABLE_WP_CRON', true );

// Remove all data woocommerce.
Config::define( 'WC_REMOVE_ALL_DATA', false );

// Disallow indexing search engine
Config::define( 'DISALLOW_INDEXING', true );

<?php
/**
 *  Environment development database wordpress
 */

use WPConfig\WPConfig;

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Enable Debug logging to the /wp-content/debug.log file.
WPConfig::define( 'WP_DEBUG', true );
WPConfig::define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings.
WPConfig::define( 'WP_DEBUG_DISPLAY', true );

// Desactivar la caché.
WPConfig::define( 'WP_CACHE', false );
WPConfig::define( 'DISABLE_CACHE', true );

// no generated new image with if edited.
WPConfig::define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
WPConfig::define( 'DISABLE_WP_CRON', true );

// Remove all data woocommerce.
WPConfig::define( 'WC_REMOVE_ALL_DATA', false );

// Disallow indexing search engine
WPConfig::define( 'DISALLOW_INDEXING', true );

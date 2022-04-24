<?php
/**
 *  Environment development database wordpress
 */

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Enable Debug logging to the /wp-content/debug.log file.
WP_Config::define( 'WP_DEBUG', true );
WP_Config::define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings.
WP_Config::define( 'WP_DEBUG_DISPLAY', true );

// Desactivar la caché.
WP_Config::define( 'WP_CACHE', false );
WP_Config::define( 'DISABLE_CACHE', true );

// no generated new image with if edited.
WP_Config::define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
WP_Config::define( 'DISABLE_WP_CRON', true );

// Remove all data woocommerce.
WP_Config::define( 'WC_REMOVE_ALL_DATA', false );

// disallow indexing
WP_Config::define( 'DISALLOW_INDEXING', true );

<?php
/**
 *  Environment local database wordpress
 */

use WPConfig\WPConfig; 

 // prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Enable Debug logging to the /wp-content/debug.log file.
WPConfig::define( 'WP_DEBUG', true );
WPConfig::define( 'WP_DEBUG_LOG', true );
// WPConfig::define( 'WP_DEBUG_LOG', false );

// Disable display of errors and warnings.
WPConfig::define( 'WP_DEBUG_DISPLAY', true );
// WPConfig::define( 'WP_DEBUG_DISPLAY', false );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
WPConfig::define( 'SCRIPT_DEBUG', true );

// no generated new image with if edited.
WPConfig::define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
WPConfig::define( 'DISABLE_WP_CRON', true );

// Remove all data woocommerce.
WPConfig::define( 'WC_REMOVE_ALL_DATA', false );

// Disallow indexing search engine
WPConfig::define( 'DISALLOW_INDEXING', true );
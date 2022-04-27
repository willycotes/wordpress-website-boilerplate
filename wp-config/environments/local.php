<?php
/**
 *  Environment local database wordpress
 */

use WPCotesConfig\Config; 

 // prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Enable Debug logging to the /wp-content/debug.log file.
Config::define( 'WP_DEBUG', true );
Config::define( 'WP_DEBUG_LOG', true );
// Config::define( 'WP_DEBUG_LOG', false );

// Disable display of errors and warnings.
Config::define( 'WP_DEBUG_DISPLAY', true );
// Config::define( 'WP_DEBUG_DISPLAY', false );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
Config::define( 'SCRIPT_DEBUG', true );

// no generated new image with if edited.
Config::define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
Config::define( 'DISABLE_WP_CRON', true );

// Remove all data woocommerce.
Config::define( 'WC_REMOVE_ALL_DATA', false );

// Disallow indexing search engine
Config::define( 'DISALLOW_INDEXING', true );
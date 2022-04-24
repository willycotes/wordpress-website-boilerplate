<?php
/**
 *  Environment local database wordpress
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

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
WP_Config::define( 'SCRIPT_DEBUG', true );

// no generated new image with if edited.
WP_Config::define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
WP_Config::define( 'DISABLE_WP_CRON', true );

// Remove all data woocommerce.
WP_Config::define( 'WC_REMOVE_ALL_DATA', false );

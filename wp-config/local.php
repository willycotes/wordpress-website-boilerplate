<?php
/**
 *  Environment local database wordpress
 */

 // prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Enable Debug logging to the /wp-content/debug.log file.
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings.
define( 'WP_DEBUG_DISPLAY', true );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );

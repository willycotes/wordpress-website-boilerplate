<?php
/**
 *  Environment development database wordpress
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

// Desactivar la caché.
define( 'WP_CACHE', false );
define( 'DISABLE_CACHE', true );

echo 'environment';

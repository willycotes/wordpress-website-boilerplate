<?php
/**
 *  Environment development database wordpress
 */

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Activar la caché
define( 'WP_CACHE', true );
define( 'ENABLE_CACHE', true );

// force https
define( 'FORCE_SSL_LOGIN', true );
define( 'FORCE_SSL_ADMIN', true );

// disabled code editing in wordpress panel
define( 'DISALLOW_FILE_EDIT', true );

// disable automatic update core wordpress
define( 'AUTOMATIC_UPDATER_DISABLED', true );

// disabled installer or update plugins in wordpress panel ( if maintenance web services )
define( 'DISALLOW_FILE_MODS', true );

// limite max revisions
define( 'WP_POST_REVISIONS', 3 );

// empty trash recicle
define( 'EMPTY_TRASH_DAYS', 7 );

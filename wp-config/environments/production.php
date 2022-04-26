<?php
/**
 *  Environment development database wordpress
 */

use WPConfig\WPConfig;

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Activar la caché
WPConfig::define( 'WP_CACHE', true );
WPConfig::define( 'ENABLE_CACHE', true );

// force https
WPConfig::define( 'FORCE_SSL_LOGIN', true );
WPConfig::define( 'FORCE_SSL_ADMIN', true );

// disabled code editing in wordpress panel
WPConfig::define( 'DISALLOW_FILE_EDIT', true );

// disable automatic update core wordpress
WPConfig::define( 'AUTOMATIC_UPDATER_DISABLED', true );

// disabled installer or update plugins in wordpress panel ( if maintenance web services )
WPConfig::define( 'DISALLOW_FILE_MODS', true );

// limite max revisions
WPConfig::define( 'WP_POST_REVISIONS', 3 );

// empty trash recicle
WPConfig::define( 'EMPTY_TRASH_DAYS', 7 );

// no generated new image with if edited.
WPConfig::define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
WPConfig::define( 'DISABLE_WP_CRON', true );

// Remove all data woocommerce.
WPConfig::define( 'WC_REMOVE_ALL_DATA', false );

// Disallow indexing search engine
WPConfig::define( 'DISALLOW_INDEXING', false );

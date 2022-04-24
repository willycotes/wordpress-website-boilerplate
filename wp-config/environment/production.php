<?php
/**
 *  Environment development database wordpress
 */

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Activar la caché
WP_Config::define( 'WP_CACHE', true );
WP_Config::define( 'ENABLE_CACHE', true );

// force https
WP_Config::define( 'FORCE_SSL_LOGIN', true );
WP_Config::define( 'FORCE_SSL_ADMIN', true );

// disabled code editing in wordpress panel
WP_Config::define( 'DISALLOW_FILE_EDIT', true );

// disable automatic update core wordpress
WP_Config::define( 'AUTOMATIC_UPDATER_DISABLED', true );

// disabled installer or update plugins in wordpress panel ( if maintenance web services )
WP_Config::define( 'DISALLOW_FILE_MODS', true );

// limite max revisions
WP_Config::define( 'WP_POST_REVISIONS', 3 );

// empty trash recicle
WP_Config::define( 'EMPTY_TRASH_DAYS', 7 );

// no generated new image with if edited.
WP_Config::define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
WP_Config::define( 'DISABLE_WP_CRON', true );

// Remove all data woocommerce.
WP_Config::define( 'WC_REMOVE_ALL_DATA', false );

// disallow indexing
WP_Config::define( 'DISALLOW_INDEXING', false );

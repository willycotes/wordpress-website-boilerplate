<?php
/**
 *  Environment development database wordpress
 */

use WPCotesConfig\Config;

// prevent access directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Activar la caché
Config::define( 'WP_CACHE', true );
Config::define( 'ENABLE_CACHE', true );

// force https
Config::define( 'FORCE_SSL_LOGIN', true );
Config::define( 'FORCE_SSL_ADMIN', true );

// disabled code editing in wordpress panel
Config::define( 'DISALLOW_FILE_EDIT', true );

// disable automatic update core wordpress
Config::define( 'AUTOMATIC_UPDATER_DISABLED', true );

// disabled installer or update plugins in wordpress panel ( if maintenance web services )
Config::define( 'DISALLOW_FILE_MODS', true );

// limite max revisions
Config::define( 'WP_POST_REVISIONS', 3 );

// empty trash recicle
Config::define( 'EMPTY_TRASH_DAYS', 7 );

// no generated new image with if edited.
Config::define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
Config::define( 'DISABLE_WP_CRON', true );

// Remove all data woocommerce.
Config::define( 'WC_REMOVE_ALL_DATA', false );

// Disallow indexing search engine
Config::define( 'DISALLOW_INDEXING', false );

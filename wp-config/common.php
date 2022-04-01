<?php

// Commons configurations

define( 'WP_SITEURL', $_ENV['WP_SITEURL'] );
define( 'WP_HOME', WP_SITEURL );

define( 'WP_CONTENT_URL', WP_SITEURL . '/wp-content' );
define( 'WP_CONTENT_DIR', dirname( __DIR__ ) . '/wp-content' );

// no generated new image with if edited.
define( 'IMAGE_EDIT_OVERWRITE', true );

// disable wordpress cron.
define( 'DISABLE_WP_CRON', true );

// control memory wordpress.
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'Egx1ixMzlug01cCT4bKJ7UUIxJ1ddD7ESXQGn5H5qFT9dz1ovAKZZcBpwN5iiAkjpuUMqk1o6W0EznXUZS2hYQ==' );
define( 'SECURE_AUTH_KEY', 'iOabOmzeZ5UsggDwJZak5X6YoaI1LidPSzULzwPM4bSxl2FCNY6kH5lOFCooRbp/a3s2HyA64DPi9lmnMdff0g==' );
define( 'LOGGED_IN_KEY', 'L91WCmMr1/9AUmiVbZk2oRIpakiHGRuql64Gx9+fGfkR7kawmakrqugJikKO2azQnEXbHHzJibz54ozyXDcL2w==' );
define( 'NONCE_KEY', 'taEOMCKPji9sGtwOrJkZPm793IUwkV0NcENuk/NkkWExHaLGsWb83QHWA6lp3wKORWOYmOBn3X8uML0goC9uLQ==' );
define( 'AUTH_SALT', 'BGDcdvtfWGTzcZfRydsRSVXkkLxdwtSAf5CsWeFrIqTEeUzmjDmCTBlENTfrJQ11869cvc2L1pLNsXHg0LCk1g==' );
define( 'SECURE_AUTH_SALT', 'cynotgbeg2P8CsHlZeEF1kE58ADKlwLjxZqtaD8UP2qnleiQzMv/lmwU/hjgsFiuzQQW5tPZy/8NB3TY64/Ofg==' );
define( 'LOGGED_IN_SALT', 'pqGlrYmJOY+XqlA+aEBLyYgIvvjm2AP0uzBq+wWfoe9PaIwTU2UTwtoxaVdB/oe0+ZqhXTXGDRNGha5SyBErZA==' );
define( 'NONCE_SALT', 'PvEd5nNCfijxMhphQY8m6z5fCddSrKig+ygh+qkm8IDQq5KpF3y4BJF+ljlwIvbMAIP0Prrnc4WC1/mAryPg2w==' );

/**#@-*/

/* That's all, stop editing! Happy publishing. */

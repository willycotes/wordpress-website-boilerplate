const browserSync = require('browser-sync').create();
const path = require('path');
const root = path.resolve('../../../');

browserSync.init({
  https: {
    key: 'C:/certs-SSL/localhost.key',
    cert: 'C:/certs-SSL/localhost.crt',
  },
  notify: false,
  ui: false,
  injectChanges: true,
  proxy: {
    // target: process.env.WP_SITEURL,
    target: 'https://local.brandketings.com',
  },
  port: 9000,
  files: ['**/*.php', '**/*.scss', '**/*.js'],
  snippetOptions: {
    // whitelist: [root + '/wordpress/wp-admin/admin-ajax.php'],
    // ignorePaths: root + '/wordpress/wp-admin/**',
    ignorePaths: [
      'https://local.brandketings.com/wp-admin/**',
      root + '/wordpress/wp-admin/**',
      'https://local.brandketings.com/wp-admin/**',
      'https://localhost:9000/wp-admin/**',
    ],
  },
});

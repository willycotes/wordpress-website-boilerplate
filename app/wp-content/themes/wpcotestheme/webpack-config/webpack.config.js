const path = require('path');
const root = process.cwd();
const miniCssExtractPlugin = require('mini-css-extract-plugin').default;
const commons = require('./webpack-commons.js');
const { merge } = require('webpack-merge');
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries');
const { argv } = require('process');

/** @type {import('webpack').Configuration} */

module.exports = (env, argv) => {
  const isDev = argv.mode !== 'production';
  // console.log(isDev);

  const mainConfig = merge(commons, {
    // mode: 'production',
    devtool: isDev ? 'inline-source-map' : 'source-map',
    optimization: {
      minimize: isDev ? false : true,
    },
    module: {
      rules: [
        {
          test: /\.(css|scss)$/i,
          use: [
            miniCssExtractPlugin.loader,
            'css-loader',
            {
              loader: 'postcss-loader',
              options: {
                postcssOptions: {
                  plugins: [
                    {
                      autoprefixer: true,
                    },
                  ],
                },
              },
            },
            {
              loader: 'sass-loader',
              options: {
                sourceMap: true,
                sassOptions: {
                  outputStyle: 'expanded',
                },
              },
            },
          ],
        },
      ],
    },
  });

  // JS

  const public = {
    entry: {
      // main entry point. includes dependencies.
      main: path.resolve(root, 'src/js/main.js'),
      navigation: path.resolve(root, 'src/js/navigation.js'),
    },
    output: {
      path: path.resolve(root, 'assets/'),
      filename: isDev ? 'js/[name].js' : 'js/[name].min.js',
    },
  };

  const admin = {
    entry: {
      admin: path.resolve(root, 'src/js/admin/admin.js'),
    },
    output: {
      path: path.resolve(root, 'assets/'),
      filename: isDev ? 'js/admin/[name].js' : 'js/admin/[name].min.js',
    },
  };

  const woocommerce = {
    entry: {
      woocommerce: path.resolve(root, 'src/js/woocommerce/woocommerce.js'),
      'header-cart': path.resolve(root, 'src/js/woocommerce/header-cart.js'),
      footer: path.resolve(root, 'src/js/woocommerce/footer.js'),
      'sticky-add-to-cart': path.resolve(
        root,
        'src/js/woocommerce/sticky-add-to-cart.js',
      ),
    },
    output: {
      path: path.resolve(root, 'assets/'),
      filename: isDev
        ? 'js/woocommerce/[name].js'
        : 'js/woocommerce/[name].min.js',
    },
  };

  const woocommerceAdmin = {
    entry: {
      'woocommerce-admin': path.resolve(
        root,
        'src/js/woocommerce/woocommerce-admin/woocommerce-admin.js',
      ),
    },
    output: {
      path: path.resolve(root, 'assets/'),
      filename: isDev
        ? 'js/woocommerce/woocommerce-admin/[name].js'
        : 'js/woocommerce/woocommerce-admin/[name].min.js',
    },
  };

  // CSS.

  const publicCSS = {
    entry: {
      main: path.resolve(root, 'src/sass/main.scss'),
    },
    output: {
      path: root,
    },
    plugins: [
      new miniCssExtractPlugin({
        filename: isDev ? 'style.css' : 'style.min.css',
      }),
      new FixStyleOnlyEntriesPlugin(),
    ],
  };

  const adminCSS = {
    entry: {
      admin: path.resolve(root, 'src/sass/admin/admin.scss'),
      buttons: path.resolve(root, 'src/sass/admin/buttons.scss'),
      'plugin-install': path.resolve(
        root,
        'src/sass/admin/plugin-install.scss',
      ),
    },
    output: {
      path: path.resolve(root, 'assets/'),
    },
    plugins: [
      new miniCssExtractPlugin({
        filename: isDev ? 'css/admin/[name].css' : 'css/admin/[name].min.css',
      }),
      new FixStyleOnlyEntriesPlugin(),
    ],
  };

  const customizerCSS = {
    entry: {
      customizer: path.resolve(
        root,
        'src/sass/admin/customizer/customizer.scss',
      ),
    },
    output: {
      path: path.resolve(root, 'assets/'),
    },
    plugins: [
      new miniCssExtractPlugin({
        filename: isDev
          ? 'css/admin/customizer/[name].css'
          : 'css/admin/customizer/[name].min.css',
      }),
      new FixStyleOnlyEntriesPlugin(),
    ],
  };

  const welcomeScreenCSS = {
    entry: {
      welcome: path.resolve(root, 'src/sass/admin/welcome-screen/welcome.scss'),
    },
    output: {
      path: path.resolve(root, 'assets/'),
    },
    plugins: [
      new miniCssExtractPlugin({
        filename: isDev
          ? 'css/admin/welcome-screen/[name].css'
          : 'css/admin/welcome-screen/[name].min.css',
      }),
      new FixStyleOnlyEntriesPlugin(),
    ],
  };

  const baseCSS = {
    entry: {
      'gutenberg-blocks': path.resolve(
        root,
        'src/sass/base/gutenberg-blocks.scss',
      ),
      'gutenberg-editor': path.resolve(
        root,
        'src/sass/base/gutenberg-editor.scss',
      ),
      icons: path.resolve(root, 'src/sass/base/icons.scss'),
    },
    output: {
      path: path.resolve(root, 'assets/'),
    },
    plugins: [
      new miniCssExtractPlugin({
        filename: isDev ? 'css/base/[name].css' : 'css/base/[name].min.css',
      }),
      new FixStyleOnlyEntriesPlugin(),
    ],
  };

  const woocommerceCSS = {
    entry: {
      woocommerce: path.resolve(root, 'src/sass/woocommerce/woocommerce.scss'),
    },
    output: {
      path: path.resolve(root, 'assets/'),
    },
    plugins: [
      new miniCssExtractPlugin({
        filename: isDev
          ? 'css/woocommerce/[name].css'
          : 'css/woocommerce/[name].min.css',
      }),
      new FixStyleOnlyEntriesPlugin(),
    ],
  };

  const config = [
    // JS.
    merge(mainConfig, public),
    merge(mainConfig, admin),
    merge(mainConfig, woocommerce),
    merge(mainConfig, woocommerceAdmin),
    // CSS.
    merge(mainConfig, publicCSS),
    merge(mainConfig, adminCSS),
    merge(mainConfig, customizerCSS),
    merge(mainConfig, welcomeScreenCSS),
    merge(mainConfig, baseCSS),
    merge(mainConfig, woocommerceCSS),
  ];
  // console.log(config[4].plugins[1]);
  return config;
};

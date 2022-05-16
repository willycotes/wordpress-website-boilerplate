const path = require('path');
const root = process.cwd();
const eslintWebpackPlugin = require('eslint-webpack-plugin');
const StylelintPlugin = require('stylelint-webpack-plugin');
const copyWebpackPlugin = require('copy-webpack-plugin');
console.log(path.dirname(__dirname));
/** @type {import('webpack').Configuration} */

module.exports = {
  context: path.resolve(root, 'src'),
  output: {
    publicPath: path.dirname(__dirname),
    assetModuleFilename: 'images/[name][ext]',
  },
  resolve: {
    extensions: ['.js', 'scss', 'css'],
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: [path.resolve(root, 'node_modules/')],
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
      {
        test: /\.(woff|woff2)$/,
        type: 'asset/resource',
        generator: {
          filename: 'fonts/[name][ext][query]',
        },
      },
    ],
  },
  plugins: [
    // new eslintWebpackPlugin(),
    // new StylelintPlugin(),
    new copyWebpackPlugin({
      patterns: [
        {
          from: path.resolve(root, 'src/images/'),
          to: path.resolve(root, 'assets/images/'),
        },
      ],
    }),
  ],
  stats: {
    colors: true,
    modules: true,
    reasons: true,
    errorDetails: true,
  },
};

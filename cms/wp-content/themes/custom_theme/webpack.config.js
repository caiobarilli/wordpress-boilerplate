const path = require('path');
const miniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = {
  // mode: 'development',
  mode: 'production',

  entry: './assets/scripts/main.js',

  output: {
    filename: "main.js",
    path: path.resolve(__dirname, "dist"),
  },

  plugins: [

    new miniCssExtractPlugin(),

    new BrowserSyncPlugin(
      {
        host: 'localhost',
        port: 3000,
        proxy: "http://localhost:8000",
        files: [
          "./dist/*.css",
          "./dist/*.js",
          "./**/*.scss",
          "./**/*.php",
        ],
        injectCss: true,
      },
      { reload: false }
    ),

  ],

  module: {
    rules: [
      {
        mimetype: 'image/svg+xml',
        scheme: 'data',
        type: 'asset/resource',
        generator: {
          filename: 'icons/[hash].svg'
        }
      },
      {
        test: /\.(scss)$/,
        use: [
          {
            // Extracts CSS for each JS file that includes CSS
            loader: miniCssExtractPlugin.loader
          },
          {
            // Interprets `@import` and `url()` like `import/require()` and will resolve them
            loader: 'css-loader'
          },
          {
            // Loader for webpack to process CSS with PostCSS
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                plugins: function () {
                  return [
                    require('autoprefixer')
                  ];
                }
              }
            }
          },
          {
            // Loads a SASS/SCSS file and compiles it to CSS
            loader: 'sass-loader'
          }
        ]
      }
    ]
  }
}
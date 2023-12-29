const path = require('path'),
    miniCssExtractPlugin = require('mini-css-extract-plugin'),
    BrowserSyncPlugin = require("browser-sync-webpack-plugin"),
    webpack = require("webpack");

module.exports = {

//   mode: 'development',
  mode: 'production',

  externals: {
    $: "jquery",
    jQuery: "jquery",
  },

  entry: {
    main: './assets/scripts/main.js',
    bootstrap: './assets/scripts/bootstrap.js'
  },

  output: {
    filename: "[name].bundle.js",
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
          "./**/*.php"
        ],
        injectCss: true,
      },
      { reload: false }
    ),

    new webpack.ProvidePlugin({
        $: "jquery",
        jQuery: "jquery",
        "window.jQuery": "jquery",
    }),
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
            loader: miniCssExtractPlugin.loader
          },
          {
            loader: 'css-loader'
          },
          {
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
            loader: 'sass-loader'
          }
        ]
      }
    ]
  }
}

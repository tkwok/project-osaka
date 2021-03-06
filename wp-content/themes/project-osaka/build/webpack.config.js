const path = require('path'),
MiniCssExtractPlugin = require("mini-css-extract-plugin"),
OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin'),
UglifyJsPlugin = require('uglifyjs-webpack-plugin'),
devMode = process.env.NODE_ENV !== 'production';

module.exports = {
	watch: devMode,
	watchOptions: {
    aggregateTimeout: 300,
    poll: 1000
  },
  optimization: {
    minimizer: [
      new UglifyJsPlugin({
        extractComments: true,
        test: /.((js)?)(\?[a-z0-9]+)?$/i,
        exclude: /\/node_modules/ }
      ),
      new OptimizeCssAssetsPlugin({})
    ],
  },
  entry: {
    all: ['./src/js/index.js', './src/sass/main.scss']
  },
  mode: devMode ? 'development': 'production',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist'),
    publicPath: '/build/dist/'
  },
  module: {
    rules: [{
      test: /\.scss$/,
      use: [
        { loader: MiniCssExtractPlugin.loader,
          options: {
            hmr: devMode
          }
        },
        { loader: 'css-loader' },
        { loader: 'resolve-url-loader'},
        { loader: 'sass-loader', options: { sourceMap: devMode } }
      ],
      exclude: /node_modules/
    },
    {
      test: /\.(woff|woff2|eot|ttf|otf)$/,
      use: [{
        loader: 'file-loader',
        options: {
          publicPath: './'
        }
      }]
    }
  ]},
  plugins: [
    new MiniCssExtractPlugin({
      filename: devMode ? '[name].css' : '[name].[hash].css',
      chunkFilename: devMode ? '[id].css' : '[id].[hash].css'
    })
  ]
};

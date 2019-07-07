const path = require('path'),
MiniCssExtractPlugin = require("mini-css-extract-plugin"),
devMode = process.env.NODE_ENV !== 'production';

module.exports = {
  entry: {
    all: ['./src/js/index.js', './src/sass/main.scss']
  },
  mode: devMode ? 'development': 'production',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist'),
    publicPath: '/build/dist'
  },
  module: {
    rules: [{
      test: /\.scss$/,
      use: [
        MiniCssExtractPlugin.loader,
        { loader: 'css-loader' },
        { loader: 'resolve-url-loader'},
        { loader: 'sass-loader', options: { sourceMap: devMode } }
      ],
      exclude: /node_modules/
    },
    {
      test: /\.(woff|woff2|ttf|otf|eot)$/,
      use: [{
         loader: 'file-loader',
         options: {
           outputPath: './dist/fonts'
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

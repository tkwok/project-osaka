module.exports = {
  mode: dev ? 'development' : 'production',
  devtool: dev ? devtool : false,
  output: {
    filename: 'bundle.[hash:8].js'
    path: path.resolve(__dirname, '../dist'),
    publicPath: '',
  },
  module: {

  }
};

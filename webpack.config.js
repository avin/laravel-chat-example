var path = require('path');
var webpack = require('webpack');

var commonsPlugin = new webpack.optimize.CommonsChunkPlugin('shared.js');

module.exports = {
    context: path.resolve('resources/app/js'),
    entry: {
        app: './app.jsx',
    },
    output: {
        path: path.resolve('public/js/app'),
        filename: "[name].js"
    },
    plugins: [commonsPlugin],

    module: {
        loaders: [
            {
                test: [/\.jsx$/, /\.es6$/],
                exclude: /node_modules/,
                loader: "babel-loader"
            }
        ]
    },

    watchOptions: {
        poll: 1000,
        aggregateTimeout: 1000
    },

    resolve: {
        extensions: ['', '.js', '.jsx', '.es6']
    }
};